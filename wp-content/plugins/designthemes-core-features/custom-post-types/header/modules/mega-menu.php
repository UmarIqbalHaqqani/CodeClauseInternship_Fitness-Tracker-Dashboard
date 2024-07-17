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
    "name" => esc_html__( "Mega Menu", 'designthemes-core' ),
    "base" => "dt_sc_header_menu",
    "icon" => "dt_sc_header_menu",
    "category" => esc_html__( 'Header', 'designthemes-core' ),
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

        # Menu
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
            'param_name' => 'display',
            'heading'    => esc_html__( 'Display Style', 'designthemes-core' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'type'       => 'dropdown',
            'save_always' => true,
            'value'      => array(
                __( 'Simple', 'designthemes-core' )  => 'simple',
                __( 'Boxed', 'designthemes-core' )  => 'boxed',
                __( 'Stretch', 'designthemes-core' )  => 'stretch',
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", 'designthemes-core' ),
            "param_name" => "class",
            'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core')
        ),

        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Enable Visal Nav ?', 'designthemes-core' ),
            'param_name' => 'visual_nav',
            'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
            'description' => esc_html__( 'Activate one page scroll.', 'designthemes-core' ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'save_always' => true,
        ),       

        # Main Menu Tab
            
            # Style
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'designthemes-core' ),
                'param_name' => 'style',
                'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Bordered','designthemes-core') => 'bordered',
                    esc_html__('Filled','designthemes-core') => 'filled',
                ),
                'description' => esc_html__( 'Select style of menu in default state.', 'designthemes-core' ),
                'std' => 'filled',
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'save_always' => true,
                'dependency'  => array( 'element' => 'display', 'value' => array('boxed', 'stretch') )                
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Highlighter', 'designthemes-core' ),
                'param_name' => 'highlighter',
                'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                'value' => array(
                    esc_html__('None','designthemes-core') => 'none',
                    esc_html__('Underline','designthemes-core') => 'underline',
                    esc_html__('Overline','designthemes-core') => 'overline',
                    esc_html__('Line through','designthemes-core') => 'line-through',
                    esc_html__('Two Line UpDown','designthemes-core') => 'two-line-updown',
                    esc_html__('Bottom Border only','designthemes-core') => 'bottom-border-only',
                    esc_html__('Top Border only','designthemes-core') => 'top-border-only',
                    esc_html__('Two Border UpDown','designthemes-core') => 'two-border-updown',
                    esc_html__('TriangleDown MidTop','designthemes-core') => 'triangle-down-midtop',
                    esc_html__('TriangleDown MidBottom','designthemes-core') => 'triangle-down-midbottom',
                    esc_html__('TriangleUp MidBottom','designthemes-core') => 'triangle-up-midbottom',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Separator', 'designthemes-core' ),
                'param_name' => 'separator',
                'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                'value' => array(
                    esc_html__('None','designthemes-core') => 'none',
                    esc_html__('Slanting Line','designthemes-core') => 'slanting-line',
                    esc_html__('Vertical Line','designthemes-core') => 'vertical-line',
                ),
                'std' => 'none',
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency'  => array( 'element' => 'display', 'value' => array('simple') ) 
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Item Padding", 'designthemes-core' ),
                "group" => esc_html__( 'Main Menu', 'designthemes-core' ),
                "param_name" => "item_padding",
                "edit_field_class" => 'vc_column vc_col-sm-6',
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Padding", 'designthemes-core' ),
                "param_name" => "padding",
                "group" => esc_html__( 'Main Menu', 'designthemes-core' ),
                "edit_field_class" => 'vc_column vc_col-sm-6',
                "dependency"  => array( 'element' => 'display', 'value' => array('boxed') )
            ),            

            # Color
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                    'param_name' => 'hr_for_color_section',
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Default State', 'designthemes-core' ),
                    'param_name' => 'title_for_color_section',
                ),

                    # Border Radius         
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                        'param_name' => 'border_radius',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'dependency'  => array( 'element' => 'display', 'value' => array('boxed', 'stretch') )
                    ),                

                    # Item Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                        'param_name' => 'default_item_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'secondary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency'  => array( 'element' => 'style', 'value' => array('filled') ) 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'default_border_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'tertiary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency'  => array( 'element' => 'style', 'value' => array('bordered', 'filled') )
                    ),

                    # Custom Item Color
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                        'param_name' => 'default_custom_item_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => '#c50000',
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'save_always' => true,
                        'dependency'  => array( 'element' => 'default_border_color', 'value' => array('custom') )
                    ),

                array(
                    'type' => 'dt_sc_vc_hr_invisible',
                    'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                    'param_name' => 'hr_inv_for_h_color_section',
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Hover State', 'designthemes-core' ),
                    'param_name' => 'title_for_h_color_section',
                ),

                    # Border Radius         
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                        'param_name' => 'h_border_radius',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'dependency'  => array( 'element' => 'display', 'value' => array('boxed', 'stretch') )
                    ),

                    # Item Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                        'param_name' => 'hover_item_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'secondary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency'  => array( 'element' => 'style', 'value' => array('filled') ) 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'hover_border_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'tertiary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency'  => array( 'element' => 'style', 'value' => array('bordered', 'filled') )
                    ),

                    # Custom Item Color
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                        'param_name' => 'hover_custom_item_color',
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
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
                        'group' => esc_html__( 'Main Menu', 'designthemes-core' ),
                        'value' => '#c50000',
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'save_always' => true,
                        'dependency'  => array( 'element' => 'hover_border_color', 'value' => array('custom') )
                    ),                                    
            # Color End
        # Main Menu Tab

        # Sub Menu Tab
        
            # Sub Menu Indicator
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Sub Menu Indicator?', 'designthemes-core' ),
                'param_name' => 'submenu_indicator',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Use Sub Menu Indicator in Main Menu.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'save_always' => true,
                'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
            ),

            # Customize Sub Menu Wrap
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Customize Sub Menu Wrapper?', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'description' => esc_html__( 'Use Sub Menu Indicator in Main Menu.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'save_always' => true,
                'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
            ),

            # Default State       
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'param_name' => 'hr_for_sub_menu_default_state',
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Default State', 'designthemes-core' ),
                    'param_name' => 'title_for_sub_menu_default_state',
                ),

                # Border Radius         
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_border_radius',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Square','designthemes-core') => 'square',
                        esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                        esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                        esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                        esc_html__('Fully Rounded','designthemes-core') => 'fully-rounded',
                    ),
                    'description' => esc_html__( 'Select border radius of sub menu in default state.', 'designthemes-core' ),
                    'std' => 'square',
                    'save_always' => true,
                ),

                # Border Style                 
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Style', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_border_style',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Dashed','designthemes-core') => "dashed",
                        esc_html__('Dotted','designthemes-core') => "dotted",
                        esc_html__('Double','designthemes-core') => "double",
                        esc_html__('Groove','designthemes-core') => "groove",
                        esc_html__('None','designthemes-core') => "none",
                        esc_html__('Ridge','designthemes-core') => "ridge",
                        esc_html__('Solid','designthemes-core') => "solid",
                    ),
                    'description' => esc_html__( 'Select border style of sub menu in default state.', 'designthemes-core' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'std' => 'none',
                    'save_always' => true,
                ),

                # Border Width
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Border Width', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_border_width',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => '0 0 0 1px',
                    'description' => esc_html__( 'Set border width of sub menu in default state.', 'designthemes-core' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'save_always' => true,
                ),

                # Item Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_item_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                        esc_html__('None','designthemes-core') => 'none',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),                                

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_bg_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('None','designthemes-core') => 'none',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),

                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_border_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                        esc_html__('None','designthemes-core') => 'none',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_custom_item_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_default_item_color', 'value' => array('custom') )
                ),                 

                # Custom BG Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_custom_bg_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_default_bg_color', 'value' => array('custom') )
                ),                

                # Custom Border Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_default_custom_border_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_default_border_color', 'value' => array('custom') )
                ),

            # Hover State       
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'param_name' => 'hr_for_sub_menu_hover_state',
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Hover State', 'designthemes-core' ),
                    'param_name' => 'title_for_sub_menu_hover_state',
                ),

                # Border Radius         
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_border_radius',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Square','designthemes-core') => 'square',
                        esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                        esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                        esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                        esc_html__('Fully Rounded','designthemes-core') => 'fully-rounded',
                    ),
                    'description' => esc_html__( 'Select border radius of sub menu in default state.', 'designthemes-core' ),
                    'std' => 'square',
                    'save_always' => true,
                ),

                # Border Style                 
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Style', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_border_style',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Dashed','designthemes-core') => "dashed",
                        esc_html__('Dotted','designthemes-core') => "dotted",
                        esc_html__('Double','designthemes-core') => "double",
                        esc_html__('Groove','designthemes-core') => "groove",
                        esc_html__('None','designthemes-core') => "none",
                        esc_html__('Ridge','designthemes-core') => "ridge",
                        esc_html__('Solid','designthemes-core') => "solid",
                    ),
                    'description' => esc_html__( 'Select border style of sub menu in default state.', 'designthemes-core' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'std' => 'none',
                    'save_always' => true,
                ),

                # Border Width
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Border Width', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_border_width',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => '0 0 0 1px',
                    'description' => esc_html__( 'Set border width of sub menu in default state.', 'designthemes-core' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'save_always' => true,
                ),

                # Item Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_item_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                        esc_html__('None','designthemes-core') => 'none',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),                                

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_bg_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                        esc_html__('None','designthemes-core') => 'none',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),

                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_border_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' => array(
                        esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                        esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                        esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                        esc_html__('Custom Color','designthemes-core') => 'custom',
                        esc_html__('None','designthemes-core') => 'none',
                    ),
                    'std' => 'none',
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_custom_item_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_hover_item_color', 'value' => array('custom') )
                ),                 

                # Custom BG Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_custom_bg_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_hover_bg_color', 'value' => array('custom') )
                ),                

                # Custom Border Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'sub_menu_hover_custom_border_color',
                    'group' => esc_html__( 'Sub Menu', 'designthemes-core' ),
                    'value' =>'', 
                    'save_always' => true,
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency'  => array( 'element' => 'sub_menu_hover_border_color', 'value' => array('custom') )
                ),        
        # Sub Menu Tab

        # Sub Menu Wrapper Tab            
            # Border Radius         
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border Radius', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_border_radius',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                    esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                    esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                ),
                'description' => esc_html__( 'Select border radius of sub menu in default state.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'std' => 'square',
                'save_always' => true,
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' )
            ),

            # BG Color         
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_bg_color',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Simple','designthemes-core') => 'simple',
                    esc_html__('Gradient','designthemes-core') => 'gradient',
                ),
                'description' => esc_html__( 'Select bg color for sub menu wrap.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
                'std' => 'simple',
                'save_always' => true,
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' )
            ),

            # Wrap BG Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_simple_bg_color',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'value' =>'', 
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency'  => array( 'element' => 'sub_menu_wrap_bg_color', 'value' => array('simple') )
            ),

            # Wrap Gradient BG Color 1
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'BG Color 1', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_gradient_bg_color_1',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency'  => array( 'element' => 'sub_menu_wrap_bg_color', 'value' => array('gradient') )
            ),

            # Wrap Gradient BG Color 2
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'BG Color 2', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_gradient_bg_color_2',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'dependency'  => array( 'element' => 'sub_menu_wrap_bg_color', 'value' => array('gradient') )
            ),

            # Wrap Gradient BG Direction
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Direction', 'designthemes-core' ),
                'param_name' => 'sub_menu_wrap_gradient_direction',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Bottom to Top','designthemes-core') => 'to top',
                    esc_html__('Top to Bottom','designthemes-core') => 'to bottom',
                    esc_html__('Left to Right','designthemes-core') => 'to right',
                    esc_html__('Right to Left','designthemes-core') => 'to left',
                    esc_html__('Bottom Right to Top Left','designthemes-core') => 'to top left',
                    esc_html__('Bottom Left to Right Top','designthemes-core') => 'to top right',
                    esc_html__('Left Top to Bottom Right','designthemes-core') => 'to bottom right',
                    esc_html__('Right Top to Bottom Left','designthemes-core') => 'to bottom left',
                ),
                'description' => esc_html__( 'Select bg color for sub menu wrap.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'std' => 'to right',
                'save_always' => true,
                'dependency'  => array( 'element' => 'sub_menu_wrap_bg_color', 'value' => 'gradient' )
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'param_name' => 'hr_for_sub_menu_wrap_bg',
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' )
            ),

            # Customize Sub Menu Wrap Border
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Customize Border ?', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_border',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'description' => esc_html__( 'Yes to customize the sub menu wrapper border.', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' ),
            ),

            # Border Style                 
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Border Style', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_border_style',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'value' => array(
                    esc_html__('Dashed','designthemes-core') => "dashed",
                    esc_html__('Dotted','designthemes-core') => "dotted",
                    esc_html__('Double','designthemes-core') => "double",
                    esc_html__('Groove','designthemes-core') => "groove",
                    esc_html__('None','designthemes-core') => "none",
                    esc_html__('Ridge','designthemes-core') => "ridge",
                    esc_html__('Solid','designthemes-core') => "solid",
                ),
                'description' => esc_html__( 'Select border style of sub menu in default state.', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'std' => 'none',
                'save_always' => true,
                'dependency'  => array( 'element' => 'submenu_wrapper_border', 'value' => 'yes' )
            ), 

            # Border Width                 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Border Width', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_border_width',
                'value' => '0 0 0 1px',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'dependency'  => array( 'element' => 'submenu_wrapper_border', 'value' => 'yes' )
            ),

            # Border Color                 
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_border_color',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'dependency'  => array( 'element' => 'submenu_wrapper_border', 'value' => 'yes' )
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'param_name' => 'hr_for_sub_menu_wrap_box_shadow',
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' )
            ),

            # Customize Sub Menu Wrap Box shadow
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Apply Box shadow ?', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_box_shadow',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'description' => esc_html__( 'Yes to apply box shadow for the sub menu wrapper.', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'dependency'  => array( 'element' => 'submenu_wrapper', 'value' => 'yes' ),
            ),            

            # Box shadow Color                 
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Box shadow Color', 'designthemes-core' ),
                'param_name' => 'submenu_wrapper_box_shadow_color',
                'group' => esc_html__( 'Sub Menu Wrap', 'designthemes-core' ),
                'edit_field_class' => 'vc_column vc_col-sm-4',
                'dependency'  => array( 'element' => 'submenu_wrapper_box_shadow', 'value' => 'yes' )
            ),
        # Sub Menu Wrapper Tab
        
        # Mobile Menu Tab
            array(
                'type'       => 'textfield',
                'param_name' => 'mobile_menu_label',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'heading'    => esc_html__( 'Label', 'designthemes-core' ),
                'value'      => 'Menu',
                'save_always' => true,
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
            ),

            array(
                'type'       => 'colorpicker',
                'param_name' => 'mobile_menu_label_color',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'heading'    => esc_html__( 'Label Color', 'designthemes-core' ),
                'value'      => '#000000',
                'save_always' => true,
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
            ),

            array(
                'type'       => 'textfield',
                'param_name' => 'breakpoint',
                'heading'    => esc_html__( 'Mobile Menu Breakpoint (px)', 'designthemes-core' ),
                'value'      => '1199',
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
            ),

            array(
                'type'       => 'dropdown',
                'param_name' => 'mobile_menu_position',
                'heading'    => esc_html__( 'Mobile Menu Position', 'designthemes-core' ),
                'value'      => array(
                    __( 'Left', 'designthemes-core' )   => 'left',
                    __( 'Right', 'designthemes-core' )  => 'right',
                ),
                'save_always' => true,
                'std'      => 'right',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
            ),

            # Icon library
            array(
                'type'       => 'dropdown',
                'param_name' => 'mobile_menu_icon_type',
                'heading'    => esc_html__( 'Icon library', 'designthemes-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                'std' => 'fontawesome',
                'value' => array(
                    __( 'Entypo', 'designthemes-core' ) => 'entypo',
                    __( 'Font Awesome', 'designthemes-core' ) => 'fontawesome',
                    __( 'Icon Moon Line', 'designthemes-core' ) => 'icon_moon_line',
                    __( 'Icon Moon Solid', 'designthemes-core' ) => 'icon_moon_solid',
                    __( 'Icon Moon Ultimate', 'designthemes-core' ) => 'icon_moon_ultimate',
                    __( 'Linecons', 'designthemes-core' ) => 'linecons',
                    __( 'Material Design Iconic', 'designthemes-core' ) => 'material_design_iconic_font',
                    __( 'Material', 'designthemes-core' ) => 'material',
                    __( 'Mono Social', 'designthemes-core' ) => 'monosocial',
                    __( 'Open Iconic', 'designthemes-core' ) => 'openiconic',
                    __( 'Pe Icon 7 Stroke', 'designthemes-core' ) => 'pe_icon_7_stroke',
                    __( 'Stroke Gap', 'designthemes-core' ) => 'stroke',
                    __( 'Typicons', 'designthemes-core' ) => 'typicons',                    
                ),
            ),

            array(
                'type'       => 'colorpicker',
                'param_name' => 'mobile_menu_icon_color',
                'edit_field_class' => 'vc_column vc_col-sm-6',
                'heading'    => esc_html__( 'Icon Color', 'designthemes-core' ),
                'value'      => '#000000',
                'save_always' => true,
                'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
            ),            

            # Icon
                # Entypo
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_entypo',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'entypo-icon entypo-icon-note',
                    'settings' => array( 'emptyIcon' => false, 'type' => 'entypo', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'entypo' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),               

                # Font Awesome
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_fontawesome',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'fa fa-bars',
                    'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'fontawesome' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Line            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_icon_moon_line',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-line line-icon-Add-Bag',
                    'settings' => array( 'type' => 'icon-moon-line', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'icon_moon_line' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Solid            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_icon_moon_solid',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-solid solid-icon-Add-File',
                    'settings' => array( 'type' => 'icon-moon-solid', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'icon_moon_solid' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Ultimate            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_icon_moon_ultimate',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-ultimate ultimate-icon-office',
                    'settings' => array( 'type' => 'icon-moon-ultimate', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'icon_moon_ultimate' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Linecons
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_linecons',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'vc_li vc_li-heart',
                    'settings' => array( 'emptyIcon' => false,  'type' => 'linecons', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'linecons', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Material Design Iconic                                 
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_material_design_iconic_font',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-material-design-iconic zmdi zmdi-airplane',
                    'settings' => array( 'type' => 'material-design-iconic-font', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'material_design_iconic_font', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Material
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_material',
                    'save_always' => true,
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'vc-material vc-material-cake',
                    'settings' => array( 'type' => 'material', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'material', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Mono Social
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_monosocial',
                    'value' => 'vc-mono vc-mono-fivehundredpx',
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'save_always' => true,
                    'settings' => array( 'emptyIcon' => false, 'type' => 'monosocial', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'monosocial', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Open Iconic
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_openiconic',
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'vc-oi vc-oi-dial',
                    'settings' => array( 'emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000, ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'openiconic', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Pe Icon 7 Stroke
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_pe_icon_7_stroke',
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-pe-7s pe-7s-hourglass',
                    'settings' => array( 'type' => 'pe-icon-7-stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'pe_icon_7_stroke' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),

                # Stroke Gap
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_stroke',
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'dt-stroke-icon icon icon-tie',
                    'settings' => array( 'type' => 'stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'stroke' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),

                # Typicons
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'mobile_menu_icon_type_typicons',
                    'group' => esc_html__( 'Mobile Menu', 'designthemes-core' ),
                    'value' => 'typcn typcn-adjust-brightness',
                    'settings' => array( 'type' => 'typicons', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'mobile_menu_icon_type', 'value' => 'typicons' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),
        # Mobile Menu Tab

        # Typography        
            array(
                'type' => 'Typography',
                'param_name' => 'title_for_main_menu_typo_section',
                'heading'    => esc_html__( 'Main Menu', 'designthemes-core' ),
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

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
                'type' => 'checkbox',
                'heading' => esc_html__( 'Same font family for mega menu items?', 'designthemes-core' ),
                'param_name' => 'mega_menu_font',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Use font family from the theme.', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
                'dependency' => array( 'element' => 'use_theme_fonts', 'value_not_equal_to' => 'yes' ),
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
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
                'dependency' => array( 'element' => 'use_theme_fonts', 'value_not_equal_to' => 'yes' ),
            ),

            array(
                'param_name' => 'font_size',
                'type' => 'textfield', 
                'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                'description' => esc_html__('Font size for first level', 'designthemes-core'),
                'std' => '15',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__('Typography', 'designthemes-core'),
            ),

            array(
                'param_name' => 'items_align',
                'heading'    => esc_html__( 'Items align', 'designthemes-core' ),
                'type'       => 'dropdown',
                'value'      => array(
                    __( 'Left', 'designthemes-core' )    => 'left',
                    __( 'Center', 'designthemes-core' )  => 'center',
                    __( 'Right', 'designthemes-core' )   => 'right',
                    __( 'None', 'designthemes-core' )    => 'none',
                ),
                'std' => 'none',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__('Typography', 'designthemes-core'),
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
                'type' => 'dt_sc_vc_hr',
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
                'param_name' => 'hr_for_sub_menu_typo_end_section',
            ),

            array(
                'type' => 'Typography',
                'param_name' => 'title_for_sub_menu_typo_section',
                'heading'    => esc_html__( 'Sub Menu', 'designthemes-core' ),
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Use theme default font family?', 'designthemes-core' ),
                'param_name' => 'use_theme_fonts_for_sub_menu',
                'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                'std' => 'yes',
                'description' => esc_html__( 'Use font family from the theme.', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
            ),

            array(
                'type' => 'google_fonts',
                'param_name' => 'sub_menu_google_fonts',
                'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'designthemes-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'designthemes-core' ),
                    ),
                ),
                'save_always' => true,
                'group' => esc_html__( 'Typography', 'designthemes-core' ),
                'dependency' => array( 'element' => 'use_theme_fonts_for_sub_menu', 'value_not_equal_to' => 'yes' ),
            ),

            array(
                'param_name' => 'sub_menu_font_size',
                'type' => 'textfield', 
                'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                'std' => '13',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__('Typography', 'designthemes-core'),
            ),

            array(
                'param_name' => 'sub_menu_items_align',
                'heading'    => esc_html__( 'Items align', 'designthemes-core' ),
                'type'       => 'dropdown',
                'value'      => array(
                    __( 'Left', 'designthemes-core' )    => 'left',
                    __( 'Center', 'designthemes-core' )  => 'center',
                    __( 'Right', 'designthemes-core' )   => 'right',
                    __( 'None', 'designthemes-core' ) => 'none',
                ),
                'std' => 'none',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'group' => esc_html__('Typography', 'designthemes-core'),
            ),

            array(
                'type' => 'dropdown',
                'param_name' => 'sub_menu_text_transform',
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

        # CSS
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'designthemes-core' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),        
    )
) );