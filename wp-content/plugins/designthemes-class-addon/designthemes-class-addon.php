<?php
/*
 * Plugin Name:	DesignThemes Class Addon
 * URI: 		http://wedesignthemes.com/plugins/designthemes-doctor-addon
 * Description: A simple wordpress plugin designed to implements <strong>classes features of DesignThemes</strong> 
 * Version: 	1.5
 * Author: 		DesignThemes
 * Text Domain: designthemes-class
 * Author URI:	http://themeforest.net/user/designthemes
 */
if (! class_exists ( 'DTClassAddon' )) {
	class DTClassAddon {
		
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
			
			add_action ( 'init', array($this, 'dtLoadPluginTextDomain') );
			
			register_activation_hook( __FILE__ , array( $this , 'dtClassAddonActivated' ) );
			register_deactivation_hook( __FILE__ , array( $this , 'dtClassAddonDeactivated' ) );
			
			// Register Class Custom Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/custom-post-types/register-post-types.php';
			if (class_exists('DTClassModuleCustomPostTypes')) {
				new DTClassModuleCustomPostTypes();
			}

			// Register Shortcodes
			require_once plugin_dir_path ( __FILE__ ) . '/shortcodes/shortcodes.php';
			if(class_exists('DTClassShortcodesDefinition')){
				new DTClassShortcodesDefinition();
			}

			// Register Visual Composer
			require_once plugin_dir_path ( __FILE__ ) . '/vc/register-vc.php';
			if(class_exists('DTVCClassModule')){
				new DTVCClassModule();
			}
		}

		function dtLoadPluginTextDomain() {
			load_plugin_textdomain ( 'designthemes-class', false, dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );
		}

		public static function dtClassAddonActivated() {
		}

		public static function dtClassAddonDeactivated() {
		}				
	}
	
	new DTClassAddon();
}?>