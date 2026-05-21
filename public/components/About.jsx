const aboutStyles = {
  wrap: { padding: "44px 40px 40px", background: "#fff" },
  inner: { maxWidth: 820, margin: "0 auto", textAlign: "center" },
  title: { fontSize: 28, fontWeight: 900, color: "#0F2A4F", margin: "0 0 18px", letterSpacing: "0.02em" },
  accent: { color: "#1FA89D" },
  p: { fontSize: 14, lineHeight: 2, color: "#2A3F5F", margin: "0 0 12px", fontWeight: 500 },
  strong: { color: "#0F2A4F", fontWeight: 800 },
};

function About() {
  return (
    <section style={aboutStyles.wrap}>
      <div style={aboutStyles.inner}>
        <h2 style={aboutStyles.title}>
          <span style={aboutStyles.accent}>REHAP</span>とは
        </h2>
        <p style={aboutStyles.p}>
          REHAP（リハップ）は、実店舗と広告主をつなぐ
          <strong style={aboutStyles.strong}>成果報酬型パートナーサービス</strong>です。
        </p>
        <p style={aboutStyles.p}>
          従来のアフィリエイトはWebメディア・SNSが中心でしたが、REHAPでは「リアル店舗 × 成果報酬」という新しい形で、店舗の来店客・既存顧客・ファン層を活かした収益化を実現します。
        </p>
        <p style={aboutStyles.p}>
          店舗の信頼・価値を守りながら、無理なく収益を生み出すことを目的として設計されています。
        </p>
      </div>
    </section>
  );
}

window.About = About;
