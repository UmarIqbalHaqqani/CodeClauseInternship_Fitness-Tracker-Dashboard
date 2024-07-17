<?php
add_action( 'vc_before_init', 'dt_sc_google_map_vc_map' );
function dt_sc_google_map_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Google Map", 'designthemes-core' ),
		"base" => "dt_sc_google_map",
		"category" => DT_VC_CATEGORY,
		"class" => "dt_vc_style",
		"icon" => "dt_sc_google_map",
		'as_parent' => array( 'only' => 'dt_sc_google_map_marker' ),
		"content_element" => true,
		"params" => array(

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Type', 'designthemes-core' ),
      			'param_name' => 'map_type',
      			'value' => array(
      				esc_html__('Roadmap','designthemes-core') => 'roadmap',
      				esc_html__('Satellite','designthemes-core') => 'satellite',
      				esc_html__('Terrain','designthemes-core') => 'terrain',
      				esc_html__('Hybrid','designthemes-core') => 'hybrid'
      			),
				'save_always' => true,
      			'description' => esc_html__( 'The popup window which appears when a marker is clicked.', 'designthemes-core' ),				
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Style', 'designthemes-core' ),
      			'param_name' => 'map_style',
      			'value' => array(
      				esc_html__('Default','designthemes-core') => '',
      				esc_html__('Custom','designthemes-core') => 'custom',
					esc_html__('Style 1','designthemes-core') => '1',
					esc_html__('Style 2','designthemes-core') => '2',
					esc_html__('Style 3','designthemes-core') => '3',
					esc_html__('Style 4','designthemes-core') => '4',
					esc_html__('Style 5','designthemes-core') => '5',
					esc_html__('Style 6','designthemes-core') => '6',
					esc_html__('Style 7','designthemes-core') => '7',
					esc_html__('Style 8','designthemes-core') => '8',
					esc_html__('Style 9','designthemes-core') => '9',
					esc_html__('Style 10','designthemes-core') => '10',
					esc_html__('Style 11','designthemes-core') => '11',
					esc_html__('Style 12','designthemes-core') => '12',
					esc_html__('Style 13','designthemes-core') => '13',
					esc_html__('Style 14','designthemes-core') => '14',
					esc_html__('Style 15','designthemes-core') => '15',
					esc_html__('Style 16','designthemes-core') => '16',
					esc_html__('Style 17','designthemes-core') => '17',
					esc_html__('Style 18','designthemes-core') => '18',
					esc_html__('Style 19','designthemes-core') => '19',
					esc_html__('Style 20','designthemes-core') => '20',
					esc_html__('Style 21','designthemes-core') => '21',
					esc_html__('Style 22','designthemes-core') => '22',
					esc_html__('Style 23','designthemes-core') => '23',
					esc_html__('Style 24','designthemes-core') => '24',
					esc_html__('Style 25','designthemes-core') => '25',
					esc_html__('Style 26','designthemes-core') => '26',
					esc_html__('Style 27','designthemes-core') => '27',
					esc_html__('Style 28','designthemes-core') => '28',
					esc_html__('Style 29','designthemes-core') => '29',
					esc_html__('Style 30','designthemes-core') => '30',
					esc_html__('Style 31','designthemes-core') => '31',
					esc_html__('Style 32','designthemes-core') => '32',
					esc_html__('Style 33','designthemes-core') => '33',
					esc_html__('Style 34','designthemes-core') => '34',
					esc_html__('Style 35','designthemes-core') => '35',
					esc_html__('Style 36','designthemes-core') => '36',
					esc_html__('Style 37','designthemes-core') => '37',
					esc_html__('Style 38','designthemes-core') => '38',
					esc_html__('Style 39','designthemes-core') => '39',
					esc_html__('Style 40','designthemes-core') => '40',
					esc_html__('Style 41','designthemes-core') => '41',
					esc_html__('Style 42','designthemes-core') => '42',
					esc_html__('Style 43','designthemes-core') => '43',
					esc_html__('Style 44','designthemes-core') => '44',
					esc_html__('Style 45','designthemes-core') => '45',
					esc_html__('Style 46','designthemes-core') => '46',
					esc_html__('Style 47','designthemes-core') => '47',
					esc_html__('Style 48','designthemes-core') => '48',
					esc_html__('Style 49','designthemes-core') => '49',
					esc_html__('Style 50','designthemes-core') => '50',      				
      			),
      			'description' => esc_html__( 'Choose map custom style.', 'designthemes-core' ),				
			),

			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Custom Style", 'designthemes-core' ),
      			"param_name" => "custom_map_style",
      			"description" => esc_html__( "Select custom color for map", 'designthemes-core' ),
				'dependency' => array( 'element' => 'map_style', 'value' =>'custom' )				
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Width', 'designthemes-core' ),
				'param_name' => 'map_width',
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'value' => '100%',
      			'description' => esc_html__( 'In px or % , 100% for a responsive map.', 'designthemes-core' ),
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Map Height', 'designthemes-core' ),
				'param_name' => 'map_height',
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
				'value' => '500px',
      			'description' => esc_html__( 'In px or % ,eg: 500px or 30%.', 'designthemes-core' ),
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Zoom Level', 'designthemes-core' ),
      			'param_name' => 'map_zoom_level',
      			'value' => array( 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),
				'save_always' => true,
				'std' => 12
			),			

			// Controls
			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Street View Control', 'designthemes-core' ),
      			'param_name' => 'map_street_view_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Map Type Control', 'designthemes-core' ),
      			'param_name' => 'map_type_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Zoom Control', 'designthemes-core' ),
      			'param_name' => 'map_zoom_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Scale Control', 'designthemes-core' ),
      			'param_name' => 'map_scale_control',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Scroll wheel', 'designthemes-core' ),
      			'param_name' => 'map_scroll_wheel',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),

			array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( ' Draggable?', 'designthemes-core' ),
      			'param_name' => 'map_draggable',
				'edit_field_class' => 'vc_col-sm-6',
      			'value' => array(
      				esc_html__('Enable','designthemes-core') => 'enable',
      				esc_html__('Disable','designthemes-core') => 'disable'
      			),
				'save_always' => true,
			),															
			// Controls
			
			// Markers
			array(
				'type' => 'param_group',
				'param_name' => 'map_markers',
				'group' => esc_html__( 'Markers', 'designthemes-core' ),
				'params' => array(

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Latitude', 'designthemes-core' ),
						'param_name' => 'marker_latitude',
						'save_always' => true
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Longitude', 'designthemes-core' ),
						'param_name' => 'marker_longitude',
						'save_always' => true
					),

					array(
						'type' => 'textarea_raw_html',
						'heading' => esc_html__('Content', 'designthemes-core'),
						'param_name' => 'marker_content',
					),

					array(
		      			'type' => 'dropdown',
		      			'heading' => esc_html__( 'Icon', 'designthemes-core' ),
		      			'param_name' => 'marker_icon',
						'save_always' => true,
		      			'value' => array( 
		      				esc_html__('Built in','designthemes-core') => 'pin.png',
		      				esc_html__('Custom','designthemes-core') => 'custom',
		      				esc_html__('Black','designthemes-core') => 'black.png',
		      				esc_html__('Blue','designthemes-core') => 'blue.png',
		      				esc_html__('Gray','designthemes-core') => 'gray.png',
		      				esc_html__('Green','designthemes-core') => 'green.png',
		      				esc_html__('Magenta','designthemes-core') => 'magenta.png',
		      				esc_html__('Orange','designthemes-core') => 'orange.png',
		      				esc_html__('Purple','designthemes-core') => 'purple.png',
		      				esc_html__('Red','designthemes-core') => 'red.png',
		      				esc_html__('White','designthemes-core') => 'white.png',
		      				esc_html__('Yellow','designthemes-core') => 'yellow.png',
		      			),
		      			'description' => esc_html__( 'Select marker icon', 'designthemes-core' ),
		      			'std' => 'green.png',
					),

					array(
						"type" => "attach_image",
		      			"heading" => esc_html__( "Custom Marker icon", 'designthemes-core' ),
		      			"param_name" => "custom_marker_icon",
		      			"group" => esc_html__( 'Marker', 'designthemes-core' ),
		      			"description" => esc_html__( "Select custom marker icon", 'designthemes-core' ),
						'dependency' => array( 'element' => 'marker_icon', 'value' =>'custom' )				
					),

					array(
		      			'type' => 'dropdown',
		      			'heading' => esc_html__( 'Popup Window', 'designthemes-core' ),
		      			'group' => esc_html__( 'Marker', 'designthemes-core' ),
		      			'param_name' => 'popup',
		      			'value' => array(
		      				esc_html__('Hidden','designthemes-core') => 'hidden',
		      				esc_html__('Visible','designthemes-core') => 'visible'
		      			),
						'save_always' => true,
		      			'description' => esc_html__( 'The popup window which appears when a marker is clicked.', 'designthemes-core' ),
					),
				)
			)
			// markers
		)
	) );
}
