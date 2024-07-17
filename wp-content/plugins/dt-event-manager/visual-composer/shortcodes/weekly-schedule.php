<?php
if (! class_exists ( 'DTEventWeeklySchedule' ) ) {
    
    class DTEventWeeklySchedule extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_weekly_schedule', array( $this, 'dt_sc_event_weekly_schedule' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_weekly_schedule_event_category_callback', array( $this, 'dt_event_category_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_weekly_schedule_event_category_render', array( $this, 'dt_event_category_render' ) );

            add_action( 'wp_ajax_dt_sc_event_weekly_schedule', array( $this, 'dt_sc_event_weekly_schedule_ajax' ) );
            add_action( 'wp_ajax_nopriv_dt_sc_event_weekly_schedule', array( $this, 'dt_sc_event_weekly_schedule_ajax' ) );
        }

        function dt_generate_css( $attrs ) {

            $css = '';
            $attrs['el_id'] = 'dt-'.$attrs['el_id'];

            $css .= !empty( $attrs['monday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .monday { background-color:'. $attrs['monday_color'] .';}' : '';
            $css .= !empty( $attrs['tuesday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .tuesday { background-color:'. $attrs['tuesday_color'] .';}' : '';
            $css .= !empty( $attrs['wednesday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .wednesday { background-color:'. $attrs['wednesday_color'] .';}' : '';
            $css .= !empty( $attrs['thursday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .thursday { background-color:'. $attrs['thursday_color'] .';}' : '';
            $css .= !empty( $attrs['friday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .friday { background-color:'. $attrs['friday_color'] .';}' : '';
            $css .= !empty( $attrs['saturday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .saturday { background-color:'. $attrs['saturday_color'] .';}' : '';
            $css .= !empty( $attrs['sunday_color'] ) ? "\n".'div#'.esc_attr( $attrs['el_id'] ).' .sunday { background-color:'. $attrs['sunday_color'] .';}' : '';

            return $css;            
        }

        function events_list( $events, $arg ) {

        	$output = '';
        	$week = array();
        	$firstDay = get_option( 'start_of_week');
        	$day_names = array ( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );

        	for( $i = $firstDay; $i <= $firstDay + 7; $i++ ){
        		$key = $i <= 6 ? $i : abs( $i - 7 );
        		$week['day_'.$key] = array( 'day_num' => $key , 'day_name' => $day_names[ $key ], 'events' => array() );
        	}

        	foreach( $events as $event ) {
        		$day_of_week = date_i18n('l',strtotime( $event['start'] ) );
        		$day_of_week = array_search( $day_of_week, $day_names);
        		$week['day_'.$day_of_week]['events'][] = $event;
        	}

            if( count( $week ) > 0 && count( $events ) > 0 ) {
        		$output .= '<div class="dt-sc-events-weekly-schedule-list">';
        			foreach( $week as $day ) {
        				if( count ( $day['events'] ) > 0  ) {

                            #$output .= '<div class="event-day '.strtolower( $day['day_name'] ).'">';
                            $day_name = strtolower( $day['day_name'] );
                            
        					$output .= '<div class="event-day">';

        						$output .= '<h3>'.$day['day_name'].'</h3>';
        						$output .= '<div class="events-list">';
	        						foreach( $day['events'] as $event ) {
	        							$output .= '<div class="event '.$event['visibility'].' '. $day_name.'">';
	        								$output .= '<h3 class="dt-sc-event-title"> <a href="'.esc_url( get_the_permalink( $event['id'] ) ).'">'.$event['title'].'</a> </h3>';

	        								$output .= '<div class="dt-sc-event-time">';
	        									$output .= '<span>';
	        										$output .= date_i18n( 'h:i A', strtotime( $event['start'] ) );
	        										$output .= ( $arg['show_end_time'] == 'yes' ) ? ' - '. date_i18n( 'h:i A', strtotime( $event['end'] ) ) : ''; 
	        									$output .= '</span>';
	        									$output .= ( $arg['show_duration'] == 'yes' ) ? '<span class="dt-sc-event-duration">'.$event['duration'].'</span>' : '';
	        								$output .= '</div>';
	        								
	        								$output .= '<div class="dt-sc-event-meta">';
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
	        						}
        						$output .= '</div>';
        					$output .= '</div>';
        				}
        			}
                $output .= '</div>';
        	} else {
                $output .= '<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-warning">';
                    $output .= '<h2>'.__('No Events to Show','dt-event-manager').'</h2>';
                $output .= '</div>';
        	}

            return $output;        	
        }

        function dt_sc_event_weekly_schedule( $attrs, $content = null ) {

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

                'monday_color' => '',
                'tuesday_color' => '',
                'wednesday_color' => '',
                'thursday_color' => '',
                'friday_color' => '',
                'saturday_color' => '',
                'sunday_color' => '',

                'el_class' => '',
                    'show_end_time' => '',
                    'show_duration' => '',
                    'show_category' => '',
                    'show_location' => '',
                    'show_instructor' => '',
                    'show_excerpt' => '',
                'css' => '',

                'show_nav' => '',
            ), $attrs ) );

            $start_tstamp = current_time('timestamp') + 1 * DAY_IN_SECONDS;
            $stop_tstamp = current_time('timestamp') + 7 * DAY_IN_SECONDS;

            if( $show_nav == 'yes' ) {

                $start_tstamp = strtotime("last Monday", current_time('timestamp'));
                $stop_tstamp = $start_tstamp + 6 * DAY_IN_SECONDS;
            }

            $start 	= date_i18n( 'Y-m-d', $start_tstamp );
            $stop 	= date_i18n( 'Y-m-d', $stop_tstamp );

            $s_tstamp = strtotime( $start );
            $e_tstamp = strtotime( $stop. '23:59:59' );

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-events-weekly-schedule-wrap',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_event_weekly_schedule', $attrs ) );

            # Custom CSS
            $custom_css = '';
            $custom_css .= $this->dt_generate_css( $attrs );
            if( !empty( $custom_css ) ) {
                $this->dt_print_css( $custom_css ); 
            }            

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
                'show_end_time' => $show_end_time,
                'show_duration' => $show_duration,
                'show_category' => $show_category,
                'show_location' => $show_location,
                'show_instructor' => $show_instructor,
                'show_excerpt' => $show_excerpt,
            ) );

            $output  = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';
                if( !empty( $title ) ) {
                    $output .= '<div class="dt-sc-events-weekly-schedule-list-title">';
                        if( $icon_type !== 'none' && !empty( $icon_type ) ) {
                            vc_icon_element_fonts_enqueue( $icon_type );
                            $output .= '<span class="'.${'icon_type_'.$icon_type}.'"></span>';
                        }

                        $output .= '<span class="title">'.$title.'</span>';
                    $output .= '</div>';
                }

                if( $show_nav == 'yes' ) {

                    $arg = array( 
                        'event_category' => $event_category,
                        'show_category' => $show_category,
                        'show_duration' => $show_duration,
                        'show_end_time'  => $show_end_time,
                        'show_excerpt' => $show_excerpt,
                        'show_instructor' => $show_instructor,
                        'show_location' => $show_location
                    );

                    $output .= "<div class='dt-sc-events-weekly-schedule-list-nav' data-attrs='".wp_json_encode( $arg )."'>";
                        $output .= '<span data-nav="previous" class="dt-sc-button small icon-right with-icon bordered navigation previous"> <i class="zmdi zmdi-arrow-left"> </i> '.__( 'Previous', 'dt-event-manager' ).'</span>';
                        $output .= '<span class="title">'. date_i18n('F d', $start_tstamp ) .' - '. date_i18n('F d', $stop_tstamp ) .'</span>';
                        $output .= '<span data-nav="next" class="dt-sc-button small icon-right with-icon bordered navigation next">'.__( 'Next', 'dt-event-manager' ).' <i class="zmdi zmdi-arrow-right"> </i> </span>';
                    $output .= '</div>';
                }

                $output .= '<div class="dt-sc-events-weekly-schedule-list-wrap">';
                    $output .= $events;
                $output .= '</div>';

            $output .= '</div>';

            return $output;            
        }

        function dt_sc_event_weekly_schedule_ajax() {

            $args = $_REQUEST['arg'];
            $nav = $_REQUEST['tag'];

            if( isset($_REQUEST['start'] ) ) {
                $start = $_REQUEST['start'];
                $start  = date_i18n( 'Y-m-d', $start );
            } else {
                $start_tstamp = strtotime("last Monday", current_time('timestamp'));
                $stop_tstamp = $start_tstamp + 6 * DAY_IN_SECONDS;

                $start  = date_i18n( 'Y-m-d', $start_tstamp );
                $stop   = date_i18n( 'Y-m-d', $stop_tstamp );
            }

            if( $nav == 'next' ) {
                $start = strtotime( $start ) + 7 * DAY_IN_SECONDS;
            }elseif( $nav == 'previous' ) {
                $start = strtotime( $start ) - 7 * DAY_IN_SECONDS;
            }

           $stop = $start + 6 * DAY_IN_SECONDS;

           $s_date  = date_i18n( 'Y-m-d', $start );
           $e_date  = date_i18n( 'Y-m-d', $stop );

           $s_tstamp = strtotime( $s_date );
           $e_tstamp = strtotime( $e_date. '23:59:59' );

           $events_array = array();

           $args = array(
                'post_status' => array( 'publish' ),
                'posts_per_page' => -1,
                'post_type' => 'dt_event',
                'meta_key' => '_dt_event_timestamp',
                'orderby' => 'meta_value_num',
                'order'  => 'ASC'
            );

            if( !empty( $args['event_category'] ) ) {

                $category = explode(",", $args['event_category']);

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
                'show_end_time' => $args['show_end_time'],
                'show_duration' => $args['show_duration'],
                'show_category' => $args['show_category'],
                'show_location' => $args['show_location'],
                'show_instructor' => $args['show_instructor'],
                'show_excerpt' => $args['show_excerpt'],
            ) );

            echo '<span class="timestamp" data-start="'.$s_tstamp.'" data-start-date="'.date_i18n('F d', $s_tstamp ).'" data-end="'.$e_tstamp.'" data-end-date="'.date_i18n('F d', $e_tstamp ).'"></span>';
            echo $events;
            die();
        }
    }
}

new DTEventWeeklySchedule();                    