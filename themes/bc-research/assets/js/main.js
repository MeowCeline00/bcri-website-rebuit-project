(() => {
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('.site-header__toggle');
  const nav = document.getElementById('primary-menu');

  if (!header || !toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = header.classList.toggle('site-header--open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  const submenuParents = nav.querySelectorAll('.menu-item-has-children > a');
  submenuParents.forEach((link) => {
    link.addEventListener('click', (event) => {
      if (window.innerWidth > 1024) return;
      event.preventDefault();
      const item = link.closest('.menu-item-has-children');
      const isOpen = item.classList.toggle('submenu-open');
      link.setAttribute('aria-expanded', String(isOpen));
    });
  });
})();
