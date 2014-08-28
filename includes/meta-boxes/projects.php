<?php
// Projects meta box - Client
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'project-client',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Client', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'projects' ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
                // TEXT
                array(
                        'name'  => __( 'Name', 'rwmb' ),
                        'id'    => "{$prefix}client_name",
                        'desc'  => __( 'Name of company or person', 'rwmb' ),
                        'type'  => 'text',
                ),
                // TEXT
                array(
                        'name'  => __( 'Link', 'rwmb' ),
                        'id'    => "{$prefix}client_link",
                        'desc'  => __( 'Link to Project/Client Website', 'rwmb' ),
                        'type'  => 'text',
                ),
                // TEXTAREA
                array(
                        'name' => __( 'Bio', 'rwmb' ),
                        'desc' => __( 'A short summary of the client', 'rwmb' ),
                        'id'   => "{$prefix}client_bio",
                        'type' => 'textarea',
                        'cols' => 20,
                        'rows' => 3,
                ),
        ),
);
// Projects meta box - Problem
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'project-problem',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Problem', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'projects' ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
                // WYSIWYG/RICH TEXT EDITOR
                array(
                        'id'   => "{$prefix}project_problem",
                        'type' => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'  => false,

                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 10,
                                'teeny'         => false,
                                'media_buttons' => true,
                        ),
                ),
        ),
);
// Projects meta box - Solution
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'project-solution',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Solution', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'projects' ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
                // IMAGE ADVANCED (WP 3.5+)
                array(
                        'name'             => __( 'Project Overview', 'rwmb' ),
                        'id'               => "{$prefix}project_overview_image",
                        'type'             => 'image_advanced',
                        'max_file_uploads' => 1,
                ),
                // WYSIWYG/RICH TEXT EDITOR
                array(
                        'id'   => "{$prefix}project_solution",
                        'type' => 'wysiwyg',
                        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                        'raw'  => false,

                        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                        'options' => array(
                                'textarea_rows' => 20,
                                'teeny'         => false,
                                'media_buttons' => true,
                        ),
                ),
        ),
);
?>