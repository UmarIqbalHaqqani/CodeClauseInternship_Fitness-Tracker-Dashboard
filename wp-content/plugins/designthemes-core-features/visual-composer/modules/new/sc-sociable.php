<?php
if (! class_exists ( 'DTSocial' ) ) {
    
    class DTSocial extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_sociable_new', array( $this, 'dt_sc_sociable_new' ) );
        }

        function dt_generate_css( $attrs ) {
            $css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            # Default State
                
                # Icon Color
                $i_color = '';
                if( array_key_exists('default-icon-color', $attrs) || array_key_exists('default-icon-custom-color', $attrs) ) {

                    if( $attrs['default-icon-color'] == 'custom' &&  !empty( $attrs['default-icon-custom-color'] ) ) {
                        $i_color = $attrs['default-icon-custom-color'];
                    } else {
                        $i_color = $this->dt_current_skin( $attrs['default-icon-color'] );
                    }
                }


                if( !empty( $i_color ) ) {
					$i_color = 'color:'.$i_color.';';
                    $css .= 'ul#'.$attrs['el_id'].' > li > a > i {'.$i_color.'}';
                }

                # BG Color
                $bg_color = '';
                if( array_key_exists('default-bg-color', $attrs) || array_key_exists('default-bg-custom-color', $attrs) ) {

                    if( $attrs['default-bg-color'] == 'custom' &&  !empty( $attrs['default-bg-custom-color'] ) ) {
                        $bg_color = $attrs['default-bg-custom-color'];
                    } else {
                        $bg_color = $this->dt_current_skin( $attrs['default-bg-color'] );
                    }
                }


                if( !empty( $bg_color ) ) {
					
					$bg_color = 'background-color:'.$bg_color.';';
					
                    $css .= 'ul#'.$attrs['el_id'].' > li > a > .dt-icon-default:before,
                        ul#'.$attrs['el_id'].'[data-default-style="filled"][data-default-shape="hexagon"] li a > .dt-icon-default > span:before,
                        ul#'.$attrs['el_id'].'[data-default-style="filled"][data-default-shape="hexagon"] li a > .dt-icon-default > span:after,
                        ul#'.$attrs['el_id'].'[data-default-style="filled"][data-default-shape="hexagon-alt"] li a > .dt-icon-default > span:before,
                        ul#'.$attrs['el_id'].'[data-default-style="filled"][data-default-shape="hexagon-alt"] li a > .dt-icon-default > span:after {'.$bg_color.'}';
                }

                # Border Color
                $border_color = '';
                if( array_key_exists('default-border-color', $attrs) || array_key_exists('default-border-custom-color', $attrs) ) {

                    if( $attrs['default-border-color'] == 'custom' &&  !empty( $attrs['default-border-custom-color'] ) ) {
                        $border_color = $attrs['default-border-custom-color'];
                    } else {
                        $border_color = $this->dt_current_skin( $attrs['default-border-color'] );
                    }
                }

                if( !empty( $border_color ) ) {
					
					$border_color = 'border-color:'.$border_color.';';
					
                    $css .= 'ul#'.$attrs['el_id'].' > li > a > .dt-icon-default:after,
                        ul#'.$attrs['el_id'].'[data-default-style="bordered"][data-default-shape="hexagon"] li a > .dt-icon-default > span:before,
                        ul#'.$attrs['el_id'].'[data-default-style="bordered"][data-default-shape="hexagon"] li a > .dt-icon-default > span:after,
                        ul#'.$attrs['el_id'].'[data-default-style="bordered"][data-default-shape="hexagon-alt"] li a > .dt-icon-default > span:before,
                        ul#'.$attrs['el_id'].'[data-default-style="bordered"][data-default-shape="hexagon-alt"] li a > .dt-icon-default > span:after {'.$border_color.'}';
                }
                
            # Hover State
                
                # Icon Color
                $i_h_color = '';
                if( array_key_exists('hover-icon-color', $attrs) || array_key_exists('hover-icon-custom-color', $attrs) ) {

                    if( $attrs['hover-icon-color'] == 'custom' &&  !empty( $attrs['hover-icon-custom-color'] ) ) {
                        $i_h_color = $attrs['hover-icon-custom-color'];
                    } else {
                        $i_h_color = $this->dt_current_skin( $attrs['hover-icon-color'] );
                    }
                }


                if( !empty( $i_h_color ) ) {
					$i_h_color = 'color:'.$i_h_color.';';					
                    $css .= 'ul#'.$attrs['el_id'].' > li > a:hover > i {'.$i_h_color.'}';
                }

                # BG Color
                $bg_h_color = '';
                if( array_key_exists('hover-bg-color', $attrs) || array_key_exists('hover-bg-custom-color', $attrs) ) {

                    if( $attrs['hover-bg-color'] == 'custom' &&  !empty( $attrs['hover-bg-custom-color'] ) ) {
                        $bg_h_color = $attrs['hover-bg-custom-color'];
                    } else {
                        $bg_h_color = $this->dt_current_skin( $attrs['hover-bg-color'] );
                    }
                }


                if( !empty( $bg_h_color ) ) {
					
					$bg_h_color = 'background-color:'.$bg_h_color;
					
                    $css .= 'ul#'.$attrs['el_id'].' > li > a > .dt-icon-hover:before,
                        ul#'.$attrs['el_id'].'[data-hover-style="filled"][data-hover-shape="hexagon"] li a > .dt-icon-hover > span:before,
                        ul#'.$attrs['el_id'].'[data-hover-style="filled"][data-hover-shape="hexagon"] li a > .dt-icon-hover > span:after,
                        ul#'.$attrs['el_id'].'[data-hover-style="filled"][data-hover-shape="hexagon-alt"] li a > .dt-icon-hover > span:before,
                        ul#'.$attrs['el_id'].'[data-hover-style="filled"][data-hover-shape="hexagon-alt"] li a > .dt-icon-hover > span:after {'.$bg_h_color.'}';
                }

                # Border Color
                $border_h_color = '';
                if( array_key_exists('hover-border-color', $attrs) || array_key_exists('hover-border-custom-color', $attrs) ) {

                    if( $attrs['hover-border-color'] == 'custom' &&  !empty( $attrs['hover-border-custom-color'] ) ) {
                        $border_h_color = $attrs['hover-border-custom-color'];
                    } else {
                        $border_h_color = $this->dt_current_skin( $attrs['hover-border-color'] );
                    }
                }


                if( !empty( $border_h_color ) ) {

					$border_h_color = 'border-color:'.$border_h_color;

                    $css .= 'ul#'.$attrs['el_id'].' > li > a > .dt-icon-hover:after,
                        ul#'.$attrs['el_id'].'[data-hover-style="bordered"][data-hover-shape="hexagon"] li a > .dt-icon-hover > span:before,
                        ul#'.$attrs['el_id'].'[data-hover-style="bordered"][data-hover-shape="hexagon"] li a > .dt-icon-hover > span:after,
                        ul#'.$attrs['el_id'].'[data-hover-style="bordered"][data-hover-shape="hexagon-alt"] li a > .dt-icon-hover > span:before,
                        ul#'.$attrs['el_id'].'[data-hover-style="bordered"][data-hover-shape="hexagon-alt"] li a > .dt-icon-hover > span:after {'.$border_h_color.'}';
                }

            return $css;
        }        

        function dt_sc_sociable_new ( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'social_list' => '',
                'size' => '',
                'align' => '',
                'class' => '',

                'default-style' => '',
                'default-shape' => '',
                'default-border-radius' => '',
                'default-icon-color' => '',
                'default-bg-color' => '',
                'default-border-color' => '',
                'default-icon-custom-color' => '',
                'default-bg-custom-color' => '',
                'default-border-custom-color' => '',

                'hover-style' => '',
                'hover-shape' => '',
                'hover-border-radius' => '',
                'hover-icon-color' => '',
                'hover-bg-color' => '',
                'hover-border-color' => '',
                'hover-icon-custom-color' => '',
                'hover-bg-custom-color' => '',
                'hover-border-custom-color' => '',

                'hide_on_lg' => '',
                'hide_on_md' => '',
                'hide_on_sm' => '',
                'hide_on_xs' => '',
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-sociable',
                $size,
                $align,
                $class,
            );

            if( !empty( $hide_on_lg ) ) {
                array_push( $css_classes, 'hide_on_lg' );
            }

            if( !empty( $hide_on_md ) ) {
                array_push( $css_classes, 'hide_on_md' );
            }

            if( !empty( $hide_on_sm ) ) {
                array_push( $css_classes, 'hide_on_sm' );
            }

            if( !empty( $hide_on_xs ) ) {
                array_push( $css_classes, 'hide_on_xs' );
            }

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_sociable_new', $attrs ) );

            $list = '';
            $social_list = (array) vc_param_group_parse_atts( $social_list );
            if( !empty( $social_list ) ) {
                foreach ( $social_list as $data ) {

                    $url = vc_build_link( $data['link'] );

                    if ( strlen( $data['link'] ) > 0 && strlen( $url['url'] ) > 0 ) {
                        $list .= '<li class="'.$data['social'].'">';
                        $list .= '  <a href="'.esc_attr( $url['url'] ).'" title="'.esc_attr( $url['title'] ).'" target="'.( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ).'">';
                        $list .= '      <span class="dt-icon-default"> <span></span> </span>';
                        $list .= '      <i></i>';
                        $list .=        esc_html( $url['title'] );
                        $list .= '      <span class="dt-icon-hover"> <span></span> </span>';
                        $list .= '  </a>';
                        $list .= '</li>';
                    }
                }
            }

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );

            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }

            $out = !empty( $list ) ? "<ul id='".esc_attr( $el_id )."' class='".esc_attr( trim( $css_class ) )."'
                data-default-style = '".esc_attr( isset($attrs['default-style']) )."'
                data-default-border-radius = '".esc_attr( isset($attrs['default-border-radius'] ) == 'true' ? 'yes' : 'no' )."'
                data-default-shape = '".esc_attr( isset($attrs['default-shape'] ) )."'
                data-hover-style = '".esc_attr( isset($attrs['hover-style'] ) )."'
                data-hover-border-radius = '".esc_attr( isset($attrs['hover-border-radius'] ) == 'true' ? 'yes' : 'no' )."'
                data-hover-shape = '".esc_attr( isset($attrs['hover-shape'] ) )."'
                >".$list.'</ul>' : '';

            return $out;                    
        }      
    }
}

new DTSocial();