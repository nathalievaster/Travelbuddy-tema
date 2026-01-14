<?php
function travelbuddy_setup() {
  register_nav_menus([
    'primary' => 'Huvudmeny'
  ]);

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'travelbuddy_setup');


function travelbuddy_assets() {

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
    get_template_directory_uri() . '/css.base.css'
  );

  wp_enqueue_style(
  'footer',
  get_template_directory_uri() . '/css/footer.css',
  ['base'] // bygger på base.css
);

  wp_enqueue_script(
    'menu',
    get_template_directory_uri() . '/js/menu.js',
    [],
    null,
    true
  );

}
add_action('wp_enqueue_scripts', 'travelbuddy_assets');