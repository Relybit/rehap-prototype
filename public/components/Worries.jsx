const worriesStyles = {
  wrap: { padding: "44px 40px 44px", background: "#0F2A4F", color: "#fff" },
  inner: { maxWidth: 900, margin: "0 auto" },
  title: { fontSize: 24, fontWeight: 800, color: "#fff", margin: "0 0 20px", letterSpacing: "0.02em", textAlign: "center" },
  list: { display: "grid", gridTemplateColumns: "1fr 1fr", gap: 10 },
  row: {
    display: "flex", alignItems: "center", gap: 14,
    background: "#163B6D", borderRadius: 6,
    padding: "14px 18px",
    border: "1px solid #1F4A85",
  },
  check: {
    width: 22, height: 22, borderRadius: "50%",
    background: "#1FA89D", color: "#fff",
    display: "flex", alignItems: "center", justifyContent: "center",
    fontSize: 12, fontWeight: 800, flexShrink: 0,
  },
  rowText: { fontSize: 13, fontWeight: 500, color: "#E1E8F2", lineHeight: 1.6, margin: 0 },
};

const WORRIES = [
  "集客にお金をかけても、リピートにつながらない",
  "来店客のデータが取れず、顧客単価向上やリピート施策が打てていない",
  "売上がサービス料金だけに依存している",
  "物販をやりたいが、在庫リスクが怖い",
];

function Worries() {
  return (
    <section style={worriesStyles.wrap}>
      <div style={worriesStyles.inner}>
        <h2 style={worriesStyles.title}>こんなお悩みはありませんか？</h2>
        <div style={worriesStyles.list} data-grid="worries">
          {WORRIES.map((w, i) => (
            <div key={i} style={worriesStyles.row}>
              <div style={worriesStyles.check}>✓</div>
              <p style={worriesStyles.rowText}>{w}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

window.Worries = Worries;
