const { useState: useStateCF } = React;

const cfStyles = {
  wrap: { padding: "16px 40px 40px", background: "#fff", scrollMarginTop: 20 },
  inner: { maxWidth: 820, margin: "0 auto" },
  formCard: {
    background: "#1FA89D", borderRadius: 10,
    padding: "26px 32px 28px",
    color: "#fff",
  },
  formTitle: { fontSize: 22, fontWeight: 900, color: "#fff", margin: "0 0 4px", textAlign: "center" },
  formSub: { fontSize: 12, color: "#E8F6F4", textAlign: "center", margin: "0 0 18px" },
  formGrid: { display: "grid", gridTemplateColumns: "140px 1fr", gap: "12px 14px", alignItems: "center" },
  label: { display: "flex", alignItems: "center", gap: 6, fontSize: 13, fontWeight: 700, color: "#fff" },
  required: { background: "#D63327", color: "#fff", fontSize: 9, fontWeight: 700, padding: "1px 5px", borderRadius: 3 },
  input: { width: "100%", border: 0, borderRadius: 4, padding: "9px 11px", fontSize: 13, background: "#fff", outline: "none", color: "#0F2A4F" },
  select: { width: "100%", border: 0, borderRadius: 4, padding: "9px 11px", fontSize: 13, background: "#fff", outline: "none", appearance: "none", color: "#0F2A4F",
    backgroundImage: "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'><path d='M1 1l5 5 5-5' stroke='%231FA89D' stroke-width='2' fill='none'/></svg>\")",
    backgroundRepeat: "no-repeat", backgroundPosition: "right 10px center", paddingRight: 28,
  },
  textarea: { width: "100%", border: 0, borderRadius: 4, padding: "9px 11px", fontSize: 13, background: "#fff", outline: "none", resize: "vertical", minHeight: 70, fontFamily: "inherit", color: "#0F2A4F" },
  submitWrap: { textAlign: "center", marginTop: 18 },
  submit: {
    background: "#0F2A4F", color: "#fff",
    padding: "13px 56px", borderRadius: 999,
    fontWeight: 700, fontSize: 15,
    boxShadow: "0 6px 14px rgba(15, 42, 79, 0.35)",
    display: "inline-flex", alignItems: "center", gap: 10, border: 0, cursor: "pointer",
  },
  thanks: { textAlign: "center", padding: "30px 16px", color: "#fff" },
};

function ContactForm() {
  const [data, setData] = useStateCF({ company: "", industry: "", name: "", phone: "", email: "", message: "" });
  const [sent, setSent] = useStateCF(false);
  const set = (k) => (e) => setData({ ...data, [k]: e.target.value });

  return (
    <section id="contact" style={cfStyles.wrap}>
      <div style={cfStyles.inner}>
        <div style={cfStyles.formCard}>
          <h2 style={cfStyles.formTitle}>まずは無料で相談する</h2>
          <p style={cfStyles.formSub}>お気軽にお問い合わせください。1〜2営業日以内にご連絡します。</p>
          {sent ? (
            <div style={cfStyles.thanks}>
              <div style={{ fontSize: 36, color: "#fff", marginBottom: 8 }}>✓</div>
              <div style={{ fontWeight: 800, fontSize: 17 }}>送信ありがとうございました</div>
              <div style={{ color: "#E8F6F4", fontSize: 12, marginTop: 6 }}>担当者より1〜2営業日以内にご連絡いたします。</div>
            </div>
          ) : (
            <React.Fragment>
              <div style={cfStyles.formGrid} data-grid="form">
                <div style={cfStyles.label}>店舗名 <span style={cfStyles.required}>必須</span></div>
                <input style={cfStyles.input} placeholder="例) リハップ整体院" value={data.company} onChange={set("company")} />

                <div style={cfStyles.label}>業種 <span style={cfStyles.required}>必須</span></div>
                <select style={cfStyles.select} value={data.industry} onChange={set("industry")}>
                  <option value="">選択してください</option>
                  <option>整体院</option><option>サロン</option><option>ジム</option><option>飲食店</option><option>その他</option>
                </select>

                <div style={cfStyles.label}>お名前 <span style={cfStyles.required}>必須</span></div>
                <input style={cfStyles.input} placeholder="例) 山田 太郎" value={data.name} onChange={set("name")} />

                <div style={cfStyles.label}>メールアドレス <span style={cfStyles.required}>必須</span></div>
                <input style={cfStyles.input} type="email" placeholder="例) yamada@example.com" value={data.email} onChange={set("email")} />

                <div style={cfStyles.label}>電話番号</div>
                <input style={cfStyles.input} type="tel" placeholder="例) 090-1234-5678" value={data.phone} onChange={set("phone")} />

                <div style={cfStyles.label}>ご質問・ご要望</div>
                <textarea style={cfStyles.textarea} placeholder="ご自由にご記入ください" value={data.message} onChange={set("message")} />
              </div>
              <div style={cfStyles.submitWrap}>
                <button style={cfStyles.submit} onClick={() => setSent(true)}>
                  <span>無料で相談する</span>
                  <span style={{ display: "inline-flex", alignItems: "center", justifyContent: "center", width: 22, height: 22, borderRadius: 999, background: "rgba(255,255,255,0.22)", fontSize: 12 }}>›</span>
                </button>
              </div>
            </React.Fragment>
          )}
        </div>
      </div>
    </section>
  );
}

window.ContactForm = ContactForm;
