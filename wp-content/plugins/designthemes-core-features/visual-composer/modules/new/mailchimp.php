<?php
function dt_mailchimp_list() {

    $lists = array();

    $apiKey = cs_get_option( 'mailchimp-key' );
    if( !empty( $apiKey ) ) {
        
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        $result_decode = json_decode($result, true);
        $results = $result_decode['lists'];
        $results = is_array( $results ) ? $results : array();

        foreach( $results as $list  ) {
            $lists[$list['name']] = $list['id'];
        }
    }

    return $lists;
}


vc_map( array(
    "name"      => esc_html__( "Subscribe Form", 'designthemes-core' ),
    "base"      => "dt_sc_mc_subscribe",
    "icon"      => "dt_sc_mc_subscribe",
    "category"  => DT_VC_CATEGORY,
    "description" => esc_html__( "Add Mailchimp subscribe form", 'designthemes-core'),
    "params"    => array(

        # General
            # ID
            array(
                'type' => 'el_id',
                'param_name' => 'el_id',
                'edit_field_class' => 'hidden',
                'settings' => array (
                    'auto_generate' => true
                )
            ),

            # List ID
            array(
                'type'       => 'dropdown',
                'param_name' => 'listid',
                'heading'    => esc_html__( 'List ID', 'designthemes-core' ),
                'value' => dt_mailchimp_list (),
                'save_always' => true,
            ), 

           # Radius
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Radius', 'designthemes-core' ),
                'param_name' => 'radius',
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Circle','designthemes-core') => 'circle',
                    esc_html__('Simple Rounded','designthemes-core') => 'simple-rounded',
                    esc_html__('Partially Rounded','designthemes-core') => 'partially-rounded',
                    esc_html__('Partially Rounded Alt','designthemes-core') => 'partially-rounded-alt',
                ),
                'std' => 'square',
                'save_always' => true,
            ),

            # Display
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Display ?', 'designthemes-core' ),
                'param_name' => 'display',
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('Inline','designthemes-core') => 'inline',
                    esc_html__('Inline Block','designthemes-core') => 'inline-block',
                    esc_html__('Block','designthemes-core') => 'block',
                ),
                'std' => 'inline',
                'save_always' => true,
            ),

            # Gap
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Gap ?', 'designthemes-core' ),
                'param_name' => 'gap',
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('None','designthemes-core') => 'no_gap',
                    esc_html__('Gap-5','designthemes-core') => 'gap_5',
                    esc_html__('Gap-10','designthemes-core') => 'gap_10',
                    esc_html__('Gap-15','designthemes-core') => 'gap_15',
                ),
                'std' => 'no_gap',
                'save_always' => true,
                'dependency'  => array( 'element' => 'display', 'value' => array('inline-block', 'block') )
            ),

            array(
                'type' => 'dt_sc_vc_hr_invisible',
                'param_name' => 'hr_invisible_for_general',
            ),                        

            # Height
            array(
                'type' => 'dt_sc_input_number',
                'heading' => esc_html__( 'Height (px) ?', 'designthemes-core' ),
                'param_name' => 'height',
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'min' => '50',
                'max' => '100',
                'std' => '50',
                'save_always' => true,
            ),

            # Extra Class
            array(
                'type' => 'textfield',
                'heading' => __( 'Extra class name', 'designthemes-core' ),
                'param_name' => 'el_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core' ),
            ),

        # Input Field
            
            # Label
            array(
                'type'       => 'textfield',
                'param_name' => 'input_label',
                'heading'    => esc_html__( 'Label', 'designthemes-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'save_always' => true,
                'group' => esc_html__( 'Input', 'designthemes-core' ),
            ),

            # Placeholder
            array(
                'type'       => 'textfield',
                'param_name' => 'placeholder',
                'heading'    => esc_html__( 'Placeholder', 'designthemes-core' ),
                'edit_field_class' => 'padding-top-0px vc_col-sm-6 vc_column',
                'save_always' => true,
                'group' => esc_html__( 'Input', 'designthemes-core' ),
            ),

            # Shape
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Shape', 'designthemes-core' ),
                'param_name' => 'input-shape',
                'group' => __('Input','designthemes-core'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('None','designthemes-core') => 'none',
                    esc_html__('Filled','designthemes-core') => 'filled',
                    esc_html__('Bordered','designthemes-core') => 'bordered',
                ),
                'std' => 'square',
                'save_always' => true,
            ),

            array(
                'type' => 'dt_sc_vc_hr',
                'group' => __('Input','designthemes-core'),
                'param_name' => 'hr_for_input_shape',
            ),

            # Color Section
                
                # Default State                    
                    array(
                        'type' => 'dt_sc_vc_title',
                        'group' => __('Input','designthemes-core'),
                        'heading'    => esc_html__( 'Default State', 'designthemes-core' ),
                        'param_name' => 'title_for_input_default_state',
                    ),                     

                    # Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Color', 'designthemes-core' ),
                        'param_name' => 'input-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
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
                        'param_name' => 'input-bg-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'input-shape', 'value' => array( 'filled' ) ), 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'input-border-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'input-shape', 'value' => array( 'filled', 'bordered' ) ), 
                    ),

                    # Custom Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                        'param_name' => 'input-custom-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom BG Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                        'param_name' => 'input-custom-bg-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-bg-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom Border Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                        'param_name' => 'input-custom-border-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-border-color', 'value' => array( 'custom' ) ),                 
                    ),

                # Hover State
                    array(
                        'type' => 'dt_sc_vc_hr',
                        'group' => __('Input','designthemes-core'),
                        'param_name' => 'hr_for_input_hover_state',
                    ),

                    array(
                        'type' => 'dt_sc_vc_title',
                        'group' => __('Input','designthemes-core'),
                        'heading'    => esc_html__( 'Hover State', 'designthemes-core' ),
                        'param_name' => 'title_for_input_hover_state',
                    ),                     

                    # Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Color', 'designthemes-core' ),
                        'param_name' => 'input-hover-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
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
                        'param_name' => 'input-hover-bg-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'dependency' => array( 'element' => 'input-shape', 'value' => array( 'filled' ) ), 
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'input-hover-border-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'input-shape', 'value' => array( 'filled', 'bordered' ) ), 
                    ),

                    # Custom Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                        'param_name' => 'input-hover-custom-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-hover-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom BG Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                        'param_name' => 'input-hover-custom-bg-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-hover-bg-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom Border Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                        'param_name' => 'input-hover-custom-border-color',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'input-hover-border-color', 'value' => array( 'custom' ) ),                 
                    ),                                
            # Color Section

            # Icon Section                    
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => esc_html__('Input','designthemes-core'),
                    'param_name' => 'hr_for_input_icon',
                ),

                # Use Icon
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Use icon ?', 'designthemes-core' ),
                    'param_name' => 'use_icon',
                    'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' ),
                    'std' => 'yes',
                    'description' => esc_html__( 'Use icon for input.', 'designthemes-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Input', 'designthemes-core' ),
                ),

                # Icon library
                array(
                    'type'       => 'dropdown',
                    'param_name' => 'icon_type',
                    'heading'    => esc_html__( 'Icon library', 'designthemes-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Input', 'designthemes-core' ),
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
                    'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                ),

                # Icon
                    # Entypo
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_entypo',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'entypo-icon entypo-icon-note',
                        'settings' => array( 'emptyIcon' => false, 'type' => 'entypo', 'iconsPerPage' => 4000 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'entypo' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),               

                    # Font Awesome
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_fontawesome',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'fa fa-adjust',
                        'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'fontawesome' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Icon Moon Line            
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_icon_moon_line',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-icon-moon-line line-icon-Add-Bag',
                        'settings' => array( 'type' => 'icon-moon-line', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'icon_moon_line' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Icon Moon Solid            
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_icon_moon_solid',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-icon-moon-solid solid-icon-Add-File',
                        'settings' => array( 'type' => 'icon-moon-solid', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'icon_moon_solid' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Icon Moon Ultimate            
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_icon_moon_ultimate',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-icon-moon-ultimate ultimate-icon-office',
                        'settings' => array( 'type' => 'icon-moon-ultimate', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'icon_moon_ultimate' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Linecons
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_linecons',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'vc_li vc_li-heart',
                        'settings' => array( 'emptyIcon' => false,  'type' => 'linecons', 'iconsPerPage' => 4000 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'linecons', ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Material Design Iconic                                 
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_material_design_iconic_font',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-material-design-iconic zmdi zmdi-airplane',
                        'settings' => array( 'type' => 'material-design-iconic-font', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'material_design_iconic_font', ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Material
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_material',
                        'save_always' => true,
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'vc-material vc-material-cake',
                        'settings' => array( 'type' => 'material', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'material', ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Mono Social
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_monosocial',
                        'value' => 'vc-mono vc-mono-fivehundredpx',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'save_always' => true,
                        'settings' => array( 'emptyIcon' => false, 'type' => 'monosocial', 'iconsPerPage' => 4000 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'monosocial', ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Open Iconic
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_openiconic',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'vc-oi vc-oi-dial',
                        'settings' => array( 'emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000, ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'openiconic', ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),
                    ),

                    # Pe Icon 7 Stroke
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_pe_icon_7_stroke',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-pe-7s pe-7s-hourglass',
                        'settings' => array( 'type' => 'pe-icon-7-stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'pe_icon_7_stroke' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                    ),

                    # Stroke Gap
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_stroke',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'dt-stroke-icon icon icon-tie',
                        'settings' => array( 'type' => 'stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'stroke' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                    ),

                    # Typicons
                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Icon', 'designthemes-core' ),
                        'param_name' => 'icon_type_typicons',
                        'group' => esc_html__( 'Input', 'designthemes-core' ),
                        'value' => 'typcn typcn-adjust-brightness',
                        'settings' => array( 'type' => 'typicons', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                        'dependency' => array( 'element' => 'icon_type', 'value' => 'typicons' ),
                        'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                    ),

                # Icon Alignment
                array(
                    'type'       => 'dropdown',
                    'param_name' => 'icon_alignment',
                    'heading'    => esc_html__( 'Alignment', 'designthemes-core' ),
                    'save_always' => true,
                    'group' => esc_html__( 'Input', 'designthemes-core' ),
                    'value' => array(
                        __( 'Left', 'designthemes-core' ) => 'left',
                        __( 'Right', 'designthemes-core' ) => 'right',
                    ),
                    'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                ),

                # Icon Color
                
                    # Default State
                        array(
                            'type' => 'dt_sc_vc_hr',
                            'group' => __('Input','designthemes-core'),
                            'param_name' => 'hr_for_input_icon_default_state',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),
                        ),

                        array(
                            'type' => 'dt_sc_vc_title',
                            'group' => __('Input','designthemes-core'),
                            'heading'    => esc_html__( 'Default State', 'designthemes-core' ),
                            'param_name' => 'title_for_input_icon_default_state',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),
                        ),                     

                        # Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Color', 'designthemes-core' ),
                            'param_name' => 'icon-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'custom',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # BG Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                            'param_name' => 'icon-bg-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'primary-color',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4', 
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # Border Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                            'param_name' => 'icon-border-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'primary-color',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4', 
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # Custom Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                            'param_name' => 'icon-custom-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#ffffff',
                            'dependency' => array( 'element' => 'icon-color', 'value' => 'custom' ),            
                        ),

                        # Custom BG Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                            'param_name' => 'icon-custom-bg-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#c50000',
                            'dependency' => array( 'element' => 'icon-bg-color', 'value' => 'custom' ),            
                        ),

                        # Custom Border Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                            'param_name' => 'icon-custom-border-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#c50000',
                            'dependency' => array( 'element' => 'icon-border-color', 'value' => 'custom' ),            
                        ),

                    # Hover State
                        array(
                            'type' => 'dt_sc_vc_hr',
                            'group' => __('Input','designthemes-core'),
                            'param_name' => 'hr_for_input_icon_hover_state',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),
                        ),

                        array(
                            'type' => 'dt_sc_vc_title',
                            'group' => __('Input','designthemes-core'),
                            'heading'    => esc_html__( 'Hover State', 'designthemes-core' ),
                            'param_name' => 'title_for_input_icon_hover_state',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),
                        ),                     

                        # Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'custom',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # BG Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-bg-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'secondary-color',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4', 
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # Border Color
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-border-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'value' => array(
                                esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                                esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                                esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                                esc_html__('Custom Color','designthemes-core') => 'custom',
                            ),
                            'std' => 'secondary-color',
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4', 
                            'dependency' => array( 'element' => 'use_icon', 'value' => 'yes' ),            
                        ),

                        # Custom Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-custom-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#ffffff',
                            'dependency' => array( 'element' => 'icon-hover-color', 'value' => 'custom' ),            
                        ),

                        # Custom BG Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-custom-bg-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#c50000',
                            'dependency' => array( 'element' => 'icon-hover-bg-color', 'value' => 'custom' ),            
                        ),

                        # Custom Border Color
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                            'param_name' => 'icon-hover-custom-border-color',
                            'group' => esc_html__( 'Input', 'designthemes-core' ),
                            'save_always' => true,
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => '#c50000',
                            'dependency' => array( 'element' => 'icon-hover-border-color', 'value' => 'custom' ),            
                        ),                                                                                
            # Icon Section                                
            
        # Input Field
                
        # Submit Button        
            
            # Shape
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Shape', 'designthemes-core' ),
                'param_name' => 'btn_shape',
                'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('None','designthemes-core') => 'none',
                    esc_html__('Filled','designthemes-core') => 'filled',
                    esc_html__('Bordered','designthemes-core') => 'bordered',
                ),
                'std' => 'filled',
                'save_always' => true,
            ),

            # Style
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Style', 'designthemes-core' ),
                'param_name' => 'btn_style',
                'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                'save_always' => true,
                'edit_field_class' => 'padding-top-0px vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('Text','designthemes-core') => 'text-only',
                    esc_html__('Icon','designthemes-core') => 'icon-only',
                    esc_html__('Text + Icon','designthemes-core') => 'text-icon',
                ),
            ),

            # Text
            array(
                'type'       => 'textfield',
                'param_name' => 'btn_label',
                'heading'    => esc_html__( 'Label', 'designthemes-core' ),
                'std'        => 'Submit',
                'save_always' => true,
                'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                'dependency' => array( 'element' => 'btn_style', 'value' => array( 'text-only', 'text-icon') ),            
            ),

            # Button Style
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Justify', 'designthemes-core' ),
                'param_name' => 'btn_layout',
                'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
                'value' => array(
                    esc_html__('Left','designthemes-core') => 'left',
                    esc_html__('Center','designthemes-core') => 'center',
                    esc_html__('Right','designthemes-core') => 'right',
                    esc_html__('Stretch','designthemes-core') => 'stretch',
                ),
                'std' => 'right',
                'save_always' => true,
                'dependency' => array( 'element' => 'display', 'value' => 'block' ),
            ),

            # Icon library
            array(
                'type'       => 'dropdown',
                'param_name' => 'btn_icon_type',
                'heading'    => esc_html__( 'Icon library', 'designthemes-core' ),
                'save_always' => true,
                'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
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
                'dependency' => array( 'element' => 'btn_style', 'value' => array( 'icon-only', 'text-icon') ),            
            ),

            # Icon
                # Entypo
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_entypo',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'entypo-icon entypo-icon-note',
                    'settings' => array( 'emptyIcon' => false, 'type' => 'entypo', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'entypo' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),               

                # Font Awesome
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_fontawesome',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'fa fa-adjust',
                    'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'fontawesome' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Line            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_icon_moon_line',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-line line-icon-Add-Bag',
                    'settings' => array( 'type' => 'icon-moon-line', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'icon_moon_line' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Solid            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_icon_moon_solid',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-solid solid-icon-Add-File',
                    'settings' => array( 'type' => 'icon-moon-solid', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'icon_moon_solid' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Icon Moon Ultimate            
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_icon_moon_ultimate',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-icon-moon-ultimate ultimate-icon-office',
                    'settings' => array( 'type' => 'icon-moon-ultimate', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'icon_moon_ultimate' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Linecons
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_linecons',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'vc_li vc_li-heart',
                    'settings' => array( 'emptyIcon' => false,  'type' => 'linecons', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'linecons', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Material Design Iconic                                 
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_material_design_iconic_font',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-material-design-iconic zmdi zmdi-airplane',
                    'settings' => array( 'type' => 'material-design-iconic-font', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'material_design_iconic_font', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Material
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_material',
                    'save_always' => true,
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'vc-material vc-material-cake',
                    'settings' => array( 'type' => 'material', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'material', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Mono Social
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_monosocial',
                    'value' => 'vc-mono vc-mono-fivehundredpx',
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'save_always' => true,
                    'settings' => array( 'emptyIcon' => false, 'type' => 'monosocial', 'iconsPerPage' => 4000 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'monosocial', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Open Iconic
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_openiconic',
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'vc-oi vc-oi-dial',
                    'settings' => array( 'emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000, ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'openiconic', ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),
                ),

                # Pe Icon 7 Stroke
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_pe_icon_7_stroke',
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-pe-7s pe-7s-hourglass',
                    'settings' => array( 'type' => 'pe-icon-7-stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'pe_icon_7_stroke' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),

                # Stroke Gap
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_stroke',
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'dt-stroke-icon icon icon-tie',
                    'settings' => array( 'type' => 'stroke', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'stroke' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),

                # Typicons
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'designthemes-core' ),
                    'param_name' => 'btn_icon_type_typicons',
                    'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                    'value' => 'typcn typcn-adjust-brightness',
                    'settings' => array( 'type' => 'typicons', 'emptyIcon' => false, 'iconsPerPage' => 200 ),
                    'dependency' => array( 'element' => 'btn_icon_type', 'value' => 'typicons' ),
                    'description' => __( 'Select icon from library.', 'designthemes-core' ),               
                ),
            # Icon

            # Default State
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => __('Submit Button','designthemes-core'),
                    'param_name' => 'hr_for_btn_default_state',
                ),

                    array(
                        'type' => 'dt_sc_vc_title',
                        'group' => __('Submit Button','designthemes-core'),
                        'heading'    => esc_html__( 'Default State', 'designthemes-core' ),
                        'param_name' => 'title_for_btn_default_state',
                    ),            

                    # Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Color', 'designthemes-core' ),
                        'param_name' => 'btn-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'custom',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',                
                    ),

                    # BG Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                        'param_name' => 'btn-bg-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn_shape', 'value' => array( 'filled' ) ), 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'btn-border-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'primary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'btn_shape', 'value' => array( 'filled', 'bordered' ) ),                 
                    ),

                    # Custom Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                        'param_name' => 'btn-custom-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#ffffff',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom BG Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                        'param_name' => 'btn-custom-bg-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-bg-color', 'value' => array( 'custom' ) ),                 
                    ),

                    # Custom Border Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                        'param_name' => 'btn-custom-border-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#da0000',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-border-color', 'value' => array( 'custom' ) ),                 
                    ),
            # Default State
            
            # Hover State
                array(
                    'type' => 'dt_sc_vc_hr',
                    'group' => __('Submit Button','designthemes-core'),
                    'param_name' => 'hr_for_hover_state',
                ),

                    array(
                        'type' => 'dt_sc_vc_title',
                        'group' => __('Submit Button','designthemes-core'),
                        'heading'    => esc_html__( 'Hover State', 'designthemes-core' ),
                        'param_name' => 'title_for_hover_state',
                    ),

                    # Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'custom',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                    ),

                    # BG Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'BG Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-bg-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'secondary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'btn_shape', 'value' => array( 'filled' ) ), 
                    ),

                    # Border Color
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-border-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'value' => array(
                            esc_html__('Theme Primary','designthemes-core') => 'primary-color',
                            esc_html__('Theme Secondary','designthemes-core') => 'secondary-color',
                            esc_html__('Theme Tertiary','designthemes-core') => 'tertiary-color',
                            esc_html__('Custom Color','designthemes-core') => 'custom',
                        ),
                        'std' => 'secondary-color',
                        'save_always' => true,
                        'edit_field_class' => 'vc_column vc_col-sm-4', 
                        'dependency' => array( 'element' => 'btn_shape', 'value' => array( 'filled', 'bordered' ) ),                 
                    ),

                    # Custom Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-custom-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#ffffff',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-hover-color', 'value' => array('custom') ),                 
                    ),

                    # Custom BG Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-custom-bg-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#ffffff',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-hover-bg-color', 'value' => array('custom') ),                 
                    ),

                    # Custom Border Color                        
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
                        'param_name' => 'btn-hover-custom-border-color',
                        'group' => esc_html__( 'Submit Button', 'designthemes-core' ),
                        'save_always' => true,
                        'value' => '#ffffff',                
                        'edit_field_class' => 'vc_column vc_col-sm-4',
                        'dependency' => array( 'element' => 'btn-hover-border-color', 'value' => array('custom') ),                 
                    ),
            # Hover State
        # Submit Button

        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'designthemes-core' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),

        array(
            'type' => 'dt_sc_vc_hr_invisible',
            'param_name' => 'dt_sc_vc_hr_invisible_design_option',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),

        # Wrapper Alignment
        array(
            'param_name' => 'align',
            'heading'    => esc_html__( 'Alignment', 'designthemes-core' ),
            'type'       => 'dropdown',
            'value'      => array(
                esc_html__( 'Center', 'designthemes-core' )  => 'center',
                esc_html__( 'Justify', 'designthemes-core' )   => 'justify',
                esc_html__( 'Left', 'designthemes-core' )    => 'left',
                esc_html__( 'None', 'designthemes-core' )  => 'none',
                esc_html__( 'Right', 'designthemes-core' )   => 'right',
            ),
            'std' => 'none',
            'save_always' => true,
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'group' => esc_html__( 'Design options', 'designthemes-core' ),
        ),
    )
) );