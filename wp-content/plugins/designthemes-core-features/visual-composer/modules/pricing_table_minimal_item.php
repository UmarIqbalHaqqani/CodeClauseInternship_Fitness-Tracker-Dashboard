<?php add_action( 'vc_before_init', 'dt_sc_pricing_table_minimal_item_vc_map' );
function dt_sc_pricing_table_minimal_item_vc_map() {
	vc_map( array( 
		"name" => esc_html__( "Pricing Box 2", 'designthemes-core' ),
            "base" => "dt_sc_pricing_table_minimal_item",
		"icon" => "dt_sc_pricing_table_minimal_item",
		"category" => DT_VC_CATEGORY,		
		"params" => array(

			// Heading
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'designthemes-core' ),
				'admin_label' => true,
      			"param_name" => "heading"
      		),

			// Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub title", 'designthemes-core' ),
				'admin_label' => true,
      			"param_name" => "subtitle"
      		),

      		// selected
      		array(
      			'type' => 'checkbox',
      			'heading' => esc_html__( 'Is active?', 'designthemes-core' ),
				'admin_label' => true,
      			'param_name' => 'highlight',
      			'description' => esc_html__( 'If checked pricing box will be highlighted', 'designthemes-core' ),
      			'value' => array( esc_html__( 'Yes', 'designthemes-core' ) => 'yes' )
      		),

                  # Icon Type
                  array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Type','designthemes-core'),
                        'param_name' => 'icon_type',
                        'value' => array( 
                              esc_html__('Font Awesome', 'designthemes-core' ) => 'fontawesome' ,
                              esc_html__('Class','designthemes-core') => 'css_class' ),
                        'std' => 'fontawesome'
                  ),

                  # Font Awesome
                  array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Font Awesome', 'designthemes-core' ),
                        'param_name' => 'icon',
                        'value' => 'fa fa-info-circle',
                        'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000 ),
                        'dependency' => array(
                              'element' => 'icon_type',
                              'value' => 'fontawesome',
                        ),
                        'description' => esc_html__( 'Select icon from library', 'designthemes-core' ),
                  ),

                  # Custom Class
                  array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Custom class', 'designthemes-core' ),
                        'param_name' => 'icon_css_class',
                        'value' => '',
                        'dependency' => array(
                              'element' => 'icon_type',
                              'value' => 'css_class',
                        )
                  ),

                  // Starting
                  array(
                        "type" => "textfield",
                        "heading" => esc_html__( "Text before price", 'designthemes-core' ),
                        "param_name" => "starting"
                  ),

			// Price
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price", 'designthemes-core' ),
      			"param_name" => "price",
      			"description" => esc_html__("Enter the price for this package e.g. $157.99 ",'designthemes-core'),
      			),

			// Price Unit
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Price Unit", 'designthemes-core' ),
      			"param_name" => "permonth",
      			"description" => esc_html__("Enter the price unit for this package e.g. / Mo",'designthemes-core')
      		),

      		# URL
      		array(
      			'type' => 'vc_link',
      			'heading' => esc_html__( 'URL (Link)', 'designthemes-core' ),
      			'param_name' => 'link',
      			'description' => esc_html__( 'Add link to this package', 'designthemes-core' )
      		)      		      		      					      		
		)
	) );
}?>