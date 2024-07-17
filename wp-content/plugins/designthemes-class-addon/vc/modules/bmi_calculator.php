<?php
add_action( 'vc_before_init', 'dt_sc_bmi_calculator_vc_map' );
function dt_sc_bmi_calculator_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	add_filter( 'vc_autocomplete_dt_sc_bmi_calculator_under_weight_callback', 'vc_include_field_search', 10, 1 );
	add_filter( 'vc_autocomplete_dt_sc_bmi_calculator_over_weight_callback', 'vc_include_field_search', 10, 1 );

	add_filter( 'vc_autocomplete_dt_sc_bmi_calculator_under_weight_render', 'vc_include_field_render', 10, 1 );
	add_filter( 'vc_autocomplete_dt_sc_bmi_calculator_over_weight_render', 'vc_include_field_render', 10, 1 );

	vc_map( array(
		"name" => esc_html__("BMI Calculator", "designthemes-class"),
		"base" => "dt_sc_bmi_calculator",
		"icon" => "dt_sc_bmi_calculator",
		"category" => $plural_name,
		"params" => array(

			# Title
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Title", "designthemes-class" ),
				"param_name" => "title",
				"value" => '',
				"description" => esc_html__( 'Enter title of bmi calculator.', 'designthemes-class' ),
			),

			# Sub Title
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Sub Title", "designthemes-class" ),
				"param_name" => "subtitle",
				"value" => '',
				"description" => esc_html__( 'Enter subtitle of bmi calculator.', 'designthemes-class' ),
			),

			# Under Weight Page ID
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Under Weight Page', 'designthemes-class' ),
				'param_name' => 'under_weight',
				'settings' => array(
					'multiple' => false,
					'min_length' => 1,
					'groups' => true,
					'unique_values' => true,
					'display_inline' => true,
					'delay' => 500,
					'auto_focus' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => __( 'Enter page / post title & pick.', 'designthemes-class' )
			),
			
			# Over Weight Page ID
			array(
				'type' => 'autocomplete',
				'heading' => __( 'Over Weight Page', 'designthemes-class' ),
				'param_name' => 'over_weight',
				'settings' => array(
					'multiple' => false,
					'min_length' => 1,
					'groups' => true,
					'unique_values' => true,
					'display_inline' => true,
					'delay' => 500,
					'auto_focus' => true,
				),
				'param_holder_class' => 'vc_not-for-custom',
				'description' => __( 'Enter page / post title & pick.', 'designthemes-class' )
			),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'designthemes-class' ),
      			'param_name' => 'content',
      			'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
      		),

			# Class
			array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-class' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-class')
			)
	     )		
	) );
}?>