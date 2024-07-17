<?php
vc_map( array(
	"name" => esc_html__( "Portfolio Widget", 'designthemes-core' ),
	"base" => "dt_sc_portfolio_widget",
	"icon" => "dt_sc_portfolio_widget",
	'category' => __( 'WordPress Widgets', 'designthemes-core' ),
    'params'    => array(

        # ID
        array(
            'type' => 'el_id',
            'param_name' => 'el_id',
            'edit_field_class' => 'hidden',
            'settings' => array(
                'auto_generate' => true,
            )
        ),

        # Title
        array(
            'type' => 'textfield',
            'heading' => __( 'Widget title', 'designthemes-core' ),
            'save_always' => true,
            'param_name' => 'title',
            'description' => __( 'What text use as a widget title. Leave blank to use default widget title.', 'designthemes-core' ),
        ),        

        # Category
        array(
            'type'  => 'autocomplete',
            'save_always' => true,
            'heading' => __( 'Categories', 'designthemes-core'),
            'param_name' => '_post_categories',
            'settings' => array( 'multiple' => true ),
            'description' => esc_html__('Choose the categories you want to display (multiple selection possible)','designthemes-core')
        ),

        # Tweets Count
        array(
            'type' => 'dt_sc_input_number',
            'heading' => __( 'Portfolio Count', 'designthemes-core' ),
            'param_name' => '_post_count',
            'min'   => '1',
            'max'   => '30',
            'step'  => '1',
            'std'   => '3',
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),        
    )
) );