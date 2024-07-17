<?php
if (! class_exists ( 'DTNote' ) ) {
    
    class DTNote extends DTBaseSC {

        function __construct() {

            add_shortcode( 'dt_sc_note', array( $this, 'dt_sc_note' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = $breakpoint_css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];


            if( ( $attrs['note_type'] == 'title' || $attrs['note_type'] == 'title-and-sub-title' ) && ( !empty( $attrs['title'] ) ) ) {

                $font_style  = !empty( $attrs['font_size'] ) ? 'font-size:'.$attrs['font_size'].'px;' : '';
                $font_style .= !empty( $attrs['line_height'] ) ? 'line-height:'.$attrs['line_height'].'px;' : '';
                $font_style .= !empty( $attrs['letter_spacing'] ) ? 'letter-spacing:'.$attrs['letter_spacing'].'px;' : '';

                $css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.title {'.$font_style.'}' : '';

                if( !empty( $attrs['breakpoint'] ) ) {
                    $font_style  = !empty( $attrs['m_font_size'] ) ? 'font-size:'.$attrs['m_font_size'].'px;' : '';
                    $font_style .= !empty( $attrs['m_line_height'] ) ? 'line-height:'.$attrs['m_line_height'].'px;' : '';
                    $font_style .= !empty( $attrs['m_letter_spacing'] ) ? 'letter-spacing:'.$attrs['m_letter_spacing'].'px;' : '';

                    $breakpoint_css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.title {'.$font_style.'}'."\n" : '';
                }
            }

            if(  $attrs['note_type'] == 'title-and-sub-title' && ( !empty(  $attrs['sub_title'] ) ) ) {

                $font_style  = !empty( $attrs['sub_title_font_size'] ) ? 'font-size:'.$attrs['sub_title_font_size'].'px;' : '';
                $font_style .= !empty( $attrs['sub_title_line_height'] ) ? 'line-height:'.$attrs['sub_title_line_height'].'px;' : '';
                $font_style .= !empty( $attrs['sub_title_letter_spacing'] ) ? 'letter-spacing:'.$attrs['sub_title_letter_spacing'].'px;' : '';

                $css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.sub-title {'.$font_style.'}' : '';

                if( !empty( $attrs['breakpoint'] ) ) {
                    $font_style  = !empty( $attrs['m_sub_title_font_size'] ) ? 'font-size:'.$attrs['m_sub_title_font_size'].'px;' : '';
                    $font_style .= !empty( $attrs['m_sub_title_line_height'] ) ? 'line-height:'.$attrs['m_sub_title_line_height'].'px;' : '';
                    $font_style .= !empty( $attrs['m_sub_title_letter_spacing'] ) ? 'letter-spacing:'.$attrs['m_sub_title_letter_spacing'].'px;' : '';

                    $breakpoint_css .= !empty( $font_style ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' span.sub-title {'.$font_style.'}'."\n" : '';
                }                
            }

            if( !empty( $attrs['breakpoint'] ) && !empty( $breakpoint_css ) ) {
               $css .= "\n".'@media only screen and (max-width: '.$attrs['breakpoint'].'px) {' . $breakpoint_css."\n".'}';
            }

            return $css;
        }

        function dt_sc_note( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                
                'note_type' => '',
                'title' => '',
                'sub_title' => '',
                'breakpoint' => '',
                'agenda' => '',
                
                'use_theme_fonts' => '',
                'google_fonts' => '',
                'font_size' => '',
                'line_height' => '',
                'letter_spacing' => '',
                'm_font_size' => '',
                'm_line_height' => '',
                'm_letter_spacing' => '',
                
                'use_theme_fonts_for_sub_title' => '',
                'google_fonts_for_sub_title' => '',
                'sub_title_font_size' => '',
                'sub_title_line_height' => '',
                'sub_title_letter_spacing' => '',
                'm_sub_title_font_size' => '',
                'm_sub_title_line_height' => '',
                'm_sub_title_letter_spacing' => '',
                
                'class' => '',
                'css' => ''                
            ), $attrs ) );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array( 
                'dt-sc-note-wrapper',
                vc_shortcode_custom_css_class( $css, ' ' ),
                $class
            );
            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_note', $attrs ) );

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );

            # OUTPUT
            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';

                if( ( $note_type == 'title' || $note_type == 'title-and-sub-title' ) && ( !empty( $title ) ) ) {
                    echo '<span class="title">'.esc_html( $title ).'</span>';

                    if( $use_theme_fonts != 'yes' ) {

                        $font = $this->dt_google_font( $google_fonts );
                        $custom_css .= "\n".'div#'.esc_attr( $el_id ).' span.title { font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';}';
                    }                    
                }

                if( $note_type == 'title-and-sub-title' && ( !empty( $sub_title ) ) ) {
                    echo '<span class="sub-title">'.esc_html( $sub_title ).'</span>';

                    if( $use_theme_fonts_for_sub_title != 'yes' ) {

                        $font = $this->dt_google_font( $google_fonts_for_sub_title );
                        $custom_css .= "\n".'div#'.esc_attr( $el_id ).' span.sub-title { font-family:'.$font['font-family'].'; font-weight:'.$font['font-weight'].'; font-style:'.$font['font-style'].';}';                        
                    }                    
                }

                if( !empty( $agenda ) ) {

                    $agenda = (array) vc_param_group_parse_atts( $agenda );
                    echo '<ul class="dt-sc-agenda-list">';
                    foreach( $agenda as $key => $value ) {

                        if( !empty( $value['title'] ) && ( !empty( $value['value'] ) ) ) {
                            echo '<li>';
                            echo '  <span>' . $value['title'] . '</span>';
                            echo '  <span>' . $value['value'] . '</span>';
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
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

new DTNote();                        