<?php
if (! class_exists ( 'DTCoreCustomPostTypes' )) {

	/**
	 *
	 * @author iamdesigning11
	 *        
	 */
	class DTCoreCustomPostTypes {
		
		function __construct() {
			
			// Header Template Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/header/dt-header-post-type.php';
			if( class_exists('DTHeaderPostType') ){
				new DTHeaderPostType();
			}
			
			// Footer Template Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/footer/dt-footer-post-type.php';
			if( class_exists('DTFooterPostType') ){
				new DTFooterPostType();
			}

			// Mega Menu Template Post Type
			require_once plugin_dir_path ( __FILE__ ) . '/menu/dt-mega-menu-post-type.php';
			if( class_exists('DTMegaMenuPostType') ){
				new DTMegaMenuPostType();
			}
			
			// Portfolio custom post type
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			require_once plugin_dir_path ( __FILE__ ) . '/dt-portfolio-post-type.php';
			if (class_exists ( 'DTPortfolioPostType' )) {
				new DTPortfolioPostType();
			}
			
		}
	}
}
?>