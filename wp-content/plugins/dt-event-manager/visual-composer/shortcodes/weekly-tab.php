<?php
if (! class_exists ( 'DTEventWeeklyTab' ) ) {
    
    class DTEventWeeklyTab extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_weekly_tab', array( $this, 'dt_sc_event_weekly_tab' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_weekly_tab_event_category_callback', array( $this, 'dt_event_category_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_weekly_tab_event_category_render', array( $this, 'dt_event_category_render' ) );
        }

        function events_list( $events, $arg ) {

            $output = '';

            if( count( $events ) > 0 ) {

                $days = array();
                foreach( $events as $event ) {
                    $key = date_i18n('Y-n-j',strtotime( $event['start'] ) );
                    $days[$key][] = $event;
                }

                $output .= '<div class="dt-sc-events-weekly-tab-list">';
                    $output .= '<div class="dt-sc-tabs-horizontal-frame-container type5 alter">';

                        $output .= '<ul class="event-weekly-tab-nav dt-sc-tabs-horizontal-frame">';
                            foreach( array_keys( $days ) as $key => $day ) {
                                $class = ( $key == 0 ) ? 'current' : '';
                                $output .= '<li><a href="#" class="'.esc_attr( $class ).'">'.date_i18n( 'l', strtotime($day) ).'</a></li>';
                            }
                        $output .= '</ul>';

                        foreach( $days as $day => $events ) {
                            $output .= '<div class="dt-sc-tabs-horizontal-frame-content">';
                                $output .= '<table>';
                                    $output .= '<thead>';
                                        $output .= '<tr>';
                                            $output .= '<th> <span class="fa fa-calendar"></span>'.date_i18n( $arg['date_format'], strtotime( $day ) ).'</th>';
                                            $output .= ( $arg['show_duration'] == 'yes' ) ? '<th></th>' : '';
                                            $output .= '<th></th>';
                                            $output .= ( $arg['show_location'] == 'yes' ) ? '<th> <span class="fa fa-map-marker"></span>'.__('Location', 'dt-event-manager' ).'</th>' : '';
                                            $output .= ( $arg['show_instructor'] == 'yes' ) ? '<th> <span class="fa fa-user"></span>'.__('Instructor', 'dt-event-manager').'</th>' : '';
                                        $output .= '</tr>';
                                    $output .= '</thead>';

                                    $output .= '<tbody>';
                                        foreach( $events as $event ) {
                                            $output .= '<tr class="'.$event['visibility'].'">';


                                                $output .= '<td>';
                                                    $output .= '<div class="event-time">';
                                                        $output .= date_i18n( 'H:i A', strtotime( $event['start'] ) );
                                                        $output .= ( $arg['show_end_time'] == 'yes' ) ? date_i18n( '- H:i A', strtotime( $event['end'] ) ) : '';
                                                    $output .= '</div>';
                                                $output .= '</td>';

                                                if( $arg['show_duration'] == 'yes' ) {
                                                    $output .= '<td>'. $event['duration'].'</td>';
                                                }

                                                $output .= '<td>';
                                                    $output .= '<h3 class="dt-sc-event-title"> <a href="'.get_the_permalink( $event['id'] ).'">'.$event['title'].'</a> </h3>';
                                                    if( $arg['show_category'] == 'yes' ) {
                                                        $output .= $this->dt_show_event_category( $event['id'] );
                                                    }

                                                    if( $arg['show_excerpt'] == 'yes' ) {
                                                        $output .= '<div class="dt-sc-event-excerpt">' .get_the_excerpt( $event['id'] ).'</div>';
                                                    }
                                                $output .= '</td>';

                                                if( $arg['show_location'] == 'yes' ) {
                                                    $output .= '<td>'.$this->dt_show_event_venue( $event['id'] ).'</td>';
                                                }

                                                if( $arg['show_instructor'] == 'yes' ) {
                                                    $output .= '<td>'.$this->dt_show_event_organizers( $event['id'] ).'</td>';
                                                }
                                            $output .= '</tr>';
                                        }
                                    $output .= '</tbody>';
                                $output .= '</table>';
                            $output .= '</div>';
                        }

                    $output .= '</div>';
                $output .= '</div>';
            }

            return $output;
        }

        function dt_sc_event_weekly_tab( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                    'title' => '',
                    'icon_type' => '',
                    'icon_type_fontawesome' => '',
                    'icon_type_openiconic' => '',
                    'icon_type_typicons' => '',
                    'icon_type_entypo' => '',
                    'icon_type_linecons' => '',
                    'icon_type_monosocial' => '',
                    'icon_type_material' => '',
                'event_category' => '',
                'date_format' => '',
                'el_class' => '',
                    'show_end_time' => '',
                    'show_duration' => '',
                    'show_category' => '',
                    'show_location' => '',
                    'show_instructor' => '',
                    'show_excerpt' => '',
                'css' => '',                                
            ), $attrs ) );

            $days = 3650;
            $start_tstamp = current_time('timestamp') + 1 * DAY_IN_SECONDS;
            $stop_tstamp = current_time('timestamp') + 7 * DAY_IN_SECONDS;

            $start  = date_i18n( 'Y-m-d', $start_tstamp );
            $stop   = date_i18n( 'Y-m-d', $stop_tstamp );

            $s_tstamp = strtotime( $start );
            $e_tstamp = strtotime( $stop. '23:59:59' );            

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-events-weekly-tab-wrap',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_event_tab_tab', $attrs ) );

            $events_array = array();            

            $args = array(
                'post_status' => array( 'publish' ),
                'posts_per_page' => -1,
                'post_type' => 'dt_event',
                'meta_key' => '_dt_event_timestamp',
                'orderby'   => 'meta_value_num',
                'order'     => 'ASC',
            );

            if( !empty( $event_category ) ) {

                $category = explode(",", $event_category);

                $args['tax_query'] = array( array(
                    'taxonomy' => 'dt_event_category',
                    'field' => 'term_id',
                    'operator' => 'IN',
                    'terms' => $category
                ) );
            }

            $events = new WP_Query( $args );            

            if( $events->have_posts() ) {
                while( $events->have_posts() ) {
                    $events->the_post();
                    $this->dt_events( $events->post, $s_tstamp, $e_tstamp );
                    $events_array = array_merge( $events_array, $this->render() );                           
                }
            }

            wp_reset_postdata();

            usort( $events_array, function( $a, $b ){
                return $a['timestamp']>$b['timestamp'];
            });

            $events = $this->events_list( $events_array, array(
                'date_format' => $date_format,
                'show_end_time' => $show_end_time,
                'show_duration' => $show_duration,
                'show_category' => $show_category,
                'show_location' => $show_location,
                'show_instructor' => $show_instructor,
                'show_excerpt' => $show_excerpt,
            ) );

            $output  = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';
                if( !empty( $title ) ) {
                    $output .= '<div class="dt-sc-events-weekly-tab-list-title">';
                        if( $icon_type !== 'none' && !empty( $icon_type ) ) {
                            vc_icon_element_fonts_enqueue( $icon_type );
                            $output .= '<span class="'.${'icon_type_'.$icon_type}.'"></span>';
                        }

                        $output .= '<span class="title">'.$title.'</span>';
                    $output .= '</div>';
                }

                $output .= $events;
            $output .= '</div>';

            return $output;            
        }        
    }
}

new DTEventWeeklyTab();