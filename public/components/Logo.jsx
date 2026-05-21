function Logo({ size = 1, color = "#2A1A0F", ovalColor = "#D63327" }) {
  const w = 110 * size;
  const h = 38 * size;
  return (
    <img src="assets/rehap-logo.png" alt="REHAP" style={{ width: w, height: "auto", display: "block" }} />
  );
}

window.Logo = Logo;
