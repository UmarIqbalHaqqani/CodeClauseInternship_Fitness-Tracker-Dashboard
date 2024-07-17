<?php
if (! class_exists ( 'DTBaseEventSC' ) ) {
    
    class DTBaseEventSC {

        private $_post;
        private $_id;
        private $_title;
        private $_post_meta;

        private $_timestamp;
        private $_repeat;

        private $_duration;
        private $_end;

        private $_status;
        private $_canceled_date = array();        

        private $_out;

        function __construct() { }

        // Param : Auto Complete
            function dt_event_category_callback ( $serach ) {

                $results = array();
                $terms = get_terms( array(
                    'taxonomy' => 'dt_event_category',
                    'hide_empty' => false,
                    'search' => $serach,
                ) );

                if ( is_array( $terms ) && ! empty( $terms ) ) {
                    foreach ( $terms as $t ) {
                        if ( is_object( $t ) ) {
                            $data = array();
                            $data['value'] = $t->term_id;
                            $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $t->term_id . ( ( strlen( $t->name ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $t->name : '' );
                            $results[] = $data;                    
                        }
                    }
                }

                return $results;
            }

            function dt_event_category_render ( $term ) {

                $terms = get_terms( array(
                    'taxonomy' => 'dt_event_category',
                    'include' => array( $term['value'] ),
                    'hide_empty' => false,
                ) );

                $data = false;
                if ( is_array( $terms ) && 1 === count( $terms ) ) {
                    $term = $terms[0];
                    $data['value'] = $term->term_id;
                    $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $term->term_id . ( ( strlen( $term->name ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $term->name : '' );
                }

                return $data;
            }

            function dt_event_id_callback( $query ) {

                global $wpdb;
                $e_id = (int) $query;

                $events_info = $wpdb->get_results( $wpdb->prepare( 
                    "SELECT a.ID AS id, a.post_title AS title FROM {$wpdb->posts} AS a 
                    WHERE
                        a.post_type = 'dt_event'
                        AND
                            a.post_status = 'publish'
                        AND
                        ( a.ID = '%d' OR a.post_title LIKE '%%%s%%' ) ",
                        $e_id > 0 ? $e_id : - 1,
                        stripslashes( $query ) 
                ), ARRAY_A );

                $results = array();
                if ( is_array( $events_info ) && ! empty( $events_info ) ) {
                    foreach ( $events_info as $value ) {
                        $data = array();
                        $data['value'] = $value['id'];
                        $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $value['title'] : '' );
                        $results[] = $data;                    
                    }
                }

                return $results;
            }

            function dt_event_id_render( $query ) {

                $query = trim( $query['value'] ); // get value from requested

                if ( ! empty( $query ) ) {

                    $event = get_post( (int) $query );

                    if( is_object( $event ) ) {

                        $e_id = $event->ID;
                        $e_title = $event->post_title;

                        $data = array();
                        $data['value'] = $e_id;
                        $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $e_id . ( ( strlen( $e_title ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $e_title : '' );
                        return ! empty( $data ) ? $data : false;
                    }

                    return false;
                }

                return false;
            }

            function dt_organizer_id_callback( $query ) {

                global $wpdb;
                $e_id = (int) $query;

                $organizers_info = $wpdb->get_results( $wpdb->prepare( 
                    "SELECT a.ID AS id, a.post_title AS title FROM {$wpdb->posts} AS a 
                    WHERE
                        a.post_type = 'dt_event_organizer'
                        AND
                            a.post_status = 'publish'
                        AND
                        ( a.ID = '%d' OR a.post_title LIKE '%%%s%%' ) ",
                        $e_id > 0 ? $e_id : - 1,
                        stripslashes( $query ) 
                ), ARRAY_A );			
				
                $results = array();
                if ( is_array( $organizers_info ) && ! empty( $organizers_info ) ) {
                    foreach ( $organizers_info as $value ) {
                        $data = array();
                        $data['value'] = $value['id'];
                        $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $value['title'] : '' );
                        $results[] = $data;                    
                    }
                }

                return $results;
            }

            function dt_organizer_id_render( $query ) {

                $query = trim( $query['value'] ); // get value from requested

                if ( ! empty( $query ) ) {

                    $organizer = get_post( (int) $query );

                    if( is_object( $organizer ) ) {

                        $e_id = $organizer->ID;
                        $e_title = $organizer->post_title;

                        $data = array();
                        $data['value'] = $e_id;
                        $data['label'] = __( 'Id', 'dt-event-manager' ) . ': ' . $e_id . ( ( strlen( $e_title ) > 0 ) ? ' - ' . __( 'Title', 'dt-event-manager' ) . ': ' . $e_title : '' );
                        return ! empty( $data ) ? $data : false;
                    }

                    return false;
                }

                return false;
			}
        // Param : Auto Complete

        function dt_events( $post = false, $start = false, $end = false  ) {

            $this->_out = array();

            $this->_post = $post;
            $this->_id = $post !== false ? $post->ID : get_the_id();
            $this->_title = get_the_title( $this->_id );
            $this->_post_meta = get_post_meta( $this->_id );
            $this->_timestamp = isset( $this->_post_meta['_dt_event_timestamp'][0] ) ? intval( $this->_post_meta['_dt_event_timestamp'][0] ) : false;
            $this->_repeat      = isset( $this->_post_meta['_dt_event_interval'][0] ) && intval( $this->_post_meta['_dt_event_interval'][0] ) >= 1 ? true : false;
            
            $this->_duration = 0;
            $settings = $this->_post_meta['_custom_settings'][0];
            $settings = maybe_unserialize(  $settings );
            if( isset( $settings ) && isset( $settings['start-date'] ) ) {
                $this->_duration =  $settings['start-date']['duration'];
            }

            $this->_status = 0;
            if( isset( $settings ) && isset( $settings['status'] ) ) {
                $this->_status = $settings['status'];
                $this->_canceled_date = $settings['canceled-date'];
            }            

            $this->_end = $this->_timestamp + $this->_duration * MINUTE_IN_SECONDS;

            if( $start !== false && $end !== false ) {

                $master_count = round( abs( ( $start - $end ) / DAY_IN_SECONDS ) ) <= 31 ? 10000 : 0;

                /** Repeatable Event */
                if( $this->_repeat ) {

                    $settings = get_post_meta ( $this->_id, '_custom_settings', TRUE );
                    $settings = is_array ( $settings ) ? $settings : array ();

                    $repeat_interval = get_post_meta ( $this->_id, '_dt_event_interval', TRUE );

                    $last_repeat = $end;
                    if( isset( $settings['repeat-until'] ) && !empty( $settings['repeat-until'] ) ) {
                        $last_repeat = strtotime( $settings['repeat-until'] ) + DAY_IN_SECONDS;
                    }
                    $end = $last_repeat >= $end ? $end : $last_repeat;

                    if( $repeat_interval == 1 ) { # Repeat Daily

                        $count = $master_count !== 0 ? $master_count : 10;
                        $allowed = get_post_meta ( $this->_id, '_dt_event_repeat_day', TRUE );

                        while( $this->_timestamp <= $end  && $count > 0 ){
                            if( $this->_timestamp >= $start ){
                                $day = date( 'N', $this->_timestamp );
                                if( in_array( $day, $allowed ) ) {
                                    $this->_out[] = $this->_timestamp;                              
                                }
                            }

                            $this->_timestamp += DAY_IN_SECONDS;
                            $count--;
                        }
                    } elseif( $repeat_interval == 2 ) { # Repeat Weekly

                        $count = $master_count !== 0 ? $master_count : 5;
                        while( $this->_timestamp <= $end && $count > 0 ){
                            if( $this->_timestamp >= $start ){
                                $this->_out[] = $this->_timestamp;
                            }
                            $this->_timestamp += WEEK_IN_SECONDS;
                            $count--;
                        }
                    } elseif( $repeat_interval == 3 ) { # Repeat Every Two Weeks

                        $count = ( $master_count !== 0 ? $master_count : ceil( ( $start - $end ) / DAY_IN_SECONDS ) > 31 ) ? 4 : 1000;
                        while( $this->_timestamp <= $end && $count > 0 ){
                            if( $this->_timestamp >= $start ){
                                $this->_out[] = $this->_timestamp;
                            }
                            $this->_timestamp += 2 * WEEK_IN_SECONDS;
                            $count--;
                        }
                    } elseif( $repeat_interval == 4 ) { # Repeat Monthly
                        $count = $master_count !== 0 ? $master_count : 5;
                        while( $this->_timestamp <= $end  && $count > 0 ){
                            if( $this->_timestamp >= $start ){
                                $this->_out[] = $this->_timestamp;
                            }
                            $this->_timestamp = strtotime( '+1 months', $this->_timestamp );
                            $count--;
                        }                   
                    } elseif( $repeat_interval == 5 ) { # Yearly Monthly

                        $count = $master_count !== 0 ? $master_count : 2;
                        while( $this->_timestamp <= $end && $count > 0 ){
                            if( $this->_timestamp >= $start ){
                                $this->_out[] = $this->_timestamp;
                            }
                            $this->_timestamp = strtotime( '+1 years', $this->_timestamp );
                            $count--;
                        }                   
                    }
                } else {

                    if( $this->_timestamp >= $start && $this->_timestamp <= $end ){
                        $this->_out[] = $this->_timestamp;
                    }
                }
            }
        }

        function render() {
            $out = array();
            $this->_out = array_unique( array_unique( $this->_out ) );
            if( count( $this->_out ) ){
                foreach( $this->_out as $ts ) {
                    array_push( $out, array(
                        'id' => $this->_id,
                        'title' => $this->_title,
                        'thumbnail' => $this->dt_event_image( $this->_id ),
                        'timestamp' => $ts,
                        'duration' => $this->dt_event_duration( $this->_duration ),
                        'visibility' => $this->dt_event_status( $ts ),
                        'start' => date('c', $ts),
                        'end'   => date( 'c', $ts + $this->_duration * MINUTE_IN_SECONDS ),
                    ) );
                }
            }
            return $out;
        }

        function dt_event_image( $id ) {
            #return get_the_post_thumbnail_url( $id, 'full' );
			return get_the_post_thumbnail( $id, 'full' );
        }

        function dt_event_duration( $duration ) {

            $hours = floor( $duration / 60 );
            $minutes = $duration - floor( $duration / 60 ) * 60;
            $duration  = $hours > 0 ? sprintf( _n( '%sh', '%sh', $hours, 'dt-event-manager' ), $hours ) : '';
            $duration .= $minutes > 0 && $hours > 0 ? ' ' : '';
            $duration .= $minutes > 0 ? sprintf( __( '%d\'', 'dt-event-manager' ), $minutes ) : '';

            return $duration;
        }

        function dt_show_event_category( $id ) {
            return get_the_term_list( $id, 'dt_event_category', '<p class="dt-sc-event-categories">', '</p>' );
        }

        function dt_show_event_venue( $id ) {

            $location = '';
            $settings = get_post_meta ( $id, '_custom_settings', TRUE );
            $settings = is_array ( $settings ) ? $settings : array ();

            if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) {
                $location  = '<p class="dt-sc-event-venue">';
                $location .= '<a href="'.esc_url( get_permalink( $settings['venue'] ) ).'">'. get_the_title( $settings['venue'] ) . '</a>';
                $location .= '</p>';
            }

            return $location;
        }

        function dt_show_event_organizers( $id ) {

            $organizers = '';

            $settings = get_post_meta ( $id, '_custom_settings', TRUE );
            $settings = is_array ( $settings ) ? $settings : array (); 

            if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) {
                $links = array();
                foreach ( $settings['organizers'] as $organizer ) {
                    $links[] = '<a href="' . esc_url( get_permalink( $organizer ) ) . '">' . get_the_title( $organizer ) . '</a>';
                }

                $organizers  = '<p class="dt-sc-event-organizers">';
                $organizers .= join( ",", $links );
                $organizers .= '</p>';
            }

            return $organizers;                       
        }

        function dt_show_event_modern_organizers( $id ) {

            $organizers = '';

            $settings = get_post_meta ( $id, '_custom_settings', TRUE );
            $settings = is_array ( $settings ) ? $settings : array (); 

            if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) {
                $output = '';
                foreach ( $settings['organizers'] as $organizer ) {
					$output .= '<div class="dt-sc-trainer">';
						$output .= '<div class="dt-sc-trainer-thumb">';
							$output .= get_the_post_thumbnail( $organizer, 'thumbnail' );
						$output .= '</div>';
						$output .= '<span>'.esc_html__('Trainer: ', 'dt-event-manager').'</span>';
	                    $output .= '<a href="' . esc_url( get_permalink( $organizer ) ) . '">' . get_the_title( $organizer ) . '</a>';
					$output .= '</div>';
                }

                $organizers  = '<p class="dt-sc-event-organizers">';
	                $organizers .= $output;
                $organizers .= '</p>';
            }

            return $organizers;
        }

        function dt_event_status( $timestamp ) {

            if( $this->_status == 1 ) {
                return 'event-canceled';
            }

            if( $this->_status == 2 ) {
                $canceled = $this->_canceled_date;

                foreach ($canceled as $value ) {
                    $date = $value['date'];

                    if( $timestamp >= strtotime( $date ) && $timestamp < strtotime( $date ) + DAY_IN_SECONDS ) {
                        return 'event-canceled';
                    }
                }
            }

            return 'event-live';
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
                wp_enqueue_style( 'dt-event-manager-custom-inline' );
                wp_add_inline_style( 'dt-event-manager-custom-inline', $css );
            }
        }
    }
}