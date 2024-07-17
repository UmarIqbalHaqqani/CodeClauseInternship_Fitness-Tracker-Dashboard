<?php
if (! class_exists ( 'DTHeaderMenu' ) ) {
    
    class DTHeaderMenu extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_header_menu', array( $this, 'dt_sc_header_menu' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            # Typography
                $typo  = '';
                $typo .= !empty( $attrs['font_size'] ) ? 'font-size:'.$attrs['font_size'].'px;' : '';
                $typo .= ($attrs['text_transform'] !== 'none' ) ? 'text-transform:'.$attrs['text_transform'].';': '';

                # Default
                    
                    # Color
                    if( $attrs['default_item_color'] == 'custom' && !empty( $attrs['default_custom_item_color'] ) ) {
                        $typo .= 'color:'.$attrs['default_custom_item_color'].';';
                    } elseif( $attrs['default_item_color'] !== 'custom' && $attrs['default_item_color'] !== 'none' ) {
                        $typo .= 'color:'.$this->dt_current_skin( $attrs['default_item_color'] ).';';
                    }

                    if( $attrs['display'] == 'boxed' || $attrs['display'] == 'stretch' ) {

                        # BG Color
                        if( $attrs['style'] == 'filled' ) {
                            if( $attrs['default_bg_color'] == 'custom' &&  !empty( $attrs['default_custom_bg_color'] ) ) {
                                $typo .= 'background-color:'.$attrs['default_custom_bg_color'].';';
                            } elseif( $attrs['default_bg_color'] !== 'custom' && $attrs['default_bg_color'] !== 'none' ) {
                                $typo .= 'background-color:'.$this->dt_current_skin( $attrs['default_bg_color'] ).';';
                            }
                        }

                        # Border Color
                        $typo .= 'border-style:solid; border-width:1px;border-color:transparent;';
                        if( $attrs['default_border_color'] == 'custom' &&  !empty( $attrs['default_custom_border_color'] ) ) {
                            $typo .= 'border-color:'.$attrs['default_custom_border_color'].';';
                        } elseif( $attrs['default_border_color'] !== 'custom' && $attrs['default_border_color'] !== 'none' ) {
                            $typo .= 'border-color:'.$this->dt_current_skin( $attrs['default_border_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['border_radius'] == 'partially-rounded-alt' ) {
                            $typo .= 'border-radius: 0 5px;';
                        } elseif( $attrs['border_radius'] == 'simple-rounded' ) {
                            $typo .= 'border-radius: 5px;';
                        } elseif( $attrs['border_radius'] == 'partially-rounded' ) {
                            $typo .= 'border-radius: 5px 0;';
                        } elseif( $attrs['border_radius'] == 'fully-rounded' ) {
                            $typo .= 'border-radius: 0 30px;';
                        }
                    }

                    if( !empty( $typo )) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li > a {'.$typo.'}'."\n";                
                    }

                # Hover State
                    
                    $h_css = '';

                    # Color
                    if( $attrs['hover_item_color'] == 'custom' && !empty( $attrs['hover_custom_item_color'] ) ) {
                        $h_css .= 'color:'.$attrs['hover_custom_item_color'].';';
                    } elseif( $attrs['hover_item_color'] !== 'custom' && $attrs['hover_item_color'] !== 'none' ) {
                        $h_css .= 'color:'.$this->dt_current_skin( $attrs['hover_item_color'] ).';';
                    }

                    if( $attrs['display'] == 'boxed' || $attrs['display'] == 'stretch' ) {

                        # BG Color
                        if( $attrs['style'] == 'filled' ) {
                            if( $attrs['hover_bg_color'] == 'custom' &&  !empty( $attrs['hover_custom_bg_color'] ) ) {
                                $h_css .= 'background-color:'.$attrs['hover_custom_bg_color'].';';
                            } elseif( $attrs['hover_bg_color'] !== 'custom' && $attrs['hover_bg_color'] !== 'none' ) {
                                $h_css .= 'background-color:'.$this->dt_current_skin( $attrs['hover_bg_color'] ).';';
                            }
                        }

                        # Border Color
                        $h_css .= 'border-style:solid; border-width:1px;border-color:transparent;';
                        if( $attrs['hover_border_color'] == 'custom' &&  !empty( $attrs['hover_custom_border_color'] ) ) {
                            $h_css .= 'border-color:'.$attrs['hover_custom_border_color'].';';
                        } elseif( $attrs['hover_border_color'] !== 'custom' && $attrs['hover_border_color'] !== 'none' ) {
                            $h_css .= 'border-color:'.$this->dt_current_skin( $attrs['hover_border_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['h_border_radius'] == 'partially-rounded-alt' ) {
                            $h_css .= 'border-radius: 0 5px;';
                        } elseif( $attrs['h_border_radius'] == 'simple-rounded' ) {
                            $h_css .= 'border-radius: 5px;';
                        } elseif( $attrs['h_border_radius'] == 'partially-rounded' ) {
                            $h_css .= 'border-radius: 5px 0;';
                        } elseif( $attrs['h_border_radius'] == 'fully-rounded' ) {
                            $h_css .= 'border-radius: 0 30px;';
                        }                                                
                    }

                    if( !empty( $h_css )) {
                        $css .= "\n".'
                            div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li:hover > a, 
                            div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li.current_page_item > a, 
                            div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li.current-menu-item > a,
                            div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li.current-page-ancestor > a,
                            div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li.current-menu-ancestor > a {'.$h_css.'}'."\n";                
                    }

                # Sub Menu

                    # Default State
                        $sub_menu_css = '';

                        $sub_menu_css .= !empty( $attrs['sub_menu_font_size'] ) ? 'font-size:'.$attrs['sub_menu_font_size'].'px;' : '';     
                        $sub_menu_css .= ($attrs['sub_menu_text_transform'] !== 'none' ) ? 'text-transform:'.$attrs['sub_menu_text_transform'].';': '';     
                        $sub_menu_css .= (!empty( $attrs['sub_menu_items_align'] ) && $attrs['sub_menu_items_align'] !== 'none' ) ? 'text-align:'.$attrs['sub_menu_items_align'].';': '';

                        # Item Color
                        if( $attrs['sub_menu_default_item_color'] == 'custom' &&  !empty( $attrs['sub_menu_default_custom_item_color'] ) ) {
                            $sub_menu_css .= 'color:'.$attrs['sub_menu_default_custom_item_color'].';';
                        } elseif( $attrs['sub_menu_default_item_color'] !== 'custom' && $attrs['sub_menu_default_item_color'] !== 'none' ) {
                            $sub_menu_css .= 'color:'.$this->dt_current_skin( $attrs['sub_menu_default_item_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['sub_menu_default_border_radius'] == 'partially-rounded-alt' ) {
                            $sub_menu_css .= 'border-radius: 0 10px;';
                        } elseif( $attrs['sub_menu_default_border_radius'] == 'simple-rounded' ) {
                            $sub_menu_css .= 'border-radius: 5px;';
                        } elseif( $attrs['sub_menu_default_border_radius'] == 'partially-rounded' ) {
                            $sub_menu_css .= 'border-radius: 10px 0;';
                        }

                        # BG Color
                        if( $attrs['sub_menu_default_bg_color'] == 'custom' &&  !empty( $attrs['sub_menu_default_custom_bg_color'] ) ) {
                            $sub_menu_css .= 'background-color:'.$attrs['sub_menu_default_custom_bg_color'].';';
                        } elseif( $attrs['sub_menu_default_bg_color'] !== 'custom' && $attrs['sub_menu_default_bg_color'] !== 'none' ) {
                            $sub_menu_css .= 'background-color:'.$this->dt_current_skin( $attrs['sub_menu_default_bg_color'] ).';';
                        }

                        # Border Color
                        if( $attrs['sub_menu_default_border_style'] !== 'none' ) {
                            $sub_menu_css .= 'border-color:transparent; border-style:'.$attrs['sub_menu_default_border_style'].';';
                            $sub_menu_css .= !empty( $attrs['sub_menu_default_border_width'] ) ? 'border-width:'.$attrs['sub_menu_default_border_width'].';' : '1px;';

                            if( $attrs['sub_menu_default_border_color'] == 'custom' &&  !empty( $attrs['sub_menu_default_custom_border_color'] ) ) {
                                $sub_menu_css .= 'border-color:'.$attrs['sub_menu_default_custom_border_color'].';';
                            } elseif( $attrs['sub_menu_default_border_color'] !== 'custom' && $attrs['sub_menu_default_border_color'] !== 'none' ) {
                                $sub_menu_css .= 'border-color:'.$this->dt_current_skin( $attrs['sub_menu_default_border_color'] ).';';
                            }
                        }                           

                        if( !empty( $sub_menu_css ) ) {
                            $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.sub-menu li > a {'.$sub_menu_css.'}'."\n";
                        }

                    # Hover State
                        $sub_menu_h_css = '';

                        # Item Color
                        if( $attrs['sub_menu_hover_item_color'] == 'custom' &&  !empty( $attrs['sub_menu_hover_custom_item_color'] ) ) {
                            $sub_menu_h_css .= 'color:'.$attrs['sub_menu_hover_custom_item_color'].';';
                        } elseif( $attrs['sub_menu_hover_item_color'] !== 'custom' && $attrs['sub_menu_hover_item_color'] !== 'none' ) {
                            $sub_menu_h_css .= 'color:'.$this->dt_current_skin( $attrs['sub_menu_hover_item_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['sub_menu_hover_border_radius'] == 'partially-rounded-alt' ) {
                            $sub_menu_h_css .= 'border-radius: 0 10px;';
                        } elseif( $attrs['sub_menu_hover_border_radius'] == 'simple-rounded' ) {
                            $sub_menu_h_css .= 'border-radius: 5px;';
                        } elseif( $attrs['sub_menu_hover_border_radius'] == 'partially-rounded' ) {
                            $sub_menu_h_css .= 'border-radius: 10px 0;';
                        }

                        # BG Color
                        if( $attrs['sub_menu_hover_bg_color'] == 'custom' &&  !empty( $attrs['sub_menu_hover_custom_bg_color'] ) ) {
                            $sub_menu_h_css .= 'background-color:'.$attrs['sub_menu_hover_custom_bg_color'].';';
                        } elseif( $attrs['sub_menu_hover_bg_color'] !== 'custom' && $attrs['sub_menu_hover_bg_color'] !== 'none' ) {
                            $sub_menu_h_css .= 'background-color:'.$this->dt_current_skin( $attrs['sub_menu_hover_bg_color'] ).';';
                        }

                        # Border Color
                        if( $attrs['sub_menu_hover_border_style'] !== 'none' ) {
                            $sub_menu_h_css .= 'border-color:transparent; border-style:'.$attrs['sub_menu_hover_border_style'].';';
                            $sub_menu_h_css .= !empty( $attrs['sub_menu_hover_border_width'] ) ? 'border-width:'.$attrs['sub_menu_hover_border_width'].';' : '1px;';

                            if( $attrs['sub_menu_hover_border_color'] == 'custom' &&  !empty( $attrs['sub_menu_hover_custom_border_color'] ) ) {
                                $sub_menu_h_css .= 'border-color:'.$attrs['sub_menu_hover_custom_border_color'].';';
                            } elseif( $attrs['sub_menu_hover_border_color'] !== 'custom' && $attrs['sub_menu_hover_border_color'] !== 'none' ) {
                                $sub_menu_h_css .= 'border-color:'.$this->dt_current_skin( $attrs['sub_menu_hover_border_color'] ).';';
                            }
                        }                           

                        if( !empty( $sub_menu_h_css ) ) {
                            $css .= "\n".'
                                div#'.esc_attr( $attrs['el_id'] ).' ul.sub-menu li:hover > a,
                                div#'.esc_attr( $attrs['el_id'] ).' ul.sub-menu li.current-menu-item > a,
                                div#'.esc_attr( $attrs['el_id'] ).' ul.sub-menu li.current-page-item > a {'.$sub_menu_h_css.'}'."\n";
                        }                        

                    # Sub Menu Wrapper                    
                        $wrap_css = '';
                        if( $attrs['submenu_wrapper'] == 'yes' ) {

                            if( $attrs['sub_menu_wrap_border_radius'] == 'partially-rounded-alt' ) {
                                $wrap_css .= 'border-radius: 0 10px;';
                            } elseif( $attrs['sub_menu_wrap_border_radius'] == 'simple-rounded' ) {
                                $wrap_css .= 'border-radius: 5px;';
                            } elseif( $attrs['sub_menu_wrap_border_radius'] == 'partially-rounded' ) {
                                $wrap_css .= 'border-radius: 10px 0;';
                            }

                            if( $attrs['sub_menu_wrap_bg_color'] == 'simple' &&  !empty( $attrs['sub_menu_wrap_simple_bg_color'] ) ) {
                                $wrap_css .= 'background-color:'.$attrs['sub_menu_wrap_simple_bg_color'].';';
                            } else if( $attrs['sub_menu_wrap_bg_color'] == 'gradient' && !empty( $attrs['sub_menu_wrap_gradient_bg_color_1'] ) && !empty( $attrs['sub_menu_wrap_gradient_bg_color_2'] ) ) {
                                $dir_1 = $dir_2 = '';
                                $dir = $attrs['sub_menu_wrap_gradient_direction'];
                                $c1 = $attrs['sub_menu_wrap_gradient_bg_color_1'];
                                $c2 = $attrs['sub_menu_wrap_gradient_bg_color_2'];
                                $c1_stop = '0';
                                $c2_stop = '100';

                                if( $dir == 'to top' ) {
                                    $dir_1 = 'bottom';
                                    $dir_2 =  'left bottom, left top';
                                } elseif( $dir == 'to bottom' ) {
                                    $dir_1 = 'top';
                                    $dir_2 =  'left top, left bottom';
                                } elseif( $dir == 'to right' ) {
                                    $dir_1 = 'left';
                                    $dir_2 =  'left top, right top';
                                } elseif( $dir == 'to left' ) {
                                    $dir_1 = 'right';
                                    $dir_2 =  'right top, left top';
                                } elseif( $dir == 'to top left' ) {
                                    $dir_1 = 'bottom right';
                                    $dir_2 =  'right bottom, left top';
                                } elseif( $dir == 'to top right' ) {
                                    $dir_1 = 'bottom left';
                                    $dir_2 =  'left bottom, right top';
                                } elseif( $dir == 'to bottom right' ) {
                                    $dir_1 = 'top left';
                                    $dir_2 =  'left top, right bottom';
                                } elseif( $dir == 'to bottom left' ) {
                                    $dir_1 = 'top right';
                                    $dir_2 =  'right top, left bottom';
                                }

                                $wrap_css .= 'background:'.$c1.';';

                                /* IE10+ */
                                $wrap_css .= 'background-image: -ms-linear-gradient('. $dir_1.', '.$c1.' '.$c1_stop.'%, '.$c2.' '.$c2_stop.'%);';

                                /* Mozilla Firefox */ 
                                $wrap_css .= 'background-image: -moz-linear-gradient('. $dir_1.', '.$c1.' '.$c1_stop.'%, '.$c2.' '.$c2_stop.'%); ';

                                /* Opera */ 
                                $wrap_css .= 'background-image: -o-linear-gradient('. $dir_1.', '.$c1.' '.$c1_stop.'%, '.$c2.' '.$c2_stop.'%);';

                                /* Webkit (Chrome 11+) */ 
                                $wrap_css .= 'background-image: -webkit-linear-gradient('. $dir_1.', '.$c1.' '.$c1_stop.'%, '.$c2.' '.$c2_stop.'%);';

                                /* Webkit (Safari/Chrome 10) */ 
                                $wrap_css .= 'background-image: -webkit-gradient(linear, '.$dir_2.', color-stop('.$c1_stop.', '.$c1.'), color-stop('.$c2_stop.', '.$c2.'));';

                                /* W3C Markup */ 
                                $wrap_css .= 'background-image: linear-gradient('.$dir.','.$c1.' '. $c1_stop.'%,'.$c2.' '.$c2_stop.'%);';
                            }

                            if( $attrs['submenu_wrapper_border'] == 'yes' ) {
                                $wrap_css .= 'border-style:'.$attrs['submenu_wrapper_border_style'].';';
                                $wrap_css .= !empty( $attrs['submenu_wrapper_border_width'] ) ? 'border-width:'.$attrs['submenu_wrapper_border_width'].';' : '1px;';
                                $wrap_css .= !empty( $attrs['submenu_wrapper_border_color'] ) ? 'border-color:'.$attrs['submenu_wrapper_border_color'].';' : 'transparent;';
                            }

                            if( $attrs['submenu_wrapper_box_shadow'] == 'yes' ) {
                                $wrap_css .= 'box-shadow: 0 0 2px 1px ';
                                $wrap_css .= !empty( $attrs['submenu_wrapper_box_shadow_color'] ) ? ''.$attrs['submenu_wrapper_box_shadow_color'].';' : 'rgba(0,0,0,0.15);';
                            }

                            if( !empty( $wrap_css ) ) {
                                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.sub-menu {'.$wrap_css.'}'."\n";
                            }                            
                        }
                # Sub Menu

                # Main Menu
                    if( !empty( $attrs['item_padding'] )  ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li { padding:'.$attrs['item_padding'].'}'."\n";
                    }

                    if( !empty( $attrs['padding'] ) && $attrs['display'] == 'boxed' ) {
                        $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-primary-nav > li > a {padding:'.$attrs['padding'].'}'."\n";
                    }
                # Main Menu
                            
            return $css;
        }

        function dt_sc_header_menu( $attrs, $content = null ) {
            extract ( shortcode_atts ( array (
                'el_id' => '',
                'nav_id' => '',
                'display' => '',
                'class' => '',
                'visual_nav' => '',
                    'style' => '',
                    'highlighter' => '',
                    'separator' => '',
                    'item_padding'  => '',
                    'padding'   => '',
                            'border_radius' => '',
                            'default_item_color' => '',
                            'default_bg_color' => '',
                            'default_border_color' => '',
                            'default_custom_item_color' => '',
                            'default_custom_bg_color' => '',
                            'default_custom_border_color' => '',
                            'h_border_radius' => '',
                            'hover_item_color' => '',
                            'hover_bg_color' => '',
                            'hover_border_color' => '',
                            'hover_custom_item_color' => '',
                            'hover_custom_bg_color' => '',
                            'hover_custom_border_color' => '',
                        'submenu_indicator' => '',
                        'submenu_wrapper' => '',
                        'sub_menu_default_border_radius' => '',
                        'sub_menu_default_border_style' => '',
                        'sub_menu_default_border_width' => '',
                        'sub_menu_default_item_color' => '',
                        'sub_menu_default_bg_color' => '',
                        'sub_menu_default_border_color' => '',
                        'sub_menu_default_custom_item_color' => '',
                        'sub_menu_default_custom_bg_color' => '',
                        'sub_menu_default_custom_border_color' => '',
                        'sub_menu_hover_border_radius' => '',
                        'sub_menu_hover_border_style' => '',
                        'sub_menu_hover_border_width' => '',
                        'sub_menu_hover_item_color' => '',
                        'sub_menu_hover_bg_color' => '',
                        'sub_menu_hover_border_color' => '',
                        'sub_menu_hover_custom_item_color' => '',
                        'sub_menu_hover_custom_bg_color' => '',
                        'sub_menu_hover_custom_border_color' => '',
                        'sub_menu_wrap_border_radius' => '',
                        'sub_menu_wrap_bg_color' => '',
                        'sub_menu_wrap_simple_bg_color' => '',
                        'sub_menu_wrap_gradient_bg_color_1' => '',
                        'sub_menu_wrap_gradient_bg_color_2' => '',
                        'sub_menu_wrap_gradient_direction' => '',
                        'submenu_wrapper_border' => '',
                        'submenu_wrapper_border_style' => '',
                        'submenu_wrapper_border_width' => '',
                        'submenu_wrapper_border_color' => '',
                        'submenu_wrapper_box_shadow' => '',
                        'submenu_wrapper_box_shadow_color' => '',

                        'use_theme_fonts_for_sub_menu' => '',       
                        'sub_menu_google_fonts' => '',      
                        'sub_menu_font_size' => '',     
                        'sub_menu_items_align' => '',       
                        'sub_menu_text_transform' => '',

                        'mobile_menu_label' => '',
                        'mobile_menu_label_color' => '',

                        'breakpoint' => '',
                        'mobile_menu_position' => '',
                        'mobile_menu_icon_type' => '',
                        'mobile_menu_icon_type_entypo' => '',
                        'mobile_menu_icon_type_fontawesome' => '',
                        'mobile_menu_icon_type_icon_moon_line' => '',
                        'mobile_menu_icon_type_icon_moon_solid' => '',
                        'mobile_menu_icon_type_icon_moon_ultimate' => '',
                        'mobile_menu_icon_type_linecons' => '',
                        'mobile_menu_icon_type_material_design_iconic_font' => '',
                        'mobile_menu_icon_type_material' => '',
                        'mobile_menu_icon_type_monosocial' => '',
                        'mobile_menu_icon_type_openiconic' => '',
                        'mobile_menu_icon_type_pe_icon_7_stroke' => '',
                        'mobile_menu_icon_type_stroke' => '',
                        'mobile_menu_icon_type_typicons' => '',
                        'mobile_menu_icon_color' => '',
                    'use_theme_fonts' => '',
                    'mega_menu_font' => '',
                    'google_fonts' => '',
                    'font_size' => '',
                    'items_align' => '',
                    'text_transform' => '',
                'css' => '',                
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }            

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );

            # Google Font
                
                # Main Menu
                if( $use_theme_fonts != 'yes' ) {

                    $font = $this->dt_google_font( $google_fonts );
                    $style = 'font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';';

                    if( $mega_menu_font != 'yes' ) {
                        $custom_css .= 'div#'.esc_attr( $el_id ).' ul:not(.dt-custom-nav) > li > a{'.$style.'}';
                    } else {
                        $custom_css .= 'div#'.esc_attr( $el_id ).' a {'.$style.'}';
                    }
                }

                # Sub Menu      
                if( $use_theme_fonts_for_sub_menu != 'yes' ) {      
                    $font = $this->dt_google_font( $sub_menu_google_fonts );        
                    $style = 'font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';';     
                    $custom_css .= 'div#'.esc_attr( $el_id ).' ul.sub-menu li > a {'.$style.'}';                            
                }                

            # Mobile Menu
            $custom_css .= '@media only screen and (max-width: '.$breakpoint.'px) {'."\n";
            $custom_css .= '    div#'.esc_attr( $el_id ).'{ display: none; }'."\n";
            $custom_css .= '    div#'.esc_attr( $el_id ).'-mobile { display: block; }'."\n";
            $custom_css .=      !empty( $mobile_menu_label_color ) ? 'div#'.esc_attr( $el_id ).'-mobile .menu-trigger > span {color:'. $mobile_menu_label_color.'}'."\n" : '';
            $custom_css .=      !empty( $mobile_menu_icon_color ) ? 'div#'.esc_attr( $el_id ).'-mobile .menu-trigger > i {color:'. $mobile_menu_icon_color.'}'."\n" : '';
            $custom_css .= '}'."\n";

            $custom_css .= '@media only screen and (min-width: '.( $breakpoint + 1 ).'px) {'."\n";
            $custom_css .= '    div#'.esc_attr( $el_id ).'{ display: inline-block; }'."\n";
            $custom_css .= '    div#'.esc_attr( $el_id ).'.center { display: table; }'."\n";
            $custom_css .= '    div#'.esc_attr( $el_id ).'-mobile, div#'.esc_attr( $el_id ).' li.go-back, div#'.esc_attr( $el_id ).' li.see-all { display: none; }'."\n";
            $custom_css .= '}'."\n";

            # Print Custom CSS
            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }            

            $classes = array(
                'dt-header-menu',
                'mega-menu-page-equal',
                vc_shortcode_custom_css_class( $css, ' ' ),
                $items_align,                
                $class
            );

            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), 'dt_sc_header_menu', $attrs );
            $visual_nav = ( $visual_nav == 'yes' ) ? 'visual-nav' : '';

            $args = array( 'menu' => $nav_id,
                'fallback_cb' => '',
                'container_class' => 'menu-container',
                'items_wrap' => '<ul id="%1$s" class="%2$s"  data-menu="'.esc_attr( $nav_id ).'"> <li class="close-nav"></li> %3$s</ul> <div class="sub-menu-overlay"></div>',
                'menu_class' => 'dt-primary-nav',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'walker' => new DTHeaderMenuWalker(),
            );

            $nav_item_style = '';
            if( $display == 'boxed' || $display == 'stretch' ) {

                $nav_item_style = ' data-nav-item-style="'.esc_attr( $style ).'" ';
            }

            ob_start();
            echo '<div data-menu="'.esc_attr( $nav_id ).'" id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'" data-nav-item-divider="'.esc_attr( $separator ).'" data-nav-item-highlight="'.esc_attr( $highlighter ).'" data-nav-item-display="'.esc_attr( $display ).'"'.$nav_item_style.'>';
            wp_nav_menu( $args );
            echo '</div>';

            # Mobile Menu
            echo '<div id="'.esc_attr( $el_id ).'-mobile" class="mobile-nav-container mobile-nav-offcanvas-'.$mobile_menu_position.'" data-menu="'.esc_attr( $nav_id ).'">';
            echo '  <div class="menu-trigger menu-trigger-icon" data-menu="'.esc_attr( $nav_id ).'">';
                # Mobile Menu Icon
                    vc_icon_element_fonts_enqueue( $mobile_menu_icon_type );
                    echo '<i class="'.${'mobile_menu_icon_type_'.$mobile_menu_icon_type}.'"></i>';

                # Mobile Menu Label
                    echo ( !empty( $mobile_menu_label ) ) ? '<span>'. $mobile_menu_label.'</span>' : '';

            echo '  </div>';
            echo '  <div class="mobile-menu" data-menu="'.esc_attr( $nav_id ).'"></div>';
            echo '  <div class="overlay"></div>';
            echo '</div>';
            # Mobile Menu

            $output = ob_get_clean();
            return $output;
        }    
    }
}

new DTHeaderMenu();