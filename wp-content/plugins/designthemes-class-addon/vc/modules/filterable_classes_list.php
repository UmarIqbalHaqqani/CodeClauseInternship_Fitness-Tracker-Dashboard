<?php
add_action( 'vc_before_init', 'dt_sc_classes_with_filter_vc_map' );
function dt_sc_classes_with_filter_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Filterable Classes", "designthemes-class"),
		"base" => "dt_sc_classes_with_filter",
		"icon" => "dt_sc_classes_with_filter",
		"category" => $plural_name,
		"params" => array(

     		# Categories
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Categories", "designthemes-class" ),
      			"param_name" => "categories",
				'description' => esc_html__( 'Enter category id or ids, seperated by comma', 'designthemes-class' ),
      		),

			# Posts Column
			array(
				'type' => 'dropdown',
				'param_name' => 'posts_column',
				'value' => array(
					esc_html__('Two columns','designthemes-class') => 'one-half-column',
					esc_html__('Three columns','designthemes-class') => 'one-third-column',
					esc_html__('Four columns','designthemes-class') => 'one-fourth-column'
				),
				'heading' => esc_html__( 'Columns', 'designthemes-class' ),
				'std' => 'one-third-column'
			),

     		# Limit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Limit", "designthemes-class" ),
      			"param_name" => "limit",
      			"value" => -1,
				'description' => esc_html__( 'Enter number of classes to display.', 'designthemes-class' ),
      		),

			# Filter
			array(
				'type' => 'dropdown',
				'param_name' => 'filter',
				'value' => array(
					esc_html__('Yes','designthemes-class') => 'yes',
					esc_html__('No','designthemes-class') => 'no'
				),
				'heading' => esc_html__( 'Filter?', 'designthemes-class' ),
				'std' => 'yes'
			),

			# Post style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','designthemes-class'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style - 1','designthemes-class') => 'style-1',
					esc_html__('Style - 2','designthemes-class') => 'style-2',
					esc_html__('Style - 3','designthemes-class') => 'style-3',
					esc_html__('Style - 4','designthemes-class') => 'style-4'
				)
			),

			# Meta
			array(
				'type' => 'dropdown',
				'param_name' => 'meta_fields',
				'value' => array(
					esc_html__('Yes','designthemes-class') => 'yes',
					esc_html__('No','designthemes-class') => 'no'
				),
				'heading' => esc_html__( 'Meta?', 'designthemes-class' ),
				'std' => 'no',
				'dependency' => array( 'element' => 'style', 'value' => 'style-4' )
			),

			# Excerpt Length
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Excerpt Length', 'designthemes-class' ),
				'param_name' => 'excerpt_length',
				'value' => 20,
				'dependency' => array( 'element' => 'style', 'value' => 'style-4' )
			),

			# Button Text
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Button Text", "designthemes-class" ),
				"param_name" => "button_text",
				"value" => esc_html__('Read More', 'designthemes-class'),
				"description" => esc_html__( 'Enter button text.', 'designthemes-class' ),
			),
		)
	) );
}?>