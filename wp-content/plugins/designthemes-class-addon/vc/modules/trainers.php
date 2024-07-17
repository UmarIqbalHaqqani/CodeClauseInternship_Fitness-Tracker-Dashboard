<?php
add_action( 'vc_before_init', 'dt_sc_trainers_vc_map' );
function dt_sc_trainers_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Trainers", "designthemes-class"),
		"base" => "dt_sc_trainers",
		"icon" => "dt_sc_trainers",
		"category" => $plural_name,
		"params" => array(

			# ID
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Enter Trainer ID's", "designthemes-class" ),
				"param_name" => "trainer_ids",
				"description" => esc_html__( "Enter trainer IDs, separated by comma(,). Inside 'Class' custom post, id not needed.", 'designthemes-class' ),
			),

			# Excerpt Length
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Excerpt Length', 'designthemes-class' ),
				'param_name' => 'excerpt_length',
				'value' => 20,
				"description" => esc_html__( 'If excerpt length is zero, no excerpt to display.', 'designthemes-class' )
			),
			
			# Available Time
			array(
				'type' => 'dropdown',
				'param_name' => 'show_time',
				'value' => array(
					esc_html__('Yes','designthemes-class') => 'yes',
					esc_html__('No','designthemes-class') => 'no'
				),
				'heading' => esc_html__( 'Show Time?', 'designthemes-class' ),
				'std' => 'no'
			),

			# Class
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'designthemes-class' ),
				'param_name' => 'class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-class' ),
			)
	     )
	) );
}?>