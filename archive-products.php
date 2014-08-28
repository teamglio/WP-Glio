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
	<h1>Products</h1>
	</div>
	<div class="col-md-8 archive-list">
	<?php while (have_posts()) : the_post();
	//META
	$product_url = rwmb_meta( 'glio_product_url');
	?>
		<h2><a target="_blank" href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h2>
		<p><?php the_excerpt(); ?></p>
		<div class="archive-list-meta">
			<span class="post-date"><?php //echo get_the_date('F Y'); ?></span>
			<span class="view-more"><a target="_blank" href="<?php echo $product_url; ?>">VIEW <i class="icon-chevron-right"></i></a>
			</span>
		</div>
		<hr />
	<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>