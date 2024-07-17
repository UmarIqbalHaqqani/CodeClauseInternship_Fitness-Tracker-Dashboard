<?php
if (! class_exists ( 'DTClassPostType' )) {
	class DTClassPostType {

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

			// Add Hook into the 'template_include' filter
			add_filter ( 'template_include', array (
				$this,
				'dt_template_include'
			) );

			add_filter ( 'cs_metabox_options', array (
				$this,
				'dt_class_cs_metabox_options'
			) );

			add_filter ( 'cs_framework_options', array (
				$this,
				'dt_class_cs_framework_options'
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
			
			add_filter ( "manage_edit-dt_class_columns", array (
				$this,
				"dt_class_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
				$this,
				"dt_class_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {
			$postslug	 	= 'dt_class';								$taxslug  	  = 'class_entries';
			$singular_name  = __('Class', 'designthemes-class'); 				$plural_name  = __('Classes', 'designthemes-class');
			$tax_sname 		= __( 'Category','designthemes-class' );	$tax_pname    = __( 'Categories','designthemes-class' );

			if( function_exists( 'maruthi_cs_get_option' ) ) :
				$postslug 		=	maruthi_cs_get_option( 'single-class-slug', 'dt_class' );
				$taxslug  		=	maruthi_cs_get_option( 'class-category-slug', 'class_entries' );
				$singular_name  =	maruthi_cs_get_option( 'singular-class-name', __('Class', 'designthemes-class') );
				$plural_name	=	maruthi_cs_get_option( 'plural-class-name', __('Classes', 'designthemes-class') );
				$tax_sname	  	=	maruthi_cs_get_option( 'singular-class-tax-name', __('Category', 'designthemes-class') );
				$tax_pname		=	maruthi_cs_get_option( 'plural-class-tax-name', __('Categories', 'designthemes-class') );
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
						'editor',
						'excerpt',
						'revisions',
						'thumbnail'
					),

					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 10,
					'menu_icon' => 'dashicons-book-alt',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $postslug ),
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_class', $args );

			$labels = array(
				'name'              => 	$tax_pname,
				'singular_name'     => 	$tax_sname,
				'search_items'      => 	__( 'Search ', 'designthemes-class' ) . $tax_pname,
				'all_items'         => 	__( 'All ', 'designthemes-class' ) . $tax_pname,
				'parent_item'       => 	__( 'Parent ', 'designthemes-class' ) . $tax_sname,
				'parent_item_colon' => 	__( 'Parent ', 'designthemes-class' ) . $tax_sname . ':',
				'edit_item'         => 	__( 'Edit ', 'designthemes-class' ) . $tax_sname,
				'update_item'       => 	__( 'Update ', 'designthemes-class' ) . $tax_sname,
				'add_new_item'      => 	__( 'Add New ', 'designthemes-class' ) . $tax_sname,
				'new_item_name'     => 	__( 'New ', 'designthemes-class') . $tax_sname . __(' Name', 'designthemes-class' ),
				'menu_name'         => 	$tax_pname
			);

			register_taxonomy ( 'class_entries', array (
				'dt_class' 
			), array (
				'hierarchical' 		=> 	true,
				'labels' 			=> 	$labels,
				'show_ui'           => 	true,
				'show_admin_column' => 	true,
				'rewrite' 			=> 	array( 'slug' => $taxslug ),
				'query_var' 		=> 	true 
			) );
		}

		function dt_class_cs_metabox_options( $options ) {

			$cptitle = maruthi_cs_get_option( 'singular-class-name', esc_html__('Class', 'designthemes-class') );
			$fields = cs_get_option( 'class-custom-fields');
			$bothfields = $fielddef = $x = array();
			$before = '';

			if(!empty($fields)) :

				$i = 1;
				foreach($fields as $field):
					$x['id'] = 'class_opt_flds_title_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Title';
					$x['attributes'] = array( 'style' => 'background-color: #f0eff9;' );
					$bothfields[] = $x;
					unset($x);
			
					$x['id'] = 'class_opt_flds_value_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Value';
					$bothfields[] = $x;
			
					$fielddef['class_opt_flds_title_'.$i] = $field['class-custom-fields-text'];
			
					$i++;
				endforeach;
			else:
				$before = '<span>'.esc_html__('Go to options panel add few custom fields, then return back here.', 'designthemes-class').'</span>';
			endif;
			
			$options[]    = array(
			  'id'        => '_custom_settings',
			  'title'     => "Custom {$cptitle} Options",
			  'post_type' => 'dt_class',
			  'context'   => 'normal',
			  'priority'  => 'default',
			  'sections'  => array(
			
				array(
				  'name'  => 'general_section',
				  'title' => esc_html__('General Options', 'designthemes-class'),
				  'icon'  => 'fa fa-cogs',

				  'fields' => array(

					array(
						'id'      => 'enable-sub-title',
						'type'    => 'switcher',
						'title'   => esc_html__('Show Breadcrumb', 'designthemes-class' ),
						'default' => true
					),

					array(
						'id'	  => 'breadcrumb_position',
						'type'    => 'select',
						'title'   => esc_html__('Position', 'maruthi' ),
						'options' => array(
							'header-top-absolute'    => esc_html__('Behind the Header','designthemes-class'),
							'header-top-relative' 	   => esc_html__('Default','designthemes-class'),
						),
						'default'    => 'header-top-relative',
						'dependency'  => array( 'enable-sub-title', '==', 'true' ),
					),

					array(
					  'id'    => 'breadcrumb_background',
					  'type'  => 'background',
					  'title' => esc_html__('Background', 'designthemes-class'),
					  'desc'  => esc_html__('Choose background options for breadcrumb title section.', 'designthemes-class'),
					  'dependency'   => array( 'enable-sub-title', '==', 'true' ),
					),

					array(
					  'id'      	 => 'layout',
					  'type'         => 'image_select',
					  'title'        => esc_html__('Layout', 'designthemes-class'),
					  'options'      => array(
						'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
						'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
						'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					  ),
					  'default'      => 'content-full-width',
					  'attributes'   => array(
						'data-depend-id' => 'layout',
					  ),
					),

					array(
					  'id'  		 => 'show-standard-sidebar-left',
					  'type'  		 => 'switcher',
					  'title' 		 => esc_html__('Show Standard Left Sidebar', 'designthemes-class'),
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'widget-area-left',
					  'type'  		 => 'select',
					  'title' 		 => esc_html__('Choose Widget Area - Left Sidebar', 'designthemes-class'),
					  'class'		 => 'chosen',
					  'options'   	 => maruthi_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => esc_attr__('Select Widget Areas', 'designthemes-class'),
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'show-standard-sidebar-right',
					  'type'  		 => 'switcher',
					  'title' 		 => esc_html__('Show Standard Right Sidebar', 'designthemes-class'),
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),
					
					array(
					  'id'  		 => 'widget-area-right',
					  'type'  		 => 'select',
					  'title' 		 => esc_html__('Choose Widget Area - Right Sidebar', 'designthemes-class'),
					  'class'		 => 'chosen',
					  'options'   	 => maruthi_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => esc_attr__('Select Widget Areas', 'designthemes-class'),
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),

					array(
					  'id'         => 'class-time',
					  'type'       => 'text',
					  'title'      => esc_html__('Date & Time', 'designthemes-class'),
					  'info' 	   => esc_attr__('You can given class time here. eg: Nov.05 2018, 10.00 - 12.00', 'designthemes-class'),
					),

					array(
					  'id'          => 'class-trainers',
					  'type'        => 'select',
					  'title'       => esc_html__('Trainers', 'designthemes-class'),
					  'options'     => 'posts',
					  'query_args'  => array(
						'post_type' => 'dt_trainer',
					  ),
					  'class'       => 'chosen',
					  'attributes'  => array(
						'multiple'  => 'only-key',
						'style'     => 'width: 340px;'
					  ),
					  'info'        => esc_html__('Choose any trainers for this class.', 'designthemes-booking')
					),

				  ), // end: fields
				), // end: a section

				array(
				  'name'  => 'optional_section',
				  'title' => esc_html__('Optional Fields', 'designthemes-class'),
				  'icon'  => 'fa fa-plug',
			
				  'fields' => array(
			
					array(
					  'id'        => 'class_opt_flds',
					  'type'      => 'fieldset',
					  'title'     => esc_html__('Optional Fields', 'designthemes-class'),
					  'fields'    => $bothfields,
					  'default'   => $fielddef,
					  'before' 	  => $before
					),
			
				  ), // end: fields
				), // end: a section
			
			  ),
			);

			return $options;
		}

		function dt_class_cs_framework_options( $options ) {

			$cptitle = maruthi_cs_get_option( 'singular-class-name', esc_html__('Class', 'designthemes-class') );

			$options[]      = array(
			  'name'        => 'classes',
			  'title'       => esc_html__('Classes', 'designthemes-class'),
			  'icon'        => 'fa fa-book',

			  'fields'      => array(

				// -----------------------------------
				// a option sub section for layouts  -
				// -----------------------------------
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( "$cptitle Category Archives Page Layout", 'designthemes-class' ),
				),

				array(
				  'id'      	 => 'class-archives-page-layout',
				  'type'         => 'image_select',
				  'title'        => esc_html__('Layout', 'designthemes-class'),
				  'options'      => array(
					'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				  ),
				  'default'      => 'content-full-width',
				  'attributes'   => array(
					'data-depend-id' => 'class-archives-page-layout',
				  ),
				),

				array(
				  'id'  		 => 'show-standard-left-sidebar-for-class_entries',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Standard Left Sidebar', 'designthemes-class'),
				  'dependency'   => array( 'class-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
				),

				array(
				  'id'  		 => 'show-standard-right-sidebar-for-class_entries',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Standard Right Sidebar', 'designthemes-class'),
				  'dependency'   => array( 'class-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
				),

				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( "$cptitle Category Archives Post Layout", 'designthemes-class' ),
				),

				array(
				  'id'      	 => 'class-archives-post-layout',
				  'type'         => 'image_select',
				  'title'        => esc_html__('Post Layout', 'designthemes-class'),
				  'options'      => array(
					'one-third-column'  => MARUTHI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
					'one-fourth-column' => MARUTHI_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
				  ),
				  'default'      => 'one-third-column',
				),

				array(
				  'id'           => 'class-archives-post-style',
				  'type'         => 'select',
				  'title'        => esc_html__('Post Style', 'designthemes-class'),
				  'options'      => array(
					'style-1'      => esc_html__('Style - 1', 'designthemes-class'),
					'style-2'      => esc_html__('Style - 2', 'designthemes-class'),
					'style-3'      => esc_html__('Style - 3', 'designthemes-class'),
					'style-4'      => esc_html__('Style - 4', 'designthemes-class')
				  ),
				  'class'        => 'chosen',
				  'default'      => 'style-1',
				  'info'       	 => esc_html__('Choose style of class to display on archive page.', 'designthemes-class')
				),

				// ----------------------------------------
				// a option sub section for custom fiels  -
				// ----------------------------------------
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( "$cptitle Custom Fields", 'designthemes-class' ),
				),
			
				array(
				  'id'              => 'class-custom-fields',
				  'type'            => 'group',
				  'title'           => esc_html__('Custom Fields', 'designthemes-class'),
				  'info'            => esc_html__('Click button to add custom fields', 'designthemes-class'),
				  'button_title'    => esc_html__('Add New Field', 'designthemes-class'),
				  'accordion_title' => esc_html__('Adding New Custom Field', 'designthemes-class'),
				  'fields'          => array(
					array(
					  'id'          => 'class-custom-fields-text',
					  'type'        => 'text',
					  'title'       => esc_html__('Enter Text', 'designthemes-class'),
					),
				  )
				),
				
				// ----------------------------------------
				// a option sub section for permalinks    -
				// ----------------------------------------
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Permalinks', 'designthemes-class' ),
				),

				array(
				  'id'      => 'single-class-slug',
				  'type'    => 'text',
				  'title'   => esc_html__('Single Class slug', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. class-item ', 'designthemes-class').'<br> <b>'.esc_html__('After made changes save permalinks.', 'designthemes-class').'</b></p>',
				),

				array(
				  'id'      => 'class-category-slug',
				  'type'    => 'text',
				  'title'   => esc_html__('Class Category slug', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. class-types ', 'designthemes-class').' <br> <b>'.esc_html__('After made changes save permalinks.', 'designthemes-class').'</b></p>',
				),

				array(
				  'id'      => 'singular-class-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Singular Class Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Class", save options & reload.', 'designthemes-class').'</p>',
				),

				array(
				  'id'      => 'plural-class-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Plural Class Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Classes". save options & reload.', 'designthemes-class').'</p>',
				),

				array(
				  'id'      => 'singular-class-tax-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Singular Class Category Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Category". save options & reload.', 'designthemes-class').'</p>',
				),

				array(
				  'id'      => 'plural-class-tax-name',
				  'type'    => 'text',
				  'title'   => esc_html__('Plural Class Category Name', 'designthemes-class'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('By default "Categories". save options & reload.', 'designthemes-class').'</p>',
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
		function dt_class_edit_columns($columns) {
			
			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_class_thumb" => __("Image", "designthemes-class"),
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
		function dt_class_columns_display($columns, $id) {
			global $post;
			
			switch ($columns) {

				case "dt_class_thumb" :
				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo !empty($image) ? $image : '';
					endif;
				break;
			}
		}

		/**
		 * To load class pages in front end
		 *
		 * @param string $template        	
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_class' )) {
				if (! file_exists ( get_template_directory () . '/single-dt_class.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_class.php';
				}
			} elseif (is_tax ( 'class_entries' )) {
				if (! file_exists ( get_template_directory () . '/taxonomy-class_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-class_entries.php';
				}
			}
			return $template;
		}
	}
}
?>