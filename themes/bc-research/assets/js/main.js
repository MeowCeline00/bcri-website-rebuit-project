(() => {
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('.site-header__toggle');
  const nav = document.getElementById('primary-menu');
  const utilityNav = document.querySelector('.site-header__utility');

  if (!header || !toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = header.classList.toggle('site-header--open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  const submenuParents = nav.querySelectorAll('.menu-item-has-children > a');
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
      header.classList.remove('site-header--utility-open', 'site-header--primary-open');
    }, 150);
  });

  header.addEventListener('mouseenter', () => {
    clearTimeout(closeTimer);
  });

  const setActiveMenu = (menu) => {
    header.classList.toggle('site-header--utility-open', menu === 'utility');
    header.classList.toggle('site-header--primary-open', menu === 'primary');
  };

  nav.addEventListener('mouseenter', () => {
    if (!isDesktop()) return;
    setActiveMenu('primary');
  });

  nav.addEventListener('mouseleave', () => {
    if (!isDesktop()) return;
    header.classList.remove('site-header--primary-open');
  });

  if (utilityNav) {
    utilityNav.addEventListener('mouseenter', () => {
      if (!isDesktop()) return;
      closeSubmenus();
      setActiveMenu('utility');
    });

    utilityNav.addEventListener('mouseleave', () => {
      if (!isDesktop()) return;
      header.classList.remove('site-header--utility-open');
    });
  }

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

  const contactInfo = document.querySelector('.elementor-60 .elementor-element-89b072f');
  if (contactInfo) {
    const infoLines = contactInfo.querySelectorAll('.elementor-widget-text-editor p');
    infoLines.forEach((line) => {
      if (line.querySelector('a')) return;

      const text = line.textContent.trim();
      if (!text) return;

      if (text.includes('@')) {
        const emailLink = document.createElement('a');
        emailLink.href = `mailto:${text}`;
        emailLink.textContent = text;
        line.textContent = '';
        line.appendChild(emailLink);
        return;
      }

      const normalized = text.replace(/[^0-9+]/g, '');
      if (normalized === '+16044153570' || normalized === '16044153570' || normalized === '6044153570') {
        const phoneLink = document.createElement('a');
        phoneLink.href = 'tel:+16044153570';
        phoneLink.textContent = text;
        line.textContent = '';
        line.appendChild(phoneLink);
      }
    });
  }
})();


