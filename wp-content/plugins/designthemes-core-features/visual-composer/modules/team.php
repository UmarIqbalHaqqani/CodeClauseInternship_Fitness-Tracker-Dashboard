<?php add_action( 'vc_before_init', 'dt_sc_team_vc_map' );
function dt_sc_team_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Team", 'designthemes-core' ),
		"base" => "dt_sc_team",
		"icon" => "dt_sc_team",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'designthemes-core' ),
				'description' => esc_html__( 'Enter name', 'designthemes-core' )
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'designthemes-core' ),
				'description' => esc_html__( 'Enter role', 'designthemes-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','designthemes-core'),
                'param_name' => 'image'
            ),

            # Team style
            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Team Style','designthemes-core'),
            	'param_name' => 'teamstyle',
            	'value' => array(
            		esc_html__('Default','designthemes-core') => '',
					esc_html__('Social on hover','designthemes-core') => 'hide-social-show-on-hover',
					esc_html__('Social and Role on hover','designthemes-core') => 'hide-social-role-show-on-hover',
					esc_html__('Details on hover','designthemes-core') => 'hide-details-show-on-hover',
					esc_html__('Show details & Social on hover','designthemes-core') => 'hide-social-show-on-hover details-on-image',
					esc_html__('Horizontal','designthemes-core') => 'type2',
					esc_html__('Rounded','designthemes-core') => 'hide-social-show-on-hover rounded'
            	)
            ),

            # Social Icon Style
            array(
				'type' => 'dropdown',
				'heading' => esc_html__('Social Icon Style','designthemes-core'),
            	'param_name' => 'socialstyle',
            	'value' => array(
            		esc_html__('Default','designthemes-core') => '' ,
            		esc_html__('Rounded Border','designthemes-core') => 'rounded-border' ,
            		esc_html__('Rounded Square','designthemes-core') => 'rounded-square' ,
            		esc_html__('Square Border','designthemes-core') => 'square-border' ,
            		esc_html__('Diamond Square Border','designthemes-core') => 'diamond-square-border' ,
            		esc_html__('Hexagon Border','designthemes-core') => 'hexagon-border'
            	)
            ),

            # Facebook
			array(
				'type' => 'textfield',
				'param_name' => 'facebook',
				'heading' => esc_html__( 'Facebook', 'designthemes-core' ),
			),

            # Twitter
			array(
				'type' => 'textfield',
				'param_name' => 'twitter',
				'heading' => esc_html__( 'Twitter', 'designthemes-core' ),
			),

            # Google
			array(
				'type' => 'textfield',
				'param_name' => 'google',
				'heading' => esc_html__( 'Google', 'designthemes-core' ),
			),

            # Linkedin
			array(
				'type' => 'textfield',
				'param_name' => 'linkedin',
				'heading' => esc_html__( 'Linkedin', 'designthemes-core' ),
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','designthemes-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.'
            ),

      		# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)			
		)
	) );	
}?>