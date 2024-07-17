<?php
vc_map( array(
	"name" => esc_html__( "Flickr Widget", 'designthemes-core' ),
	"base" => "dt_sc_flickr_widget",
	"icon" => "dt_sc_flickr_widget",
	'category' => __( 'WordPress Widgets', 'designthemes-core' ),
    'params'    => array(

        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

    	array(
    		'type' => 'textfield',
			'heading' => __( 'Widget title', 'js_composer' ),
			'save_always' => true,
			'param_name' => 'title',
			'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
		),

    	array(
    		'type' => 'textfield',
			'heading' => __( 'Flickr ID', 'js_composer' ),
			'save_always' => true,
			'param_name' => 'flickr_id',
		),		

    	array(
    		'type' => 'dt_sc_input_number',
			'heading' => __( 'Image Count', 'js_composer' ),
			'param_name' => 'count',
			'min'	=> '1',
			'max'	=> '30',
			'step'	=> '1',
			'std'	=> '3',
			'save_always' => true,
			'edit_field_class' => 'vc_column vc_col-sm-4',
			'description' => __( 'How many entries do you want to show', 'js_composer' ),
		),

  		# Show
  		array(
  			'type' => 'dropdown',
  			'heading' => esc_html__( 'Show ?', 'designthemes-core' ),
  			'param_name' => 'show',
  			'value' => array( 
  				esc_html__('Latest','designthemes-core') => 'latest',
				esc_html__('Random','designthemes-core') => 'random',
  			),
  			'std' => 'random',
  			'edit_field_class' => 'vc_column padding-top-16px vc_col-sm-4',
  			'save_always' => true,  			
  		),

  		# Size
  		array(
  			'type' => 'dropdown',
  			'heading' => esc_html__( 'Style ?', 'designthemes-core' ),
  			'param_name' => 'size',
  			'value' => array( 
  				esc_html__('Square','designthemes-core') => 's',
				esc_html__('Thumbnail','designthemes-core') => 't',
				esc_html__('Medium','designthemes-core') => 'm',
  			),
  			'std' => 't',
  			'edit_field_class' => 'vc_column padding-top-16px vc_col-sm-4',
  			'save_always' => true,  			
  		),
    )
) );    	