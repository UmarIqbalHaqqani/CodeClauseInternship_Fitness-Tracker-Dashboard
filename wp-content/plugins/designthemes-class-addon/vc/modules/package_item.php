<?php
add_action( 'vc_before_init', 'dt_sc_package_item_vc_map' );
function dt_sc_package_item_vc_map() {

	$plural_name    = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name	=	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		"name" => esc_html__("Package Item", "designthemes-class"),
		"base" => "dt_sc_package_item",
		"icon" => "dt_sc_package_item",
		"category" => $plural_name,
		"params" => array(

			# ID
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Title", "designthemes-class" ),
				"param_name" => "title",
				"description" => esc_html__( 'Enter the title of package.', 'designthemes-class' ),
			),

      		# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'designthemes-class' ),
      			'param_name' => 'content',
      			'value' => '<p>Class aptent taciti sociosqu ad litora torquent per.</p>'
      		),

			# Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','designthemes-class'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style - 1','designthemes-class') => 'type1',
					esc_html__('Style - 2','designthemes-class') => 'type2',
					esc_html__('Style - 3','designthemes-class') => 'type3'
				)
			),

			# Logo
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Logo', 'designthemes-class' ),
				'param_name' => 'logourl',
				'description' => esc_html__( 'Select package logo from media library', 'designthemes-class' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'designthemes-class' ),
				'param_name' => 'imageurl',
				'description' => esc_html__( 'Select package image from media library', 'designthemes-class' )
			),

			# Price
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Price", "designthemes-class" ),
				"param_name" => "price",
				"description" => esc_html__( 'Enter package price. Ex: $59.00', 'designthemes-class' ),
			),

			# Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Link', 'designthemes-class' ),
				'param_name' => 'link',
				'description' => __( 'Enter the link of package.', 'designthemes-class' ),
			)
	     )
	) );
}?>