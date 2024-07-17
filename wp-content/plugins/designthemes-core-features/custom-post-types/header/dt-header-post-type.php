<?php
if (! class_exists ( 'DTHeaderPostType' ) ) {

	class DTHeaderPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt' ), 5 );

			add_filter( 'maruthi_vc_default_cpt', array( $this, 'dt_enable_vc' ) );

			add_action( 'admin_init', array( $this, 'dt_load_header_modules' ) );
			
			add_action( 'init', array( $this, 'dt_load_shortcodes' ) );			
		}

		function dt_register_cpt() {

			$labels = array (
				'name'				 => __( 'Headers', 'designthemes-core' ),
				'singular_name'		 => __( 'Header', 'designthemes-core' ),
				'menu_name'			 => __( 'Headers', 'designthemes-core' ),
				'add_new'			 => __( 'Add Header', 'designthemes-core' ),
				'add_new_item'		 => __( 'Add New Header', 'designthemes-core' ),
				'edit'				 => __( 'Edit Header', 'designthemes-core' ),
				'edit_item'			 => __( 'Edit Header', 'designthemes-core' ),
				'new_item'			 => __( 'New Header', 'designthemes-core' ),
				'view'				 => __( 'View Header', 'designthemes-core' ),
				'view_item' 		 => __( 'View Header', 'designthemes-core' ),
				'search_items' 		 => __( 'Search Headers', 'designthemes-core' ),
				'not_found' 		 => __( 'No Headers found', 'designthemes-core' ),
				'not_found_in_trash' => __( 'No Headers found in Trash', 'designthemes-core' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'menu_position'			=> 25,
				'menu_icon' 			=> 'dashicons-screenoptions',
				'hierarchical' 			=> false,
				'show_in_rest' 			=> true,
				'supports' 				=> array ( 'title', 'editor','revisions' ),
			);

			register_post_type ( 'dt_headers', $args );
		}

		function dt_enable_vc( $default ) {

			array_push( $default, 'dt_headers' );

			return $default;
		}

		function dt_header_modules() {

			if( ! function_exists( 'vc_map' ) ) {
				return;
			}			
			require_once 'modules/mega-menu.php';
			require_once 'modules/search-form.php';
		}
		
		function dt_load_shortcodes() {
			
			require_once 'shortcodes/base.php';
			require_once 'shortcodes/mega-menu.php';
			require_once 'shortcodes/search-form.php';
		}

		function dt_load_header_modules() {

			global $pagenow;

			if( 'post.php' === $pagenow ) {
				if( isset( $_GET['post'] ) && ( get_post_type( $_GET['post'] ) ==='dt_headers' ) ) {
					$this->dt_header_modules();
				}
			}

			if( ( 'post-new.php' === $pagenow ) && ( isset($_GET['post_type']) === 'dt_headers' ) ) {
				$this->dt_header_modules();
			}			

			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
				$this->dt_header_modules();
			}
		}	
	}
}