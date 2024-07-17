<?php
vc_map( array(
	"name" => esc_html__( "Recent Posts Widget", 'designthemes-core' ),
	"base" => "dt_sc_recent_posts_widget",
	"icon" => "dt_sc_recent_posts_widget",
	'category' => __( 'WordPress Widgets', 'designthemes-core' ),
    'params'    => array(

        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

        # Title
    	array(
    		'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'save_always' => true,
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
		),

        # Category
        array(
            'type'  => 'autocomplete',
            'save_always' => true,
            'heading' => __( 'Categories', 'js_composer'),
            'param_name' => '_post_categories',
            'settings' => array( 'multiple' => true )
        ),

        # Post Count
    	array(
    		'type' => 'dt_sc_input_number',
			'heading' => __( 'Post Count', 'js_composer' ),
			'param_name' => '_post_count',
			'min'	=> '1',
			'max'	=> '30',
			'step'	=> '1',
			'std'	=> '3',
			'save_always' => true,
			'edit_field_class' => 'vc_column vc_col-sm-4',
			'description' => __( 'How many entries do you want to show', 'js_composer' ),
		),

        # Show Feature Image
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show Feature Image ?', 'designthemes-core' ),
            'param_name' => '_enabled_image',
            'value' => array( 
                esc_html__('Yes','designthemes-core') => '1',
                esc_html__('No','designthemes-core') => '0',
            ),
            'std' => '1',
            'edit_field_class' => 'vc_column padding-top-16px vc_col-sm-4',
            'save_always' => true,              
        ),        

  		# Excerpt
  		array(
  			'type' => 'dropdown',
  			'heading' => esc_html__( 'Show ?', 'designthemes-core' ),
  			'param_name' => '_excerpt',
  			'value' => array( 
  				esc_html__('Show Title Only','designthemes-core') => 'show title only',
				esc_html__('Show Title And Excerpt','designthemes-core') => 'show title and excerpt',
  			),
  			'std' => 'show title and excerpt',
  			'edit_field_class' => 'vc_column padding-top-16px vc_col-sm-4',
  			'save_always' => true,  			
  		),  		
    )
) );