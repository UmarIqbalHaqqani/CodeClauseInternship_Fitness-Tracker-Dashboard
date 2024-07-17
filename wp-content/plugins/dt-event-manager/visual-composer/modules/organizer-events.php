<?php
vc_map( array(
    "name" => esc_html__( "Organizer Events", 'dt-event-manager' ),
    "base" => "dt_sc_event_organizer_events",
    "icon" => "dt_sc_event_organizer_events",
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

        # Organizer ID
        array(
            'type' => 'autocomplete',
            'param_name'  => 'organizer_id',
            'heading' => __( 'Select Organizer', 'dt-event-manager' ),
            'edit_field_class' => 'vc_col-xs-12 padding-top-0px',
            'description' => __( 'Input Organizer ID or Organizer name to see suggestions', 'dt-event-manager' ),
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

        # Date Format
        array(
            'type' => 'textfield', 
            'param_name' => 'date_format',
            'heading' => esc_html__('Date Format', 'dt-event-manager'),
            'description' => '<a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">'.esc_html__('Sample Date Format', 'dt-event-manager').'</a>',
            'value' => 'F j, Y',
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
        	'value' => esc_html__('More Details & Info', 'dt-event-manager'),
        	'edit_field_class' => 'vc_col-sm-6 vc_column',
        	'dependency' => array( 'element' => 'show_read_more', 'value' => 'yes' ),
        ),

        # How many days ?
        array(
            'type' => 'dropdown',
            'heading' => __( 'How many days to show ?', 'dt-event-manager' ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'value' => array(
                __('Show all Days', 'dt-event-manager' ) => "0",
                __('1 Day', 'dt-event-manager' ) => "1",
                __('2 Days', 'dt-event-manager' ) => "2",
                __('3 Days', 'dt-event-manager' ) => "3",
                __('4 Days', 'dt-event-manager' ) => "4",
                __('5 Days', 'dt-event-manager' ) => "5",
                __('6 Days', 'dt-event-manager' ) => "6",
                __('1 Week', 'dt-event-manager' ) => "7",
                __('2 Weeks', 'dt-event-manager' ) => "14",
                __('3 Weeks', 'dt-event-manager' ) => "21",
                __('4 Weeks', 'dt-event-manager' ) => "28"                   
            ),
            'std' => '5',
            'admin_label' => true,
            'param_name' => 'days',
        ),

        # Limit
        array(
            'type' => 'dt_sc_input_number',
            'heading' => __( 'How many events to show ?', 'dt-event-manager' ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'std' => 10,
            'param_name' => 'limit',
            'min' => 0,
            'max' => 30,
            'step' => 1,
            'description' => __( 'Enter 0 to show all events', 'dt-event-manager' ),            
        ),
		
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'dt-event-manager' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dt-event-manager' ),
        ),

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),
    )
) );