<?php
if (! class_exists ( 'DTCustomMenu' ) ) {
    
    class DTCustomMenu extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_nav_menu', array( $this, 'dt_sc_nav_menu' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];
            
            $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-custom-nav li a {';
                # Typography
                $css .= !empty( $attrs['font_size'] ) ? 'font-size:'.$attrs['font_size'].'px;' : '';
                $css .= !empty( $attrs['text_transform'] ) ? 'text-transform:'.$attrs['text_transform'].';' : '';
            $css .= '}';
            $css .= "\n";

                # Default State
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-custom-nav li a {';

                    # Item Color
                    if( $attrs['default_item_color'] == 'custom' &&  !empty( $attrs['default_custom_item_color'] ) ) {
                        $css .= 'color:'.$attrs['default_custom_item_color'].';';
                    } else {
                        $css .= 'color:'.$this->dt_current_skin( $attrs['default_item_color'] ).';';
                    }

                    # BG Color
                    if( $attrs['default_style'] == 'filled' ) {
                        if( $attrs['default_bg_color'] == 'custom' &&  !empty( $attrs['default_custom_bg_color'] ) ) {
                            $css .= 'background-color:'.$attrs['default_custom_bg_color'].';';
                        } else {
                            $css .= 'background-color:'.$this->dt_current_skin( $attrs['default_bg_color'] ).';';
                        }
                    }

                    if( $attrs['default_style'] == 'bordered' || $attrs['default_style'] == 'filled' ) {

                        # Border Color
                        $css .= 'border-style:solid; border-width:1px;';
                        if( $attrs['default_border_color'] == 'custom' &&  !empty( $attrs['default_custom_border_color'] ) ) {
                            $css .= 'border-color:'.$attrs['default_custom_border_color'].';';
                        } else {
                            $css .= 'border-color:'.$this->dt_current_skin( $attrs['default_border_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['default_border_radius'] == 'square' ) {
                            $css .= 'border-radius: 0;';
                        } elseif( $attrs['default_border_radius'] == 'partially-rounded-alt' ) {
                            $css .= 'border-radius: 0 10px;';
                        } elseif( $attrs['default_border_radius'] == 'simple-rounded' ) {
                            $css .= 'border-radius: 5px;';
                        } elseif( $attrs['default_border_radius'] == 'partially-rounded' ) {
                            $css .= 'border-radius: 10px 0;';
                        } elseif( $attrs['default_border_radius'] == 'fully-rounded' ) {
                            $css .= 'border-radius: 20px;';
                        }
                    }
                $css .= '}';
                $css .= "\n";

                # Hover State
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul.dt-custom-nav li a:hover {';

                    # Item Color
                    if( $attrs['hover_item_color'] == 'custom' &&  !empty( $attrs['hover_custom_item_color'] ) ) {
                        $css .= 'color:'.$attrs['hover_custom_item_color'].';';
                    } else {
                        $css .= 'color:'.$this->dt_current_skin( $attrs['hover_item_color'] ).';';
                    }

                    # BG Color
                    if( $attrs['hover_style'] == 'filled' ) {
                        if( $attrs['hover_bg_color'] == 'custom' &&  !empty( $attrs['hover_custom_bg_color'] ) ) {
                            $css .= 'background-color:'.$attrs['hover_custom_bg_color'].';';
                        } else {
                            $css .= 'background-color:'.$this->dt_current_skin( $attrs['hover_bg_color'] ).';';
                        }
                    }

                    if( $attrs['hover_style'] == 'bordered' || $attrs['hover_style'] == 'filled' ) {

                        # Border Color
                        $css .= ( $attrs['hover_style'] == 'bordered' ) ? 'background-color: rgba(0,0,0,0);' : '';
                        $css .= 'border-style:solid; border-width:1px;';
                        if( $attrs['hover_border_color'] == 'custom' &&  !empty( $attrs['hover_custom_border_color'] ) ) {
                            $css .= 'border-color:'.$attrs['hover_custom_border_color'].';';
                        } else {
                            $css .= 'border-color:'.$this->dt_current_skin( $attrs['hover_border_color'] ).';';
                        }

                        # Border Radius
                        if( $attrs['hover_border_radius'] == 'square' ) {
                            $css .= 'border-radius: 0;';
                        } elseif( $attrs['hover_border_radius'] == 'partially-rounded-alt' ) {
                            $css .= 'border-radius: 0 10px;';
                        } elseif( $attrs['hover_border_radius'] == 'simple-rounded' ) {
                            $css .= 'border-radius: 5px;';
                        } elseif( $attrs['hover_border_radius'] == 'partially-rounded' ) {
                            $css .= 'border-radius: 10px 0;';
                        } elseif( $attrs['hover_border_radius'] == 'fully-rounded' ) {
                            $css .= 'border-radius: 20px;';
                        }
                    }
                $css .= '}';
                $css .= "\n";

            # Divider
            if( isset( $attrs['divider_style_type'] ) && $attrs['divider_style_type'] == 'custom-style' ) {

                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' .dt-custom-nav li span.divider:after, .dt-custom-nav-wrapper.inline-vertical[data-divider="yes"] .dt-custom-nav li.menu-item-has-children ul.sub-menu:before {';
                    $css .= 'content: "";';
                    $css .= 'border-style:'.$attrs['divider'].';';
                    if( isset( $attrs['inline_style'] ) && $attrs['inline_style'] == 'inline-horizontal' ) {
                        $css .= 'border-width:0 '.$attrs['divider_width'].' 0 0;';
                    } elseif( isset( $attrs['inline_style'] ) && $attrs['inline_style'] == 'inline-vertical' ) {
                        $css .= 'border-width:0 0 '.$attrs['divider_width'].' 0;';
                    }
                    $css .= !empty( $attrs['divider_color'] ) ? 'border-color:'.$attrs['divider_color'].';' : '';
                $css .= '}';
                $css .= "\n";
            }

            # Icon
            if( $attrs['list_style_type'] == 'none' ) {
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' i.menu-item-icon { display:none; }';
            } elseif( $attrs['list_style_type'] == 'predefined' ) {
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' ul {';
                    $css .= 'list-style-position:'.$attrs['list_style_position'].';';
                    $css .= 'list-style-type:'.$attrs['list_style'].';';
                $css .= '}';
                $css .= "\n";
            } elseif( $attrs['list_style_type'] == 'custom-style' ) {

                $css .= "\n".'div[id="'.esc_attr( $attrs['el_id'] ).'"] > div > ul i.menu-item-icon,
                div[id="'.esc_attr( $attrs['el_id'] ).'"].dt-custom-nav-wrapper[data-link-icon-position="inside"] .dt-custom-nav li a > i.menu-item-icon, 
                div[id="'.esc_attr( $attrs['el_id'] ).'"].dt-custom-nav-wrapper[data-link-icon-position="outside"] .dt-custom-nav li a > i.menu-item-icon {';                
                    $css .= !empty( $attrs['icon_size'] ) ? 'font-size:'.$attrs['icon_size'].'px;' : '';
                    $css .= !empty( $attrs['icon_width'] ) ? 'width:'.$attrs['icon_width'].'px;' : '';

                    if( $attrs['icon_color'] == 'custom' && !empty( $attrs['icon_custom_color'] ) ) {
                        $css .= 'color:'.$attrs['icon_custom_color'].';';
                    } else {
                        $css .= 'color:'.$this->dt_current_skin( $attrs['icon_color'] ).';';
                    }

                    $css .= !empty( $attrs['icon_padding'] ) ? 'padding:'.$attrs['icon_padding'].';' : '';
                    $css .= !empty( $attrs['icon_margin'] ) ? 'margin:'.$attrs['icon_margin'].';' : '';
                $css .= '}';

                if( !empty( $attrs['icon_image_size'] ) ) {

                    $css .= "\n".'div[id="'.esc_attr( $attrs['el_id'] ).'"] > div > ul i.menu-item-icon img { width:'. $attrs['icon_image_size'] .'px }';
                }
            }           

            return $css;            
        }

        function dt_sc_nav_menu( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',

                'nav_id'    => '',

                'display_style' => '',
                'inline_style'  => '',

                'divider_style_type'    => '',
                'divider_style' => '',
                'divider'   => '',
                'divider_width' => '',
                'divider_color' => '',

                'list_style_type'   => '',
                'list_style_position'   => '',
                'list_style'    => '',

                'icon_size' => '',
                'icon_color'    => '',
                'icon_custom_color' => '',
                'icon_image_size'   => '',
                'icon_width'    => '',
                'icon_padding'  => '',
                'icon_margin'   => '',

                'default_style' => '',
                'default_border_radius' => '',
                'default_item_color'    => '',
                'default_custom_item_color' => '',
                'default_bg_color'  => '',
                'default_custom_bg_color'  => '',
                'default_border_color'  => '',
                'default_custom_border_color'  => '',
                'default_text_decoration'   => '',

                'hover_style'   => '',
                'hover_border_radius'   => '',
                'hover_item_color'  => '',
                'hover_custom_item_color' => '',
                'hover_bg_color'    => '',
                'hover_custom_bg_color'  => '',
                'hover_border_color'    => '',
                'hover_custom_border_color'  => '',
                'hover_text_decoration' => '',

                'use_theme_fonts'   => '',
                'google_fonts'  => '',

                'font_size' => '',
                'items_align'   => '',
                'text_transform'    => '',

                'class' => '',
                'css'   => '',                
            ), $attrs ) );


            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );

            # Google Font
            if( $use_theme_fonts != 'yes' ) {
                $font = $this->dt_google_font( $google_fonts );
                $custom_css .= 'div#'.esc_attr( $el_id ).' a { font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';}';
            }
            # Google Font
            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }
            # Custom CSS
            

            $classes = array(
                'dt-custom-nav-wrapper',
                $class,
                vc_shortcode_custom_css_class( $css, ' ' ),
                $items_align,
            );

            # Display Style
            if( $display_style == 'inline' ) {
                $classes[] = $inline_style;
            }


            $css_class = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $classes ) ), 'dt_sc_nav_menu', $attrs ) );

            $args = array( 'menu' => $nav_id,
                'menu_class' => 'custom-sub-nav dt-custom-nav',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'walker' => new DTMenuWalker(),
                'link_before' => '<span>',
                'link_after' => '</span>',
                'fallback_cb' => ''
            );

            # Divider
            if( $divider_style_type != 'none' ) {

                $d_class  = 'divider';
                $d_class .= ( $divider_style_type == 'predefined' ) ? ' '.$divider_style : ''; 
                $args['after'] = '<span class="'.esc_attr( $d_class ).'"></span>';
            }

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'"';
            echo    ( $default_style == 'none' ) ? ' data-default-style = "none"' : '';
            echo    ( $hover_style == 'none' ) ? ' data-hover-style = "none"' : '';
            echo    !empty( $list_style_position ) ? ' data-link-icon-position = "'.esc_attr( $list_style_position ).'"' : '';
            echo    !empty( $list_style ) ? ' data-link-icon-style = "'.esc_attr( $list_style ).'"' : '';
            echo    !empty( $default_text_decoration ) ? ' data-default-decoration = "'.esc_attr( $default_text_decoration ).'"' : '';
            echo    !empty( $hover_text_decoration ) ? ' data-hover-decoration = "'.esc_attr( $hover_text_decoration ).'"' : '';
            echo    ( $divider_style_type != 'none' ) ? ' data-divider = "yes"' : '';
            echo '>';
            wp_nav_menu( $args );
            echo '</div>';

            $output = ob_get_clean();
            return $output;
        }        
    }
}

new DTCustomMenu();