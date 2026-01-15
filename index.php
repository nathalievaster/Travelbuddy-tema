<?php get_header(); ?>

<?php
$hero_image = get_template_directory_uri() . '/images/maldivernasunset.JPEG';
?>

<header class="hero hero--page"
  style="background-image: url('<?php echo esc_url($hero_image); ?>');">

  <nav class="nav">
    <button class="nav-toggle" aria-label="Öppna meny" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
      ]);
    ?>
  </nav>

  <h1>Nyheter</h1>

</header>
<main>

  <section class="intro-news">
    <h2>Senaste nytt från Travelbuddy</h2>
    <p>
      Här delar vi nyheter, resetips och inspiration från våra resmål runt om i världen.
    </p>
  </section>

  <section class="news-grid">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <article class="news-card">
        <a href="<?php the_permalink(); ?>">

          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('large'); ?>
          <?php endif; ?>

          <div class="news-card__content">
            <p class="news-meta">
              <?php echo get_the_date(); ?> · Av <?php the_author(); ?>
            </p>

            <h3><?php the_title(); ?></h3>

            <p>
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>

        </a>
      </article>

    <?php endwhile; endif; ?>

  </section>

</main>

<?php get_footer(); ?>
