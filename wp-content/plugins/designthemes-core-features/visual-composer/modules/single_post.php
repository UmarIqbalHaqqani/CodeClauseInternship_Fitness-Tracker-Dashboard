<?php add_action( 'vc_before_init', 'dt_sc_post_vc_map' );
function dt_sc_post_vc_map() {

	$arr = array( esc_html__('Yes','designthemes-core') => 'yes', esc_html__('No','designthemes-core') => 'no' );

	vc_map( array(
		"name" => esc_html__( "Single Post", 'designthemes-core' ),
		"base" => "dt_sc_post",
		"icon" => "dt_sc_post",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Show single post",'designthemes-core'),
		"params" => array(

			// Post ID
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'ID', 'designthemes-core' ),
				'param_name' => 'id',
				'description' => esc_html__( 'Enter post ID', 'designthemes-core' ),
				'admin_label' => true
			),

			// Post style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style','designthemes-core'),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Default','designthemes-core') => 'blog-default-style',
					esc_html__('Date Left','designthemes-core') => 'entry-date-left',
					esc_html__('Date and Author Left','designthemes-core') => 'entry-date-author-left',
					esc_html__('Medium','designthemes-core') => 'blog-medium-style',
					esc_html__('Medium Highlight','designthemes-core') => 'blog-medium-style dt-blog-medium-highlight',
					esc_html__('Medium Skin Highlight','designthemes-core') => 'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight'	
				)
			),

			// Allow excerpt
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Allow Excerpt','designthemes-core'),
				'param_name' => 'allow_excerpt',
				'value' => $arr
			),

			// Excerpt Length
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Excerpt Length', 'designthemes-core' ),
				'param_name' => 'excerpt_length',
				'value' => 40
			),

			// Show Post Format?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Post Format?','designthemes-core'),
				'param_name' => 'show_post_format',
				'value' => $arr
			),

			// Show Author ?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Author ?','designthemes-core'),
				'param_name' => 'show_author',
				'value' => $arr
			),

			// Show Date ?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Date ?','designthemes-core'),
				'param_name' => 'show_date',
				'value' => $arr
			),

			// Show Comment ?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Comment ?','designthemes-core'),
				'param_name' => 'show_comment',
				'value' => $arr
			),

			// Show Category?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Category?','designthemes-core'),
				'param_name' => 'show_category',
				'value' => $arr
			),

			// Show Tag?
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Tag?','designthemes-core'),
				'param_name' => 'show_tag',
				'value' => $arr
			),

			// Button Style
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Read more Button','designthemes-core'),
				'param_name' => 'content',
				'value' => '[dt_sc_button iconclass="fa fa-long-arrow-right" iconalign="icon-right with-icon" style="filled" class="type1" title="Read More" icon_type="fontawesome" target="_blank" /]',
			)
		)
	) );	
}?>