const heroStyles = {
  wrap: {
    position: "relative",
    background: "linear-gradient(180deg, #0F2A4F 0%, #163B6D 100%)",
    overflow: "hidden",
    paddingBottom: 0,
  },
  glow: {
    position: "absolute", inset: 0,
    background: "radial-gradient(ellipse at 80% 30%, rgba(31, 168, 157, 0.35) 0%, transparent 55%)",
    pointerEvents: "none",
  },
  inner: { position: "relative", padding: "22px 40px 8px" },
  topbar: { display: "flex", alignItems: "center", justifyContent: "space-between" },
  logoBox: { background: "#fff", padding: "8px 14px", borderRadius: 8, display: "inline-block" },
  hero: {
    position: "relative",
    display: "grid", gridTemplateColumns: "1.1fr 1fr",
    gap: 24, alignItems: "center",
    padding: "32px 40px 56px",
  },
  h1: {
    fontSize: 46, lineHeight: 1.25, fontWeight: 900,
    color: "#fff", letterSpacing: "0.01em", margin: "8px 0 22px",
  },
  lead: { color: "#C9D6EA", fontSize: 14, lineHeight: 1.9, fontWeight: 500, margin: "0 0 28px" },
  cta: {
    display: "inline-flex", alignItems: "center", justifyContent: "space-between",
    gap: 12, background: "#1FA89D", color: "#fff",
    fontWeight: 700, fontSize: 16, padding: "14px 28px", borderRadius: 999,
    boxShadow: "0 8px 18px rgba(31, 168, 157, 0.35)", minWidth: 240,
    textDecoration: "none",
  },
  rightWrap: { position: "relative", height: 280 },
  phone: {
    position: "absolute", left: "8%", top: "5%",
    width: 120, height: 240, background: "#1A1A1A", borderRadius: 22,
    padding: 5, transform: "rotate(-4deg)",
    boxShadow: "0 18px 40px rgba(0,0,0,0.4)",
  },
  phoneScreen: { width: "100%", height: "100%", background: "#E8F6F4", borderRadius: 18, overflow: "hidden", position: "relative" },
  phoneHeader: { background: "#1FA89D", color: "#fff", fontSize: 9, fontWeight: 700, textAlign: "center", padding: "16px 0 8px" },
  phoneCard: { margin: 6, background: "#fff", borderRadius: 6, padding: 6, fontSize: 8, color: "#0F2A4F" },
  qrStand: {
    position: "absolute", right: "5%", bottom: "5%",
    width: 160, background: "#fff", borderRadius: 6, padding: "8px 8px 12px",
    boxShadow: "0 12px 30px rgba(0,0,0,0.25)", transform: "rotate(3deg)",
  },
  standTop: { background: "#0F2A4F", color: "#fff", fontSize: 11, fontWeight: 700, textAlign: "center", padding: "5px 4px", borderRadius: 3, marginBottom: 6 },
  qrBox: {
    width: "100%", aspectRatio: "1/1",
    background: "conic-gradient(from 0deg at 50% 50%, #111 25%, #fff 0 50%, #111 0 75%, #fff 0)",
    backgroundSize: "10px 10px", border: "3px solid #fff", outline: "1px solid #111", borderRadius: 2,
  },
  standIcons: { display: "flex", justifyContent: "space-around", marginTop: 6, color: "#1FA89D", fontSize: 9 },
};

function Hero() {
  return (
    <section style={heroStyles.wrap}>
      <div style={heroStyles.glow}></div>
      <div style={heroStyles.inner}>
        <div style={heroStyles.topbar}>
          <div style={heroStyles.logoBox}><Logo size={1.2} /></div>
        </div>
      </div>
      <div style={heroStyles.hero} data-grid="hero">
        <div>
          <h1 style={heroStyles.h1}>来店が、<br />収益になる。</h1>
          <p style={heroStyles.lead}>
            実店舗の来店客を活かした、新しい副収益のかたち。<br />
            在庫リスクなし、成果報酬型。QRコード1枚から始められる。
          </p>
          <a href="#contact" style={heroStyles.cta}>
            <span style={{ flex: 1, textAlign: "left" }}>無料で相談する</span>
            <span style={{ display: "inline-flex", alignItems: "center", justifyContent: "center", width: 22, height: 22, borderRadius: 999, background: "rgba(255,255,255,0.22)", fontSize: 12 }}>›</span>
          </a>
        </div>
        <div style={heroStyles.rightWrap}>
          <div style={heroStyles.phone}>
            <div style={heroStyles.phoneScreen}>
              <div style={heroStyles.phoneHeader}>REHAP</div>
              <div style={heroStyles.phoneCard}>
                <div style={{ fontWeight: 700 }}>ようこそ！</div>
                <div style={{ color: "#5A6B85", marginTop: 3 }}>+10pt</div>
              </div>
              <div style={heroStyles.phoneCard}>
                <div style={{ fontWeight: 700 }}>本日のクーポン</div>
                <div style={{ height: 3, background: "#C9EAE6", margin: "3px 0", borderRadius: 2 }}></div>
                <div style={{ height: 3, background: "#C9EAE6", borderRadius: 2 }}></div>
              </div>
            </div>
          </div>
          <div style={heroStyles.qrStand}>
            <div style={heroStyles.standTop}>REHAP<br />来店登録はこちら</div>
            <div style={heroStyles.qrBox}></div>
            <div style={heroStyles.standIcons}><span>◆</span><span>◆</span><span>◆</span><span>◆</span></div>
          </div>
        </div>
      </div>
    </section>
  );
}

window.Hero = Hero;
