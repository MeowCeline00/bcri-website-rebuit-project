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

  wp_enqueue_style(
    'bootstrap-icons',
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
    [],
    '1.11.3'
  );

  wp_enqueue_style(
    'bc-research-style',
    get_template_directory_uri() . '/assets/css/main.css',
    ['bootstrap-icons'],
    $ver
  );

  wp_enqueue_script(
    'bc-research-js',
    get_template_directory_uri() . '/assets/js/main.js',
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
