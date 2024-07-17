<?php
$config = maruthi_kirki_config();

MARUTHI_Kirki::add_section( 'dt_site_layout_section', array(
	'title' => esc_html__( 'Site Layout', 'maruthi' ),
	'priority' => 20
) );

	# site-layout
	MARUTHI_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'site-layout',
		'label'    => esc_html__( 'Site Layout', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'default'  => maruthi_defaults('site-layout'),
		'choices' => array(
			'boxed' =>  MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/boxed.png',
			'wide' => MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/wide.png',
		)
	));

	# site-boxed-layout
	MARUTHI_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'site-boxed-layout',
		'label'    => esc_html__( 'Customize Boxed Layout?', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'default'  => '1',
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'maruthi' ),
			'off' => esc_attr__( 'No', 'maruthi' )
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
		)			
	));

	# body-bg-type
	MARUTHI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-type',
		'label'    => esc_html__( 'Background Type', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'multiple' => 1,
		'default'  => 'none',
		'choices'  => array(
			'pattern' => esc_attr__( 'Predefined Patterns', 'maruthi' ),
			'upload' => esc_attr__( 'Set Pattern', 'maruthi' ),
			'none' => esc_attr__( 'None', 'maruthi' ),
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-pattern
	MARUTHI_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'body-bg-pattern',
		'label'    => esc_html__( 'Predefined Patterns', 'maruthi' ),
		'description'    => esc_html__( 'Add Background for body', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'choices' => array(
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg',
			MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg'=> MARUTHI_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg',
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'pattern' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)						
	));

	# body-bg-image
	MARUTHI_Kirki::add_field( $config, array(
		'type' => 'image',
		'settings' => 'body-bg-image',
		'label'    => esc_html__( 'Background Image', 'maruthi' ),
		'description'    => esc_html__( 'Add Background Image for body', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'upload' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-position
	MARUTHI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-position',
		'label'    => esc_html__( 'Background Position', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-position' )
		),
		'default' => 'center',
		'multiple' => 1,
		'choices' => maruthi_image_positions(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload') ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-repeat
	MARUTHI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-repeat',
		'label'    => esc_html__( 'Background Repeat', 'maruthi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-repeat' )
		),
		'default' => 'repeat',
		'multiple' => 1,
		'choices' => maruthi_image_repeats(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload' ) ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));	