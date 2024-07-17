<?php
if (! class_exists ( 'DTEventOrganizerEvents' ) ) {
    
    class DTEventOrganizerEvents extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_organizer_events', array( $this, 'dt_sc_event_organizer_events' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_organizer_events_organizer_id_callback', array( $this, 'dt_organizer_id_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_organizer_events_organizer_id_render', array( $this, 'dt_organizer_id_render' ) );
        }

        function dt_generate_css( $attrs ) {

        	$css = '';
        	$attrs['el_id'] = 'dt-'.$attrs['el_id'];

            return $css;
        }

        function events_list( $events, $arg ) {

            $output = ''; $i = 0;

            $limit = ( $arg['limit'] == 0 ) ? 999999999999 : $arg['limit'];

            if( $limit > 0 && count( $events ) > 0 ) {

				foreach( $events as $event ) {

					if( $i >= $limit ) {
						break;
					}
					$i = $i + 1;
					
					$output .= '<div class="dt-sc-event-item">';

						$output .= '<div class="dt-sc-details-wrapper">';
							$output .= '<div class="dt-sc-event-date">'.date_i18n( $arg['date_format'], strtotime( $event['start'] ) ).'</div>';

							$output .= '<h3 class="dt-sc-event-title"> <a href="'.esc_url( get_the_permalink( $event['id'] ) ).'">'.$event['title'].' </a> </h3>';

							$output .= '<span class="dt-sc-event-time">';
								$output .= date_i18n( 'h.i a', strtotime( $event['start'] ) );
								$output .= esc_html__(' to ', 'dt-event-manager').date_i18n( 'h.i a', strtotime( $event['end'] ) );
							$output .= '</span>';

							$output .= ( $arg['show_instructor'] == 'yes' ) ?  $this->dt_show_event_organizers( $event['id'] ) : '';
						$output .= '</div>';

						if( $arg['show_read_more'] == 'yes' && !empty( $arg['read_more'] ) ) {
							$output .= '<div class="dt-sc-event-read-more">';
								$output .= '<a class="dt-sc-button small" href="'.esc_url( get_the_permalink( $event['id'] ) ).'">'. $arg['read_more'] .'</a>';
							$output .= '</div>';
						}
					$output .= '</div>';
				}

            } else {
                $output .= '<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-warning">';
                    $output .= '<h2>'.__('No Events to Show','dt-event-manager').'</h2>';
                $output .= '</div>';
            }
            return $output;
        }
		
        function dt_sc_event_organizer_events( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
				'organizer_id' => '',
				'date_format' => '',

				'show_instructor' => '',
				'show_read_more' => '',
				'read_more' => '',

				'days' => '',
				'limit' => '',

				'el_class' => '',
				'css' => '',
            ), $attrs ) );

            if( empty( $organizer_id ) )
                return;

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
                'dt-sc-event-organizer-events',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($css_classes) ), 'dt_sc_event_organizer_events', $attrs ) );

            $events_array = array();            

            $args = array(
                'post_status' => array( 'publish' ),
                'posts_per_page' => -1,
                'post_type' => 'dt_event',
                'order'     => 'ASC',
				'meta_query' => array(
					array(
						'key'     => '_dt_event_organizers',
						'value'   => $organizer_id,
						'compare' => 'LIKE',
					),
				)
            );

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

                if( $a['timestamp'] == $b['timestamp']){
                    return 0;
                }
                return ($a['timestamp'] > $b['timestamp']) ? 1 : -1;
            });
			
            $events = $this->events_list( $events_array, array(
                'limit' => $limit,
                'date_format' => $date_format,
                'show_instructor' => $show_instructor,
                'show_read_more' => $show_read_more,
                'read_more' => $read_more,
            ) );

            $output  = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';

				$output .= '<div class="dt-sc-organizer">';

					$output .= get_the_post_thumbnail( $organizer_id, 'thumbnail' );

				$output .= '</div>';

                $output .= '<div class="dt-sc-organizer-events">';

					$output .= $events;

				$output .= '</div>';

            $output .= '</div>';

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );

            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }

            return $output;
        }
    }
}

new DTEventOrganizerEvents();