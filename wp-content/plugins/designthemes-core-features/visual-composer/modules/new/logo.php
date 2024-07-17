<?php
vc_map( array(
    "name" => esc_html__( "Logo", 'designthemes-core' ),
    "base" => "dt_sc_logo",
    "icon" => "dt_sc_logo",
    "category" => DT_VC_CATEGORY,
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

        # Logo Type
        array(
            'type' => 'dropdown',
            'param_name' => 'logo_type',
            'heading' => esc_html__('Logo Type', 'designthemes-core'),
            'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
            'value' => array(
                esc_html__( 'Logo', 'designthemes-core' ) => 'theme-logo',
                esc_html__( 'Custom Image', 'designthemes-core' ) => 'custom-image',
                esc_html__( 'Title', 'designthemes-core' ) => 'text',
                esc_html__( 'Title and Description', 'designthemes-core' ) => 'text-desc',
            ),
            'save_always' => true,
            'std' => 'theme-logo',
        ),

        array(
            'type' => 'dt_sc_vc_hr_invisible',
            'param_name' => 'hr_invisible_for_logo_select',
        ),        

        # Theme Logo
        array(
            'type' => 'dropdown',
            'param_name' => 'theme_logo_type',
            'heading' => esc_html__('Logo', 'designthemes-core'),
            'edit_field_class' => 'vc_column vc_col-sm-4',
            'value' => array(
				esc_html__( 'Logo', 'designthemes-core' ) => 'logo',
                esc_html__( 'Light Logo', 'designthemes-core' ) => 'light-logo',                
            ),
            'save_always' => true,
            'std' => 'logo',
            'dependency' => array( 'element' => 'logo_type', 'value' => 'theme-logo' ),
        ),

        # Custom Image Settings ( logo_type = custom-image )
        array(
            'type' => 'attach_image',
            'param_name' => 'image',
            'heading' => esc_html__( 'Image', 'designthemes-core' ),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'save_always' => true,
            'dependency' => array( 'element' => 'logo_type', 'value' => 'custom-image' ),
        ),

        # Image Width
        array(
            'type' => 'textfield', 
            'param_name' => 'image_width',
            'heading' => esc_html__('Image Width (px)', 'designthemes-core'),
            'std' => '150',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'save_always' => true,
            'dependency' => array( 'element' => 'logo_type', 'value' => array( 'custom-image', 'theme-logo' ) ),
        ),

        # Image Width in Mobile
        array(
            'type' => 'textfield', 
            'param_name' => 'm_image_width',
            'heading' => esc_html__('Mobile Image Width (px)', 'designthemes-core'),
            'value' => '100',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'save_always' => true,
            'dependency' => array( 'element' => 'logo_type', 'value' => array( 'custom-image', 'theme-logo' ) ),            
        ),
        # Custom Image Settings
        
        # Custom Text Settings
            
            # Logo Text
            array(
                'type' => 'textfield', 
                'param_name' => 'logo_text',
                'heading' => esc_html__('Site Title', 'designthemes-core'),
                'value' => get_bloginfo ( 'name' ),
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'save_always' => true,
                'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
            ),

            array(
                'type' => 'dt_sc_vc_hr_invisible', 
                'param_name' => 'hr_logo_text',
                'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text' ) ),
            ),

            # Logo Tagline            

            array(
                'type' => 'textfield', 
                'param_name' => 'logo_tagline',
                'heading' => esc_html__('Site Tagline', 'designthemes-core'),
                'value' => get_bloginfo ( 'description' ),
                'edit_field_class' => 'vc_col-sm-8 vc_column',
                'save_always' => true,
                'dependency' => array( 'element' => 'logo_type', 'value' => 'text-desc' ),
            ),
        # Custom Text Settings

        array(
            'param_name' => 'item_align',
            'heading'    => esc_html__( 'Alignment?', 'designthemes-core' ),
            'type'       => 'dropdown',
            'value'      => array(
                esc_html__( 'Left', 'designthemes-core' )    => 'left',
                esc_html__( 'Center', 'designthemes-core' )  => 'center',
                esc_html__( 'Right', 'designthemes-core' )   => 'right',
            ),
            'std' => 'center',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        array(
            'type' => 'textfield', 
            'param_name' => 'breakpoint',
            'heading' => esc_html__('Mobile Breakpoint (px)', 'designthemes-core'),
            'description' => esc_html__('Apply different style if resolution less than the input value.', 'designthemes-core'),
            'value' => '767',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-8 vc_column',
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", 'designthemes-core' ),
            "param_name" => "class",
            'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core'),
        ),

        # Color
         
            # Site Title Color
            array(
                'type' => 'dt_sc_vc_title',
                'group' => esc_html__( 'Color', 'designthemes-core' ),
                'heading'    => esc_html__( 'Site Title Color', 'designthemes-core' ),
                'param_name' => 'title_for_default_state_color_section',
                'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),                
            ),

                # Item Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'default_item_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'default_bg_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) )
                ),

                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'default_border_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'dt_sc_vc_hr_invisible',
                    'param_name' => 'default_hr_invisible_for_color_section_end',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'default_custom_item_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'value' => '#c50000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'default_border_color', 'value' => array('custom') )
                ),

            array(
                'type' => 'dt_sc_vc_hr',
                'param_name' => 'default_hr_for_color_section_end',
                'group' => esc_html__( 'Color', 'designthemes-core' ),
                'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                                
            ),

            # Site Description Color
            array(
                'type' => 'dt_sc_vc_title',
                'group' => esc_html__( 'Color', 'designthemes-core' ),
                'heading'    => esc_html__( 'Site Description Color', 'designthemes-core' ),
                'param_name' => 'desc_title_for_default_state_color_section',
                'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                
            ),

                # Item Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_item_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),
                ),

                # BG Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_bg_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                # Border Color
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_border_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'dt_sc_vc_hr_invisible',
                    'param_name' => 'desc_default_hr_invisible_for_color_section_end',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),
                ),

                # Custom Item Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Item Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_custom_item_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'desc_default_item_color', 'value' => array('custom') )
                ),

                # Custom BG Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_custom_bg_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'value' => '#da0000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'desc_default_bg_color', 'value' => array('custom') )                    
                ),

                # Custom Border Color
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                    'param_name' => 'desc_default_custom_border_color',
                    'group' => esc_html__( 'Color', 'designthemes-core' ),
                    'value' => '#c50000',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'save_always' => true,
                    'dependency'  => array( 'element' => 'desc_default_border_color', 'value' => array('custom') )
                ),                    
        # Color        


        # Typography
        
            # Site Title Typo                
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Site Title', 'designthemes-core' ),
                    'param_name' => 'title_for_site_title_typo_section',
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),                
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
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
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
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height',
                    'heading' => esc_html__('Line Height (px)', 'designthemes-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing',
                    'heading' => esc_html__('Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size',
                    'heading' => esc_html__('Mobile Font Size (px)', 'designthemes-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height',
                    'heading' => esc_html__('Mobile Line Height (px)', 'designthemes-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text', 'text-desc' ) ),
                ),                                                

            # Site Description Typo
                array(
                    'type' => 'dt_sc_vc_hr',
                    'param_name' => 'site_desc_hr_for_color_section_end',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                                
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Site Description', 'designthemes-core' ),
                    'param_name' => 'title_for_site_desc_typo_section',
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'designthemes-core' ),
                    'param_name' => 'use_theme_fonts_for_desc',
                    'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'designthemes-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_desc',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'designthemes-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'designthemes-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_desc', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'desc_font_size',
                    'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'desc_line_height',
                    'heading' => esc_html__('Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'desc_letter_spacing',
                    'heading' => esc_html__('Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_desc_font_size',
                    'heading' => esc_html__('Mobile Font Size (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_desc_line_height',
                    'heading' => esc_html__('Mobile Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_desc_letter_spacing',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'logo_type', 'value' => array( 'text-desc' ) ),                    
                ),                       
        # Typography

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'designthemes-core' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),	
    )
) );	