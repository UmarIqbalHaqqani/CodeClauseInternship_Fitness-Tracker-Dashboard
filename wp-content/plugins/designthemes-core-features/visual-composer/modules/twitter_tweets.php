<?php add_action( 'vc_before_init', 'dt_sc_twitter_tweets_vc_map' );
function dt_sc_twitter_tweets_vc_map() {

	vc_map( array( 
		"name" => esc_html__( "Twitter tweets", 'designthemes-core' ),
		"base" => "dt_sc_twitter_tweets",
		"icon" => "dt_sc_twitter_tweets",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'consumerkey',
				'heading' => esc_html__( 'Consumer key', 'designthemes-core' ),
				'description' => esc_html__( 'Enter Consumer key', 'designthemes-core' ),
			),

			# Consumer secret
			array(
				'type' => 'textfield',
				'param_name' => 'consumersecret',
				'heading' => esc_html__( 'Consumer secret', 'designthemes-core' ),
				'description' => esc_html__( 'Enter Consumer secret', 'designthemes-core' ),
			),

			# Access token 
			array(
				'type' => 'textfield',
				'param_name' => 'accesstoken',
				'heading' => esc_html__( 'Access token', 'designthemes-core' ),
				'description' => esc_html__( 'Enter Access token', 'designthemes-core' ),
			),

			# Access token secret
			array(
				'type' => 'textfield',
				'param_name' => 'accesstokensecret',
				'heading' => esc_html__( 'Access token secret', 'designthemes-core' ),
				'description' => esc_html__( 'Enter Access token secret', 'designthemes-core' ),
			),

			# Consumer Key
			array(
				'type' => 'textfield',
				'param_name' => 'username',
				'heading' => esc_html__( 'Twitter username', 'designthemes-core' ),
				'description' => esc_html__( 'Enter Twitter username', 'designthemes-core' ),
			),

			# Avatar
			array(
				'type' => 'dropdown',
				'param_name' => 'useravatar',
				'heading' => esc_html__('Show avatar?','designthemes-core'),
				'value' => array( esc_html__('Yes','designthemes-core') => 'yes' , esc_html__('No','designthemes-core') => 'no' ),
				'std' => 'no'
			)
		)		
	) );
}?>