<?php
vc_map( array(
    'name'      => esc_html__( "Empty Space", 'designthemes-core' ),
    'base'      => "dt_sc_empty_space",
    'icon'      => "dt_sc_empty_space",
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
            'type' => 'dt_sc_input_number',
            'heading' => '<i class="fa fa-desktop"></i> '.__('Desktop','designthemes-core'),
            'param_name' => 'margin_lg',
            'edit_field_class' => 'vc_col-xs-6',
            'save_always' => true,
            'value' => 50,
            'description' => __('Height in px','designthemes-core')
        ),

        array(
            'type' => 'dt_sc_input_number',
            'heading' => '<i class="fa fa-tablet fa-rotate-90"></i> '.__('Tablet Landscape','designthemes-core'),
            'param_name' => 'margin_md',
            'save_always' => true,
            'edit_field_class' => 'vc_col-xs-6',
            'value' => 50,
            'description' => __('Height in px','designthemes-core')
        ),

        array(
            'type' => 'dt_sc_input_number',
            'heading' => '<i class="fa fa-tablet"></i> '.__('Tablet Portrait','designthemes-core'),
            'param_name' => 'margin_sm',
            'save_always' => true,
            'edit_field_class' => 'vc_col-xs-6',
            'value' => 50,
            'description' => __('Height in px','designthemes-core')
        ),

        array(
            'type' => 'dt_sc_input_number',
            'heading' => '<i class="fa fa-mobile"></i> '.__('Smartphone','designthemes-core'),
            'param_name' => 'margin_xs',
            'save_always' => true,
            'edit_field_class' => 'vc_col-xs-6',
            'value' => 50,
            'description' => __('Height in px','designthemes-core')
        ),

        # Settings Tab
            array(
                'type' => 'dt_sc_vc_title',
                'group' => __('Settings','designthemes-core'),
                'heading'    => esc_html__( 'Hide On', 'designthemes-core' ),
                'param_name' => 'title_for_empty_space_settings',
            ),

            array(
                'type' => 'checkbox',
                'group' => __('Settings','designthemes-core'),
                'param_name' => 'hide_on_lg',
                'value' => array( __( 'Large Devices', 'designthemes-core' ) => 'yes' ),
                'edit_field_class' => 'vc_column vc_col-sm-6',
            ),

            array(
                'type' => 'checkbox',
                'group' => __('Settings','designthemes-core'),
                'param_name' => 'hide_on_md',
                'value' => array( __( 'Medium Devices', 'designthemes-core' ) => 'yes' ),
                'edit_field_class' => 'vc_column vc_col-sm-6',
            ),

            array(
                'type' => 'checkbox',
                'group' => __('Settings','designthemes-core'),
                'param_name' => 'hide_on_sm',
                'value' => array( __( 'Small Devices', 'designthemes-core' ) => 'yes' ),
                'edit_field_class' => 'vc_column vc_col-sm-6 no-heading',
            ),

            array(
                'type' => 'checkbox',
                'group' => __('Settings','designthemes-core'),
                'param_name' => 'hide_on_xs',
                'value' => array( __( 'Very Small Devices', 'designthemes-core' ) => 'yes' ),
                'edit_field_class' => 'vc_column vc_col-sm-6 no-heading',
            ),        

            array(
                'type' => 'textfield',
                'heading' => __( 'Extra class name', 'designthemes-core' ),
                'param_name' => 'el_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'designthemes-core' ),
                'group' => __('Settings','designthemes-core')
            ),                                                     
    )
) );