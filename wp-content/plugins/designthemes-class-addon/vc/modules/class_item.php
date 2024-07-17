<?php
add_action( 'vc_before_init', 'dt_sc_class_item_vc_map' );
function dt_sc_class_item_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Class Item", "designthemes-class"),
		"base" => "dt_sc_class_item",
		"icon" => "dt_sc_class_item",
		"category" => $plural_name,
		"params" => array(

			# ID
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Enter Class ID", "designthemes-class" ),
				"param_name" => "class_id",
				"value" => '',
				"description" => esc_html__( 'Enter ID of class to display.', 'designthemes-class' ),
			),
			
			// Post style
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

			# Button Text
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Button Text", "designthemes-class" ),
				"param_name" => "button_text",
				"value" => esc_html__('Read More', 'designthemes-class'),
				"description" => esc_html__( 'Enter button text.', 'designthemes-class' ),
			),

			# Excerpt Length
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Excerpt Length', 'designthemes-class' ),
				'param_name' => 'excerpt_length',
				'value' => 20,
				'dependency' => array( 'element' => 'style', 'value' => 'style-4' )
			)
	     )
	) );
}?>