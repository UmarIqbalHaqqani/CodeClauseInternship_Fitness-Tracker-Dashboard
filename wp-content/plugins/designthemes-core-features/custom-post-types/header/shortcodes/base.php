<?php
if (! class_exists ( 'DTBaseSC' ) ) {
    
    class DTBaseSC {

        function __construct() {
        }

        function dt_google_font( $attr ) {
            
            $data = explode("|", urldecode( $attr ));
            $data = array_filter( $data );
            if( empty( $data ) ) {
                return array();
            }

            $fontFamily = $data[0];
            $fontFamily = explode(":", $fontFamily);
            $fontFamily = $fontFamily[1];

            $fontWeight = $data[1];
            $fontStyles = explode(":", $fontWeight);

            $fontWeight = $fontStyles[2];
            $fontStyle = $fontStyles[3];

            $vc_settings = get_option( 'wpb_js_google_fonts_subsets' );
            if ( is_array( $vc_settings ) && ! empty( $vc_settings ) ) {
                $subsets = '&subset=' . implode( ',', $vc_settings );
            } else {
                $subsets = '';
            }
            wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $fontFamily ), '//fonts.googleapis.com/css?family=' . $fontFamily . $subsets ); 

            return array( 'font-family' => $fontFamily, 'font-weight' => $fontWeight, 'font-style' => $fontStyle  );
        }        

        function dt_generate_css( $atts ) {}

        function dt_print_css( $css ) { 
            if( !empty( $css ) ) {
                wp_enqueue_style( 'maruthi-custom-inline' );
                wp_add_inline_style( 'maruthi-custom-inline', $css );
            }
        }

        function dt_current_skin( $code = 'primary-color' ) {

            $color = '';
            $mode = get_theme_mod( 'use-predefined-skin', maruthi_defaults('use-predefined-skin') );

            if( $mode ) {
                $skin = get_theme_mod( 'predefined-skin', maruthi_defaults('predefined-skin' ) );
                $skin = maruthi_skins( $skin );
                $color = $skin[$code];
            } else {
                $color = get_theme_mod( $code, maruthi_defaults( $code ) );
            }

            return $color;
        }

        function dt_animation( $attrs ) {

            if( $attrs['use_animation'] == 'yes' ) {
                $animation = array();
                $animation[] = 'data-animation="'.$attrs['animation'].'"';
                $animation[] = 'data-easing="'.$attrs['animation_easing'].'"';
                $animation[] = 'data-fire="'.$attrs['animation_fire'].'"';

                if( isset( $attrs['animation_duration'] ) ) {
                    $duration = str_replace(",", ".",  $attrs['animation_duration'] );
                    $duration = $duration * 1000;
                    $animation[] = 'data-duration="'. $duration.'"';
                } else {
                    $animation[] = 'data-duration="600"';
                }

                if( isset( $attrs['animation_delay'] ) ) {
                    $delay = str_replace(",", ".",  $attrs['animation_delay'] );
                    $delay = $delay * 1000;
                    $animation[] = 'data-delay="'. $delay.'"';
                } else {
                    $animation[] = 'data-delay="0"';
                }

                $animation = implode( ' ', array_filter( $animation ) );
                return ' '.$animation;  
            } else {
                return '';
            }           
        }        
    }
}