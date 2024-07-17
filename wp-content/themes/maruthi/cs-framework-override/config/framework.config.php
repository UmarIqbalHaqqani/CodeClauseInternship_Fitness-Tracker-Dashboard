<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => constant('MARUTHI_THEME_NAME').' '.esc_html__('Options', 'maruthi'),
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => sprintf( esc_html__('Designthemes Framework %sby Designthemes%s', 'maruthi'), '<small>', '</small>' )
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

$options[]      = array(
  'name'        => 'general',
  'title'       => esc_html__('General', 'maruthi'),
  'icon'        => 'fa fa-gears',

  'fields'      => array(

	array(
	  'type'    => 'subheading',
	  'content' => esc_html__( 'General Options', 'maruthi' ),
	),
	
	array(
		'id'	=> 'header',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Header', 'maruthi'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_headers',
			'orderby'	=> 'title',
			'order'	=> 'ASC',
			'posts_per_page' => -1
		),
		'default_option'	=> esc_attr__('Select Header', 'maruthi'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select default header.','maruthi'),
	),
	
	array(
		'id'	=> 'footer',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Footer', 'maruthi'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_footers',
			'orderby'	=> 'title',
			'order'	=> 'ASC',
			'posts_per_page' => -1
		),
		'default_option'	=> esc_attr__('Select Footer', 'maruthi'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select defaultfooter.','maruthi'),
	),

	array(
	  'id'  	 => 'use-site-loader',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Site Loader', 'maruthi'),
	  'info'	 => esc_html__('YES! to use site loader.', 'maruthi')
	),	

	array(
	  'id'  	 => 'enable-stylepicker',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Style Picker', 'maruthi'),
	  'info'	 => esc_html__('YES! to show the style picker.', 'maruthi')
	),		

	array(
	  'id'  	 => 'show-pagecomments',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Globally Show Page Comments', 'maruthi'),
	  'info'	 => esc_html__('YES! to show comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings.', 'maruthi'),
	  'default'  => true,
	),

	array(
	  'id'  	 => 'showall-pagination',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Show all pages in Pagination', 'maruthi'),
	  'info'	 => esc_html__('YES! to show all the pages instead of dots near the current page.', 'maruthi')
	),



	array(
	  'id'      => 'google-map-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Google Map API Key', 'maruthi'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid google account api key here', 'maruthi').'</p>',
	),

	array(
	  'id'      => 'mailchimp-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Mailchimp API Key', 'maruthi'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid mailchimp account api key here', 'maruthi').'</p>',
	),

  ),
);

$options[]      = array(
  'name'        => 'layout_options',
  'title'       => esc_html__('Layout Options', 'maruthi'),
  'icon'        => 'dashicons dashicons-exerpt-view',
  'sections' => array(

	// -----------------------------------------
	// Header Options
	// -----------------------------------------
	array(
	  'name'      => 'breadcrumb_options',
	  'title'     => esc_html__('Breadcrumb Options', 'maruthi'),
	  'icon'      => 'fa fa-sitemap',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Breadcrumb Options", 'maruthi' ),
		  ),

		  array(
			'id'  		 => 'show-breadcrumb',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Breadcrumb', 'maruthi'),
			'info'		 => esc_html__('YES! to display breadcrumb for all pages.', 'maruthi'),
			'default' 	 => true,
		  ),

		  array(
			'id'           => 'breadcrumb-delimiter',
			'type'         => 'icon',
			'title'        => esc_html__('Breadcrumb Delimiter', 'maruthi'),
			'info'         => esc_html__('Choose delimiter style to display on breadcrumb section.', 'maruthi'),
		  ),

		  array(
			'id'           => 'breadcrumb-style',
			'type'         => 'select',
			'title'        => esc_html__('Breadcrumb Style', 'maruthi'),
			'options'      => array(
			  'default' 							=> esc_html__('Default', 'maruthi'),
			  'aligncenter'    						=> esc_html__('Align Center', 'maruthi'),
			  'alignright'  						=> esc_html__('Align Right', 'maruthi'),
			  'breadcrumb-left'    					=> esc_html__('Left Side Breadcrumb', 'maruthi'),
			  'breadcrumb-right'     				=> esc_html__('Right Side Breadcrumb', 'maruthi'),
			  'breadcrumb-top-right-title-center'  	=> esc_html__('Top Right Title Center', 'maruthi'),
			  'breadcrumb-top-left-title-center'  	=> esc_html__('Top Left Title Center', 'maruthi'),
			),
			'class'        => 'chosen',
			'default'      => 'default',
			'info'         => esc_html__('Choose alignment style to display on breadcrumb section.', 'maruthi'),
		  ),

		  array(
			  'id'                 => 'breadcrumb-position',
			  'type'               => 'select',
			  'title'              => esc_html__('Position', 'maruthi' ),
			  'options'            => array(
				  'header-top-absolute'    => esc_html__('Behind the Header','maruthi'),
				  'header-top-relative'    => esc_html__('Default','maruthi'),
			  ),
			  'class'        => 'chosen',
			  'default'      => 'header-top-relative',
			  'info'         => esc_html__('Choose position of breadcrumb section.', 'maruthi'),
		  ),

		  array(
			'id'      => 'breadcrumb_background',
			'type'    => 'background',
			'title'   => esc_html__('Background', 'maruthi'),
			'desc'    => esc_html__('Choose background options for breadcrumb title section.', 'maruthi'),
			'default' => array (
				'image' => MARUTHI_THEME_URI . '/images/breadcrumb.png',
				'size'     	  => 'size',
				'repeat'   	  => 'repeat',
				'attachment'  => 'scroll',
				'position'    => 'center bottom',
			),
		  ),

		),
	),

  ),
);

$options[]      = array(
  'name'        => 'allpage_options',
  'title'       => esc_html__('All Page Options', 'maruthi'),
  'icon'        => 'fa fa-files-o',
  'sections' => array(

	// -----------------------------------------
	// Post Options
	// -----------------------------------------
	array(
	  'name'      => 'post_options',
	  'title'     => esc_html__('Post Options', 'maruthi'),
	  'icon'      => 'fa fa-file',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post Options", 'maruthi' ),
		  ),
		
		  array(
			'id'  		 => 'single-post-authorbox',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Author Box', 'maruthi'),
			'info'		 => esc_html__('YES! to display author box in single blog posts.', 'maruthi')
		  ),

		  array(
			'id'  		 => 'single-post-related',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Related Posts', 'maruthi'),
			'info'		 => esc_html__('YES! to display related blog posts in single posts.', 'maruthi')
		  ),

		  array(
			'id'  		 => 'single-post-navigation',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Post Navigation', 'maruthi'),
			'info'		 => esc_html__('YES! to display post navigation in single posts.', 'maruthi')
		  ),

		  array(
			'id'  		 => 'single-post-comments',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Posts Comments', 'maruthi'),
			'info'		 => esc_html__('YES! to display single blog post comments.', 'maruthi'),
			'default' 	 => true,
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Page Layout", 'maruthi' ),
		  ),

		  array(
			'id'      	 => 'post-archives-page-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Page Layout', 'maruthi'),
			'options'    => array(
			  'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'post-archives-page-layout',
			),
		  ),

		  array(
			'id'  		 => 'show-standard-left-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Left Sidebar', 'maruthi'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 => 'show-standard-right-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Right Sidebar', 'maruthi'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Post Layout", 'maruthi' ),
		  ),

		  array(
			'id'      	   => 'post-archives-post-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Post Layout', 'maruthi'),
			'options'      => array(
			  'one-column' 		  => MARUTHI_THEME_URI . '/cs-framework-override/images/one-column.png',
			  'one-half-column'   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
			  'one-third-column'  => MARUTHI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
			  '1-2-2'			  => MARUTHI_THEME_URI . '/cs-framework-override/images/1-2-2.png',
			  '1-2-2-1-2-2' 	  => MARUTHI_THEME_URI . '/cs-framework-override/images/1-2-2-1-2-2.png',
			  '1-3-3-3'			  => MARUTHI_THEME_URI . '/cs-framework-override/images/1-3-3-3.png',
			  '1-3-3-3-1' 		  => MARUTHI_THEME_URI . '/cs-framework-override/images/1-3-3-3-1.png',
			),
			'default'      => 'one-half-column',
		  ),

		  array(
			'id'           => 'post-style',
			'type'         => 'select',
			'title'        => esc_html__('Post Style', 'maruthi'),
			'options'      => array(
			  'blog-default-style' 		=> esc_html__('Default', 'maruthi'),
			  'entry-date-left'      	=> esc_html__('Date Left', 'maruthi'),
			  'entry-date-author-left'  => esc_html__('Date and Author Left', 'maruthi'),
			  'blog-medium-style'       => esc_html__('Medium', 'maruthi'),
			  'blog-medium-style dt-blog-medium-highlight'     					 => esc_html__('Medium Hightlight', 'maruthi'),
			  'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight'  => esc_html__('Medium Skin Highlight', 'maruthi'),
			),
			'class'        => 'chosen',
			'default'      => 'blog-default-style',
			'info'         => esc_html__('Choose post style to display post archives pages.', 'maruthi'),
		  ),

		  array(
			'id'  		 => 'post-archives-enable-excerpt',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Allow Excerpt', 'maruthi'),
			'info'		 => esc_html__('YES! to allow excerpt', 'maruthi'),
			'default'    => true,
		  ),

		  array(
			'id'  		 => 'post-archives-excerpt',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Excerpt Length', 'maruthi'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Put Excerpt Length', 'maruthi').'</span>',
			'default' 	 => 40,
		  ),

		  array(
			'id'  		 => 'post-archives-enable-readmore',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Read More', 'maruthi'),
			'info'		 => esc_html__('YES! to enable read more button', 'maruthi'),
			'default'	 => true,
		  ),

		  array(
			'id'  		 => 'post-archives-readmore',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Read More Shortcode', 'maruthi'),
			'info'		 => esc_html__('Paste any button shortcode here', 'maruthi'),
			'default'	 => '[dt_sc_button title="Read More" style="bordered" ]',
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post & Post Archive options", 'maruthi' ),
		  ),

		  array(
			'id'      => 'post-format-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Post Format Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post format meta information', 'maruthi'),
			'default' => false
		  ),

		  array(
			'id'      => 'post-author-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Author Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post author meta information', 'maruthi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-date-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Date Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post date meta information', 'maruthi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-comment-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Comment Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post comment meta information', 'maruthi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-category-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Category Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post category information', 'maruthi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-tag-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Tag Meta', 'maruthi' ),
			'info'	  => esc_html__('YES! to show post tag information', 'maruthi'),
			'default' => true
			),
			
			array(
				'id'      => 'post-likes',
				'type'    => 'switcher',
				'title'   => esc_html__('Post Likes', 'maruthi' ),
				'info'    => esc_html__('YES! to show post likes information', 'maruthi'),
				'default' => true
			),

			array(
				'id'      => 'post-views',
				'type'    => 'switcher',
				'title'   => esc_html__('Post Views', 'maruthi' ),
				'info'    => esc_html__('YES! to show post views information', 'maruthi'),
				'default' => true
			),

		),
	),

	// -----------------------------------------
	// 404 Options
	// -----------------------------------------
	array(
	  'name'      => '404_options',
	  'title'     => esc_html__('404 Options', 'maruthi'),
	  'icon'      => 'fa fa-warning',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "404 Message", 'maruthi' ),
		  ),
		  
		  array(
			'id'      => 'enable-404message',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Message', 'maruthi' ),
			'info'	  => esc_html__('YES! to enable not-found page message.', 'maruthi'),
			'default' => true
		  ),

		  array(
			'id'           => 'notfound-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'maruthi'),
			'options'      => array(
			  'type1' 	   => esc_html__('Modern', 'maruthi'),
			  'type2'      => esc_html__('Classic', 'maruthi'),
			  'type4'  	   => esc_html__('Diamond', 'maruthi'),
			  'type5'      => esc_html__('Shadow', 'maruthi'),
			  'type6'      => esc_html__('Diamond Alt', 'maruthi'),
			  'type7'  	   => esc_html__('Stack', 'maruthi'),
			  'type8'  	   => esc_html__('Minimal', 'maruthi'),
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of not-found template page.', 'maruthi')
		  ),

		  array(
			'id'      => 'notfound-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('404 Dark BG', 'maruthi' ),
			'info'	  => esc_html__('YES! to use dark bg notfound page for this site.', 'maruthi')
		  ),

		  array(
			'id'           => 'notfound-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'maruthi'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'maruthi'),
			'info'       	 => esc_html__('Choose the page for not-found content.', 'maruthi')
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Background Options", 'maruthi' ),
		  ),

		  array(
			'id'    => 'notfound_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'maruthi')
		  ),

		  array(
			'id'  		 => 'notfound-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'maruthi'),
			'info'		 => esc_html__('Paste custom CSS styles for not found page.', 'maruthi')
		  ),

		),
	),

	// -----------------------------------------
	// Underconstruction Options
	// -----------------------------------------
	array(
	  'name'      => 'comingsoon_options',
	  'title'     => esc_html__('Under Construction Options', 'maruthi'),
	  'icon'      => 'fa fa-thumbs-down',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Under Construction", 'maruthi' ),
		  ),
	
		  array(
			'id'      => 'enable-comingsoon',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Coming Soon', 'maruthi' ),
			'info'	  => esc_html__('YES! to check under construction page of your website.', 'maruthi')
		  ),
	
		  array(
			'id'           => 'comingsoon-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'maruthi'),
			'options'      => array(
			  'type1' 	   => esc_html__('Diamond', 'maruthi'),
			  'type2'      => esc_html__('Teaser', 'maruthi'),
			  'type3'  	   => esc_html__('Minimal', 'maruthi'),
			  'type4'      => esc_html__('Counter Only', 'maruthi'),
			  'type5'      => esc_html__('Belt', 'maruthi'),
			  'type6'  	   => esc_html__('Classic', 'maruthi'),
			  'type7'  	   => esc_html__('Boxed', 'maruthi')
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of coming soon template.', 'maruthi'),
		  ),

		  array(
			'id'      => 'uc-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('Coming Soon Dark BG', 'maruthi' ),
			'info'	  => esc_html__('YES! to use dark bg coming soon page for this site.', 'maruthi')
		  ),

		  array(
			'id'           => 'comingsoon-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'maruthi'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'maruthi'),
			'info'       	 => esc_html__('Choose the page for comingsoon content.', 'maruthi')
		  ),

		  array(
			'id'      => 'show-launchdate',
			'type'    => 'switcher',
			'title'   => esc_html__('Show Launch Date', 'maruthi' ),
			'info'	  => esc_html__('YES! to show launch date text.', 'maruthi'),
		  ),

		  array(
			'id'      => 'comingsoon-launchdate',
			'type'    => 'text',
			'title'   => esc_html__('Launch Date', 'maruthi'),
			'attributes' => array( 
			  'placeholder' => '10/30/2016 12:00:00'
			),
			'after' 	=> '<p class="cs-text-info">'.esc_html__('Put Format: 12/30/2016 12:00:00 month/day/year hour:minute:second', 'maruthi').'</p>',
		  ),

		  array(
			'id'           => 'comingsoon-timezone',
			'type'         => 'select',
			'title'        => esc_html__('UTC Timezone', 'maruthi'),
			'options'      => array(
			  '-12' => '-12', '-11' => '-11', '-10' => '-10', '-9' => '-9', '-8' => '-8', '-7' => '-7', '-6' => '-6', '-5' => '-5', 
			  '-4' => '-4', '-3' => '-3', '-2' => '-2', '-1' => '-1', '0' => '0', '+1' => '+1', '+2' => '+2', '+3' => '+3', '+4' => '+4',
			  '+5' => '+5', '+6' => '+6', '+7' => '+7', '+8' => '+8', '+9' => '+9', '+10' => '+10', '+11' => '+11', '+12' => '+12'
			),
			'class'        => 'chosen',
			'default'      => '0',
			'info'         => esc_html__('Choose utc timezone, by default UTC:00:00', 'maruthi'),
		  ),

		  array(
			'id'    => 'comingsoon_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'maruthi')
		  ),

		  array(
			'id'  		 => 'comingsoon-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'maruthi'),
			'info'		 => esc_html__('Paste custom CSS styles for under construction page.', 'maruthi'),
		  ),

		),
	),

  ),
);

// -----------------------------------------
// Widget area Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'widgetarea_options',
  'title'       => esc_html__('Widget Area', 'maruthi'),
  'icon'        => 'fa fa-trello',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Custom Widget Area for Sidebar", 'maruthi' ),
	  ),

	  array(
		'id'           => 'wtitle-style',
		'type'         => 'select',
		'title'        => esc_html__('Sidebar widget Title Style', 'maruthi'),
		'options'      => array(
		 'default' => esc_html__('Choose any type', 'maruthi'),
		  'type1' 	   => esc_html__('Double Border', 'maruthi'),
		  'type2'      => esc_html__('Tooltip', 'maruthi'),
		  'type3'  	   => esc_html__('Title Top Border', 'maruthi'),
		  'type4'      => esc_html__('Left Border & Pattren', 'maruthi'),
		  'type5'      => esc_html__('Bottom Border', 'maruthi'),
		  'type6'  	   => esc_html__('Tooltip Border', 'maruthi'),
		  'type7'  	   => esc_html__('Boxed Modern', 'maruthi'),
		  'type8'  	   => esc_html__('Elegant Border', 'maruthi'),
		  'type9' 	   => esc_html__('Needle', 'maruthi'),
		  'type10' 	   => esc_html__('Ribbon', 'maruthi'),
		  'type11' 	   => esc_html__('Content Background', 'maruthi'),
		  'type12' 	   => esc_html__('Classic BG', 'maruthi'),
		  'type13' 	   => esc_html__('Tiny Boders', 'maruthi'),
		  'type14' 	   => esc_html__('BG & Border', 'maruthi'),
		  'type15' 	   => esc_html__('Classic BG Alt', 'maruthi'),
		  'type16' 	   => esc_html__('Left Border & BG', 'maruthi'),
		  'type17' 	   => esc_html__('Basic', 'maruthi'),
		  'type18' 	   => esc_html__('BG & Pattern', 'maruthi'),
		),
		'class'          => 'chosen',
		'default' 		 =>  'default',
		'info'           => esc_html__('Choose the style of sidebar widget title.', 'maruthi')
	  ),

	  array(
		'id'              => 'widgetarea-custom',
		'type'            => 'group',
		'title'           => esc_html__('Custom Widget Area', 'maruthi'),
		'button_title'    => esc_html__('Add New', 'maruthi'),
		'accordion_title' => esc_html__('Add New Widget Area', 'maruthi'),
		'fields'          => array(

		  array(
			'id'          => 'widgetarea-custom-name',
			'type'        => 'text',
			'title'       => esc_html__('Name', 'maruthi'),
		  ),

		)
	  ),

	),
);

// -----------------------------------------
// Woocommerce Options
// -----------------------------------------
if( function_exists( 'is_woocommerce' ) && ! class_exists ( 'DTWooPlugin' ) ){

	$options[]      = array(
	  'name'        => 'woocommerce_options',
	  'title'       => esc_html__('Woocommerce', 'maruthi'),
	  'icon'        => 'fa fa-shopping-cart',

	  'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Woocommerce Shop Page Options", 'maruthi' ),
		  ),

		  array(
			'id'  		 => 'shop-product-per-page',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Products Per Page', 'maruthi'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Number of products to show in catalog / shop page', 'maruthi').'</span>',
			'default' 	 => 12,
		  ),

		  array(
			'id'           => 'product-style',
			'type'         => 'select',
			'title'        => esc_html__('Product Style', 'maruthi'),
			'options'      => array(
			  'woo-type1' 	   => esc_html__('Thick Border', 'maruthi'),
			  'woo-type4'      => esc_html__('Diamond Icons', 'maruthi'),
			  'woo-type8' 	   => esc_html__('Modern', 'maruthi'),
			  'woo-type10' 	   => esc_html__('Easing', 'maruthi'),
			  'woo-type11' 	   => esc_html__('Boxed', 'maruthi'),
			  'woo-type12' 	   => esc_html__('Easing Alt', 'maruthi'),
			  'woo-type13' 	   => esc_html__('Parallel', 'maruthi'),
			  'woo-type14' 	   => esc_html__('Pointer', 'maruthi'),
			  'woo-type16' 	   => esc_html__('Stack', 'maruthi'),
			  'woo-type17' 	   => esc_html__('Bouncy', 'maruthi'),
			  'woo-type20' 	   => esc_html__('Masked Circle', 'maruthi'),
			  'woo-type21' 	   => esc_html__('Classic', 'maruthi')
			),
			'class'        => 'chosen',
			'default' 	   => 'woo-type1',
			'info'         => esc_html__('Choose products style to display shop & archive pages.', 'maruthi')
		  ),

		  array(
			'id'      	 => 'shop-page-product-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Product Layout', 'maruthi'),
			'options'    => array(
				  1   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-column.png',
				  2   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
				  3   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
				  4   => MARUTHI_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
			),
			'default'      => 4,
			'attributes'   => array(
			  'data-depend-id' => 'shop-page-product-layout',
			),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Detail Page Options", 'maruthi' ),
		  ),

		  array(
			'id'      	   => 'product-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'maruthi'),
			'options'      => array(
			  'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'maruthi'),
			'dependency'   	 => array( 'product-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'maruthi'),
			'dependency' 	 => array( 'product-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 	 => 'enable-related',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Related Products', 'maruthi'),
			'info'	  		 => esc_html__("YES! to display related products on single product's page.", 'maruthi')
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Category Page Options", 'maruthi' ),
		  ),

		  array(
			'id'      	   => 'product-category-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'maruthi'),
			'options'      => array(
			  'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-category-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'maruthi'),
			'dependency'   	 => array( 'product-category-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'maruthi'),
			'dependency' 	 => array( 'product-category-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Tag Page Options", 'maruthi' ),
		  ),

		  array(
			'id'      	   => 'product-tag-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'maruthi'),
			'options'      => array(
			  'content-full-width'   => MARUTHI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => MARUTHI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => MARUTHI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-tag-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'maruthi'),
			'dependency'   	 => array( 'product-tag-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'maruthi'),
			'dependency' 	 => array( 'product-tag-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

	  ),
	);
}

// -----------------------------------------
// Sociable Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'sociable_options',
  'title'       => esc_html__('Sociable', 'maruthi'),
  'icon'        => 'fa fa-share-alt-square',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Sociable", 'maruthi' ),
	  ),

	  array(
		'id'              => 'sociable_fields',
		'type'            => 'group',
		'title'           => esc_html__('Sociable', 'maruthi'),
		'info'            => esc_html__('Click button to add type of social & url.', 'maruthi'),
		'button_title'    => esc_html__('Add New Social', 'maruthi'),
		'accordion_title' => esc_html__('Adding New Social Field', 'maruthi'),
		'fields'          => array(
		  array(
			'id'          => 'sociable_fields_type',
			'type'        => 'select',
			'title'       => esc_html__('Select Social', 'maruthi'),
			'options'      => array(
			  'delicious' 	 => esc_html__('Delicious', 'maruthi'),
			  'deviantart' 	 => esc_html__('Deviantart', 'maruthi'),
			  'digg' 	  	 => esc_html__('Digg', 'maruthi'),
			  'dribbble' 	 => esc_html__('Dribbble', 'maruthi'),
			  'envelope' 	 => esc_html__('Envelope', 'maruthi'),
			  'facebook' 	 => esc_html__('Facebook', 'maruthi'),
			  'flickr' 		 => esc_html__('Flickr', 'maruthi'),
			  'google-plus'  => esc_html__('Google Plus', 'maruthi'),
			  'gtalk'  		 => esc_html__('GTalk', 'maruthi'),
			  'instagram'	 => esc_html__('Instagram', 'maruthi'),
			  'lastfm'	 	 => esc_html__('Lastfm', 'maruthi'),
			  'linkedin'	 => esc_html__('Linkedin', 'maruthi'),
			  'pinterest'	 => esc_html__('Pinterest', 'maruthi'),
			  'reddit'		 => esc_html__('Reddit', 'maruthi'),
			  'rss'		 	 => esc_html__('RSS', 'maruthi'),
			  'skype'		 => esc_html__('Skype', 'maruthi'),
			  'stumbleupon'	 => esc_html__('Stumbleupon', 'maruthi'),
			  'tumblr'		 => esc_html__('Tumblr', 'maruthi'),
			  'twitter'		 => esc_html__('Twitter', 'maruthi'),
			  'viadeo'		 => esc_html__('Viadeo', 'maruthi'),
			  'vimeo'		 => esc_html__('Vimeo', 'maruthi'),
			  'yahoo'		 => esc_html__('Yahoo', 'maruthi'),
			  'youtube'		 => esc_html__('Youtube', 'maruthi'),
			),
			'class'        => 'chosen',
			'default'      => 'delicious',
		  ),

		  array(
			'id'          => 'sociable_fields_url',
			'type'        => 'text',
			'title'       => esc_html__('Enter URL', 'maruthi')
		  ),
		)
	  ),

   ),
);

// -----------------------------------------
// Hook Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'hook_options',
  'title'       => esc_html__('Hooks', 'maruthi'),
  'icon'        => 'fa fa-paperclip',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Top Hook", 'maruthi' ),
	  ),

	  array(
		'id'  	=> 'enable-top-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Top Hook', 'maruthi'),
		'info'	=> esc_html__("YES! to enable top hook.", 'maruthi')
	  ),

	  array(
		'id'  		 => 'top-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Top Hook', 'maruthi'),
		'info'		 => esc_html__('Paste your top hook, Executes after the opening &lt;body&gt; tag.', 'maruthi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content Before Hook", 'maruthi' ),
	  ),

	  array(
		'id'  	=> 'enable-content-before-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content Before Hook', 'maruthi'),
		'info'	=> esc_html__("YES! to enable content before hook.", 'maruthi')
	  ),

	  array(
		'id'  		 => 'content-before-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content Before Hook', 'maruthi'),
		'info'		 => esc_html__('Paste your content before hook, Executes before the opening &lt;#primary&gt; tag.', 'maruthi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content After Hook", 'maruthi' ),
	  ),

	  array(
		'id'  	=> 'enable-content-after-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content After Hook', 'maruthi'),
		'info'	=> esc_html__("YES! to enable content after hook.", 'maruthi')
	  ),

	  array(
		'id'  		 => 'content-after-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content After Hook', 'maruthi'),
		'info'		 => esc_html__('Paste your content after hook, Executes after the closing &lt;/#main&gt; tag.', 'maruthi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Bottom Hook", 'maruthi' ),
	  ),

	  array(
		'id'  	=> 'enable-bottom-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Bottom Hook', 'maruthi'),
		'info'	=> esc_html__("YES! to enable bottom hook.", 'maruthi')
	  ),

	  array(
		'id'  		 => 'bottom-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Bottom Hook', 'maruthi'),
		'info'		 => esc_html__('Paste your bottom hook, Executes after the closing &lt;/body&gt; tag.', 'maruthi')
	  ),
	  
	  array(
		'id'  	=> 'enable-analytics-code',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Tracking Code', 'maruthi'),
		'info'	=> esc_html__("YES! to enable site tracking code.", 'maruthi')
	  ),

	  array(
		'id'  		 => 'analytics-code',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Google Analytics Tracking Code', 'maruthi'),
		'info'		 => esc_html__('Enter your Google tracking id (UA-XXXXX-X) here. If you want to offer your visitors the option to stop being tracked you can place the shortcode [dt_sc_privacy_google_tracking] somewhere on your site', 'maruthi')
	  ),


   ),
);

// ------------------------------
// backup                       
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup', 'maruthi'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'maruthi')
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// license
// ------------------------------
$options[]   = array(
  'name'     => 'theme_version',
  'title'    => constant('MARUTHI_THEME_NAME').esc_html__(' Log', 'maruthi'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => constant('MARUTHI_THEME_NAME').esc_html__(' Theme Change Log', 'maruthi')
    ),
    array(
      'type'    => 'content',
			'content' => '<pre>

2023.11.02 - version 2.8
* Fixed: Unyson plugin installation issue. The source is included in the theme package.
* Compatible: latest version WordPress
		
2023.04.10 - version 2.7
* Compatible with WordPress 6.2
* Compatible with latest WooCommerce versions
* Compatible with PHP 8.1 version
* Updated: All premium plugins					

2023.01.06 - version 2.6
* Compatible with WordPress 6.1
* Compatible with latest WooCommerce versions
* Compatible with PHP 8.1 version
* Updated: All premium plugins		

2022.03.02 - version 2.5
* Fixed Kirki Customizer Issue

2021.01.25 - version 2.4
* Compatible with wordpress 5.6
* Some design issues updated
* Updated: All premium plugins

2020.12.03 - version 2.3
* Latest jQuery fixes updated
* Updated: All premium plugins

2020.08.13 - version 2.2
	* Compatible with wordpress 5.5
			
2020.08.04 - version 2.1

* Updated: Envato Theme check
* Updated: sanitize_text_field added
* Updated: All wordpress theme standards
* Updated: All premium plugins

2020.07.04 - version 2.0

* Compatible with wordpress 5.4.2
* Updated: All premium plugins
* Updated: Some design tweaks
* Updated: Sub menu mouse hover issue
* Updated: Activating another theme causes error

2020.02.06 - version 1.9

* Updated : All premium plugins
			
2020.01.29 - version 1.8

* Compatible with wordpress 5.3.2
* Updated: All premium plugins
* Updated: All wordpress theme standards
* Updated: Privacy and Cookies concept
* Updated: Gutenberg editor support for custom post types

* Fixed: Google Analytics issue
* Fixed: Mailchimp email client issue
* Fixed: Privacy Button Issue
* Fixed: Gutenberg check for old wordpress version

* Improved: Tags taxonomy added for portfolio
* Improved: Single product breadcrumb section
* Improved: Revisions options added for all custom posts

2019.11.16 - version 1.7

* Updated all wordpress theme standards
* Compatible with latest Gutenberg editor
* Updated: All premium plugins
* Compatible with wordpress 5.3

2019.07.25 - version 1.6

* Compatible with wordpress 5.2.2
* Updated: All premium plugins
* Updated: Revisions added to all custom post types
* Updated: Gutenberg editor support for custom post types
* Updated: Link for phone number module
* Updated: Online documentation link, check readme file

* Fixed: Customizer logo option
* Fixed: Google Analytics issue
* Fixed: Mailchimp email client issue
* Fixed: Gutenberg check for old wordpress version
* Fixed: Edit with Visual Composer for portfolio
* Fixed: Header & Footer wpml option
* Fixed: Site title color
* Fixed: Privacy popup bg color
* Fixed: 404 page scrolling issue

* Improved: Single product breadcrumb section
* Improved: Tags taxonomy added for portfolio
* Improved: Woocommerce cart module added with custom class option

* New: Whatsapp Shortcode

2019.05.16 - version 1.5
 * Gutenberg Latest update compatible
 * Portfolio Video option
 * Coming Soon page fix
 * Portfolio archive page breadcrumb fix
 * Mega menu image fix
 * GDPR product single page fix
 * Codestar framework update
 * Wpml xml file updated
 * disable options for likes and views in single post page
 * Updated latest version of all third party plugins
 * Some design tweaks

2019.02.05 - version 1.4
 * Gutenberg compatible
 * Latest WordPress version 5.0.3 compatible
 * Updated latest version of all third party plugins
 * Some design tweaks
       
2018.11.01 - version 1.3
 * Gutenberg plugin compatible
 * Latest wordpress version 4.9.8 compatible
 * Updated latest version of all third party plugins
 * Updated documentation
 
2018.07.26 - version 1.2
 * GDPR Compliant update in comment form, mailchimp form etc.
 * Packed with - Layer Slider 6.7.6
 * Packed with - Revolution Slider 5.4.8
 * Packed with - WPBakery Page Builder 5.5.2
 * Packed with - Ultimate Addons for Visual Composer 3.16.24
 * Packed with - Envato Market 2.0.0
 * Fix - Option for change the site title color
 * Fix - Add target attribute for social media
 * Fix - Bulk plugins install issue
 * Fix - Unyson Page Builder Conflict
 * Fix - Twitter feeds links issue
 * Fix - Iphone sidebar issue
 * Fix - Youtube and Vimeo video issue in https
 * Fix - Buddypress issue
 * Updated designthemes core features plugin
 * Updated language files
 
2018.01.11 - version 1.1
 * Optimized dummy content included

2018.01.05 - version 1.0
 * First release!  </pre>',
    ),

  )
);

// ------------------------------
// Seperator
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => esc_html__('Plugin Options', 'maruthi'),
  'icon'   => 'fa fa-plug'
);


CSFramework::instance( $settings, $options );