<?php add_action( 'vc_before_init', 'dt_sc_work_hour_vc_map' );
function dt_sc_work_hour_vc_map() {

	$plural_name   	 = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name =	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Working Hour", 'designthemes-class'),
		"base" => "dt_sc_work_hour",
		"icon" => "dt_sc_work_hour",
		"category" => $plural_name,
		'as_child' => array( 'only' => 'dt_sc_working_hours' ),
		"description" => esc_html__("Add a day working hour.",'designthemes-class'),
		"params" => array(

			# Day
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Day', 'designthemes-class'),
				'param_name' => 'day'
			),

			# Time
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Time', 'designthemes-class'),
				'param_name' => 'time'
			)
		)
	) );
}?>