<?php
if (! class_exists ( 'DTEventOrganizersPostType' ) ) {

	class DTEventOrganizersPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt' ) );
			add_action('admin_menu', array( $this, 'dt_event_organizer_menu' ) );
			add_action('admin_head', array( $this, 'dt_set_current_menu' ) );

			add_filter( 'cs_metabox_options', array( $this, 'dt_metabox_options' ) );
		}

		function dt_register_cpt() {

			$labels = array(
				'name' => __('Organizers', 'dt-woo' ),
				'singular_name' => __('Organizer', 'dt-woo' ),
				'menu_name' => __('Organizers', 'dt-woo' ),
				'add_new' => __('Add Organizer', 'dt-woo' ),
				'add_new_item' => __('Add New Organizer', 'dt-woo' ),
				'edit' => __('Edit Organizer', 'dt-woo' ),
				'edit_item' => __('Edit Organizer', 'dt-woo' ),
				'new_item' => __('New Organizer', 'dt-woo' ),
				'view' => __('View Organizer', 'dt-woo' ),
				'view_item' => __('View Organizer', 'dt-woo' ),
				'search_items' => __('Search Organizers', 'dt-woo' ),
				'not_found' => __('No Organizers found', 'dt-woo' ),
				'not_found_in_trash' => __('No Organizers found in Trash', 'dt-woo' ),
			);

			$args = array(
				'label'				  => __('Organizers', 'dt-woo' ),  
				'labels' 			  => $labels,
				'supports' 			  => array('title', 'editor', 'thumbnail' ),
				'hierarchical' 		  => false,
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => false,				
				'show_in_admin_bar'   => false,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,		
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page'			
			);

			register_post_type('dt_event_organizer', $args );
		}

		function dt_event_organizer_menu() {

			add_submenu_page( 'edit.php?post_type=dt_event',
				esc_html__( 'Organizers', 'dt-woo' ),
				esc_html__( 'Organizers', 'dt-woo' ),
				'manage_options',
				'edit.php?post_type=dt_event_organizer'
			);
		}

		function dt_set_current_menu() {

			global $submenu_file, $parent_file, $current_screen, $pagenow;

			if( !is_null( $current_screen ) ) {

				$post_type = $current_screen->post_type;

				if( $post_type == 'dt_event_organizer' ) {

					$parent_file = 'edit.php?post_type=dt_event';

					if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {

						$submenu_file = 'edit.php?post_type='.$post_type;
					}
				}
			}
		}

		function dt_metabox_options( $options ) {

			$options[] = array(
				'id'		=> '_custom_settings',
				'title'     => esc_html__('Organizer Options', 'dt-event-manager'),
				'post_type' => 'dt_event_organizer',
				'context'   => 'normal',
				'priority'  => 'default',
				'sections'  => array(

					# General 
					array(
						'name'  => 'general_section',
						'title' => esc_html__('General', 'dt-event-manager'),
						'icon'  => 'fa fa-cogs',
						'fields' => array(

							array(
								'id'      => 'enable-sub-title',
								'type'    => 'switcher',
								'title'   => esc_html__('Show Breadcrumb', 'dt-event-manager' ),
								'default' => true
							),

							array(
								'id'	  => 'breadcrumb_position',
								'type'    => 'select',
								'title'   => esc_html__('Position', 'dt-event-manager' ),
								'options' => array(
									'behild-header'    => esc_html__('Behind the Header','dt-event-manager'),
									'below-header' 	   => esc_html__('Below the Header','dt-event-manager'),
								),
								'default'    => 'below-header',
								'dependency'  => array( 'enable-sub-title', '==', 'true' ),
							),

							array(
								'id'    => 'breadcrumb_background',
								'type'  => 'background',
								'title' => esc_html__('Background', 'dt-event-manager'),
								'desc'  => esc_html__('Choose background options for breadcrumb title section.', 'dt-event-manager'),
								'dependency'   => array( 'enable-sub-title', '==', 'true' ),
							),

							array(
								'id'		=> 'layout',
								'type'      => 'image_select',
								'title'     => esc_html__('Layout', 'dt-event-manager'),
								'options'	=> array(
									'with-out-sidebar'   => plugins_url('dt-event-manager') .'/images/admin/without-sidebar.png',
									'with-left-sidebar'    => plugins_url('dt-event-manager') .'/images/admin/left-sidebar.png',
									'with-right-sidebar'   => plugins_url('dt-event-manager') .'/images/admin/right-sidebar.png',
								),
								'default'      => 'with-out-sidebar',
								'attributes'   => array( 'data-depend-id' => 'layout', ),
							),

							array(
								'id'  		 => 'show-standard-sidebar-left',
								'type'  		 => 'switcher',
								'title' 		 => esc_html__('Show Standard Left Sidebar', 'dt-event-manager'),
								'dependency'   => array( 'layout', '==', 'with-left-sidebar' ),
							),

							array(
								'id'  		 => 'widget-area-left',
								'type'  		 => 'select',
								'title' 		 => esc_html__('Choose Widget Area - Left Sidebar', 'dt-event-manager'),
								'class'		 => 'chosen',
								'options'   	 => dt_event_custom_widgets(),
								'attributes'   => array(
									'multiple'  	   => 'multiple',
									'data-placeholder' => esc_attr__('Select Widget Areas', 'dt-event-manager'),
									'style' 		   => 'width: 400px;'
								),
								'dependency'   => array( 'layout', '==', 'with-left-sidebar' ),
							),

							array(
								'id'  		 => 'show-standard-sidebar-right',
								'type'  		 => 'switcher',
								'title' 		 => esc_html__('Show Standard Right Sidebar', 'dt-event-manager'),
								'dependency'   => array( 'layout', '==', 'with-right-sidebar' ),
							),

							array(
								'id'	=> 'widget-area-right',
								'type'	=> 'select',
								'title'	=> esc_html__('Choose Widget Area - Right Sidebar', 'dt-event-manager'),
								'class'	=> 'chosen',
								'options'	=> dt_event_custom_widgets(),
								'attributes' => array(
									'multiple'  	   => 'multiple',
									'data-placeholder' => esc_attr__('Select Widget Areas', 'dt-event-manager'),
									'style' 		   => 'width: 400px;'
								),
								'dependency'   => array( 'layout', '==', 'with-right-sidebar' ),
							),
						)
					),

					# Organizer Info
					array(
						'name'  => 'organizer_section',
						'title' => esc_html__('Organizer Info', 'dt-event-manager'),
						'icon'  => 'fa fa-angle-double-right',
						'fields' =>  array(

							array(
								'id'		=> 'phone-no',
								'type'		=> 'text',
								'title'		=> esc_html__('Phone Number', 'dt-event-manager'),
							),

							array(
								'id'		=> 'website',
								'type'		=> 'text',
								'title'		=> esc_html__('Website URL', 'dt-event-manager'),
							),

							array(
								'id'		=> 'email-id',
								'type'		=> 'text',
								'title'		=> esc_html__('Email', 'dt-event-manager'),
							),														
						)
					),
				)
			);

			return $options;
		}		

	}
}