<?php

// 1st meta box
$meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'standard',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Standard Fields', 'rwmb' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post', 'page' ),

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
                        // Field name - Will be used as label
                        'name'  => __( 'Text', 'rwmb' ),
                        // Field ID, i.e. the meta key
                        'id'    => "{$prefix}text",
                        // Field description (optional)
                        'desc'  => __( 'Text description', 'rwmb' ),
                        'type'  => 'text',
                        // Default value (optional)
                        'std'   => __( 'Default text value', 'rwmb' ),
                        // CLONES: Add to make the field cloneable (i.e. have multiple value)
                        'clone' => true,
                ),
                // CHECKBOX
                array(
                        'name' => __( 'Checkbox', 'rwmb' ),
                        'id'   => "{$prefix}checkbox",
                        'type' => 'checkbox',
                        // Value can be 0 or 1
                        'std'  => 1,
                ),
                // RADIO BUTTONS
                array(
                        'name'    => __( 'Radio', 'rwmb' ),
                        'id'      => "{$prefix}radio",
                        'type'    => 'radio',
                        // Array of 'value' => 'Label' pairs for radio options.
                        // Note: the 'value' is stored in meta field, not the 'Label'
                        'options' => array(
                                'value1' => __( 'Label1', 'rwmb' ),
                                'value2' => __( 'Label2', 'rwmb' ),
                        ),
                ),
                // SELECT BOX
                array(
                        'name'     => __( 'Select', 'rwmb' ),
                        'id'       => "{$prefix}select",
                        'type'     => 'select',
                        // Array of 'value' => 'Label' pairs for select box
                        'options'  => array(
                                'value1' => __( 'Label1', 'rwmb' ),
                                'value2' => __( 'Label2', 'rwmb' ),
                        ),
                        // Select multiple values, optional. Default is false.
                        'multiple'    => false,
                        'std'         => 'value2',
                        'placeholder' => __( 'Select an Item', 'rwmb' ),
                ),
                // HIDDEN
                array(
                        'id'   => "{$prefix}hidden",
                        'type' => 'hidden',
                        // Hidden field must have predefined value
                        'std'  => __( 'Hidden value', 'rwmb' ),
                ),
                // PASSWORD
                array(
                        'name' => __( 'Password', 'rwmb' ),
                        'id'   => "{$prefix}password",
                        'type' => 'password',
                ),
                // TEXTAREA
                array(
                        'name' => __( 'Textarea', 'rwmb' ),
                        'desc' => __( 'Textarea description', 'rwmb' ),
                        'id'   => "{$prefix}textarea",
                        'type' => 'textarea',
                        'cols' => 20,
                        'rows' => 3,
                ),
        ),
        'validation' => array(
                'rules' => array(
                        "{$prefix}password" => array(
                                'required'  => true,
                                'minlength' => 7,
                        ),
                ),
                // optional override of default jquery.validate messages
                'messages' => array(
                        "{$prefix}password" => array(
                                'required'  => __( 'Password is required', 'rwmb' ),
                                'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
                        ),
                )
        )
);

?>