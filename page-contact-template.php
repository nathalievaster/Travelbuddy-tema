<?php
/*
Template Name: Contact Page
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

    <section class="contact">

        <div class="contact__info">
            <h2><?php the_field('contact_heading'); ?></h2>

            <?php the_field('contact_info'); ?>
        </div>

        <div class="contact__form">
            <h2><?php the_field('contact_form_heading'); ?></h2>

            <?php
            $form_shortcode = get_field('contact_form_shortcode');
            if ($form_shortcode) {
                echo do_shortcode($form_shortcode);
            }
            ?>
        </div>

    </section>

    <section class="map">
        <?php
        $map = get_field('contact_map_embed');
        if ($map) {
            echo $map;
        }
        ?>
    </section>

</main>

<?php get_footer(); ?>