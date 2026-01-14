<?php
function travelbuddy_assets() {

  wp_enqueue_style(
    'nav',
    get_template_directory_uri() . '/css/nav.css'
  );

  wp_enqueue_style(
    'hero',
    get_template_directory_uri() . '/css/hero.css'
  );

}
add_action('wp_enqueue_scripts', 'travelbuddy_assets');

// Aktiverar featured image
add_theme_support('post-thumbnails');