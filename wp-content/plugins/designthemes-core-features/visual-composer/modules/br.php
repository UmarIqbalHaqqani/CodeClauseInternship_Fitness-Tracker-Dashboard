<?php add_action( 'vc_before_init', 'dt_sc_br_vc_map' );
function dt_sc_br_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Custom Break", 'designthemes-core' ),
		"base" => "dt_sc_br",
		"icon" => "dt_sc_br",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Break Count
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Break', 'designthemes-core' ),
				'param_name' => 'br',
				'value' => 1,
				'description' => esc_html__( 'Enter number of break tags to generate', 'designthemes-core' ),
			)
		)
	) );
} ?>