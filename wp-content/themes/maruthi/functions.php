<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */
define( 'MARUTHI_THEME_DIR', get_template_directory() );
define( 'MARUTHI_THEME_URI', get_template_directory_uri() );
define( 'MARUTHI_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'MARUTHI_THEME_NAME', $themeData->get('Name'));
	define( 'MARUTHI_THEME_VERSION', $themeData->get('Version'));
endif;

/* ---------------------------------------------------------------------------
 * Loads Kirki
 * ---------------------------------------------------------------------------*/
require_once( MARUTHI_THEME_DIR .'/kirki/index.php' );

/* ---------------------------------------------------------------------------
 * Loads Codestar
 * ---------------------------------------------------------------------------*/
require_once MARUTHI_THEME_DIR .'/cs-framework/cs-framework.php';

if( !defined( 'CS_ACTIVE_TAXONOMY' ) ) { define( 'CS_ACTIVE_TAXONOMY',   false ); }
define( 'CS_ACTIVE_SHORTCODE',  false );
define( 'CS_ACTIVE_CUSTOMIZE',  false );

/* ---------------------------------------------------------------------------
 * Create function to get theme options
 * --------------------------------------------------------------------------- */
function maruthi_cs_get_option($key, $value = '') {

	$v = cs_get_option( $key );

	if ( !empty( $v ) ) {
		return $v;
	} else {
		return $value;
	}
}

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------*/ 
define( 'MARUTHI_LANG_DIR', MARUTHI_THEME_DIR. '/languages' );
load_theme_textdomain( 'maruthi', MARUTHI_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Style
 * ---------------------------------------------------------------------------*/
function maruthi_admin_scripts() {
	wp_enqueue_style('maruthi-admin', MARUTHI_THEME_URI .'/cs-framework-override/style.css');
}
add_action( 'admin_enqueue_scripts', 'maruthi_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------*/

// Functions --------------------------------------------------------------------
require_once( MARUTHI_THEME_DIR .'/framework/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( MARUTHI_THEME_DIR .'/framework/register-head.php' );

// Hooks ------------------------------------------------------------------------
require_once( MARUTHI_THEME_DIR .'/framework/register-hooks.php' );

// Post Functions ---------------------------------------------------------------
require_once( MARUTHI_THEME_DIR .'/framework/register-post-functions.php' );
new maruthi_post_functions;

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'maruthi_widgets_init' );
function maruthi_widgets_init() {
	require_once( MARUTHI_THEME_DIR .'/framework/register-widgets.php' );
}

// Plugins ---------------------------------------------------------------------- 
require_once( MARUTHI_THEME_DIR .'/framework/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) && ! class_exists ( 'DTWooPlugin' ) ){
	require_once( MARUTHI_THEME_DIR .'/framework/register-woocommerce.php' );
}

// WP Store Locator -------------------------------------------------------------
if( class_exists( 'WP_Store_locator' ) ){
	require_once( MARUTHI_THEME_DIR .'/framework/register-storelocator.php' );
}

// Register Gutenberg -----------------------------------------------------------
require_once( MARUTHI_THEME_DIR .'/framework/register-gutenberg-editor.php' );