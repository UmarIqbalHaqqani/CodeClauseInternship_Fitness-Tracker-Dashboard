<?php
add_action( 'vc_before_init', 'dt_sc_workout_vc_map' );
function dt_sc_workout_vc_map() {

	$plural_name   	 = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name =	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Workout", "designthemes-class"),
		"base" => "dt_sc_workout",
		"icon" => "dt_sc_workout",
		"category" => $plural_name,
		"params" => array(

     		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", "designthemes-class" ),
      			"param_name" => "title",
      			"admin_label" => true
      		),

     		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", "designthemes-class" ),
      			"param_name" => "subtitle",
      			"admin_label" => true
      		),

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'designthemes-class'),
				'param_name' => 'image'
			),

			# Button Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'URL (Link)', 'designthemes-class' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Add link to button.', 'designthemes-class' ),
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Add icon?', 'designthemes-class' ),
				'param_name' => 'add_icon',
			),			

			# Button Icon - Font Awesome
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Font Awesome', 'designthemes-class' ),
				'param_name' => 'iconclass',
				'value' => 'fa fa-info-circle',
				'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
				'dependency' => array( 'element' => 'add_icon', 'value' => 'true' ),
				'description' => esc_html__( 'Select icon from library.', 'designthemes-class' ),
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','designthemes-class'),
				'param_name' => 'content',
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
			),			

          	# Extra class name
          	array(
          		'type' => 'textfield',
          		'heading' => esc_html__( 'Extra class name', 'designthemes-class' ),
          		'param_name' => 'class',
          		'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-class' )
          	)						
		)
	) );
}?>