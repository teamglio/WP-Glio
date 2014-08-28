<?php
/**
 * Default Page Header
 *
 * @package WordPress
 * @subpackage WP-Glio
 */
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" <?php language_attributes(); ?> >
    <head>
    <!-- Browser -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
        <meta charset="<?php bloginfo('charset'); ?>"/>
    <!-- The title of the document -->
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!--  Meta Information  -->
        <?php
        $og_url = current_page_url();
        global $NHP_Options;
        $theme_options = $NHP_Options->options;
        $lat = $theme_options['contact_map_lat'];
        $lng = $theme_options['contact_map_lng'];
        $location_street_address = $theme_options['location_street_address'];
        $location_city = $theme_options['location_city'];
        $location_country = $theme_options['location_country'];
        $location_postal_code = $theme_options['location_postal_code'];
        $location_region = $theme_options['location_region'];
        $company_email = $theme_options['company_email'];
        $company_phone_number = $theme_options['company_phone_number'];
        $company_fax_number = $theme_options['company_fax_number'];
        $company_operating_days = $theme_options['company_operating_days'];
        $company_operating_hours_start = $theme_options['company_operating_hours_start'];
        $company_operating_hours_end = $theme_options['company_operating_hours_end'];
        $company_facebook_id = $theme_options['company_facebook_id'];
        global $post;
        $author_id = $post->post_author;
        $post_id = $post->post_id;
        $excerpt = "false";

        if (is_archive() || is_home()) {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'website';
            $og_image = $theme_options['og_image'];
            $tw_card = 'summary';
        } elseif (is_single()) {
            $keywords = $theme_options['seo_keywords'];
            $description = "excerpt";
            $excerpt = "excerpt";
            $article_author = get_the_author_meta( 'facebook_id', $author_id );
            $og_type = 'article';
            if ( '' != get_the_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $og_image = wp_get_attachment_image_src($image_id,'glio-full-feature', true);
                $og_image = $og_image[0];
                $tw_card = 'summary_large_image';
            } else {
                $og_image = $theme_options['og_image'];
                $tw_card = 'summary';
            }
        } elseif (is_front_page() || is_page( 'contact-us' )) {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'business.business';
            $og_image = $theme_options['og_image'];
            $tw_card = 'summary';
        } else {
            $keywords = $theme_options['seo_keywords'];
            $description = $theme_options['seo_description'];
            $og_type = 'website';
            if ( '' != get_the_post_thumbnail() ) {
                $image_id = get_post_thumbnail_id();
                $og_image = wp_get_attachment_image_src($image_id,'glio-full-feature', true);
                $og_image = $og_image[0];
                $tw_card = 'summary_large_image';
            } else {
                $og_image = $theme_options['og_image'];
                $tw_card = 'summary';
            }
        }
        ?>
        <!-- SEO -->
        <meta name="Keywords" content="<?php echo $keywords; ?>" />
        <meta name="description" content="<?php if ($description == $excerpt) { 
            $id = $post_id;
            $temp = $post;
            $post = get_post( $id );
            setup_postdata( $post );
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            echo $myExcerpt;
            wp_reset_postdata();
            $post = $temp;
            } else { echo $description; } ?>" />
<!-- Open Graph // twitter cards -->
        <meta name="twitter:card" content="<?php echo $tw_card; ?>">
        <meta name="twitter:site" content="@teamglio">
        <?php if (is_single()) { ?>
        <meta name="twitter:creator" content="<?php echo get_the_author_meta( 'twitter_username', $author_id ); ?>">
        <?php } ?>
        <meta name="twitter:title" content="<?php if (is_front_page()) { bloginfo('name'); } else { wp_title( '|', true, 'right' ); } ?>" />
        <meta name="twitter:description" content="<?php if ($description == $excerpt) { 
            $id = $post_id;
            $temp = $post;
            $post = get_post( $id );
            setup_postdata( $post );
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            echo $myExcerpt;
            wp_reset_postdata();
            $post = $temp;
            } else { echo $description; } ?>" />
        <meta name="twitter:image:src" content="<?php echo $og_image; ?>">
<!-- Open Graph -->
        <meta property="og:title" content="<?php if (is_front_page()) { bloginfo('name'); } else { wp_title( '|', true, 'right' ); } ?>" />
        <meta property="og:type" content="<?php echo $og_type; ?>" />
        <meta property="og:description" content="<?php if ($description == $excerpt) { 
            $id = $post_id;
            $temp = $post;
            $post = get_post( $id );
            setup_postdata( $post );
            $myExcerpt = get_the_excerpt();
            $tags = array("<p>", "</p>");
            $myExcerpt = str_replace($tags, "", $myExcerpt);
            echo $myExcerpt;
            wp_reset_postdata();
            $post = $temp;
            } else { echo $description; } ?>" />
        <?php if ($og_type == 'business.business') {
            ?>
            <meta property="place:location:latitude" content="<?php echo $lat; ?>" />
            <meta property="place:location:longitude" content="<?php echo $lng; ?>" />
            <meta property="business:contact_data:street_address" content="<?php echo $location_street_address; ?>" />
            <meta property="business:contact_data:locality" content="<?php echo $location_city; ?>" />
            <meta property="business:contact_data:country_name" content="<?php echo $location_country; ?>" />
            <meta property="business:contact_data:postal_code" content="<?php echo $location_postal_code; ?>" /> 
            <!-- MORE -->
            <meta property="business:contact_data:region" content="<?php echo $location_region; ?>" />
            <meta property="business:contact_data:email" content="<?php echo $company_email; ?>" />
            <meta property="business:contact_data:phone_number" content="<?php if (!empty ($company_phone_number)) { echo $company_phone_number; } ?>" />
            <meta property="business:contact_data:fax_number" content="<?php echo $company_fax_number; ?>" />
            <meta property="business:contact_data:website" content="<?php echo home_url('/'); ?>" />
            <?php foreach (array_keys($company_operating_days) as $day) { ?>
                <meta property="business:hours:day" content="<?php echo $day; ?>" />
                <meta property="business:hours:start" content="<?php echo $company_operating_hours_start; ?>" />
                <meta property="business:hours:end" content="<?php echo $company_operating_hours_end; ?>" />
            <?php } 
            }
        ?>
        <?php if ($og_type == 'article') {
            if  ('post' == get_post_type()) {
            ?>
            <meta property="article:author" content="<?php echo $article_author; ?>" />
            <meta property="article:publisher" content="<?php echo $company_facebook_id; ?>" />
            <?php } else { ?>
            <meta property="article:publisher" content="<?php echo $company_facebook_id; ?>" />
            <?php
                } 
            }
        ?>
        <meta property="og:url" content="<?php echo $og_url; ?>" />
        <meta property="og:image" content="<?php echo $og_image; ?>" />
    <!-- WINDOWS 8 (IE10) -->
        <meta name="msapplication-TileColor" content="<?php echo $primary_color; ?>"/>
        <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/assets/ico/ms-tile.png"/>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <!--  TOUCH ICONS | HOME-SCREEN ICONS  -->
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
              href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
              href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
              href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed"
              href="<?php echo get_stylesheet_directory_uri();?>/assets/ico/apple-touch-icon-57-precomposed.png">
    <!--  FONTS  -->    
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> class="dark">
    <nav id="bt-menu" class="bt-menu <?php if ( is_admin_bar_showing() ) { echo 'has-admin-bar';} ?>">
            <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
            <?php

            $defaults = array(
                'theme_location'  => '',
                'menu'            => '',
                'container'       => 'div',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => ''
            );

            wp_nav_menu( $defaults );

            ?>
        </nav>
    <?php
    if (is_archive() || is_home() ) { ?>
        <div class='archive-header'>
        	<div class="container">
                <a href="<?php echo home_url('/'); ?>">
            		<img class="glio-archive-logo" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/gliologo_archive.png">
           		</a>
            </div>
       	</div>
    <?php } elseif (is_404()) {
        ?>
        <div class="featured-area <?php if (!empty($image_url[0])) { echo 'feature-image-overlay' ; } ?>" style="background-image: url(http://glio.co.za/wp-content/themes/glio/assets/img/lightning.jpg);">
        </div>
        <?php } else { 
        if ( '' != get_the_post_thumbnail() ) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'glio-full-feature', true);
        ?>
        <div class="featured-area <?php if (!empty($image_url[0])) { echo 'feature-image-overlay' ; } ?>" <?php if (!empty($image_url[0])) { echo 'style="background-image: url(' . $image_url[0] . ');"'; } ?>>
        </div>
        <?php } else { 
            ?>
            <div class="featured-area"></div>
            <?php
        }
    } //end else is archive
        ?>
        
        
        <div class="container <?php if (is_archive() || is_home() || is_page( 'contact-us' ) ) { echo "archive-container";  } else { echo "slide-container";} ?>">
