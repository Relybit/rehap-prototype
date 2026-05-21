const footerStyles = {
  wrap: {
    background: "#0A1F3D",
    padding: "20px 40px",
    display: "flex", alignItems: "center", justifyContent: "space-between",
    fontSize: 11, color: "#C9D6EA",
  },
  meta: { display: "flex", flexDirection: "column", gap: 2, fontSize: 10.5 },
  link: { color: "#1FA89D", textDecoration: "none" },
};

function Footer() {
  return (
    <footer style={footerStyles.wrap}>
      <div style={footerStyles.meta}>
        <div>運営: 株式会社リリビット</div>
        <div><a style={footerStyles.link} href="https://relybit.co.jp" target="_blank" rel="noreferrer">https://relybit.co.jp</a></div>
      </div>
      <div>© 2026 Relybit Inc.</div>
    </footer>
  );
}

window.Footer = Footer;
