<?php
if( !class_exists('DTClassModuleCustomPostTypes') ) {

	class DTClassModuleCustomPostTypes {

		function __construct() {

			// Add Hook into the 'wp_enqueue_scripts()' action			
			add_action ( 'wp_enqueue_scripts', array ( $this, 'dt_wp_enqueue_scripts' ) );

			// Class custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-class-post-type.php';
			if( class_exists('DTClassPostType') ) {
				new DTClassPostType();
			}
			
			// Trainer custom post type
			require_once plugin_dir_path ( __FILE__ ) . '/dt-trainer-post-type.php';
			if( class_exists('DTTrainerPostType') ) {
				new DTTrainerPostType();
			}

			add_action( 'wp_ajax_dt_ajax_bmi_calc_fun', array ( $this, 'dt_ajax_bmi_calc_fun' ) );
			add_action( 'wp_ajax_nopriv_dt_ajax_bmi_calc_fun', array ( $this, 'dt_ajax_bmi_calc_fun' ) );
		}

		/**
		 * A function hook that the WordPress core launches at 'wp_enqueue_scripts' points
		 * Works in both front and back end
		 */
		function dt_wp_enqueue_scripts() {

			wp_enqueue_script ( 'dt-class-addon', plugins_url ('designthemes-class-addon') . '/js/classes.js', array ('jquery'), false, true );
			wp_enqueue_style ( 'dt-class-addon', plugins_url ('designthemes-class-addon') . '/css/classes.css', array (), false, 'all' );
		}

		function dt_ajax_bmi_calc_fun() {

			$out = $bmi = $bmr = $bmrwc = '';

			$height = (isset($_REQUEST['height'])) ? $_REQUEST['height'] : '';
			$weight = (isset($_REQUEST['weight'])) ? $_REQUEST['weight'] : '';
			$age 	= (isset($_REQUEST['age'])) ? $_REQUEST['age'] : '';
			$sex 	= (isset($_REQUEST['sex'])) ? $_REQUEST['sex'] : '';
			$active	= (isset($_REQUEST['activity'])) ? $_REQUEST['activity'] : '';
			$underwid	= (isset($_REQUEST['underwid'])) ? $_REQUEST['underwid'] : '';
			$overwid	= (isset($_REQUEST['overwid'])) ? $_REQUEST['overwid'] : '';

			if( $height != '' && $weight != '' ):
				$h = $height / 100;
				$bmi = $weight / ( $h * $h );
				$bmi = number_format( $bmi, 2 );

				$out .= '<h2>'.$bmi.'</h2>';
			endif;

			if( $height != '' && $weight != '' && $age != '' && $sex != '' ):
				if( $sex == 'male' )
					$bmr = ( 10 * $weight ) + ( 6.25 * $height ) - ( 5 * $age ) + 5;
				if( $sex == 'female' )
					$bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;

				$bmr = round($bmr);
				$out .= '<p>'.esc_html__('BMR ', 'designthemes-class').$bmr.' kcal/day'.'</p>';
			endif;

			if( $height != '' && $weight != '' && $age != '' && $sex != '' && $active != '' ):
				$bmrwc = $bmr * $active;

				$out .= '<p>'.esc_html__('BMR w/Activity Factor ', 'designthemes-class').$bmrwc.' kcal/day'.'</p>';
			endif;

			$bmi = number_format( $bmi, 1 );
			if( $bmi < 18.5 ):
				$out = '<div class="dt-bmidata"><h5 class="yellow">'.esc_html__('You are Underweight!', 'designthemes-class').'</h5>'.$out.'</div>';
				if( $underwid != '' ):
					$out .= '<p><a href="'.get_permalink($underwid).'" title="'.esc_attr__('Improve Weight', 'designthemes-class').'" target="_blank">'.esc_html__('Click Here', 'designthemes-class').'</a>'.esc_html__(' to Improve Your Body Weight.', 'designthemes-class').'</p>';
				endif;	
			elseif( $bmi >= 18.5 && $bmi <= 24.9 ):
				$out = '<div class="dt-bmidata"><h5 class="green">'.esc_html__('You are Healthy!', 'designthemes-class').'</h5>'.$out.'</div>';
			elseif( $bmi >= 25.0 && $bmi <= 29.9 ):
				$out = '<div class="dt-bmidata"><h5 class="red">'.esc_html__('You are Overweight!', 'designthemes-class').'</h5>'.$out.'</div>';
				if( $overwid != '' ):
					$out .= '<p><a href="'.get_permalink($overwid).'" title="'.esc_attr__('Reduce Weight', 'designthemes-class').'" target="_blank">'.esc_html__('Click Here', 'designthemes-class').'</a>'.esc_html__(' to Reduce Your Body Weight.', 'designthemes-class').'</p>';
				endif;
			elseif( $bmi >= 30.0 ):
				$out = '<div class="dt-bmidata"><h5 class="red">'.esc_html__('You are Obese!', 'designthemes-class').'</h5>'.$out.'</div>';
				if( $overwid != '' ) {
					$out .= '<p><a href="'.get_permalink($overwid).'" title="'.esc_attr__('Reduce Weight', 'designthemes-class').'" target="_blank">'.esc_html__('Click Here', 'designthemes-class').'</a>'.esc_html__(' to Reduce Your Body Weight.', 'designthemes-class').'</p>';
				}
			endif;

			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') :
				echo ($out);
			else :
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			endif;
			die();
		}
	}
}?>