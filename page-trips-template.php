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

<header class="hero hero--page" style="background-image: url('<?php echo esc_url($hero_image); ?>');">

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

        <?php
        $trips = new WP_Query([
            'post_type' => 'trip',
            'posts_per_page' => -1,
        ]);

        if ($trips->have_posts()):
            while ($trips->have_posts()):
                $trips->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>

                <article class="card">
                    <a href="<?php the_permalink(); ?>" class="card-link">

                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>

                        <span><?php the_title(); ?></span>

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