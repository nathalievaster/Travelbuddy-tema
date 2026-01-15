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

  <h1><?php the_title(); ?></h1>

</header>

<main>

  <!-- INTRO -->
  <section class="intro">
    <h2><?php the_field('trips_intro_heading'); ?></h2>
    <p><?php the_field('trips_intro_text'); ?></p>
  </section>

  <!-- FILTER -->
  <section class="trip-filters">
    <div class="filters">

      <label>
        Typ av resa
        <select id="filter-type">
          <option value="all">Alla</option>
          <option value="adventure">Natur & äventyr</option>
          <option value="relax">Avkoppling & spa</option>
          <option value="culture">Kulturresor</option>
          <option value="weekend">Weekend-resor</option>
        </select>
      </label>

      <label>
        Destination
        <select id="filter-destination">
          <option value="all">Alla</option>
          <option value="madeira">Madeira</option>
          <option value="srilanka">Sri Lanka</option>
          <option value="maldiverna">Maldiverna</option>
          <option value="europa">Europa</option>
        </select>
      </label>

      <label>
        Reslängd
        <select id="filter-length">
          <option value="all">Alla</option>
          <option value="1-3">1–3 dagar</option>
          <option value="3-5">3–5 dagar</option>
          <option value="6-10">6–10 dagar</option>
          <option value="10+">10+ dagar</option>
        </select>
      </label>

    </div>
  </section>

  <!-- DESTINATIONS -->
  <section class="destinations">

    <!-- CARD 1 -->
    <article class="card" data-type="adventure" data-destination="madeira" data-length="6-10">
      <img src="<?php echo get_template_directory_uri(); ?>/images/portomoniz.JPEG" alt="">
      <span>Äventyr på Madeira</span>
    </article>

    <!-- CARD 2 -->
    <article class="card" data-type="adventure" data-destination="srilanka" data-length="6-10">
      <img src="<?php echo get_template_directory_uri(); ?>/images/udalawale.JPG" alt="">
      <span>Safari i Sri Lanka</span>
    </article>

    <!-- CARD 3 -->
    <article class="card" data-type="culture" data-destination="srilanka" data-length="10+">
      <img src="<?php echo get_template_directory_uri(); ?>/images/srilankatrain.JPEG" alt="">
      <span>Tågluff genom Sri Lanka</span>
    </article>

    <!-- CARD 4 -->
    <article class="card" data-type="relax" data-destination="maldiverna" data-length="10+">
      <img src="<?php echo get_template_directory_uri(); ?>/images/maldivernasunset.JPEG" alt="">
      <span>Avkoppling på Maldiverna</span>
    </article>

    <!-- CARD 5 -->
    <article class="card" data-type="relax" data-destination="europa" data-length="3-5">
      <img src="<?php echo get_template_directory_uri(); ?>/images/team.JPEG" alt="">
      <span>Spa & återhämtning</span>
    </article>

    <!-- CARD 6 -->
    <article class="card" data-type="weekend" data-destination="europa" data-length="1-3">
      <img src="<?php echo get_template_directory_uri(); ?>/images/team.JPEG" alt="">
      <span>Weekendresa i Europa</span>
    </article>

  </section>

</main>

<?php get_footer(); ?>
