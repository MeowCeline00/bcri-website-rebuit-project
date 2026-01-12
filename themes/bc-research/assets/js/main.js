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
  const submenuItems = nav.querySelectorAll('.menu-item-has-children');
  const isDesktop = () => window.innerWidth > 1024;
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
      if (isDesktop()) return;
      closeSubmenus(link);
      const item = link.closest('.menu-item-has-children');
      const isOpen = item.classList.toggle('submenu-open');
      link.setAttribute('aria-expanded', String(isOpen));
    });

    link.addEventListener('mouseenter', () => {
      if (!isDesktop()) return;
      closeSubmenus(link);
      const item = link.closest('.menu-item-has-children');
      item.classList.add('submenu-open');
      link.setAttribute('aria-expanded', 'true');
    });
  });

  let closeTimer;
  header.addEventListener('mouseleave', () => {
    if (!isDesktop()) return;
    clearTimeout(closeTimer);
    closeTimer = setTimeout(() => {
      closeSubmenus();
    }, 150);
  });

  header.addEventListener('mouseenter', () => {
    clearTimeout(closeTimer);
  });

  nav.querySelectorAll('.sub-menu a').forEach((sublink) => {
    sublink.addEventListener('click', () => {
      closeSubmenus();
    });
  });

  nav.addEventListener('click', (event) => {
    if (isDesktop()) return;
    const isParentLink = event.target.closest('.menu-item-has-children > a');
    const isSubmenu = event.target.closest('.sub-menu');
    if (!isParentLink && !isSubmenu) {
      closeSubmenus();
    }
  });

  document.addEventListener('click', (event) => {
    if (isDesktop()) return;
    if (!nav.contains(event.target)) {
      closeSubmenus();
    }
  });

  const postCards = document.querySelectorAll('.elementor-post__card');
  postCards.forEach((card) => {
    const link = card.querySelector('a[href]');
    if (!link) return;

    card.addEventListener('click', (event) => {
      if (event.target.closest('a')) return;
      link.click();
    });

    card.addEventListener('keydown', (event) => {
      if (event.key !== 'Enter' && event.key !== ' ') return;
      event.preventDefault();
      link.click();
    });

    if (!card.hasAttribute('tabindex')) {
      card.tabIndex = 0;
    }
    if (!card.hasAttribute('role')) {
      card.setAttribute('role', 'link');
    }
  });
})();
