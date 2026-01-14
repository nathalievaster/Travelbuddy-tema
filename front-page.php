<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-hero.jpg';
?>

<header class="hero hero--home"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <h1><?php bloginfo('name'); ?></h1>

</header>

<main>

  <!-- INTRO -->
  <section class="intro">
    <?php if ( get_field('intro_heading') ) : ?>
      <h2><?php the_field('intro_heading'); ?></h2>
    <?php endif; ?>

    <?php if ( get_field('intro_text') ) : ?>
      <p><?php the_field('intro_text'); ?></p>
    <?php endif; ?>
  </section>

  <!-- CONTENT -->
  <section class="content">

    <?php
    $content_image = get_field('content_image');
    if ( $content_image ) :
    ?>
      <img
        src="<?php echo esc_url($content_image['url']); ?>"
        alt="<?php echo esc_attr($content_image['alt']); ?>">
    <?php endif; ?>

    <div class="text">
      <?php if ( get_field('content_text') ) : ?>
        <p><?php the_field('content_text'); ?></p>
      <?php endif; ?>
    </div>

  </section>

  <!-- DESTINATIONS -->
<section class="destinations">

  <?php for ( $i = 1; $i <= 3; $i++ ) :

    $image = get_field("destination_{$i}_image");
    $title = get_field("destination_{$i}_title");

    if ( $image && $title ) :
  ?>

    <div class="card">
      <img
        src="<?php echo esc_url($image['url']); ?>"
        alt="<?php echo esc_attr($image['alt']); ?>">
      <span><?php echo esc_html($title); ?></span>
    </div>

  <?php endif; endfor; ?>

</section>

</main>

<?php get_footer(); ?>
