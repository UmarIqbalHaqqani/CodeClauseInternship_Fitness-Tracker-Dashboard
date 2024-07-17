<?php add_action( 'vc_before_init', 'dt_sc_notfound_msg_vc_map' );
function dt_sc_notfound_msg_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Notfound Message", 'designthemes-core' ),
		"base" => "dt_sc_notfound_msg",
		"icon" => "dt_sc_notfound_msg",
		"category" => DT_VC_CATEGORY,
		"params" => array(
			// Title First
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Title First", 'designthemes-core' ),
				"param_name" => "title1"
            ),

			// Title Second
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Title Second", 'designthemes-core' ),
				"param_name" => "title2"
            ),
			
			// Sub Title
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Sub Title", 'designthemes-core' ),
				"param_name" => "subtitle"
            ),

			// Class
      		array(
				"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		),
		)
	) );
}?>