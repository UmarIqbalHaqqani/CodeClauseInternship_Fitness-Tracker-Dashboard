<?php add_action( 'vc_before_init', 'dt_sc_partners_carousel_vc_map' );
function dt_sc_partners_carousel_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Partners carousel", 'designthemes-core' ),
		"base" => "dt_sc_partners_carousel",
		"icon" => "dt_sc_partners_carousel",
		"category" => DT_VC_CATEGORY,
		'description' => esc_html__( 'Partners carousel with images', 'designthemes-core' ),
		"params" => array(
			
			#Image
			array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'designthemes-core' ),
				'param_name' => 'images',
				'description' => esc_html__( 'Select partner images from media library', 'designthemes-core' )
			),

			#Scroll
			array(
				'type' => 'textfield',
				'param_name' => 'scroll',
				'heading' => esc_html__( 'Scroll', 'designthemes-core' ),
				'value' => '3',				
				'description' => esc_html__( 'The number of items to scroll at once', 'designthemes-core' )
			),

			#Visible
			array(
				'type' => 'textfield',
				'param_name' => 'visible',
				'heading' => esc_html__( 'Visible', 'designthemes-core' ),
				'value' => '3',
 				'description' => esc_html__( 'The number of items to show at once', 'designthemes-core' )
			)
		)	 
	) );
}?>