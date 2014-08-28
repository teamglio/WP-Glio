<?php
// Projects meta box - Client
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'services-meta',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Order', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'services' ),

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
                        'name'  => __( 'Service order', 'rwmb' ),
                        'id'    => "{$prefix}service_order",
                        'std'   => __( '10', 'rwmb' ),
                        'type'  => 'text',
                ),
        ),
);
?>