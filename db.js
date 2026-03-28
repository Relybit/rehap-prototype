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
      qr_image TEXT
    );
    CREATE TABLE IF NOT EXISTS products (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      store_id TEXT NOT NULL,
      name TEXT NOT NULL,
      description TEXT,
      affiliate_url TEXT NOT NULL,
      image_url TEXT
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
  `);

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
