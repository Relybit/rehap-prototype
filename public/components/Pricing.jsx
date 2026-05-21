const pricingStyles = {
  wrap: { padding: "32px 40px 40px", background: "#fff" },
  inner: { maxWidth: 720, margin: "0 auto" },
  card: {
    background: "#E8F6F4", border: "1px solid #C9EAE6", borderRadius: 10,
    padding: "28px 32px 24px",
  },
  title: { fontSize: 19, fontWeight: 800, color: "#0F2A4F", textAlign: "center", margin: "0 0 16px" },
  priceRow: { display: "flex", alignItems: "center", gap: 8, padding: "10px 0", borderBottom: "1px dashed #C9EAE6", fontSize: 14, fontWeight: 600, color: "#2A3F5F" },
  bullet: { color: "#1FA89D", fontWeight: 800 },
  bigNum: { fontSize: 32, fontWeight: 900, color: "#1FA89D", letterSpacing: "-0.01em" },
  bigUnit: { fontSize: 15, color: "#1FA89D", fontWeight: 700 },
  bigTax: { fontSize: 12, color: "#8896AB" },
  note: { fontSize: 11, color: "#8896AB", textAlign: "center", marginTop: 14, lineHeight: 1.7 },
};

function Pricing() {
  return (
    <section style={pricingStyles.wrap}>
      <div style={pricingStyles.inner}>
        <div style={pricingStyles.card}>
          <h3 style={pricingStyles.title}>シンプルな料金体系</h3>
          <div style={pricingStyles.priceRow}><span style={pricingStyles.bullet}>●</span><span>初月無料</span></div>
          <div style={{ ...pricingStyles.priceRow, justifyContent: "flex-start" }}>
            <span style={pricingStyles.bullet}>●</span>
            <span>2ヶ月目から　月額</span>
            <span style={pricingStyles.bigNum}>980</span>
            <span style={pricingStyles.bigUnit}>円</span>
            <span style={pricingStyles.bigTax}>(税込)</span>
          </div>
          <div style={pricingStyles.priceRow}><span style={pricingStyles.bullet}>●</span><span>初期費用なし</span></div>
          <div style={{ ...pricingStyles.priceRow, borderBottom: "none" }}><span style={pricingStyles.bullet}>●</span><span>解約はいつでも可能</span></div>
          <p style={pricingStyles.note}>
            成果報酬型のため、商品が売れない限り追加コストは発生しません。
          </p>
        </div>
      </div>
    </section>
  );
}

window.Pricing = Pricing;
