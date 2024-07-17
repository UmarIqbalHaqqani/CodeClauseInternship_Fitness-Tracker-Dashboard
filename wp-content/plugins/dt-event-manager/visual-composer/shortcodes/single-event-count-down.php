<?php
if (! class_exists ( 'DTEventSingleCountDown' ) ) {
    
    class DTEventSingleCountDown extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_single_countdown', array( $this, 'dt_sc_event_single_countdown' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_single_countdown_event_id_callback', array( $this, 'dt_event_id_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_single_countdown_event_id_render', array( $this, 'dt_event_id_render' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = $breakpoint_css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            # Title
                $css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' div.dt-sc-event-title {';
                    if( $attrs['use_theme_fonts_for_event_title'] != 'yes' ) {
                        $title_font = $this->dt_google_font( $attrs['google_fonts_for_event_title'] );
                        $css .= 'font-family:'.$title_font['font-family'].';';
                        $css .= 'font-weight:'.$title_font['font-weight'].';';
                        $css .= 'font-style:'.$title_font['font-style'].';';
                    }

                    $css .=  ( isset( $attrs['font_size_for_event_title'] ) ) ? 'font-size:'.(int) $attrs['font_size_for_event_title'].'px;' : '';
                    $css .=  ( isset( $attrs['line_height_for_event_title'] ) ) ? 'line-height:'.(int) $attrs['line_height_for_event_title'].'px;' : '';
                    $css .=  ( isset( $attrs['letter_spacing_for_event_title'] ) ) ? 'letter-spacing:'.(int) $attrs['letter_spacing_for_event_title'].'px;' : '';
                $css.= '}';

                if( !empty( $attrs['breakpoint'] ) ) {

                    $m_css =  ( isset( $attrs['m_font_size_for_event_title'] ) ) ? 'font-size:'.(int) $attrs['m_font_size_for_event_title'].'px;' : '';
                    $m_css .=  ( isset( $attrs['m_line_height_for_event_title'] ) ) ? 'line-height:'.(int) $attrs['m_line_height_for_event_title'].'px;' : '';
                    $m_css .=  ( isset( $attrs['m_letter_spacing_for_event_title'] ) ) ? 'letter-spacing:'.(int) $attrs['m_letter_spacing_for_event_title'].'px;' : '';

                    $breakpoint_css .= !empty( $m_css ) ? "\n\t".'div#'.esc_attr( $attrs['el_id'] ).' div.dt-sc-event-title {'.$m_css.'}' : '';
                }

                if( !empty( $attrs['breakpoint'] ) && !empty( $breakpoint_css ) ) {
                    $css .= "\n".'@media only screen and (max-width: '.$attrs['breakpoint'].'px) {' . $breakpoint_css."\n".'}';
                }

            return $css;
        }

        function dt_sc_event_single_countdown( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'event_id' => '',
                'show_category' => '',
                'show_location' => '',
                'show_instructor' => '',
                'date_format' => '',
                'breakpoint' => '',

                # Typo
                    # Title
                        'use_theme_fonts_for_event_title' => '',
                        'google_fonts_for_event_title' => '',
                        'use_theme_fonts_for_event_title' => '',
                        'font_size_for_event_title' => '',
                        'line_height_for_event_title' => '',
                        'letter_spacing_for_event_title' => '',
                        'm_font_size_for_event_title' => '',
                        'm_line_height_for_event_title' => '',
                        'm_letter_spacing_for_event_title' => '',

                    # Meta
                        'use_theme_fonts_for_event_meta' => '',
                        'google_fonts_for_event_meta' => '',
                        'use_theme_fonts_for_event_meta' => '',
                        'font_size_for_event_meta' => '',
                        'line_height_for_event_meta' => '',
                        'letter_spacing_for_event_meta' => '',
                        'm_font_size_for_event_meta' => '',
                        'm_line_height_for_event_meta' => '',
                        'm_letter_spacing_for_event_meta' => '', 

                    # Content
                        'use_theme_fonts_for_event_content' => '',
                        'google_fonts_for_event_content' => '',
                        'use_theme_fonts_for_event_content' => '',
                        'font_size_for_event_content' => '',
                        'line_height_for_event_content' => '',
                        'letter_spacing_for_event_content' => '',
                        'm_font_size_for_event_content' => '',
                        'm_line_height_for_event_content' => '',
                        'm_letter_spacing_for_event_content' => '',                                                            
                
                    # Calender
                        'use_theme_fonts_for_event_callender' => '',
                        'google_fonts_for_event_callender' => '',
                        'use_theme_fonts_for_event_callender' => '',
                        'font_size_for_event_callender' => '',
                        'line_height_for_event_callender' => '',
                        'letter_spacing_for_event_callender' => '',
                        'm_font_size_for_event_callender' => '',
                        'm_line_height_for_event_callender' => '',
                        'm_letter_spacing_for_event_callender' => '',                

                'el_class' => '',
                'css' => ''
            ), $attrs ) );

            if( empty( $event_id ) )
                return;

            wp_enqueue_script( 'jquery.downCount',  plugins_url('dt-event-manager') . '/js/front/jquery.downCount.js', array('jquery'), null, false );            

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-single-event',
                'dt-sc-single-event-counter-style',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_event_single_countdown', $attrs ) );

            # Custom CSS
            #$custom_css = '';
            #$custom_css .= $this->dt_generate_css( $attrs );
            #if( !empty( $custom_css ) ) {
            #    $this->dt_print_css( $custom_css ); 
            #}

            $event = get_post( (int) $event_id );
            $settings = get_post_meta ( $event_id, '_custom_settings', TRUE );
            $settings = is_array ( $settings ) ? $settings : array ();

            # date
            if( isset( $settings['start-date'] ) ) {

                $start = $settings['start-date'];

                $date = '<p class="dt-sc-event-date">';
                $date .=    date_i18n( $date_format, strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) );
                $date .= '</p>';

                $counter_date = date_i18n( 'm/d/y g:i:s', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) );
            }

            ob_start();
            echo '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';

                # Meta
                echo '<div class="dt-sc-event-meta">';
			
					echo '<h3 class="dt-sc-event-title"> <a href="'.esc_url( get_the_permalink( $event_id ) ).'">'.$event->post_title.'</a> </h3>';

                    echo $date;

                    if( $show_category == 'yes' ) {
                        echo $this->dt_show_event_category( $event_id );
                    }

                    if( $show_location == 'yes' ) {
                        echo $this->dt_show_event_venue( $event_id );
                    }

                    if( $show_instructor == 'yes' ) {
                        echo $this->dt_show_event_organizers( $event_id );
                    }
                    
                echo '</div>';

                # Counter
                echo '<div class="dt-sc-event-counter">';
                    echo '<div class="dt-sc-counter-wrapper">';
                        echo '<div class="counter-icon-wrapper">';
                            echo '<div class="dt-sc-counter-number days">00</div>';
                        echo '</div>';
                        echo '<h3 class="title">'.esc_html__('Days', 'dt-event-manager').'</h3>';
                    echo '</div>';
                    echo '<div class="dt-sc-counter-wrapper">';
                        echo '<div class="counter-icon-wrapper">';
                            echo '<div class="dt-sc-counter-number hours">00</div>';
                        echo '</div>';
                        echo '<h3 class="title">'.esc_html__('Hours', 'dt-event-manager').'</h3>';
                    echo '</div>';
                    echo '<div class="dt-sc-counter-wrapper">';
                        echo '<div class="counter-icon-wrapper">';
                            echo '<div class="dt-sc-counter-number minutes">00</div>';
                        echo '</div>';
                        echo '<h3 class="title">'.esc_html__('Minutes', 'dt-event-manager').'</h3>';
                    echo '</div>';
                    echo '<div class="dt-sc-counter-wrapper last">';
                        echo '<div class="counter-icon-wrapper">';
                            echo '<div class="dt-sc-counter-number seconds">00</div>';
                        echo '</div>';
                        echo '<h3 class="title">'.esc_html__('Seconds', 'dt-event-manager').'</h3>';
                    echo '</div>';
                echo '</div>';

            echo '</div>';?>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    var ele = jQuery("#<?php echo $el_id ?> .dt-sc-event-counter");
                    ele.downCount({ date : '<?php echo $counter_date; ?>'});
                });
            </script><?php
            $output = ob_get_clean();

            return $output;            
        }      
    }
}

new DTEventSingleCountDown();