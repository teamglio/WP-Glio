<?php
// Projects meta box - Slider
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'slide-info',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Slide info', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'slider' ),

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
                        'name'  => __( 'Text above slide title', 'rwmb' ),
                        'id'    => "{$prefix}slide_above",
                        'type'  => 'text',
                ),
                // TEXT
                array(
                        'name'  => __( 'Text below slide title', 'rwmb' ),
                        'id'    => "{$prefix}slide_below",
                        'type'  => 'text',
                ),
                // SELECT BOX
                array(
                        'name'     => __( 'Shape', 'rwmb' ),
                        'id'       => "{$prefix}slide_shape",
                        'type'     => 'select',
                        // Array of 'value' => 'Label' pairs for select box
                        'options'  => array(
                                'circle-mask' => __( 'Circle', 'rwmb' ),
                                'triangle-mask' => __( 'Triangle', 'rwmb' ),
                                'square-mask' => __( 'Square', 'rwmb' ),
                                'pentagon-mask' => __( 'Pentagon', 'rwmb' ),
                                
                        ),
                        // Select multiple values, optional. Default is false.
                        'multiple'    => false,
                        'std'         => 'square',
                ),
                // COLOR
                array(
                        'name' => __( 'Slide Color', 'rwmb' ),
                        'id'   => "{$prefix}slide_color",
                        'type' => 'color',
                ),
                // TEXT
                array(
                        'name'  => __( 'Slide order', 'rwmb' ),
                        'id'    => "{$prefix}slide_order",
                        'std'   => __( '10', 'rwmb' ),
                        'type'  => 'text',
                ),
                // SELECT BOX
                array(
                        'name'     => __( 'Title Position', 'rwmb' ),
                        'id'       => "{$prefix}slide_title_pos",
                        'type'     => 'select',
                        // Array of 'value' => 'Label' pairs for select box
                        'options'  => array(
                                'middle' => __( 'Middle', 'rwmb' ),
                                'bottom' => __( 'Bottom', 'rwmb' ),
                        ),
                        // Select multiple values, optional. Default is false.
                        'multiple'    => false,
                        'std'         => 'middle',
                        'placeholder' => __( 'Select an Option', 'rwmb' ),
                ),
        ),
);
?>