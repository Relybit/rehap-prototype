const initSqlJs = require('sql.js');
const fs = require('fs');
const DB_PATH = __dirname + '/rehap.db';

let db;

async function getDb() {
  if (db) return db;

  const SQL = await initSqlJs();

  if (fs.existsSync(DB_PATH)) {
    const fileBuffer = fs.readFileSync(DB_PATH);
    db = new SQL.Database(fileBuffer);
  } else {
    db = new SQL.Database();
  }

  db.run(`
    CREATE TABLE IF NOT EXISTS stores (
      id TEXT PRIMARY KEY,
      name TEXT NOT NULL,
      description TEXT,
      booking_url TEXT,
      password TEXT DEFAULT '1234',
      qr_image TEXT,
      qr_sent INTEGER DEFAULT 0
    );
    CREATE TABLE IF NOT EXISTS products (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      name TEXT NOT NULL,
      description TEXT,
      affiliate_url TEXT NOT NULL,
      image_url TEXT,
      display_order INTEGER
    );
    CREATE TABLE IF NOT EXISTS visits (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      user_id TEXT NOT NULL,
      visited_at TEXT NOT NULL,
      UNIQUE(store_id, user_id, visited_at)
    );
    CREATE TABLE IF NOT EXISTS coupons (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      title TEXT NOT NULL,
      description TEXT,
      required_visits INTEGER DEFAULT 5
    );
    CREATE TABLE IF NOT EXISTS coupon_usages (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      user_id TEXT NOT NULL,
      coupon_id INTEGER NOT NULL,
      required_visits INTEGER NOT NULL,
      used_at TEXT NOT NULL
    );
    CREATE TABLE IF NOT EXISTS user_purchase_coupons (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      user_id TEXT NOT NULL,
      title TEXT NOT NULL,
      description TEXT,
      note TEXT,
      granted_at TEXT NOT NULL,
      expires_at TEXT,
      used_at TEXT
    );
  `);

  // マイグレーション
  try { db.run(`ALTER TABLE products ADD COLUMN display_order INTEGER`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN qr_sent INTEGER DEFAULT 0`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN google_maps_url TEXT`); } catch(e) {}
  try { db.run(`CREATE TABLE IF NOT EXISTS coupon_usages (id INTEGER PRIMARY KEY AUTOINCREMENT, store_id TEXT NOT NULL, user_id TEXT NOT NULL, coupon_id INTEGER NOT NULL, required_visits INTEGER NOT NULL, used_at TEXT NOT NULL)`); } catch(e) {}
  try { db.run(`CREATE TABLE IF NOT EXISTS user_purchase_coupons (id INTEGER PRIMARY KEY AUTOINCREMENT, store_id TEXT NOT NULL, user_id TEXT NOT NULL, title TEXT NOT NULL, description TEXT, note TEXT, granted_at TEXT NOT NULL, expires_at TEXT, used_at TEXT)`); } catch(e) {}
  try { db.run(`ALTER TABLE visits ADD COLUMN line_name TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE user_purchase_coupons ADD COLUMN notified_at TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN email TEXT`); } catch(e) {}
  try { db.run(`CREATE TABLE IF NOT EXISTS campaign_coupons (id INTEGER PRIMARY KEY AUTOINCREMENT, store_id TEXT NOT NULL, title TEXT NOT NULL, description TEXT, starts_at TEXT NOT NULL, ends_at TEXT NOT NULL, created_at TEXT NOT NULL)`); } catch(e) {}
  try { db.run(`CREATE TABLE IF NOT EXISTS campaign_coupon_usages (id INTEGER PRIMARY KEY AUTOINCREMENT, campaign_coupon_id INTEGER NOT NULL, store_id TEXT NOT NULL, user_id TEXT NOT NULL, used_at TEXT NOT NULL)`); } catch(e) {}
  try { db.run(`CREATE TABLE IF NOT EXISTS menus (id INTEGER PRIMARY KEY AUTOINCREMENT, store_id TEXT NOT NULL, name TEXT NOT NULL, description TEXT, price TEXT, duration TEXT, booking_url TEXT, display_order INTEGER)`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN referral_code TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN referred_by TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN is_free INTEGER DEFAULT 0`); } catch(e) {}
  try { db.run(`ALTER TABLE menus ADD COLUMN image_url TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN stripe_customer_id TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN stripe_subscription_id TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN subscription_status TEXT DEFAULT 'pending'`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN cpa INTEGER`); } catch(e) {}
  try { db.run(`ALTER TABLE stores ADD COLUMN conversion_point TEXT`); } catch(e) {}
  try { db.run(`ALTER TABLE products ADD COLUMN cpa INTEGER`); } catch(e) {}
  try { db.run(`ALTER TABLE products ADD COLUMN conversion_point TEXT`); } catch(e) {}

  // referral_code 未設定の店舗に自動生成
  const storesWithoutCode = db.exec("SELECT id FROM stores WHERE referral_code IS NULL OR referral_code = ''");
  if (storesWithoutCode.length && storesWithoutCode[0].values.length) {
    for (const [id] of storesWithoutCode[0].values) {
      const code = Math.random().toString(36).substring(2, 8).toUpperCase();
      db.run('UPDATE stores SET referral_code = ? WHERE id = ?', [code, id]);
    }
    save();
  }

  // サンプルデータ
  const exists = db.exec("SELECT id FROM stores WHERE id = 'store001'");
  if (!exists.length || !exists[0].values.length) {
    db.run(`INSERT INTO stores (id, name, description, booking_url, password) VALUES ('store001', 'リラックス整体院', '肩こり・腰痛専門の整体院です。', 'https://example.com/booking', '1234')`);
    db.run(`INSERT INTO products (store_id, name, description, affiliate_url, image_url) VALUES ('store001', 'プロテインサプリ', '運動後のリカバリーに最適', 'https://example.com/product1', 'https://picsum.photos/seed/protein/200/200')`);
    db.run(`INSERT INTO products (store_id, name, description, affiliate_url, image_url) VALUES ('store001', 'マッサージオイル', 'プロも使う本格オイル', 'https://example.com/product2', 'https://picsum.photos/seed/oil/200/200')`);
    db.run(`INSERT INTO coupons (store_id, title, description, required_visits) VALUES ('store001', '5回来店クーポン', '次回施術10%オフ', 5)`);
    db.run(`INSERT INTO coupons (store_id, title, description, required_visits) VALUES ('store001', '10回来店クーポン', '次回施術20%オフ', 10)`);
    save();
  }

  return db;
}

function save() {
  if (!db) return;
  const data = db.export();
  fs.writeFileSync(DB_PATH, Buffer.from(data));
}

module.exports = { getDb, save };
