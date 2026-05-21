# リライテン セキュリティ強化 実装仕様書

> 作成日：2026-05-12  
> 対象システム：リライテン（https://relybit.co.jp）  
> 依頼元：株式会社リリビット CEO 今田吉平  
> 対象エンジニア：外部開発エンジニア

---

## 本ドキュメントの位置づけ

セキュリティ強化の主要実装は **Claude Code（AI）が既に完了** しています。  
エンジニアには以下を依頼します。

1. 実装内容が正しく動作しているか**動作確認**
2. 懸念点・改善点があれば**修正・提案**
3. まだ未対応の項目の**追加実装**

---

## 1. システム概要

### 1.1 アーキテクチャ

```
[ユーザー（LINEログイン）]
        │ QRコード読み取り
        ▼
[Nginx :443] ← relybit.co.jp
        │ リバースプロキシ
        ▼
[Node.js + Express :3000]  ← PM2管理
        │
        ├─ /public/store.html          ← ユーザー画面
        ├─ /public/store-login.html    ← 店舗ログイン
        ├─ /public/store-dashboard.html← 店舗管理画面
        └─ /public/admin.html          ← リリビット運営管理画面
        │
        ▼
[SQLite (rehap.db)]  ← /var/www/rehap/rehap.db
```

### 1.2 サーバー情報

| 項目 | 値 |
|---|---|
| ホスティング | ConoHa VPS |
| IP | 160.251.232.162 |
| OS | Ubuntu 24.04（Linux 6.8系） |
| 実行ディレクトリ | `/var/www/rehap/` |
| プロセス管理 | PM2（アプリ名: `rehap`） |
| Webサーバー | Nginx（リバースプロキシ） |
| DBファイル | `/var/www/rehap/rehap.db` |

### 1.3 技術スタック

```
Node.js + Express
sql.js（SQLite）
express-session
bcrypt
express-rate-limit
helmet          ← 今回追加済み
node-cron
multer（画像アップロード）
LINE Login API
Resend（メール送信）
Stripe（決済）
```

---

## 2. セキュリティ実装状況まとめ

| # | 対策 | 状態 | 担当 |
|---|---|---|---|
| - | パスワードのbcryptハッシュ化 | ✅ 実装済み | 既存 |
| - | 認証エンドポイントのレート制限（15分10回） | ✅ 実装済み | 既存 |
| - | SQLインジェクション対策（パラメータ化クエリ） | ✅ 実装済み | 既存 |
| - | シークレット類の `.env` 管理 | ✅ 実装済み | 既存 |
| - | QRコード1日1回制限（JST 0:00リセット） | ✅ 実装済み | 既存 |
| 3-1 | 管理画面へのIPアドレス制限 | ⏸ 保留中 | エンジニア対応 |
| 3-2 | DBバックアップ自動化 | ✅ 実装済み | Claude Code実装 |
| 3-3 | XSS対策（Helmetヘッダー） | ✅ 部分実装 | **要確認・強化** |
| 3-4 | ClamAVウイルス対策 | ✅ VPS設定済み | **アップロードスキャンは未実装** |
| 3-5 | 脆弱性診断の仕組み化 | ✅ 実装済み | **要動作確認** |

---

## 3-1. 管理画面へのIPアドレス制限

### 現状

現在、管理画面IP制限は**保留中**です（外部エンジニアのアクセスが遮断されるため）。  
IPアドレスが確定次第、エンジニアに実装を依頼します。

### 依頼内容（将来対応）

リリビット社のグローバルIPと、必要に応じてエンジニアのIPを追加した上で、  
以下の2箇所に制限を追加してください。

#### server.js にミドルウェアを追加

```bash
npm install ip-range-check
```

`server.js` の `adminAuth` 関数の上に追加：

```javascript
const ipRangeCheck = require('ip-range-check');

function adminIpFilter(req, res, next) {
  const allowed = (process.env.ADMIN_ALLOWED_IPS || '')
    .split(',').map(s => s.trim()).filter(Boolean);
  if (!allowed.length) return next();
  const clientIp = req.headers['x-forwarded-for']?.split(',')[0]?.trim()
    || req.socket.remoteAddress;
  if (ipRangeCheck(clientIp, allowed)) return next();
  console.warn(`[ADMIN IP BLOCK] 拒否: ${clientIp}`);
  return res.status(403).json({ error: 'アクセスが許可されていません' });
}
```

全ての `/api/admin/*` エンドポイントで `adminAuth` の前に `adminIpFilter` を追加します。  
（対象エンドポイントは [server.js](../server.js) 内の `adminAuth` で検索してください）

#### .env に追記

```env
ADMIN_ALLOWED_IPS=リリビット社IP,エンジニアIP
```

#### Nginx設定（`/etc/nginx/conf.d/relybit.conf`）

```nginx
location = /admin.html {
    allow xxx.xxx.xxx.xxx;
    deny all;
}
```

---

## 3-2. DBバックアップ自動化

### 実装済み内容

以下の2系統でバックアップが稼働しています。

| 系統 | 場所 | タイミング | 保持 |
|---|---|---|---|
| アプリ内バックアップ | `/var/www/rehap/backups/rehap_YYYY-MM-DD.db` | 毎日 3:00 JST | 7日分 |
| VPSシェルスクリプト | `/var/backups/rehap/rehap_YYYY-MM-DD_HHMMSS.db.gz` | 毎日 3:00 UTC | 7日分 |

**アプリ内バックアップのコード（`server.js` の `start()` 内）：**

```javascript
cron.schedule('0 18 * * *', () => {
  const backupDir = path.join(__dirname, 'backups');
  if (!fs.existsSync(backupDir)) fs.mkdirSync(backupDir, { recursive: true });
  const dateStr = new Date(Date.now() + 9 * 60 * 60 * 1000).toISOString().split('T')[0];
  const dest = path.join(backupDir, `rehap_${dateStr}.db`);
  fs.copyFileSync(path.join(__dirname, 'rehap.db'), dest);
  // 7日分のみ保持（古いファイルを自動削除）
}, { timezone: 'UTC' });
```

**VPS側のスクリプト：** `/usr/local/bin/rehap-backup.sh`（cron登録済み）

### エンジニアへの確認依頼

- [ ] `/var/www/rehap/backups/` ディレクトリが存在し、バックアップが作成されていること
- [ ] `/var/backups/rehap/` にgzip圧縮バックアップが存在すること
- [ ] 各バックアップファイルが正常に開けること（DB破損がないこと）
- [ ] 保持件数が7件を超えたとき古いファイルが削除されること

---

## 3-3. XSS対策（Helmetによるセキュリティヘッダー）

### 実装済み内容

`helmet` パッケージをインストール済みで、以下の設定で `server.js` に組み込んでいます：

```javascript
const helmet = require('helmet');

app.use(helmet({
  contentSecurityPolicy: false,      // LINE OAuth リダイレクトと競合するため一時無効
  crossOriginEmbedderPolicy: false,
}));
```

**現時点でONになっているヘッダー：**
- `X-Content-Type-Options: nosniff`（MIMEスニッフィング防止）
- `X-Frame-Options: SAMEORIGIN`（クリックジャッキング防止）
- `X-XSS-Protection`（古いブラウザ向けXSS防止）
- `Strict-Transport-Security`（HTTPS強制）
- `Referrer-Policy`

**一時無効にしているヘッダー：**
- `Content-Security-Policy`（LINE OAuthとの互換性問題のため）

### エンジニアへの確認・対応依頼

#### 確認項目

- [ ] `curl -I https://relybit.co.jp` で上記ヘッダーが付いていること
- [ ] store.html でLINE Loginが正常に動作すること
- [ ] store-dashboard.html のChart.jsグラフが表示されること
- [ ] admin.html の全機能が動作すること

#### 追加実装依頼（任意・推奨）

現在 `contentSecurityPolicy: false` になっているCSPを、以下の内容で有効化できるか検討・実装してください。

```javascript
app.use(helmet({
  contentSecurityPolicy: {
    directives: {
      defaultSrc: ["'self'"],
      scriptSrc: [
        "'self'", "'unsafe-inline'",
        "https://cdn.jsdelivr.net",        // Chart.js
        "https://static.line-scdn.net",    // LINE SDK
        "https://access.line.me",
      ],
      styleSrc: ["'self'", "'unsafe-inline'", "https://cdn.jsdelivr.net", "https://fonts.googleapis.com"],
      fontSrc: ["'self'", "https://fonts.gstatic.com"],
      imgSrc: ["'self'", "data:", "blob:", "https://picsum.photos", "https://profile.line-scdn.net"],
      connectSrc: ["'self'", "https://api.line.me", "https://access.line.me"],
      frameSrc: ["'none'"],
      objectSrc: ["'none'"],
    },
  },
  crossOriginEmbedderPolicy: false,
}));
```

有効化後、ブラウザのコンソールにCSPエラーが出ないことを確認してください。

#### innerHTML の使用箇所レビュー（任意）

以下のファイルでユーザー入力値が `innerHTML` に渡されていないかコードレビューを行い、  
問題があれば `textContent` または `DOMPurify.sanitize()` に修正してください。

- `/public/store.html`
- `/public/store-dashboard.html`
- `/public/admin.html`

---

## 3-4. ClamAVウイルス対策

### 実装済み内容（VPS側）

| 項目 | 状態 |
|---|---|
| `clamav` + `clamav-daemon` インストール | ✅ 完了 |
| `clamav-freshclam`（ウイルス定義自動更新） | ✅ 稼働中 |
| ウイルス定義の初回更新 | ✅ 完了（daily.cvd 最新） |
| 週次スキャンcron | ✅ 登録済み（毎週日曜 2:00 UTC） |

週次スキャンスクリプト：`/usr/local/bin/rehap-security-check.sh`  
ログ出力先：`/var/log/rehap-security.log`

### 未実装：アップロードファイルのリアルタイムスキャン

店舗メニュー画像のアップロード時に、ClamAVでスキャンする処理が**未実装**です。  
以下の実装をお願いします。

#### パッケージインストール

```bash
cd /var/www/rehap
npm install clamscan
```

#### server.js への追加（初期化）

`start()` 関数の中、`getDb()` の後に追加：

```javascript
const NodeClam = require('clamscan');
let clamAV = null;

async function initClamAV() {
  try {
    const ClamScan = new NodeClam();
    clamAV = await ClamScan.init({
      removeInfected: true,
      scanLog: '/var/log/clamav/rehap-scan.log',
      clamdscan: { active: false },
      clamscan: { active: true, path: '/usr/bin/clamscan' },
    });
    console.log('[ClamAV] 初期化完了');
  } catch (e) {
    console.warn('[ClamAV] 初期化失敗（スキャンなしで継続）:', e.message);
  }
}
```

```javascript
async function start() {
  await getDb();
  await initClamAV(); // ← 追加
  // ... 既存処理 ...
}
```

#### 画像アップロードハンドラーにスキャン処理を追加

`/api/store-auth/menus/:id/image` のハンドラーで、ファイル保存後・DB更新前に以下を挿入：

```javascript
if (clamAV) {
  try {
    const { isInfected, viruses } = await clamAV.isInfected(req.file.path);
    if (isInfected) {
      console.warn(`[ClamAV] 感染検知: ${req.file.path}`, viruses);
      return res.status(400).json({ error: '不正なファイルが検出されました' });
    }
  } catch (e) {
    console.error('[ClamAV] スキャンエラー:', e.message);
    // スキャン失敗時はアップロード続行（可用性優先）
  }
}
```

### エンジニアへの確認依頼

- [ ] `clamscan --version` で `ClamAV 1.4.4` が表示されること
- [ ] `/var/log/rehap-security.log` にスキャン結果が記録されていること
- [ ] アップロードスキャン実装後、正常画像のアップロードが成功すること
- [ ] EICARテストファイル（ウイルステスト用）のアップロードが 400 で拒否されること

---

## 3-5. 脆弱性診断の仕組み化

### 実装済み内容

週次でnpm auditとClamAVスキャンを実行するスクリプトが稼働しています。

- **スクリプト：** `/usr/local/bin/rehap-security-check.sh`
- **実行タイミング：** 毎週日曜 2:00 UTC（日本時間 日曜 11:00）
- **ログ出力先：** `/var/log/rehap-security.log`

**crontab 登録内容：**

```
0 2 * * 0 /usr/local/bin/rehap-security-check.sh
```

### エンジニアへの確認依頼

- [ ] `/usr/local/bin/rehap-security-check.sh` を手動実行し、ログが生成されること
  ```bash
  /usr/local/bin/rehap-security-check.sh && cat /var/log/rehap-security.log
  ```
- [ ] `[OK]` または `[ALERT]` が適切に出力されること
- [ ] `crontab -l` でcronが登録されていること

#### 将来対応（任意）

`[ALERT]` 検知時にChatWork通知を追加することを推奨します。  
スクリプトの以下の箇所にChatWork API呼び出しを追記してください：

```bash
# TODO: [ALERT]が出たときにChatWork/Slackに通知する
# curl -X POST -H "X-ChatWorkToken: $CHATWORK_TOKEN" \
#   -d "body=【リライテン脆弱性警告】高リスク脆弱性が検出されました" \
#   "https://api.chatwork.com/v2/rooms/$CHATWORK_ROOM_ID/messages"
```

---

## 4. ファイル配置・デプロイ情報

### 4.1 現在のファイル配置

```
/var/www/rehap/
├── server.js                        ← Helmet・DBバックアップ実装済み
├── db.js
├── package.json                     ← helmet 追加済み
├── .env                             ← 各シークレット設定済み
├── backups/                         ← DBバックアップ（アプリ内）
├── node_modules/
└── public/
    └── uploads/
        └── menus/                   ← ClamAVスキャン対象

/var/backups/rehap/                  ← DBバックアップ（VPSシェル）
/usr/local/bin/rehap-backup.sh       ← DBバックアップスクリプト
/usr/local/bin/rehap-security-check.sh ← npm audit + ClamAVスキャン
/var/log/rehap-security.log          ← セキュリティログ
```

### 4.2 デプロイ手順（ローカル → VPS）

```bash
# ファイル転送
scp -i ~/.ssh/id_ed25519 server.js root@160.251.232.162:/var/www/rehap/
scp -i ~/.ssh/id_ed25519 package.json root@160.251.232.162:/var/www/rehap/

# VPSでパッケージインストール・再起動
ssh -i ~/.ssh/id_ed25519 root@160.251.232.162 'cd /var/www/rehap && npm install && pm2 restart rehap'
```

### 4.3 .env 追記項目（将来）

```env
# 3-1: 管理画面IP制限（IPアドレス確定後に追記）
ADMIN_ALLOWED_IPS=リリビット社IP,エンジニアIP

# 決済（Stripe）
STRIPE_SECRET_KEY=（今田が追加予定）
STRIPE_PAYMENT_LINK_URL=（今田が追加予定）
STRIPE_WEBHOOK_SECRET=（今田が追加予定）
```

---

## 5. 確認チェックリスト（エンジニア用）

### 動作確認

- [ ] `pm2 list` で `rehap` が `online` になっていること
- [ ] `curl -I https://relybit.co.jp` でセキュリティヘッダーが返ること（X-Frame-Options 等）
- [ ] store.html が正常に表示・LINEログインが動作すること
- [ ] admin.html が正常に動作すること

### バックアップ

- [ ] `/var/www/rehap/backups/` にファイルがあること
- [ ] `/var/backups/rehap/` にgzipファイルがあること

### ClamAV

- [ ] `systemctl status clamav-freshclam` が `active (running)` であること
- [ ] `/var/log/rehap-security.log` が存在すること（初回スクリプト手動実行後）

### 追加実装（必須）

- [ ] アップロードスキャン（3-4）の実装・テスト完了

### 追加実装（任意・推奨）

- [ ] Content-Security-Policy の有効化（3-3）
- [ ] セキュリティアラートのChatWork通知（3-5）
- [ ] 管理画面IP制限（3-1）※IP確定後

---

## 6. 問い合わせ先

| 項目 | 内容 |
|---|---|
| 依頼元 | 株式会社リリビット CEO 今田吉平 |
| メール | kippei.imada@relybit.co.jp |
| 社内連絡 | ChatWork / Teams |
| VPS SSH | `ssh -i ~/.ssh/id_ed25519 root@160.251.232.162` |
| ローカルコード | `c:/Users/kippe/OneDrive/Claud Code用フォルダ/rehap-prototype/` |
