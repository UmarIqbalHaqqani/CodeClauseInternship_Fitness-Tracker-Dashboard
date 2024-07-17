<?php add_action( 'vc_before_init', 'dt_sc_class_step_vc_map' );
function dt_sc_class_step_vc_map() {

	$plural_name   	 = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name =	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Process Step", 'designthemes-class'),
		"base" => "dt_sc_class_step",
		"icon" => "dt_sc_class_step",
		"category" => $plural_name,
		"description" => esc_html__("Add a class process step.",'designthemes-class'),
		"params" => array(

			# Step Text
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Step Text', 'designthemes-class'),
				'param_name' => 'step_text',
				'value' => esc_html__('Step', 'designthemes-class'),
			),

			# Step Value
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Step Value', 'designthemes-class'),
				'param_name' => 'step_value',
				'value' => 1,
			),

			# Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title', 'designthemes-class'),
				'param_name' => 'title'
			),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'designthemes-class' ),
      			'param_name' => 'content',
      			'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
      		)
		)
	) );
}?>