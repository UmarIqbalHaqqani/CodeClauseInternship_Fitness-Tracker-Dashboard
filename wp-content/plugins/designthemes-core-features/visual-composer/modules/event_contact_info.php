<?php add_action( 'vc_before_init', 'dt_sc_event_contact_info_vc_map' );
function dt_sc_event_contact_info_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__("Event contact Info", 'designthemes-core'),
		"base" => "dt_sc_event_contact_info",
		"icon" => "dt_sc_event_contact_info",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add event contact info",'designthemes-core'),
		"params" => array(

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'designthemes-core' ),
				'param_name' => 'title',
			),

			# Icon Class
            array(
            	"type" => "textfield",
            	"heading" => esc_html__( "Icon", 'designthemes-core' ),
            	"param_name" => "icon"
            ),

			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'designthemes-core' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add link', 'designthemes-core' ),
			),

      		# Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Color', 'designthemes-core' ),
      			'admin_label' => true,
      			'param_name' => 'color',
      			'value' => $variations,      			
      			'description' => esc_html__( 'Select color', 'designthemes-core' ),
      		),

		)		
	) );
}?>