const express = require('express');
const session = require('express-session');
const { getDb, save } = require('./db');
const app = express();
const PORT = 3000;

app.use(express.json());
app.use(session({ secret: 'rehap-secret-2026', resave: false, saveUninitialized: false }));
app.use(express.static(__dirname + '/public'));

// 店舗認証ミドルウェア
function storeAuth(req, res, next) {
  if (!req.session.storeId) return res.status(401).json({ error: '未ログイン' });
  next();
}

// 店舗ページ
app.get('/store/:store_id', (req, res) => {
  res.sendFile(__dirname + '/public/store.html');
});

// 店舗情報API
app.get('/api/store/:store_id', async (req, res) => {
  const db = await getDb();

  const storeRes = db.exec(`SELECT * FROM stores WHERE id = '${req.params.store_id}'`);
  if (!storeRes.length || !storeRes[0].values.length) {
    return res.status(404).json({ error: '店舗が見つかりません' });
  }

  const cols = (res, i) => Object.fromEntries(res[i].columns.map((c, j) => [c, res[i].values[0][j]]));
  const store = cols(storeRes, 0);

  const prodRes = db.exec(`SELECT * FROM products WHERE store_id = '${req.params.store_id}'`);
  const products = prodRes.length ? prodRes[0].values.map(v =>
    Object.fromEntries(prodRes[0].columns.map((c, j) => [c, v[j]]))
  ) : [];

  const couponRes = db.exec(`SELECT * FROM coupons WHERE store_id = '${req.params.store_id}'`);
  const coupons = couponRes.length ? couponRes[0].values.map(v =>
    Object.fromEntries(couponRes[0].columns.map((c, j) => [c, v[j]]))
  ) : [];

  res.json({ store, products, coupons });
});

// 来店記録API
app.post('/api/visit', async (req, res) => {
  const db = await getDb();
  const { store_id, user_id } = req.body;
  if (!store_id || !user_id) return res.status(400).json({ error: 'パラメータ不足' });

  const today = new Date().toISOString().split('T')[0];
  let isNew = false;

  try {
    db.run(`INSERT INTO visits (store_id, user_id, visited_at) VALUES ('${store_id}', '${user_id}', '${today}')`);
    isNew = true;
    save();
  } catch (e) {
    // 今日すでに来店済み
  }

  const countRes = db.exec(`SELECT COUNT(*) as count FROM visits WHERE store_id = '${store_id}' AND user_id = '${user_id}'`);
  const visitCount = countRes[0].values[0][0];

  res.json({ success: true, isNew, visitCount });
});

// ===== 店舗認証API =====

// ログイン
app.post('/api/store-auth/login', async (req, res) => {
  const db = await getDb();
  const { store_id, password } = req.body;
  const result = db.exec(`SELECT * FROM stores WHERE id='${store_id}' AND password='${password}'`);
  if (!result.length || !result[0].values.length) return res.json({ success: false });
  const store = Object.fromEntries(result[0].columns.map((c, j) => [c, result[0].values[0][j]]));
  req.session.storeId = store.id;
  req.session.storeName = store.name;
  res.json({ success: true });
});

// ログアウト
app.post('/api/store-auth/logout', (req, res) => {
  req.session.destroy();
  res.json({ success: true });
});

// ログイン確認
app.get('/api/store-auth/me', storeAuth, (req, res) => {
  res.json({ store_id: req.session.storeId, store_name: req.session.storeName });
});

// 店舗情報取得
app.get('/api/store-auth/info', storeAuth, async (req, res) => {
  const db = await getDb();
  const result = db.exec(`SELECT * FROM stores WHERE id='${req.session.storeId}'`);
  const store = Object.fromEntries(result[0].columns.map((c, j) => [c, result[0].values[0][j]]));
  res.json(store);
});

// 店舗情報更新
app.put('/api/store-auth/info', storeAuth, async (req, res) => {
  const db = await getDb();
  const { name, description, booking_url } = req.body;
  db.run(`UPDATE stores SET name=?, description=?, booking_url=? WHERE id=?`, [name, description, booking_url, req.session.storeId]);
  req.session.storeName = name;
  save();
  res.json({ success: true });
});

// 統計
app.get('/api/store-auth/stats', storeAuth, async (req, res) => {
  const db = await getDb();
  const sid = req.session.storeId;
  const today = new Date().toISOString().split('T')[0];
  const total = db.exec(`SELECT COUNT(*) FROM visits WHERE store_id='${sid}'`);
  const unique = db.exec(`SELECT COUNT(DISTINCT user_id) FROM visits WHERE store_id='${sid}'`);
  const todayCount = db.exec(`SELECT COUNT(*) FROM visits WHERE store_id='${sid}' AND visited_at='${today}'`);
  const users = db.exec(`SELECT user_id, COUNT(*) as visit_count, MAX(visited_at) as last_visit FROM visits WHERE store_id='${sid}' GROUP BY user_id ORDER BY visit_count DESC`);
  res.json({
    totalVisits: total[0]?.values[0][0] || 0,
    uniqueUsers: unique[0]?.values[0][0] || 0,
    todayVisits: todayCount[0]?.values[0][0] || 0,
    users: users.length ? users[0].values.map(v => ({ user_id: v[0], visit_count: v[1], last_visit: v[2] })) : [],
  });
});

// 商品一覧
app.get('/api/store-auth/products', storeAuth, async (req, res) => {
  const db = await getDb();
  const result = db.exec(`SELECT * FROM products WHERE store_id='${req.session.storeId}'`);
  if (!result.length) return res.json([]);
  res.json(result[0].values.map(v => Object.fromEntries(result[0].columns.map((c, j) => [c, v[j]]))));
});

// 商品追加・更新は管理者(リリビット)のみ

// 商品削除
app.delete('/api/store-auth/products/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  db.run(`DELETE FROM products WHERE id=? AND store_id=?`, [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// クーポン一覧
app.get('/api/store-auth/coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const result = db.exec(`SELECT * FROM coupons WHERE store_id='${req.session.storeId}'`);
  if (!result.length) return res.json([]);
  res.json(result[0].values.map(v => Object.fromEntries(result[0].columns.map((c, j) => [c, v[j]]))));
});

// クーポン追加
app.post('/api/store-auth/coupons', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(`INSERT INTO coupons (store_id, title, description, required_visits) VALUES (?, ?, ?, ?)`, [req.session.storeId, title, description, required_visits]);
  save();
  res.json({ success: true });
});

// クーポン更新
app.put('/api/store-auth/coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(`UPDATE coupons SET title=?, description=?, required_visits=? WHERE id=? AND store_id=?`, [title, description, required_visits, req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// クーポン削除
app.delete('/api/store-auth/coupons/:id', storeAuth, async (req, res) => {
  const db = await getDb();
  db.run(`DELETE FROM coupons WHERE id=? AND store_id=?`, [req.params.id, req.session.storeId]);
  save();
  res.json({ success: true });
});

// パスワード変更
app.put('/api/store-auth/password', storeAuth, async (req, res) => {
  const db = await getDb();
  const { current, new_password } = req.body;
  const result = db.exec(`SELECT id FROM stores WHERE id='${req.session.storeId}' AND password='${current}'`);
  if (!result.length || !result[0].values.length) return res.json({ success: false });
  db.run(`UPDATE stores SET password=? WHERE id=?`, [new_password, req.session.storeId]);
  save();
  res.json({ success: true });
});

// ===== 管理画面API =====

// 店舗一覧
app.get('/api/admin/stores', async (req, res) => {
  const db = await getDb();
  const result = db.exec('SELECT * FROM stores');
  if (!result.length) return res.json([]);
  const stores = result[0].values.map(v => Object.fromEntries(result[0].columns.map((c, j) => [c, v[j]])));
  res.json(stores);
});

// 店舗追加
app.post('/api/admin/stores', async (req, res) => {
  const db = await getDb();
  const { id, name, description, booking_url } = req.body;
  db.run(`INSERT INTO stores (id, name, description, booking_url) VALUES (?, ?, ?, ?)`, [id, name, description, booking_url]);
  save();
  res.json({ success: true });
});

// 店舗更新
app.put('/api/admin/stores/:id', async (req, res) => {
  const db = await getDb();
  const { name, description, booking_url, qr_image } = req.body;
  db.run(`UPDATE stores SET name=?, description=?, booking_url=?, qr_image=? WHERE id=?`, [name, description, booking_url, qr_image !== undefined ? qr_image : null, req.params.id]);
  save();
  res.json({ success: true });
});

// 店舗削除
app.delete('/api/admin/stores/:id', async (req, res) => {
  const db = await getDb();
  db.run(`DELETE FROM stores WHERE id=?`, [req.params.id]);
  db.run(`DELETE FROM products WHERE store_id=?`, [req.params.id]);
  db.run(`DELETE FROM coupons WHERE store_id=?`, [req.params.id]);
  db.run(`DELETE FROM visits WHERE store_id=?`, [req.params.id]);
  save();
  res.json({ success: true });
});

// 商品一覧
app.get('/api/admin/products/:store_id', async (req, res) => {
  const db = await getDb();
  const result = db.exec(`SELECT * FROM products WHERE store_id='${req.params.store_id}'`);
  if (!result.length) return res.json([]);
  res.json(result[0].values.map(v => Object.fromEntries(result[0].columns.map((c, j) => [c, v[j]]))));
});

// 商品追加
app.post('/api/admin/products', async (req, res) => {
  const db = await getDb();
  const { store_id, name, description, affiliate_url, image_url } = req.body;
  db.run(`INSERT INTO products (store_id, name, description, affiliate_url, image_url) VALUES (?, ?, ?, ?, ?)`, [store_id, name, description, affiliate_url, image_url || null]);
  save();
  res.json({ success: true });
});

// 商品更新
app.put('/api/admin/products/:id', async (req, res) => {
  const db = await getDb();
  const { name, description, affiliate_url, image_url } = req.body;
  db.run(`UPDATE products SET name=?, description=?, affiliate_url=?, image_url=? WHERE id=?`, [name, description, affiliate_url, image_url || null, req.params.id]);
  save();
  res.json({ success: true });
});

// 商品削除
app.delete('/api/admin/products/:id', async (req, res) => {
  const db = await getDb();
  db.run(`DELETE FROM products WHERE id=?`, [req.params.id]);
  save();
  res.json({ success: true });
});

// クーポン一覧
app.get('/api/admin/coupons/:store_id', async (req, res) => {
  const db = await getDb();
  const result = db.exec(`SELECT * FROM coupons WHERE store_id='${req.params.store_id}'`);
  if (!result.length) return res.json([]);
  res.json(result[0].values.map(v => Object.fromEntries(result[0].columns.map((c, j) => [c, v[j]]))));
});

// クーポン追加
app.post('/api/admin/coupons', async (req, res) => {
  const db = await getDb();
  const { store_id, title, description, required_visits } = req.body;
  db.run(`INSERT INTO coupons (store_id, title, description, required_visits) VALUES (?, ?, ?, ?)`, [store_id, title, description, required_visits]);
  save();
  res.json({ success: true });
});

// クーポン更新
app.put('/api/admin/coupons/:id', async (req, res) => {
  const db = await getDb();
  const { title, description, required_visits } = req.body;
  db.run(`UPDATE coupons SET title=?, description=?, required_visits=? WHERE id=?`, [title, description, required_visits, req.params.id]);
  save();
  res.json({ success: true });
});

// クーポン削除
app.delete('/api/admin/coupons/:id', async (req, res) => {
  const db = await getDb();
  db.run(`DELETE FROM coupons WHERE id=?`, [req.params.id]);
  save();
  res.json({ success: true });
});

// 来店統計
app.get('/api/admin/visits/:store_id', async (req, res) => {
  const db = await getDb();
  const sid = req.params.store_id;
  const today = new Date().toISOString().split('T')[0];

  const total = db.exec(`SELECT COUNT(*) FROM visits WHERE store_id='${sid}'`);
  const unique = db.exec(`SELECT COUNT(DISTINCT user_id) FROM visits WHERE store_id='${sid}'`);
  const todayCount = db.exec(`SELECT COUNT(*) FROM visits WHERE store_id='${sid}' AND visited_at='${today}'`);
  const users = db.exec(`SELECT user_id, COUNT(*) as visit_count, MAX(visited_at) as last_visit FROM visits WHERE store_id='${sid}' GROUP BY user_id ORDER BY visit_count DESC`);

  res.json({
    totalVisits: total[0]?.values[0][0] || 0,
    uniqueUsers: unique[0]?.values[0][0] || 0,
    todayVisits: todayCount[0]?.values[0][0] || 0,
    users: users.length ? users[0].values.map(v => ({ user_id: v[0], visit_count: v[1], last_visit: v[2] })) : [],
  });
});

async function start() {
  await getDb(); // DB初期化
  app.listen(PORT, () => {
    console.log(`\nREHAP プロトタイプ起動中`);
    console.log(`→ http://localhost:${PORT}/store/store001\n`);
  });
}

start();
