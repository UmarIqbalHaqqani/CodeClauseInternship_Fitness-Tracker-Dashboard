<?php
if (! class_exists ( 'DTTrainerPostType' )) {
	class DTTrainerPostType {

		/**
		 * A function constructor calls initially
		 */
		function __construct() {

			// Add Hook into the 'init()' action
			add_action ( 'init', array (
				$this,
				'dt_init'
			) );

			// Add Hook into the 'admin_init()' action
			add_action ( 'admin_init', array (
				$this,
				'dt_admin_init'
			) );

			add_filter ( 'cs_metabox_options', array (
				$this,
				'dt_trainer_cs_metabox_options'
			) );
			
			add_filter ( 'cs_framework_options', array (
				$this,
				'dt_trainer_cs_framework_options'
			) );
		}

		/**
		 * A function hook that the WordPress core launches at 'init' points
		 */
		function dt_init() {
			$this->createPostType ();
		}

		/**
		 * A function hook that the WordPress core launches at 'admin_init' points
		 */
		function dt_admin_init() {

			add_filter ( "manage_edit-dt_trainer_columns", array (
				$this,
				"dt_trainer_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_trainer_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {
			$singular_name  = __('Trainer', 'designthemes-class');
			$plural_name  = __('Trainers', 'designthemes-class');

			if( function_exists( 'maruthi_cs_get_option' ) ) :
				$singular_name  =	maruthi_cs_get_option( 'singular-trainer-name', __('Trainer', 'designthemes-class') );
				$plural_name	=	maruthi_cs_get_option( 'plural-trainer-name', __('Trainers', 'designthemes-class') );
			endif;

			$labels = array (
					'name'				=> 	$plural_name,
					'all_items' 		=> 	__ ( 'All ', 'designthemes-class' ) . $plural_name,
					'singular_name' 	=> 	$singular_name,
					'add_new' 			=> 	__ ( 'Add New', 'designthemes-class' ),
					'add_new_item' 		=> 	__ ( 'Add New ', 'designthemes-class' ) . $singular_name,
					'edit_item' 		=> 	__ ( 'Edit ', 'designthemes-class' ) . $singular_name,
					'new_item' 			=> 	__ ( 'New ', 'designthemes-class' ) . $singular_name,
					'view_item' 		=> 	__ ( 'View ', 'designthemes-class' ) . $singular_name,
					'search_items' 		=>	__ ( 'Search ', 'designthemes-class' ) . $plural_name,
					'not_found' 		=> 	__ ( 'No ', 'designthemes-class' ) . $plural_name . __ ( ' found', 'designthemes-class' ),
					'not_found_in_trash' => __ ( 'No ', 'designthemes-class' ) . $plural_name . __ ( ' found in Trash', 'designthemes-class' ),
					'parent_item_colon' => 	__ ( 'Parent ', 'designthemes-class' ) . $singular_name . ':',
					'menu_name' 		=> 	$plural_name
			);

			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => __( 'This is custom post type ', 'designthemes-class' ) . $plural_name,
					'supports' => array (
						'title',
						'excerpt',
						'thumbnail'
					),

					'public' => true,
					'show_ui' => true,
					'show_in_menu' => 'edit.php?post_type=dt_class',
					'menu_position' => 10,
					'menu_icon' => 'dashicons-businessman',					
					'show_in_nav_menus' => false,
					'publicly_queryable' => false,
					'exclude_from_search' => true,
					'has_archive' => false,
					'query_var' => false,
					'can_export' => true,
					'rewrite' => array( 'slug' => 'dt_trainer' ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_trainer', $args );
		}

		function dt_trainer_cs_metabox_options( $options ) {

			$cptitle = maruthi_cs_get_option( 'singular-trainer-name', esc_html__('Trainer', 'designthemes-class') );

			$options[]    = array(
			  'id'        => '_custom_settings',
			  'title'     => "Custom {$cptitle} Options",
			  'post_type' => 'dt_trainer',
			  'context'   => 'normal',
			  'priority'  => 'default',
			  'sections'  => array(
			
				array(
				  'name'  => 'general_section',
				  'title' => esc_html__('General Options', 'designthemes-class'),
				  'icon'  => 'fa fa-cogs',

				  'fields' => array(

					array(
					  'id'         => 'role',
					  'type'       => 'text',
					  'title'      => esc_html__('Role', 'designthemes-class'),
					  'info' 	   => esc_attr__('You can given role here. eg: Gym Trainer', 'designthemes-class'),
					),

					array(
					  'id'         => 'profile_url',
					  'type'       => 'text',
					  'title'      => esc_html__('Profile URL', 'designthemes-class'),
					  'info' 	   => esc_attr__('You can given profile url here.', 'designthemes-class'),
					),

					array(
					  'id'         => 'social_links',
					  'type'       => 'textarea',
					  'title'      => esc_html__('Social Links', 'designthemes-class'),
					  'info' 	   => esc_attr__('You can given sociable shortcode here.', 'designthemes-class'),
					  'default'    => '[dt_sc_social dribble="" flickr="" twitter="" facebook="" youtube="" /]',
					),

					array(
					  'id'              => 'trainer-time-schedule',
					  'type'            => 'group',
					  'title'           => esc_html__('Time Schedule', 'designthemes-class'),
					  'info'            => esc_html__('Click button to add time schedule', 'designthemes-class'),
					  'button_title'    => esc_html__('Add New Time', 'designthemes-class'),
					  'accordion_title' => esc_html__('Adding New Time Schedule', 'designthemes-class'),
					  'fields'          => array(
						array(
						  'id'          => 'trainer-time-schedule-date',
						  'type'        => 'text',
						  'title'       => esc_html__('Enter Date', 'designthemes-class'),
						  'attributes'    => array(
							'placeholder' => 'November 04, 2018'
						  )
						),
						array(
						  'id'          => 'trainer-time-schedule-time',
						  'type'        => 'text',
						  'title'       => esc_html__('Enter Date', 'designthemes-class'),
						  'attributes'    => array(
							'placeholder' => '5.30 am to 9.00 am'
						  )
						),
					  )
					),

				  ), // end: fields
				), // end: a section

			  ),
			);

			return $options;
		}

		function dt_trainer_cs_framework_options( $options ) {

			$cptitle = maruthi_cs_get_option( 'singular-trainer-name', esc_html__('Trainer', 'designthemes-class') );

			$options[]      = array(
			  'name'        => 'trainers',
			  'title'       => esc_html__('Trainers', 'designthemes-class'),
			  'icon'        => 'fa fa-user',

			  'fields'      => array(

				// ----------------------------------------
				// a option sub section for permalinks    -
				// ----------------------------------------
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Permalinks', 'designthemes-class' ),
				),

				array(
				  'id'      => 'singular-trainer-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Singular Trainer Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Trainer", save options & reload.', 'designthemes-class').'</p>',
				),

				array(
				  'id'      => 'plural-trainer-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Plural Trainer Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Trainers". save options & reload.', 'designthemes-class').'</p>',
				),

			  ),
			);

			return $options;
		}

		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_trainer_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_trainer_thumb" => __("Image", "designthemes-class"),
				"title" => __("Title", "designthemes-class"),
				"author" => __("Author", "designthemes-class")
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_trainer_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {

				case "dt_trainer_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo !empty($image) ? $image : '';
					endif;
				break;
			}
		}
	}
}
?>