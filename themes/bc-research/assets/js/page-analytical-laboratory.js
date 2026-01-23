document.addEventListener("DOMContentLoaded", () => {
  const filters = document.querySelectorAll(".eq-filter");
  const cards = document.querySelectorAll(".eq-card");
  if (!filters.length || !cards.length) return;

  const slugify = (t) => t.trim().toLowerCase().replace(/\s+/g, "-");

  filters.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();

      filters.forEach((b) => b.classList.remove("is-active"));
      btn.classList.add("is-active");

      const category = slugify(btn.textContent);

      cards.forEach((card) => {
        card.style.display = card.classList.contains(category) ? "" : "none";
      });
    });
  });

  // Trigger default
  (document.querySelector(".eq-filter.is-active") || filters[0]).click();
});
