<?php
if (! class_exists ( 'DTWidgetRecentPosts' ) ) {
    
    class DTWidgetRecentPosts extends DTBaseSC {

        function __construct() {           

           add_shortcode( 'dt_sc_recent_posts_widget', array( $this, 'dt_sc_recent_posts_widget' ) );
        }

        function dt_sc_recent_posts_widget ( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'title' => '',
                '_post_categories' => '',
                '_post_count' => '',
                '_enabled_image' => '',
                '_excerpt' => ''
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="dt-recent-posts-wrapper">';

            	global $wp_widget_factory;
            	$args = array();
            	$type = 'Maruthi_Recent_Posts';
            	if ( is_object( $wp_widget_factory ) && isset( $wp_widget_factory->widgets, $wp_widget_factory->widgets[ $type ] ) ) {
            		the_widget( $type,  $attrs, $args );
            	}
            echo '</div>';
            $output = ob_get_clean();
            return $output;

        }      
    }
}

new DTWidgetRecentPosts();