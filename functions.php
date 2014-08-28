<?php
/**
 * Glio Theme Functions
 *
 * @author Stephanus van Vuuren (Glio Digital Innovations)
 * @package WordPress
 * @subpackage WP-Glio
 */
/**
 * Load CSS styles for theme.
 */
function glio_styles_loader() {

    wp_enqueue_style('normalize-css', get_template_directory_uri() . '/assets/css/normalize.css', false, '1.0', 'all');
    wp_enqueue_style('bootstrap-grid-min-css', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', false, '1.0', 'all');
    wp_enqueue_style('glio-css', get_template_directory_uri() . '/assets/css/glio.css', false, '1.0', 'all');
    wp_enqueue_style('ionicons-css', get_template_directory_uri() . '/assets/css/ionicons.css', false, '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'glio_styles_loader');

/**
 * Load JavaScript and jQuery files for theme.
 *
 */
function glio_scripts_loader() {

    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }
    wp_enqueue_script('modernizr-min-js', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array('jquery'), '2.6.2', true);
    wp_enqueue_script('html5-js', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array('jquery'), '1.0', true);
    wp_enqueue_script('glio-js', get_template_directory_uri() . '/assets/js/glio.js', array('jquery'), '1.0', true);
    if (is_page( 'contact-us' )) {

        wp_enqueue_script('maps-google', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true);
        
    }
}
add_action('wp_enqueue_scripts', 'glio_scripts_loader');

//////////////////
add_filter( 'wp_title', 'filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 */
function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}

/**
 * Maximum allowed width of content within the theme.
 */
if (!isset($content_width)) {
    $content_width = 770;
}
/**
 * Setup Theme Functions
 *
 */
if (!function_exists('glio_theme_setup')):
    function glio_theme_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        //add_theme_support('post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ));
        register_nav_menus(
            array(
                'main-menu' => __('Main Menu', 'glio'),
            ));
        // load custom walker menu class file
        //require 'includes/class-bootstrapwp_walker_nav_menu.php';
    }
endif;
add_action('after_setup_theme', 'glio_theme_setup');
/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 240, 240, true); // default Post Thumbnail dimensions   
}
if ( function_exists( 'add_image_size' ) ) { 

    add_image_size('glio-full-feature', 1024, 1024); // 1024x1024 sortoff
    add_image_size('glio-300-square', 300, 300, true); // 300x300 crop
    add_image_size('glio-400-square', 400, 400, true); // 300x300 crop

}
/**
 * Define theme's widget areas.
 *
 */
function glio_widgets_init() {

    register_sidebar(
        array(
            'name'          => __('Home Page Left', 'WP-Glio'),
            'id'            => 'hp-one',
            'description'   => __('The first area in the footer on the home page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Home Page Middle', 'WP-Glio'),
            'id'            => 'hp-two',
            'description'   => __('The center area in the footer on the home page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Home Page Right', 'WP-Glio'),
            'id'            => 'hp-three',
            'description'   => __('The last area in the footer on the home page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );
    ///////
    register_sidebar(
        array(
            'name'          => __('Services', 'WP-Glio'),
            'id'            => 'company-services',
            'description'   => __('Add content below the "What we do" title', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Team', 'WP-Glio'),
            'id'            => 'company-team',
            'description'   => __('Add content below the "Team Glio" title', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Company Page Bottom', 'WP-Glio'),
            'id'            => 'company-bottom',
            'description'   => __('Add content below the team section on the company page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="row %2$s">',
            'after_widget'  => '</div><hr /></div>',
            'before_title'  => '<div class="col-md-5 side-title">',
            'after_title'   => '</div><div class="col-md-7">'
        )
    );
    ///////
    register_sidebar(
        array(
            'name'          => __('Footer Left', 'WP-Glio'),
            'id'            => 'footer-one',
            'description'   => __('The first area in the footer', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Middle', 'WP-Glio'),
            'id'            => 'footer-two',
            'description'   => __('The center area in the footer', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Right', 'WP-Glio'),
            'id'            => 'footer-three',
            'description'   => __('The last area in the footer', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );
    ///////
    register_sidebar(
        array(
            'name'          => __('Contact Page Left', 'WP-Glio'),
            'id'            => 'contact-one',
            'description'   => __('The first area in the footer on the contact page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Contact Page Middle', 'WP-Glio'),
            'id'            => 'contact-two',
            'description'   => __('The center area in the footer on the contact page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>",
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Contact Page Right', 'WP-Glio'),
            'id'            => 'contact-three',
            'description'   => __('The last area in the footer on the contact page', 'WP-Glio'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        )
    );

}
add_action('init', 'glio_widgets_init');

function current_page_url() {
    $pageURL = 'http';
    if( isset($_SERVER["HTTPS"]) ) {
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function repertoire_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_tax) {
      $query->set('post_type', 'projects');
    }
  }
}

add_action('pre_get_posts','repertoire_filter');

///////////
//user meta
///////////
function modify_user_meta($profile_fields) {

    // Add new fields
    $profile_fields['facebook_id'] = 'Facebook Profile ID';
    $profile_fields['twitter_username'] = 'Twitter @usename';

    // Remove old fields
    unset($profile_fields['aim']);
    unset($profile_fields['yim']);
    //not working unset($profile_fields['url']);
    unset($profile_fields['jabber']);

    return $profile_fields;
}
add_filter('user_contactmethods', 'modify_user_meta');

include 'includes/custom-post-types.php';
include 'includes/custom-meta-boxes.php';
include 'includes/custom-taxonomies.php';
include 'includes/custom-widgets.php';
include 'theme-options.php';

/////////////////////////
//////Remove unwanted jetpack stuff
/////////////////////////
function jpk_remove_unwanted_tags() {
	remove_filter( 'jetpack_open_graph_tags', 'wpcom_twitter_cards_tags' );
	remove_filter( 'jetpack_open_graph_tags', 'change_twitter_site_param' );
}
add_action( 'init', 'jpk_remove_unwanted_tags' );

function add_menu_icons_styles(){
?>
 
<style>
#adminmenu #toplevel_page_theme_options div.wp-menu-image:before {
  content: '\f116';
}
#adminmenu .menu-icon-visual-form-builder div.wp-menu-image:before {
  content: '\f123';
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );
//END
?>