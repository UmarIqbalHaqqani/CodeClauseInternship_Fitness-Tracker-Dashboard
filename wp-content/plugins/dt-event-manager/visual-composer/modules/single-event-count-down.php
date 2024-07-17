<?php
vc_map( array(
    "name" => esc_html__( "Single Event Countdown", 'dt-event-manager' ),
    "base" => "dt_sc_event_single_countdown",
    "icon" => "dt_sc_event_single_countdown",
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

        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Category ?', 'dt-core' ),
            'param_name' => 'show_category',
            'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
            'std' => 'yes',
            'description' => esc_html__( 'Show event category.', 'dt-core' ),
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Location ?', 'dt-core' ),
            'param_name' => 'show_location',
            'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
            'std' => 'yes',
            'description' => esc_html__( 'Show event location.', 'dt-core' ),
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Instructor ?', 'dt-core' ),
            'param_name' => 'show_instructor',
            'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
            'std' => 'yes',
            'description' => esc_html__( 'Show event instructor.', 'dt-core' ),
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),        

        array(
            'type' => 'textfield', 
            'param_name' => 'date_format',
            'heading' => esc_html__('Date Format', 'dt-event-manager'),
            'description' => '<a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">'.esc_html__('Sample Date Format', 'dt-event-manager').'</a>',
            'value' => 'l, F j, Y',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),        

        array(
            'type' => 'textfield', 
            'param_name' => 'breakpoint',
            'heading' => esc_html__('Mobile Breakpoint (px)', 'dt-event-manager'),
            'description' => esc_html__('Apply different style if resolution less than the input value.', 'dt-event-manager'),
            'value' => '767',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-8 vc_column',
        ),        

        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'dt-event-manager' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dt-event-manager' ),
        ),

        /*
        # Typography
            
            # Title Typo
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'heading'    => esc_html__( 'Event Title', 'dt-core' ),
                    'param_name' => 'title_for_event_title_typo_section',
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'dt-core' ),
                    'param_name' => 'use_theme_fonts_for_event_title',
                    'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'dt-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_event_title',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'dt-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'dt-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_event_title', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'font_size_for_event_title',
                    'heading' => esc_html__('Font Size (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height_for_event_title',
                    'heading' => esc_html__('Line Height (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing_for_event_title',
                    'heading' => esc_html__('Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size_for_event_title',
                    'heading' => esc_html__('Mobile Font Size (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height_for_event_title',
                    'heading' => esc_html__('Mobile Line Height (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing_for_event_title',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'param_name' => 'hr_for_event_title_section_end',
                ),

            # Meta Typo    
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'heading'    => esc_html__( 'Event Meta', 'dt-core' ),
                    'param_name' => 'title_for_event_meta_typo_section',
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'dt-core' ),
                    'param_name' => 'use_theme_fonts_for_event_meta',
                    'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'dt-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_event_meta',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'dt-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'dt-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_event_meta', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'font_size_for_event_meta',
                    'heading' => esc_html__('Font Size (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height_for_event_meta',
                    'heading' => esc_html__('Line Height (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing_for_event_meta',
                    'heading' => esc_html__('Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size_for_event_meta',
                    'heading' => esc_html__('Mobile Font Size (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height_for_event_meta',
                    'heading' => esc_html__('Mobile Line Height (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing_for_event_meta',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),                

                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'param_name' => 'hr_for_event_meta_section_end',
                ),

            # Content Typo            
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'heading'    => esc_html__( 'Event Content', 'dt-core' ),
                    'param_name' => 'title_for_event_content_typo_section',
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'dt-core' ),
                    'param_name' => 'use_theme_fonts_for_event_content',
                    'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'dt-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_event_content',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'dt-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'dt-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_event_content', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'font_size_for_event_content',
                    'heading' => esc_html__('Font Size (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height_for_event_content',
                    'heading' => esc_html__('Line Height (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing_for_event_content',
                    'heading' => esc_html__('Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size_for_event_content',
                    'heading' => esc_html__('Mobile Font Size (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height_for_event_content',
                    'heading' => esc_html__('Mobile Line Height (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing_for_event_content',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),                

                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'param_name' => 'hr_for_event_content_section_end',
                ),

            # Calender Typo    
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                    'heading'    => esc_html__( 'Event Calender', 'dt-core' ),
                    'param_name' => 'title_for_event_calender_typo_section',
                ),


                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'dt-core' ),
                    'param_name' => 'use_theme_fonts_for_event_callender',
                    'value' => array( esc_html__( 'Yes', 'dt-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'dt-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_event_callender',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'dt-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'dt-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_event_callender', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'font_size_for_event_callender',
                    'heading' => esc_html__('Font Size (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height_for_event_callender',
                    'heading' => esc_html__('Line Height (px)', 'dt-core'),
                    'std' => '50',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing_for_event_callender',
                    'heading' => esc_html__('Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size_for_event_callender',
                    'heading' => esc_html__('Mobile Font Size (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height_for_event_callender',
                    'heading' => esc_html__('Mobile Line Height (px)', 'dt-core'),
                    'std' => '25',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing_for_event_callender',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'dt-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'dt-core' ),
                ),                                    
        # Typography
        */       

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'dt-event-manager' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'dt-event-manager' ),
        ),
    )
) );