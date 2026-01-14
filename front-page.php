<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-hero.jpg';
?>

<header class="hero"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <h1><?php bloginfo('name'); ?></h1>

</header>

<main>
  <?php
  while ( have_posts() ) :
    the_post();
    the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>