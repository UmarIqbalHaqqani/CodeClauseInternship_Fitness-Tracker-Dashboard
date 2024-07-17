<?php add_action( 'vc_before_init', 'dt_sc_portfolio_item_vc_map' );
function dt_sc_portfolio_item_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Single Portfolio Item", 'designthemes-core' ),
		"base" => "dt_sc_portfolio_item",
		"icon" => "dt_sc_portfolio_item",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post ID
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'designthemes-core' ),
				'param_name' => 'id',
				'description' => esc_html__( 'Enter post ID', 'designthemes-core' ),
				'admin_label' => true
			),

			// Post style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','designthemes-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Modern Title','designthemes-core') => 'type1', 
					esc_html__('Title & Icons Overlay','designthemes-core') => 'type2', 
					esc_html__('Title Overlay','designthemes-core') => 'type3', 
					esc_html__('Icons Only','designthemes-core') => 'type4', 
					esc_html__('Classic','designthemes-core') => 'type5', 
					esc_html__('Minimal Icons','designthemes-core') => 'type6', 
					esc_html__('Presentation','designthemes-core') => 'type7', 
					esc_html__('Girly','designthemes-core') => 'type8', 
					esc_html__('Art','designthemes-core') => 'type9' 
				),
				'std' => 'type1'
			)
		)
	) );
}?>