<?php
if (! class_exists ( 'DTHeaderSearchForm' ) ) {
    
    class DTHeaderSearchForm extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_header_search_form', array( $this, 'dt_sc_header_search_form' ) );
        }

        function dt_sc_header_search_form( $attrs, $content = null ) {
            extract ( shortcode_atts ( array (
                'el_id' => '',
                'style' => '',
		    'el_class' => '',
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $output = '';
            $output .= '<div id="'.esc_attr( $el_id ).'" class="'. $el_class;


            if( $style == 'simple' ) {
            	$output .= ' search-module simple-header-search">';
            	$output .= get_search_form( false );
            }elseif( $style == 'overlay' ) {

            	$output .= ' search-module overlay-header-search">';
            	
			$output .= '<div class="menu-icons-wrapper">';
            	$output .= '	<div class="search">';
            	$output .= '		<a href="javascript:void(0)" class="overlay-search-type2 dt-search-icon type2"> <span class="fa fa-search"> </span> </a>';
            	$output .= '		<div class="overlay overlay-search">';
            	$output .= '			<div class="overlay-close"></div>';
            	$output .= 				get_search_form( false );
            	$output .= '		</div>';
            	$output .= '	</div>';
			$output .= '</div>';
			
            } elseif( $style == 'slide-down' ){
            	$output .= ' search-module slide-down-header-search">';
			
            	$output .= '<div class="menu-icons-wrapper">';
            	$output .= '	<div class="search">';
            	$output .= '		<a href="javascript:void(0)" class="overlay-search-type1 dt-search-icon type1"> <span class="fa fa-search"> </span> </a>';
            	$output .= '		<div class="top-menu-search-container">';
            	$output .= 				get_search_form( false );
            	$output .= '		</div>';
            	$output .= '	</div>';
            	$output .= '</div>';
            }

            $output .= '</div>';
            return $output;
        }    
    }
}

new DTHeaderSearchForm();                        