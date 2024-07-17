<?php
if (! class_exists ( 'DTCoreVC' )) {

	class DTCoreVC {

		function __construct() {

			add_action( 'vc_before_init', array ( $this, 'dt_vcSetAsTheme') );
			add_action( 'admin_enqueue_scripts', array ( $this, 'dt_vc_admin_scripts') );
			add_filter( 'vc_load_default_templates',  array( $this, 'dt_vc_custom_template_modify_array' ) );
			add_action( 'after_setup_theme', array( $this, 'dt_map_shortcodes') );
			add_action( 'init', array( $this, 'dt_vs_contanct_form_7_fields') );
			
			// Grid Template Variables
			add_filter('vc_gitem_template_attribute_dt_post_format', array( $this, 'vc_gitem_template_attribute_dt_post_format' ), 10, 2 );
			add_filter('vc_gitem_template_attribute_dt_post_tag', array( $this, 'vc_gitem_template_attribute_dt_post_tag' ), 10, 2 );
			add_filter('vc_gitem_template_attribute_dt_post_category', array( $this, 'vc_gitem_template_attribute_dt_post_category' ), 10, 2 );
			add_filter('vc_gitem_template_attribute_dt_post_comment', array( $this, 'vc_gitem_template_attribute_dt_post_comment' ), 10, 2 );
			add_filter('vc_grid_item_shortcodes', array( $this, 'dt_vc_add_grid_shortcodes' ) );
			
			add_action( 'init', array( $this, 'dt_load_new_modules' ) );
			add_action( 'init', array( $this, 'dt_load_params' ) );
			
			// Auto Complete Params
				# dt_sc_recent_posts_widget
				add_filter( 'vc_autocomplete_dt_sc_recent_posts_widget__post_categories_callback', array( $this, 'vc_autocomplete__post_categories_field_search' ), 10, 1 );
	            	add_filter( 'vc_autocomplete_dt_sc_recent_posts_widget__post_categories_render', array( $this, 'vc_autocomplete__post_categories_field_render' ), 10, 1 );
				
				# dt_sc_portfolio_widget
				add_filter( 'vc_autocomplete_dt_sc_portfolio_widget__post_categories_callback', array( $this, 'vc_autocomplete_portfolio_post_categories_field_search' ), 10, 1 );
				add_filter( 'vc_autocomplete_dt_sc_portfolio_widget__post_categories_render', array( $this, 'vc_autocomplete_portfolio_post_categories_field_render' ), 10, 1 );
		}

		function dt_vcSetAsTheme() {
			vc_set_as_theme();

			# Set Shortcode templates folder
			$path = plugin_dir_path ( __FILE__ ) . 'vc_templates';
			vc_set_shortcodes_templates_dir( $path ); 
		}

		function dt_vc_admin_scripts( $hook ) {
			
			$post_type = '';

			if( ( 'post.php' === $hook ) && ( isset( $_GET['post'] ) ) ) {

				$post_type = get_post_type( $_GET['post'] );
			}

			if( 'post-new.php' === $hook ) {

				$post_type = isset($_GET['post_type']);
			}

			$posts = array();
			if( function_exists( 'vc_editor_post_types' ) ) {
				$posts = vc_default_editor_post_types();
			}
			
			if( in_array( $post_type, $posts ) ) {
				
				wp_enqueue_style( 'dt-vc-admin', plugins_url('designthemes-core-features') .'/visual-composer/admin.css', false, MARUTHI_THEME_VERSION, 'all' );
				wp_enqueue_script( 'dt-vc-admin', plugins_url('designthemes-core-features').'/visual-composer/js/admin.js', array( 'jquery'), null, true );
			}
		}

		function dt_vc_custom_template_modify_array( $templates ) {
			return array();
		}
		
		// New Shortcodes		
		function dt_load_new_modules() {
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/logo.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-logo.php';

			require_once plugin_dir_path( __FILE__ ).'modules/new/custom-menu.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-custom-menu.php';
	
			require_once plugin_dir_path( __FILE__ ).'modules/new/empty-space.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-empty-space.php';
	
			require_once plugin_dir_path( __FILE__ ).'modules/new/mailchimp.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-mailchimp.php';
	
			require_once plugin_dir_path( __FILE__ ).'modules/new/note.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-note.php';
	
			require_once plugin_dir_path( __FILE__ ).'modules/new/sociable.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-sociable.php';
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/simpler-sidebar.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-simpler-sidebar.php';
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/widget-recent-posts.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-widget-recent-posts.php';
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/widget-flickr.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-widget-flickr.php';
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/widget-twitter.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-widget-twitter.php';
			
			require_once plugin_dir_path( __FILE__ ).'modules/new/widget-portfolio.php';
			require_once plugin_dir_path( __FILE__ ).'modules/new/sc-widget-portfolio.php';
		}

        function dt_load_params() {

            if( ! function_exists( 'vc_add_shortcode_param' ) ) {
                return;
            }  

            vc_add_shortcode_param( 'dt_sc_input_number', array( $this, 'dt_sc_input_number' ) );                        
            vc_add_shortcode_param( 'dt_sc_vc_title', array( $this, 'dt_sc_vc_title' ) );
            vc_add_shortcode_param( 'dt_sc_vc_hr', array( $this, 'dt_sc_vc_hr' ) );
            vc_add_shortcode_param( 'dt_sc_vc_hr_invisible', array( $this, 'dt_sc_vc_hr_invisible' ) );
            vc_add_shortcode_param( 'dt_sc_img_picker', array( $this, 'dt_sc_img_picker' ) );
        }

        function dt_sc_input_number( $settings, $value ) {

            $min     = ( isset( $settings['min'] ) ) ? $settings['min'] : "0";
            $max     = ( isset( $settings['max'] ) ) ? "max=\"{$settings['max']}\"" : "";
            $step    = ( isset( $settings['step'] ) ) ? "step=\"{$settings['step']}\"" : "";

            $out  = '<div class="dt_vc_param dt_vc_input_number">';
            $out .= '<input min="'.esc_attr( $min ).'"'. $max.$step.' name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" />';
            $out .= '</div>';

            return $out;
        }

        function dt_sc_vc_title( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            return $out;
        }

        function dt_sc_vc_hr( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            $out .= '<hr/>';

            return $out;
        }

        function dt_sc_vc_hr_invisible( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            $out .= '<hr/>';

            return $out;
        }        

        function dt_sc_img_picker( $settings, $value ) {

            $value = ( isset( $settings['std'] ) && empty( $value ) ) ? $settings['std'] : $value;
            $titles = isset( $settings['title'] ) ? $settings['title'] : array();

            $out  = '<div class="dt_vc_param dt_vc_img_picker">';
            $out .= '<ul class="image-param">';
                    foreach( $settings['value'] as $key => $v ) {
                        $active = ( $value == $v ) ? 'class="active"' : '';
                        $title = isset ( $titles[$v] ) ? ' title="'.$titles[$v].'"': '';
                        $out .= '<li data-value="'.esc_attr( $v ).'" '.$active.'> <img src="'.esc_url( $key ).'"'.$title.' /> </li>';
                    }
            $out .= '</ul>';
            $out .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            $out .= '</div>';

            return $out;
        }				

		function dt_map_shortcodes() {

			require_once plugin_dir_path( __FILE__ ).'modules/index.php';
		}

		function dt_vs_contanct_form_7_fields() {
			vc_add_param('contact-form-7',array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
				'param_name' => 'html_class',
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core' ),
			) );
		}

		function vc_gitem_template_attribute_dt_post_format( $value, $data ) {
			extract( array_merge( array(
				'post' => null,
				'data' => ''
			), $data ) );

			return include(  plugin_dir_path( __FILE__ ).'templates/dt_post_format.php' );
		}

		function vc_gitem_template_attribute_dt_post_tag( $value, $data ) {
			extract( array_merge( array(
				'post' => null,
				'data' => ''
			), $data ) );

			return include(  plugin_dir_path( __FILE__ ).'templates/dt_post_tag.php' );
		}

		function vc_gitem_template_attribute_dt_post_category( $value, $data ) {
			extract( array_merge( array(
				'post' => null,
				'data' => ''
			), $data ) );

			return include(  plugin_dir_path( __FILE__ ).'templates/dt_post_category.php' );
		}		

		function vc_gitem_template_attribute_dt_post_comment( $value, $data ) {
			extract( array_merge( array(
				'post' => null,
				'data' => ''
			), $data ) );

			return include(  plugin_dir_path( __FILE__ ).'templates/dt_post_comment.php' );
		}

		function dt_vc_add_grid_shortcodes( $shortcodes ) {

			# Post Format
			$shortcodes['dt_sc_gitem_post_format'] = array(
				'name' => esc_html__( 'Post Format', 'designthemes-core' ),
				'base' => 'dt_sc_gitem_post_format',
				'category' => esc_html__( 'Post', 'designthemes-core' ),
				'description' => esc_html__( 'Post Format of current post', 'designthemes-core' ),
				'show_settings_on_create' => false,
				'post_type' => Vc_Grid_Item_Editor::postType(),
				'params' => array(
					array( 'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core')
					)
				)
			);

			# Post Tag
			$shortcodes['dt_sc_gitem_post_tag'] = array(
				'name' => esc_html__( 'Post Tag', 'designthemes-core' ),
				'base' => 'dt_sc_gitem_post_tag',
				'category' => esc_html__( 'Post', 'designthemes-core' ),
				'description' => esc_html__( 'Post Tags of current post', 'designthemes-core' ),
				'show_settings_on_create' => false,
				'post_type' => Vc_Grid_Item_Editor::postType(),
				'params' => array(
					array( 'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core')
					)
				)
			);

			# Post Category
			$shortcodes['dt_sc_gitem_post_category'] = array(
				'name' => esc_html__( 'Post Categories', 'designthemes-core' ),
				'base' => 'dt_sc_gitem_post_category',
				'category' => esc_html__( 'Post', 'designthemes-core' ),
				'description' => esc_html__( 'Categories of current post', 'designthemes-core' ),
				'params' => array(
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Add link', 'designthemes-core' ),
						'param_name' => 'link',
						'description' => esc_html__( 'Add link to category?', 'designthemes-core' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Style', 'designthemes-core' ),
						'param_name' => 'category_style',
						'value' => array(
							esc_html__( 'None', 'designthemes-core' ) => ' ',
							esc_html__( 'Comma', 'designthemes-core' ) => ', ',
							esc_html__( 'Rounded', 'designthemes-core' ) => 'filled vc_grid-filter-filled-round-all',
							esc_html__( 'Less Rounded', 'designthemes-core' ) => 'filled vc_grid-filter-filled-rounded-all',
							esc_html__( 'Border', 'designthemes-core' ) => 'bordered',
							esc_html__( 'Rounded Border', 'designthemes-core' ) => 'bordered-rounded vc_grid-filter-filled-round-all',
							esc_html__( 'Less Rounded Border', 'designthemes-core' ) => 'bordered-rounded-less vc_grid-filter-filled-rounded-all',
						),
						'description' => esc_html__( 'Select category display style.', 'designthemes-core' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Color', 'designthemes-core' ),
						'param_name' => 'category_color',
						'value' => getVcShared( 'colors' ),
						'std' => 'grey',
						'param_holder_class' => 'vc_colored-dropdown',
						'dependency' => array(
							'element' => 'category_style',
							'value_not_equal_to' => array( ' ', ', ' ),
						),
						'description' => esc_html__( 'Select category color.', 'designthemes-core' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category size', 'designthemes-core' ),
						'param_name' => 'category_size',
						'value' => getVcShared( 'sizes' ),
						'std' => 'md',
						'description' => esc_html__( 'Select category size.', 'designthemes-core' ),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core' ),
					),
					array(
						'type' => 'css_editor',
						'heading' => esc_html__( 'CSS box', 'designthemes-core' ),
						'param_name' => 'css',
						'group' => esc_html__( 'Design Options', 'designthemes-core' ),
					),
				),
				'post_type' => Vc_Grid_Item_Editor::postType(),
			);

			# Post Comment
			$shortcodes['dt_sc_gitem_post_comment'] = array(
				'name' => esc_html__( 'Post Comment', 'designthemes-core' ),
				'base' => 'dt_sc_gitem_post_comment',
				'category' => esc_html__( 'Post', 'designthemes-core' ),
				'description' => esc_html__( 'Post Comment Count of current post', 'designthemes-core' ),
				'show_settings_on_create' => false,
				'post_type' => Vc_Grid_Item_Editor::postType(),
				'params' => array(
					array( 'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'designthemes-core' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core')
					)
				)
			);						

			return $shortcodes;
		}
		

		/*
		 * Shortcode : dt_sc_recent_posts_widget
		 */
		 function vc_autocomplete__post_categories_field_search( $search_string ) {
			 
			 $vc_taxonomies = get_terms( 'category', array(
			 	'hide_empty' => false,
				'search' => $search_string,
			) );
			
			if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
				foreach ( $vc_taxonomies as $t ) {
					if ( is_object( $t ) ) {
						$data[] = vc_get_term_object( $t );
					}
				}
			}
			
			return $data;
		}
		
		/*
		 * Shortcode : dt_sc_recent_posts_widget
		 */
		 function vc_autocomplete__post_categories_field_render( $term ) {
			 
			 $terms = get_terms( 'category', array(
			 	'include' => array( $term['value'] ),
				'hide_empty' => false,
			) );
			
			$data = false;
			if ( is_array( $terms ) && 1 === count( $terms ) ) {
				$term = $terms[0];
				$data = vc_get_term_object( $term );
			}
			
			return $data;
		}

		/*
		 * Shortcode : dt_sc_portfolio_widget
		 */
		 function vc_autocomplete_portfolio_post_categories_field_search( $search_string ) {
			 
			 $vc_taxonomies = get_terms( 'portfolio_entries', array(
			 	'hide_empty' => false,
				'search' => $search_string,
			) );
			
			if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
				foreach ( $vc_taxonomies as $t ) {
					if ( is_object( $t ) ) {
						$data[] = vc_get_term_object( $t );
					}
				}
			}
			
			return $data;
		}
		
		/*
		 * Shortcode : dt_sc_portfolio_widget
		 */
		 function vc_autocomplete_portfolio_post_categories_field_render( $term ) {
			 
			 $terms = get_terms( 'portfolio_entries', array(
			 	'include' => array( $term['value'] ),
				'hide_empty' => false,
			) );
			
			$data = false;
			if ( is_array( $terms ) && 1 === count( $terms ) ) {
				$term = $terms[0];
				$data = vc_get_term_object( $term );
			}
			
			return $data;
		}		
	}
}