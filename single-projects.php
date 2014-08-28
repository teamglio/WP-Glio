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
//META
$the_client_name = rwmb_meta( 'glio_client_name');
$the_client_link = rwmb_meta( 'glio_client_link');
$the_client_bio = rwmb_meta( 'glio_client_bio');
$the_problem = rwmb_meta( 'glio_project_problem');
$the_overview_image = rwmb_meta( 'glio_project_overview_image', 'type=image' );
$the_solution = rwmb_meta( 'glio_project_solution');
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
       		<div class="featured-content">
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
            <div class="row">
              <div class="col-md-5">
                <h2><a target="_blank" href="<?php echo $the_client_link; ?>"><?php echo $the_client_name; ?></a></h2>
                <?php
                echo $the_client_bio;
                ?>
              </div>
              <div class="col-md-7">
                <h2>Project goals</h2>
                <?php
                echo $the_problem;
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
            <hr />
              <?php foreach ($the_overview_image as $the_image) {
              ?>
               <img src="<?php echo $the_image['full_url']; ?>" width="100%" />
              <?php
              } ?>
            <div class="project-tags">
                <?php $terms = wp_get_post_terms($post->ID,'repertoire');
                 $count = count($terms);
                 if ( $count > 0 ){
                  echo '<ul class="repertoire">';
                      foreach ( $terms as $term ) {
                          echo '<a class="skill-label" href="'.get_term_link($term->slug, 'repertoire').'"><li>'. $term->name . '</li></a>';
                    }
                  echo '</ul>';
                 }?>
              </div>
                <?php
                echo $the_solution;
                ?>
                <ul class="categories">
                  <a href="<?php echo get_post_type_archive_link( 'projects' ); ?>"><li><i class="icon-chevron-left"></i> Back to Work</li></a>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>