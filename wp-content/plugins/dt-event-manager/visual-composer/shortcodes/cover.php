<?php
if (! class_exists ( 'DTEventSingleCover' ) ) {
    
    class DTEventSingleCover extends DTBaseEventSC {

        function __construct() {

            add_shortcode( 'dt_sc_event_single_cover', array( $this, 'dt_sc_event_single_cover' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_single_cover_event_id_callback', array( $this, 'dt_event_id_callback' ) );
            add_filter( 'vc_autocomplete_dt_sc_event_single_cover_event_id_render', array( $this, 'dt_event_id_render' ) );
        }

        function dt_generate_css( $attrs ) {

        	$css = '';
        	$attrs['el_id'] = 'dt-'.$attrs['el_id'];

        	$opacity = $attrs['cover_overlay'] / 100;
        	$color = !empty( $attrs['overlay_color'] ) ? $attrs['overlay_color'] : '';

            if( $attrs['cover_overlay_type'] == 'cover-overlay-image' ) {

        		$css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).'.cover-overlay-image div.dt-sc-event-image::after { content:"";';
        		$css .= !empty( $color ) ? 'background-color:'.$color.';' : '';
        		$css .= !empty( $opacity ) ? 'opacity:'.$opacity.';' : '';
        		$css .= '}';

        		$css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).'.cover-overlay-image :hover div.dt-sc-event-image::after { content:""; ';
        		$css .= !empty( $opacity ) ? 'opacity:'.($opacity+0.5).';' : '';
        		$css .= ' }';
        	} elseif( $attrs['cover_overlay_type'] == 'cover-overlay-text' ) {

        		$css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).'.cover-overlay-text div.dt-sc-event-meta::before { content:"";';
        		$css .= !empty( $color ) ? 'background-color:'.$color.';' : '';
        		$css .= !empty( $opacity ) ? 'opacity:'.$opacity.';' : '';
        		$css .= '}';

        		$css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).'.cover-overlay-text:hover div.dt-sc-event-meta::before { content:"";';
        		$css .= !empty( $opacity ) ? 'opacity:'.($opacity+0.5).';' : '';
        		$css .= '}';
        	}
			
			if( !empty( $attrs['text_color'] ) ) {
				$css .= "\n".'div#'.esc_attr( $attrs['el_id'] ).' * { color: '.$attrs['text_color'].'}';
			}

            return $css;
        }

        function dt_sc_event_single_cover( $attrs, $content = null ) {

            extract ( shortcode_atts ( array (
                'el_id' => '',
				'event_id' => '',
				'date_format' => '',

				'show_end_time' => '',
				'show_duration' => '',
				'show_category' => '',
				'show_location' => '',
				'show_instructor' => '',
				'show_excerpt' => '',
				'show_read_more' => '',
				'read_more' => '',

				'cover_aspect' => '',
				'cover_text_position' => '',
				'cover_text_align' => '',
				'cover_text_size' => '',
				'cover_overlay_type' => '',
				'cover_overlay' => '',
				'overlay_color' => '',
				'text_color' => '',

				'el_class' => '',
				'css' => '',
            ), $attrs ) );

            if( empty( $event_id ) )
                return;

            if($el_id != '') {
                $el_id = 'dt-'.$el_id;
            }

            $css_classes = array(
                'dt-sc-single-event',
                'dt-sc-single-event-cover-style',
                $cover_aspect,
                $cover_text_position,
                $cover_text_align,
                $cover_text_size,
                $cover_overlay_type,
                has_post_thumbnail( $event_id ) ? 'cover-overlay-with-image' : 'cover-overlay-with-out-image',
                $el_class,
                vc_shortcode_custom_css_class( $css ),
            );

            $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'dt_sc_event_single_cover', $attrs ) );

            $event = get_post( (int) $event_id );
            $settings = get_post_meta ( $event_id, '_custom_settings', TRUE );
            $settings = is_array ( $settings ) ? $settings : array ();

            $start = $settings['start-date'];

            $output  = '<div id="'.esc_attr( $el_id ).'" class="'.esc_attr( $css_class ).'">';
            	if( has_post_thumbnail( $event_id ) ) {
            		$output .= '<div class="dt-sc-event-image" style="background-image:url('. get_the_post_thumbnail_url( $event_id, 'full' ) .')"></div>';
            	}

            	$output .= '<div class="dt-sc-event-meta">';

                	$output .= '<h3 class="dt-sc-event-title"> <a href="'.esc_url( get_the_permalink( $event_id ) ).'">'.$event->post_title.'</a> </h3>';

                    $output .= '<div class="dt-sc-event-time">';

                    	$output .= '<p class="dt-sc-event-date">';
                    	$output .=    date_i18n( $date_format, strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) );
                    	$output .= '</p>';

                    	$output .= '<p class="dt-sc-event-start-time">'. date_i18n( 'h i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ) . '</p>';

                    	if( $show_end_time == 'yes' ) {

                    		$s_time = date_i18n( 'h:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) );
                    		$e_time = date_i18n( 'h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );

                    		$output .= '<p class="dt-sc-event-end-time">' . $e_time . '</p>';
                    	}

                    	if( $show_duration == 'yes' ) {

                    		$hours = floor( $start['duration'] / 60 );
                    		$minutes = $start['duration'] - floor( $start['duration'] / 60 ) * 60;

                    		$duration  = $hours > 0 ? sprintf( _n( '%sh', '%sh', $hours, 'dt-event-manager' ), $hours ) : '';
                    		$duration .= $minutes > 0 && $hours > 0 ? ' ' : '';
                    		$duration .= $minutes > 0 ? sprintf( __( '%d\'', 'dt-event-manager' ), $minutes ) : '';

                    		$output .= '<p class="dt-sc-event-duration">' . $duration . '</p>';
                    	}
		            $output .= '</div>';

		            $output .= ( $show_category == 'yes' ) ?  $this->dt_show_event_category( $event_id ) : '';
		            $output .= ( $show_location == 'yes' ) ?  $this->dt_show_event_venue( $event_id ) : '';
		            $output .= ( $show_instructor == 'yes' ) ?  $this->dt_show_event_organizers( $event_id ) : '';

		            if( $show_excerpt == 'yes' ) {
		            	$output .= '<div class="dt-sc-event-excerpt">';
		            		$output .= get_the_excerpt( $event_id );
		            	$output .= '</div>';
                    }

                    if( $show_read_more == 'yes' && !empty( $read_more ) ) {
                    	$output .= '<div class="dt-sc-event-read-more">';
                    		$output .= '<a class="dt-sc-button icon-right with-icon  bordered" href="'.esc_url( get_the_permalink( $event_id ) ).'">'. $read_more .' <span class="zmdi zmdi-arrow-right"> </span> </a>';
                        $output .= '</div>';
                    }
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

new DTEventSingleCover();