<?php
vc_map( array(
    "name" => esc_html__( "Plain List", 'dt-event-manager' ),
    "base" => "dt_sc_event_plain_list",
    "icon" => "dt_sc_event_plain_list",
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

        # Title
            array(
                'type' => 'textfield', 
                'param_name' => 'title',
                'heading' => esc_html__('Title', 'dt-event-manager'),
                'save_always' => true,
            ),

        # Title Icon
            array(
                'type' => 'dropdown',
                'heading' => __( 'Title Icon', 'dt-event-manager' ),
                'value' => array(
                    __( 'Font Awesome', 'dt-event-manager' ) => 'fontawesome',
                    __( 'Open Iconic', 'dt-event-manager' ) => 'openiconic',
                    __( 'Typicons', 'dt-event-manager' ) => 'typicons',
                    __( 'Entypo', 'dt-event-manager' ) => 'entypo',
                    __( 'Linecons', 'dt-event-manager' ) => 'linecons',
                    __( 'Mono Social', 'dt-event-manager' ) => 'monosocial',
                    __( 'Material', 'dt-event-manager' ) => 'material',
                    __( 'None', 'dt-event-manager' ) => 'none',
                ),
                'std' => 'none',
                'admin_label' => true,
                'param_name' => 'icon_type',
                'description' => __( 'Select icon library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_fontawesome',
                'value' => 'fa fa-adjust',
                'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_openiconic',
                'value' => 'vc-oi vc-oi-dial',
                'settings' => array( 'emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'openiconic', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_typicons',
                'value' => 'typcn typcn-adjust-brightness',
                'settings' => array( 'emptyIcon' => false, 'type' => 'typicons', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'typicons', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_entypo',
                'value' => 'entypo-icon entypo-icon-note',
                'settings' => array( 'emptyIcon' => false, 'type' => 'entypo', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'entypo', ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_linecons',
                'value' => 'vc_li vc_li-heart',
                'settings' => array( 'emptyIcon' => false, 'type' => 'linecons', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'linecons', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_monosocial',
                'value' => 'vc-mono vc-mono-fivehundredpx',
                'settings' => array( 'emptyIcon' => false, 'type' => 'monosocial', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'monosocial', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_material',
                'value' => 'vc-material vc-material-cake',
                'settings' => array( 'emptyIcon' => false, 'type' => 'material', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'material', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
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

        # Event Category
        array(
            'type' => 'autocomplete',
            'param_name'  => 'event_category',
            'heading' => __( 'Select Category', 'dt-event-manager' ),
            'edit_field_class' => 'vc_col-xs-12',
            'settings' => array( 'multiple' => true, 'sortable' => true ),
            'description' => __( 'Input Event Category title to see suggestions', 'dt-event-manager' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'dt-event-manager' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dt-event-manager' ),
        ),

        // Meta
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'End Time ?', 'dt-core' ),
                'param_name' => 'show_end_time',
                'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event end time.', 'dt-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-core' ),
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
                'group' => esc_html__( 'Meta', 'dt-core' ),
                'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Category ?', 'dt-core' ),
                'param_name' => 'show_category',
                'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event category.', 'dt-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-core' ),
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
                'group' => esc_html__( 'Meta', 'dt-core' ),
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
                'group' => esc_html__( 'Meta', 'dt-core' ),
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
                'group' => esc_html__( 'Meta', 'dt-core' ),
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
                'group' => esc_html__( 'Meta', 'dt-core' ),
            ),

            array(
                'type' => 'textfield', 
                'param_name' => 'read_more',
                'heading' => esc_html__('Read More Text', 'dt-event-manager'),
                'save_always' => true,
                'value' => 'Read More',
                'group' => esc_html__( 'Meta', 'dt-core' ),
                'dependency' => array( 'element' => 'show_read_more', 'value' => 'yes', ),                
            ),


        // Meta

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),                        
    )
) );