<?php
/*
Plugin Name: Simple Events Manager
Plugin URI: http://wedesignthemes.com/plugins/simple-event-manager/
Description: Simple event management plugin
Version: 1.7
Author: DesignThemes
Author URI: http://wedesignthemes.com
Text Domain: dt-event-manager
*/

if (! class_exists ( 'DTEventPlugin' ) ) {

	class DTEventPlugin {

		function __construct() {
			
			$themeData = wp_get_theme();
			$name      = $themeData->get('Name');
			$template  = $themeData->get('Template');

			if( ($name == 'Maruthi') || ($name == 'Maruthi Child') ) {
			} else {
				if( $template == 'maruthi' ) {
				} else {
					return;
				}
			}			

			require_once plugin_dir_path ( __FILE__ ) . '/utils.php';

			add_action ( 'admin_notices', array( $this, 'dt_plugin_notice' ) );

			add_action ( 'init', array( $this, 'dt_load_textdomain' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'dt_event_enqueue_scripts') );

			add_action( 'wp_enqueue_scripts', array( $this, 'dt_event_enqueue_custom_inline'), 999 );

			// Event Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/dt-event-post-type.php';
			if( class_exists('DTEventsPostType') ){
				new DTEventsPostType();
			}

			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/dt-event-as-product.php';
			if( class_exists('DTEventAsProduct') ){
				new DTEventAsProduct();
			}

			// Event Venue Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/dt-event-venue-post-type.php';
			if( class_exists('DTEventVenuesPostType') ){
				new DTEventVenuesPostType();
			}

			// Event Organizer Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/dt-event-organizer-post-type.php';
			if( class_exists('DTEventOrganizersPostType') ){
				new DTEventOrganizersPostType();
			}

			require_once plugin_dir_path ( __FILE__ ) . '/visual-composer/register-visual-composer.php';
			if( class_exists('DTEventVC') ){
				new DTEventVC();
			}						
		}

		function dt_plugin_notice() {

			$plugin  = get_plugin_data(__FILE__);

		}

		function dt_load_textdomain() {

			load_plugin_textdomain ( 'dt-event-manager', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		function dt_event_enqueue_scripts() {

			wp_enqueue_style( 'dt-event-manager-style', plugins_url('dt-event-manager') .'/css/front/style.css', false, false, 'all' );

			wp_enqueue_script( 'dt-event-manager-scripts',  plugins_url('dt-event-manager') . '/js/front/custom.js', array('jquery'), null, true );
		}

		function dt_event_enqueue_custom_inline() {

			wp_register_style( 'dt-event-manager-custom-inline', '', array(), false, 'all' );
		}
	}
}

if ( class_exists ( 'DTEventPlugin' ) ) {

	new DTEventPlugin();
}