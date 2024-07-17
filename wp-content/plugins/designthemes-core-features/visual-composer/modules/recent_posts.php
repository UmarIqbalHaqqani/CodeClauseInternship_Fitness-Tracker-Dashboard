<?php add_action( 'vc_before_init', 'dt_sc_recent_post_vc_map' );
function dt_sc_recent_post_vc_map() {

	$arr = array( esc_html__('Yes','designthemes-core') => 'yes', esc_html__('No','designthemes-core') => 'no' );

	vc_map( array(
		"name" => esc_html__( "Recent Posts", 'designthemes-core' ),
		"base" => "dt_sc_recent_post",
		"icon" => "dt_sc_recent_post",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Show recent posts",'designthemes-core'),
		"params" => array(

			// Post Count
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Post Counts', 'designthemes-core' ),
				'param_name' => 'count',
				'description' => esc_html__( 'Enter post count', 'designthemes-core' ),
				'admin_label' => true
			),

			// Post column
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','designthemes-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('I Column','designthemes-core') => 'one-column',
					esc_html__('II Columns','designthemes-core') => 'one-half-column' ,
					esc_html__('III Columns','designthemes-core') => 'one-third-column',
					esc_html__('I-II-II Columns','designthemes-core') => '1-2-2',
					esc_html__('I-III-III Columns','designthemes-core') => '1-3-3-3',
					esc_html__('I-II-I-II Columns','designthemes-core') => '1-2-2-1-2-2',
					esc_html__('I-III-I-III Columns','designthemes-core') => '1-3-3-3-1'
				),
				'std' => 'one-third-column'
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
				'value' => 30
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
				'value' => '[dt_sc_button size="small" iconclass="fa fa-long-arrow-right" iconalign="icon-right with-icon" style="filled" class="type1" title="Read More" icon_type="fontawesome" target="_blank" /]'
			)
		)
	) );	
}?>