<?php
if (! class_exists ( 'DTEventsPostType' ) ) {

	class DTEventsPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt_taxonomies' ) );

			add_action ( 'init', array( $this, 'dt_register_cpt' ), 10 );			

			add_filter ( 'cs_taxonomy_options', array( $this, 'dt_event_taxonomy_options' ) );

			add_filter( 'cs_metabox_options', array( $this, 'dt_event_metabox_options' ) );			

			add_filter ( 'cs_framework_options', array( $this, 'dt_event_framework_options' ) );			

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_event_admin_scripts' ) );

			add_filter( 'manage_edit-dt_event_columns', array( $this, 'dt_event_edit_columns' ) );

			add_filter( 'manage_posts_custom_column', array( $this, 'dt_event_columns_display' ), 10, 2 );

			add_action( 'template_include', array( $this, 'dt_template_include') );

			add_filter( 'cs_save_post', array( $this, 'dt_event_save_post' ), 10, 3 );			
		}

		function dt_register_cpt_taxonomies() {

			# Category			
				$dt_event_category = array(
					'labels'		=>  array( 'name'	=> __( 'Categories', 'dt-event-manager' ),
											'singular_name' => __( 'Category', 'dt-event-manager' ), ),
					'hierarchical'	=> true,
					'query_var'		=> true,
					'show_admin_column' => true
				);

				register_taxonomy( 'dt_event_category', array( 'dt_event' ), $dt_event_category );

			# Tag			
				$dt_event_tag = array(
					'labels'		=>  array( 'name'	=> __( 'Tags', 'dt-event-manager' ),
											'singular_name' => __( 'Tag', 'dt-event-manager' ), ),
					'hierarchical'	=> false,
					'query_var'		=> true,
					'show_admin_column' => true					
				);
				
				register_taxonomy( 'dt_event_tag', array( 'dt_event' ), $dt_event_tag );				
		}

		function dt_register_cpt() {

			$labels = array(
				'name' => __('Events', 'dt-event-manager' ),
				'singular_name' => __('Event', 'dt-event-manager' ),
				'menu_name' => __('Events', 'dt-event-manager' ),
				'add_new' => __('Add Event', 'dt-event-manager' ),
				'add_new_item' => __('Add New Event', 'dt-event-manager' ),
				'edit' => __('Edit Event', 'dt-event-manager' ),
				'edit_item' => __('Edit Event', 'dt-event-manager' ),
				'new_item' => __('New Event', 'dt-event-manager' ),
				'view' => __('View Event', 'dt-event-manager' ),
				'view_item' => __('View Event', 'dt-event-manager' ),
				'search_items' => __('Search Events', 'dt-event-manager' ),
				'not_found' => __('No Events found', 'dt-event-manager' ),
				'not_found_in_trash' => __('No Events found in Trash', 'dt-event-manager' ),
			);

			$args = array(
				'labels' 			  => $labels,
				'description'         => __( 'This is where you can add new events.', 'dt-event-manager' ),
				'supports' 			  => array('title', 'editor', 'excerpt', 'thumbnail' ),
				'taxonomies' 		  => array( 'dt_event_tag', ' dt_event_category' ),
				'hierarchical' 		  => false,
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => true,
				'menu_position' 	  => 25,
				'menu_icon'			  => 'dashicons-welcome-write-blog', 
				'show_in_admin_bar'   => false,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,		
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page'			
			);
			
			register_post_type('dt_event', $args );
		}

		function dt_event_taxonomy_options( $options ) {

			$options[]	= array(
				'id'       => 'dt_event_category_settings',
				'taxonomy' => 'dt_event_category',
				'fields'   => array(
					array( 'id'     => 'color',
						'type'   => 'color_picker',
						'title'  => __('Color','dt-event-manager'),
						'after'  => '<p class="description">'.esc_html__('Choose your category color', 'dt-event-manager').'</p>',
					),
				),
			);

			return $options;
		}

		function dt_event_metabox_options( $options ) {

			$cost_fields = array(

				1 => array( 'id' => 'currency-symbol',
					'type' => 'text',
					'default' => '&#36;',
					'title'	=> esc_html__('Currency Symbol','dt-event-manager'),
				),

				2 => array( 'id'	=> 'currency-symbol-position',
					'type'	=> 'select',
					'title'	=> esc_html__('Symbol Position','dt-event-manager'),
					'options' => array(
						'prefix' => __( 'Before Cost', 'dt-event-manager'),
						'suffix' => __( 'After Cost', 'dt-event-manager'),
					),
					'default' => 'prefix'
				),

				3 => array( 'id' => 'cost',
					'type' => 'number',
					'title' => function_exists( 'is_woocommerce' ) ? esc_html__('Cost', 'dt-event-manager') .'( '.get_woocommerce_currency_symbol().' )' : esc_html__('Cost', 'dt-event-manager'),
					'attributes' => array( 'min' => 0, 'step' => '0.25' ),
					'after'  => '<p class="description">'.esc_html__('Enter a 0 for events that are free or leave blank to hide the field', 'dt-event-manager').'</p>',
				),

				5 =>array( 'id' => 'purchase-button',
					'type' => 'text',
					'title'	=> esc_html__('Button Label','dt-event-manager'),
					'default' => 'Buy Now'
				),

				6 => array(
					'id' => 'purchase-button-link',
					'type' => 'text',
					'title'	=> esc_html__('Button Link','dt-event-manager'),
				),
			);

			if( class_exists( 'WooCommerce' ) ) {				

				$cost_fields[4] = array(
					'id' => 'stock',
					'type' => 'number',
					'title' => esc_html__('Capacity', 'dt-event-manager'),
					'attributes' => array( 'min' => 0, 'step' => '1' ),
				);

				ksort( $cost_fields );

				unset( $cost_fields[1] );
				unset( $cost_fields[6] );				

				array_push( $cost_fields, array(
					'id' => 'sold-out',
					'type' => 'text',
					'title'	=> esc_html__('Sold Out Label','dt-event-manager'),
					'default' => 'Sold Out'
				) );
			}

			$options[]    = array(
				'id'        => '_custom_settings',
				'title'     => esc_html__('Event Options', 'dt-event-manager'),
				'post_type' => 'dt_event',
				'context'   => 'normal',
				'priority'  => 'default',
				'sections'  => array(

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
									'header-top-absolute' => esc_html__('Behind the Header','dt-event-manager'),
									'header-top-relative' => esc_html__('Default','dt-event-manager')
								),
								'default'    => 'header-top-relative',
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

							array(
								'id'		=> 'content-layout',
								'type'      => 'image_select',
								'title'     => esc_html__('Detail Layout', 'dt-event-manager'),
								'options'	=> array(
									'layout-1'   => plugins_url('dt-event-manager') .'/images/admin/layout-1.png',
									'layout-3'   => plugins_url('dt-event-manager') .'/images/admin/layout-3.png',
									'layout-4'   => plugins_url('dt-event-manager') .'/images/admin/layout-4.png',
								),
								'default'      => 'layout-1',
								'dependency'   => array( 'layout', 'any', 'with-left-sidebar,with-right-sidebar' ),
							),

							array(
								'id'		=> 'with-out-sidebar-content-layout',
								'type'      => 'image_select',
								'title'     => esc_html__('Detail Layout', 'dt-event-manager'),
								'options'	=> array(
									'layout-1'   => plugins_url('dt-event-manager') .'/images/admin/layout-1.png',
									'layout-2'   => plugins_url('dt-event-manager') .'/images/admin/layout-2.png',
									'layout-3'   => plugins_url('dt-event-manager') .'/images/admin/layout-3.png',
									'layout-4'   => plugins_url('dt-event-manager') .'/images/admin/layout-4.png',
									'layout-5'   => plugins_url('dt-event-manager') .'/images/admin/layout-5.png',
								),
								'default'      => 'layout-1',
								'dependency'   => array( 'layout', '==', 'with-out-sidebar' ),
							),

							array(
							  'id'    => 'event_image',
							  'type'  => 'image',
							  'title' => esc_html__('Detail Image', 'dt-event-manager'),
							)
						)
					),

					array(
						'name'  => 'event_section',
						'title' => esc_html__('Event', 'dt-event-manager'),
						'icon'  => 'fa fa-picture-o',
						'fields' => array(
							
							// Date
							array(
								'id'	=> 'start-date',
								'type'	=> 'dt_date_time_picker',
								'title' => esc_html__('Start Date And Time', 'dt-event-manager'),
							),

							// Repeat
							array(
								'id'	=> 'interval',
								'type'	=> 'select',
								'title'	=> esc_html__('Repeat','dt-event-manager'),
								'after'  => '<p class="cs-text-info">' . esc_html( 'If you choose to repeat a class, the next one will be added when previous has started.', 'dt-event-manager' ) . '</p>',
								'options' => array(
									__( 'No Repeat', 'dt-event-manager'),
									__( 'Repeat Daily', 'dt-event-manager'),
									__( 'Repeat Weekly', 'dt-event-manager'),
									__( 'Repeat Every Two Weeks', 'dt-event-manager'),
									__( 'Repeat Monthly', 'dt-event-manager'),
									__( 'Repeat Yearly', 'dt-event-manager'),
								)
							),

							// Repeat Daily
							array (
								'id' => 'repeat-day',
								'type'    => 'checkbox',
								'title'	=> esc_html__('Choose Repeat Day', 'dt-event-manager'),
								'class'      => 'horizontal',
								'dependency' => array( 'interval', '==', '1'),
								'options'	=> array(
									"1" => esc_html__( 'Monday', 'dt-event-manager'),
									"2" => esc_html__( 'Tuesday', 'dt-event-manager'),
									"3" => esc_html__( 'Wednesday', 'dt-event-manager'),
									"4" => esc_html__( 'Thursday', 'dt-event-manager'),
									"5" => esc_html__( 'Friday', 'dt-event-manager'),
									"6" => esc_html__( 'Saturday', 'dt-event-manager'),
									"7" => esc_html__( 'Sunday', 'dt-event-manager'),
								),
								'default'    => array( '1', '2', '3', '4', '5', '6', '7' )
							),

							// Repeat Until
							array(
								'id'	=> 'repeat-until',
								'type'	=> 'text',
								'title'	=> esc_html__('Last Repeat Date', 'dt-event-manager'),
								'class'      => 'dt-event-date-picker',
								'dependency' => array( 'interval', 'any', '1,2,3,4,5'),								
							),

							// Event Status
							array(
								'id' => 'status',
								'type' => 'select',
								'title' => esc_html__('Status', 'dt-event-manager'),
								'class' => 'chosen',
								'options' => array(
									"0" => esc_html__( 'Live', 'dt-event-manager'),
									"1" => esc_html__( 'Canceled', 'dt-event-manager'),
									"2" => esc_html__( 'Canceled Date', 'dt-event-manager'),

								),
								'attributes' => array(
									'style'  => 'width:50%',
								),
								'default' => 0,								
							),

							// Event Canceled Date
							array(
								'id' => 'canceled-date',
								'type' => 'group',
								'title' => esc_html__('Canceled Date(s)', 'dt-event-manager'),
								'button_title' => esc_html('Add Date', 'dt-event-manager'),
								'accordion_title' => 'date',
								'dependency' => array( 'status', '==', '2'),								
								'fields' => array(
									array(
										'id'	=> 'date',
										'type'	=> 'text',
										'title'	=> esc_html__('Cancel Date', 'dt-event-manager'),
										'class'      => 'dt-event-date-picker',
										'attributes' => array( 'readonly' => 'true' )
									)
								)
							),

							// Venue
							array(
								'id'	=> 'venue',
								'type'  => 'select',
								'title' => esc_html__('Choose Event Venue', 'dt-event-manager'),
								'class' => 'chosen',
								'options' => 'posts',
								'attributes' => array(
									'style'  => 'width:50%',
								),
								'query_args' => array(
									'post_type'  => 'dt_event_venu',
									'orderby'    => 'ID',
									'order'      => 'ASC',
									'posts_per_page' => -1,
								),
								'default_option' => esc_attr__('Select Venue', 'dt-event-manager'),
							),

							// Venue in Map
							array(
								'id'	=> 'show-venue-in-map',
								'type'  => 'switcher',
								'title' => esc_html__('Show Venue in Map', 'dt-event-manager'),
								'dependency'   => array( 'venue', '!=', '' ),
							),							

							// Organizer
							array(
								'id'	=> 'organizers',
								'type'  => 'select',
								'title' => esc_html__('Choose Event Organizers', 'dt-event-manager'),
								'class' => 'chosen',
								'options' => 'posts',
								'attributes' => array(
									'style'  => 'width:50%',
									'multiple' => 'multiple',
								),
								'query_args' => array(
									'post_type'  => 'dt_event_organizer',
									'orderby'    => 'ID',
									'order'      => 'ASC',
									'posts_per_page' => -1,
								),
								'default_option' => esc_attr__('Select Organizers', 'dt-event-manager'),
							),						
						)
					),

					array(
						'name'  => 'map_section',
						'title' => esc_html__('Map', 'dt-event-manager'),
						'icon'  => 'fa fa-globe',
						'fields' => array(
							array(
								'id'	=>	'slider-notice',
								'type'	=>	'notice',
								'class'	=>  'margin-30 cs-danger',
								'content' => __('Map section works only if you enable Show Venue in Map settings','dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'false' ),
							),

							array(
								'id'	  => 'map-type',
								'type'    => 'select',
								'title'   => esc_html__('Map Type', 'dt-event-manager' ),
								'options' => array(
									'roadmap' => esc_html__('Roadmap','dt-event-manager'),
									'satellite' => esc_html__('Satellite','dt-event-manager'),
									'terrain' => esc_html__('Terrain','dt-event-manager'),
									'hybrid' => esc_html__('Hybrid','dt-event-manager')
								),
								'default'    => 'satellite',
								'class' => 'chosen',
								'attributes' => array(
									'style'  => 'width:50%',
								),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id'	=> 'map-style',
								'type'	=> 'select',
								'title' => esc_html__('Map Style', 'dt-event-manager' ),
								'class' => 'chosen',
								'attributes' => array(
									'style'  => 'width:50%',
								),
								'options' => array(
									'custom' => esc_html__('Custom','dt-event-manager'),
									'1' => esc_html__('Style 1','dt-event-manager'),
									'2' => esc_html__('Style 2','dt-event-manager'),
									'3' => esc_html__('Style 3','dt-event-manager'),
									'4' => esc_html__('Style 4','dt-event-manager'),
									'5' => esc_html__('Style 5','dt-event-manager'),
									'6' => esc_html__('Style 6','dt-event-manager'),
									'7' => esc_html__('Style 7','dt-event-manager'),
									'8' => esc_html__('Style 8','dt-event-manager'),
									'9' => esc_html__('Style 9','dt-event-manager'),
									'10' => esc_html__('Style 10','dt-event-manager'),
									'11' => esc_html__('Style 11','dt-event-manager'),
									'12' => esc_html__('Style 12','dt-event-manager'),
									'13' => esc_html__('Style 13','dt-event-manager'),
									'14' => esc_html__('Style 14','dt-event-manager'),
									'15' => esc_html__('Style 15','dt-event-manager'),
									'16' => esc_html__('Style 16','dt-event-manager'),
									'17' => esc_html__('Style 17','dt-event-manager'),
									'18' => esc_html__('Style 18','dt-event-manager'),
									'19' => esc_html__('Style 19','dt-event-manager'),
									'20' => esc_html__('Style 20','dt-event-manager'),
									'21' => esc_html__('Style 21','dt-event-manager'),
									'22' => esc_html__('Style 22','dt-event-manager'),
									'23' => esc_html__('Style 23','dt-event-manager'),
									'24' => esc_html__('Style 24','dt-event-manager'),
									'25' => esc_html__('Style 25','dt-event-manager'),
									'26' => esc_html__('Style 26','dt-event-manager'),
									'27' => esc_html__('Style 27','dt-event-manager'),
									'28' => esc_html__('Style 28','dt-event-manager'),
									'29' => esc_html__('Style 29','dt-event-manager'),
									'30' => esc_html__('Style 30','dt-event-manager'),
									'31' => esc_html__('Style 31','dt-event-manager'),
									'32' => esc_html__('Style 32','dt-event-manager'),
									'33' => esc_html__('Style 33','dt-event-manager'),
									'34' => esc_html__('Style 34','dt-event-manager'),
									'35' => esc_html__('Style 35','dt-event-manager'),
									'36' => esc_html__('Style 36','dt-event-manager'),
									'37' => esc_html__('Style 37','dt-event-manager'),
									'38' => esc_html__('Style 38','dt-event-manager'),
									'39' => esc_html__('Style 39','dt-event-manager'),
									'40' => esc_html__('Style 40','dt-event-manager'),
									'41' => esc_html__('Style 41','dt-event-manager'),
									'42' => esc_html__('Style 42','dt-event-manager'),
									'43' => esc_html__('Style 43','dt-event-manager'),
									'44' => esc_html__('Style 44','dt-event-manager'),
									'45' => esc_html__('Style 45','dt-event-manager'),
									'46' => esc_html__('Style 46','dt-event-manager'),
									'47' => esc_html__('Style 47','dt-event-manager'),
									'48' => esc_html__('Style 48','dt-event-manager'),
									'49' => esc_html__('Style 49','dt-event-manager'),
									'50' => esc_html__('Style 50','dt-event-manager'),
								),
								'default_option' => esc_attr__('Select Style', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),								
							),

							array(
								'id' => 'map-custom-style',
								'type'	=> 'color_picker',
								'title' => esc_html__('Map Custom Style', 'dt-event-manager' ),
								'default' => '#dd3333',
								'dependency'  => array( 'show-venue-in-map|map-style', '==|==', 'true|custom' ),
							),

							array(
								'id'	=> 'map-width',
								'type'	=> 'text',
								'title'	=> esc_html__('Map Width', 'dt-event-manager'),
								'default'	=> '100%',
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id'	=> 'map-height',
								'type'	=> 'text',
								'title'	=> esc_html__('Map Height', 'dt-event-manager'),
								'default'	=> '500px',
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id'	=> 'map-zoom-level',
								'type'	=> 'number',
								'title'	=> esc_html__('Map Zoom Level', 'dt-event-manager'),
								'default'	=> '12',
								'attributes'	=> array(
									'min'	=> 1,
									'max'	=> 20,
									'step'	=> 1
								),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),								
							),

							array(
								'id' => 'map-street-view-control',
								'type' => 'switcher',
								'title' => esc_html__('Show Street View Control', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id' => 'map-type-control',
								'type' => 'switcher',
								'title' => esc_html__('Show Map Type Control', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id' => 'map-zoom-control',
								'type' => 'switcher',
								'title' => esc_html__('Show Map Zoom Control', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id' => 'map-scale-control',
								'type' => 'switcher',
								'title' => esc_html__('Show Map Scale Control', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id' => 'map-scrollable',
								'type' => 'switcher',
								'title' => esc_html__('Is Map scrollable', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),

							array(
								'id' => 'map-draggable',
								'type' => 'switcher',
								'title' => esc_html__('Is Map draggable', 'dt-event-manager'),
								'dependency'  => array( 'show-venue-in-map', '==', 'true' ),
							),
						)
					),

					array(
						'name'  => 'cost_section',
						'title' => esc_html__('Cost', 'dt-event-manager'),
						'icon'  => 'fa fa-chain',
						'fields' => $cost_fields
					),
				)
			);

			return $options;
		}

		function dt_event_framework_options( $options ) {

			$options[]      = array(
				'name'        => 'events',
				'title'       => esc_html__('Events', 'designthemes-core'),
				'icon'        => 'fa fa-file-text',
				'fields'      => array(

					array(
						'type'    => 'subheading',
						'content' => esc_html__( 'Events Archives Page Layout', 'designthemes-core' ),
					),

					array(
						'id'      	 => 'events-archives-page-layout',
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
							'data-depend-id' => 'events-archives-page-layout',
						),
					),

					array(
						'id'  		 => 'show-standard-left-sidebar-for-events-archives',
						'type'  		 => 'switcher',
						'title' 		 => esc_html__('Show Standard Left Sidebar', 'designthemes-core'),
						'dependency'   => array( 'events-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
					),

					array(
						'id'  		 => 'show-standard-right-sidebar-for-events-archives',
						'type'  		 => 'switcher',
						'title' 		 => esc_html__('Show Standard Right Sidebar', 'designthemes-core'),
						'dependency'   => array( 'events-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
					),

					array(
						'type'    => 'subheading',
						'content' => esc_html__( 'Events Archives Post Layout', 'designthemes-core' ),
					),

					array(
						'id'      	 => 'events-archives-post-layout',
						'type'         => 'image_select',
						'title'        => esc_html__('Post Layout', 'designthemes-core'),
						'options'      => array(
							'one-half-column'   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
							'one-third-column'  => MARUTHI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
						),
						'default'      => 'one-half-column',
					),
				),				
			);

			return $options;
		}		

		function dt_event_admin_scripts( $pagenow ) {

			$script = false;

			if( 'post.php' === $pagenow ) {
				if( isset( $_GET['post'] ) && ( get_post_type( $_GET['post'] ) ==='dt_event' ) ) {
					$script = true;
				}
			}

			if( ( 'post-new.php' === $pagenow ) && ( isset($_GET['post_type']) === 'dt_event' ) ) {
				$script = true;
			}

			if( $script ) {

				wp_enqueue_script('dt-event-addon-admin-scripts', plugins_url('dt-event-manager') . '/js/admin/script.js', array ('jquery-ui-datepicker' , 'jquery-ui-slider' ), false, true );

				wp_enqueue_style('dt-event-addon-jquery-ui-datepicker', plugins_url('dt-event-manager') . '/css/admin/datepicker.css', false, false, false );
			}
		}

		function dt_template_include( $template ) {

			if ( is_singular( 'dt_event' ) ) {

				if (! file_exists ( get_template_directory () . '/single-dt_event.php' )) {

					$template = plugin_dir_path ( __DIR__ ) . 'templates/single-dt_event.php';
				}
			}
			
			if( is_singular( 'dt_event_organizer' ) ) {
				
				if (! file_exists ( get_template_directory () . '/single-dt_event_organizer.php' )) {

					$template = plugin_dir_path ( __DIR__ ) . 'templates/single-dt_event_organizer.php';
				}				
			}

			if( is_tax( 'dt_event_tag' ) || is_tax('dt_event_category') ) {

				if (! file_exists ( get_template_directory () . '/archive-dt_event.php' )) {

					$template = plugin_dir_path ( __DIR__ ) . 'templates/archive-dt_event.php';
				}
			}			

			return $template;
		}

		function dt_event_edit_columns( $columns ) {

			$newcolumns = array (
				"cb"	=>	"<input type=\"checkbox\"/>",
				"dt_event_thumb"	=>	esc_html__("Image", 'dt-event-manager'),
				"title"	=>	esc_html__("Title", 'dt-event-manager'),
				"type"	=>	esc_html__("Type", 'dt-event-manager'),
				"author"	=>	esc_html__("Author", 'dt-event-manager'),
				"start_date"	=>	esc_html__("Start Date", 'dt-event-manager'),
				"duration"	=>	esc_html__("Duration", 'dt-event-manager'),
				"venue"	=>	esc_html__("Venue", 'dt-event-manager'),
				"organizers"	=> esc_html__("Organizers", 'dt-event-manager'),
			);

			$columns = array_merge ( $newcolumns, $columns );
			return $columns;			
		}

		function dt_event_columns_display( $columns, $id ) {

			global $post;
			$settings = get_post_meta( $id, '_custom_settings', true );
			$settings = is_array ( $settings ) ? $settings : array ();
			$settings = array_filter( $settings );

			switch ($columns) {

				case 'type':
					$interval = isset( $settings['interval'] ) ? $settings['interval'] : 0;

					$type = array( 
						__( 'No Repeat', 'dt-event-manager'),
						__( 'Repeat Daily', 'dt-event-manager'),
						__( 'Repeat Weekly', 'dt-event-manager'),
						__( 'Repeat Every Two Weeks', 'dt-event-manager'),
						__( 'Repeat Monthly', 'dt-event-manager'),
						__( 'Repeat Yearly', 'dt-event-manager'),
					);

					$day = array(
						"1" => esc_html__( 'Monday', 'dt-event-manager'),
						"2" => esc_html__( 'Tuesday', 'dt-event-manager'),
						"3" => esc_html__( 'Wednesday', 'dt-event-manager'),
						"4" => esc_html__( 'Thursday', 'dt-event-manager'),
						"5" => esc_html__( 'Friday', 'dt-event-manager'),
						"6" => esc_html__( 'Saturday', 'dt-event-manager'),
						"7" => esc_html__( 'Sunday', 'dt-event-manager'),
					);

					if( isset( $interval )  ) {

						echo '<b>Repeat :</b>' .$type[$interval].'<br/>';

						if( isset( $settings['repeat-day'] ) ) {

							$days = array();
							foreach ($settings['repeat-day'] as $key ) {
								$days[] = $day[$key];
							}

							$days = implode( ",", $days );
							echo '<b>Days : </b>'. $days .'<br/>'; 
						}

						if( isset( $settings['repeat-until'] ) ) {
							echo '<b>Last Date: </b>'. $settings['repeat-until'] .'<br/>';
						}
					}
				break;

				case 'dt_event_thumb':
					if( array_key_exists('event_image', $settings) ):
						$attach_url = wp_get_attachment_image_src( $settings['event_image'], array('75', '75') );
						echo '<img src="'.$attach_url[0].'" alt="'.esc_attr__('event-img', 'dt-event-manager').'" width="75" height="75" />';
					else:
						echo '<img src="http://via.placeholder.com/75x75" alt="'.esc_attr__('event-img', 'dt-event-manager').'"/ >';
					endif;
				break;

				case 'start_date':
					if( isset( $settings['start-date'] ) ) {
						$start = $settings['start-date'];
						echo date_i18n( 'F j, Y g:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) );
					}
				break;

				case 'duration':

					if( isset( $settings['start-date'] ) ) {

						$start = $settings['start-date'];						

						$hours = floor( $start['duration'] / 60 );
						$minutes = $start['duration'] - floor( $start['duration'] / 60 ) * 60;

						$duration  = $hours > 0 ? sprintf( _n( '%sh', '%sh', $hours, 'dt-event-manager' ), $hours ) : '';
						$duration .= $minutes > 0 && $hours > 0 ? ' ' : '';
						$duration .= $minutes > 0 ? sprintf( __( '%d\'', 'dt-event-manager' ), $minutes ) : '';

						echo $duration;
					}
				break;

				case 'venue':
					if( isset( $settings['venue'] ) ) {
						echo '<a href="'.admin_url('post.php?post='.$settings['venue'].'&action=edit').'">'. get_the_title( $settings['venue'] ) .'</a>';
					} else {
						echo '—';
					}
				break;

				case 'organizers':
					if( isset( $settings['organizers'] ) ) {
						$links = array();
						foreach ( $settings['organizers'] as $organizer ) {
							$links[] = '<a href="'. esc_url( admin_url( 'post.php?post='.$organizer.'&action=edit' ) ) .'">'. get_the_title( $organizer ) .'</a>';
						}
						echo join( ",", $links );
					} else {
						echo '—';						
					}
				break;
			}
		}

		function dt_event_save_post( $request, $request_key, $post ) {

			if( $post->post_type == 'dt_event' ) {

				$post_meta = get_post_meta ( $post->ID );
				$timestamp = strtotime( $request['start-date']['date'] .' '. $request['start-date']['hour'] . ' hours '.$request['start-date']['minutes'].' minutes' );

				if( !isset( $post_meta['_dt_event_timestamp'] ) || $post_meta['_dt_event_timestamp'] !== $timestamp  ) {
					update_post_meta( $post->ID, '_dt_event_timestamp', $timestamp );
				}

				update_post_meta( $post->ID, '_dt_event_interval', $request['interval'] );				

				if( !empty( $request['repeat-until'] ) ) {
					update_post_meta( $post->ID, '_dt_event_repeat_until', $request['repeat-until'] );
				}

				if( !empty( $request['repeat-day'] ) ) {
					update_post_meta( $post->ID, '_dt_event_repeat_day', $request['repeat-day'] );
				}

				if( !empty( $request['organizers'] ) ) {
					update_post_meta( $post->ID, '_dt_event_organizers', $request['organizers'] );
				}
			}

			return $request;
		}
	}
}