<?php
vc_map( array(
	"name" => esc_html__( "Sociable", 'designthemes-core' ),
	"base" => "dt_sc_sociable_new",
	"icon" => "dt_sc_sociable_new",
	"category" => THEME_NAME,
    'params'    => array(
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

        # Social List
        array(
        	'heading' => esc_html__( 'Socials', 'designthemes-core' ),
  			'param_name' => 'social_list',
  			'type'	=> 'param_group',
  			'save_always' => true,  			
  			'params' => array(
  				array(
  					'type' => 'dropdown',
  					'heading' => esc_html__( 'Social', 'designthemes-core' ),
  					'param_name' => 'social',
  					'value' => array(
						esc_html__('Delicious', 'designthemes-core')	 => 'delicious',
						esc_html__('Deviantart', 'designthemes-core')	 => 'deviantart',
						esc_html__('Digg', 'designthemes-core')	 		 => 'digg',
						esc_html__('Dribbble', 'designthemes-core')	 	 => 'dribbble',
						esc_html__('Envelope', 'designthemes-core')	 	 => 'envelope',
						esc_html__('Facebook', 'designthemes-core')	 	 => 'facebook',
						esc_html__('Flickr', 'designthemes-core')	 	 => 'flickr',
						esc_html__('Google Plus', 'designthemes-core') 	 => 'google-plus',
						esc_html__('Instagram', 'designthemes-core')	 => 'instagram',
						esc_html__('Lastfm', 'designthemes-core')	 	 => 'lastfm',
						esc_html__('Linkedin', 'designthemes-core')	 	 => 'linkedin',
						esc_html__('Pinterest', 'designthemes-core')	 => 'pinterest',
						esc_html__('Reddit', 'designthemes-core')	 	 => 'reddit',
						esc_html__('RSS', 'designthemes-core')	 		 => 'rss',
						esc_html__('Skype', 'designthemes-core')	 	 => 'skype',
						esc_html__('Stumbleupon', 'designthemes-core')	 => 'stumbleupon',
						esc_html__('Tumblr', 'designthemes-core')	 	 => 'tumblr',
						esc_html__('Twitter', 'designthemes-core')	 	 => 'twitter',
						esc_html__('Viadeo', 'designthemes-core')	 	 => 'viadeo',
						esc_html__('Vimeo', 'designthemes-core')	 	 => 'vimeo',
						esc_html__('Yahoo', 'designthemes-core')	 	 => 'yahoo',
						esc_html__('Youtube', 'designthemes-core')	 	 => 'youtube',
  					),
  					'edit_field_class' => 'vc_column vc_col-sm-6',
  					'save_always' => true,  			
  					'admin_label' => true,
  					'std' => 'facebook'
  				),
  				array(
  					'type' => 'vc_link',
  					'heading' => esc_html__( 'Link', 'designthemes-core' ),
  					'param_name' => 'link',
  					'edit_field_class' => 'vc_column vc_col-sm-6',
  					'save_always' => true,
  				),
  			),
        ),

  		# Size
  		array(
  			'type' => 'dropdown',
  			'heading' => esc_html__( 'Size', 'designthemes-core' ),
  			'param_name' => 'size',
  			'value' => array( 
  				esc_html__('Small','designthemes-core') => 'small',
				esc_html__('Medium','designthemes-core') => 'medium',
				esc_html__('Large','designthemes-core') => 'large',
				esc_html__('Extra Large','designthemes-core') => 'extra-large',
  			),
  			'description' => esc_html__( 'Select size of sociable.', 'designthemes-core' ),
  			'std' => 'small',
  			'edit_field_class' => 'vc_column padding-top-16px vc_col-sm-6',
  			'save_always' => true,  			
  			'admin_label' => true
  		),

  		# Align
  		array(
  			'type' => 'dropdown',
  			'heading' => esc_html__('Alignment', 'designthemes-core' ),
  			'param_name' => 'align',
  			'value' => array(
  				esc_html__('Left', 'designthemes-core' ) => 'left',
				esc_html__('Right', 'designthemes-core' ) => 'right',
				esc_html__('Center', 'designthemes-core' ) => 'center',
			),
  			'std' => 'center',
  			'edit_field_class' => 'vc_column vc_col-sm-6',
  			'save_always' => true,
		),

		# Class
  		array(
  			"type" => "textfield",
  			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
  			"param_name" => "class",
  			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core')
  		),

  		# Default State Tab
      		
      		# Style
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Style', 'designthemes-core' ),
      			'param_name' => 'default-style',
      			'group'	=> esc_html__( 'Default State', 'designthemes-core' ),
      			'value' => array(
      				esc_html__('Bordered','designthemes-core') => 'bordered',
      				esc_html__('Filled','designthemes-core') => 'filled',
      				esc_html__('None','designthemes-core') => 'none',
      			),
      			'description' => esc_html__( 'Select style of sociable in default state.', 'designthemes-core' ),
      			'std' => 'filled',
      			'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
      			'save_always' => true,
      		),

      		# Shape  		
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Shape', 'designthemes-core' ),
      			'param_name' => 'default-shape',
      			'group'	=> esc_html__( 'Default State', 'designthemes-core' ),
      			'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Circle','designthemes-core') => 'circle',
                    esc_html__('Hexagon','designthemes-core') => 'hexagon',
                    esc_html__('Hexagon Alt','designthemes-core') => 'hexagon-alt',
                    esc_html__('Diamond Square','designthemes-core') => 'diamond-square',
                    esc_html__('Diamond Narrow','designthemes-core') => 'diamond-narrow',
                    esc_html__('Diamond Wide','designthemes-core') => 'diamond-wide',
     			),
      			'description' => esc_html__( 'Select shape of sociable in default state.', 'designthemes-core' ),
      			'std' => 'square',
      			'save_always' => true,
      			'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
      			'dependency'  => array( 'element' => 'default-style', 'value' => array('bordered', 'filled') )
      		),

      		# Apply Rounded Corner?
            array(
            	'type' => 'checkbox',
                'heading' => __( 'Apply Rounded Corner?', 'designthemes-core' ),
                'param_name' => 'default-border-radius', 
                'save_always' => true,
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
                'dependency'  => array( 'element' => 'default-shape', 'value' => array('square', 'diamond-square') )
            ),

            array(
            	'type' => 'dt_sc_vc_hr',
                'param_name' => 'hr_for_color_section_end',
                'group' => esc_html__( 'Default State', 'designthemes-core' ),
            ),

            # Icon Color
            array(
            	'type' => 'dropdown',
            	'heading' => esc_html__( 'Color', 'designthemes-core' ),
            	'param_name' => 'default-icon-color',
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
            	'param_name' => 'default-bg-color',
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
                'dependency' => array( 'element' => 'default-style', 'value' => array( 'filled' ) ),
            ),

            # Border Color
            array(
            	'type' => 'dropdown',
            	'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
            	'param_name' => 'default-border-color',
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
                'dependency' => array( 'element' => 'default-style', 'value' => array( 'filled', 'bordered' ) ), 
            ),

            # Custom Icon Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom Icon Color', 'designthemes-core' ),
            	'param_name' => 'default-icon-custom-color',
            	'group' => esc_html__( 'Default State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'default-icon-color', 'value' => array( 'custom' ) ),                 
            ),

            # Custom BG Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
            	'param_name' => 'default-bg-custom-color',
            	'group' => esc_html__( 'Default State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'default-bg-color', 'value' => array( 'custom' ) ),                 
            ),

            # Custom Border Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
            	'param_name' => 'default-border-custom-color',
            	'group' => esc_html__( 'Default State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'default-border-color', 'value' => array( 'custom' ) ),                 
            ),                                                                                            		
  		# Default State Tab

  		# Hover State Tab
      		# Style
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Style', 'designthemes-core' ),
      			'param_name' => 'hover-style',
      			'group'	=> esc_html__( 'Hover State', 'designthemes-core' ),
      			'value' => array(
      				esc_html__('Bordered','designthemes-core') => 'bordered',
      				esc_html__('Filled','designthemes-core') => 'filled',
      				esc_html__('None','designthemes-core') => 'none',
      			),
      			'description' => esc_html__( 'Select style of sociable in hover state.', 'designthemes-core' ),
      			'std' => 'filled',
      			'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
      			'save_always' => true,
      		),

      		# Shape  		
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Shape', 'designthemes-core' ),
      			'param_name' => 'hover-shape',
      			'group'	=> esc_html__( 'Hover State', 'designthemes-core' ),
      			'value' => array(
                    esc_html__('Square','designthemes-core') => 'square',
                    esc_html__('Circle','designthemes-core') => 'circle',
                    esc_html__('Hexagon','designthemes-core') => 'hexagon',
                    esc_html__('Hexagon Alt','designthemes-core') => 'hexagon-alt',
                    esc_html__('Diamond Square','designthemes-core') => 'diamond-square',
                    esc_html__('Diamond Narrow','designthemes-core') => 'diamond-narrow',
                    esc_html__('Diamond Wide','designthemes-core') => 'diamond-wide',
     			),
      			'description' => esc_html__( 'Select shape of sociable in hover state.', 'designthemes-core' ),
      			'std' => 'square',
      			'save_always' => true,
      			'edit_field_class' => 'vc_column padding-top-0px vc_col-sm-6',
      			'dependency'  => array( 'element' => 'hover-style', 'value' => array('bordered', 'filled') )
      		),

      		# Apply Rounded Corner?
            array(
            	'type' => 'checkbox',
                'heading' => __( 'Apply Rounded Corner?', 'designthemes-core' ),
                'param_name' => 'hover-border-radius', 
                'save_always' => true,
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
                'dependency'  => array( 'element' => 'hover-shape', 'value' => array('square', 'diamond-square') )
            ),

            array(
            	'type' => 'dt_sc_vc_hr',
                'param_name' => 'hr_for_hover_color_section_end',
                'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            ),

            # Icon Color
            array(
            	'type' => 'dropdown',
            	'heading' => esc_html__( 'Color', 'designthemes-core' ),
            	'param_name' => 'hover-icon-color',
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
            	'param_name' => 'hover-bg-color',
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
                'dependency' => array( 'element' => 'hover-style', 'value' => array( 'filled' ) ),
            ),

            # Border Color
            array(
            	'type' => 'dropdown',
            	'heading' => esc_html__( 'Border Color', 'designthemes-core' ),
            	'param_name' => 'hover-border-color',
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
                'dependency' => array( 'element' => 'hover-style', 'value' => array( 'filled', 'bordered' ) ), 
            ),

            # Custom Icon Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom Icon Color', 'designthemes-core' ),
            	'param_name' => 'hover-icon-custom-color',
            	'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'hover-icon-color', 'value' => array( 'custom' ) ),                 
            ),

            # Custom BG Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom BG Color', 'designthemes-core' ),
            	'param_name' => 'hover-bg-custom-color',
            	'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'hover-bg-color', 'value' => array( 'custom' ) ),                 
            ),

            # Custom Border Color                        
            array(
            	'type' => 'colorpicker',
            	'heading' => esc_html__( 'Custom Border Color', 'designthemes-core' ),
            	'param_name' => 'hover-border-custom-color',
            	'group' => esc_html__( 'Hover State', 'designthemes-core' ),
            	'save_always' => true,
            	'value' => '#da0000',                
            	'edit_field_class' => 'vc_column vc_col-sm-4',
            	'dependency' => array( 'element' => 'hover-border-color', 'value' => array( 'custom' ) ),                 
            ),
  		# Hover State Tab
  		
        # Settings
        	array(
            	'type' => 'dt_sc_vc_title',
            	'group' => __('Settings','designthemes-core'),
            	'heading'    => esc_html__( 'Hide On', 'designthemes-core' ),
            	'param_name' => 'title_for_sociable_settings',
            	'save_always' => true,
        	),

        	array(
	            'type' => 'checkbox',
    	        'edit_field_class' => 'vc_column vc_col-sm-6',
            	'param_name' => 'hide_on_lg',
            	'value' => array( __( 'Large Devices', 'designthemes-core' ) => 'yes' ),
            	'group' => __('Settings','designthemes-core'),
            	'save_always' => true,
        	),

        	array(
	            'type' => 'checkbox',
    	        'edit_field_class' => 'vc_column vc_col-sm-6',
            	'param_name' => 'hide_on_md',
            	'value' => array( __( 'Medium Devices', 'designthemes-core' ) => 'yes' ),
            	'group' => __('Settings','designthemes-core'),
            	'save_always' => true,
        	),

        	array(
	            'type' => 'checkbox',
    	        'param_name' => 'hide_on_sm',
        	    'edit_field_class' => 'vc_column vc_col-sm-6 no-heading',
            	'value' => array( __( 'Small Devices', 'designthemes-core' ) => 'yes' ),
            	'group' => __('Settings','designthemes-core'),
            	'save_always' => true,
        	),

        	array(
            	'type' => 'checkbox',
            	'edit_field_class' => 'vc_column vc_col-sm-6 no-heading',
            	'param_name' => 'hide_on_xs',
            	'value' => array( __( 'Very Small Devices', 'designthemes-core' ) => 'yes' ),
            	'group' => __('Settings','designthemes-core'),
            	'save_always' => true,
        	)        
        # Settings
    )
) );