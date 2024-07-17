<?php
if (! class_exists ( 'DTEventVC' )) {

	class DTEventVC {

		function __construct() {

			add_action( 'admin_enqueue_scripts', array( $this, 'dt_vc_admin_scripts' ) );

			add_action( 'init', array( $this, 'dt_load_params' ) );

			add_action( 'admin_init', array( $this, 'dt_load_modules' ) );
			add_action( 'init', array( $this, 'dt_load_shortcodes' ) );
		}

		function dt_vc_admin_scripts( $pagenow ) {

			$post_type = '';

			if( ( 'post.php' === $pagenow ) && ( isset( $_GET['post'] ) ) ) {

				$post_type = get_post_type( $_GET['post'] );
			}

			if( 'post-new.php' === $pagenow ) {

				$post_type = isset($_GET['post_type']);
			}

			$posts = array();
			if( function_exists( 'vc_editor_post_types' ) ) {
				$posts = vc_default_editor_post_types();
			}
			
			if( in_array( $post_type, $posts ) ) {

				wp_enqueue_style( 'dt-event-addon-vc-admin', plugins_url('dt-event-manager') .'/css/admin/vc.css', false, false, 'all' );
				wp_enqueue_style('dt-event-addon-jquery-ui-datepicker', plugins_url('dt-event-manager') . '/css/admin/datepicker.css', false, false, false );
				wp_enqueue_script('dt-event-addon-vc-scripts', plugins_url('dt-event-manager') . '/js/admin/vc.js', array ('jquery-ui-datepicker' , 'jquery-ui-slider' ), false, true );
			}
		}

        function dt_load_params() {

            if( ! function_exists( 'vc_add_shortcode_param' ) ) {
                return;
            }  

            vc_add_shortcode_param( 'dt_sc_vc_title', array( $this, 'dt_sc_vc_title' ) );
            vc_add_shortcode_param( 'dt_sc_vc_hr', array( $this, 'dt_sc_vc_hr' ) );
            vc_add_shortcode_param( 'dt_sc_vc_hr_invisible', array( $this, 'dt_sc_vc_hr_invisible' ) );
            vc_add_shortcode_param( 'dt_sc_vc_date_picker', array( $this, 'dt_sc_vc_date_picker' ) );
            vc_add_shortcode_param( 'dt_sc_input_number', array( $this, 'dt_sc_input_number' ) );
        }

		function dt_load_modules() {

			if( ! function_exists( 'vc_map' ) ) {
				return;
			}

			require_once 'modules/plain-list.php';
			require_once 'modules/compact-list.php';
			require_once 'modules/weekly-schedule.php';
			require_once 'modules/weekly-tab.php';
			require_once 'modules/cover.php';
			require_once 'modules/single-event-count-down.php';
			require_once 'modules/single-modern.php';
			require_once 'modules/organizer-events.php';
			require_once 'modules/modern-weekly-tab.php';

			#require_once 'modules/simple-list.php';
			#require_once 'modules/simple-agenda.php';
		}

		function dt_load_shortcodes() {

			require_once 'shortcodes/base.php';

			require_once 'shortcodes/single-event-venue.php';

			require_once 'shortcodes/plain-list.php';
			require_once 'shortcodes/compact-list.php';
			require_once 'shortcodes/weekly-schedule.php';
			require_once 'shortcodes/weekly-tab.php';
			require_once 'shortcodes/cover.php';
			require_once 'shortcodes/single-event-count-down.php';
			require_once 'shortcodes/single-modern.php';
			require_once 'shortcodes/organizer-events.php';
			require_once 'shortcodes/modern-weekly-tab.php';

			#require_once 'shortcodes/simple-list.php';
			#require_once 'shortcodes/simple-agenda.php';
		}

        function dt_sc_vc_title( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            return $out;
        }

        function dt_sc_vc_hr( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            $out .= '<hr/>';

            return $out;
        }

        function dt_sc_vc_hr_invisible( $settings, $value ) {

            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
            $out .= '<hr/>';

            return $out;
        }

        function dt_sc_input_number( $settings, $value ) {

        	$min     = ( isset( $settings['min'] ) ) ? $settings['min'] : "0";
            $max     = ( isset( $settings['max'] ) ) ? "max=\"{$settings['max']}\"" : "";
            $step    = ( isset( $settings['step'] ) ) ? "step=\"{$settings['step']}\"" : "";

            $out  = '<div class="dt_vc_param dt_vc_input_number">';
            $out .= '<input min="'.esc_attr( $min ).'"'. $max.$step.' name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" />';
            $out .= '</div>';

            return $out;
        }


        function dt_sc_vc_date_picker( $settings, $value ) {
            $out  = '<input name="' . esc_attr( $settings['param_name'] ) . '" class="dt-vc-date-picker wpb_vc_param_value wpb-textinput ' .esc_attr( $settings['param_name'] ) . ' ' .esc_attr( $settings['type'] ) . '_field" type="text" readonly="true" value="' . esc_attr( $value ) . '" />';
            return $out;
        }        
	}
}