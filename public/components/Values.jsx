const valuesStyles = {
  wrap: { padding: "44px 40px 36px", background: "#F5F8FC" },
  head: { textAlign: "center", marginBottom: 26 },
  title: { fontSize: 26, fontWeight: 900, color: "#0F2A4F", margin: 0, letterSpacing: "0.02em" },
  accent: { color: "#1FA89D" },
  big: { fontSize: 32, color: "#1FA89D", fontWeight: 900, padding: "0 4px" },
  grid: { display: "grid", gridTemplateColumns: "1fr 1fr", gap: 16 },
  card: {
    background: "#fff", border: "1px solid #C9EAE6", borderRadius: 10,
    padding: "20px 22px 18px",
    position: "relative",
    display: "flex", gap: 14,
  },
  badge: {
    background: "#1FA89D", color: "#fff",
    width: 38, minHeight: 70, borderRadius: 6,
    display: "flex", flexDirection: "column", alignItems: "center", justifyContent: "center",
    flexShrink: 0,
    padding: "8px 0",
  },
  badgeLabel: { fontSize: 9, fontWeight: 700, letterSpacing: "0.05em", marginBottom: 4 },
  badgeNum: { fontSize: 22, fontWeight: 900, lineHeight: 1 },
  cBody: { flex: 1 },
  cTitle: { fontSize: 17, fontWeight: 800, color: "#0F2A4F", margin: "0 0 12px", lineHeight: 1.4 },
  body: { display: "grid", gridTemplateColumns: "1.4fr 1fr", gap: 10, alignItems: "start" },
  desc: { fontSize: 11.5, lineHeight: 1.85, color: "#2A3F5F", margin: 0 },
  imgBox: {
    aspectRatio: "1/1", borderRadius: 6,
    background: "linear-gradient(135deg, #e8eef5 0%, #b8c5d6 100%)",
    position: "relative", overflow: "hidden",
  },
  imgStripe: { position: "absolute", inset: 0, backgroundImage: "repeating-linear-gradient(45deg, rgba(255,255,255,0.08) 0 6px, rgba(0,0,0,0.04) 6px 12px)" },
  imgLabel: { position: "absolute", bottom: 5, left: 5, fontFamily: "ui-monospace, Menlo, monospace", fontSize: 9, color: "#5A6B85", background: "rgba(255,255,255,0.7)", padding: "2px 5px", borderRadius: 3 },
  chartBox: { aspectRatio: "1/1", borderRadius: 6, background: "#E8F6F4", padding: 8, display: "flex", flexDirection: "column", justifyContent: "space-between" },
  chartHead: { height: 4, background: "#C9EAE6", borderRadius: 2, marginBottom: 6, width: "70%" },
  bars: { display: "flex", alignItems: "flex-end", gap: 4, height: 50 },
  bar: { flex: 1, background: "#1FA89D", borderRadius: 2 },
  barAlt: { flex: 1, background: "#C9EAE6", borderRadius: 2 },
  donut: { width: 30, height: 30, borderRadius: "50%", background: "conic-gradient(#1FA89D 0 60%, #C9EAE6 0 100%)", margin: "auto 0" },
  chartFoot: { display: "flex", alignItems: "center", gap: 6 },
};

function Values() {
  return (
    <section style={valuesStyles.wrap}>
      <div style={valuesStyles.head}>
        <h2 style={valuesStyles.title}>
          <span style={valuesStyles.accent}>REHAP</span>が選ばれる<span style={valuesStyles.big}>2</span>つの価値
        </h2>
      </div>
      <div style={valuesStyles.grid} data-grid="values">
        <div style={valuesStyles.card}>
          <div style={valuesStyles.badge}>
            <div style={valuesStyles.badgeLabel}>価値</div>
            <div style={valuesStyles.badgeNum}>1</div>
          </div>
          <div style={valuesStyles.cBody}>
            <h3 style={valuesStyles.cTitle}>来店データで、<br />顧客が資産になる</h3>
            <div style={valuesStyles.body}>
              <p style={valuesStyles.desc}>
                QRコードを設置するだけで来店客を自動記録。リピート率・離脱ユーザー・曜日別来店傾向など、これまで見えなかった「お客様の動き」が一目でわかります。クーポン・スタンプカードで再来店の仕組みを手間なく作れ、顧客単価の向上やリピート施策を、感覚ではなく数字で動かせるようになります。
              </p>
              <div style={valuesStyles.chartBox}>
                <div>
                  <div style={valuesStyles.chartHead}></div>
                  <div style={valuesStyles.bars}>
                    <div style={{ ...valuesStyles.bar, height: "30%" }}></div>
                    <div style={{ ...valuesStyles.barAlt, height: "55%" }}></div>
                    <div style={{ ...valuesStyles.bar, height: "70%" }}></div>
                    <div style={{ ...valuesStyles.barAlt, height: "45%" }}></div>
                    <div style={{ ...valuesStyles.bar, height: "85%" }}></div>
                  </div>
                </div>
                <div style={valuesStyles.chartFoot}>
                  <div style={valuesStyles.donut}></div>
                  <div style={{ flex: 1 }}>
                    <div style={{ height: 3, background: "#C9EAE6", borderRadius: 2, marginBottom: 3 }}></div>
                    <div style={{ height: 3, background: "#C9EAE6", borderRadius: 2, width: "70%" }}></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div style={valuesStyles.card}>
          <div style={valuesStyles.badge}>
            <div style={valuesStyles.badgeLabel}>価値</div>
            <div style={valuesStyles.badgeNum}>2</div>
          </div>
          <div style={valuesStyles.cBody}>
            <h3 style={valuesStyles.cTitle}>成果報酬型の副収益で、<br />施術外の収入を作る</h3>
            <div style={valuesStyles.body}>
              <p style={valuesStyles.desc}>
                来店したユーザーに、店舗の雰囲気に合った商品・サービスをご案内。購入が発生したときだけ報酬が入る成果報酬型なので、在庫リスクはゼロ。「売る」のではなく「紹介する」感覚で、店舗の信頼を損なわずに収益が生まれます。
              </p>
              <div style={valuesStyles.imgBox}>
                <div style={valuesStyles.imgStripe}></div>
                <div style={valuesStyles.imgLabel}>// product photo</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

window.Values = Values;
