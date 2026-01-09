<?php
// Front page template.
get_header();
?>

<main id="primary" class="site-main">
  <?php
  $front_page_id = (int) get_option('page_on_front');
  if (!$front_page_id) {
    $front_page = get_page_by_path('home');
    if ($front_page instanceof WP_Post) {
      $front_page_id = $front_page->ID;
    }
  }

  if (!$front_page_id) {
    $front_page_id = 24;
  }

  if ($front_page_id) {
    $front_page = get_post($front_page_id);
    if ($front_page instanceof WP_Post) {
      setup_postdata($front_page);
      echo apply_filters('the_content', $front_page->post_content);
      wp_reset_postdata();
    }
  } else {
    if (have_posts()) :
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
    endif;
  }
  ?>
</main>

<?php
get_footer();
