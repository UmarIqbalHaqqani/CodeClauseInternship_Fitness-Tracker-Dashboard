<?php add_action( 'vc_before_init', 'dt_sc_subscription_info_vc_map' );
function dt_sc_subscription_info_vc_map() {

	$plural_name   	 = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name =	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Subscription Info", 'designthemes-class'),
		"base" => "dt_sc_subscription_info",
		"icon" => "dt_sc_subscription_info",
		"category" => $plural_name,
		"description" => esc_html__("Add a subscription info.",'designthemes-class'),
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'designthemes-class'),
				'param_name' => 'title',
				'description' => esc_html__('Ex: Coacher : Rock', 'designthemes-class'),
			),

			# SubTitle
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Sub Title', 'designthemes-class'),
				'param_name' => 'subtitle',
				'description' => esc_html__('Ex: Personal Coacher', 'designthemes-class'),
			),

			# Duration
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Duration', 'designthemes-class'),
				'param_name' => 'duration',
				'description' => esc_html__('Ex: 6 Months', 'designthemes-class'),
			),

			# Currency Symbol
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Currency Symbol', 'designthemes-class'),
				'param_name' => 'currency_symbol',
				'description' => esc_html__('Ex: $', 'designthemes-class')
			),

			# Price
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Price', 'designthemes-class'),
				'param_name' => 'price',
				'description' => esc_html__('Ex: 122', 'designthemes-class')
			),
		)
	) );
}?>