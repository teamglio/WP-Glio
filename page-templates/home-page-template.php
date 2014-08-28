<?php
/**
 * Template Name: Home Page
 * Description: Shapes Slider
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
get_header(); ?>
<script>

            jQuery( document ).ready(function() {
                var windowWidth = jQuery(window).width();
                if (windowWidth>=768) {
                    sliderArea();
                };
            });
            jQuery( window ).resize(function() {
                var windowWidth = jQuery(window).width();
                if (windowWidth>=768) {
                    sliderArea();
                };
            });
            jQuery( window ).ready(function() {
                    activateSlider();
                    setInterval(function(){makeSlideActive()},6000);
            });
        </script>
	<div id="slider" class="slider">
			<?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=> -1, 'meta_key'=>'glio_slide_order','orderby'=>'meta_value_num','order' => 'ASC'));
                if (have_posts()) : while ( have_posts() ) : the_post();
                //META
                $slide_above_text = rwmb_meta( 'glio_slide_above');
                $slide_below_text = rwmb_meta( 'glio_slide_below');
                $slide_shape = rwmb_meta( 'glio_slide_shape');
                $slide_color = rwmb_meta( 'glio_slide_color');
                $slide_title_pos = rwmb_meta( 'glio_slide_title_pos');
            ?>
			<div class="item">
				<div class="item-back <?php echo $slide_shape; ?>">
					<svg class="svg-mask" width="400" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
				           	<a xlink:href="#">
				           	<rect clip-path="url(#<?php echo $slide_shape; ?>)" x="0" y="0" width="400" height="400" style="fill: <?php echo $slide_color; ?>;"/>
				           	
					        </a>
					</svg>
				</div>
				<div class="item-main">
					<div class="item-main-info <?php echo $slide_title_pos ?>" style="color:<?php echo $slide_color; ?>;">
						<span><?php echo $slide_above_text; ?></span>
						<h4><?php the_title(); ?></h4>
						<span><?php echo $slide_below_text; ?></span>
					</div>
						<svg class="svg-mask" width="400" height="400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
				           	<a xlink:href="#">
				           	<?php
			                if ( '' != get_the_post_thumbnail() ) {
			                $image_id = get_post_thumbnail_id();
			                $image_url = wp_get_attachment_image_src($image_id,'glio-400-square', true);
			                ?>
					           <image clip-path="url(#<?php echo $slide_shape; ?>)" height="100%" width="100%" xlink:href="<?php echo $image_url[0]; ?>" preserveAspectRatio="xMidYMin slice"></image>
					        <?php } ?>
					        </a>
						</svg>
				</div>
			</div>
			<?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
    <!-- SVG SHAPES -->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
    	<g>
           	<clippath id="triangle-mask">
                <polygon points="200,26 400,346 0,346"></polygon>
            </clippath>
    	</g>
    	<g>
    	   	<clippath id="circle-mask">
    	        <circle cx="200" cy="200" r="175"/>
    	    </clippath>
    	</g>	
    	<g>
           	<clippath id="square-mask">
                <rect x="25" y="25" width="350" height="350"/>
            </clippath>
       	</g>
       	<g>
           	<clippath id="pentagon-mask">
                <polygon points="200,10 400,156 324,390 76,390 0,156"></polygon>
            </clippath>
       	</g>
        </svg>
	</div>
    <div class="mobile-slider">
        <ul class="slide-items">
            <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    query_posts( array( 'post_type' => 'slider', 'paged'=>$paged, 'showposts'=> -1, 'meta_key'=>'glio_slide_order','orderby'=>'meta_value_num','order' => 'ASC'));
                    if (have_posts()) : while ( have_posts() ) : the_post();
                    //META
                    $slide_above_text = rwmb_meta( 'glio_slide_above');
                    $slide_below_text = rwmb_meta( 'glio_slide_below');
                    $slide_shape = rwmb_meta( 'glio_slide_shape');
                    $slide_color = rwmb_meta( 'glio_slide_color');
            ?>
            <li>
            <span class="shape">
                <div class="mobile-shape mobile-<?php echo $slide_shape; ?>">
                    <svg class="svg-mask" width="80" height="80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                            <a xlink:href="#">
                            
                            <rect clip-path="url(#mobile-<?php echo $slide_shape; ?>)" x="0" y="0" width="80" height="80" style="fill: <?php echo $slide_color; ?>;"/>
                            <!--
                            <?php
                            if ( '' != get_the_post_thumbnail() ) {
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id,'glio-400-square', true);
                            ?>
                               <image clip-path="url(#mobile-<?php echo $slide_shape; ?>)" height="100%" width="100%" xlink:href="<?php echo $image_url[0]; ?>" preserveAspectRatio="xMidYMin slice"></image>
                            <?php } ?>
                            -->
                            </a>
                    </svg>
                </div>
            </span>
            <span class="title" style="color:<?php echo $slide_color; ?>;">
                <span><?php echo $slide_above_text; ?></span>
                <h4><?php the_title(); ?></h4>
                <span><?php echo $slide_below_text; ?></span>
            </span>
            </li>
            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
            <!--MOBILE SHAPES-->
        <svg>
            <g>
                <clippath id="mobile-triangle-mask">
                    <polygon points="40,14 72,70 8,70"></polygon>
                </clippath>
            </g>
            <g>
                <clippath id="mobile-circle-mask">
                    <circle cx="40" cy="40" r="30"/>
                </clippath>
            </g>    
            <g>
                <clippath id="mobile-square-mask">
                    <rect x="12" y="12" width="56" height="56"/>
                </clippath>
            </g>
            <g>
                <clippath id="mobile-pentagon-mask">
                    <polygon points="40,8.5 73.5,32.5 60.7,71.5 19.3,71.5 6.5,32.5"></polygon>
                </clippath>
            </g>             
        </svg>    
        </ul>
    </div>

<?php get_footer("homepage"); ?>