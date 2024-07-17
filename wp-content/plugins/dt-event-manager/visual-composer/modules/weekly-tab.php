<?php
vc_map( array(
    "name" => esc_html__( "Weekly Tab", 'dt-event-manager' ),
    "base" => "dt_sc_event_weekly_tab",
    "icon" => "dt_sc_event_weekly_tab",
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
                'save_always' => true,
                'description' => __( 'Select icon library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_fontawesome',
                'save_always' => true,
                'value' => 'fa fa-adjust',
                'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'save_always' => true,
                'param_name' => 'icon_type_openiconic',
                'value' => 'vc-oi vc-oi-dial',
                'settings' => array( 'emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'openiconic', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'save_always' => true,
                'param_name' => 'icon_type_typicons',
                'value' => 'typcn typcn-adjust-brightness',
                'settings' => array( 'emptyIcon' => false, 'type' => 'typicons', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'typicons', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'save_always' => true,
                'param_name' => 'icon_type_entypo',
                'value' => 'entypo-icon entypo-icon-note',
                'settings' => array( 'emptyIcon' => false, 'type' => 'entypo', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'entypo', ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'param_name' => 'icon_type_linecons',
                'save_always' => true,
                'value' => 'vc_li vc_li-heart',
                'settings' => array( 'emptyIcon' => false, 'type' => 'linecons', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'linecons', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'save_always' => true,
                'param_name' => 'icon_type_monosocial',
                'value' => 'vc-mono vc-mono-fivehundredpx',
                'settings' => array( 'emptyIcon' => false, 'type' => 'monosocial', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'monosocial', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'dt-event-manager' ),
                'save_always' => true,
                'param_name' => 'icon_type_material',
                'value' => 'vc-material vc-material-cake',
                'settings' => array( 'emptyIcon' => false, 'type' => 'material', 'iconsPerPage' => 4000, ),
                'dependency' => array( 'element' => 'icon_type', 'value' => 'material', ),
                'description' => __( 'Select icon from library.', 'dt-event-manager' ),
            ),

        # Event Category
        array(
            'type' => 'autocomplete',
            'param_name'  => 'event_category',
            'heading' => __( 'Select Category', 'dt-event-manager' ),
            'settings' => array( 'multiple' => true, 'sortable' => true ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'description' => __( 'Input Event Category title to see suggestions', 'dt-event-manager' ),
        ),

        # Date Format
        array(
            'type' => 'textfield', 
            'param_name' => 'date_format',
            'heading' => esc_html__('Date Format', 'dt-event-manager'),
            'description' => '<a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">'.esc_html__('Sample Date Format', 'dt-event-manager').'</a>',
            'value' => 'l, F jS, Y',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-6 vc_column',
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
        // Meta

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),                    
    )
) );