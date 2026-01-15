<?php get_header(); ?>

<?php
$hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full')
    ?: get_template_directory_uri() . '/images/default-trip-hero.jpg';
?>

<header class="hero hero--trip" style="background-image: url('<?php echo esc_url($hero_image); ?>');">

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
            <p class="trip-lead">
                <?php the_field('trip_lead'); ?>
            </p>
        </section>
    <?php endif; ?>

    <!-- DETAILS -->
    <section class="trip-details">

        <ul class="trip-facts">
            <?php if (get_field('trip_price')): ?>
                <li><strong>Pris:</strong> <?php the_field('trip_price'); ?></li>
            <?php endif; ?>

            <?php if (get_field('trip_date')): ?>
                <li><strong>Datum:</strong> <?php the_field('trip_date'); ?></li>
            <?php endif; ?>

            <?php if (get_field('trip_length')): ?>
                <li><strong>Längd:</strong> <?php the_field('trip_length'); ?></li>
            <?php endif; ?>

            <?php if (get_field('trip_difficulty')): ?>
                <li><strong>Svårighetsgrad:</strong> <?php the_field('trip_difficulty'); ?></li>
            <?php endif; ?>
        </ul>

        <button class="cta-book" data-open-modal>
            Boka resa
        </button>

        <div class="modal" id="bookingModal" aria-hidden="true">
            <div class="modal__overlay"></div>

            <div class="modal__content" role="dialog" aria-modal="true">
                <button class="modal__close" aria-label="Stäng">&times;</button>

                <h2>Boka resa</h2>
                <p>Skicka en bokningsförfrågan – vi återkommer inom 24 timmar.</p>

                <?php echo do_shortcode('[contact-form-7 id="fa9fe8d" title="Bokning"]'); ?>

            </div>
        </div>

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