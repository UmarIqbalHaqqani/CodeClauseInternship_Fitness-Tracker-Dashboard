<?php
if (! class_exists ( 'DTPortfolioPostType' )) {
	class DTPortfolioPostType {
		
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
				'dt_portfolio_cs_metabox_options' 
			) );

			add_filter ( 'cs_framework_options', array (
				$this,
				'dt_portfolio_cs_framework_options' 
			) );

			add_action( 'wp_enqueue_scripts', array(
				$this,
				'dt_portfolio_wp_enqueue_scripts'
			) );			

			add_filter( 'maruthi_header_footer_default_cpt', array(
				$this,
				'dt_header_footer_metabox_option'
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
			add_filter ( "manage_edit-dt_portfolios_columns", array (
					$this,
					"dt_portfolios_edit_columns" 
			) );
			
			add_action ( "manage_posts_custom_column", array (
					$this,
					"dt_portfolios_columns_display" 
			), 10, 2 );
		}

		/**
		 */
		function createPostType() {

			$portslug = maruthi_cs_get_option( 'single-portfolio-slug', 'dt_portfolios' );
			$taxslug = maruthi_cs_get_option( 'portfolio-category-slug', 'portfolio_entries' );
			$tagslug = maruthi_cs_get_option( 'portfolio-tag-slug', 'portfolio_tags' );

			$labels = array (
					'name' => esc_html__( 'Portfolios', 'designthemes-core' ),
					'all_items' => esc_html__( 'All Portfolios', 'designthemes-core' ),
					'singular_name' => esc_html__( 'Portfolio', 'designthemes-core' ),
					'add_new' => esc_html__( 'Add New', 'designthemes-core' ),
					'add_new_item' => esc_html__( 'Add New Portfolio', 'designthemes-core' ),
					'edit_item' => esc_html__( 'Edit Portfolio', 'designthemes-core' ),
					'new_item' => esc_html__( 'New Portfolio', 'designthemes-core' ),
					'view_item' => esc_html__( 'View Portfolio', 'designthemes-core' ),
					'search_items' => esc_html__( 'Search Portfolios', 'designthemes-core' ),
					'not_found' => esc_html__( 'No Portfolios found', 'designthemes-core' ),
					'not_found_in_trash' => esc_html__( 'No Portfolios found in Trash', 'designthemes-core' ),
					'parent_item_colon' => esc_html__( 'Parent Portfolio:', 'designthemes-core' ),
					'menu_name' => esc_html__( 'Portfolios', 'designthemes-core' ) ,					
			);
			
			$args = array (
					'labels' => $labels,
					'hierarchical' => false,
					'description' => esc_html__( 'This is custom post type portfolios', 'designthemes-core' ),
					'supports' => array (
							'title',
							'editor',
							'excerpt',
							'comments',
							'revisions',
							'thumbnail'
					),

					'public' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'menu_position' => 5,
					'menu_icon' => 'dashicons-format-gallery',
					
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'has_archive' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => array( 'slug' => $portslug ),
					'show_in_rest' => true,
					'capability_type' => 'post'
			);

			register_post_type ( 'dt_portfolios', $args );

			register_taxonomy ( 'portfolio_entries', array (
					'dt_portfolios' 
			), array (
					"hierarchical" => true,
					"label" => esc_html__( "Categories",'designthemes-core' ),
					"singular_label" => esc_html__( "Category",'designthemes-core' ),
					"show_admin_column" => true,
					"rewrite" => array( 'slug' => $taxslug ),
					"show_in_rest" => true,
					"query_var" => true 
			) );

			register_taxonomy ( 'portfolio_tags', array (
				'dt_portfolios'
			), array (
					"label" => esc_html__( "Tags",'designthemes-core' ),
					"singular_label" => esc_html__( "Tag",'designthemes-core' ),
					"show_admin_column" => true,
					"rewrite" => array( 'slug' => $tagslug ),
					"show_in_rest" => true,
					"query_var" => true 
			) );
		}

		/**
		 */
		function dt_portfolio_cs_metabox_options( $options ) {

			$fields = cs_get_option( 'portfolio-custom-fields');
			$bothfields = $fielddef = $x = array();
			$before = '';

			if(!empty($fields)) :

				$i = 1;
				foreach($fields as $field):
					$x['id'] = 'portfolio_opt_flds_title_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Title';
					$x['attributes'] = array( 'style' => 'background-color: #f0eff9;' );
					$bothfields[] = $x;
					unset($x);
			
					$x['id'] = 'portfolio_opt_flds_value_'.$i;
					$x['type'] = 'text';
					$x['title'] = 'Value';
					$bothfields[] = $x;

					$fielddef['portfolio_opt_flds_title_'.$i] = $field['portfolio-custom-fields-text'];

					$i++;
				endforeach;	
			else:
				$before = '<span>'.esc_html__('Go to options panel add few custom fields, then return back here.', 'designthemes-core').'</span>';
			endif;
			
			$options[]    = array(
			  'id'        => '_portfolio_settings',
			  'title'     => esc_html__('Custom Portfolio Options', 'designthemes-core'),
			  'post_type' => 'dt_portfolios',
			  'context'   => 'normal',
			  'priority'  => 'default',
			  'sections'  => array(
			
				array(
					'name'  => 'general_section',
					'title' => esc_html__('General Options', 'designthemes-core'),
					'icon'  => 'fa fa-cogs',
					'fields' => array(

						array(
							'id'      => 'enable-sub-title',
							'type'    => 'switcher',
							'title'   => esc_html__('Show Breadcrumb', 'designthemes-core' ),
							'default' => true
						),

						array(
							'id'	  => 'breadcrumb_position',
							'type'    => 'select',
							'title'   => esc_html__('Position', 'designthemes-core' ),
							'options' => array(
								'header-top-absolute'    => esc_html__('Behind the Header','designthemes-core'),
								'header-top-relative' 	   => esc_html__('Default','designthemes-core'),
							),
							'default'    => 'header-top-relative',
							'dependency'  => array( 'enable-sub-title', '==', 'true' ),
						), 

			
					array(
					  'id'    => 'breadcrumb_background',
					  'type'  => 'background',
					  'title' => esc_html__('Background', 'designthemes-core'),
					  'desc'  => esc_html__('Choose background options for breadcrumb title section.', 'designthemes-core'),
					  'dependency'   => array( 'enable-sub-title', '==', 'true' ),
					),

					array(
					  'id'      	 => 'layout',
					  'type'         => 'image_select',
					  'title'        => esc_html__('Layout', 'designthemes-core'),
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
					  'title' 		 => esc_html__('Show Standard Left Sidebar', 'designthemes-core'),
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'widget-area-left',
					  'type'  		 => 'select',
					  'title' 		 => esc_html__('Choose Widget Area - Left Sidebar', 'designthemes-core'),
					  'class'		 => 'chosen',
					  'options'   	 => maruthi_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => esc_attr__('Select Widget Areas', 'designthemes-core'),
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-left-sidebar' ),
					),

					array(
					  'id'  		 => 'show-standard-sidebar-right',
					  'type'  		 => 'switcher',
					  'title' 		 => esc_html__('Show Standard Right Sidebar', 'designthemes-core'),
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),
					
					array(
					  'id'  		 => 'widget-area-right',
					  'type'  		 => 'select',
					  'title' 		 => esc_html__('Choose Widget Area - Right Sidebar', 'designthemes-core'),
					  'class'		 => 'chosen',
					  'options'   	 => maruthi_custom_widgets(),
					  'attributes'   => array(
					  	'multiple'  	   => 'multiple',
						'data-placeholder' => esc_attr__('Select Widget Areas', 'designthemes-core'),
					    'style' 		   => 'width: 400px;'
					  ),
					  'dependency'   => array( 'layout', 'any', 'with-right-sidebar' ),
					),
					
					array(
					  'id'      	 => 'portfolio-layout',
					  'type'         => 'image_select',
					  'title'        => esc_html__('Portfolio Layout', 'designthemes-core'),
					  'options'      => array(
						'full-width-portfolio'   => MARUTHI_THEME_URI . '/cs-framework-override/images/portfolio-fullwidth.png',
						'with-left-portfolio'    => MARUTHI_THEME_URI . '/cs-framework-override/images/portfolio-with-left-gallery.png',
						'with-right-portfolio'   => MARUTHI_THEME_URI . '/cs-framework-override/images/portfolio-with-right-gallery.png',
					  ),
					  'default'      => 'full-width-portfolio',
					),
					
					array(
					  'id'           => 'masonry-size',
					  'type'         => 'select',
					  'title'        => esc_html__('Masonry Size', 'designthemes-core'),
					  'options'      => array(
									''     => esc_html__('Default', 'designthemes-core'),
						'grid-sizer-1'     => esc_html__('Grid Size 1', 'designthemes-core'),
						'grid-sizer-2'     => esc_html__('Grid Size 2', 'designthemes-core'),
						'grid-sizer-3'     => esc_html__('Grid Size 3', 'designthemes-core'),
						'grid-sizer-4'     => esc_html__('Grid Size 4', 'designthemes-core'),
						'grid-sizer-5'     => esc_html__('Grid Size 5', 'designthemes-core')
					  ),
					  'class'        => 'chosen',
					  'default'      => '',
					  'info'       	 => esc_html__('It works with portfolio infinite shortcode only.', 'designthemes-core')
					),
				  
				  ), // end: fields
				), // end: a section

				array(
				  'name'  => 'gallery_section',
				  'title' => esc_html__('Gallery Options', 'designthemes-core'),
				  'icon'  => 'fa fa-picture-o',
				  
				  'fields' => array(
				  
				array(
					'id'          => 'portfolio-gallery',
					'type'        => 'gallery',
					'title'       => esc_html__('Gallery Images', 'designthemes-core'),
					'desc'        => esc_html__('Simply add images to gallery items.', 'designthemes-core'),
					'add_title'   => esc_html__('Add Images', 'designthemes-core'),
					'edit_title'  => esc_html__('Edit Images', 'designthemes-core'),
					'clear_title' => esc_html__('Remove Images', 'designthemes-core')
				),

				array(
					'id'              => 'portfolio-video',
					'type'            => 'group',
					'title'           => esc_html__('Portfolio Video', 'designthemes-core'),
					'info'            => esc_html__('Click button to add youtube ( https://www.youtube.com/watch?v=7W0fyMQLFoQ ), vimeo video ( https://vimeo.com/46926279 ) links.', 'designthemes-core'),
					'button_title'    => esc_html__('Add New Video', 'designthemes-core'),
					'fields'          => array(
						array(
						'id'          => 'portfolio_video_url',
						'type'        => 'text',
						'title'       => esc_html__('Enter Video Link', 'designthemes-core')
						),
					)
				),

				  ), // end: fields
				), // end: a section

				array(
				  'name'  => 'optional_section',
				  'title' => esc_html__('Optional Fields', 'designthemes-core'),
				  'icon'  => 'fa fa-plug',

				  'fields' => array(

					array(
					  'id'        => 'portfolio_opt_flds',
					  'type'      => 'fieldset',
					  'title'     => esc_html__('Optional Fields', 'designthemes-core'),
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

		/**
		 */
		function dt_portfolio_cs_framework_options( $options ) {
			
			$options[]      = array(
			  'name'        => 'portfolios',
			  'title'       => esc_html__('Portfolios', 'designthemes-core'),
			  'icon'        => 'fa fa-photo',
			
			  'fields'      => array(

				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Detail Options', 'designthemes-core' ),
				),
				
				array(
				  'id'  		 => 'single-portfolio-related',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Related Portfolios', 'designthemes-core'),
				  'label'		 => esc_html__('YES! to show related portfolio items in single portfolio.', 'designthemes-core')
				),
				
				array(
				  'id'           => 'single-portfolio-related-style',
				  'type'         => 'select',
				  'title'        => esc_html__('Style', 'designthemes-core'),
				  'options'      => array(
					'type1'      => esc_html__('Modern Title', 'designthemes-core'),
					'type2'      => esc_html__('Title & Icons Overlay', 'designthemes-core'),
					'type3'      => esc_html__('Title Overlay', 'designthemes-core'),
					'type4'      => esc_html__('Icons Only', 'designthemes-core'),
					'type5'      => esc_html__('Classic', 'designthemes-core'),
					'type6'      => esc_html__('Minimal Icons', 'designthemes-core'),
					'type7'      => esc_html__('Presentation', 'designthemes-core'),
					'type8'      => esc_html__('Girly', 'designthemes-core'),
					'type9'      => esc_html__('Art', 'designthemes-core'),
				  ),
				  'class'        => 'chosen',
				  'default'      => 'type1',
				  'info'       	 => esc_html__('Choose post style to display related portfolio items.', 'designthemes-core'),
				  'dependency'   => array( 'single-portfolio-related', '==', 'true' ),
				),
				
				array(
				  'id'  		 => 'single-portfolio-comments',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Portfolio Comment', 'designthemes-core'),
				  'label'		 => esc_html__('YES! to display comments in single portfolios.', 'designthemes-core'),
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Archives Page Layout', 'designthemes-core' ),
				),
				
				array(
				  'id'      	 => 'portfolio-archives-page-layout',
				  'type'         => 'image_select',
				  'title'        => esc_html__('Page Layout', 'designthemes-core'),
				  'options'      => array(
					'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
					'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
					'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
					'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
				  ),
				  'default'      => 'content-full-width',
				  'attributes'   => array(
					'data-depend-id' => 'portfolio-archives-page-layout',
				  ),
				),
				
				array(
				  'id'  		 => 'show-standard-left-sidebar-for-portfolio-archives',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Standard Left Sidebar', 'designthemes-core'),
				  'dependency'   => array( 'portfolio-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
				),
			
				array(
				  'id'  		 => 'show-standard-right-sidebar-for-portfolio-archives',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Show Standard Right Sidebar', 'designthemes-core'),
				  'dependency'   => array( 'portfolio-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Archives Post Layout', 'designthemes-core' ),
				),
				
				array(
				  'id'      	 => 'portfolio-archives-post-layout',
				  'type'         => 'image_select',
				  'title'        => esc_html__('Post Layout', 'designthemes-core'),
				  'options'      => array(
					'one-half-column'   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
					'one-third-column'  => MARUTHI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
					'one-fourth-column' => MARUTHI_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
				  ),
				  'default'      => 'one-half-column',
				),
				
				array(
				  'id'           => 'portfolio-archives-post-style',
				  'type'         => 'select',
				  'title'        => esc_html__('Style', 'designthemes-core'),
				  'options'      => array(
					'type1'      => esc_html__('Modern Title', 'designthemes-core'),
					'type2'      => esc_html__('Title & Icons Overlay', 'designthemes-core'),
					'type3'      => esc_html__('Title Overlay', 'designthemes-core'),
					'type4'      => esc_html__('Icons Only', 'designthemes-core'),
					'type5'      => esc_html__('Classic', 'designthemes-core'),
					'type6'      => esc_html__('Minimal Icons', 'designthemes-core'),
					'type7'      => esc_html__('Presentation', 'designthemes-core'),
					'type8'      => esc_html__('Girly', 'designthemes-core'),
					'type9'      => esc_html__('Art', 'designthemes-core')
				  ),
				  'class'        => 'chosen',
				  'default'      => 'type1',
				  'info'       	 => esc_html__('Choose post style to display archive page portfolio items.', 'designthemes-core')
				),
				
				array(
				  'id'  		 => 'portfolio-allow-grid-space',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Allow Grid Space', 'designthemes-core'),
				  'label'		 => esc_html__('YES! to allow grid space', 'designthemes-core')
				),

				array(
				  'id'  		 => 'portfolio-allow-full-width',
				  'type'  		 => 'switcher',
				  'title' 		 => esc_html__('Allow Full Width', 'designthemes-core'),
				  'label'		 => esc_html__('YES! to allow full width', 'designthemes-core')
				),

				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Portfolio Custom Fields', 'designthemes-core' ),
				),

				array(
				  'id'              => 'portfolio-custom-fields',
				  'type'            => 'group',
				  'title'           => esc_html__('Custom Fields', 'designthemes-core'),
				  'info'            => esc_html__('Click button to add custom fields like name, url and date etc', 'designthemes-core'),
				  'button_title'    => esc_html__('Add New Field', 'designthemes-core'),
				  'accordion_title' => esc_html__('Adding New Custom Field', 'designthemes-core'),
				  'fields'          => array(
					array(
					  'id'          => 'portfolio-custom-fields-text',
					  'type'        => 'text',
					  'title'       => esc_html__('Enter Text', 'designthemes-core')
					),
				  )
				),
				
				array(
				  'type'    => 'subheading',
				  'content' => esc_html__( 'Permalinks', 'designthemes-core' ),
				),
				
				array(
				  'id'      => 'single-portfolio-slug',
				  'type'    => 'text',
				  'title'   => esc_html__('Single Portfolio Slug', 'designthemes-core'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. portfolio-item ', 'designthemes-core').'<br> <b>'.esc_html__('After made changes save permalinks.', 'designthemes-core').'</b></p>',
				),
				
				array(
				  'id'      => 'portfolio-category-slug',
				  'type'    => 'text',
				  'title'   => esc_html__('Portfolio Category Slug', 'designthemes-core'),
				  'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. portfolio-types ', 'designthemes-core').'<br> <b>'.esc_html__('After made changes save permalinks.', 'designthemes-core').'</b></p>',
				),

				array(
					'id'      => 'portfolio-tag-slug',
					'type'    => 'text',
					'title'   => esc_html__('Portfolio Tag Slug', 'designthemes-core'),
					'after' 	=> '<p class="cs-text-info">'.esc_html__('Do not use characters not allowed in links. Use, eg. portfolio-tags ', 'designthemes-core').'<br> <b>'.esc_html__('After made changes save permalinks.', 'designthemes-core').'</b></p>',
					),

			  ),
			);

			return $options;
		}

		function dt_portfolio_wp_enqueue_scripts() {
			wp_enqueue_script ( 'dt-sc-portfolio-custom-script', plugin_dir_url ( __FILE__ ) . 'js/protfolio-custom.js', array ('jquery'), false, true );
		}

		/**
		 *
		 * @param unknown $columns        	
		 * @return multitype:
		 */
		function dt_portfolios_edit_columns($columns) {

			$newcolumns = array (
				"cb" => "<input type=\"checkbox\" />",
				"dt_portfolio_thumb" => esc_html__("Image", 'designthemes-core'),
				"title" => esc_html__("Title", 'designthemes-core'),
				"author" => esc_html__("Author", 'designthemes-core')
			);
			$columns = array_merge ( $newcolumns, $columns );
			return $columns;
		}

		/**
		 *
		 * @param unknown $columns
		 * @param unknown $id
		 */
		function dt_portfolios_columns_display($columns, $id) {
			global $post;

			switch ($columns) {

				case "dt_portfolio_thumb" :

				    $image = wp_get_attachment_image(get_post_thumbnail_id($id), array(75,75));
					if(!empty($image)):
					  	echo ($image);
				    else:
						$portfolio_settings = get_post_meta ( $post->ID, '_portfolio_settings', TRUE );
						$portfolio_settings = is_array ( $portfolio_settings ) ? $portfolio_settings : array ();

						if( array_key_exists("portfolio-gallery", $portfolio_settings)) {
							$items = explode(',', $portfolio_settings["portfolio-gallery"]);
							echo wp_get_attachment_image( $items[0], array(75, 75) );
						}
					endif;
				break;
			}
		}

		/**
		 * To load portfolio pages in front end
		 *
		 * @param string $template
		 * @return string
		 */
		function dt_template_include($template) {
			if (is_singular( 'dt_portfolios' )) {
				if (! file_exists ( get_template_directory () . '/single-dt_portfolios.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/single-dt_portfolios.php';
				}			
			} elseif (is_tax ( 'portfolio_entries' )) {
				if (! file_exists ( get_template_directory () . '/taxonomy-portfolio_entries.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-portfolio_entries.php';
				}
			} elseif (is_tax ( 'portfolio_tags' )) {
				if (! file_exists ( get_template_directory () . '/taxonomy-portfolio_tags.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/taxonomy-portfolio_tags.php';
				}
			} elseif (is_post_type_archive ( 'dt_portfolios' )) {
				if (! file_exists ( get_template_directory () . '/archive-dt_portfolios.php' )) {
					$template = plugin_dir_path ( __FILE__ ) . 'templates/archive-dt_portfolios.php';
				}					
			}
			return $template;
		}

		function dt_header_footer_metabox_option( $post_types ) {

			array_push( $post_types, 'dt_portfolios' );

			return $post_types;
		}
	}
}?>