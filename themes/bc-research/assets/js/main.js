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
  const closeSubmenus = (exceptLink = null) => {
    submenuParents.forEach((otherLink) => {
      if (exceptLink && otherLink === exceptLink) return;
      const otherItem = otherLink.closest('.menu-item-has-children');
      if (otherItem) {
        otherItem.classList.remove('submenu-open');
        otherLink.setAttribute('aria-expanded', 'false');
      }
    });
  };

  submenuParents.forEach((link) => {
    link.addEventListener('click', (event) => {
      event.preventDefault();
      closeSubmenus(link);
      const item = link.closest('.menu-item-has-children');
      const isOpen = item.classList.toggle('submenu-open');
      link.setAttribute('aria-expanded', String(isOpen));
    });

    link.addEventListener('mouseenter', () => {
      closeSubmenus(link);
    });
  });

  nav.querySelectorAll('.sub-menu a').forEach((sublink) => {
    sublink.addEventListener('click', () => {
      closeSubmenus();
    });
  });

  nav.addEventListener('click', (event) => {
    const isParentLink = event.target.closest('.menu-item-has-children > a');
    const isSubmenu = event.target.closest('.sub-menu');
    if (!isParentLink && !isSubmenu) {
      closeSubmenus();
    }
  });

  document.addEventListener('click', (event) => {
    if (!nav.contains(event.target)) {
      closeSubmenus();
    }
  });
})();
