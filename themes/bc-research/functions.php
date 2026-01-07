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
    'bc-research-style',
    get_template_directory_uri() . '/assets/css/main.css',
    [],
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
