<?php add_action( 'vc_before_init', 'dt_sc_progress_bar_vc_map' );
function dt_sc_progress_bar_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Progress Bar", 'designthemes-core' ),
		"base" => "dt_sc_progress_bar",
		"icon" => "dt_sc_progress_bar",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'designthemes-core'),
				'param_name' => 'type',
				'admin_label' => true,
				'value' => array(
					esc_html__('Standard','designthemes-core') => 'standard',
					esc_html__('Striped','designthemes-core') => 'progress-striped',
					esc_html__('Active Striped','designthemes-core') => 'progress-striped-active'					
				),
				'std' => 'progress-striped'
			),

			// Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'designthemes-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style 1','designthemes-core') => '',
					esc_html__('Style 2','designthemes-core') => 'style2',
				),
			),

			// Custom Icon
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Icon', 'designthemes-core' ),
				'param_name' => 'iconurl',
				'description' => esc_html__( 'Select icon from media library', 'designthemes-core' ),
				'dependency' => array( 'element' => 'style', 'value_not_equal_to' => 'style2' )
			),

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'designthemes-core' ),
      			"param_name" => "text",
      			"description" => esc_html__( "Enter text used as title of bar", 'designthemes-core' ),
      		),

			// Value			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Value", 'designthemes-core' ),
      			"param_name" => "value",
      			"description" => esc_html__( "Enter value of bar e.g. 70% enter 70 only", 'designthemes-core' ),
      		),

			// Colorpicker			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Color", 'designthemes-core' ),
      			"param_name" => "color",
      			"description" => esc_html__( "Select bar background color", 'designthemes-core' ),
      		),      				
		)
	) );
}?>