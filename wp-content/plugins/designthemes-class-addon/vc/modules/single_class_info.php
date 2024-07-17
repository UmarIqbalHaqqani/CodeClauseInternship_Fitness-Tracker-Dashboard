<?php add_action( 'vc_before_init', 'dt_sc_class_info_vc_map' );
function dt_sc_class_info_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Single Class Meta", "designthemes-class"),
		"base" => "dt_sc_class_info",
		"icon" => "dt_sc_class_info",
		"category" => $plural_name,
		"params" => array(
			# Filter
			array(
				'type' => 'dropdown',
				'param_name' => 'meta',
				'value' => array(
					esc_html__('Yes','designthemes-class') => 'yes',
					esc_html__('No','designthemes-class') => 'no'
				),
				'heading' => esc_html__( 'Show meta?', 'designthemes-class' ),
				'std' => 'yes'
			)
		)		
	) );
}?>