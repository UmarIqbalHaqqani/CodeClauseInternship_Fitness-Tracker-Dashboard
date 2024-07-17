<?php add_action( 'vc_before_init', 'dt_sc_event_caption_vc_map' );
function dt_sc_event_caption_vc_map() {
	vc_map( array(
		"name" => esc_html__("Event Caption", 'designthemes-core'),
		"base" => "dt_sc_event_caption",
		"icon" => "dt_sc_event_caption",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add event caption",'designthemes-core'),
		"params" => array(

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'designthemes-core' ),
				'param_name' => 'title',
			),

			# Sub Title 1
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title 1', 'designthemes-core' ),
				'param_name' => 'subtitle1',
			),

			# Sub Title 2
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title 2', 'designthemes-core' ),
				'param_name' => 'subtitle2',
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'designthemes-core' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image from media library', 'designthemes-core' ),
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','designthemes-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            )			
		)		
	) );
}?>