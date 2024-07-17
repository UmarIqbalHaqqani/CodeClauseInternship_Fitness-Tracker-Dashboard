<?php add_action( 'vc_before_init', 'dt_sc_number_counter_vc_map' );
function dt_sc_number_counter_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__("Counting Number", 'designthemes-core'),
		"base" => "dt_sc_number_counter",
		"icon" => "dt_sc_number_counter",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of counting number",'designthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'designthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Type1','designthemes-core') => 'type1',
					esc_html__('Type2','designthemes-core') => 'type2',
					esc_html__('Type3','designthemes-core') => 'type3',
					esc_html__('Type4','designthemes-core') => 'type4',
					esc_html__('Type5','designthemes-core') => 'type5',
					esc_html__('Type6','designthemes-core') => 'type6' ),
				'std' => 'type1'
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

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'designthemes-core'),
				'param_name' => 'iconurl',
				'dependency' => array('element' => 'icon_type','value' => 'icon_url')
			),

      		# Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Icon Color', 'designthemes-core' ),
      			'param_name' => 'iconcolor',
      			'value' => $variations,
				'dependency' => array('element' => 'icon_type','value' => 'icon_class'),
      			'description' => esc_html__('It can apply for "type5" only.','designthemes-core')
      		),

      		# Value
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Number Value", 'designthemes-core' ),
      			"param_name" => "value",
      		),

      		# Append Text
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Append Text", 'designthemes-core' ),
      			"param_name" => "append",
      		),

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'designthemes-core' ),
      			"param_name" => "title",
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
}?>