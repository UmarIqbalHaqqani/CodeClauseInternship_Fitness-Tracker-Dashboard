<?php
if (! class_exists ( 'DTEmptySpace' ) ) {
    
    class DTEmptySpace extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_empty_space', array( $this, 'dt_sc_empty_space' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = '';
            $css .= ( $attrs['margin_lg'] == "" ) ? '' : 'div[id="'.esc_attr( $attrs['el_id'] ).'"] { height:'. (int) $attrs['margin_lg'] . "px }\n";
            $css .= ( $attrs['margin_md'] == "" ) ? '' : '@media only screen and (min-width:992px) and (max-width:1199px) { div[id="'.esc_attr( $attrs['el_id'] ).'"] { height:'. (int) $attrs['margin_md'] . "px } }\n";
            $css .= ( $attrs['margin_sm'] == "" ) ? '' : '@media only screen and (min-width:768px) and (max-width:991px) { div[id="'.esc_attr( $attrs['el_id'] ).'"] { height:'. (int) $attrs['margin_sm'] . "px } }\n";
            $css .= ( $attrs['margin_xs'] == "" ) ? '' : '@media (max-width: 767px) { div[id="'.esc_attr( $attrs['el_id'] ).'"] { height:'. (int) $attrs['margin_xs'] . "px } }\n";
            
            return $css;
        }

        function dt_sc_empty_space( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',

                'margin_lg' => '',
                'margin_md' => '',
                'margin_sm' => '',
                'margin_xs' => '',

                'hide_on_lg' => '',
                'hide_on_md' => '',
                'hide_on_sm' => '',
                'hide_on_xs' => '',

                'el_class' => ''
            ), $attrs ) );

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );
            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }                        

            $classes  = 'dt-sc-empty-space ';
            $classes .= $el_class;
            $classes .= !empty( $hide_on_lg ) ? ' hide_on_lg ' : '';
            $classes .= !empty( $hide_on_md ) ? ' hide_on_md ' : '';
            $classes .= !empty( $hide_on_sm ) ? ' hide_on_sm ' : '';
            $classes .= !empty( $hide_on_xs ) ? ' hide_on_xs ' : '';

            $output = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( trim( $classes ) ).'"></div>';
            return $output;            
        }        
    }
}

new DTEmptySpace();