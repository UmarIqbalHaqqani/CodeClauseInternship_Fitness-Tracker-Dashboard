<?php

require_once get_template_directory() . '/kirki/kirki-utils.php';
require_once get_template_directory() . '/kirki/include-kirki.php';
require_once get_template_directory() . '/kirki/kirki.php';

$config = maruthi_kirki_config();

add_action('customize_register', 'maruthi_customize_register');
function maruthi_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->remove_section('themes');
	$wp_customize->get_section('title_tagline')->priority = 10;
}

add_action( 'customize_controls_print_styles', 'maruthi_enqueue_customizer_stylesheet' );
function maruthi_enqueue_customizer_stylesheet() {
	wp_register_style( 'maruthi-customizer-css', MARUTHI_THEME_URI.'/kirki/assets/css/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'maruthi-customizer-css' );	
}

add_action( 'customize_controls_print_footer_scripts', 'maruthi_enqueue_customizer_script' );
function maruthi_enqueue_customizer_script() {
	wp_register_script( 'maruthi-customizer-js', MARUTHI_THEME_URI.'/kirki/assets/js/customizer.js', array('jquery', 'customize-controls' ), false, true );
	wp_enqueue_script( 'maruthi-customizer-js' );
}

# Theme Customizer Begins
MARUTHI_Kirki::add_config( $config , array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

	# Site Identity	
		# use-custom-logo
		MARUTHI_Kirki::add_field( $config, array(
			'type'     => 'switch',
			'settings' => 'use-custom-logo',
			'label'    => esc_html__( 'Logo ?', 'maruthi' ),
			'section'  => 'title_tagline',
			'priority' => 1,
			'default'  => maruthi_defaults('use-custom-logo'),
			'description' => esc_html__('Switch to Site title or Logo','maruthi'),
			'choices'  => array(
				'on'  => esc_attr__( 'Logo', 'maruthi' ),
				'off' => esc_attr__( 'Site Title', 'maruthi' )
			)			
		) );

		# custom-logo
		MARUTHI_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-logo',
			'label'    => esc_html__( 'Logo', 'maruthi' ),
			'section'  => 'title_tagline',
			'priority' => 2,
			'default' => maruthi_defaults( 'custom-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));

		# custom-light-logo
		MARUTHI_Kirki::add_field( $config, array(
			'type' => 'image',
			'settings' => 'custom-light-logo',
			'label'    => esc_html__( 'Light Logo', 'maruthi' ),
			'section'  => 'title_tagline',
			'priority' => 3,
			'default' => maruthi_defaults( 'custom-light-logo' ),
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '==', 'value' => '1' )
			)
		));	
		
		# site-title-color
		MARUTHI_Kirki::add_field( $config, array(
			'type' => 'color',
			'settings' => 'custom-title',
			'label'    => esc_html__( 'Site Title Color', 'maruthi' ),
			'section'  => 'title_tagline',
			'priority' => 4,
			'active_callback' => array(
				array( 'setting' => 'use-custom-logo', 'operator' => '!=', 'value' => '1' )
			),
			'output' => array(
				array( 'element' => '#logo .logo-title > h1 a, #logo .logo-title h2 a' , 'property' => 'color', 'suffix' => ' !important' )
			),
			'choices' => array( 'alpha' => true ),
		));	

	# Site Layout
	require_once get_template_directory() . '/kirki/options/site-layout.php';

	# Site Skin
	require_once get_template_directory() . '/kirki/options/site-skin.php';

	# Additional JS
	require_once get_template_directory() . '/kirki/options/custom-js.php';

	# Typography
	MARUTHI_Kirki::add_panel( 'dt_site_typography_panel', array(
		'title' => esc_html__( 'Typography', 'maruthi' ),
		'description' => esc_html__('Typography Settings','maruthi'),
		'priority' => 220
	) );	
	require_once get_template_directory() . '/kirki/options/site-typography.php';	
# Theme Customizer Ends