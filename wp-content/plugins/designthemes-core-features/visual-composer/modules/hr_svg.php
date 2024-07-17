<?php add_action( 'vc_before_init', 'dt_sc_hr_svg_vc_map' );
function dt_sc_hr_svg_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Stamp Divider", 'designthemes-core' ),
		"base" => "dt_sc_hr_svg",
		"icon" => "dt_sc_hr_svg",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'designthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Divider Down','designthemes-core') => 'stamp-divider-down', esc_html__('Divider Up','designthemes-core') => 'stamp-divider-up' ),
				'std' => 'stamp-divider-down'
			),

			# Fill Color
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Fill color", 'designthemes-core' ),
      			"param_name" => "fillcolor",
      			"description" => esc_html__( "Select fill color", 'designthemes-core' ),
      			"value" => '#ffffff'
      		),

			# Stroke Color
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Stroke color", 'designthemes-core' ),
      			"param_name" => "strokecolor",
      			"description" => esc_html__( "Select stroke color", 'designthemes-core' ),
      			"value" => '#ffffff'
      		)			
		)
	) );	
}?>