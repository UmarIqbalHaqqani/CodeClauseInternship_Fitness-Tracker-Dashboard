<?php add_action( 'vc_before_init', 'dt_sc_toggle_vc_map' );
function dt_sc_toggle_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Toggle", 'designthemes-core' ),
		"base" => "dt_sc_toggle",
		"category" => DT_VC_CATEGORY,
		'as_child' => array( 'only' => 'dt_sc_toggle_group' ),
		'description' => esc_html__( 'Section for Toggles', 'designthemes-core' ),
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'designthemes-core' ),
      			'admin_label' => true,
				'description' => esc_html__( 'Enter section title (Note: you can leave it empty)', 'designthemes-core' )
			),

			# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'designthemes-core' ),
      			'param_name' => 'content',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
      		)						
		)
	) );
}?>