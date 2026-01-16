<?php get_header(); ?>

<?php
/*
Template Name: About Page
*/

$hero_image = get_the_post_thumbnail_url(null, 'full')
  ?: get_template_directory_uri() . '/images/default-page-hero.jpg';
?>

<header class="hero hero--page"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <?php if ( is_active_sidebar('header-search') ) : ?>
    <div class="header-search">
      <?php dynamic_sidebar('header-search'); ?>
    </div>
  <?php endif; ?>

  <?php get_template_part('template-parts/nav'); ?>

  <h1><?php the_title(); ?></h1>

</header>

<main class="page-content">

  <section class="about">

    <h2 class="about-intro">
      <?php the_field('about-intro'); ?>
    </h2>

    <div class="moreabout">
      <p><?php the_field('about_intro_paragraph'); ?></p>
    </div>

    <article class="about_article">
      <div class="flex">

        <div class="about-text">
          <h2><?php the_field('about_vision_title'); ?></h2>
          <p><?php the_field('about_vision_text'); ?></p>

          <ul>
            <?php if (get_field('about_value_1')): ?>
              <li><strong><?php the_field('about_value_1'); ?></strong></li>
            <?php endif; ?>
            <?php if (get_field('about_value_2')): ?>
              <li><strong><?php the_field('about_value_2'); ?></strong></li>
            <?php endif; ?>
            <?php if (get_field('about_value_3')): ?>
              <li><strong><?php the_field('about_value_3'); ?></strong></li>
            <?php endif; ?>
          </ul>
        </div>

        <?php
        $about_image = get_field('about_image');
        if ($about_image):
          ?>
          <figure class="about__image">
            <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>">
            <figcaption>
              <?php the_field('about_image_caption'); ?>
            </figcaption>
          </figure>
        <?php endif; ?>

      </div>
    </article>

    <article class="about__section">
      <h2><?php the_field('about_sustainability_title'); ?></h2>
      <p><?php the_field('about_sustainability_text'); ?></p>
    </article>

    <article class="about__section">
      <h2><?php the_field('about_history_title'); ?></h2>
      <p><?php the_field('about_history_text'); ?></p>
    </article>

  </section>

</main>

<?php get_footer(); ?>