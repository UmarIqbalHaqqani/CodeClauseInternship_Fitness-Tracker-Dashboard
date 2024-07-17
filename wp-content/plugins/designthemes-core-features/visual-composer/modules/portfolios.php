<?php add_action( 'vc_before_init', 'dt_sc_portfolios_vc_map' );
function dt_sc_portfolios_vc_map() {

	$arr = array( esc_html__('Yes','designthemes-core') => 'yes', esc_html__('No','designthemes-core') => 'no' );

	vc_map( array(
		"name" => esc_html__( "Portfolio Items", 'designthemes-core' ),
		"base" => "dt_sc_portfolios",
		"icon" => "dt_sc_portfolios",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Post Count
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post Counts', 'designthemes-core' ),
				'param_name' => 'count',
				'description' => esc_html__( 'Enter post count', 'designthemes-core' ),
				'admin_label' => true
			),

			// Post column
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','designthemes-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('II Columns','designthemes-core') => 2 ,
					esc_html__('III Columns','designthemes-core') => 3,
					esc_html__('IV Columns','designthemes-core') => 4,

				),
				'std' => '3'
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
				'std' => 'type1',
				'admin_label' => true
			),

			// Allow Grid Space
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Grid Space','designthemes-core'),
				'param_name' => 'allow_gridspace',
				'value' => $arr
			),

			// Allow Filter
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Filter','designthemes-core'),
				'param_name' => 'allow_filter',
				'value' => $arr
			),

			// Term ID(s)
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Terms', 'designthemes-core' ),
				'param_name' => 'terms',
				'description' => esc_html__( 'Enter Portfolio Terms', 'designthemes-core' )
			),						
		)
	) );
} ?>