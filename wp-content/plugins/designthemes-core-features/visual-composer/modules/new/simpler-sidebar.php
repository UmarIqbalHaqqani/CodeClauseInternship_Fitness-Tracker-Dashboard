<?php
vc_map( array(
    'name'      => esc_html__( "Simpler Sidebar", 'designthemes-core' ),
    'base'      => "dt_sc_simpler_sidebar",
    'icon'      => "dt_sc_simpler_sidebar",
    'category'  => DT_VC_CATEGORY,
    'params'    => array(

    	array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

        array(
        	'type' => 'textfield',
        	'heading' => __( 'ID', 'designthemes-core' ),
        	'param_name' => 'simpler_id',
            "admin_label"   => true,
            'description' => esc_html__('Enter Element ID.', 'designthemes-core'),
        ),

        # Direction
        array(
            'type' => 'dropdown',
            'param_name' => 'direction',
            'heading' => esc_html__('Direction', 'designthemes-core'),
            'value' => array(
                esc_html__( 'Left', 'designthemes-core' ) => 'left',
                esc_html__( 'Right', 'designthemes-core' ) => 'right',
            ),
            'save_always' => true,
            'std' => 'right',
        ),        
    )
) );          