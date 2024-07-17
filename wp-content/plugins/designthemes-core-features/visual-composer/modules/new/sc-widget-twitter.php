<?php
if (! class_exists ( 'DTWidgetTwitter' ) ) {
    
    class DTWidgetTwitter extends DTBaseSC {

        function __construct() {           

           add_shortcode( 'dt_sc_twitter_widget', array( $this, 'dt_sc_twitter_widget' ) );
        }

        function dt_sc_twitter_widget ( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
				'el_id' => '',
				'title' => '',
				'consumer_key' => '',
				'consumer_secret' => '',
				'access_token' => '',
				'access_token_secret' => '',
				'username' => '',
				'count' => '',
				'exclude_replies' => '',
				'time' => '',
				'display_avatar' => '',
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="dt-widget-twitter-wrapper">';

            	global $wp_widget_factory;
            	$args = array();
            	$type = 'Maruthi_Twitter';
            	if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
            		the_widget( $type,  $attrs, $args );
            	}
            echo '</div>';
            $output = ob_get_clean();
            return $output;
        }      
    }
}

new DTWidgetTwitter();