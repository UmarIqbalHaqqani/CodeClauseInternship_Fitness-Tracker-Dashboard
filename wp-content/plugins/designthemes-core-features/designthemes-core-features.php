<?php
/*
 * Plugin Name:	DesignThemes Core Features Plugin 
 * URI: 		http://wedesignthemes.com/plugins/designthemes-core-features 
 * Description: A simple wordpress plugin designed to implements <strong>core features of DesignThemes</strong> 
 * Version: 	2.1
 * Author: 		DesignThemes 
 * Text Domain: designthemes-core
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTCorePlugin' )) {

	/**
	 * Basic class to load Shortcodes & Custom Posts
	 *
	 * @author iamdesigning11
	 */
	class DTCorePlugin {

		function __construct() {

			define( 'THEME_NAME', 'Maruthi');

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

			add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
			
			
			// $this->plugin_dir_path = plugin_dir_path ( __FILE__ );

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
					$this, 'dtLoadPluginTextDomain'
			) );

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/register-shortcodes.php';

			if (class_exists ( 'DTCoreShortcodes' )) {
				$dt_core_shortcodes = new DTCoreShortcodes ();
			}

			// Register Custom Post Types
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';

			if (class_exists ( 'DTCoreCustomPostTypes' )) {
				$dt_core_custom_posts = new DTCoreCustomPostTypes ();
			}

			// Register Privacy
			require_once plugin_dir_path ( __FILE__ ) . '/privacy/register-privacy.php';
			if (class_exists ( 'DTCorePrivacy' )) {
				new DTCorePrivacy();
			}
			
			add_action( 'widgets_init', array( $this, 'dt_widgets_init' ) );
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/widget-twitter.php';
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/widget-flickr.php';
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/widget-recent-posts.php';
			require_once plugin_dir_path ( __FILE__ ) . '/widgets/widget-recent-portfolios.php';
		}

		function dt_widgets_init() {
			register_widget('Maruthi_Twitter');
			register_widget('Maruthi_Flickr');
			register_widget('Maruthi_Recent_Posts');
			register_widget('Maruthi_Portfolio_Widget');
		}

		function plugins_loaded() {

			if( !class_exists( 'Vc_Manager' ) ) {
				add_action ('admin_notices', array( $this, 'vc_plugin_notice' ) );
				return;
			} else {
				// Register Visual Composer Modules
				require_once plugin_dir_path ( __FILE__ ) . '/visual-composer/register-vc.php';
				if (class_exists ( 'DTCoreVC' )) {
					new DTCoreVC ();
				}
			}			
		}

		function vc_plugin_notice() {

			$plugin  = get_plugin_data(__FILE__);

			echo '<div class="updated notice is-dismissible">';
			echo '<p>';
			echo '	<strong>'.$plugin['Name'].'</strong> ';
			echo __('requires','designthemes-core');
			echo '	<strong><a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431" target="_blank"> '.__('Visual Composer','designthemes-core').' </a></strong> ';
			echo __('plugin to be installed and activated on your site','designthemes-core');
			echo '</p>';
			echo '<button type="button" class="notice-dismiss">';
			echo '	<span class="screen-reader-text">'.__('Dismiss this notice.','designthemes-core').'</span>';
			echo '	</button>';
			echo '</div>';
		}

		/**
		 * To load text domain
		 */
		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'designthemes-core', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
			// Register Likes
			require_once plugin_dir_path ( __FILE__ ) . '/register-likes.php';
		}

		/**
		 */
		public static function dtCorePluginActivate() {
			if( ! function_exists('maruthi_cs_get_option') ){
				wp_die( sprintf( esc_html__('Please make sure %s theme is activated.', 'designthemes-core'), THEME_NAME ) );
			}

		}

		/**
		 */
		public static function dtCorePluginDectivate() {
		}		
	}
}

if (class_exists ( 'DTCorePlugin' )) {

	register_activation_hook ( __FILE__, array (
			'DTCorePlugin',
			'dtCorePluginActivate' 
	) );
	register_deactivation_hook ( __FILE__, array (
			'DTCorePlugin',
			'dtCorePluginDectivate' 
	) );
	
	$dt_core_plugin = new DTCorePlugin ();
}
?>