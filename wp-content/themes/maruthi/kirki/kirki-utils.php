<?php
function maruthi_kirki_config() {
	return 'maruthi_kirki_config';
}

function maruthi_defaults( $key = '' ) {
	$defaults = array();

	# site identify
	$defaults['use-custom-logo']   = '1';
	$defaults['custom-logo']       = MARUTHI_THEME_URI.'/images/logo.png';
	$defaults['custom-light-logo'] = MARUTHI_THEME_URI.'/images/light-logo.png';
	$defaults['site_icon']         = MARUTHI_THEME_URI.'/images/favicon.ico';

	# site layout
	$defaults['site-layout'] = 'wide';

	# site skin
	$defaults['primary-color']       = '#da0000';
	$defaults['secondary-color']     = '#ff2828';
	$defaults['tertiary-color']      = '#c50000';

	$defaults['body-bg-color']      = '#ffffff';
	$defaults['body-content-color'] = '#222423';
	$defaults['body-a-color']       = '#222423';
	$defaults['body-a-hover-color'] = '#dc1d24';
	$defaults['custom-title']       = '#ffffff';

	# site breadcrumb
	$defaults['customize-breadcrumb-title-typo'] = '1';
	$defaults['breadcrumb-title-typo'] = array( 'font-family' => 'Hind Siliguri',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '36px',
		'line-height'    => '',
		'letter-spacing' => '0px',
		'color'          => '#ffffff',
		'text-align'     => 'unset',
		'text-transform' => 'none' );
	$defaults['customize-breadcrumb-typo'] = '1';
	$defaults['breadcrumb-typo'] = array( 'font-family' => 'Hind Siliguri',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '14px',
		'line-height'    => '',
		'letter-spacing' => '0px',
		'color'          => '#ffffff',
		'text-align'     => 'unset',
		'text-transform' => 'none' );

	# site footer
	$defaults['customize-footer-title-typo'] = '1';
	$defaults['footer-title-typo'] = array( 'font-family' => 'Hind Siliguri',
		'variant'        => '700',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '20px',
		'line-height'    => '24px',
		'letter-spacing' => '0',
		'color'          => '#222423',
		'text-align'     => 'left',
		'text-transform' => 'none' );
	$defaults['customize-footer-content-typo'] = '1';
	$defaults['footer-content-typo'] = array( 'font-family' => 'Hind Siliguri',
		'variant'        => 'regular',
		'subsets'        => array( 'latin-ext' ),
		'font-size'      => '14px',
		'line-height'    => '24px',
		'letter-spacing' => '0',
		'color'          => '#222423',
		'text-align'     => 'left',
		'text-transform' => 'none' );

	# site typography
	$defaults['customize-body-h1-typo'] = '1';
	$defaults['h1'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '36px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h2-typo'] = '1';
	$defaults['h2'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '32px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h3-typo'] = '1';
	$defaults['h3'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '28px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h4-typo'] = '1';
	$defaults['h4'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '24px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h5-typo'] = '1';
	$defaults['h5'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '20px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h6-typo'] = '1';
	$defaults['h6'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => '700',
		'font-size'      => '18px',
		'line-height'    => '',
		'letter-spacing' => '0.05em',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-content-typo'] = '1';
	$defaults['body-content-typo'] = array(
		'font-family'    => 'Hind Siliguri',
		'variant'        => 'normal',
		'font-size'      => '14px',
		'line-height'    => '24px',
		'letter-spacing' => '',
		'color'          => '#222423',
		'text-align'     => 'unset',
		'text-transform' => 'none'
	);

	if( !empty( $key ) && array_key_exists( $key, $defaults) ) {
		return $defaults[$key];
	}

	return '';
}

function maruthi_image_positions() {

	$positions = array( "top left" => esc_attr__('Top Left','maruthi'),
		"top center"    => esc_attr__('Top Center','maruthi'),
		"top right"     => esc_attr__('Top Right','maruthi'),
		"center left"   => esc_attr__('Center Left','maruthi'),
		"center center" => esc_attr__('Center Center','maruthi'),
		"center right"  => esc_attr__('Center Right','maruthi'),
		"bottom left"   => esc_attr__('Bottom Left','maruthi'),
		"bottom center" => esc_attr__('Bottom Center','maruthi'),
		"bottom right"  => esc_attr__('Bottom Right','maruthi'),
	);

	return $positions;
}

function maruthi_image_repeats() {

	$image_repeats = array( "repeat" => esc_attr__('Repeat','maruthi'),
		"repeat-x"  => esc_attr__('Repeat in X-axis','maruthi'),
		"repeat-y"  => esc_attr__('Repeat in Y-axis','maruthi'),
		"no-repeat" => esc_attr__('No Repeat','maruthi')
	);

	return $image_repeats;
}

function maruthi_border_styles() {

	$image_repeats = array(
		"none"	 => esc_attr__('None','maruthi'),
		"dotted" => esc_attr__('Dotted','maruthi'),
		"dashed" => esc_attr__('Dashed','maruthi'),
		"solid"	 => esc_attr__('Solid','maruthi'),
		"double" => esc_attr__('Double','maruthi'),
		"groove" => esc_attr__('Groove','maruthi'),
		"ridge"	 => esc_attr__('Ridge','maruthi'),
	);

	return $image_repeats;
}

function maruthi_animations() {

	$animations = array(
		'' 					 => esc_html__('Default','maruthi'),	
		"bigEntrance"        =>  esc_attr__("bigEntrance",'maruthi'),
        "bounce"             =>  esc_attr__("bounce",'maruthi'),
        "bounceIn"           =>  esc_attr__("bounceIn",'maruthi'),
        "bounceInDown"       =>  esc_attr__("bounceInDown",'maruthi'),
        "bounceInLeft"       =>  esc_attr__("bounceInLeft",'maruthi'),
        "bounceInRight"      =>  esc_attr__("bounceInRight",'maruthi'),
        "bounceInUp"         =>  esc_attr__("bounceInUp",'maruthi'),
        "bounceOut"          =>  esc_attr__("bounceOut",'maruthi'),
        "bounceOutDown"      =>  esc_attr__("bounceOutDown",'maruthi'),
        "bounceOutLeft"      =>  esc_attr__("bounceOutLeft",'maruthi'),
        "bounceOutRight"     =>  esc_attr__("bounceOutRight",'maruthi'),
        "bounceOutUp"        =>  esc_attr__("bounceOutUp",'maruthi'),
        "expandOpen"         =>  esc_attr__("expandOpen",'maruthi'),
        "expandUp"           =>  esc_attr__("expandUp",'maruthi'),
        "fadeIn"             =>  esc_attr__("fadeIn",'maruthi'),
        "fadeInDown"         =>  esc_attr__("fadeInDown",'maruthi'),
        "fadeInDownBig"      =>  esc_attr__("fadeInDownBig",'maruthi'),
        "fadeInLeft"         =>  esc_attr__("fadeInLeft",'maruthi'),
        "fadeInLeftBig"      =>  esc_attr__("fadeInLeftBig",'maruthi'),
        "fadeInRight"        =>  esc_attr__("fadeInRight",'maruthi'),
        "fadeInRightBig"     =>  esc_attr__("fadeInRightBig",'maruthi'),
        "fadeInUp"           =>  esc_attr__("fadeInUp",'maruthi'),
        "fadeInUpBig"        =>  esc_attr__("fadeInUpBig",'maruthi'),
        "fadeOut"            =>  esc_attr__("fadeOut",'maruthi'),
        "fadeOutDownBig"     =>  esc_attr__("fadeOutDownBig",'maruthi'),
        "fadeOutLeft"        =>  esc_attr__("fadeOutLeft",'maruthi'),
        "fadeOutLeftBig"     =>  esc_attr__("fadeOutLeftBig",'maruthi'),
        "fadeOutRight"       =>  esc_attr__("fadeOutRight",'maruthi'),
        "fadeOutUp"          =>  esc_attr__("fadeOutUp",'maruthi'),
        "fadeOutUpBig"       =>  esc_attr__("fadeOutUpBig",'maruthi'),
        "flash"              =>  esc_attr__("flash",'maruthi'),
        "flip"               =>  esc_attr__("flip",'maruthi'),
        "flipInX"            =>  esc_attr__("flipInX",'maruthi'),
        "flipInY"            =>  esc_attr__("flipInY",'maruthi'),
        "flipOutX"           =>  esc_attr__("flipOutX",'maruthi'),
        "flipOutY"           =>  esc_attr__("flipOutY",'maruthi'),
        "floating"           =>  esc_attr__("floating",'maruthi'),
        "hatch"              =>  esc_attr__("hatch",'maruthi'),
        "hinge"              =>  esc_attr__("hinge",'maruthi'),
        "lightSpeedIn"       =>  esc_attr__("lightSpeedIn",'maruthi'),
        "lightSpeedOut"      =>  esc_attr__("lightSpeedOut",'maruthi'),
        "pullDown"           =>  esc_attr__("pullDown",'maruthi'),
        "pullUp"             =>  esc_attr__("pullUp",'maruthi'),
        "pulse"              =>  esc_attr__("pulse",'maruthi'),
        "rollIn"             =>  esc_attr__("rollIn",'maruthi'),
        "rollOut"            =>  esc_attr__("rollOut",'maruthi'),
        "rotateIn"           =>  esc_attr__("rotateIn",'maruthi'),
        "rotateInDownLeft"   =>  esc_attr__("rotateInDownLeft",'maruthi'),
        "rotateInDownRight"  =>  esc_attr__("rotateInDownRight",'maruthi'),
        "rotateInUpLeft"     =>  esc_attr__("rotateInUpLeft",'maruthi'),
        "rotateInUpRight"    =>  esc_attr__("rotateInUpRight",'maruthi'),
        "rotateOut"          =>  esc_attr__("rotateOut",'maruthi'),
        "rotateOutDownRight" =>  esc_attr__("rotateOutDownRight",'maruthi'),
        "rotateOutUpLeft"    =>  esc_attr__("rotateOutUpLeft",'maruthi'),
        "rotateOutUpRight"   =>  esc_attr__("rotateOutUpRight",'maruthi'),
        "shake"              =>  esc_attr__("shake",'maruthi'),
        "slideDown"          =>  esc_attr__("slideDown",'maruthi'),
        "slideExpandUp"      =>  esc_attr__("slideExpandUp",'maruthi'),
        "slideLeft"          =>  esc_attr__("slideLeft",'maruthi'),
        "slideRight"         =>  esc_attr__("slideRight",'maruthi'),
        "slideUp"            =>  esc_attr__("slideUp",'maruthi'),
        "stretchLeft"        =>  esc_attr__("stretchLeft",'maruthi'),
        "stretchRight"       =>  esc_attr__("stretchRight",'maruthi'),
        "swing"              =>  esc_attr__("swing",'maruthi'),
        "tada"               =>  esc_attr__("tada",'maruthi'),
        "tossing"            =>  esc_attr__("tossing",'maruthi'),
        "wobble"             =>  esc_attr__("wobble",'maruthi'),
        "fadeOutDown"        =>  esc_attr__("fadeOutDown",'maruthi'),
        "fadeOutRightBig"    =>  esc_attr__("fadeOutRightBig",'maruthi'),
        "rotateOutDownLeft"  =>  esc_attr__("rotateOutDownLeft",'maruthi')
    );

	return $animations;
}