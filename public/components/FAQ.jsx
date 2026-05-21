const faqStyles = {
  wrap: { padding: "16px 40px 40px", background: "#fff" },
  inner: { maxWidth: 820, margin: "0 auto" },
  card: {
    background: "#F5F8FC", border: "1px solid #DCE3EE", borderRadius: 10,
    padding: "26px 28px 24px",
  },
  title: { fontSize: 20, fontWeight: 900, color: "#0F2A4F", margin: "0 0 16px", letterSpacing: "0.02em", textAlign: "center" },
  list: { display: "flex", flexDirection: "column", gap: 8 },
  item: { background: "#fff", borderRadius: 6, border: "1px solid #DCE3EE", overflow: "hidden" },
  q: { display: "flex", alignItems: "center", gap: 10, padding: "12px 16px", fontSize: 13, fontWeight: 600, color: "#2A3F5F", cursor: "pointer", width: "100%", textAlign: "left", background: "#fff", border: 0 },
  qLetter: { color: "#1FA89D", fontWeight: 800, fontSize: 14, fontFamily: "Inter, sans-serif" },
  qText: { flex: 1 },
  chev: { color: "#1FA89D", fontSize: 13, transition: "transform 0.2s" },
  a: { padding: "0 16px 14px 38px", fontSize: 12, color: "#5A6B85", lineHeight: 1.85 },
};

const FAQ_ITEMS = [
  { q: "専門的な知識は必要ですか？", a: "不要です。QRコードを設置するだけで自動で動きます。" },
  { q: "掲載される商品はどんなものですか？", a: "健康・美容・ライフスタイル関連の商品が中心です。店舗の雰囲気に合わないものは掲載しません。" },
  { q: "解約はできますか？", a: "いつでも解約可能です。違約金等はありません。" },
  { q: "LINEは必須ですか？", a: "ユーザーのLINEログインで来店を個人特定します。店舗側はLINEアカウント不要です。" },
  { q: "どんな業種でも導入できますか？", a: "来店型のビジネスであれば業種を問わず導入いただけます。" },
];

const { useState: useStateFAQ2 } = React;

function FAQ() {
  const [open, setOpen] = useStateFAQ2(null);
  return (
    <section style={faqStyles.wrap}>
      <div style={faqStyles.inner}>
        <div style={faqStyles.card}>
          <h2 style={faqStyles.title}>よくあるご質問</h2>
          <div style={faqStyles.list}>
            {FAQ_ITEMS.map((f, i) => {
              const isOpen = open === i;
              return (
                <div key={i} style={faqStyles.item}>
                  <button style={faqStyles.q} onClick={() => setOpen(isOpen ? null : i)}>
                    <span style={faqStyles.qLetter}>Q.</span>
                    <span style={faqStyles.qText}>{f.q}</span>
                    <span style={{ ...faqStyles.chev, transform: isOpen ? "rotate(180deg)" : "none" }}>⌄</span>
                  </button>
                  {isOpen && <div style={faqStyles.a}>{f.a}</div>}
                </div>
              );
            })}
          </div>
        </div>
      </div>
    </section>
  );
}

window.FAQ = FAQ;
