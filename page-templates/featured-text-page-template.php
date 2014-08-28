<?php
/**
 * Template Name: Featured Text
 * Description: Page template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
        <div id="slider" class="silder">
        	<div class="featured-content container">
        		<div class="row">
        		<div class="col-md-5 centered">
        			 <img class="glio-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo_light.png">         
        		</div>
        		<div class="col-md-7 featured-text">
	           	<h2><?php the_title(); ?></h2>
		        
		        <?php the_content(); ?>
		        </div>
		        </div>
	        </div>
        </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer("sticky"); ?>