<?php
vc_map( array(
    "name"      => esc_html__( "Note", 'designthemes-core' ),
    "base"      => "dt_sc_note",
    "icon"      => "dt_sc_note",
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

        # Note Type
        array(
            'type' => 'dropdown',
            'param_name' => 'note_type',
            'heading' => esc_html__('Note Style', 'designthemes-core'),
            'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
            'value' => array(
                esc_html__( 'Title', 'designthemes-core' ) => 'title',
                esc_html__( 'Title And Sub Title', 'designthemes-core' ) => 'title-and-sub-title',
            ),
            'save_always' => true,
            'std' => 'title',
        ),

        array(
            'type' => 'dt_sc_vc_hr_invisible', 
            'param_name' => 'note_type_end_hr_invisible',
        ),

        array(
            'type' => 'textfield', 
            'param_name' => 'title',
            'heading' => esc_html__('Title', 'designthemes-core'),
            'value' => 'Title',
            'save_always' => true,
            'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
        ),

        array(
            'type' => 'textfield', 
            'param_name' => 'sub_title',
            'heading' => esc_html__('Sub Title', 'designthemes-core'),
            'value' => 'Sub Title',
            'save_always' => true,
            'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),
        ),

        array(
            'type' => 'textfield', 
            'param_name' => 'breakpoint',
            'heading' => esc_html__('Mobile Breakpoint (px)', 'designthemes-core'),
            'description' => esc_html__('Apply different style if resolution less than inputted value.', 'designthemes-core'),
            'value' => '780',
            'save_always' => true,
        ),        

        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", 'designthemes-core' ),
            "param_name" => "class",
            'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core'),
        ),

        # Agenda
        array(
            'type' => 'param_group',
            'param_name' => 'agenda',
            'group' => esc_html__( 'Agenda', 'designthemes-core' ),
            'params' => array(
                # Title
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Title", 'designthemes-core' ),
                    "param_name" => "title",
                    'save_always' => true,
                    'admin_label' => true,
                ),
                # Value
                array(
                    "type" => "textarea",
                    "heading" => esc_html__( "Value", 'designthemes-core' ),
                    "param_name" => "value",
                    'save_always' => true,
                ),
            )
        ),
        # Agenda

        # Typography
            # Title Typo
                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Title', 'designthemes-core' ),
                    'param_name' => 'title_for_title_typo_section',
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),                
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
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
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
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'line_height',
                    'heading' => esc_html__('Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'letter_spacing',
                    'heading' => esc_html__('Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_font_size',
                    'heading' => esc_html__('Mobile Font Size (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_line_height',
                    'heading' => esc_html__('Mobile Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_letter_spacing',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title', 'title-and-sub-title' ) ),
                ),                                                

            # Sub Title Typo
                array(
                    'type' => 'dt_sc_vc_hr',
                    'param_name' => 'sub_title_hr_for_color_section_end',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                                
                ),

                array(
                    'type' => 'dt_sc_vc_title',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'heading'    => esc_html__( 'Sub Title', 'designthemes-core' ),
                    'param_name' => 'title_for_sub_title_typo_section',
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use theme default font family?', 'designthemes-core' ),
                    'param_name' => 'use_theme_fonts_for_sub_title',
                    'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use font family from the theme.', 'designthemes-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),
                ),

                array(
                    'type' => 'google_fonts',
                    'param_name' => 'google_fonts_for_sub_title',
                    'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                    'settings' => array(
                        'fields' => array(
                            'font_family_description' => esc_html__( 'Select font family.', 'designthemes-core' ),
                            'font_style_description' => esc_html__( 'Select font styling.', 'designthemes-core' ),
                        ),
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'use_theme_fonts_for_sub_title', 'value_not_equal_to' => 'yes' ),
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'sub_title_font_size',
                    'heading' => esc_html__('Font Size (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'sub_title_line_height',
                    'heading' => esc_html__('Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'sub_title_letter_spacing',
                    'heading' => esc_html__('Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_sub_title_font_size',
                    'heading' => esc_html__('Mobile Font Size (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_sub_title_line_height',
                    'heading' => esc_html__('Mobile Line Height (px)', 'designthemes-core'),
                    'std' => '15',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
                ),

                array(
                    'type' => 'textfield', 
                    'param_name' => 'm_sub_title_letter_spacing',
                    'heading' => esc_html__('Mobile Letter Spacing (px)', 'designthemes-core'),
                    'std' => '0',
                    'save_always' => true,
                    'edit_field_class' => 'vc_col-sm-4 vc_column',
                    'group' => esc_html__( 'Typography', 'designthemes-core' ),
                    'dependency' => array( 'element' => 'note_type', 'value' => array( 'title-and-sub-title' ) ),                    
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
