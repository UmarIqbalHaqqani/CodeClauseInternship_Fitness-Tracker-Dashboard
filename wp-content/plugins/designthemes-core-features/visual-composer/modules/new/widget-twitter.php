<?php
vc_map( array(
	"name" => esc_html__( "Twitter Widget", 'designthemes-core' ),
	"base" => "dt_sc_twitter_widget",
	"icon" => "dt_sc_twitter_widget",
	'category' => __( 'WordPress Widgets', 'designthemes-core' ),
    'params'    => array(

        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

        # Title
        array(
            'type' => 'textfield',
            'heading' => __( 'Widget title', 'js_composer' ),
            'save_always' => true,
            'param_name' => 'title',
            'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' ),
        ),        

        # Consumer Key
        array(
            'type' => 'textfield',
            'heading' => __( 'Consumer Key', 'js_composer' ),
            'save_always' => true,
            'param_name' => 'consumer_key',
        ),

        # Consumer Secret
        array(
            'type' => 'textfield',
            'heading' => __( 'Consumer Secret', 'js_composer' ),
            'save_always' => true,
            'param_name' => 'consumer_secret',
        ),

        # Access Token
        array(
            'type' => 'textfield',
            'heading' => __( 'Access Token', 'js_composer' ),
            'save_always' => true,
            'param_name' => 'access_token',
        ),

        # Access Token Secret
        array(
            'type' => 'textfield',
            'heading' => __( 'Access Token Secret', 'js_composer' ),
            'save_always' => true,
            'param_name' => 'access_token_secret',
        ),

        # Username
        array(
            'type' => 'textfield',
            'heading' => __( 'User Name', 'js_composer' ),
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'param_name' => 'username',
        ),

        # Tweets Count
        array(
            'type' => 'dt_sc_input_number',
            'heading' => __( 'Tweets Count', 'js_composer' ),
            'param_name' => 'count',
            'min'   => '1',
            'max'   => '30',
            'step'  => '1',
            'std'   => '3',
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),

        # Exclude @replies
        array(
            'type' => 'checkbox',
            'param_name' => 'exclude_replies',
            'value' => array( __( 'Exclude @replies', 'designthemes-core' ) => 'yes' ),
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-4',
        ),

        # Show time of tweet
        array(
            'type' => 'checkbox',
            'param_name' => 'time',
            'value' => array( __( 'Show time of tweet', 'designthemes-core' ) => 'yes' ),
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-4',
        ),

        # Show user avatar
        array(
            'type' => 'checkbox',
            'param_name' => 'display_avatar',
            'value' => array( __( 'Show user avatar', 'designthemes-core' ) => 'yes' ),
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-4',
        ),              
    )
) );