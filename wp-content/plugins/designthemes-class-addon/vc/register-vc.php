<?php if( !class_exists('DTVCClassModule') ) {
	class DTVCClassModule {

		function __construct() {

			add_action ( 'after_setup_theme', array ( $this, 'dt_map_classes_shortcodes' ) , 1000 );
			add_action( 'admin_enqueue_scripts', array( $this, 'dt_class_vc_admin_scripts')  );
		}

		function dt_map_classes_shortcodes() {

			global $pagenow;

			$path = plugin_dir_path ( __FILE__ ).'modules/';
			$modules = array(
				'class_item' 			=>  $path.'class_item.php',
				'dt_sc_class_list'  	=>  $path.'filterable_classes_list.php',
				'dt_sc_class_title'  	=>  $path.'single_class_title.php',
				'dt_sc_class_info'  	=>  $path.'single_class_info.php',
				'dt_sc_class_nav'   	=>  $path.'single_class_nav.php',
				'dt_sc_workout'   		=>  $path.'workout.php',
				'dt_sc_working_hours'   =>  $path.'working_hours.php',
				'dt_sc_work_hour'   	=>  $path.'work_hour.php',
				'dt_sc_bmi_calculator'  =>  $path.'bmi_calculator.php',
				'dt_sc_class_step' 		=>  $path.'class_step.php',
				'dt_sc_subscription_info' =>  $path.'subscription_info.php',
				'dt_sc_package_item' 	=>  $path.'package_item.php',
				'dt_sc_trainers'	 	=>  $path.'trainers.php'
			);

			// Apply filters so you can easily modify the modules 100%
			$modules = apply_filters( 'vcex_builder_modules', $modules );

			if( !empty( $modules ) ){
				foreach ( $modules as $key => $val ) {
					require_once( $val );
				}
			}
		}

		function dt_class_vc_admin_scripts( $hook ) {

			if($hook == "post.php" || $hook == "post-new.php") {
				wp_enqueue_style( 'dt-class-vc-admin', plugins_url ('designthemes-class-addon') . '/vc/style.css', array (), false, 'all' );
			}			
		}		
	}
}?>