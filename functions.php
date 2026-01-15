<?php
function travelbuddy_setup() {
  register_nav_menus([
    'primary' => 'Huvudmeny'
  ]);

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'travelbuddy_setup');


function travelbuddy_assets() {

    // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap',
    [],
    null
  );

  wp_enqueue_style(
    'theme-style',
    get_stylesheet_uri()
  );

  wp_enqueue_style(
    'hero',
    get_template_directory_uri() . '/css/hero.css'
  );

  wp_enqueue_style(
    'nav',
    get_template_directory_uri() . '/css/nav.css'
  );

  wp_enqueue_style(
    'base',
    get_template_directory_uri() . '/css/base.css'
  );

  wp_enqueue_style(
  'footer',
  get_template_directory_uri() . '/css/footer.css',
  ['base'] // bygger på base.css
);
  wp_enqueue_style(
  'button',
  get_template_directory_uri() . '/css/components/button.css',
  ['base']
);

if ( is_front_page() ) {
  wp_enqueue_style(
    'front-page',
    get_template_directory_uri() . '/css/pages/front-page.css',
    ['base']
  );
}

  // Navigation JS
  wp_enqueue_script(
    'nav-js',
    get_template_directory_uri() . '/js/nav.js',
    [],
    null,
    true // laddas i footer (viktigt!)
  );
  if ( is_page_template('page-about-template.php') ) {
    wp_enqueue_style(
      'about-page',
      get_template_directory_uri() . '/css/pages/about.css',
      ['base']
    );
  }

  if ( is_page_template('page-contact-template.php') ) {
  wp_enqueue_style(
    'contact-page',
    get_template_directory_uri() . '/css/pages/contact.css',
    ['base']
  );
}

if ( is_page_template('page-trips-template.php') ) {
  wp_enqueue_style(
    'trips-page',
    get_template_directory_uri() . '/css/pages/trips.css',
    ['base']
  );
}

if ( is_page_template('page-trips-template.php') ) {
  wp_enqueue_script(
    'trip-filter',
    get_template_directory_uri() . '/js/filter.js',
    [],
    null,
    true
  );
}

wp_enqueue_style(
  'cards',
  get_template_directory_uri() . '/css/components/cards.css',
  ['base']
);

}
add_action('wp_enqueue_scripts', 'travelbuddy_assets');

// Skapa custom post types
function register_trips_cpt() {
  register_post_type('trip', [
    'labels' => [
      'name' => 'Resor',
      'singular_name' => 'Resa',
    ],
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-location-alt',
    'supports' => ['title', 'thumbnail'],
    'rewrite' => ['slug' => 'resor'],
  ]);
}
add_action('init', 'register_trips_cpt');