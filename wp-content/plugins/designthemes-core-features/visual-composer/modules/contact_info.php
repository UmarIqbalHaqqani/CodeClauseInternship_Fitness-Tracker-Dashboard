<?php add_action( 'vc_before_init', 'dt_sc_contact_info_vc_map' );
function dt_sc_contact_info_vc_map() {
	vc_map( array(
		"name" => esc_html__("Contact Info", 'designthemes-core'),
		"base" => "dt_sc_contact_info",
		"icon" => "dt_sc_contact_info",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of contact info",'designthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'designthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Type1','designthemes-core') => '',
					esc_html__('Type2','designthemes-core') => 'type2',
					esc_html__('Type3','designthemes-core') => 'type3',
					esc_html__('Type4','designthemes-core') => 'type4',
					esc_html__('Type5','designthemes-core') => 'type5',
					esc_html__('Type6','designthemes-core') => 'type6',
					esc_html__('Type7','designthemes-core') => 'type7',
					esc_html__('Type8','designthemes-core') => 'type8'),
				'std' => ''
			),

			# Icon Class
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'designthemes-core'),
				'param_name' => 'icon'
			),

			# Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'designthemes-core'),
				'param_name' => 'title'
			),

			# link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link', 'designthemes-core'),
				'param_name' => 'link',
				'dependency' => array(
					'element' => 'type',
					'value' => 'type5'
				)
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','designthemes-core'),
				'param_name' => 'content',
				'value' => '<p> <strong>Toll Free:</strong> 1224 2234 LAW <br> <strong>Fax:</strong> 1224 2235 225 </p>'
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)
		)
	) );	
}?>