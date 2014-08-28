<?php
class GlioLogo extends WP_Widget {

	function GlioLogo() {
			$widget_ops = array('description' => 'Displays the glio logo');
			$this->WP_Widget('GlioLogo', 'Glio Logo', $widget_ops);
	}

	function form( $instance ) {
		// Output admin widget options form
			?>
			
				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo.png" width="100%">

			<?php

	} //ending form creation

	function widget( $args, $instance ){
		// Widget output
			extract($args, EXTR_SKIP);
			echo $before_widget;
			?>
			<div class="glio">
				<a href="<?php echo home_url('/'); ?>">
				<img src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo.png">
				</a>
			</div>
			<?php
			echo $after_widget;
	} //ending widget display

}
///////////////////////////////////
class LatestThought extends WP_Widget {

	function LatestThought() {
			$widget_ops = array('description' => 'gets the latest thought');
			$this->WP_Widget('LatestThought', 'Latest Thought', $widget_ops);
	}

	function form( $instance ) {
		// Output admin widget options form
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=> 1));
        if (have_posts()) : while ( have_posts() ) : the_post();
			?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="archive-list-meta">
				<span class="post-date"><?php echo get_the_date('j F Y'); ?></span>
				<span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
				</span>
			</div>
			<?php
		endwhile; endif;
        wp_reset_query();
	} //ending form creation

	function widget( $args, $instance ){
		// Widget output
			extract($args, EXTR_SKIP);
			echo $before_widget;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	        query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=> 1));
	        if (have_posts()) : while ( have_posts() ) : the_post();
				?>
				<h2 class="tight-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="archive-list-meta">
					<span class="post-date"><?php echo get_the_date('j F Y'); ?></span>
					<span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
					</span>
				</div>
				<?php
			endwhile; endif;
	        wp_reset_query();
			echo $after_widget;
	} //ending widget display

}
///////////////////////////////////
class LatestProject extends WP_Widget {

	function LatestProject() {
			$widget_ops = array('description' => 'gets the latest project');
			$this->WP_Widget('LatestProject', 'Latest Project', $widget_ops);
	}

	function form( $instance ) {
		// Output admin widget options form
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts( array( 'post_type' => 'projects', 'paged'=>$paged, 'showposts'=> 1));
        if (have_posts()) : while ( have_posts() ) : the_post();
			?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="archive-list-meta">
				<span class="post-date"><?php echo get_the_date('F Y'); ?></span>
				<span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
				</span>
			</div>
			<?php
		endwhile; endif;
        wp_reset_query();
	} //ending form creation

	function widget( $args, $instance ){
		// Widget output
			extract($args, EXTR_SKIP);
			echo $before_widget;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	        query_posts( array( 'post_type' => 'projects', 'paged'=>$paged, 'showposts'=> 1));
	        if (have_posts()) : while ( have_posts() ) : the_post();
				?>
				<h2 class="tight-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="archive-list-meta">
					<span class="post-date"><?php echo get_the_date('F Y'); ?></span>
					<span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
					</span>
				</div>
				<?php
			endwhile; endif;
	        wp_reset_query();
			echo $after_widget;
	} //ending widget display

}
///////////////////////////////////
class LatestProduct extends WP_Widget {

	function LatestProduct() {
			$widget_ops = array('description' => 'gets the latest product');
			$this->WP_Widget('LatestProduct', 'Latest Product', $widget_ops);
	}

	function form( $instance ) {
		// Output admin widget options form
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts( array( 'post_type' => 'products', 'paged'=>$paged, 'showposts'=> 1));
        if (have_posts()) : while ( have_posts() ) : the_post();
        $product_url = rwmb_meta( 'glio_product_url');
			?>
			<h2><a href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h2>
			<div class="archive-list-meta">
				<span class="post-date"><?php echo get_the_date('F Y'); ?></span>
				<span class="view-more"><a href="<?php echo $product_url; ?>">VIEW <i class="icon-chevron-right"></i></a>
				</span>
			</div>
			<?php
		endwhile; endif;
        wp_reset_query();
	} //ending form creation

	function widget( $args, $instance ){
		// Widget output
			extract($args, EXTR_SKIP);
			echo $before_widget;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	        query_posts( array( 'post_type' => 'products', 'paged'=>$paged, 'showposts'=> 1));
	        if (have_posts()) : while ( have_posts() ) : the_post();
            $product_url = rwmb_meta( 'glio_product_url');
				?>
				<h2 class="tight-title"><a href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h2>
				<div class="archive-list-meta">
					<span class="post-date"><?php echo get_the_date('F Y'); ?></span>
					<span class="view-more"><a href="<?php echo $product_url; ?>">VIEW <i class="icon-chevron-right"></i></a>
					</span>
				</div>
				<?php
			endwhile; endif;
	        wp_reset_query();
			echo $after_widget;
	} //ending widget display

}
///////////////////////////////////random
///////////////////////////////////
class RandomThought extends WP_Widget {

    function RandomThought() {
            $widget_ops = array('description' => 'gets a random thought');
            $this->WP_Widget('RandomThought', 'Random Thought', $widget_ops);
    }

    function widget( $args, $instance ){
        // Widget output
            extract($args, EXTR_SKIP);
            echo $before_widget;
            $count_posts = wp_count_posts('post');
            $published_posts = $count_posts->publish;
            $offset = rand (0 ,$published_posts );
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'showposts'=> 1, 'offset'=> $offset));
            if (have_posts()) : while ( have_posts() ) : the_post();
                ?>
                <h2 class="tight-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="archive-list-meta">
                    <span class="post-date"><?php echo get_the_date('j F Y'); ?></span>
                    <span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
                    </span>
                </div>
                <?php
            endwhile; endif;
            wp_reset_query();
            echo $after_widget;
    } //ending widget display

}
///////////////////////////////////
class RandomProject extends WP_Widget {

    function RandomProject() {
            $widget_ops = array('description' => 'gets a random project');
            $this->WP_Widget('RandomProject', 'Random Project', $widget_ops);
    }

    function widget( $args, $instance ){
        // Widget output
            extract($args, EXTR_SKIP);
            echo $before_widget;
            $count_projects = wp_count_posts('projects');
            $published_projects = $count_projects->publish;
            $project_offset = rand (0 ,$published_projects );
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts( array( 'post_type' => 'projects', 'paged'=>$paged, 'showposts'=> 1, 'offset'=> $project_offset));
            if (have_posts()) : while ( have_posts() ) : the_post();
                ?>
                <h2 class="tight-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="archive-list-meta">
                    <span class="post-date"><?php echo get_the_date('j F Y'); ?></span>
                    <span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
                    </span>
                </div>
                <?php
            endwhile; endif;
            wp_reset_query();
            echo $after_widget;
    } //ending widget display

}
///////////////////////////////////
class RandomProduct extends WP_Widget {

    function RandomProduct() {
            $widget_ops = array('description' => 'gets a random product');
            $this->WP_Widget('RandomProduct', 'Random Product', $widget_ops);
    }

    function widget( $args, $instance ){
        // Widget output
            extract($args, EXTR_SKIP);
            echo $before_widget;
            $count_products = wp_count_posts('products');
            $published_products = $count_products->publish;
            $product_offset = rand (0 ,$published_products );
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts( array( 'post_type' => 'products', 'paged'=>$paged, 'showposts'=> 1, 'offset'=> $product_offset));
            if (have_posts()) : while ( have_posts() ) : the_post();
                ?>
                <h2 class="tight-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="archive-list-meta">
                    <span class="post-date"><?php echo get_the_date('j F Y'); ?></span>
                    <span class="view-more"><a href="<?php the_permalink(); ?>">VIEW <i class="icon-chevron-right"></i></a>
                    </span>
                </div>
                <?php
            endwhile; endif;
            wp_reset_query();
            echo $after_widget;
    } //ending widget display

}
///////////////////////////////////
class SocialIcons extends WP_Widget {

	function SocialIcons() {
			$widget_ops = array('description' => 'Insert Icons set in the theme options');
			$this->WP_Widget('SocialIcons', 'Social Icons', $widget_ops);
	}

	function form( $instance ) {
		// Output admin widget options form
			global $NHP_Options;
            $theme_options = $NHP_Options->options;
            $facebook = $theme_options['facebook'];
            $twitter = $theme_options['twitter'];
            $youtube = $theme_options['youtube'];
            $linkedin = $theme_options['linkedin'];
            $googleplus = $theme_options['googleplus'];
            $instagram = $theme_options['behance'];
            $pinterest = $theme_options['pinterest'];
			?>
			<p>
				<?php if (!empty($twitter)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/twitter.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($facebook)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/facebook.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($behance)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/behance.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($googleplus)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/googleplus.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($youtube)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/youtube.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($pinterest)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/pinterest.png" width="28px">
                    
                <?php } ?>
                <?php if (!empty($linkedin)) { ?>
                    
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/linkedin.png" width="28px">
                    
                <?php } ?>
			</p>
			<?php

	} //ending form creation

	function widget( $args, $instance ){
		// Widget output
			extract($args, EXTR_SKIP);
			echo "<div class='social-icons'>";
			echo $before_widget;
			
			global $NHP_Options;
            $theme_options = $NHP_Options->options;
            $facebook = $theme_options['facebook'];
            $twitter = $theme_options['twitter'];
            $youtube = $theme_options['youtube'];
            $linkedin = $theme_options['linkedin'];
            $googleplus = $theme_options['googleplus'];
            $instagram = $theme_options['behance'];
            $pinterest = $theme_options['pinterest'];
			?>
			<div class="social-icons">
				<?php if (!empty($twitter)) { ?>
                    <a target="_blank" href="<?php echo $twitter; ?>" class="sm-twitter">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/twitter.png">
                    </a>
                <?php } ?>
                <?php if (!empty($facebook)) { ?>
                    <a target="_blank" href="<?php echo $facebook; ?>" class="sm-facebook">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/facebook.png">
                    </a>
                <?php } ?>
                <?php if (!empty($behance)) { ?>
                    <a target="_blank" href="<?php echo $behance; ?>" class="sm-behance">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/behance.png">
                    </a>
                <?php } ?>
                <?php if (!empty($googleplus)) { ?>
                    <a target="_blank" href="<?php echo $googleplus; ?>" class="sm-googleplus">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/googleplus.png">
                    </a>
                <?php } ?>
                <?php if (!empty($youtube)) { ?>
                    <a target="_blank" href="<?php echo $youtube; ?>" class="sm-youtube">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/youtube.png">
                    </a>
                <?php } ?>
                <?php if (!empty($pinterest)) { ?>
                    <a target="_blank" href="<?php echo $pinterest; ?>" class="sm-pinterest">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/pinterest.png">
                    </a>
                <?php } ?>
                <?php if (!empty($linkedin)) { ?>
                    <a target="_blank" href="<?php echo $linkedin; ?>" class="sm-linkedin">
                    	<img class="social-icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/social/linkedin.png">
                    </a>
                <?php } ?>
			</div>
			<?php
			
			echo $after_widget;
			echo "</div>";
	} //ending widget display

}
class CompanyPage extends WP_Widget {

    function CompanyPage() {
            $widget_ops = array('description' => 'Extend the copmpany page');
            $this->WP_Widget('CompanyPage', 'Company Page Widget', $widget_ops);
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array(
            'title' => '',
            'description' => '',
            'mainareaimage' => '',
            'mainareatext' => ''
        ));
        // Output admin widget options form
            $title = esc_attr($instance['title']);
            $description = esc_textarea($instance['description']);
            $mainareaimage = esc_attr($instance['mainareaimage']);
            $mainareatext = esc_textarea($instance['mainareatext']);
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                
                <label for="<?php echo $this->get_field_id('description'); ?>">Description:</label>
                <textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea> 
                <label for="<?php echo $this->get_field_id('mainareaimage'); ?>">Main Area Image:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('mainareaimage'); ?>" name="<?php echo $this->get_field_name('mainareaimage'); ?>" type="text" value="<?php echo esc_attr($mainareaimage); ?>" />
                <?php if (!empty($mainareaimage)) {
                echo '<hr><img src="';
                echo $mainareaimage;
                echo '" width="100%">';
                }; ?>
                <label for="<?php echo $this->get_field_id('mainareatext'); ?>">Main Area Text:</label>
                <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('mainareatext'); ?>" name="<?php echo $this->get_field_name('mainareatext'); ?>"><?php echo $mainareatext; ?></textarea> 
            </p>
            <?php

    } //ending form creation

    function update( $new_instance, $old_instance ) {
        // Save widget options
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            $instance['description'] = strip_tags($new_instance['description']);
            $instance['mainareaimage'] = strip_tags($new_instance['mainareaimage']);
            $instance['mainareatext'] = strip_tags($new_instance['mainareatext']);
            return $instance;
    } //ending update


    function widget( $args, $instance ){
        // Widget output
            extract($args, EXTR_SKIP);
            $title = $instance['title'];
            $description = $instance['description'];
            $mainareaimage = $instance['mainareaimage'];
            $mainareatext = $instance['mainareatext'];
            echo $before_widget;
            echo $before_title;
            if (!empty($title)) {
                echo '<h1>';
                echo $title;
                echo '</h1>';
            };
            if (!empty($description)) {
                echo '<div class="sidepanel-description">';
                echo $description;
                echo '</div><br><br>';
            };
            echo $after_title;
            if (!empty($mainareaimage)) {
                echo '<img src="';
                echo $mainareaimage;
                echo '" width="100%"><br><br>';
            };
            if (!empty($mainareatext)) {
                echo '<p>';
                echo $mainareatext;
                echo '</p>';
            };
            echo $after_widget;
    } //ending widget display

}
////////////////////////////////
function glio_register_widgets() {
	register_widget( 'GlioLogo' );
	register_widget( 'LatestThought' );
	register_widget( 'LatestProject' );
	register_widget( 'LatestProduct' );
	register_widget( 'SocialIcons' );
    register_widget( 'CompanyPage' );
    register_widget( 'RandomThought' );
    register_widget( 'RandomProject' );
    register_widget( 'RandomProduct' );
}

add_action( 'widgets_init', 'glio_register_widgets' );
?>