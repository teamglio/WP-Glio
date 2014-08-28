<?php
/**
 * Template Name: 404
 * Description: Page template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>

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
        <div id="feature-box" class="feature-box 404">
            <div class="featured-content container">
                <div class="container">
                    <h1>We must investigate...</br>
                        where does this lightning come from?</h1>
                </div>
            </div>
        </div>
        <div class="mobile-featured-content container 404" style="background-image: url(http://glio.co.za/wp-content/themes/glio/assets/img/lightning.jpg);" >
            <div class="row">
              <div class="container">
                <h1>We must investigate...</br>
                    where does this lightning come from?</h1>
              </div>
            </div>
            </div>
        </div>

<?php get_footer(); ?>