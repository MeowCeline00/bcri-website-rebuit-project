<?php
get_header();

if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('404')) {
  // Elementor Pro handles the 404 template.
} else {
  ?>
  <main id="primary" class="site-main site-main--fullwidth">
    <h1>Page not found</h1>
    <p>Sorry, the page you are looking for could not be found.</p>
  </main>
  <?php
}

get_footer();

