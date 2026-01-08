<?php
// Security
if (!defined('ABSPATH')) exit;
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content">Skip to content</a>

<header class="site-header">
  <div class="site-header__top">
    <div class="site-header__inner">
      <nav class="site-header__utility" aria-label="Utility">
        <?php if (has_nav_menu('utility')) : ?>
          <?php
          wp_nav_menu([
            'theme_location' => 'utility',
            'container' => false,
            'menu_class' => 'utility-menu',
            'fallback_cb' => false,
          ]);
          ?>
        <?php else : ?>
          <ul class="utility-menu">
            <li class="menu-item"><a href="/resources">Resources</a></li>
            <li class="menu-item"><a href="/news">News</a></li>
            <li class="menu-item"><a href="/contact">Contact</a></li>
            <li class="menu-item"><a class="utility-icon" href="https://www.linkedin.com" aria-label="LinkedIn">in</a></li>
          </ul>
        <?php endif; ?>
      </nav>
    </div>
  </div>

  <div class="site-header__main">
    <div class="site-header__inner">
      <div class="site-header__brand">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <a class="site-header__title" href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
          </a>
        <?php endif; ?>
      </div>

      <div class="site-header__actions">
        <button class="site-header__toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
          <span class="site-header__toggle-line"></span>
          <span class="site-header__toggle-line"></span>
          <span class="site-header__toggle-line"></span>
          <span class="sr-only">Open menu</span>
        </button>

        <nav id="primary-menu" class="site-header__nav" aria-label="Primary">
        <?php if (has_nav_menu('primary')) : ?>
          <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'primary-menu',
            'fallback_cb' => false,
          ]);
          ?>
        <?php else : ?>
          <ul class="primary-menu">
            <li class="menu-item"><a href="/about">About Us</a></li>
            <li class="menu-item"><a href="/core-research-areas">Core Research Areas</a></li>
            <li class="menu-item"><a href="/services">Services</a></li>
            <li class="menu-item"><a href="/facilities">Facilities</a></li>
          </ul>
        <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>
</header>

<div id="content" class="site-content">
