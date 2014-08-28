<?php
// Projects meta box - Client
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'team-member-info',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Member Info', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'team' ),

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
                        'name'  => __( 'Email', 'rwmb' ),
                        'id'    => "{$prefix}member_email",
                        'desc'  => __( 'person@glio.co.za', 'rwmb' ),
                        'type'  => 'text',
                ),
                // TEXT
                array(
                        'name'  => __( 'Twitter handel', 'rwmb' ),
                        'id'    => "{$prefix}member_twitter",
                        'desc'  => __( 'Without the @', 'rwmb' ),
                        'type'  => 'text',
                ),
        ),
);
?>