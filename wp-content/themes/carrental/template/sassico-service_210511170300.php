<?php
/**
 * sassico-service.php
 *
 * Template Name: Sassico Service
 * Template Post Type: sassico-service
 */



get_header();
get_template_part( 'template-parts/banner/content', 'banner-page' );

?>
<section id="main-content" class="sassico-service-details-area" role="main">
    <?php while ( have_posts() ) : the_post();
    get_template_part('template-parts/sassico-service/content', 'single');
    endwhile; ?>
</section><!-- #main-content -->
<?php get_footer(); ?>
