<?php add_action( 'vc_before_init', 'dt_sc_tabs_vc_map' );
function dt_sc_tabs_vc_map() {

	$tab_id_1 = 'def' . time() . '-1-' . rand( 0, 100 );
	$tab_id_2 = 'def' . time() . '-2-' . rand( 0, 100 );

	vc_map( array(
		"name" => esc_html__( "Tabs", 'designthemes-core' ),
		"base" => "dt_sc_tabs",
		"icon" => "dt_sc_tabs",
		"category" => DT_VC_CATEGORY,
		'is_container' => true,
		'show_settings_on_create' => false,
		'description' => esc_html__( 'Tabbed content', 'designthemes-core' ),
		'admin_enqueue_js' =>  plugins_url('designthemes-core-features').'/visual-composer/js/dt-sc-tabs-view.js',
		'params' => array(
			// Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
      			'admin_label' => true,
				'value' => array(
					esc_html__( 'Horizontal', 'designthemes-core' ) => 'horizontal',
					esc_html__( 'Vertical', 'designthemes-core' ) => 'vertical',
				),
				'std' => 'horizontal',
				'heading' => esc_html__( 'Type', 'designthemes-core' ),
				'description' => esc_html__( 'Select tabs type display', 'designthemes-core' )
			),

			// Style
			array(
				'type' => 'dropdown',
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'Default', 'designthemes-core' ) => 'default',
					esc_html__( 'Frame', 'designthemes-core' ) => 'frame',
				),
      			'admin_label' => true,
      			'std' => 'default',
				'heading' => esc_html__( 'Style', 'designthemes-core' ),
				'description' => esc_html__( 'Select tabs display style', 'designthemes-core' )
			),

			// Effect
			array(
				'type' => 'dropdown',
				'param_name' => 'effect',
				'value' => array(
					esc_html__( 'Default', 'designthemes-core' ) => 'default',
					esc_html__( 'Fade', 'designthemes-core' ) => 'fade',
					esc_html__( 'Slide', 'designthemes-core' ) => 'slide'
				),
      			'admin_label' => true,
      			'std' => 'fade',
				'heading' => esc_html__( 'Effect', 'designthemes-core' ),
				'description' => esc_html__( 'Select tabs animation effect', 'designthemes-core' )
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)			
		),
		'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
			<ul class="tabs_controls"></ul>%content%</div>',
		'default_content' =>'[dt_sc_tab title="' . esc_html__( 'Tab 1', 'designthemes-core' ) . '" tab_id="' . $tab_id_1 . '"][/dt_sc_tab]
			[dt_sc_tab title="' . esc_html__( 'Tab 2', 'designthemes-core' ) . '" tab_id="' . $tab_id_2 . '"][/dt_sc_tab]',
		'js_view' => 'DTTabsView'
	) );

	class WPBakeryShortCode_DT_SC_TABS extends WPBakeryShortCode {
		static $filter_added = false;
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
		protected $controls_list = array( 'edit', 'clone', 'delete' );
	
		public function __construct( $settings ) {
			parent::__construct( $settings );
			if ( ! self::$filter_added ) {
				$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
				self::$filter_added = true;
			}
		}
	
		public function contentAdmin( $atts, $content = null ) {
			$width = $custom_markup = '';
			$shortcode_attributes = array( 'width' => '1/1' );
			foreach ( $this->settings['params'] as $param ) {
				if ( 'content' !== $param['param_name'] ) {
					$shortcode_attributes[ $param['param_name'] ] = isset( $param['value'] ) ? $param['value'] : null;
				} elseif ( 'content' === $param['param_name'] && null === $content ) {
					$content = $param['value'];
				}
			}
			extract( shortcode_atts( $shortcode_attributes, $atts ) );
	
			// Extract tab titles
	
			preg_match_all( '/dt_sc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
	
			$output = '';
			$tab_titles = array();
	
			if ( isset( $matches[0] ) ) {
				$tab_titles = $matches[0];
			}
			$tmp = '';
			if ( count( $tab_titles ) ) {
				$tmp .= '<ul class="clearfix tabs_controls">';
				foreach ( $tab_titles as $tab ) {
					preg_match( '/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
					if ( isset( $tab_matches[1][0] ) ) {
						$tmp .= '<li><a href="#tab-' . ( isset( $tab_matches[3][0] ) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) . '">' . $tab_matches[1][0] . '</a></li>';
	
					}
				}
				$tmp .= '</ul>' . "\n";
			} else {
				$output .= do_shortcode( $content );
			}
	
			$elem = $this->getElementHolder( $width );
	
			$iner = '';
			foreach ( $this->settings['params'] as $param ) {
				$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
				if ( is_array( $param_value ) ) {
					// Get first element from the array
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[ $first_key ];
				}
				$iner .= $this->singleParamHtmlHolder( $param, $param_value );
			}
	
			if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
				if ( '' !== $content ) {
					$custom_markup = str_ireplace( '%content%', $tmp . $content, $this->settings['custom_markup'] );
				} elseif ( '' === $content && isset( $this->settings['default_content_in_template'] ) && '' !== $this->settings['default_content_in_template'] ) {
					$custom_markup = str_ireplace( '%content%', $this->settings['default_content_in_template'], $this->settings['custom_markup'] );
				} else {
					$custom_markup = str_ireplace( '%content%', '', $this->settings['custom_markup'] );
				}
				$iner .= do_shortcode( $custom_markup );
			}
			$elem = str_ireplace( '%wpb_element_content%', $iner, $elem );
			$output = $elem;
	
			return $output;
		}
	
		public function getTabTemplate() {
			return '<div class="wpb_template">' . do_shortcode( '[dt_sc_tab title="Tab" tab_id=""][/dt_sc_tab]' ) . '</div>';
		}
	
		public function setCustomTabId( $content ) {
			return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', $content );
		}
	}
}?>