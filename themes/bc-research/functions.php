<?php
// Security
if (!defined('ABSPATH')) exit;

// Theme supports
add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','gallery','caption']);
  add_theme_support('custom-logo');

  register_nav_menus([
    'primary' => 'Primary Menu',
    'utility' => 'Utility Menu',
    'footer'  => 'Footer Menu',
  ]);
});

// Enqueue assets
add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');
  $theme_dir = get_template_directory();
  $theme_uri = get_template_directory_uri();

  // Vendor
  wp_enqueue_style(
    'bootstrap-icons',
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
    [],
    '1.11.3'
  );

  // Global CSS
  wp_enqueue_style(
    'bc-research-style',
    $theme_uri . '/assets/css/main.css',
    ['bootstrap-icons'],
    $ver
  );

  // Front page CSS
  if (is_front_page()) {
    wp_enqueue_style(
      'bc-research-front-page',
      $theme_uri . '/assets/css/front-page.css',
      ['bc-research-style'],
      $ver
    );
  }

  /**
   * Page-specific CSS + JS by slug
   * Example:
   *  /analytical-laboratory/ will load:
   *   - /assets/css/page-analytical-laboratory.css (if exists)
   *   - /assets/js/page-analytical-laboratory.js  (if exists)
   */
  if (is_page()) {
    $page_id   = get_queried_object_id();
    $page_slug = $page_id ? get_post_field('post_name', $page_id) : '';

    if (!empty($page_slug)) {
      // Page CSS
      $page_css_rel = '/assets/css/page-' . $page_slug . '.css';
      if (file_exists($theme_dir . $page_css_rel)) {
        wp_enqueue_style(
          'bc-research-page-' . $page_slug,
          $theme_uri . $page_css_rel,
          ['bc-research-style'],
          $ver
        );
      }

      // Page JS  (ADDED)
      $page_js_rel = '/assets/js/page-' . $page_slug . '.js';
      if (file_exists($theme_dir . $page_js_rel)) {
        wp_enqueue_script(
          'bc-research-page-' . $page_slug,
          $theme_uri . $page_js_rel,
          [],     // add dependencies here if needed (e.g., ['jquery'])
          $ver,
          true
        );
      }
    }
  }

  // Global JS
  wp_enqueue_script(
    'bc-research-js',
    $theme_uri . '/assets/js/main.js',
    [],
    $ver,
    true
  );
});

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
  if (!in_array($args->theme_location, ['primary', 'utility'], true)) {
    return $atts;
  }

  if (!empty($item->classes) && in_array('menu-item-has-children', $item->classes, true)) {
    $atts['href'] = '#';
    $atts['role'] = 'button';
    $atts['aria-haspopup'] = 'true';
    $atts['aria-expanded'] = 'false';
  }

  return $atts;
}, 10, 3);
