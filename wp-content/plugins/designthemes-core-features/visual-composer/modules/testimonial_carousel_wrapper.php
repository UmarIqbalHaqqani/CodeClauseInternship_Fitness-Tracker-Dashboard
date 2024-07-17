<?php add_action( 'vc_before_init', 'dt_sc_tm_carousel_wrapper_vc_map' );
function dt_sc_tm_carousel_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_tm_carousel_wrapper extends WPBakeryShortCodesContainer {
	}

	vc_map( array(
		"name" => esc_html__( "Testimonial carousel", 'designthemes-core' ),
		"base" => "dt_sc_tm_carousel_wrapper",
		"icon" => "dt_sc_tm_carousel_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_tm_carousel_item' ),
		'description' => esc_html__( 'Testimonial carousel wrapper', 'designthemes-core' ),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','designthemes-core') => 'type1',
					esc_html__('Type 2','designthemes-core') => 'type2',
					esc_html__('Type 3','designthemes-core') => 'type3',
					esc_html__('Type 4','designthemes-core') => 'type4',
					esc_html__('Type 5','designthemes-core') => 'type5',
					esc_html__('Type 6','designthemes-core') => 'type6',
					esc_html__('Type 7','designthemes-core') => 'type7',
					esc_html__('Type 8','designthemes-core') => 'type8'					
				),
				'heading' => esc_html__( 'Type', 'designthemes-core' ),
				'description' => esc_html__( 'Select testimonial carousel display type', 'designthemes-core' ),
				'std' => 'type2',
				'admin_label' => true
			),

			# Animation
			array(
				'type' => 'dropdown',
				'param_name' => 'animation',
				'value' => array(
					esc_html__('Scroll','designthemes-core') => 'scroll',
					esc_html__('Cross Fade','designthemes-core') => 'crossfade',
					esc_html__('Cover','designthemes-core') => 'cover'
				),
				'heading' => esc_html__( 'Animation', 'designthemes-core' ),
				'description' => esc_html__( 'Select testimonial carousel animation', 'designthemes-core' ),
				'std' => 'scroll',
				'admin_label' => true
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)			
		)		
	) );
}?>