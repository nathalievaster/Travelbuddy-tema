<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-page-hero.jpg';
?>

<header class="hero hero--page"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <h1><?php the_title(); ?></h1>

</header>

<main class="page-content">
  <?php
  while ( have_posts() ) :
    the_post();
    the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
