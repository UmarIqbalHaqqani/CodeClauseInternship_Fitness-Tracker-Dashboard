<?php
vc_map( array(
    "name" => esc_html__( "Single Event Cover", 'dt-event-manager' ),
    "base" => "dt_sc_event_single_cover",
    "icon" => "dt_sc_event_single_cover",
    "category" => esc_html__( 'Event Style', 'dt-event-manager' ),
    "params" => array(
        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array (
                'auto_generate' => true
            )
        ),

        # Event ID
        array(
            'type' => 'autocomplete',
            'param_name'  => 'event_id',
            'heading' => __( 'Select Event', 'dt-event-manager' ),
            'edit_field_class' => 'vc_col-xs-12 padding-top-0px',
            'description' => __( 'Input Event ID or Event title to see suggestions', 'dt-event-manager' ),
        ),

        # Date Format
        array(
            'type' => 'textfield', 
            'param_name' => 'date_format',
            'heading' => esc_html__('Date Format', 'dt-event-manager'),
            'description' => '<a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">'.esc_html__('Sample Date Format', 'dt-event-manager').'</a>',
            'value' => 'l, F jS, Y',
            'save_always' => true,
        ),        

        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'End Time ?', 'dt-core' ),
            'param_name' => 'show_end_time',
            'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
            'std' => 'yes',
            'description' => esc_html__( 'Show event end time.', 'dt-core' ),
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Duration ?', 'dt-core' ),
        	'param_name' => 'show_duration',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show event total duration.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Category ?', 'dt-core' ),
        	'param_name' => 'show_category',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show event category.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Location ?', 'dt-core' ),
        	'param_name' => 'show_location',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show event location.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Instructor ?', 'dt-core' ),
        	'param_name' => 'show_instructor',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show event instructor.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Excerpt ?', 'dt-core' ),
        	'param_name' => 'show_excerpt',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show event excerpt.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'checkbox',
        	'heading' => esc_html__( 'Read More ?', 'dt-core' ),
        	'param_name' => 'show_read_more',
        	'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
        	'std' => 'yes',
        	'description' => esc_html__( 'Show read more button.', 'dt-core' ),
        	'save_always' => true,
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),

        array(
        	'type' => 'textfield', 
        	'param_name' => 'read_more',
        	'heading' => esc_html__('Read More Text', 'dt-event-manager'),
        	'save_always' => true,
        	'value' => 'Read More',
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        	'dependency' => array( 'element' => 'show_read_more', 'value' => 'yes', ),                
        ),

        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'dt-event-manager' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dt-event-manager' ),
        ),

        // Cover
        	array(
        		'type' => 'dropdown',
        		'param_name' => 'cover_aspect',
        		'heading' => __( 'Aspect Ratio', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
        		'value' => array(
        			'16:9' => "cover-aspect-169",
        			'16:9 - '.__('vertical', 'dt-event-manager' ) => "cover-aspect-169v",
        			'4:3' => "cover-aspect-43",
        			'4:3 - '.__('vertical', 'dt-event-manager' ) => "cover-aspect-43v",
        			'1:1' => "cover-aspect-11",
        		),
        		'std' => 'cover-aspect-169',
        		'admin_label' => true,
                'save_always' => true,
        	),

        	array(
        		'type' => 'dropdown',
        		'param_name' => 'cover_text_position',
        		'heading' => __( 'Text Position', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
                'save_always' => true,
        		'value' => array(
        			__('Top Left','dt-event-manager') => "cover-text-position-top-left",
        			__('Top Center','dt-event-manager') => "cover-text-position-top-center",
        			__('Top Right','dt-event-manager') => "cover-text-position-top-right",
        			__('Middle Left','dt-event-manager') => "cover-text-position-middle-left",
        			__('Middle Center','dt-event-manager') => "cover-text-position-middle-center",
        			__('Middle Right','dt-event-manager') => "cover-text-position-middle-right",
        			__('Bottom Left','dt-event-manager') => "cover-text-position-bottom-left",
        			__('Bottom Center','dt-event-manager') => "cover-text-position-bottom-center",
        			__('Bottom Right','dt-event-manager') => "cover-text-position-bottom-right",
        		),
        		'std' => 'cover-text-position-top-left',
        		'admin_label' => true,
        	),

        	array(
        		'type' => 'dropdown',
        		'param_name' => 'cover_text_align',
        		'heading' => __( 'Text Align', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
        		'value' => array(
        			__('Left','dt-event-manager') => "cover-text-align-left",
        			__('Center','dt-event-manager') => "cover-text-align-center",
        			__('Right','dt-event-manager') => "cover-text-align-right",
        		),
        		'std' => 'cover-text-align-left',
                'save_always' => true,
        		'admin_label' => true,
        	),

        	array(
        		'type' => 'dropdown',
        		'param_name' => 'cover_text_size',
        		'heading' => __( 'Text Size', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
        		'value' => array(
        			__('Small','dt-event-manager') => "cover-text-size-sm",
        			__('Normal','dt-event-manager') => "cover-text-size-md",
        			__('Large','dt-event-manager') => "cover-text-size-lg",
        		),
        		'std' => 'cover-text-size-sm',
                'save_always' => true,
        		'admin_label' => true,
        	),

        	array(
        		'type' => 'dropdown',
        		'param_name' => 'cover_overlay_type',
        		'heading' => __( 'Color Overlay Layer', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
        		'value' => array(
        			__('Image','dt-event-manager') => "cover-overlay-image",
        			__('Text','dt-event-manager') => "cover-overlay-text",
        		),
        		'std' => 'cover-overlay-image',
                'save_always' => true,
        		'admin_label' => true,
        	),

        	array(
        		'type' => 'dt_sc_input_number',
        		'heading' => __( 'Overlay Opacity (%)', 'dt-event-manager' ),
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        		'param_name' => 'cover_overlay',
        		'std' => 10,
        		'min' => 0,
        		'max' => 100,
        		'step' => 1,
                'save_always' => true,                
        	),

        	array(
        		'type'	=> 'colorpicker',
        		'heading' => __( 'Overlay Color', 'dt-event-manager' ),
        		'param_name' => 'overlay_color',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
                'save_always' => true,
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        	),

        	array(
        		'type'	=> 'colorpicker',
        		'heading' => __( 'Text Color', 'dt-event-manager' ),
        		'param_name' => 'text_color',
        		'group' => esc_html__( 'Cover', 'dt-event-manager' ),
                'save_always' => true,
        		'edit_field_class' => 'vc_col-sm-6 vc_column',
        	),
        // Cover

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),
    )
) );