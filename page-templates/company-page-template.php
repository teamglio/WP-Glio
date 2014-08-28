<?php
/**
 * Template Name: Company Page
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
        	<div class="featured-content container">
        		<div class="row">
        		<div class="col-md-5 centered">
                <a href="<?php echo home_url('/'); ?>">
        			 <img class="glio-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo_light.png">  
                </a>       
        		</div>
        		<div class="col-md-7 featured-text">
	           	<h2><?php the_title(); ?></h2>
		        
		        <?php the_content(); ?>
		        </div>
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
            <div class="col-md-5 centered">
            <a href="<?php echo home_url('/'); ?>">
                 <img class="glio-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo_light.png">  
            </a>       
            </div>
            <div class="col-md-7 featured-text">
            <h2><?php the_title(); ?></h2>
            
            <?php the_content(); ?>
            </div>
            </div>
        </div>
        
        <div class="content">
          <div class="container">
                <div class="row">
                <div class="col-md-5 side-title">
                <h1>What we do</h1>
                    <div class="sidepanel-description">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("company-services");
                        } ?>
                    </div>
                </div>
                <div class="col-md-7 services-list">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts( array( 'post_type' => 'services', 'paged'=>$paged, 'showposts'=> -1 , 'meta_key'=>'glio_service_order','orderby'=>'meta_value_num','order' => 'ASC'));
                if (have_posts()) : while ( have_posts() ) : the_post();
                ?>
                        <h2><i class="icon-ios7-plus-empty"></i> <?php the_title(); ?></h2>
                        <div class="service-tags">
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
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </div>
                </div>
                <hr />
                <div class="row">
                <div class="col-md-5 side-title">
                <h1>Team glio</h1>
                <h4>team@glio.co.za</h4>
                    <div class="sidepanel-description">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("company-team");
                        } ?>
                    </div>
                </div>
                <div class="col-md-7 team-list">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts( array( 'post_type' => 'team', 'paged'=>$paged, 'showposts'=> -1));
                if (have_posts()) : while ( have_posts() ) : the_post();
                //META
                $member_email = rwmb_meta( 'glio_member_email');
                $member_twitter = rwmb_meta( 'glio_member_twitter');
                $member_bio = rwmb_meta( 'glio_member_bio');
                ?>
                      <div class="col-md-6 col-xs-6 member-box">
                <?php
                if ( '' != get_the_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id,'glio-300-square', true);
                ?>
                        <img alt="<?php echo $member_bio; ?>" src="<?php echo $image_url[0]; ?>" width="100%">
                <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/blank-glio-user.png" width="100%">
                <?php } ?>
                        <div class="member-info">
                        <?php the_title(); ?>
                        <a target="_blank" href="http://twitter.com/<?php echo $member_twitter; ?>"><i class="icon-social-twitter"></i></a>
                        <a href="mailto:<?php echo $member_email; ?>"><i class="icon-ios7-email"></i></a>
                       
                         </div>
                      </div>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </div>
                </div>
                <hr />
                <?php
                if (function_exists('dynamic_sidebar')) {
                    dynamic_sidebar("company-bottom");
                } ?>
          </div>
        </div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>