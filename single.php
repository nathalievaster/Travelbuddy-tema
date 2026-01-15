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

  <?php while ( have_posts() ) : the_post(); ?>

    <article class="news-single">

      <p class="news-meta">
        Publicerad <?php echo get_the_date(); ?> · Av <?php the_author(); ?>
      </p>

      <?php the_content(); ?>

      <a href="<?php echo get_post_type_archive_link('post'); ?>" class="cta-button">
        ← Tillbaka till nyheter
      </a>

    </article>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
