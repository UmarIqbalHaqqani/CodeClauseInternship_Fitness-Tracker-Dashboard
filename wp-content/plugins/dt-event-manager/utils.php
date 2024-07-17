<?php

function dt_event_custom_widgets() {

	$custom_widgets = array();
	$widgets = is_array( cs_get_option( 'widgetarea-custom' ) ) ? cs_get_option( 'widgetarea-custom' ) : array();
	$widgets = array_filter($widgets);

	if( isset( $widgets ) ):

		foreach ( $widgets as $widget ) :
			$id = mb_convert_case($widget['widgetarea-custom-name'], MB_CASE_LOWER, "UTF-8");
			$id = str_replace(" ", "-", $id);
			$custom_widgets[$id] = $widget['widgetarea-custom-name'];
		endforeach;
	endif;

	return $custom_widgets;
}

function dt_is_theme() {

	$theme = wp_get_theme();
	$author = $theme->get('Author');

	if( $author == 'the DesignThemes team' ) {
		return true;
	} else {
		return false;
	}
}

function dt_event_get_template_part( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = dt_event_locate_template( $template_name, $template_path, $default_path );

	if ( !file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'dt_event_get_template_part', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'dt_event_before_get_template_part', $template_name, $template_path, $located, $args );
	
	if ( $located && file_exists( $located ) ) {
		include( $located );
	}

	do_action( 'dt_event_after_get_template_part', $template_name, $template_path, $located, $args );
}

function dt_event_locate_template( $template_name, $template_path = '', $default_path = '' ) {

	if ( !$template_path ) {
		$template_path = 'dt-event-manager';
	}

	if ( !$default_path ) {
		$default_path =  plugin_dir_path( __FILE__ ). 'templates/';
	}

	$template = null;

	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);

	// Get default template
	if ( !$template ) {
		$template = $default_path . $template_name;
	}
	
	// Return what we found
	return apply_filters( 'dt_event_locate_template', $template, $template_name, $template_path );
}