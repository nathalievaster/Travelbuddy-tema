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

}
add_action('wp_enqueue_scripts', 'travelbuddy_assets');