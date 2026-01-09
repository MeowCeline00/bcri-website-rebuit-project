<?php
get_header();

if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('archive')) {
  // Elementor Pro handles the search results template.
} else {
  ?>
  <main id="primary" class="site-main site-main--fullwidth">
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </main>
  <?php
}

get_footer();

