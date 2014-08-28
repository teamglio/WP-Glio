<?php
/**
 * Template Name: Singel Project
 * Description: Project template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<div class="row content">
	<div class="col-md-4 archive-title">
		<h1>
		<?php
			if( is_tax() || is_category() ) {
		    global $wp_query;
		    $term = $wp_query->get_queried_object();
		    $title = $term->name;
			}
			echo $title; 
		?>
		</h1>
		
			<?php
			if( is_tax() || is_category() ) {
		    global $wp_query;
		    $term = $wp_query->get_queried_object();
		    $description = $term->description;
			}
			echo '<div class="archive-description">';
			echo $description;
			echo '</div>';
			?>
		
	</div>
	<div class="col-md-8 archive-list">
	<?php while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p><?php the_excerpt(); ?></p>
		<div class="archive-list-meta">
			<span class="post-date"><?php //echo get_the_date('F Y'); ?></span>
			<span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
			</span>
		</div>
		<hr />
	<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>