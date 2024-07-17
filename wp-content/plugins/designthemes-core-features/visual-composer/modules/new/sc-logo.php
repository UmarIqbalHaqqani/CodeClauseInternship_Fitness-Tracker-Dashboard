<?php
if (! class_exists ( 'DTLogo' ) ) {
    
    class DTLogo extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_logo', array( $this, 'dt_sc_logo' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = $breakpoint_css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            if( ( $attrs['logo_type'] == 'text' || $attrs['logo_type'] == 'text-desc' ) && !empty( $attrs['logo_text'] ) ) {

                $font_style  = !empty( $attrs['font_size'] ) ? 'font-size:'.$attrs['font_size'].'px;' : '';
                $font_style .= !empty( $attrs['line_height'] ) ? 'line-height:'.$attrs['line_height'].'px;' : '';
                $font_style .= !empty( $attrs['letter_spacing'] ) ? 'letter-spacing:'.$attrs['letter_spacing'].'px;' : '';

                # Color
                    $t_color = '';
                    if( $attrs['default_item_color'] == 'custom' &&  !empty( $attrs['default_custom_item_color'] ) ) {
                        $t_color = $attrs['default_custom_item_color'];
                    } else {
                        $t_color = $this->dt_current_skin( $attrs['default_item_color'] );
                    }
                    $font_style .= ( !empty( $t_color ) ) ? 'color:'.$t_color.';' : '';

                # BG Color
                    $t_bg_color = '';
                    if( $attrs['default_bg_color'] == 'custom' &&  !empty( $attrs['default_custom_bg_color'] ) ) {
                        $t_bg_color = $attrs['default_custom_bg_color'];
                    } else {
                        $t_bg_color = $this->dt_current_skin( $attrs['default_bg_color'] );
                    }
                    $font_style .= ( !empty( $t_bg_color ) ) ? 'background-color:'.$t_bg_color.'; padding:4px;' : '';

                # Border Color
                    $t_border_color = '';
                    if( $attrs['default_border_color'] == 'custom' &&  !empty( $attrs['default_custom_border_color'] ) ) {
                        $t_border_color = $attrs['default_custom_border_color'];
                    } else {
                        $t_border_color = $this->dt_current_skin( $attrs['default_border_color'] );
                    }
                    $font_style .= ( !empty( $t_border_color ) ) ? 'border-style:solid; border-width:1px; border-color:'.$t_border_color.'; padding:4px;' : '';

                $css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.site-title {'.$font_style.'}' : '';

                if( !empty( $attrs['breakpoint'] ) ) {

                    $font_style  = !empty( $attrs['m_font_size'] ) ? 'font-size:'.$attrs['m_font_size'].'px;' : '';
                    $font_style .= !empty( $attrs['m_line_height'] ) ? 'line-height:'.$attrs['m_line_height'].'px;' : '';
                    $font_style .= !empty( $attrs['m_letter_spacing'] ) ? 'letter-spacing:'.$attrs['m_letter_spacing'].'px;' : '';

                    $breakpoint_css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.site-title {'.$font_style.'}' : '';
                }
            }

            if( $attrs['logo_type'] == 'text-desc' && !empty( $attrs['logo_tagline'] ) ) {

                $font_style  = !empty( $attrs['desc_font_size'] ) ? 'font-size:'.$attrs['desc_font_size'].'px;' : '';
                $font_style .= !empty( $attrs['desc_line_height'] ) ? 'line-height:'.$attrs['desc_line_height'].'px;' : '';
                $font_style .= !empty( $attrs['desc_letter_spacing'] ) ? 'letter-spacing:'.$attrs['desc_letter_spacing'].'px;' : '';

                # Color
                    $t_color = '';
                    if( $attrs['desc_default_item_color'] == 'custom' &&  !empty( $attrs['desc_default_custom_item_color'] ) ) {
                        $t_color = $attrs['desc_default_custom_item_color'];
                    } else {
                        $t_color = $this->dt_current_skin( $attrs['desc_default_item_color'] );
                    }
                    $font_style .= ( !empty( $t_color ) ) ? 'color:'.$t_color.';' : '';

                # BG Color
                    $t_bg_color = '';
                    if( $attrs['desc_default_bg_color'] == 'custom' &&  !empty( $attrs['desc_default_custom_bg_color'] ) ) {
                        $t_bg_color = $attrs['desc_default_custom_bg_color'];
                    } else {
                        $t_bg_color = $this->dt_current_skin( $attrs['desc_default_bg_color'] );
                    }
                    $font_style .= ( !empty( $t_bg_color ) ) ? 'background-color:'.$t_bg_color.'; padding:4px;' : '';

                # Border Color
                    $t_border_color = '';
                    if( $attrs['desc_default_border_color'] == 'custom' &&  !empty( $attrs['desc_default_custom_border_color'] ) ) {
                        $t_border_color = $attrs['desc_default_custom_border_color'];
                    } else {
                        $t_border_color = $this->dt_current_skin( $attrs['desc_default_border_color'] );
                    }
                    $font_style .= ( !empty( $t_border_color ) ) ? 'border-style:solid; border-width:1px; border-color:'.$t_border_color.'; padding:4px;' : '';                

                $css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.site-description {'.$font_style.'}' : '';

                if( !empty( $attrs['breakpoint'] ) ) {

                    $font_style  = !empty( $attrs['m_desc_font_size'] ) ? 'font-size:'.$attrs['m_desc_font_size'].'px;' : '';
                    $font_style .= !empty( $attrs['m_desc_line_height'] ) ? 'line-height:'.$attrs['m_desc_line_height'].'px;' : '';
                    $font_style .= !empty( $attrs['m_desc_letter_spacing'] ) ? 'letter-spacing:'.$attrs['m_desc_letter_spacing'].'px;' : '';

                    $breakpoint_css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.site-description {'.$font_style.'}' : '';                    
                }
            }

            if( $attrs['logo_type'] == 'theme-logo' || $attrs['logo_type'] == 'custom-image' ) {

                $css .= !empty( $attrs['image_width'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' img { width:'.$attrs['image_width'].'px;}' : '';
                if( !empty( $attrs['breakpoint'] ) && !empty( $attrs['m_image_width'] ) ) {
                    $breakpoint_css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' img { width:'.$attrs['m_image_width'].'px; }';
                }
            }

            if( !empty( $attrs['breakpoint'] ) && !empty( $breakpoint_css ) ) {
               $css .= "\n".'@media only screen and (max-width: '.$attrs['breakpoint'].'px) {' . $breakpoint_css."\n".'}';
            }          

            return $css;
        }

        function dt_sc_logo( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'logo_type' => '',
                'theme_logo_type' => '',
                'image' => '',
                'image_width' => '',
                'm_image_width' => '',
                'logo_text' => '',
                'logo_tagline' => '',
                'item_align' => '',
                'breakpoint' => '',
                
                'desc_default_item_color' => '',
                'desc_default_bg_color' => '',
                'desc_default_border_color' => '',
                'desc_default_custom_item_color' => '',
                'desc_default_custom_bg_color' => '',
                'desc_default_custom_border_color' => '',
                
                'desc_default_item_color' => '',
                'desc_default_bg_color' => '',
                'desc_default_border_color' => '',
                'desc_default_custom_item_color' => '',
                'desc_default_custom_bg_color' => '',
                'desc_default_custom_border_color' => '',
                
                'use_theme_fonts' => '',
                'google_fonts' => '',
                'font_size' => '',
                'line_height' => '',
                'letter_spacing' => '',
                'm_font_size' => '',
                'm_line_height' => '',
                'm_letter_spacing' => '',
                
                'use_theme_fonts_for_desc' => '',
                'google_fonts_for_desc' => '',
                'desc_font_size' => '',
                'desc_line_height' => '',
                'desc_letter_spacing' => '',
                'm_desc_font_size' => '',
                'm_desc_line_height' => '',
                'm_desc_letter_spacing' => '',
                
                'class' => '',
                'css' => '',                
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array( 
                'dt-logo-container',
                'logo-align-'.$item_align,
                $class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_logo', $attrs ) );

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );            

            # OUTPUT
            $logo = '';

            if( ( $logo_type == 'text' || $logo_type == 'text-desc' ) && !empty( $logo_text ) ) {

                $logo .= !empty( $logo_text ) ?  '<span class="site-title">'. $logo_text .'</span>' : '';

                if( $use_theme_fonts != 'yes' ) {
                    $font = $this->dt_google_font( $google_fonts );
                    $custom_css .= "\n".'div#'.esc_attr( $el_id ).' span.site-title { font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';}';
                }
            }

            if( $logo_type == 'text-desc' && !empty( $logo_tagline ) ) {

                $logo .= !empty( $logo_tagline ) ?  '<span class="site-description">' . $logo_tagline . '</span>' : '';

                if( $use_theme_fonts_for_desc != 'yes' ) {
                    $font = $this->dt_google_font( $google_fonts_for_desc );
                    $custom_css .= "\n".'div#'.esc_attr( $el_id ).' span.site-description { font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';}';
                }
            }

            if( $logo_type == 'theme-logo' ) {

                if( $theme_logo_type == 'logo' ) {
                    $url = get_theme_mod( 'custom-logo', maruthi_defaults( 'custom-logo' ) );
                } elseif( $theme_logo_type == 'light-logo' ) {
                    $url = get_theme_mod( 'custom-light-logo', maruthi_defaults( 'custom-light-logo' ) );                    
                }

                $logo = '<img src="'.esc_url( $url ).'" alt="'.esc_attr( get_bloginfo('name') ).'"/>';
            }

            if( $logo_type == 'custom-image' ) {

                $logo = wp_get_attachment_image($image, 'full');
            }

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';
            echo '  <a href="'.esc_url( home_url( '/' ) ).'" rel="home">'.$logo.'</a>';
            echo '</div>';

            $output = ob_get_clean();
            # OUTPUT
            
            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }

            return $output;            
        }        
    }
}

new DTLogo();