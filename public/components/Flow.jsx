const flowStyles = {
  wrap: { padding: "16px 40px 40px", background: "#fff" },
  inner: { maxWidth: 900, margin: "0 auto" },
  card: {
    background: "#fff", border: "1px solid #DCE3EE", borderRadius: 10,
    padding: "26px 28px 24px",
  },
  title: { fontSize: 19, fontWeight: 800, color: "#0F2A4F", textAlign: "center", margin: "0 0 20px" },
  steps: { display: "grid", gridTemplateColumns: "repeat(5, 1fr)", gap: 4 },
  step: { display: "flex", flexDirection: "column", alignItems: "center", textAlign: "center", fontSize: 11, color: "#2A3F5F", gap: 8 },
  stepLabel: { color: "#1FA89D", fontWeight: 800, fontSize: 12, letterSpacing: "0.06em" },
  stepCircle: { width: 60, height: 60, borderRadius: "50%", background: "#E8F6F4", display: "flex", alignItems: "center", justifyContent: "center", color: "#1FA89D", border: "1.5px solid #C9EAE6" },
  stepText: { fontWeight: 600, lineHeight: 1.4 },
  arrow: { position: "absolute", top: 30, right: -8, color: "#C9EAE6", fontSize: 18, fontWeight: 700 },
  stepWrap: { position: "relative" },
};

function Flow() {
  const steps = [
    { l: "STEP1", t: <>お問い合わせ<br />(フォーム送信)</>, i: (
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
        <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>
      </svg>
    )},
    { l: "STEP2", t: <>担当者よりご連絡<br />(1〜2営業日以内)</>, i: (
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
        <circle cx="12" cy="9" r="3.5"/><path d="M5 21c1-3.5 4-5 7-5s6 1.5 7 5"/>
      </svg>
    )},
    { l: "STEP3", t: <>登録案内・<br />初期設定</>, i: (
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
        <rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h4"/>
      </svg>
    )},
    { l: "STEP4", t: "QRコード発行", i: (
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><path d="M14 14h3v3M19 14v7M14 19h3"/>
      </svg>
    )},
    { l: "STEP5", t: <>QR設置・<br />運用開始</>, i: (
      <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7">
        <path d="M3 21h18"/><path d="M5 21V8l7-5 7 5v13"/><rect x="9" y="12" width="6" height="9"/>
      </svg>
    )},
  ];
  return (
    <section style={flowStyles.wrap}>
      <div style={flowStyles.inner}>
        <div style={flowStyles.card}>
          <h3 style={flowStyles.title}>はじめるまでの流れ</h3>
          <div style={flowStyles.steps} data-grid="steps">
            {steps.map((s, i) => (
              <div key={i} style={flowStyles.stepWrap}>
                <div style={flowStyles.step}>
                  <div style={flowStyles.stepLabel}>{s.l}</div>
                  <div style={flowStyles.stepCircle}>{s.i}</div>
                  <div style={flowStyles.stepText}>{s.t}</div>
                </div>
                {i < steps.length - 1 && <div style={flowStyles.arrow}>›</div>}
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

window.Flow = Flow;
