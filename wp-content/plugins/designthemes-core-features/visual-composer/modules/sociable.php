<?php add_action( 'vc_before_init', 'dt_sc_sociable_vc_map' );
function dt_sc_sociable_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Sociable", 'designthemes-core' ),
		"base" => "dt_sc_sociable",
		"icon" => "dt_sc_sociable",
		"category" => DT_VC_CATEGORY,
		"description" => __("To show sociables configured in, Theme Options -> Layout -> Sociable",'designthemes-core'),
		"params" => array(

     		# Sociabls
			array(
      			'type' => 'checkbox',
      			'heading' => esc_html__( 'Socials', 'designthemes-core' ),
      			'param_name' => 'socials',
      			'value' => array( 
      				esc_html__('Delicious','designthemes-core') => 'delicious',
					esc_html__('Deviantart','designthemes-core') => 'deviantart',
					esc_html__('Digg','designthemes-core') => 'digg',
					esc_html__('Dribbble','designthemes-core') => 'dribbble',
					esc_html__('Envelope','designthemes-core') => 'envelope-open',
					esc_html__('Facebook','designthemes-core') => 'facebook',
					esc_html__('Flickr','designthemes-core') => 'flickr',
					esc_html__('Google Plus','designthemes-core') => 'google-plus',
					esc_html__('GTalk','designthemes-core') => 'comment',
					esc_html__('Instagram','designthemes-core') => 'instagram',
					esc_html__('Lastfm','designthemes-core') => 'lastfm',
					esc_html__('LinkedIn','designthemes-core') => 'linkedin',
					esc_html__('Pinterest','designthemes-core') => 'pinterest',
					esc_html__('Reddit','designthemes-core') => 'reddit',
					esc_html__('RSS','designthemes-core') => 'rss',
					esc_html__('Skype','designthemes-core') => 'skype',
					esc_html__('Stumbleupon','designthemes-core') => 'stumbleupon',
					esc_html__('Tumblr','designthemes-core') => 'tumblr',
					esc_html__('Twitter','designthemes-core') => 'twitter',
					esc_html__('Viadeo','designthemes-core') => 'viadeo',
					esc_html__('Vimeo','designthemes-core') => 'vimeo',
					esc_html__('Yahoo','designthemes-core') => 'yahoo',
					esc_html__('Youtube','designthemes-core') => 'youtube',
      			),
      			'description' => esc_html__( 'Select sociable icons.', 'designthemes-core' ),
      			'std' => 'delicious,dribbble,facebook',
      			'admin_label' => true,
				'multiple' => true
      		),

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Style', 'designthemes-core' ),
      			'param_name' => 'style',
      			'value' => array( 
      				esc_html__('Default','designthemes-core') => '',
					esc_html__('Rounded Border','designthemes-core') => 'rounded-border',
					esc_html__('Rounded Square','designthemes-core') => 'rounded-square',
					esc_html__('Diamond Square Border','designthemes-core') => 'diamond-square-border',
					esc_html__('Hexagon With Border','designthemes-core') => 'hexagon-with-border',
					esc_html__('Square Border','designthemes-core') => 'square-border',
      			),
      			'description' => esc_html__( 'Select style of sociable.', 'designthemes-core' ),
      			'std' => '',
      			'admin_label' => true
      		),
			
			# Target
			  array(
					"type" => "textfield",
					"heading" => esc_html__( "Enter the icon link target", 'designthemes-core' ),
					"param_name" => "target",
					'description' => esc_html__('You can add a link target here e.g: _blank','designthemes-core')
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
} ?>