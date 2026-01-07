document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementById("header");
  const toggle = document.getElementById("menuToggle");
  const spNav = document.getElementById("spNav");

  if (!header || !toggle || !spNav) return;

  // Scroll Effect
  window.addEventListener("scroll", function () {
    if (window.scrollY > 50) header.classList.add("is-scrolled");
    else header.classList.remove("is-scrolled");
  });

  const toggleMenu = () => {
    toggle.classList.toggle("is-active");
    spNav.classList.toggle("is-active");

    document.body.style.overflow = spNav.classList.contains("is-active")
      ? "hidden"
      : "";
  };

  // Click
  toggle.addEventListener("click", toggleMenu);

  // Keyboard (Enter/Space)
  toggle.addEventListener("keydown", (e) => {
    if (e.key === "Enter" || e.key === " ") {
      e.preventDefault();
      toggleMenu();
    }
  });
});
