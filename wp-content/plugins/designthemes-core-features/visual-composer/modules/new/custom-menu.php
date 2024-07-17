<?php
if( !function_exists('dt_get_nav_menus') ) {

    function dt_get_nav_menus() {
        $menus = wp_get_nav_menus();
        $navs = array();
        $navs[esc_html__('-- Select a Menu --', 'designthemes-core')] = 0;
        foreach ( $menus as $menu ) {
            $navs[$menu->name] = esc_attr( $menu->slug );
        }

        return $navs;
    }
}

vc_map( array(
    "name"      => esc_html__( "Menu", 'designthemes-core' ),
    "base"      => "dt_sc_nav_menu",
    "icon"      => "dt_sc_nav_menu",
    "category"  => DT_VC_CATEGORY,
    "params"    => array(

        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array (
                'auto_generate' => true
            )
        ), 

        # Nav Menu
        array(
            'type' => 'dropdown',
            'param_name' => 'nav_id',
            'heading' => esc_html__('Choose Menu', 'designthemes-core'),
            'value' => dt_get_nav_menus (),
            'std' => 0,
            'admin_label' => true,
        ),

        # Display Style
        array(
            'param_name' => 'display_style',
            'heading'    => esc_html__( 'Display Style', 'designthemes-core' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'type'       => 'dropdown',
            'save_always' => true,
            'value'      => array(
                __( 'Block', 'designthemes-core' )  => 'block',
                __( 'Inline', 'designthemes-core' )  => 'inline',
            ),
        ),

        # Inline Style 
        array(
            'param_name' => 'inline_style',
            'heading'    => esc_html__( 'Inline Style', 'designthemes-core' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'type'       => 'dropdown',
            'save_always' => true,
            'value'      => array(
                __( 'Horizontal', 'designthemes-core' )  => 'inline-horizontal',
                __( 'Vertical', 'designthemes-core' )  => 'inline-vertical',
            ),
            'dependency' => array( 'element' => 'display_style', 'value'   => 'inline' ),
        ),

        # Divider
            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'hr_for_divider_style_section_end',
                'dependency' => array( 'element' => 'display_style', 'value'   => 'inline' ),
            ),

            # Divider Style Type
            array(
                'param_name' => 'divider_style_type',
                'heading'    => esc_html__( 'Divider Style', 'designthemes-core' ),
                'save_always' => true,
                'type'       => 'dropdown',
                'value'      => array(
                    __( 'None', 'designthemes-core' )  => 'none',
                    __( 'Pre-defined', 'designthemes-core' )  => 'predefined',
                    __( 'Custom Style', 'designthemes-core' )  => 'custom-style',
                ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'std' => 'predefined',
                'dependency' => array( 'element' => 'display_style', 'value'   => 'inline' ),
            ),

            # Divider Style
            array(
                'param_name' => 'divider_style',
                'heading'    => esc_html__( 'Shape', 'designthemes-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'type'       => 'dropdown',
                'value'      => array(
                    __( 'Cross Line', 'designthemes-core' )  => 'crossline',
                    __( 'Narrow line', 'designthemes-core' )  => 'narrow-line',
                    __( 'Vertical line', 'designthemes-core' )  => 'vertical-line',
                ),
                'std' => 'none',
                'dependency' => array( 'element' => 'divider_style_type', 'value'   => 'predefined' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',                            
            ),

            array(
                'type' => 'dt_sc_vc_hr_invisible',
                'param_name' => 'hr_invisible_for_divider_style_section_end',
                'dependency'  => array( 'element' => 'divider_style_type', 'value' => 'custom-style' )
            ),

            # Divider
            array(
                'param_name' => 'divider',
                'heading'    => esc_html__( 'Style', 'designthemes-core' ),
                'save_always' => true,
                'type'       => 'dropdown',
                'value'      => array(
                    __( 'Solid', 'designthemes-core' )  => 'solid',
                    __( 'Dotted', 'designthemes-core' ) => 'dotted',
                    __( 'Dashed', 'designthemes-core' ) => 'dashed',
                    __( 'Double', 'designthemes-core' ) => 'double',
                    __( 'Groove', 'designthemes-core' ) => 'groove',
                    __( 'Ridge', 'designthemes-core' )  => 'ridge',
                    __( 'Inset', 'designthemes-core' )  => 'inset',
                    __( 'Outset', 'designthemes-core' ) => 'outset',
                ),
                'dependency' => array( 'element' => 'divider_style_type', 'value'   => 'custom-style' ),
                'edit_field_class' => 'vc_col-sm-4 vc_column',
            ),

            # Divider Width
            array(
                'param_name' => 'divider_width',
                'heading'    => esc_html__( 'Width', 'designthemes-core' ),
                'type'       => 'dropdown',
                'value'      => array(
                    __( '1px', 'designthemes-core' ) => '1px',
                    __( '2px', 'designthemes-core' ) => '2px',
                    __( '3px', 'designthemes-core' ) => '3px',
                ),
                'save_always' => true,
                'dependency' => array( 'element' => 'divider_style_type', 'value'   => 'custom-style' ),
                'edit_field_class' => 'vc_col-sm-4 vc_column',
            ),

            # Divider Color
            array(
                'param_name'  => 'divider_color',
                'heading'     => esc_html__( 'Color', 'designthemes-core' ),
                'type'        => 'colorpicker',
                'value'       => '#c5c5c5',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'save_always' => true,
                'dependency' => array( 'element' => 'divider_style_type', 'value'   => 'custom-style' ),
            ),


        # Icon
        
            # List Style Type
            array(
                'param_name' => 'list_style_type',
                'heading'    => esc_html__( 'List Style Type', 'designthemes-core' ),
                'type'       => 'dropdown',
                'group' => __('Icon','designthemes-core'),
                'value'      => array(
                    __( 'Custom Style', 'designthemes-core' )  => 'custom-style',
                    __( 'None', 'designthemes-core' )  => 'none',
                    __( 'Pre-defined', 'designthemes-core' )  => 'predefined',
                ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
            ),

            # List Style Position
            array(
                'param_name' => 'list_style_position',
                'heading'    => esc_html__( 'List Style Position', 'designthemes-core' ),
                'type'       => 'dropdown',
                'group' => __('Icon','designthemes-core'),
                'value'      => array(
                    __( 'Outside', 'designthemes-core' )  => 'outside',
                    __( 'Inside', 'designthemes-core' )  => 'inside',
                ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 padding-top-0px vc_column',
                'dependency' => array( 'element' => 'list_style_type', 'value_not_equal_to' => 'none' ),            
            ),

            # List Style
            array(
                'param_name' => 'list_style',
                'heading'    => esc_html__( 'List Style', 'designthemes-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'type'       => 'dropdown',
                'group' => __('Icon','designthemes-core'),
                'value'      => array(
                    __( 'Circle', 'designthemes-core' )  => 'circle',
                    __( 'Disc', 'designthemes-core' )  => 'disc',
                    __( 'Square', 'designthemes-core' )  => 'square',
                ),
                'std' => 'circle',
                'save_always' => true,
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'predefined' ),            
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'group' => __('Icon','designthemes-core'),
                'param_name' => 'hr_for_list_style_section',
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            array(
                'type' => 'dt_sc_vc_title',
                'group' => __('Icon','designthemes-core'),
                'heading'    => esc_html__( 'Menu Icons Settings', 'designthemes-core' ),
                'param_name' => 'title_for_icon_section',
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icon Size
            array(
                'type' => 'dt_sc_input_number',
                'param_name' => 'icon_size',
                'heading' => esc_html__('Icons Size (px)', 'designthemes-core'),
                'min'        => '10',
                'max'        => '35',   
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icon Color
            array(
                'type'       => 'dropdown',
                'param_name' => 'icon_color',
                'value' => array(
                    esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                    esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                    esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                    esc_html__('Custom Color','designthemes-core') => 'custom',
                ),
                'std' => 'custom',
                'heading'    => esc_html__( 'Icons Color', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icon Color
            array(
                'type'       => 'colorpicker',
                'param_name' => 'icon_custom_color',
                'value'      => 'inherit',
                'heading'    => esc_html__( 'Icons Custom Color', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'dependency' => array( 'element' => 'icon_color', 'value'   => 'custom' ),            
            ),            

            array(
                'type' => 'dt_sc_vc_hr',
                'group' => __('Icon','designthemes-core'),
                'param_name' => 'hr_for_icon_section',
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

        # Image
            array(
                'type' => 'dt_sc_vc_title',
                'group' => __('Icon','designthemes-core'),
                'heading'    => esc_html__( 'Menu Images Settings', 'designthemes-core' ),
                'param_name' => 'title_for_image_section',
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Image Size
            array(
                'type'       => 'dt_sc_input_number',
                'param_name' => 'icon_image_size',
                'heading'    => esc_html__( 'Image Size (px)', 'designthemes-core' ),
                'min'        => '10',
                'max'        => '35',   
                'value'      => '12',
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icons Width        
            array(
                'type'       => 'textfield',
                'param_name' => 'icon_width',
                'heading'    => esc_html__( 'Icons Width (px)', 'designthemes-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icon Padding
            array(
                'type'       => 'textfield',
                'param_name' => 'icon_padding',
                'heading'    => esc_html__( 'Icons Padding', 'designthemes-core' ),
                'description' => esc_html__('Any valid CSS value (3px, 50%, etc.)', 'designthemes-core'),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

            # Icon Margin
            array(
                'type'       => 'textfield',
                'param_name' => 'icon_margin',
                'heading'    => esc_html__( 'Icon Margin', 'designthemes-core' ),
                'description' => esc_html__('Any valid CSS value (3px, 50%, etc.)', 'designthemes-core'),
                'value'      => '0px',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Icon', 'designthemes-core' ),
                'dependency' => array( 'element' => 'list_style_type', 'value'   => 'custom-style' ),            
            ),

        # Default State Tab

            # Style
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'designthemes-core' ),
                'param_name' => 'default_style',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Bordered','designthemes-core') => 'bordered',
                    esc_html__('Filled','designthemes-core') => 'filled',
                    esc_html__('None','designthemes-core') => 'none',
                ),
                'description' => esc_html__( 'Select style of menu in default state.', 'designthemes-core' ),
                'std' => 'filled',
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'save_always' => true,
            ),

            # Border Radius         
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                'param_name' => 'default_border_radius',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                    esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                    esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                    esc_html__('Fully Rounded','designthemes-core') => 'fully-rounded',
                ),
                'description' => esc_html__( 'Select border radius of menu in default state.', 'designthemes-core' ),
                'std' => 'square',
                'save_always' => true,
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'dependency'  => array( 'element' => 'default_style', 'value' => array('bordered', 'filled') )
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'hr_for_color_section_end',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
            ),

            # Color
            array(
                'type' => 'dt_sc_vc_title',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
                'heading'    => esc_html__( 'Color', 'designthemes-core' ),
                'param_name' => 'title_for_default_state_color_section',
            ),

                # Item Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'default_item_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'primary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'default_bg_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'secondary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'default_style', 'value' => array('filled') ) 
                ),


                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'default_border_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'tertiary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'default_style', 'value' => array('bordered', 'filled') )
                ),

                array(
                    'type' => 'dt_sc_vc_hr_invisible',
                    'param_name' => 'default_hr_invisible_for_color_section_end',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'default_custom_item_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'default_item_color', 'value' => array('custom') )
                ),

                # Custom BG Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'default_custom_bg_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'default_bg_color', 'value' => array('custom') )                    
                ),

                # Custom Border Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'default_custom_border_color',
                    'group' => esc_html__( 'Default State', 'designthemes-core' ),
                    'value' => '#c50000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'default_border_color', 'value' => array('custom') )
                ),

            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'hr_invisible_for_text_transform',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
            ), 

            # Text Decoration
            array(
                'type' => 'dropdown', 
                'param_name' => 'default_text_decoration',
                'heading' => esc_html__('Text Decoration', 'designthemes-core'),
                'value' => array(
                    esc_html__( 'None', 'designthemes-core' ) => 'none',
                    esc_html__( 'Overline', 'designthemes-core' ) => 'overline',
                    esc_html__( 'Line Through', 'designthemes-core' ) => 'linethrough',
                    esc_html__( 'Underline', 'designthemes-core' ) => 'underline',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
            ),

        # Hover State Tab
            # Style
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'designthemes-core' ),
                'param_name' => 'hover_style',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Bordered','designthemes-core') => 'bordered',
                    esc_html__('Filled','designthemes-core') => 'filled',
                    esc_html__('None','designthemes-core') => 'none',
                ),
                'description' => esc_html__( 'Select style of menu in Hover state.', 'designthemes-core' ),
                'std' => 'filled',
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'save_always' => true,
            ),

            # Border Radius         
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                'param_name' => 'hover_border_radius',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                    esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                    esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                    esc_html__('Fully Rounded','designthemes-core') => 'fully-rounded',
                ),
                'description' => esc_html__( 'Select border radius of menu in Hover state.', 'designthemes-core' ),
                'std' => 'square',
                'save_always' => true,
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'dependency'  => array( 'element' => 'hover_style', 'value' => array('bordered', 'filled') )
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'hover_hr_for_color_section_end',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            ),

            # Color
            array(
                'type' => 'dt_sc_vc_title',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                'heading'    => esc_html__( 'Color', 'designthemes-core' ),
                'param_name' => 'title_for_hover_state_color_section',
            ),            

                # Item Color 
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'hover_item_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'primary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4', 
                ),

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'hover_bg_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'secondary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'hover_style', 'value' => array('filled') ) 
                ),


                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'hover_border_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'tertiary-color',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'hover_style', 'value' => array('bordered', 'filled') )
                ),

                array(
                    'type' => 'dt_sc_vc_hr_invisible',
                    'param_name' => 'hover_hr_invisible_for_color_section_end',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'hover_custom_item_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'hover_item_color', 'value' => array('custom') )
                ),

                # Custom BG Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'hover_custom_bg_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'hover_bg_color', 'value' => array('custom') )                    
                ),

                # Custom Border Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'hover_custom_border_color',
                    'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                    'value' => '#c50000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'hover_border_color', 'value' => array('custom') )
                ),

            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'hover_hr_invisible_for_text_transform',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            ), 

            # Text Decoration
            array(
                'type' => 'dropdown', 
                'param_name' => 'hover_text_decoration',
                'heading' => esc_html__('Text Decoration', 'designthemes-core'),
                'value' => array(
                    esc_html__( 'None', 'designthemes-core' ) => 'none',
                    esc_html__( 'Overline', 'designthemes-core' ) => 'overline',
                    esc_html__( 'Line through', 'designthemes-core' ) => 'linethrough',
                    esc_html__( 'Underline', 'designthemes-core' ) => 'underline',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            ),

        # Typography
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family?', 'designthemes-core' ),
                'param_name' => 'use_theme_fonts',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Use font family from the theme.', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts',
                'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'designthemes-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'designthemes-core' ),
                    ),
                ),
                'save_always' => true,
                'dependency' => array( 'element' => 'use_theme_fonts', 'value_not_equal_to' => 'yes' ),
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'type' => 'textfield', 
                'param_name' => 'font_size',
                'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                'std' => '15',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'param_name' => 'items_align',
                'heading'    => esc_html__( 'Items align', 'designthemes-core' ),
                'type'       => 'dropdown',
                'value'      => array(
                    esc_html__( 'Left', 'designthemes-core' )    => 'left',
                    esc_html__( 'Center', 'designthemes-core' )  => 'center',
                    esc_html__( 'Right', 'designthemes-core' )   => 'right',
                    esc_html__( 'None', 'designthemes-core' )   => 'none',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'type' => 'dropdown', 
                'param_name' => 'text_transform',
                'heading' => esc_html__('Text Transform', 'designthemes-core'),
                'value' => array(
                    esc_html__( 'Uppercase', 'designthemes-core' ) => 'uppercase',
                    esc_html__( 'Capitalize', 'designthemes-core' ) => 'capitalize',
                    esc_html__( 'Lowercase', 'designthemes-core' ) => 'lowercase',
                    esc_html__( 'None', 'designthemes-core' ) => 'none',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),        

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", 'designthemes-core' ),
            "param_name" => "class",
            'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core'),
            'group' => esc_html__( 'Design options', 'designthemes-core' ),

        ),        

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'designthemes-core' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),                
    )
) );