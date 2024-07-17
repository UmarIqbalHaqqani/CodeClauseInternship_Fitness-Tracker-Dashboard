<?php add_action( 'vc_before_init', 'dt_sc_ad_carousel_wrapper_vc_map' );
function dt_sc_ad_carousel_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_ad_carousel_wrapper extends WPBakeryShortCodesContainer {
	}

	vc_map( array(
		"name" => esc_html__( "Advanced Carousel", 'designthemes-core' ),
		"base" => "dt_sc_ad_carousel_wrapper",
		"icon" => "dt_sc_ad_carousel_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_iconbox, dt_sc_image_caption, dt_sc_team, dt_sc_post, dt_sc_portfolio_item, dt_sc_testimonial, dt_sc_event_organizer_events' ),
		'description' => esc_html__( 'Advanced carousel wrapper', 'designthemes-core' ),
		"params" => array(

			# Visible
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "No.of Items to Visible", 'designthemes-core' ),
      			"param_name" => "visible",
      			'description' => esc_html__('Enter no.of items to visible. ex: 3', 'designthemes-core'),
				'edit_field_class' => 'vc_col-xs-6'
      		),

			# Scroll
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "No.of Items to Scroll", 'designthemes-core' ),
      			"param_name" => "scroll",
      			'description' => esc_html__('Enter no.of items to scroll. ex: 1', 'designthemes-core'),
				'edit_field_class' => 'vc_col-xs-6'				
      		),

      		# Auto Start
      		array(
      			'type' => 'dropdown',
				'heading' => esc_html__( 'Auto Start Animation?', 'designthemes-core' ),
				'param_name' => 'auto',
				'value' => array(
					esc_html__('Yes','designthemes-core') => 'true',
					esc_html__('No','designthemes-core') => 'false',
					
				),
				'std' => 'false',
				'edit_field_class' => 'vc_col-xs-6'
			),

			# Animation
			array(
				'type' => 'dropdown',
				'param_name' => 'animation',
				'value' => array(
					esc_html__('None','designthemes-core') => 'none',
					esc_html__('Scroll','designthemes-core') => 'scroll',
					esc_html__('Direct Scroll','designthemes-core') => 'directscroll',
					esc_html__('Cross Fade','designthemes-core') => 'crossfade',
					esc_html__('Cover','designthemes-core') => 'cover',
					esc_html__('Uncover','designthemes-core') => 'uncover',
					esc_html__('Fade','designthemes-core') => 'fade',
					
				),
				'heading' => esc_html__( 'Animation', 'designthemes-core' ),
				'description' => esc_html__( 'Select carousel animation', 'designthemes-core' ),
				'std' => 'scroll',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-xs-6'
			),
			
      		# Navigation
      		array(
      			'type' => 'dropdown',
				'heading' => esc_html__( 'Navigation?', 'designthemes-core' ),
				'param_name' => 'navigation',
				'value' => array(
					esc_html__('Yes','designthemes-core') => 'true',
					esc_html__('No','designthemes-core') => 'false',
					
				),
				'std' => 'true',
				'edit_field_class' => 'vc_col-xs-6'
			),

      		# Pager
      		array(
      			'type' => 'dropdown',
				'heading' => esc_html__( 'Pager?', 'designthemes-core' ),
				'param_name' => 'pager',
				'value' => array(
					esc_html__('Yes','designthemes-core') => 'true',
					esc_html__('No','designthemes-core') => 'false',
					
				),
				'std' => 'false',
				'edit_field_class' => 'vc_col-xs-6'
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core'),
				'edit_field_class' => 'vc_col-xs-6'
      		),

      		# Vertical
      		array(
      			'type' => 'checkbox',
      			'heading' => esc_html__( 'Enable Vertical?', 'designthemes-core' ),
				'admin_label' => true,
      			'param_name' => 'vertical',
      			'description' => esc_html__( 'If checked animate from vertical direction.', 'designthemes-core' ),
      			'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'true' ),
				'edit_field_class' => 'vc_col-xs-6'
      		)
		)
	) );
}?>