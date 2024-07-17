<?php
vc_map( array(
    "name" => esc_html__( "Weekly Schedule", 'dt-event-manager' ),
    "base" => "dt_sc_event_weekly_schedule",
    "icon" => "dt_sc_event_weekly_schedule",
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

        # Event Category
        array(
            'type' => 'autocomplete',
            'param_name'  => 'event_category',
            'heading' => __( 'Select Category', 'dt-event-manager' ),
            'settings' => array( 'multiple' => true, 'sortable' => true ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'description' => __( 'Input Event Category title to see suggestions', 'dt-event-manager' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'dt-event-manager' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dt-event-manager' ),
        ),

        array(
            'type'  => 'checkbox',
            'param_name' => 'show_nav',
            'heading' => esc_html__('Show Navigation', 'dt-event-manager' ),
            'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
            'description' => esc_html__( 'Show next and previous week navigation.', 'dt-event-manager' ),
            'std' => '',
            'save_always' => true,
        ),
        
        // Meta
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'End Time ?', 'dt-event-manager' ),
                'param_name' => 'show_end_time',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event end time.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Duration ?', 'dt-event-manager' ),
                'param_name' => 'show_duration',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event total duration.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Category ?', 'dt-event-manager' ),
                'param_name' => 'show_category',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event category.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Location ?', 'dt-event-manager' ),
                'param_name' => 'show_location',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event location.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Instructor ?', 'dt-event-manager' ),
                'param_name' => 'show_instructor',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event instructor.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Excerpt ?', 'dt-event-manager' ),
                'param_name' => 'show_excerpt',
                'value' => array( esc_html__( 'Yes', 'dt-event-manager' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Show event excerpt.', 'dt-event-manager' ),
                'save_always' => true,
                'group' => esc_html__( 'Meta', 'dt-event-manager' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
        // Meta

        // Weekdays Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Monday', 'dt-event-manager' ),
                'param_name' => 'monday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Tuesday', 'dt-event-manager' ),
                'param_name' => 'tuesday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Wednesday', 'dt-event-manager' ),
                'param_name' => 'wednesday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Thursday', 'dt-event-manager' ),
                'param_name' => 'thursday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Friday', 'dt-event-manager' ),
                'param_name' => 'friday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Saturday', 'dt-event-manager' ),
                'param_name' => 'saturday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),

            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Sunday', 'dt-event-manager' ),
                'param_name' => 'sunday_color',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Color', 'dt-event-manager' ),
            ),
        // Weekdays Color    
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),                    
    )
) );            