<?php
vc_map( array(
    "name" => esc_html__( "Search Form", 'designthemes-core' ),
    "base" => "dt_sc_header_search_form",
    "icon" => "dt_sc_header_search_form",
    "category" => esc_html__( 'Header', 'designthemes-core' ),
    "params"    => array(

        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array (
                'auto_generate' => true
            )
        ),

        # Display Style
        array(
            'param_name' => 'style',
            'heading'    => esc_html__( 'Display Style', 'designthemes-core' ),
            'type'       => 'dropdown',
            'save_always' => true,
            'std' => 'simple',
            'value'      => array(
                __( 'Simple', 'designthemes-core' )  => 'simple',
                __( 'Full width', 'designthemes-core' )  => 'overlay',
                __( 'Slide Down', 'designthemes-core' )  => 'slide-down',
            ),
        ),
	  
	  array(
	  	'type' => 'textfield',
		'heading' => __( 'Extra class name', 'designthemes-core' ),
		'param_name' => 'el_class',
		'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core' ),
	 ),	  
    )
) );