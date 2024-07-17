<?php add_action( 'vc_before_init', 'dt_sc_accordion_vc_map' );
function dt_sc_accordion_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Accordions", 'designthemes-core' ),
		"base" => "dt_sc_accordion",
		"category" => DT_VC_CATEGORY,
		"show_settings_on_create" => false,
		"is_container" => true,
		"icon" => "dt_sc_accordion",
		'description' => esc_html__( 'Collapsible content panels', 'designthemes-core' ),
		"params" => array(

			// Style
			array(
				'type' => 'dropdown',
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'Default', 'designthemes-core' ) => 'default',
					esc_html__( 'Frame', 'designthemes-core' ) => 'frame',
				),
      			'admin_label' => true,
				'heading' => esc_html__( 'Style', 'designthemes-core' ),
				'description' => esc_html__( 'Select accordion display style', 'designthemes-core' )
			),

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'default_accordion_type',
				'value' => array(
					esc_html__(' Type 1','designthemes-core') => 'type1',
					esc_html__(' Type 2','designthemes-core') => 'type2'
				),
				'heading' => esc_html__( 'Type', 'designthemes-core' ),
				'description' => esc_html__( 'Select standard accordion display type', 'designthemes-core' ),
				'dependency' => array( 'element' => 'style', 'value' => 'default')
			),			

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'framed_accordion_type',
				'value' => array(
					esc_html__(' Type 1','designthemes-core') => 'type1',
					esc_html__(' Type 2','designthemes-core') => 'type2',
					esc_html__(' Type 3','designthemes-core') => 'type3'
				),
				'heading' => esc_html__( 'Type', 'designthemes-core' ),
				'description' => esc_html__( 'Select framed accordion display type', 'designthemes-core' ),
				'dependency' => array( 'element' => 'style', 'value' => 'frame')
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)
		),
		'admin_enqueue_js' =>  plugins_url('designthemes-core-features').'/visual-composer/js/dt-sc-accordion-view.js',
		'js_view' => 'DTAccordionView',
		'custom_markup' => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div>
			<div class="tab_controls">
				<a class="add_tab" title="' . esc_attr__( 'Add section', 'designthemes-core' ) . '">
				<span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add section', 'designthemes-core' ) . '</span></a>
			</div>',
		'default_content' => '[dt_sc_accordion_tab title="' . esc_html__( 'Section 1', 'designthemes-core' ) . '"][/dt_sc_accordion_tab]
			[dt_sc_accordion_tab title="' . esc_html__( 'Section 2', 'designthemes-core' ) . '"][/dt_sc_accordion_tab]'			
	) );

	class WPBakeryShortCode_DT_SC_ACCORDION extends WPBakeryShortCode {
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
	
		public function __construct( $settings ) {
			parent::__construct( $settings );
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
	
			$elem = $this->getElementHolder( $width );
	
			$inner = '';
			foreach ( $this->settings['params'] as $param ) {
				$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
				if ( is_array( $param_value ) ) {
					// Get first element from the array
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[ $first_key ];
				}
				$inner .= $this->singleParamHtmlHolder( $param, $param_value );
			}
	
			$tmp = '';
	
			if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
				if ( '' !== $content ) {
					$custom_markup = str_ireplace( '%content%', $tmp . $content, $this->settings['custom_markup'] );
				} elseif ( '' === $content && isset( $this->settings['default_content_in_template'] ) && '' !== $this->settings['default_content_in_template'] ) {
					$custom_markup = str_ireplace( '%content%', $this->settings['default_content_in_template'], $this->settings['custom_markup'] );
				} else {
					$custom_markup = str_ireplace( '%content%', '', $this->settings['custom_markup'] );
				}
				$inner .= do_shortcode( $custom_markup );
			}
			$output = str_ireplace( '%wpb_element_content%', $inner, $elem );
	
			return $output;
		}
	}
}?>