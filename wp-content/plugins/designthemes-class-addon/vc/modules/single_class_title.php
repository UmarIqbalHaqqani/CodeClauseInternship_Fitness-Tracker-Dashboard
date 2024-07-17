<?php add_action( 'vc_before_init', 'dt_sc_class_title_vc_map' );
function dt_sc_class_title_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Single Class Title", "designthemes-class"),
		"base" => "dt_sc_class_title",
		"icon" => "dt_sc_class_title",
		"category" => $plural_name,
		"params" => array(
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