<?php
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_project_taxonomies', 0 );

//create taxonomies for projects
function create_project_taxonomies() 
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Repertoire', 'taxonomy general name' ),
    'singular_name' => _x( 'Skill', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Skills' ),
    'all_items' => __( 'Repertoire' ),
    'parent_item' => __( 'Parent Skill' ),
    'parent_item_colon' => __( 'Parent Skill:' ),
    'edit_item' => __( 'Edit Skil' ), 
    'update_item' => __( 'Update Skill' ),
    'add_new_item' => __( 'Add New Skill' ),
    'new_item_name' => __( 'New Skill' ),
    'menu_name' => __( 'Repertoire' ),
  );   

  register_taxonomy('repertoire',array('projects', 'services'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
  ));

}
?>