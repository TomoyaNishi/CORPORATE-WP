document.addEventListener("DOMContentLoaded", () => {
  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.1,
  };

  const observer = new IntersectionObserver((entries, ob) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        ob.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll(".fade-up").forEach((el) => observer.observe(el));
});
