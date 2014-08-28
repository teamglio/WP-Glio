<?php
/**
 * Template Name: Default Page
 * Description: Page template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
<script>

            jQuery(function() {
                var windowWidth = jQuery(window).width();
                if (windowWidth>=768) {
               
                    featuredArea();
                };
            });
            jQuery( window ).resize(function() {
                var windowWidth = jQuery(window).width();
                if (windowWidth>=768) {
                 
                    featuredArea();
                };
            });
</script>
        <div id="feature-box" class="feature-box">
        <h2><?php the_title(); ?></h2>
        </div>
        <div class="content">
            <?php the_content(); ?>
        </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>