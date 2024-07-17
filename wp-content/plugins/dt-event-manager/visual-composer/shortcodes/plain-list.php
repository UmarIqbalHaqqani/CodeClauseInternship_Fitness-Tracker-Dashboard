<?php
if (! class_exists ( 'DTEventPlainList' ) ) {
    
    class DTEventPlainList extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_plain_list', array( $this, 'dt_sc_event_plain_list' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_plain_list_event_category_callback', array( $this, 'dt_event_category_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_plain_list_event_category_render', array( $this, 'dt_event_category_render' ) );
        }

        function events_list( $events, $arg ) {

            $output = '';

            $limit = ( $arg['limit'] == 0 ) ? 999999999999 : $arg['limit'];

            if( $limit > 0 && count( $events ) > 0 ) {

                $output .= '<ul class="dt-sc-events-plain-list">';
                foreach( $events as $event ) {

                    $output .= '<li class="dt-sc-event '.$event['visibility'].'">';

                        if( $event['thumbnail'] ) {
							$output .= '<div class="dt-sc-event-image">'.$event['thumbnail'].'</div>';
                        }

                        $output .= '<div class="dt-sc-event-time">';
                            $output .=  '<span>'.date_i18n('j', strtotime( $event['start'] )).'</span>';
                            $output .=  '<span>'.date_i18n('F', strtotime( $event['start'] )).'</span>';
                        $output .= '</div>';
					
					    $output .= '<div class="dt-sc-event-title-wrap">';
							$output .= '<h3 class="dt-sc-event-title"> <a href="'.esc_url( get_the_permalink( $event['id'] ) ).'">'.$event['title'].' </a> </h3>';
							$output .= '<div class="dt-sc-event-meta">';                            
								$output .= '<span class="dt-sc-event-time">';
									$output .= date_i18n( 'h:i A', strtotime( $event['start'] ) );
									$output .= ( $arg['show_end_time'] == 'yes' ) ? ' - '.date_i18n( 'h:i A', strtotime( $event['end'] ) ) :'';
									$output .= ( $arg['show_duration'] == 'yes' ) ? '<span class="dt-sc-event-duration">'.$event['duration'].'</span>' : '';
								$output .= '</span>';
								$output .= ( $arg['show_category'] == 'yes' ) ?  $this->dt_show_event_category( $event['id'] ) : '';
								$output .= ( $arg['show_location'] == 'yes' ) ?  $this->dt_show_event_venue( $event['id'] ) : '';
								$output .= ( $arg['show_instructor'] == 'yes' ) ?  $this->dt_show_event_organizers( $event['id'] ) : '';
							$output .= '</div>';
							if( $arg['show_excerpt'] == 'yes' ) {
								$output .= '<div class="dt-sc-event-excerpt">';
									$output .= get_the_excerpt( $event['id'] );
								$output .= '</div>';
							}
						$output .= '</div>';                        

                        if( $arg['show_read_more'] == 'yes' && !empty( $arg['read_more'] ) ) {
                            $output .= '<div class="dt-sc-event-read-more">';
                                $output .= '<a class="dt-sc-button small icon-right with-icon bordered" href="'.esc_url( get_the_permalink( $event['id'] ) ).'">'. $arg['read_more'] .' <span class="zmdi zmdi-arrow-right"> </span> </a>';
                            $output .= '</div>';
                        }
                    $output .= '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-warning">';
                    $output .= '<h2>'.__('No Events to Show','dt-event-manager').'</h2>';
                $output .= '</div>';
            }
            return $output;
        }

        function dt_sc_event_plain_list( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
                'title' => '',
                'icon_type' => '',
                'icon_type_fontawesome' => '',
                'icon_type_openiconic'  => '',
                'icon_type_typicons'    => '',
                'icon_type_entypo'  => '',
                'icon_type_linecons'    => '',
                'icon_type_monosocial'  => '',
                'icon_type_material'    => '',
                'days'  => '',
                'limit' => '',
                'event_category'   => '',
                'el_class'  => '',
                'show_end_time' => '',
                'show_duration' => '',
                'show_category' => '',
                'show_location' => '',
                'show_instructor'   => '',
                'show_excerpt'  => '',
                'show_read_more' => '',
                'read_more' => '',
                'css'   => '',                
            ), $attrs ) );

            $days = ( $days != '0' ) ? intval( $days ) : 3650;
            $start_tstamp = strtotime( date_i18n( 'Y/m/d', current_time( 'timestamp' ) ) );
            $stop_tstamp = $start_tstamp + ( $days - 1 ) * DAY_IN_SECONDS;

            $start = date_i18n( 'Y-m-d', $start_tstamp );
            $stop = date_i18n( 'Y-m-d', $stop_tstamp );

            $s_tstamp = strtotime( $start );
            $e_tstamp = strtotime( $stop. '23:59:59' );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-events-plain-list-wrap',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_event_plain_list', $attrs ) );

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
                'limit' => $limit,
                'show_end_time' => $show_end_time,
                'show_duration' => $show_duration,
                'show_category' => $show_category,
                'show_location' => $show_location,
                'show_instructor' => $show_instructor,
                'show_excerpt' => $show_excerpt,
                'show_read_more' => $show_read_more,
                'read_more' => $read_more,
            ) );

            $output  = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';

                if( !empty( $title ) ) {
                    $output .= '<div class="dt-sc-events-plain-list-title">';
                        if( $icon_type !== 'none' ) {
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

new DTEventPlainList();