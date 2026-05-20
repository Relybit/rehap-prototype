require('dotenv').config();
const express = require('express');
const session = require('express-session');
const FileStore = require('session-file-store')(session);
const crypto = require('crypto');
const bcrypt = require('bcrypt');
const rateLimit = require('express-rate-limit');
const cron = require('node-cron');
const multer = require('multer');
const path = require('path');
const fs = require('fs');
const { Resend } = require('resend');
const Stripe = require('stripe');
const helmet = require('helmet');
const { getDb, save } = require('./db');

// メニュー画像アップロード設定
const MENU_IMG_DIR = path.join(__dirname, 'public/uploads/menus');
if (!fs.existsSync(MENU_IMG_DIR)) fs.mkdirSync(MENU_IMG_DIR, { recursive: true });

const menuImgStorage = multer.diskStorage({
  destination: (req, file, cb) => cb(null, MENU_IMG_DIR),
  filename: (req, file, cb) => {
    const ext = ['.jpg', '.jpeg', '.png', '.webp'].includes(path.extname(file.originalname).toLowerCase())
      ? path.extname(file.originalname).toLowerCase() : '.jpg';
    cb(null, `${req.session.storeId}_${req.params.id}_${Date.now()}${ext}`);
  },
});
const uploadMenuImg = multer({
  storage: menuImgStorage,
  limits: { fileSize: 5 * 1024 * 1024 },
  fileFilter: (req, file, cb) => {
    /^image\/(jpeg|png|webp)$/.test(file.mimetype) ? cb(null, true) : cb(new Error('画像ファイルのみ可'));
  },
});

const resend = process.env.RESEND_API_KEY ? new Resend(process.env.RESEND_API_KEY) : null;
const stripe = process.env.STRIPE_SECRET_KEY ? new Stripe(process.env.STRIPE_SECRET_KEY) : null;

const app = express();
const PORT = 3000;

const LINE_CHANNEL_ID     = process.env.LINE_CHANNEL_ID;
const LINE_CHANNEL_SECRET = process.env.LINE_CHANNEL_SECRET;
const LINE_REDIRECT_URI   = process.env.LINE_REDIRECT_URI   || 'https://relybit.co.jp/auth/line/callback';
const ADMIN_PASSWORD      = process.env.ADMIN_PASSWORD;
const SESSION_SECRET      = process.env.SESSION_SECRET;

// JST 0:00 リセット用の今日の日付
function jstToday() {
  return new Date(Date.now() + 9 * 60 * 60 * 1000).toISOString().split('T')[0];
}

// sql.js 用パラメータ付き SELECT ヘルパー
function query(db, sql, params = []) {
  const stmt = db.prepare(sql);
  if (params.length) stmt.bind(params);
  const rows = [];
  while (stmt.step()) rows.push(stmt.getAsObject());
  stmt.free();
  return rows;
}

// パスワード検証（bcrypt ハッシュ & レガシー平文どちらも対応）
async function verifyPassword(db, storeId, plain) {
  const rows = query(db, 'SELECT password FROM stores WHERE id = ?', [storeId]);
  if (!rows.length) return false;
  const stored = rows[0].password;
  if (stored && stored.startsWith('$2')) {
    return bcrypt.compare(plain, stored);
  }
  // 平文一致 → 自動的に bcrypt へ移行
  if (stored === plain) {
    const hashed = await bcrypt.hash(plain, 10);
    db.run('UPDATE stores SET password = ? WHERE id = ?', [hashed, storeId]);
    save();
    return true;
  }
  return false;
}

const authLimiter = rateLimit({
  windowMs: 15 * 60 * 1000,
  max: 10,
  standardHeaders: true,
  legacyHeaders: false,
  message: { error: 'リクエストが多すぎます。しばらく待ってからお試しください。' },
});

// Stripe webhook（生のbodyが必要なため express.json() より前に定義）
app.post('/api/webhooks/stripe', express.raw({ type: 'application/json' }), async (req, res) => {
  if (!stripe || !process.env.STRIPE_WEBHOOK_SECRET) return res.json({ received: true });
  const sig = req.headers['stripe-signature'];
  let event;
  try {
    event = stripe.webhooks.constructEvent(req.body, sig, process.env.STRIPE_WEBHOOK_SECRET);
  } catch (err) {
    console.error('[Stripe Webhook] 署名検証失敗:', err.message);
    return res.status(400).send(`Webhook Error: ${err.message}`);
  }

  const db = await getDb();

  if (event.type === 'checkout.session.completed') {
    const s = event.data.object;
    const storeId = s.client_reference_id;
    if (storeId && s.subscription) {
      db.run(
        `UPDATE stores SET stripe_customer_id=?, stripe_subscription_id=?, subscription_status='active',
         email=COALESCE(NULLIF(email,''), ?) WHERE id=?`,
        [s.customer, s.subscription, s.customer_email || null, storeId]
      );
      save();
      console.log(`[Stripe] 決済完了: ${storeId}`);

      // ウェルカムメール送信
      if (resend && s.customer_email) {
        const rows = query(db, 'SELECT * FROM stores WHERE id=?', [storeId]);
        if (rows.length) {
          try {
            await resend.emails.send({
              from: 'リライテン <noreply@relybit.co.jp>',
              to: s.customer_email,
              subject: '【リライテン】ご登録ありがとうございます',
              html: `<div style="font-family:sans-serif;max-width:560px;margin:0 auto;color:#333;">
  <div style="background:#0F2A4F;color:white;padding:20px 24px;border-radius:8px 8px 0 0;">
    <h1 style="margin:0;font-size:20px;">リライテン</h1>
    <p style="margin:4px 0 0;font-size:14px;opacity:.8;">ご登録ありがとうございます</p>
  </div>
  <div style="background:#f9f9f9;padding:24px;border-radius:0 0 8px 8px;">
    <p>${rows[0].name} 様</p>
    <p style="margin:16px 0;">月額プランのご登録が完了しました。<br>以下の情報でダッシュボードにログインしてください。</p>
    <table style="width:100%;border-collapse:collapse;">
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px;color:#666;">ダッシュボードURL</td>
        <td style="padding:10px 8px;font-weight:bold;">
          <a href="https://relybit.co.jp/store-dashboard.html">https://relybit.co.jp/store-dashboard.html</a>
        </td>
      </tr>
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px;color:#666;">店舗ID</td>
        <td style="padding:10px 8px;font-weight:bold;font-family:monospace;">${storeId}</td>
      </tr>
      <tr>
        <td style="padding:10px 8px;color:#666;">パスワード</td>
        <td style="padding:10px 8px;color:#888;">ご登録時に設定いただいたパスワード</td>
      </tr>
    </table>
    <p style="margin:20px 0 0;font-size:11px;color:#bbb;">このメールはリライテン（株式会社リリビット）より自動送信されています。</p>
  </div>
</div>`,
            });
            console.log(`[ウェルカムメール] 送信完了: ${s.customer_email}`);
          } catch (e) {
            console.error('[ウェルカムメール] 送信失敗:', e.message);
          }
        }
      }
    }
  }

  if (event.type === 'customer.subscription.deleted') {
    const sub = event.data.object;
    db.run(`UPDATE stores SET subscription_status='canceled' WHERE stripe_subscription_id=?`, [sub.id]);
    save();
    console.log(`[Stripe] サブスク解約: ${sub.id}`);
  }

  if (event.type === 'invoice.payment_failed') {
    const inv = event.data.object;
    if (inv.subscription) {
      db.run(`UPDATE stores SET subscription_status='payment_failed' WHERE stripe_subscription_id=?`, [inv.subscription]);
      save();
      console.log(`[Stripe] 支払い失敗: ${inv.subscription}`);
    }
  }

  res.json({ received: true });
});

app.use(express.json());
app.use(helmet({
  contentSecurityPolicy: false,        // LINE OAuth リダイレクトと競合するため無効
  crossOriginEmbedderPolicy: false,
  crossOriginOpenerPolicy: false,      // LINE アプリへの遷移・復帰をブロックしないため無効
}));
app.set('trust proxy', 1); // Nginx リバースプロキシ経由の HTTPS を認識させる
const sessionsDir = path.join(__dirname, 'sessions');
if (!fs.existsSync(sessionsDir)) fs.mkdirSync(sessionsDir, { recursive: true });
app.use(session({
  secret: SESSION_SECRET,
  resave: false,
  saveUninitialized: false,
  store: new FileStore({ path: sessionsDir, ttl: 86400, retries: 0, logFn: () => {} }),
  cookie: { secure: true, sameSite: 'lax', maxAge: 24 * 60 * 60 * 1000 },
}));
app.use(express.static(__dirname + '/public'));

function storeAuth(req, res, next) {
  if (!req.session.storeId) return res.status(401).json({ error: '未ログイン' });
  next();
}

// ===== LINE Login =====

// stateとltトークンはサーバーサイドのMapで管理（セッションに依存しない）
const lineStateStore = new Map(); // state -> { returnTo, createdAt }
const lineTokens = new Map();     // lt -> { lineUserId, displayName, createdAt }

app.get('/auth/line/login', authLimiter, (req, res) => {
  const state = crypto.randomBytes(16).toString('hex');
  const returnTo = req.query.return_to || '/';
  lineStateStore.set(state, { returnTo, createdAt: Date.now() });
  // 10分超の古いstateを削除
  for (const [k, v] of lineStateStore) {
    if (Date.now() - v.createdAt > 10 * 60 * 1000) lineStateStore.delete(k);
  }
  const params = new URLSearchParams({
    response_type: 'code',
    client_id: LINE_CHANNEL_ID,
    redirect_uri: LINE_REDIRECT_URI,
    state,
    scope: 'profile',
  });
  res.redirect(`https://access.line.me/oauth2/v2.1/authorize?${params}`);
});

app.get('/auth/line/callback', async (req, res) => {
  const { code, state } = req.query;
  const stateData = lineStateStore.get(state);
  if (!stateData) return res.redirect('/?line_error=1'); // stateが不正 or 期限切れ → エラーページへ
  lineStateStore.delete(state);

  const tokenRes = await fetch('https://api.line.me/oauth2/v2.1/token', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: new URLSearchParams({
      grant_type: 'authorization_code',
      code,
      redirect_uri: LINE_REDIRECT_URI,
      client_id: LINE_CHANNEL_ID,
      client_secret: LINE_CHANNEL_SECRET,
    }),
  });
  const tokenData = await tokenRes.json();

  const profileRes = await fetch('https://api.line.me/v2/profile', {
    headers: { Authorization: `Bearer ${tokenData.access_token}` },
  });
  const profile = await profileRes.json();

  req.session.lineUserId = profile.userId;
  req.session.lineDisplayName = profile.displayName;

  // クロスブラウザ対応：URLトークンを発行してリダイレクト先に付与
  const lt = crypto.randomBytes(16).toString('hex');
  lineTokens.set(lt, { lineUserId: profile.userId, displayName: profile.displayName, createdAt: Date.now() });
  // 5分超の古いトークンを削除
  for (const [k, v] of lineTokens) {
    if (Date.now() - v.createdAt > 5 * 60 * 1000) lineTokens.delete(k);
  }

  const returnTo = stateData.returnTo;
  res.redirect(`${returnTo}${returnTo.includes('?') ? '&' : '?'}lt=${lt}`);
});

app.get('/api/line/me', (req, res) => {
  if (req.session.lineUserId) {
    res.json({ userId: req.session.lineUserId, displayName: req.session.lineDisplayName });
  } else {
    res.json({ userId: null });
  }
});

// クロスブラウザ対応：ltトークンをセッションに紐付け
app.get('/api/line/claim-token', (req, res) => {
  const tokenData = req.query.lt ? lineTokens.get(req.query.lt) : null;
  if (!tokenData || Date.now() - tokenData.createdAt > 5 * 60 * 1000) {
    return res.json({ success: false });
  }
  lineTokens.delete(req.query.lt);
  req.session.lineUserId = tokenData.lineUserId;
  req.session.lineDisplayName = tokenData.displayName;
  res.json({ success: true, userId: tokenData.lineUserId, displayName: tokenData.displayName });
});

// 店舗ページ
app.get('/store/:store_id', (_req, res) => {
  res.sendFile(__dirname + '/public/store.html');
});

// 店舗情報 API
app.get('/api/store/:store_id', async (req, res) => {
  const db = await getDb();
  const storeId = req.params.store_id;

  const stores = query(db, 'SELECT * FROM stores WHERE id = ?', [storeId]);
  if (!stores.length) return res.status(404).json({ error: '店舗が見つかりません' });
  const store = stores[0];

  const products = query(db,
    'SELECT * FROM products WHERE store_id = ? ORDER BY CASE WHEN display_order IS NULL THEN 1 ELSE 0 END, display_order ASC',
    [storeId]
  );

  const coupons = query(db, 'SELECT * FROM coupons WHERE store_id = ?', [storeId]);

  const menus = query(db,
    'SELECT * FROM menus WHERE store_id = ? ORDER BY CASE WHEN display_order IS NULL THEN 1 ELSE 0 END, display_order ASC',
    [storeId]
  );

  res.json({ store, products, coupons, menus });
});

// 来店記録 API（1日1回・JST 0:00 リセット）
app.post('/api/visit', async (req, res) => {
  const db = await getDb();
  const { store_id, user_id, line_name } = req.body;
  if (!store_id || !user_id) return res.status(400).json({ error: 'パラメータ不足' });

  const today = jstToday();
  let isNew = false;

  try {
    db.run(
      'INSERT INTO visits (store_id, user_id, visited_at, line_name) VALUES (?, ?, ?, ?)',
      [store_id, user_id, today, line_name || null]
    );
    isNew = true;
    save();
  } catch (e) {
    // 本日分は登録済み。名前だけ最新化する
    if (line_name) {
      db.run('UPDATE visits SET line_name = ? WHERE store_id = ? AND user_id = ? AND visited_at = ?',
        [line_name, store_id, user_id, today]);
      save();
    }
  }

  const countRows = query(db,
    'SELECT COUNT(*) as count FROM visits WHERE store_id = ? AND user_id = ?',
    [store_id, user_id]
  );
  const visitCount = countRows[0]?.count || 0;

  const usedRows = query(db,
    'SELECT COALESCE(SUM(required_visits), 0) as total FROM coupon_usages WHERE store_id = ? AND user_id = ?',
    [store_id, user_id]
  );
  const usedStamps = usedRows[0]?.total || 0;

  const usedCoupons = query(db,
    `SELECT cu.coupon_id, cu.required_visits, cu.used_at, c.title
     FROM coupon_usages cu
     JOIN coupons c ON cu.coupon_id = c.id
     WHERE cu.store_id = ? AND cu.user_id = ?
     ORDER BY cu.used_at DESC`,
    [store_id, user_id]
  );

  res.json({ success: true, isNew, visitCount, usedStamps, usedCoupons });
});

// クーポン使用
app.post('/api/coupon/use', async (req, res) => {
  const db = await getDb();
  const { store_id, user_id, coupon_id, required_visits } = req.body;
  const today = jstToday();
  db.run(
    'INSERT INTO coupon_usages (store_id, user_id, coupon_id, required_visits, used_at) VALUES (?, ?, ?, ?, ?)',
    [store_id, user_id, coupon_id, required_visits, today]
  );
  save();
  res.json({ success: true });
});

// ===== 店舗認証 API =====

app.post('/api/store-auth/login', authLimiter, async (req, res) => {
  const db = await getDb();
  const { store_id, password } = req.body;
  if (!store_id || !password) return res.json({ success: false });

  const stores = query(db, 'SELECT * FROM stores WHERE id = ?', [store_id]);
  if (!stores.length) return res.json({ success: false });

  const valid = await verifyPassword(db, store_id, password);
  if (!valid) return res.json({ success: false });

  req.session.storeId = stores[0].id;
  req.session.storeName = stores[0].name;
  res.json({ success: true });
});

app.post('/api/store-auth/logout', (req, res) => {
  req.session.destroy();
  res.json({ success: true });
});

app.get('/api/store-auth/me', storeAuth, (req, res) => {
  res.json({ store_id: req.session.storeId, store_name: req.session.storeName });
});

app.get('/api/store-auth/info', storeAuth, async (req, res) => {
  const db = await getDb();
  const rows = query(db, 'SELECT * FROM stores WHERE id = ?', [req.session.storeId]);
  res.json(rows[0]);
});

app.put('/api/store-auth/info', storeAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, booking_url, google_maps_url } = req.body;
  db.run(
    'UPDATE stores SET name = ?, description = ?, booking_url = ?, google_maps_url = ? WHERE id = ?',
    [name, description, booking_url, google_maps_url || null, req.session.storeId]
  );
  req.session.storeName = name;
  save();
  res.json({ success: true });
});

// 統計
app.get('/api/store-auth/stats', storeAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.session.storeId;
  const today = jstToday();

  const total    = query(db, 'SELECT COUNT(*) as cnt FROM visits WHERE store_id = ?', [sid]);
  const unique   = query(db, 'SELECT COUNT(DISTINCT user_id) as cnt FROM visits WHERE store_id = ?', [sid]);
  const todayRow = query(db, 'SELECT COUNT(*) as cnt FROM visits WHERE store_id = ? AND visited_at = ?', [sid, today]);
  const couponUsed = query(db, 'SELECT COUNT(*) as cnt FROM coupon_usages WHERE store_id = ?', [sid]);
  const repeaters  = query(db,
    'SELECT COUNT(*) as cnt FROM (SELECT user_id FROM visits WHERE store_id = ? GROUP BY user_id HAVING COUNT(*) >= 2)',
    [sid]
  );
  const monthly = query(db,
    `SELECT strftime('%Y-%m', visited_at) as month, COUNT(*) as count
     FROM visits WHERE store_id = ?
     GROUP BY month ORDER BY month DESC LIMIT 6`,
    [sid]
  );
  const users = query(db,
    'SELECT user_id, MAX(line_name) as line_name, COUNT(*) as visit_count, MAX(visited_at) as last_visit FROM visits WHERE store_id = ? GROUP BY user_id ORDER BY visit_count DESC',
    [sid]
  );

  const uniqueCount = unique[0]?.cnt || 0;
  res.json({
    totalVisits: total[0]?.cnt || 0,
    uniqueUsers: uniqueCount,
    todayVisits: todayRow[0]?.cnt || 0,
    couponUsageCount: couponUsed[0]?.cnt || 0,
    repeatRate: uniqueCount > 0 ? Math.round((repeaters[0]?.cnt || 0) / uniqueCount * 100) : 0,
    monthlyVisits: monthly.reverse(),
    users,
  });
});

// 詳細分析
app.get('/api/store-auth/analytics', storeAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.session.storeId;

  const distrib = query(db,
    `SELECT cnt_group, COUNT(*) as user_count FROM (
       SELECT user_id,
         CASE
           WHEN COUNT(*) = 1 THEN '1回のみ'
           WHEN COUNT(*) BETWEEN 2 AND 3 THEN '2〜3回'
           WHEN COUNT(*) BETWEEN 4 AND 5 THEN '4〜5回'
           ELSE '6回以上'
         END as cnt_group
       FROM visits WHERE store_id = ? GROUP BY user_id
     ) GROUP BY cnt_group`,
    [sid]
  );

  const weekday = query(db,
    `SELECT strftime('%w', visited_at) as wd, COUNT(*) as count
     FROM visits WHERE store_id = ?
     GROUP BY wd ORDER BY wd`,
    [sid]
  );

  const monthly = query(db,
    `SELECT month, SUM(is_new) as new_users, SUM(1 - is_new) as repeat_users FROM (
       SELECT v.user_id, strftime('%Y-%m', v.visited_at) as month,
         CASE WHEN v.visited_at = fv.first_visit THEN 1 ELSE 0 END as is_new
       FROM visits v
       JOIN (SELECT user_id, MIN(visited_at) as first_visit FROM visits WHERE store_id = ? GROUP BY user_id) fv
         ON v.user_id = fv.user_id
       WHERE v.store_id = ?
     ) GROUP BY month ORDER BY month DESC LIMIT 6`,
    [sid, sid]
  );

  const lost = query(db,
    `SELECT COUNT(*) as cnt FROM (
       SELECT user_id FROM visits WHERE store_id = ?
       GROUP BY user_id HAVING MAX(visited_at) < date('now', '-30 days')
     )`,
    [sid]
  );

  const allVisits = query(db,
    'SELECT user_id, visited_at FROM visits WHERE store_id = ? ORDER BY user_id, visited_at',
    [sid]
  );
  let avgInterval = null;
  if (allVisits.length > 1) {
    const intervals = [];
    for (let i = 1; i < allVisits.length; i++) {
      if (allVisits[i].user_id === allVisits[i - 1].user_id) {
        const diff = (new Date(allVisits[i].visited_at) - new Date(allVisits[i - 1].visited_at)) / (1000 * 60 * 60 * 24);
        if (diff > 0) intervals.push(diff);
      }
    }
    if (intervals.length > 0)
      avgInterval = Math.round(intervals.reduce((a, b) => a + b, 0) / intervals.length);
  }

  const couponStats = query(db,
    `SELECT c.title, c.required_visits, COUNT(cu.id) as usage_count
     FROM coupons c
     LEFT JOIN coupon_usages cu ON c.id = cu.coupon_id
     WHERE c.store_id = ?
     GROUP BY c.id ORDER BY usage_count DESC`,
    [sid]
  );

  const weekdayNames = ['日', '月', '火', '水', '木', '金', '土'];
  res.json({
    visitDistribution: distrib.map(r => ({ group: r.cnt_group, count: r.user_count })),
    weekdayVisits: weekday.map(r => ({ day: weekdayNames[parseInt(r.wd)], count: r.count })),
    monthlyNewRepeat: monthly.map(r => ({ month: r.month, newUsers: r.new_users, repeatUsers: r.repeat_users })).reverse(),
    lostUsers: lost[0]?.cnt || 0,
    avgInterval,
    couponStats,
  });
});

// 商品一覧
app.get('/api/store-auth/products', storeAuth, async (req, res) => {
  const db = await getDb();
  res.json(query(db, 'SELECT * FROM products WHERE store_id = ?', [req.session.storeId]));
});

app.delete('/api/store-auth/products/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM products WHERE id = ? AND store_id = ?', [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// クーポン一覧
app.get('/api/store-auth/coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  res.json(query(db, 'SELECT * FROM coupons WHERE store_id = ?', [req.session.storeId]));
});

app.post('/api/store-auth/coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(
    'INSERT INTO coupons (store_id, title, description, required_visits) VALUES (?, ?, ?, ?)',
    [req.session.storeId, title, description, required_visits]
  );
  save();
  res.json({ success: true });
});

app.put('/api/store-auth/coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(
    'UPDATE coupons SET title = ?, description = ?, required_visits = ? WHERE id = ? AND store_id = ?',
    [title, description, required_visits, req.params.id, req.session.storeId]
  );
  save();
  res.json({ success: true });
});

app.delete('/api/store-auth/coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM coupons WHERE id = ? AND store_id = ?', [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// 来店ユーザー一覧（名前付き）
app.get('/api/store-auth/users', storeAuth, async (req, res) => {
  const db = await getDb();
  const users = query(db,
    `SELECT user_id,
            MAX(line_name) as line_name,
            COUNT(*) as visit_count,
            MAX(visited_at) as last_visit
     FROM visits
     WHERE store_id = ?
     GROUP BY user_id
     ORDER BY last_visit DESC`,
    [req.session.storeId]
  );
  res.json(users);
});

// 即時クーポン付与
app.post('/api/store-auth/grant-coupon', storeAuth, async (req, res) => {
  const db = await getDb();
  const { user_id, title, description, expires_at } = req.body;
  if (!user_id || !title) return res.status(400).json({ error: 'パラメータ不足' });

  const visited = query(db, 'SELECT 1 FROM visits WHERE store_id = ? AND user_id = ?', [req.session.storeId, user_id]);
  if (!visited.length) return res.status(403).json({ error: '対象ユーザーが見つかりません' });

  const today = jstToday();
  db.run(
    'INSERT INTO user_purchase_coupons (store_id, user_id, title, description, granted_at, expires_at) VALUES (?, ?, ?, ?, ?, ?)',
    [req.session.storeId, user_id, title, description || null, today, expires_at || null]
  );
  save();
  res.json({ success: true });
});

// 即時付与クーポン履歴
app.get('/api/store-auth/granted-coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const coupons = query(db,
    `SELECT upc.*, v.line_name
     FROM user_purchase_coupons upc
     LEFT JOIN (
       SELECT user_id, MAX(line_name) as line_name FROM visits WHERE store_id = ? GROUP BY user_id
     ) v ON upc.user_id = v.user_id
     WHERE upc.store_id = ?
     ORDER BY upc.granted_at DESC`,
    [req.session.storeId, req.session.storeId]
  );
  res.json(coupons);
});

// ===== キャンペーンクーポン（店舗管理）=====

app.get('/api/store-auth/campaign-coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const coupons = query(db,
    `SELECT cc.*, COUNT(cu.id) as usage_count
     FROM campaign_coupons cc
     LEFT JOIN campaign_coupon_usages cu ON cc.id = cu.campaign_coupon_id
     WHERE cc.store_id = ?
     GROUP BY cc.id
     ORDER BY cc.starts_at DESC`,
    [req.session.storeId]
  );
  res.json(coupons);
});

app.post('/api/store-auth/campaign-coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, starts_at, ends_at } = req.body;
  if (!title || !starts_at || !ends_at) return res.status(400).json({ error: 'パラメータ不足' });
  if (starts_at > ends_at) return res.status(400).json({ error: '開始日は終了日より前にしてください' });
  const today = jstToday();
  db.run(
    'INSERT INTO campaign_coupons (store_id, title, description, starts_at, ends_at, created_at) VALUES (?, ?, ?, ?, ?, ?)',
    [req.session.storeId, title, description || null, starts_at, ends_at, today]
  );
  save();
  res.json({ success: true });
});

app.put('/api/store-auth/campaign-coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, starts_at, ends_at } = req.body;
  db.run(
    'UPDATE campaign_coupons SET title = ?, description = ?, starts_at = ?, ends_at = ? WHERE id = ? AND store_id = ?',
    [title, description || null, starts_at, ends_at, req.params.id, req.session.storeId]
  );
  save();
  res.json({ success: true });
});

app.delete('/api/store-auth/campaign-coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM campaign_coupons WHERE id = ? AND store_id = ?', [req.params.id, req.session.storeId]);
  db.run('DELETE FROM campaign_coupon_usages WHERE campaign_coupon_id = ?', [req.params.id]);
  save();
  res.json({ success: true });
});

// ===== メニュー管理 =====

app.get('/api/store-auth/menus', storeAuth, async (req, res) => {
  const db = await getDb();
  const menus = query(db,
    'SELECT * FROM menus WHERE store_id = ? ORDER BY CASE WHEN display_order IS NULL THEN 1 ELSE 0 END, display_order ASC',
    [req.session.storeId]
  );
  res.json(menus);
});

app.post('/api/store-auth/menus', storeAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, price, duration, booking_url, display_order } = req.body;
  if (!name) return res.status(400).json({ error: 'メニュー名は必須です' });
  db.run(
    'INSERT INTO menus (store_id, name, description, price, duration, booking_url, display_order) VALUES (?, ?, ?, ?, ?, ?, ?)',
    [req.session.storeId, name, description || null, price || null, duration || null, booking_url || null, display_order || null]
  );
  save();
  const idResult = db.exec('SELECT last_insert_rowid()');
  const id = idResult[0]?.values[0]?.[0];
  res.json({ success: true, id });
});

app.put('/api/store-auth/menus/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, price, duration, booking_url, display_order } = req.body;
  db.run(
    'UPDATE menus SET name=?, description=?, price=?, duration=?, booking_url=?, display_order=? WHERE id=? AND store_id=?',
    [name, description || null, price || null, duration || null, booking_url || null, display_order || null, req.params.id, req.session.storeId]
  );
  save();
  res.json({ success: true });
});

app.post('/api/store-auth/menus/:id/image', storeAuth, (req, res, next) => {
  uploadMenuImg.single('image')(req, res, (err) => {
    if (err) return res.status(400).json({ error: err.message });
    next();
  });
}, async (req, res) => {
  if (!req.file) return res.status(400).json({ error: 'ファイルが見つかりません' });
  const db = await getDb();
  const existing = query(db, 'SELECT image_url FROM menus WHERE id=? AND store_id=?', [req.params.id, req.session.storeId]);
  if (existing.length && existing[0].image_url) {
    try { fs.unlinkSync(path.join(__dirname, 'public', existing[0].image_url)); } catch (_) {}
  }
  const imageUrl = `/uploads/menus/${req.file.filename}`;
  db.run('UPDATE menus SET image_url=? WHERE id=? AND store_id=?', [imageUrl, req.params.id, req.session.storeId]);
  save();
  res.json({ success: true, image_url: imageUrl });
});

app.delete('/api/store-auth/menus/:id/image', storeAuth, async (req, res) => {
  const db = await getDb();
  const existing = query(db, 'SELECT image_url FROM menus WHERE id=? AND store_id=?', [req.params.id, req.session.storeId]);
  if (existing.length && existing[0].image_url) {
    try { fs.unlinkSync(path.join(__dirname, 'public', existing[0].image_url)); } catch (_) {}
  }
  db.run('UPDATE menus SET image_url=NULL WHERE id=? AND store_id=?', [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

app.delete('/api/store-auth/menus/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  const existing = query(db, 'SELECT image_url FROM menus WHERE id=? AND store_id=?', [req.params.id, req.session.storeId]);
  if (existing.length && existing[0].image_url) {
    try { fs.unlinkSync(path.join(__dirname, 'public', existing[0].image_url)); } catch (_) {}
  }
  db.run('DELETE FROM menus WHERE id=? AND store_id=?', [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// ===== 店舗紹介（招待コード）=====

app.get('/api/store-auth/referral', storeAuth, async (req, res) => {
  const db = await getDb();
  const stores = query(db, 'SELECT referral_code, is_free FROM stores WHERE id=?', [req.session.storeId]);
  if (!stores.length) return res.status(404).json({ error: '店舗が見つかりません' });
  const referredStores = query(db,
    'SELECT id, name, referred_by FROM stores WHERE referred_by=?',
    [stores[0].referral_code]
  );
  res.json({ referral_code: stores[0].referral_code, is_free: stores[0].is_free, referred_stores: referredStores });
});

// ===== 管理者：店舗詳細データ =====

app.get('/api/admin/stores/:id/analytics', adminAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.params.id;

  const distrib = query(db,
    `SELECT cnt_group, COUNT(*) as user_count FROM (
       SELECT user_id,
         CASE WHEN COUNT(*) = 1 THEN '1回のみ' WHEN COUNT(*) BETWEEN 2 AND 3 THEN '2〜3回'
              WHEN COUNT(*) BETWEEN 4 AND 5 THEN '4〜5回' ELSE '6回以上' END as cnt_group
       FROM visits WHERE store_id = ? GROUP BY user_id
     ) GROUP BY cnt_group`, [sid]);

  const weekday = query(db,
    `SELECT strftime('%w', visited_at) as wd, COUNT(*) as count FROM visits WHERE store_id = ? GROUP BY wd ORDER BY wd`, [sid]);

  const monthly = query(db,
    `SELECT month, SUM(is_new) as new_users, SUM(1 - is_new) as repeat_users FROM (
       SELECT v.user_id, strftime('%Y-%m', v.visited_at) as month,
         CASE WHEN v.visited_at = fv.first_visit THEN 1 ELSE 0 END as is_new
       FROM visits v
       JOIN (SELECT user_id, MIN(visited_at) as first_visit FROM visits WHERE store_id = ? GROUP BY user_id) fv ON v.user_id = fv.user_id
       WHERE v.store_id = ?
     ) GROUP BY month ORDER BY month DESC LIMIT 6`, [sid, sid]);

  const lost = query(db,
    `SELECT COUNT(*) as cnt FROM (SELECT user_id FROM visits WHERE store_id = ? GROUP BY user_id HAVING MAX(visited_at) < date('now', '-30 days'))`, [sid]);

  const allVisits = query(db, 'SELECT user_id, visited_at FROM visits WHERE store_id = ? ORDER BY user_id, visited_at', [sid]);
  let avgInterval = null;
  if (allVisits.length > 1) {
    const intervals = [];
    for (let i = 1; i < allVisits.length; i++) {
      if (allVisits[i].user_id === allVisits[i-1].user_id) {
        const diff = (new Date(allVisits[i].visited_at) - new Date(allVisits[i-1].visited_at)) / 86400000;
        if (diff > 0) intervals.push(diff);
      }
    }
    if (intervals.length) avgInterval = Math.round(intervals.reduce((a,b) => a+b, 0) / intervals.length);
  }

  const couponStats = query(db,
    `SELECT c.title, COUNT(cu.id) as usage_count FROM coupons c LEFT JOIN coupon_usages cu ON c.id = cu.coupon_id WHERE c.store_id = ? GROUP BY c.id ORDER BY usage_count DESC`, [sid]);

  const weekdayNames = ['日','月','火','水','木','金','土'];
  res.json({
    visitDistribution: distrib.map(r => ({ group: r.cnt_group, count: r.user_count })),
    weekdayVisits: weekday.map(r => ({ day: weekdayNames[parseInt(r.wd)], count: r.count })),
    monthlyNewRepeat: monthly.map(r => ({ month: r.month, newUsers: r.new_users, repeatUsers: r.repeat_users })).reverse(),
    lostUsers: lost[0]?.cnt || 0,
    avgInterval,
    couponStats,
  });
});

app.get('/api/admin/stores/:id/menus', adminAuth, async (req, res) => {
  const db = await getDb();
  res.json(query(db, 'SELECT * FROM menus WHERE store_id = ? ORDER BY CASE WHEN display_order IS NULL THEN 1 ELSE 0 END, display_order ASC', [req.params.id]));
});

app.get('/api/admin/stores/:id/campaign-coupons', adminAuth, async (req, res) => {
  const db = await getDb();
  const coupons = query(db, 'SELECT cc.*, COUNT(cu.id) as usage_count FROM campaign_coupons cc LEFT JOIN campaign_coupon_usages cu ON cc.id = cu.campaign_coupon_id WHERE cc.store_id = ? GROUP BY cc.id ORDER BY cc.created_at DESC', [req.params.id]);
  res.json(coupons);
});

app.post('/api/admin/stores/:id/reset-password', adminAuth, async (req, res) => {
  const db = await getDb();
  const { new_password } = req.body;
  if (!new_password || new_password.length < 4) return res.status(400).json({ error: 'パスワードは4文字以上です' });
  const hashed = await bcrypt.hash(new_password, 10);
  db.run('UPDATE stores SET password = ? WHERE id = ?', [hashed, req.params.id]);
  save();
  res.json({ success: true });
});

// ===== 管理者：紹介管理 =====

app.get('/api/admin/referrals', adminAuth, async (_req, res) => {
  const db = await getDb();
  const stores = query(db, 'SELECT id, name, referral_code, referred_by, is_free FROM stores ORDER BY name');
  res.json(stores);
});

app.patch('/api/admin/stores/:id/is-free', adminAuth, async (req, res) => {
  const db = await getDb();
  const isFree = req.body.is_free ? 1 : 0;

  if (isFree && stripe) {
    const rows = query(db, 'SELECT stripe_subscription_id FROM stores WHERE id=?', [req.params.id]);
    if (rows.length && rows[0].stripe_subscription_id) {
      try {
        await stripe.subscriptions.cancel(rows[0].stripe_subscription_id);
        console.log(`[Stripe] サブスク解約完了（無料化）: ${req.params.id}`);
      } catch (e) {
        console.error('[Stripe] サブスク解約失敗:', e.message);
      }
    }
    db.run(`UPDATE stores SET is_free=1, subscription_status='free' WHERE id=?`, [req.params.id]);
  } else {
    db.run('UPDATE stores SET is_free=? WHERE id=?', [isFree, req.params.id]);
  }

  save();
  res.json({ success: true });
});

// ===== キャンペーンクーポン（ユーザー向け）=====

app.get('/api/campaign-coupons/:store_id/:user_id', async (req, res) => {
  const db = await getDb();
  const today = jstToday();
  const { store_id, user_id } = req.params;
  const coupons = query(db,
    `SELECT cc.*,
            cu.id as usage_id,
            cu.used_at
     FROM campaign_coupons cc
     LEFT JOIN campaign_coupon_usages cu
       ON cc.id = cu.campaign_coupon_id AND cu.user_id = ?
     WHERE cc.store_id = ? AND cc.starts_at <= ? AND cc.ends_at >= ?
     ORDER BY cc.ends_at ASC`,
    [user_id, store_id, today, today]
  );
  res.json(coupons);
});

app.post('/api/campaign-coupons/:id/use', async (req, res) => {
  const db = await getDb();
  const { user_id, store_id } = req.body;
  if (!user_id || !store_id) return res.status(400).json({ error: 'パラメータ不足' });

  const already = query(db,
    'SELECT id FROM campaign_coupon_usages WHERE campaign_coupon_id = ? AND user_id = ?',
    [req.params.id, user_id]
  );
  if (already.length) return res.status(400).json({ error: '使用済みです' });

  const today = jstToday();
  db.run(
    'INSERT INTO campaign_coupon_usages (campaign_coupon_id, store_id, user_id, used_at) VALUES (?, ?, ?, ?)',
    [req.params.id, store_id, user_id, today]
  );
  save();
  res.json({ success: true });
});

// パスワード変更
app.put('/api/store-auth/password', storeAuth, async (req, res) => {
  const db = await getDb();
  const { current, new_password } = req.body;

  const valid = await verifyPassword(db, req.session.storeId, current);
  if (!valid) return res.json({ success: false });

  const hashed = await bcrypt.hash(new_password, 10);
  db.run('UPDATE stores SET password = ? WHERE id = ?', [hashed, req.session.storeId]);
  save();
  res.json({ success: true });
});

// ===== 管理画面認証 =====

function adminAuth(req, res, next) {
  if (!req.session.isAdmin) return res.status(401).json({ error: '未ログイン' });
  next();
}

app.post('/api/admin/login', authLimiter, (req, res) => {
  const { password } = req.body;
  if (password === ADMIN_PASSWORD) {
    req.session.isAdmin = true;
    return res.json({ success: true });
  }
  res.json({ success: false });
});

app.post('/api/admin/verify-password', adminAuth, (req, res) => {
  const { password } = req.body;
  res.json({ ok: password === ADMIN_PASSWORD });
});

app.post('/api/admin/logout', (req, res) => {
  req.session.isAdmin = false;
  res.json({ success: true });
});

app.get('/api/admin/me', (req, res) => {
  res.json({ isAdmin: !!req.session.isAdmin });
});

// 支払いリンク生成（店舗IDをclient_reference_idとして付与）
app.get('/api/admin/stores/:id/payment-link', adminAuth, (req, res) => {
  const base = process.env.STRIPE_PAYMENT_LINK_URL;
  if (!base) return res.status(503).json({ error: 'STRIPE_PAYMENT_LINK_URL が未設定です' });
  res.json({ url: `${base}?client_reference_id=${req.params.id}` });
});

// ===== 管理画面 API =====

app.get('/api/admin/stores', adminAuth, async (_req, res) => {
  const db = await getDb();
  res.json(query(db, 'SELECT * FROM stores'));
});

app.post('/api/admin/stores', adminAuth, async (req, res) => {
  const db = await getDb();
  const { id, name, description, booking_url, password: pw, referred_by } = req.body;
  const hashed = await bcrypt.hash(pw || '1234', 10);
  db.run(
    'INSERT INTO stores (id, name, description, booking_url, password, referred_by) VALUES (?, ?, ?, ?, ?, ?)',
    [id, name, description, booking_url, hashed, referred_by || null]
  );
  save();
  res.json({ success: true });
});

app.put('/api/admin/stores/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, booking_url, qr_image, qr_sent, referred_by, cpa, conversion_point } = req.body;
  db.run(
    'UPDATE stores SET name = ?, description = ?, booking_url = ?, qr_image = ?, qr_sent = ?, referred_by = ?, cpa = ?, conversion_point = ? WHERE id = ?',
    [name, description, booking_url, qr_image !== undefined ? qr_image : null, qr_sent ? 1 : 0, referred_by || null, cpa || null, conversion_point || null, req.params.id]
  );
  save();
  res.json({ success: true });
});

app.patch('/api/admin/stores/:id/qr-sent', adminAuth, async (req, res) => {
  const db = await getDb();
  db.run('UPDATE stores SET qr_sent = ? WHERE id = ?', [req.body.qr_sent ? 1 : 0, req.params.id]);
  save();
  res.json({ success: true });
});

app.delete('/api/admin/stores/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  const id = req.params.id;
  db.run('DELETE FROM stores WHERE id = ?', [id]);
  db.run('DELETE FROM products WHERE store_id = ?', [id]);
  db.run('DELETE FROM coupons WHERE store_id = ?', [id]);
  db.run('DELETE FROM visits WHERE store_id = ?', [id]);
  save();
  res.json({ success: true });
});

// 商品
app.get('/api/admin/products/:store_id', adminAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.params.store_id;
  const rows = sid === 'all'
    ? query(db, 'SELECT p.*, s.name as store_name FROM products p JOIN stores s ON p.store_id = s.id ORDER BY p.name')
    : query(db, 'SELECT * FROM products WHERE store_id = ?', [sid]);
  res.json(rows);
});

app.post('/api/admin/products', adminAuth, async (req, res) => {
  const db = await getDb();
  const { store_id, name, description, affiliate_url, image_url, cpa, conversion_point } = req.body;
  db.run(
    'INSERT INTO products (store_id, name, description, affiliate_url, image_url, cpa, conversion_point) VALUES (?, ?, ?, ?, ?, ?, ?)',
    [store_id, name, description, affiliate_url, image_url || null, cpa || null, conversion_point || null]
  );
  save();
  res.json({ success: true });
});

app.put('/api/admin/products/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, affiliate_url, image_url, display_order, cpa, conversion_point } = req.body;
  const order = display_order !== '' && display_order != null ? parseInt(display_order) : null;
  db.run(
    'UPDATE products SET name = ?, description = ?, affiliate_url = ?, image_url = ?, display_order = ?, cpa = ?, conversion_point = ? WHERE id = ?',
    [name, description, affiliate_url, image_url || null, order, cpa || null, conversion_point || null, req.params.id]
  );
  save();
  res.json({ success: true });
});

app.delete('/api/admin/products/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM products WHERE id = ?', [req.params.id]);
  save();
  res.json({ success: true });
});

app.delete('/api/admin/products-bulk/:name', adminAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM products WHERE name = ?', [decodeURIComponent(req.params.name)]);
  save();
  res.json({ success: true });
});

// クーポン
app.get('/api/admin/coupons/:store_id', adminAuth, async (req, res) => {
  const db = await getDb();
  res.json(query(db, 'SELECT * FROM coupons WHERE store_id = ?', [req.params.store_id]));
});

app.post('/api/admin/coupons', adminAuth, async (req, res) => {
  const db = await getDb();
  const { store_id, title, description, required_visits } = req.body;
  db.run(
    'INSERT INTO coupons (store_id, title, description, required_visits) VALUES (?, ?, ?, ?)',
    [store_id, title, description, required_visits]
  );
  save();
  res.json({ success: true });
});

app.put('/api/admin/coupons/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(
    'UPDATE coupons SET title = ?, description = ?, required_visits = ? WHERE id = ?',
    [title, description, required_visits, req.params.id]
  );
  save();
  res.json({ success: true });
});

app.delete('/api/admin/coupons/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM coupons WHERE id = ?', [req.params.id]);
  save();
  res.json({ success: true });
});

// 来店統計（管理者）
app.get('/api/admin/visits/:store_id', adminAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.params.store_id;
  const today = jstToday();

  const total      = query(db, 'SELECT COUNT(*) as cnt FROM visits WHERE store_id = ?', [sid]);
  const unique     = query(db, 'SELECT COUNT(DISTINCT user_id) as cnt FROM visits WHERE store_id = ?', [sid]);
  const todayRow   = query(db, 'SELECT COUNT(*) as cnt FROM visits WHERE store_id = ? AND visited_at = ?', [sid, today]);
  const couponUsed = query(db, 'SELECT COUNT(*) as cnt FROM coupon_usages WHERE store_id = ?', [sid]);
  const monthly    = query(db,
    `SELECT strftime('%Y-%m', visited_at) as month, COUNT(*) as count FROM visits WHERE store_id = ? GROUP BY month ORDER BY month DESC LIMIT 6`,
    [sid]
  );
  const users      = query(db,
    'SELECT user_id, MAX(line_name) as line_name, COUNT(*) as visit_count, MAX(visited_at) as last_visit FROM visits WHERE store_id = ? GROUP BY user_id ORDER BY visit_count DESC',
    [sid]
  );

  res.json({
    totalVisits: total[0]?.cnt || 0,
    uniqueUsers: unique[0]?.cnt || 0,
    todayVisits: todayRow[0]?.cnt || 0,
    couponUsageCount: couponUsed[0]?.cnt || 0,
    monthlyVisits: monthly.reverse(),
    users,
  });
});

// ===== 購入特典クーポン（ユーザー向け）=====

app.get('/api/purchase-coupons/:store_id/:user_id', async (req, res) => {
  const db = await getDb();
  res.json(query(db,
    'SELECT * FROM user_purchase_coupons WHERE store_id = ? AND user_id = ? ORDER BY granted_at DESC',
    [req.params.store_id, req.params.user_id]
  ));
});

app.post('/api/purchase-coupons/:id/use', async (req, res) => {
  const db = await getDb();
  const today = jstToday();
  const rows = query(db, 'SELECT id, used_at FROM user_purchase_coupons WHERE id = ?', [req.params.id]);
  if (!rows.length) return res.status(404).json({ error: '見つかりません' });
  if (rows[0].used_at) return res.status(400).json({ error: '使用済みです' });
  db.run('UPDATE user_purchase_coupons SET used_at = ? WHERE id = ?', [today, req.params.id]);
  save();
  res.json({ success: true });
});

// ===== 購入特典クーポン（管理者向け）=====

app.get('/api/admin/purchase-coupons/:store_id', adminAuth, async (req, res) => {
  const db = await getDb();
  res.json(query(db,
    'SELECT * FROM user_purchase_coupons WHERE store_id = ? ORDER BY granted_at DESC',
    [req.params.store_id]
  ));
});

app.post('/api/admin/purchase-coupons', adminAuth, async (req, res) => {
  const db = await getDb();
  const { store_id, user_id, title, description, note, expires_at } = req.body;
  if (!store_id || !user_id || !title) return res.status(400).json({ error: 'パラメータ不足' });
  const today = jstToday();
  db.run(
    'INSERT INTO user_purchase_coupons (store_id, user_id, title, description, note, granted_at, expires_at) VALUES (?, ?, ?, ?, ?, ?, ?)',
    [store_id, user_id, title, description || null, note || null, today, expires_at || null]
  );
  save();
  res.json({ success: true });
});

app.delete('/api/admin/purchase-coupons/:id', adminAuth, async (req, res) => {
  const db = await getDb();
  db.run('DELETE FROM user_purchase_coupons WHERE id = ?', [req.params.id]);
  save();
  res.json({ success: true });
});

app.post('/api/admin/purchase-coupons/:id/mark-used', adminAuth, async (req, res) => {
  const db = await getDb();
  const today = jstToday();
  db.run('UPDATE user_purchase_coupons SET used_at = ? WHERE id = ?', [today, req.params.id]);
  save();
  res.json({ success: true });
});

// ===== 店舗メールアドレス更新 =====

app.put('/api/store-auth/email', storeAuth, async (req, res) => {
  const db = await getDb();
  const { email } = req.body;
  if (!email || !email.includes('@')) return res.status(400).json({ error: '有効なメールアドレスを入力してください' });
  db.run('UPDATE stores SET email = ? WHERE id = ?', [email, req.session.storeId]);
  save();
  res.json({ success: true });
});

// ===== 月次レポート =====

function getPrevMonth() {
  const now = new Date(Date.now() + 9 * 60 * 60 * 1000);
  const year = now.getMonth() === 0 ? now.getFullYear() - 1 : now.getFullYear();
  const month = now.getMonth() === 0 ? 12 : now.getMonth();
  return `${year}-${String(month).padStart(2, '0')}`;
}

async function buildReport(db, store, month) {
  const prevMonth = (() => {
    const [y, m] = month.split('-').map(Number);
    const pm = m === 1 ? 12 : m - 1;
    const py = m === 1 ? y - 1 : y;
    return `${py}-${String(pm).padStart(2, '0')}`;
  })();

  const total = query(db, `SELECT COUNT(*) as cnt FROM visits WHERE store_id = ? AND visited_at LIKE ?`, [store.id, `${month}%`]);
  const prevTotal = query(db, `SELECT COUNT(*) as cnt FROM visits WHERE store_id = ? AND visited_at LIKE ?`, [store.id, `${prevMonth}%`]);
  const unique = query(db, `SELECT COUNT(DISTINCT user_id) as cnt FROM visits WHERE store_id = ? AND visited_at LIKE ?`, [store.id, `${month}%`]);
  const repeaters = query(db, `SELECT COUNT(*) as cnt FROM (SELECT user_id FROM visits WHERE store_id = ? GROUP BY user_id HAVING COUNT(*) >= 2)`, [store.id]);
  const uniqueCount = unique[0]?.cnt || 0;
  const repeatRate = uniqueCount > 0 ? Math.round((repeaters[0]?.cnt || 0) / uniqueCount * 100) : 0;
  const couponUsed = query(db, `SELECT COUNT(*) as cnt FROM coupon_usages WHERE store_id = ? AND used_at LIKE ?`, [store.id, `${month}%`]);
  const dormant = query(db, `SELECT COUNT(DISTINCT user_id) as cnt FROM visits WHERE store_id = ? AND user_id NOT IN (SELECT DISTINCT user_id FROM visits WHERE store_id = ? AND visited_at >= date('now', '-30 days'))`, [store.id, store.id]);
  const weekday = query(db, `SELECT strftime('%w', visited_at) as wd, COUNT(*) as cnt FROM visits WHERE store_id = ? AND visited_at LIKE ? GROUP BY wd ORDER BY cnt DESC LIMIT 1`, [store.id, `${month}%`]);
  const wdNames = ['日', '月', '火', '水', '木', '金', '土'];
  const topDay = weekday[0] ? wdNames[parseInt(weekday[0].wd)] + '曜日' : '-';

  const totalCnt = total[0]?.cnt || 0;
  const prevCnt = prevTotal[0]?.cnt || 0;
  const diff = prevCnt > 0 ? Math.round((totalCnt - prevCnt) / prevCnt * 100) : null;
  const diffStr = diff === null ? '' : diff >= 0 ? ` (先月比 +${diff}%)` : ` (先月比 ${diff}%)`;

  const [y, m] = month.split('-');
  const label = `${y}年${parseInt(m)}月`;

  return { label, totalCnt, diffStr, uniqueCount, repeatRate, couponUsed: couponUsed[0]?.cnt || 0, dormant: dormant[0]?.cnt || 0, topDay };
}

async function sendMonthlyReports() {
  if (!process.env.RESEND_API_KEY) {
    console.log('[月次レポート] RESEND_API_KEY未設定のためスキップ');
    return;
  }
  const db = await getDb();
  const month = getPrevMonth();
  const stores = query(db, 'SELECT * FROM stores WHERE email IS NOT NULL AND email != ""');

  for (const store of stores) {
    try {
      const r = await buildReport(db, store, month);
      await resend.emails.send({
        from: 'REHAP <report@relybit.co.jp>',
        to: store.email,
        subject: `【REHAP】${r.label}の来店レポート｜${store.name}`,
        html: `
<div style="font-family:sans-serif; max-width:560px; margin:0 auto; color:#333;">
  <div style="background:#1a1a2e; color:white; padding:20px 24px; border-radius:8px 8px 0 0;">
    <h1 style="margin:0; font-size:20px;">REHAP 月次レポート</h1>
    <p style="margin:4px 0 0; font-size:14px; opacity:.8;">${r.label}｜${store.name}</p>
  </div>
  <div style="background:#f9f9f9; padding:24px; border-radius:0 0 8px 8px;">
    <h2 style="font-size:15px; margin:0 0 16px;">📊 先月のサマリー</h2>
    <table style="width:100%; border-collapse:collapse;">
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px; color:#666;">累計来店数</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.totalCnt}回${r.diffStr}</td>
      </tr>
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px; color:#666;">ユニークユーザー数</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.uniqueCount}人</td>
      </tr>
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px; color:#666;">リピート率</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.repeatRate}%</td>
      </tr>
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px; color:#666;">クーポン使用数</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.couponUsed}回</td>
      </tr>
      <tr style="border-bottom:1px solid #eee;">
        <td style="padding:10px 8px; color:#666;">離脱ユーザー数（30日未来店）</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.dormant}人</td>
      </tr>
      <tr>
        <td style="padding:10px 8px; color:#666;">最多来店曜日</td>
        <td style="padding:10px 8px; font-weight:bold;">${r.topDay}</td>
      </tr>
    </table>
    <div style="margin-top:24px; padding:16px; background:white; border-radius:6px; border:1px solid #eee;">
      <p style="margin:0; font-size:13px; color:#888;">ダッシュボードで詳細を確認できます。</p>
      <a href="https://relybit.co.jp/store-dashboard.html" style="display:inline-block; margin-top:10px; padding:8px 16px; background:#1a1a2e; color:white; text-decoration:none; border-radius:4px; font-size:13px;">ダッシュボードを開く</a>
    </div>
    <p style="margin:20px 0 0; font-size:11px; color:#bbb;">このメールはREHAP（株式会社リリビット）より自動送信されています。</p>
  </div>
</div>`,
      });
      console.log(`[月次レポート] 送信完了: ${store.name} → ${store.email}`);
    } catch (e) {
      console.error(`[月次レポート] 送信失敗: ${store.name}`, e.message);
    }
  }
}

// 管理者向け：手動送信（テスト用）
app.post('/api/admin/send-monthly-reports', adminAuth, async (_req, res) => {
  sendMonthlyReports();
  res.json({ success: true, message: '送信処理を開始しました' });
});

async function start() {
  await getDb();

  // 毎月1日 9:00（JST）に月次レポート送信
  cron.schedule('0 0 1 * *', () => {
    console.log('[cron] 月次レポート送信開始');
    sendMonthlyReports();
  }, { timezone: 'Asia/Tokyo' });

  // 毎日 3:00（JST）にDBバックアップ（7日分保持）
  cron.schedule('0 18 * * *', () => {
    try {
      const backupDir = path.join(__dirname, 'backups');
      if (!fs.existsSync(backupDir)) fs.mkdirSync(backupDir, { recursive: true });
      const dateStr = new Date(Date.now() + 9 * 60 * 60 * 1000).toISOString().split('T')[0];
      const src = path.join(__dirname, 'rehap.db');
      const dest = path.join(backupDir, `rehap_${dateStr}.db`);
      if (fs.existsSync(src)) {
        fs.copyFileSync(src, dest);
        console.log(`[backup] DBバックアップ完了: ${dest}`);
        // 8日以上前のバックアップを削除
        fs.readdirSync(backupDir)
          .filter(f => f.startsWith('rehap_') && f.endsWith('.db'))
          .sort()
          .slice(0, -7)
          .forEach(f => fs.unlinkSync(path.join(backupDir, f)));
      }
    } catch (e) {
      console.error('[backup] エラー:', e.message);
    }
  }, { timezone: 'UTC' }); // UTC 18:00 = JST 03:00

  app.listen(PORT, () => {
    console.log(`\nREHAP サーバー起動中 → http://localhost:${PORT}/store/store001\n`);
  });
}

start();
