<?php
/*
Template Name: Trips Page
*/
?>

<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-page-hero.jpg';
?>

<header class="hero hero--page"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <?php get_template_part('template-parts/header-search'); ?>
  <?php get_template_part('template-parts/nav'); ?>

  <h1><?php the_title(); ?></h1>
</header>

<main>

  <!-- INTRO -->
  <section class="intro">
    <h2><?php the_field('trips_intro_heading'); ?></h2>
    <p><?php the_field('trips_intro_text'); ?></p>
  </section>

  <!-- DESTINATIONS -->
  <section class="destinations">

    <?php
    $trips = new WP_Query([
      'post_type' => 'trip',
      'posts_per_page' => -1,
    ]);

    if ($trips->have_posts()):
      while ($trips->have_posts()):
        $trips->the_post();

        $image = get_the_post_thumbnail_url(get_the_ID(), 'large');

        // WooCommerce-koppling
        $product_id = get_field('linked_product');
        $product = $product_id ? wc_get_product($product_id) : null;
        ?>

        <article class="card">
          <a href="<?php the_permalink(); ?>" class="card-link">

            <?php if ($image): ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>

            <span class="card-title"><?php the_title(); ?></span>

          

          </a>
        </article>

        <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </section>

</main>

<?php get_footer(); ?>
