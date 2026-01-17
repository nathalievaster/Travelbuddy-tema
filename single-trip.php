<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full')
  ?: get_template_directory_uri() . '/images/default-trip-hero.jpg';
?>

<header class="hero hero--trip"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <?php get_template_part('template-parts/header-search'); ?>
  <?php get_template_part('template-parts/nav'); ?>

  <h1><?php the_title(); ?></h1>
</header>

<main>

  <nav class="breadcrumb">
    <a href="<?php echo get_permalink(get_page_by_path('resor')); ?>">
      ← Tillbaka till Resor
    </a>
  </nav>

  <!-- INTRO -->
  <?php if (get_field('trip_lead')): ?>
    <section class="trip-intro">
      <p class="trip-lead"><?php the_field('trip_lead'); ?></p>
    </section>
  <?php endif; ?>

  <!-- DETAILS -->
  <section class="trip-details">

    <ul class="trip-facts">
      <?php if (get_field('trip_length')): ?>
        <li><strong>Längd:</strong> <?php the_field('trip_length'); ?></li>
      <?php endif; ?>

      <?php if (get_field('trip_difficulty')): ?>
        <li><strong>Svårighetsgrad:</strong> <?php the_field('trip_difficulty'); ?></li>
      <?php endif; ?>
    </ul>

    <?php
    $product_id = get_field('linked_product');
    $product = $product_id ? wc_get_product($product_id) : null;
    ?>

    <?php if ($product): ?>
      <div class="trip-booking">

        <p class="trip-price">
          Pris: <?php echo wc_price($product->get_price()); ?>
        </p>

        <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
          <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>">
          <button type="submit" class="cta-book">
            Boka resa
          </button>
        </form>

      </div>
    <?php endif; ?>

  </section>

  <!-- PROGRAM -->
  <?php if (get_field('trip_program')): ?>
    <section class="trip-program">
      <h2>Program – dag för dag</h2>
      <?php the_field('trip_program'); ?>
    </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
