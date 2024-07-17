<?php add_action( 'vc_before_init', 'dt_sc_class_nav_vc_map' );
function dt_sc_class_nav_vc_map() {

	$plural_name   	 = esc_html__('Classes', 'designthemes-class');
	if( function_exists( 'maruthi_cs_get_option' ) ) :
		$plural_name =	maruthi_cs_get_option( 'plural-class-name', $plural_name );
	endif;

	vc_map( array(
		'name' => __( 'Single Class Nav', 'designthemes-class' ),
		'base' => 'dt_sc_class_nav',
		'icon' => 'dt_sc_class_nav',
		"category" => $plural_name,
		'description' => __( 'Vertical navigation for single class.', 'designthemes-class' ),
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => __( 'Navigaion', 'designthemes-class' ),
				'param_name' => 'navigations',
				'description' => __( 'Enter navigation for class.', 'designthemes-class' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Name', 'designthemes-class' ),
						'param_name' => 'name',
						'description' => __( 'Enter the name of navigation.', 'designthemes-class' ),
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Link', 'designthemes-class' ),
						'param_name' => 'link',
						'description' => __( 'Enter the link of navigation.', 'designthemes-class' ),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Icon Class', 'designthemes-class' ),
						'param_name' => 'icon',
						'description' => __( 'Enter the icon class of navigation.', 'designthemes-class' ),
					),
				),
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'designthemes-class' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-class' ),
			),
		),
	));	
}