<?php
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_slider');
function post_type_slider()
{
  $labels = array(
    'name' => _x('Slider', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'new_item' => 'New Slide',
    'edit_item' => 'Edit Slide',
    'view_item' => 'View Slide', 
    'search_items' => 'Search Slides',    
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => __('slides')),
    'capability_type' => 'post',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 11,
    'supports' => array('title', 'thumbnail'));
 
  register_post_type('slider',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_project');
function post_type_project()
{
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add New', 'Project'),
    'add_new_item' => __('Add New Project'),
    'new_item' => 'New Project',
    'edit_item' => 'Edit Project',
    'view_item' => 'View Project', 
    'search_items' => 'Search Projects',    
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => __('work')),
    'capability_type' => 'post',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 21,
    'supports' => array('title', 'thumbnail', 'excerpt'));
 
  register_post_type('projects',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_team');
function post_type_team()
{
  $labels = array(
    'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Member', 'post type singular name'),
    'add_new' => _x('Add New', 'Member'),
    'add_new_item' => __('Add New Member'),
    'new_item' => 'New Member',
    'edit_item' => 'Edit Member',
    'view_item' => 'View Member', 
    'search_items' => 'Search Members',    
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => __('team')),
    'capability_type' => 'post',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 22,
    'supports' => array('title', 'thumbnail'));
 
  register_post_type('team',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_services');
function post_type_services()
{
  $labels = array(
    'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New', 'Service'),
    'add_new_item' => __('Add New Service'),
    'new_item' => 'New Service',
    'edit_item' => 'Edit Service',
    'view_item' => 'View Service', 
    'search_items' => 'Search Services',    
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => __('services')),
    'capability_type' => 'post',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 23,
    'supports' => array('title'));
 
  register_post_type('services',$args);
  flush_rewrite_rules();
}
////////////////////
// Creates Post Type
////////////////////
add_action('init', 'post_type_products');
function post_type_products()
{
  $labels = array(
    'name' => _x('Products', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add New', 'Product'),
    'add_new_item' => __('Add New Product'),
    'new_item' => 'New Product',
    'edit_item' => 'Edit Product',
    'view_item' => 'View Product', 
    'search_items' => 'Search Products',    
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => __('products')),
    'capability_type' => 'post',
    'hierarchical' => true,
    'has_archive' => true,
    'menu_position' => 24,
    'supports' => array('title', 'excerpt'));
 
  register_post_type('products',$args);
  flush_rewrite_rules();
}
?>