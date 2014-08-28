<?php
/**
 * Template Name: Singel Project
 * Description: Project template.
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<?php while (have_posts()) : the_post();
?>
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
       		<div class="featured-content container">
        		<div class="container project-title">
           			<h1><?php the_title(); ?></h1>
           		</div>
           	</div>
        </div>
        <?php
        if ( '' != get_the_post_thumbnail() ) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'glio-mobile-feature', true);
        }
        ?>
        <div class="mobile-featured-content container <?php if (!empty($image_url[0])) { echo 'feature-image-overlay' ; } ?>" <?php if (!empty($image_url[0])) { echo 'style="background-image: url(' . $image_url[0] . ');"'; } ?> >
            <div class="row">
              <div class="container project-title">
                <h1><?php the_title(); ?></h1>
              </div>
            </div>
            </div>
        </div>
        <div class="content">
          <div class="container">
            
            <div class="row a-single-post">
            <div class="col-md-4">
            	<div class="post-tags">
              <?php
              if( get_option('show_on_front') == 'page') {
                $posts_page_id = get_option( 'page_for_posts');
                $posts_page = get_page( $posts_page_id);
                $posts_page_title = $posts_page->post_title;
                $posts_page_url = get_page_link($posts_page_id);
              }
              else $posts_page_title = $posts_page_url = '';
              ?>
                <ul class="back">
                <a class="categories-label" href="<?php echo $posts_page_url; ?>"><li><i class="icon-chevron-left"></i> Back to Thoughts</li></a>
                <div class="post-date"><?php echo get_the_author(); ?></div>
                </ul>
                <hr class="very-narrow" />
                <div class="post-date"><?php echo get_the_date('j F Y'); ?></div>
                <hr class="very-narrow" />
                <ul class="categories single">
                <?php $terms = wp_get_post_terms($post->ID,'category');
                 $count = count($terms);
                 if ( $count > 0 ){
                      foreach ( $terms as $term ) {
                          echo '<a class="categories-label" href="'.get_term_link($term->slug, 'category').'"><li>'. $term->name . '</li></a>';
                    }
                 }?>
                 </ul>
              </div>
              
            </div>
              <div class="col-md-8 single-post-content">
              <?php the_content(); ?>
              <hr />
              <?php comments_template(); ?>
              </div>
            </div>
          </div>
        </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>