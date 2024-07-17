<?php
if (! class_exists ( 'DTFooterPostType' ) ) {

	class DTFooterPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt' ) );
			add_filter( 'maruthi_vc_default_cpt', array( $this, 'dt_enable_vc' ) );
		}

		function dt_register_cpt() {

			$labels = array (
				'name'				 => __( 'Footers', 'designthemes-core' ),
				'singular_name'		 => __( 'Footer', 'designthemes-core' ),
				'menu_name'			 => __( 'Footers', 'designthemes-core' ),
				'add_new'			 => __( 'Add Footer', 'designthemes-core' ),
				'add_new_item'		 => __( 'Add New Footer', 'designthemes-core' ),
				'edit'				 => __( 'Edit Footer', 'designthemes-core' ),
				'edit_item'			 => __( 'Edit Footer', 'designthemes-core' ),
				'new_item'			 => __( 'New Footer', 'designthemes-core' ),
				'view'				 => __( 'View Footer', 'designthemes-core' ),
				'view_item' 		 => __( 'View Footer', 'designthemes-core' ),
				'search_items' 		 => __( 'Search Footers', 'designthemes-core' ),
				'not_found' 		 => __( 'No Footers found', 'designthemes-core' ),
				'not_found_in_trash' => __( 'No Footers found in Trash', 'designthemes-core' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'show_in_nav_menus' 	=> false,
				'menu_position'			=> 26,
				'menu_icon' 			=> 'dashicons-screenoptions',
				'hierarchical' 			=> false,
				'show_in_rest' 			=> true,
				'supports' 				=> array ( 'title', 'editor','revisions' ),
			);

			register_post_type ( 'dt_footers', $args );			
		}

		function dt_enable_vc( $default ) {

			array_push( $default, 'dt_footers' );

			return $default;
		}
	}
}