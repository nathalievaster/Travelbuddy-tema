<?php
$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-hero.jpg';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php bloginfo('name'); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="nav">
  <button class="nav-toggle" aria-label="Öppna meny" aria-expanded="false">
    <span></span>
    <span></span>
    <span></span>
  </button>

  <?php
  wp_nav_menu([
    'theme_location' => 'primary',
    'container' => false,
  ]);
  ?>
</nav>
