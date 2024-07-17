<?php
if (! class_exists ( 'DTCoreShortcodes' )) {
	
	/**
	 * Used to "Loades Core Shortcodes & Add button to tinymce"
	 *
	 * @author iamdesigning11
	 */
	class DTCoreShortcodes {

		/**
		 * Constructor for DTCoreShortcodes
		 */
		function __construct() {

			require_once plugin_dir_path ( __FILE__ ) . 'shortcodes.php';

			add_action( 'wp_enqueue_scripts', array(
				$this,
				'dt_wp_enqueue_scripts'
			) );

			add_action( 'init', array( $this, 'dt_sc_mc_subscribe') );

			add_filter( 'widget_text', 'do_shortcode' );
		}

		function dt_wp_enqueue_scripts() {
			/* Front End CSS & jQuery */
			wp_enqueue_style ( 'dt-animation-css', plugin_dir_url ( __FILE__ ) . 'css/animations.css' );
			wp_enqueue_style ( 'dt-slick-css', plugin_dir_url ( __FILE__ ) . 'css/slick.css' );
			wp_enqueue_style ( 'dt-sc-css', plugin_dir_url ( __FILE__ ) . 'css/shortcodes.css' );

			wp_enqueue_script ( 'dt-sc-tabs', plugin_dir_url ( __FILE__ ) . 'js/jquery.tabs.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-tiptip', plugin_dir_url ( __FILE__ ) . 'js/jquery.tipTip.minified.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-inview', plugin_dir_url ( __FILE__ ) . 'js/jquery.inview.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-animatenum', plugin_dir_url ( __FILE__ ) . 'js/jquery.animateNumber.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-donutchart', plugin_dir_url ( __FILE__ ) . 'js/jquery.donutchart.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-slick', plugin_dir_url ( __FILE__ ) . 'js/slick.min.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-toogle-click', plugin_dir_url ( __FILE__ ) . 'js/jquery.toggle.click.js', array (), false, true );
			wp_enqueue_script ( 'dt-sc-script', plugin_dir_url ( __FILE__ ) . 'js/shortcodes.js', array (), false, true );
		}

		function dt_sc_mc_subscribe() {
			if( defined('MARUTHI_CORE_PLUGIN') ) {
				require_once( MARUTHI_CORE_PLUGIN."/apis/mailchimp/mailchimp.php" );
			}
		}
	}
}
?>