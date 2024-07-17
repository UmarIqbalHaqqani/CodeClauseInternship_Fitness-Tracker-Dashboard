<?php add_action( 'vc_before_init', 'dt_sc_mc_newsletter_vc_map' );
function dt_sc_mc_newsletter_vc_map() {
	vc_map( array(
		"name" => esc_html__("Mailchimp Newsletter", 'designthemes-core'),
		"base" => "dt_sc_mc_newsletter",
		"icon" => "dt_sc_mc_newsletter",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add mailchimp newsletter signup form",'designthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','designthemes-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','designthemes-core') => 'type1',
					esc_html__('Type 2','designthemes-core') => 'type2',
					esc_html__('Type 3','designthemes-core') => 'type3',
					esc_html__('Type 4','designthemes-core') => 'type4',
					esc_html__('Type 5','designthemes-core') => 'type5',
					esc_html__('Type 6','designthemes-core') => 'type6',
					esc_html__('Type 7','designthemes-core') => 'type7',
				),
				'std' => 'type1'				
			),

			# Main Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Main Title', 'designthemes-core' ),
				'param_name' => 'title'
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sub Title', 'designthemes-core' ),
				'param_name' => 'subtitle',
				'dependency' => array( 'element' => 'type', 'value' => array( 'type2', 'type3', 'type4', 'type5', 'type6', 'type7' ) )
			),

			# Tooltip
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Tooltip', 'designthemes-core' ),
				'param_name' => 'tooltip',
				'dependency' => array( 'element' => 'type', 'value' => 'type7' )
			),

			# List id
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'List ID', 'designthemes-core' ),
				'param_name' => 'listid',
			),

			# Name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name Field', 'designthemes-core' ),
				'param_name' => 'name',
				'value' => esc_html__('Your Name', 'designthemes-core'),
				'dependency' => array( 'element' => 'type', 'value' => array( 'type1', 'type2', 'type3', 'type4', 'type5' ) )
			),

			# Email
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Email Field', 'designthemes-core' ),
				'param_name' => 'email',
				'value' => esc_html__('Your Email Address', 'designthemes-core')
			),

			# Button
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Button Field', 'designthemes-core' ),
				'param_name' => 'button',
				'value' => esc_html__('Subscribe Now', 'designthemes-core')
			),

			# Show Name
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Show Name Field', 'designthemes-core' ),
				'param_name' => 'show_name',
				'value' => array( esc_html__('Yes','designthemes-core') => 'true', esc_html__('No','designthemes-core') => 'false' ),
				'dependency' => array( 'element' => 'type', 'value' => array( 'type1', 'type2', 'type3', 'type4', 'type5' ) ),
				'std' => 'false'
			),

			# Content - type = Decoration , Triangle
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__( 'Content', 'designthemes-core' ),
				'param_name' => 'content',
				'value' => '<br><p>Sign-up to get the latest offers and news and stay updated.</p><i>Note: We do not spam</i><br>',
				'dependency' => array( 'element' => 'type', 'value' => array( 'type2', 'type3', 'type4', 'type5', 'type6', 'type7' ) )
			),			

			# Extra class name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Style particular element differently - add a class name and refer to it in custom CSS', 'designthemes-core' )
      		)
		)
	) );	
}?>