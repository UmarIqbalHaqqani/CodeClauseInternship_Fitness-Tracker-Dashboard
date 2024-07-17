<?php
if (! class_exists ( 'DTMegaMenuPostType' ) ) {

	class DTMegaMenuPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt' ) );

			add_action( 'current_screen', array( $this, 'dt_current_screen' ) );
            
			add_filter( 'maruthi_vc_default_cpt', array( $this, 'dt_enable_vc' ) );

            add_action( 'admin_print_styles', array( $this, 'dt_admin_print_styles') );

            require_once 'dt-backend-menu-walker.php';
            require_once 'dt-frontend-menu-walker.php';
			require_once 'dt-frontend-header-menu-walker.php';
		}

		function dt_register_cpt() {

			$labels = array (
				'name'				 => __( 'Mega Menus', 'designthemes-core' ),
				'singular_name'		 => __( 'Mega Menu', 'designthemes-core' ),
				'menu_name'			 => __( 'Mega Menus', 'designthemes-core' ),
				'add_new'			 => __( 'Add Mega Menu', 'designthemes-core' ),
				'add_new_item'		 => __( 'Add New Mega Menu', 'designthemes-core' ),
				'edit'				 => __( 'Edit Mega Menu', 'designthemes-core' ),
				'edit_item'			 => __( 'Edit Mega Menu', 'designthemes-core' ),
				'new_item'			 => __( 'New Mega Menu', 'designthemes-core' ),
				'view'				 => __( 'View Mega Menu', 'designthemes-core' ),
				'view_item' 		 => __( 'View Mega Menu', 'designthemes-core' ),
				'search_items' 		 => __( 'Search Mega Menus', 'designthemes-core' ),
				'not_found' 		 => __( 'No Mega Menus found', 'designthemes-core' ),
				'not_found_in_trash' => __( 'No Mega Menus found in Trash', 'designthemes-core' ),
			);

			$args = array (
				'labels' 				=> $labels,
				'public' 				=> true,
				'exclude_from_search'	=> true,
				'publicly_queryable'	=> false,
				'menu_position'			=> 27,
				'menu_icon' 			=> 'dashicons-screenoptions',
				'hierarchical' 			=> false,
				'show_in_rest' 			=> true,
				'supports' 				=> array ( 'title', 'editor','revisions' ),
			);

			register_post_type ( 'dt_mega_menus', $args );			
		}

		function dt_current_screen( $current_screen ) {

			if( $current_screen->id == 'dt_mega_menus' ) {

				if( function_exists( 'vc_disable_frontend' ) ) {

					vc_disable_frontend();
				}
			}
		}

		function dt_enable_vc( $default ) {

			array_push( $default, 'dt_mega_menus' );

			return $default;
		}

        function dt_admin_print_styles() {

            global $pagenow;

            if( $pagenow == 'nav-menus.php' ) {

                echo '<style id="dt-nav-menu">';
                echo 'li.menu-item:not(.menu-item-dt_mega_menus) .field-dt-mega-menu-width, li.menu-item:not(.menu-item-dt_mega_menus) .field-dt-mega-menu-position { display: none; }';
                echo '</style>';
            }
        }
	}
}