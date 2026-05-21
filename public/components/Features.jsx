const featuresStyles = {
  wrap: { padding: "32px 40px 36px", background: "#fff" },
  head: { textAlign: "center", marginBottom: 26 },
  title: { fontSize: 26, fontWeight: 900, color: "#0F2A4F", margin: 0, letterSpacing: "0.02em" },
  accent: { color: "#1FA89D" },
  grid: { display: "grid", gridTemplateColumns: "repeat(4, 1fr)", gap: 12 },
  card: {
    position: "relative",
    background: "#fff",
    border: "1px solid #DCE3EE",
    borderRadius: 8,
    padding: "26px 12px 18px",
    minHeight: 170,
    display: "flex", flexDirection: "column", alignItems: "center", textAlign: "center",
    gap: 10,
  },
  num: {
    position: "absolute", top: -12, left: 12,
    width: 26, height: 26, borderRadius: "50%",
    background: "#1FA89D", color: "#fff",
    display: "flex", alignItems: "center", justifyContent: "center",
    fontWeight: 800, fontSize: 12,
    boxShadow: "0 4px 8px rgba(31, 168, 157, 0.3)",
  },
  iconImg: { width: 60, height: 60, objectFit: "contain", display: "block" },
  text: { fontSize: 13, fontWeight: 700, color: "#0F2A4F", lineHeight: 1.5, margin: 0 },
  sub: { fontSize: 10, color: "#8896AB", marginTop: 4, fontWeight: 500 },
};

function FCard({ n, iconSrc, text, sub }) {
  return (
    <div style={featuresStyles.card}>
      <div style={featuresStyles.num}>{n}</div>
      <img src={iconSrc} alt="" style={featuresStyles.iconImg} />
      <div>
        <p style={featuresStyles.text}>{text}</p>
        {sub && <div style={featuresStyles.sub}>{sub}</div>}
      </div>
    </div>
  );
}

function Features() {
  return (
    <section style={featuresStyles.wrap}>
      <div style={featuresStyles.head}>
        <h2 style={featuresStyles.title}><span style={featuresStyles.accent}>REHAP</span>でできること</h2>
      </div>
      <div style={featuresStyles.grid} data-grid="features">
        <FCard n={1} text={<>QRコードで<br />来店を自動記録</>} iconSrc="assets/icon_09_person_lock.png" />
        <FCard n={2} text={<>デジタル<br />スタンプカード</>} iconSrc="assets/icon_08_book_open.png" />
        <FCard n={3} text={<>来店回数に応じた<br />クーポン自動配布</>} iconSrc="assets/icon_07_box_gift.png" />
        <FCard n={4} text={<>成果報酬型の商品PR<br />(在庫リスクなし)</>} iconSrc="assets/icon_06_coins_database.png" />
        <FCard n={5} text={<>来店分析ダッシュボード</>} sub="(リピート率・曜日別・離脱ユーザー など)" iconSrc="assets/icon_03_lock_person.png" />
        <FCard n={6} text={<>Googleマップ<br />口コミ誘導</>} iconSrc="assets/icon_04_location_pin.png" />
        <FCard n={7} text={<>公式サイト・メディアへの<br />無料掲載</>} iconSrc="assets/icon_02_shop_register.png" />
        <FCard n={8} text={<>Webマーケティング<br />無料相談</>} iconSrc="assets/icon_05_person_group.png" />
      </div>
    </section>
  );
}

window.Features = Features;
