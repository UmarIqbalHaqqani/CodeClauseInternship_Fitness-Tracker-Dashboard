<?php add_action( 'vc_before_init', 'dt_sc_image_caption_vc_map' );
function dt_sc_image_caption_vc_map() {

	vc_map( array(
		"name" => esc_html__("Image Caption", 'designthemes-core'),
		"base" => "dt_sc_image_caption",
		"icon" => "dt_sc_image_caption",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of image caption",'designthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'designthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Type 1','designthemes-core') => '',
					esc_html__('Type 2','designthemes-core') => 'type2',
					esc_html__('Type 3','designthemes-core') => 'type3',
					esc_html__('Type 4','designthemes-core') => 'type4',
					esc_html__('Type 5','designthemes-core') => 'type5',
					esc_html__('Type 6','designthemes-core') => 'type6',
					esc_html__('Type 7','designthemes-core') => 'type7',
					esc_html__('Type 8','designthemes-core') => 'type8',
					esc_html__('Type 9','designthemes-core') => 'type9',
				),
			),			

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'designthemes-core' ),
      			"param_name" => "title",
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'designthemes-core' ),
      			"param_name" => "subtitle",
      		), 

			# Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Link', 'designthemes-core' ),
				'param_name' => 'link',
				'description' => __( 'Enter the link of title.', 'designthemes-core' ),
			),

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'designthemes-core'),
				'param_name' => 'image',
			),

			# Overlay Color
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Overlay BG color", 'designthemes-core' ),
      			"param_name" => "overlaycolor",
      			"description" => esc_html__( "Select overlay bg color", 'designthemes-core' ),
				'value' => 'rgba(0, 0, 0, 0.8)',
				'dependency' => array('element' => 'type','value' => 'type9')				
      		),

			# Image Position
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image Position', 'designthemes-core'),
				'param_name' => 'imgpos',
				'value' => array( esc_html__('Default','designthemes-core') => '', esc_html__('Below Content','designthemes-core') => 'bottom' )
			),

			# Icon Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon Type', 'designthemes-core'),
				'param_name' => 'icon_type',
				'value' => array( esc_html__('Icon class','designthemes-core') => 'icon_class', esc_html__('Image','designthemes-core') => 'icon_url' )
			),

			# Icon Class
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'designthemes-core'),
				'param_name' => 'icon',
				'dependency' => array('element' => 'icon_type','value' => 'icon_class')
			),

			# Icon url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'designthemes-core'),
				'param_name' => 'iconurl',
				'dependency' => array('element' => 'icon_type','value' => 'icon_url')
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','designthemes-core'),
				'param_name' => 'content',
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
			),			

			# Extra Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)
		)
	) );
} ?>