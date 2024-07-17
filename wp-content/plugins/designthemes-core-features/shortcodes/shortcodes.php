<?php
class DTCoreShortcodesDefination {
	
	function __construct() {

		/* Tabs Shortcode */
		add_shortcode ( "dt_sc_tabs", array (
			$this,
			"dt_sc_tabs"
		) );
		
		/* Tab Content for VC */
		add_shortcode("dt_sc_tab", array(
			$this,
			'dt_sc_tab'
		) );

		/* Accordion Shortcode */
		add_shortcode ( "dt_sc_accordion", array (
			$this,
			"dt_sc_accordion"
		) );

		/* Toggle Shortcode */
		add_shortcode ( "dt_sc_toggle", array (
			$this,
			"dt_sc_toggle"
		) );

		/* Toggle Framed Shortcode */
		add_shortcode ( "dt_sc_toggle_framed", array (
			$this,
			"dt_sc_toggle_framed"
		) );

		/* Toggle Group Shortcode */
		add_shortcode ( "dt_sc_toggle_group", array (
			$this,
			"dt_sc_toggle_group"
		) );

		/* Separator */
		add_shortcode("dt_sc_separator", array(
			$this,
			"dt_sc_separator"
		) );

		/* Alignment */
		add_shortcode ( "dt_sc_align", array (
			$this,
			"dt_sc_align"
		) );

		/* Any Class & Styles */
		add_shortcode ( "dt_sc_anyclass_style", array (
			$this,
			"dt_sc_anyclass_style"
		) );

		/* Button */
		add_shortcode ( "dt_sc_button", array (
			$this,
			"dt_sc_button"
		) );

		/* Titled Box Shortcode */
		add_shortcode ( "dt_sc_titled_box", array (
			$this,
			"dt_sc_titled_box"
		) );

		/* Donutchart */
		add_shortcode ( "dt_sc_donutchart", array (
			$this,
			"dt_sc_donutchart"
		) );

		/* Progress Bar Shortcode */
		add_shortcode ( "dt_sc_progress_bar", array (
			$this,
			"dt_sc_progress_bar"
		) );

		/* Pricing Table Item */
		add_shortcode ( "dt_sc_pricing_table_item", array (
			$this,
			"dt_sc_pricing_table_item"
		) );

		/* Pricing Table Minimal Item */
		add_shortcode ( "dt_sc_pricing_table_minimal_item", array (
			$this,
			"dt_sc_pricing_table_minimal_item"
		) );

		/* Pricing Table Type2 Item */
		add_shortcode ( "dt_sc_pricing_table_type2_item", array (
			$this,
			"dt_sc_pricing_table_type2_item"
		) );

		/* Icon Box */
		add_shortcode ( "dt_sc_iconbox", array (
			$this,
			"dt_sc_iconbox"
		) );

		/* Dropcap */
		add_shortcode ( "dt_sc_dropcap", array (
			$this,
			"dt_sc_dropcap"
		) );

		/* Blockquote */
		add_shortcode ( "dt_sc_blockquote", array (
			$this,
			"dt_sc_blockquote"
		) );

		/* Colored Button Shortcode */
		add_shortcode ( "dt_sc_colored_button", array (
			$this,
			"dt_sc_colored_button"
		) );

		/* Ordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ol", array (
			$this,
			"dt_sc_fancy_ol"
		) );

		/* Unordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ul", array (
			$this,
			"dt_sc_fancy_ul"
		) );

		/* Tooltip Shortcode */
		add_shortcode ( "dt_sc_tooltip", array (
			$this,
			"dt_sc_tooltip"
		) );

		/* Simple Heading */																					
		add_shortcode( "dt_sc_simple_heading", array(
			$this,
			"dt_sc_simple_heading"
		) );

		/* Horizontal Invisible */
		add_shortcode ( "dt_sc_hr_invisible", array (
			$this,
			"dt_sc_hr_invisible"
		) );

		/* Horizontal Top */
		add_shortcode ( "dt_sc_hr_top", array (
			$this,
			"dt_sc_hr_top"
		) );

		/* Horizontal Custom */
		add_shortcode ( "dt_sc_hr_custom", array (
			$this,
			"dt_sc_hr_custom"
		) );
		
		/* Horizontal SVG */
		add_shortcode ( "dt_sc_hr_svg", array (
			$this,
			"dt_sc_hr_svg"
		) );

		/* Phone No */
		add_shortcode ( "dt_sc_phone_no", array (
			$this,
			"dt_sc_phone_no"
		) );

		/* Whatsapp No */
		add_shortcode ( "dt_sc_whatsapp_no", array (
			$this,
			"dt_sc_whatsapp_no"
		) );

		/* Email Address */
		add_shortcode ( "dt_sc_email", array (
			$this,
			"dt_sc_email"
		) );
		
		/* URL */
		add_shortcode ( "dt_sc_url", array (
			$this,
			"dt_sc_url"
		) );

		/* Search Form */
		add_shortcode ( "dt_sc_search_form", array (
			$this,
			"dt_sc_search_form"
		) );

		/* Woo Cart */
		add_shortcode ( "dt_sc_woo_cart", array (
			$this,
			"dt_sc_woo_cart"
		) );

		/* Icon */
		add_shortcode ( "dt_sc_icon", array (
			$this,
			"dt_sc_icon"
		) );

		/* Image */
		add_shortcode ( "dt_sc_image", array (
			$this,
			"dt_sc_image"
		) );

		/* Unique */

		/* Contact Info Shortcode */
		add_shortcode ( "dt_sc_contact_info", array (
			$this,
			"dt_sc_contact_info"
		) );

		/* Number Count Shortcode */
		add_shortcode ( "dt_sc_number_counter", array (
			$this,
			"dt_sc_number_counter"
		) );

		/* Image Caption Shortcode */
		add_shortcode ( "dt_sc_image_caption", array (
			$this,
			"dt_sc_image_caption"
		) );

		/* Image Flip Shortcode */
		add_shortcode ( "dt_sc_image_flip", array (
			$this,
			"dt_sc_image_flip"
		) );

		/* Event caption */
		add_shortcode ( "dt_sc_event_caption", array (
			$this,
			"dt_sc_event_caption"
		) );

		/* event contact info */
		add_shortcode ( "dt_sc_event_contact_info", array (
			$this,
			"dt_sc_event_contact_info"
		) );

		/* Mailchimp Newsletter */
		add_shortcode ( "dt_sc_mc_newsletter", array (
			$this,
			"dt_sc_mc_newsletter"
		) );

		/* Team Shortcode */
		add_shortcode ( "dt_sc_team", array (
			$this,
			"dt_sc_team"
		) );

		/* Speakers Shortcode */
		add_shortcode ( "dt_sc_speaker", array (
			$this,
			"dt_sc_speaker"
		) );

		/* Testimonial Individual */
		add_shortcode ( "dt_sc_testimonial", array (
			$this,
			"dt_sc_testimonial"
		) );

		/* Testimonial Carousel Wrapper */
		add_shortcode ( "dt_sc_tm_carousel_wrapper", array (
			$this,
			"dt_sc_tm_carousel_wrapper"
		) );

		/* Fullwidth Testimonial Carousel Wrapper */
		add_shortcode ( "dt_sc_fw_tm_wrapper", array (
			$this,
			"dt_sc_fw_tm_wrapper"
		) );
		
		/* Testimonial Carousel Item */
		add_shortcode ( "dt_sc_tm_carousel_item", array (
			$this,
			"dt_sc_tm_carousel_item"
		) );
		
		/* Partners Carousel */
		add_shortcode ( "dt_sc_partners_carousel", array (
			$this,
			"dt_sc_partners_carousel"
		) );

		/* Images Carousel */
		add_shortcode ( "dt_sc_images_carousel", array (
			$this,
			"dt_sc_images_carousel"
		) );

		/* Hexagon Wrapper */
		add_shortcode ( "dt_sc_hexagon_wrapper", array (
			$this,
			"dt_sc_hexagon_wrapper"
		) );

		/* Hexagon Item */
		add_shortcode ( "dt_sc_hexagon_item", array (
			$this,
			"dt_sc_hexagon_item"
		) );

		/* Hexagon single item */
		add_shortcode("dt_sc_single_hexagon", array(
			$this,
			"dt_sc_single_hexagon"
		) );

		/* Twitter Tweets */
		add_shortcode ( "dt_sc_twitter_tweets", array (
			$this,
			"dt_sc_twitter_tweets"
		) );

		/* triangle wrapper */
		add_shortcode ( "dt_sc_triangle_wrapper", array (
			$this,
			"dt_sc_triangle_wrapper"
		) );

		/* popular content */
		add_shortcode ( "dt_sc_popular_content", array (
			$this,
			"dt_sc_popular_content"
		) );

		/* Domain wrapper*/
		add_shortcode ( "dt_sc_domains_wrapper", array (
			$this,
			"dt_sc_domains_wrapper"
		));

		add_shortcode ( "dt_sc_domain_box", array (
			$this,
			"dt_sc_domain_box"
		));

		/* Single Post */
		add_shortcode("dt_sc_post", array(
			$this,
			"dt_sc_post"
		) );

		/* Recent Post */
		add_shortcode("dt_sc_recent_post", array(
			$this,
			"dt_sc_recent_post"
		) );

		/* Recent Post by Category */
		add_shortcode("dt_sc_recent_cat_post", array(
			$this,
			"dt_sc_recent_post"
		) );

		/* Latest News */
		add_shortcode("dt_sc_latest_news", array(
			$this,
			"dt_sc_latest_news"
		) );

		/* Related Post */
		add_shortcode("dt_sc_blog_related_post", array(
			$this,
			"dt_sc_blog_related_post"
		) );		

		/* Single Portfolio Item */
		add_shortcode("dt_sc_portfolio_item", array(
			$this,
			"dt_sc_portfolio_item"
		) );

		/* Related Portfolio */
		add_shortcode("dt_sc_portfolio_related_post", array(
			$this,
			"dt_sc_portfolio_related_post"
		) );						

		add_shortcode("dt_sc_portfolios", array(
			$this,
			"dt_sc_portfolios"
		) );

		add_shortcode("dt_sc_infinite_portfolios", array(
			$this,
			"dt_sc_infinite_portfolios"
		) );

		add_action( 'wp_ajax_dt_ajax_infinite_portfolios', array( $this, 'dt_ajax_infinite_portfolios' ) );

		add_action( 'wp_ajax_nopriv_dt_ajax_infinite_portfolios', array( $this, 'dt_ajax_infinite_portfolios' ) );		

		/* Tribe event lists*/
		add_shortcode ( "dt_sc_events_list", array (
			$this,
			"dt_sc_events_list"
		));

		add_shortcode( "dt_sc_special_events_list", array(
			$this,
			"dt_sc_special_events_list"
		) );		

		/* Map Overlay */
		add_shortcode ( "dt_sc_map_overlay", array (
			$this,
			"dt_sc_map_overlay"
		));

		add_shortcode ( "dt_sc_map", array (
			$this,
			"dt_sc_map"
		));		

		/* Coming Soon */
		add_shortcode ( "dt_sc_down_count", array (
			$this,
			"dt_sc_down_count"
		));

		/* Horizontal Timeline */
		add_shortcode( "dt_sc_horizontal_timeline", array(
			$this,
			"dt_sc_horizontal_timeline"
		) );

		/* Horizontal Timeline Entry */
		add_shortcode( "dt_sc_hr_timeline_entry", array(
			$this,
			"dt_sc_hr_timeline_entry"
		) );

		/* Vertical Timeline */
		add_shortcode( "dt_sc_vertical_timeline", array(
			$this,
			"dt_sc_vertical_timeline"
		) );

		/* Vertical Timeline Entry */
		add_shortcode( "dt_sc_vc_timeline_entry", array(
			$this,
			"dt_sc_vc_timeline_entry"
		) );

		/* BR Tag */
		add_shortcode ( "dt_sc_br", array (
			$this,
			"dt_sc_br"
		) );

		/* Custom Menu */
		add_shortcode ( "dt_sc_custom_menu", array (
			$this,
			"dt_sc_custom_menu"
		) );

		/* Sociable : From admin options panel */
		add_shortcode ( "dt_sc_sociable", array (
			$this,
			"dt_sc_sociable"
		) );

		/* Social Shortcode */
		add_shortcode ( "dt_sc_social", array (
			$this,
			"dt_sc_social"
		) );
		
		/* Video Manager */
		add_shortcode ( "dt_sc_video_manager", array (
			$this,
			"dt_sc_video_manager"
		) );

		/* Video Manager */
		add_shortcode ( "dt_sc_video_item", array (
			$this,
			"dt_sc_video_item"
		) );

		/* Video Manager */
		add_shortcode ( "dt_sc_video_first_item", array (
			$this,
			"dt_sc_video_first_item"
		) );
		
		/* VC Grid Template Variables */
		add_shortcode('dt_sc_gitem_post_format', array(
			$this,
			'dt_sc_gitem_post_format'
		) );

		add_shortcode('dt_sc_gitem_post_tag', array(
			$this,
			'dt_sc_gitem_post_tag'
		) );

		add_shortcode('dt_sc_gitem_post_comment', array(
			$this,
			'dt_sc_gitem_post_comment'
		) );

		add_shortcode( 'dt_sc_gitem_post_category', array(
			$this,
			'dt_sc_gitem_post_category'
		) );

		add_shortcode ( "dt_sc_notfound_msg", array (
			$this,
			"dt_sc_notfound_msg"
		) );

		add_shortcode ( "dt_sc_ad_carousel_wrapper", array (
			$this,
			"dt_sc_ad_carousel_wrapper"
		) );
		
		add_shortcode ( "dt_sc_testimonial_carousel_special", array (
			$this,
			"dt_sc_testimonial_carousel_special"
		) );

		add_shortcode("dt_sc_google_map", array(
			$this,
			"dt_sc_google_map"
		) );

		add_shortcode("dt_sc_post_view_count", array(
			$this,
			"dt_sc_post_view_count"
		) );

		add_shortcode("dt_sc_post_like_count", array(
			$this,
			"dt_sc_post_like_count"
		) );

		add_shortcode("dt_sc_post_social_share", array(
			$this,
			"dt_sc_post_social_share"
		) );
		
		/* GDPR Privacy Shortcodes */
		add_shortcode("dt_sc_privacy_link", array(
			$this,
			"dt_sc_privacy_policy_link"
		) );

		add_shortcode("dt_sc_privacy_google_tracking", array(
			$this,
			"dt_sc_privacy_disable_google_tracking"
		) );

		add_shortcode("dt_sc_privacy_google_webfonts", array(
			$this,
			"dt_sc_privacy_disable_google_webfonts"
		) );

		add_shortcode("dt_sc_privacy_google_maps", array(
			$this,
			"dt_sc_privacy_disable_google_maps"
		) );

		add_shortcode("dt_sc_privacy_video_embeds", array(
			$this,
			"dt_sc_privacy_disable_video_embeds"
		) );
	}

	/**
	 *
	 * @param string $content
	 * @return string
	 */
	static function dtShortcodeHelper($content = null) {
		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}

	/**
	 * tabs wrapper
	 * @return string
	 */
	function dt_sc_tabs($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'horizontal',
			'style' => 'default',
			'effect' => 'fade',
			'class' => ''
		), $attrs ) );

		preg_match_all( '/dt_sc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if ( isset( $matches[1] ) ) {
			$tab_titles = $matches[1];
		}

		$tabs_nav = '';
		if($style == 'default')
			$tabs_nav .= "<ul class='dt-sc-tabs-{$type}'>";
		else
			$tabs_nav .= "<ul class='dt-sc-tabs-{$type}-frame'>";

			foreach ( $tab_titles as $tab ) {

				$tab_atts = shortcode_parse_atts( $tab[0] );

				$icon = "";

				if( isset($tab_atts['icon_type']) && $tab_atts['icon_type'] === 'fontawesome' ) {
					$icon = isset( $tab_atts['icon'] ) ? $tab_atts['icon'] : '';
				} elseif( isset($tab_atts['icon_type']) && $tab_atts['icon_type'] === 'custom' ){
					$icon = isset( $tab_atts['icon_class'] ) ? $tab_atts['icon_class'] : '';
				}

				$icon = !empty( $icon ) ? "<span class='".$icon."'></span>" : "";
				$subtitle = !empty( $tab_atts['sub_title'] ) ? DTCoreShortcodesDefination::dtShortcodeHelper ( $tab_atts['sub_title'] ) : '';

				$tabs_nav .= '<li><a href="javascript:void(0);">'.$icon.$tab_atts['title'].'</a>'.$subtitle.'</li>';
			}

			$tabs_nav .= '</ul>';

		if($style != 'default') $style = '-frame';
		else $style = '';

		$a = '[dt_sc_tab class="dt-sc-tabs-'.$type.$style.'-content" ';
		$content = str_replace( '[dt_sc_tab',$a, $content);
		$out = do_shortcode( $content );

		return "<div class='dt-sc-tabs-{$type}{$style}-container {$class}' data-effect='{$effect}'>{$tabs_nav}{$out}</div>";
	}

	#For VC fix
	function dt_sc_tab( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
				'class' => '' 
		), $attrs ) );	
		
		$content = do_shortcode( $content );
		
		return "<div class='$class'>".$content."</div>";	
	}

	/**
	 * toggle
	 * @return string
	 */
	function dt_sc_toggle($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '' 
		), $attrs ) );

		$out = "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 * toggle framed
	 * @return string
	 */
	function dt_sc_toggle_framed($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '' 
		), $attrs ) );
		
		$out = '<div class="dt-sc-toggle-frame">';
		$out .= "	<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '	<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '		<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 * toggle group
	 * @return string
	 */
	function dt_sc_toggle_group($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '',
			'style' => 'default', #VC
			'type' => '', #VC
		), $attrs ) );
				
		
		if( $style == 'frame' ){
			
			$content = str_replace("dt_sc_toggle","dt_sc_toggle_framed", $content );
		}
		
		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<div class='dt-sc-toggle-group-set {$type} {$class}'>{$out}</div>";
		return $out;
	}

	/**
	 * accordion group
	 * @return string
	 */
	function dt_sc_accordion($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '' ,
			'style' => 'default', #VC
			'default_accordion_type' => '', #VC
			'framed_accordion_type' => '', #VC
		), $attrs ) );
		
		
		if( $style == 'frame' ){
			
			$content = str_replace("dt_sc_accordion_tab","dt_sc_toggle_framed", $content );
			$type = $framed_accordion_type;
		} else {

			$content = str_replace("dt_sc_accordion_tab","dt_sc_toggle", $content );
			$type = $default_accordion_type;			
		}

		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = str_replace ( "<h5 class='dt-sc-toggle", "<h5 class='dt-sc-toggle-accordion ", $out );
		$out = "<div class='dt-sc-toggle-frame-set {$type} {$class}'>{$out}</div>";
		return $out;
	}

	function dt_sc_separator($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'horizontal',
			'horizontal_type' => 'small',
			'vertical_type' => 'small',
			'class' => ''
		), $attrs ) );

		$separator = "";

		if( $style == 'horizontal' ) {
			$separator = $horizontal_type;

		} else if( $style == 'vertical' ){

			$vertical_type = ( $vertical_type == 'small' ) ? '-small' : '';

			$separator = 'vertical'.$vertical_type;
		}

		$out = "<div class='dt-sc-{$separator}-separator {$class}'></div>";
		return $out;
	}

	/**
	 * anyclass style
	 * @return string
	 */
	function dt_sc_anyclass_style($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => '',
			'styles' => ''
		), $attrs ) );

		$styles = !empty($styles) ? "style='{$styles}'" : '';

		$out = "<div class='{$class}' {$styles}>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/**
	 * alignment
	 * @return string
	 */
	function dt_sc_align($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'align' => 'center',
			'class' => '',
			'styles' => '',
			'css' => '' #VC
		), $attrs ) );
		
		$css = vc_shortcode_custom_css_class($css); # VC		
		
		$styles = !empty($styles) ? "style='{$styles}'" : '';		

		$out = "<div class='align{$align} {$css} {$class}' {$styles}>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}	

	/**
	 * button
	 * @return string
	 */
	function dt_sc_button($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => 'Text on the button', #VC
			'link' => '',
			'size' => 'small',
			'style' => '', #'filled', # Button Style
			
			'textsize' => '',
			'textcolor' => '',
			'color' => '',
			'bgcolor' => '',
			
			'icon_type' => '', #VC
			'iconalign' => '', 
			'iconclass' => '',
			'icon_css_class' => '',
			
			'animation' => '',
			'class' =>'',

			'css' => '',

			'use_theme_fonts' =>  'yes',
			'google_fonts' => '',
		), $attrs ) );

		$content = $title;

		$size = ($size == 'xlarge') ? ' xlarge' : $size;
		$size = ($size == 'large') ? ' large' : $size;
		$size = ($size == 'medium') ? ' medium' : $size;
		$size = ($size == 'small') ? ' small' : $size;
		

		$color = (($color) && (empty ( $bgcolor ))) ? ' ' . $color : '';

		$inline_styles = array ();
		if ($bgcolor)
			$inline_styles [] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';

		if ($textcolor)
			$inline_styles [] = 'color:' . $textcolor . ';';

		if ($textsize)
			$inline_styles [] = 'font-size:' . $textsize . ';';		
		
		$iconspan = $iconspan_left = $iconspan_right = "";
		if( !empty( $icon_type ) ) {

			$icon = "";

			if( $icon_type == 'fontawesome' )
				$icon = $iconclass;

			if( $icon_type == 'css_class' )
				$icon = $icon_css_class;

			if( !empty( $icon ) )
				$iconspan =  "<span class='{$icon}'> </span>";
				
			if($iconalign == 'icon-left with-icon') {
				$iconspan_left = $iconspan;
			} else {
				$iconspan_right = $iconspan;
			}	
		} 
		
		//parse link by vc
		$a_href = $a_title = $a_target = '';
		if(function_exists('vc_build_link')) {
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty($link['target']) ? $link['target'] : '_self';
			$css = vc_shortcode_custom_css_class($css); # VC
		}

		if(preg_match('#^{{#', $a_href) === 1) {
			$a_href =  str_replace ( '{{', '[', $a_href );
			$a_href =  str_replace ( '}}', '/]', $a_href );
			$a_href = do_shortcode($a_href);
		} else {
			$a_href = esc_url ( $a_href );
		}

		if(empty($a_href)){
			$a_href = '#';
		}

		if( empty( $use_theme_fonts ) && ( !empty( $google_fonts ) ) ) {

			$settings = get_option( 'wpb_js_google_fonts_subsets' );
			if ( is_array( $settings ) && ! empty( $settings ) ) {
				$subsets = '&subset=' . implode( ',', $settings );
			} else {
				$subsets = '';
			}

			$result = '';
			$params_pairs = explode( '|', $google_fonts );
			if ( ! empty( $params_pairs ) ) {
				foreach ( $params_pairs as $pair ) {
					$param = preg_split( '/\:/', $pair );
					if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
						$result[ $param[0] ] = rawurldecode( $param[1] );
					}
				}
			}

			if( isset( $result['font_family'] ) ) {
				wp_enqueue_style( 'dt_google_fonts_' . vc_build_safe_css_class( $result['font_family'] ), '//fonts.googleapis.com/css?family=' . $result['font_family'] . $subsets );
			}

			$font_family = explode( ':',$result['font_family'] );
			$fonts_styles = explode( ':',$result['font_style'] );

			$inline_styles[] = 'font-family:'.$font_family[0].';';
			$inline_styles[] = 'font-weight:'.$fonts_styles[1].';';
			$inline_styles[] = 'font-style:'.$fonts_styles[2].';';
		}

		$inline_style = join ( '', array_unique ( $inline_styles ) );
		$inline_style = ! empty ( $inline_style ) ? ' style="' . $inline_style . '"' : '';

		$out = "<a href='{$a_href}' target='{$a_target}' title='{$a_title}' class='dt-sc-button {$css} {$size} {$iconalign} {$color} {$style} {$animation} {$class}' {$inline_style} data-hover='{$content}'>{$iconspan_left} {$content} {$iconspan_right}</a>";

		return $out;
	}

	/**
	 * titled box
	 * @return string
	 */
	function dt_sc_titled_box($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type'	=> 'titled-box',
			'title' => 'Lorem ipsum dolor sit amet',
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'textcolor' => '',
			'bgcolor' => '',
			'variation' => '',
			'class' => ''
		), $attrs ) );
		
		
		$type = "dt-sc-$type";
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$content = strip_tags($content);
		
		$icon = ( $icon_type == 'fontawesome' ) ? $icon : $icon_css_class;
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		
		if($type == 'dt-sc-titled-box') :
			$icon = ( empty($icon) ) ? "" : "<span class='{$icon}'></span>";
			$title = "<h6 class='{$type}-title' {$style}> {$icon} {$title}</h6>";
			$out = "<div class='{$type} {$variation} {$class}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>";
		else :
			$out = "<div class='{$type} {$class}'>{$content}</div>";
		endif;

		return $out;
	}

	/**
	 * donutchart
	 * @return string
	 */
	function dt_sc_donutchart($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'size' => 'medium',
			'datasize' => '',
			'datapercent' => '',
			'bgcolor' => '#79deff',
			'fgcolor' => '#666666'
		), $attrs ) );

		$size = 'dt-sc-donutchart-'.$size;

		$out = "<div class='{$size}'>";
			$out .= "<div class='dt-sc-donutchart' data-size='{$datasize}' data-percent='{$datapercent}' data-bgcolor='{$bgcolor}' data-fgcolor='{$fgcolor}'></div>";
			if($title != '')
				$out .= "<h5 class='dt-sc-donutchart-title'>{$title}</h5>";
		$out .= '</div>';

		return $out;
	}

	/**
	 * progress bar
	 * @return string
	 */
	function dt_sc_progress_bar($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'progress-striped',
			'iconurl' => '',
			'value' => '55',
			'color' => '',
			'text' => '', #VC
			'style' => ''
		), $attrs ) );

		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}

		$color = ! empty ( $color ) ? "style='background-color:$color;'" : "";

		if($style == 'style2'):
			$out = '<div class="dt-sc-progress-wrapper">';
				$out .= '<div class="dt-sc-bar-title">'.$text.'</div>';
				$out .= '<div class="dt-sc-progress '.$type.'">';
					$out .= '<div class="dt-sc-bar" '.$color.' data-value="'.$value.'">';
						$out .= '<div class="dt-sc-bar-text"><span> '.$value.'% </span></div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		else:
			$out = '<div class="dt-sc-progress '.$type.'">';
				if( !empty($iconurl) ):
					$out .= '<div class="dt-sc-bar-image">';
						$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
						$out .= $image['thumbnail'];
					$out .= '</div>';
				endif;
				$out .= '<div class="dt-sc-bar-wrapper">';
					$out .= '<div class="dt-sc-bar" '.$color.' data-value="'.$value.'">';
						$out .= '<div class="dt-sc-bar-text">'.$text.' <span> '.$value.'% </span></div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		endif;

		return $out;
	}

	/**
	 * pricing table item
	 * @return string
	 */
	function dt_sc_pricing_table_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'heading' => '',
			'subtitle' => '',
			'thumb' => '',
			'currency' => '',
			'price' => '',
			'decimal' => '',
			'permonth' => '',
			'highlight' => '',
			'link' => '',			
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';

		$out = "<div class='dt-sc-pr-tb-col type1 $selected'>";
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5>{$heading}</h5>";
					if($subtitle)
						$out .= "<p>{$subtitle}</p>";						
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<h6> <sup>{$currency}</sup>{$price}";
					if($decimal)
						$out .= "<sup>{$decimal}</sup>";
					if($permonth)
						$out .= "<span> {$permonth} </span>";
					$out .="</h6>";
				$out .= '</div>';
			$out .= '</div>';

			if($thumb):
				$image = wpb_getImageBySize( array( 'attach_id' => $thumb, 'thumb_size' => 'full' ));
				$out .= '<div class="dt-sc-tb-thumb">';
				$out .= $image['thumbnail'];
				$out .= '</div>';
			endif;

			$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '</ol>', '</ul>', $content );

			$out .= $content;
			
			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty($link['target']) ? $link['target'] : '_self';
			
			if( !empty($a_href) ) :			
				$out .= '<div class="dt-sc-buy-now">';					
					$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";					
				$out .= '</div>';
			endif;
				
		$out .= '</div>';

		return $out;
	}

	/**
	 * pricing table minimal item
	 * @return string
	 */
	function dt_sc_pricing_table_minimal_item($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'heading' => '',
			'subtitle' => '',
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'starting' => '',
			'price' => '',
			'permonth' => '', #VC
			'highlight' => '',
			'link' => '',
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';
		
		$icon =  $icon_type == 'fontawesome' ? $icon : $icon_css_class;
		
		$out = "<div class='dt-sc-pr-tb-col minimal $selected'>";
		
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="icon-wrapper">';
					$out .= "<span class='{$icon}'> </span>";
				$out .= '</div>';

				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5>{$heading}</h5>";
					if($subtitle)
						$out .= "<p>{$subtitle}</p>";
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<p>{$starting}</p>";
					$out .= "<h6> {$price} <span> {$permonth} </span> </h6>";
				$out .= '</div>';
			$out .= '</div>';
			
			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty($link['target']) ? $link['target'] : '_self';
			
			if( !empty($a_href) ) :	
				$out .= '<div class="dt-sc-buy-now">';
				$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";
				$out .= '</div>';
			endif;
			
		$out .= '</div>';

		return $out;
	}

	/**
	 * pricing table type2 item
	 * @return string
	 */
	function dt_sc_pricing_table_type2_item($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'number' => '',
			'month' => '',
			'plan' => '',
			'currency' => '',
			'price' => '',
			'highlight' => '', #VC
			'link' =>'' #VC
		), $attrs ) );

		$selected = ( strtolower($highlight) == "yes" ) ? 'selected' : '';

		$out = "<div class='dt-sc-pr-tb-col type2 $selected'>";
			$out .= '<div class="dt-sc-tb-header">';
				$out .= '<div class="dt-sc-tb-title">';
					$out .= "<h5> <span>{$number}</span>{$month}<br>{$plan}</h5>";
				$out .= '</div>';
				$out .= '<div class="dt-sc-price">';
					$out .= "<h6> <sup>{$currency}</sup>{$price}</h6>";
				$out .= '</div>';
			$out .= '</div>';

			$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
			$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
			$content = str_replace ( '</ol>', '</ul>', $content );

			$out .= $content;

			$link = ( '||' === $link ) ? '' : $link;
			//parse link by vc					
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty($link['target']) ? $link['target'] : '_self';
			
			if( !empty($a_href) ):
				$out .= '<div class="dt-sc-buy-now">';
					$out .= "<a class='dt-sc-button' target='{$a_target}' href='".esc_url($a_href)."'>{$a_title}</a>";
				$out .= '</div>';			
			endif;
		$out .= '</div>';

		return $out;
	}

	/**
	 * iconbox
	 * @return string
	 */
	function dt_sc_iconbox($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type' => 'type1', #VC
			'title' => '',
			'subtitle' => '',
			'icon_type' => 'icon', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'iconurl' => '',
			'color' => '',
			'link' => '',			
			'class' => '',
			'addstyles' => '' # VC
		), $attrs ) );
		
		//parse link
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		if($icon_type == 'css_class' ) {
			$icon = $icon_css_class;
		}

		$class = ( $icon_type == 'none' ) ? $class.' no-icon' : $class;

		$style = !empty( $addstyles ) ? " style='".esc_attr( $addstyles )."'" : "";
		
		$class .= ( $type == 'type9' ) ? " dt-sc-icon-box-type9 " : '';
		$class .= !empty($color) ? ' '.$color : '';

		$out = "<div class='dt-sc-icon-box {$type} {$class}'{$style}>";
		
			if( !empty($icon) && ( $icon_type == "icon" || $icon_type == "css_class" ) ):
				$out .= '<div class="icon-wrapper">';
				$out .= "<span class='{$icon}'> </span>";
				$out .= '</div>';
			endif;
			
			if( !empty($iconurl) && ( $icon_type == 'image' ) ):
			
				$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
				$out .= '<div class="icon-wrapper">';
				if( $type == 'type3')
					$out .= '<span>';

					$out .= $image['thumbnail'];

				if( $type == 'type3')
					$out .= '</span>';

				$out .= '</div>';
			endif;

			$out .= '<div class="icon-content">';
				if(!empty($subtitle))
					$out .= "<h5>{$subtitle}</h5>";

				if(!empty($title) && !empty($a_href))
					$out .= "<h4><a href='{$a_href}' title='{$a_title}' target='{$a_target}'>{$title}</a></h4>";
				elseif(!empty($title))
					$out .= "<h4>{$title}</h4>";
					$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= '</div>';

			if(!empty($icon) && ($type == 'type1'))
				$out .= "<span class='{$icon} large-icon'> </span>";

		$out .= '</div>';

		return $out;
	}

	/**
	 * dropcap
	 * @return string
	 */
	function dt_sc_dropcap($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'type' => 'default', #VC
			'variation' => '',
			'bgcolor' => '',
			'textcolor' => ''
		), $attrs ) );

		$type = 'dt-sc-dropcap-'. $type;

		$bgcolor = ( $type == 'dt-sc-dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "<span class='dt-sc-dropcap $type {$variation}' {$style}>{$content}</span>";
		return $out;
	}

	/**
	 * blockquote
	 * @return string
	 */
	function dt_sc_blockquote($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'align' => '',
			'variation' => '',
			'textcolor' => '',
			'cite'=> '',
			'role' =>''
		), $attrs ) );

		$class = array();
		if( $align )
			$class[] = ' ' . $align;
		if( $variation )
			$class[] = ' ' . $variation;		
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = strip_tags($content);
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : '';

		$cite = ! empty ( $cite ) ? '&ndash; ' .$cite : '';
		$role = ! empty ( $role ) ? ' <span>' . $role . '</span>' : '';

		$cite = !empty( $cite ) ? "<cite>$cite$role</cite>" : '';

		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );

		$out = "<blockquote class='{$type} {$class}' {$style}>{$content}{$cite}</blockquote>";
		return $out;
	}

	/**
	 * colored button
	 * @return string
	 */
	function dt_sc_colored_button($attrs, $content = null) {
		
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'color' => '',
			'link' => '', #VC
			'icon_type' => 'fontawesome', #VC
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC			
			'class' =>''
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		if(preg_match('#^{{#', $a_href) === 1) {
			$a_href =  str_replace ( '{{', '[', $a_href );
			$a_href =  str_replace ( '}}', '/]', $a_href );
			$a_href = do_shortcode($a_href);
		}else {
			$a_href = esc_url ( $a_href );
		}

		$icon_class = ( $icon_type == 'fontawesome' ) ? $icon : $icon_css_class;
		$iconspan = !empty($icon_class) ? "<span class='{$icon_class}'> </span>" : '';

		$out = "<a class='dt-sc-colored-big-buttons with-left-icon {$color} {$class}' target='{$a_target}' title='{$a_title}' href='{$a_href}'> {$iconspan} {$title} <br> <strong>{$subtitle}</strong> </a>";

		return $out;
	}

	/**
	 * fancy order list
	 * @return string
	 */
	function dt_sc_fancy_ol($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'decimal',
			'variation' => '',
			'class' => ''
		), $attrs ) );

		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ol>', "<ol class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		$content = str_replace ( '<li>', '<li><span>', $content );
		$content = str_replace ( '</li>', '</span></li>', $content );

		return $content;
	}

	/**
	 * fancy unorder list
	 * @return string
	 */
	function dt_sc_fancy_ul($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'style' => 'arrow',
			'variation' => '',
			'class' => ''
		), $attrs ) );

		$style = ($style) ? trim ( $style ) : '';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );

		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tooltip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'	=> '',
			'position' => 'top',
			'bgcolor' => '#000000',
			'textcolor' => '#ffffff',
			'link' => ''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$class = ( $type == "boxed" ) ? "dt-sc-boxed-tooltip" : "";
		$class .= " dt-sc-tooltip-".$position;		

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$style = ( $type == "boxed" ) ? $style : "";

		$out = "<a href='{$a_href}' title='{$a_title}' target='{$a_target}' class='{$class}' {$style}>{$content}</a>";
		return $out;
	}

	function dt_sc_simple_heading( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'type' => 'two-border',
			'tag' => 'h2',
			'text' => 'Lorem ipsum dolor',
			'subtag' => 'h3',
			'subtext' => 'Lorem ipsum dolor',
			'extra_text' => 'Lorem ipsum dolor', # Used only if type = stripe
			'extra_text_tag' => 'h5', # Used only if type = stripe
			'icon' => 'icon icon-compactcamera', # Used only type = with-icon-link
			'link' => '', # Used only type = with-icon-link
			'class' => ''
		), $attrs ) );

		$out = "";
		if( $type == 'simple' ) {
			$class = !empty( $class ) ? ' class="'.$class.'"' : '';
			$out .= "<{$tag}{$class}>{$text}</{$tag}>";
		} elseif( $type == 'two-border') {
			$out  = "<div class='dt-sc-title with-two-border {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "</div>";
		} elseif( $type == 'two-color') {
			$out  = "<div class='dt-sc-title with-two-color-bg {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "</div>";
		} elseif( $type == "split" ) {			
			$out  = "<div class='dt-sc-title mz-title {$class}'>";
			$out .= "<div class='mz-title-content'><{$tag}>{$text}</{$tag}></div>";
			$out .= "</div>";
		} elseif( $type == "mz-stripe" ) {			
			$out  = "<div class='dt-sc-title mz-stripe-title {$class}'>";
			$out .= "<div class='mz-stripe-title-content'><{$tag}>{$text}</{$tag}></div>";
			$out .= "</div>";						
		} elseif( $type == 'ribbon') {
			$out = "<{$tag} class='dt-sc-ribbon-title {$class}'>{$text}</{$tag}>";
		} elseif( $type == 'two-border-with-subtitle' ){
			$out = "<div class='dt-sc-title with-two-border with-sub-title {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "</div>";			
		} elseif( $type == 'script' ) {
			$out = "<div class='dt-sc-title script-with-sub-title {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "</div>";
		} elseif( $type == 'stripe') {
			$out = "<div class='dt-sc-title with-two-color-stripe {$class}'>";
			$out .= "<{$subtag}>{$subtext}</{$subtag}>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= "<{$extra_text_tag}>{$extra_text}</{$extra_text_tag}>";
			$out .= "</div>";
		} elseif( $type == 'with-icon-link' ) {

			//parse link by vc
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty($link['target']) ? $link['target'] : '_self';

			$out  = "<div class='dt-sc-title with-boxed dt-sc-photography-style {$class}'>";
			$out .= "<{$tag}>";
			$out .= ( !empty($a_href) ) ? "<a href='{$a_href}' title='{$a_title}' target='{$a_target}'>" : "";
			$out .= "<span class='{$icon}'> </span>{$text}";
			$out .= "</{$tag}>";
			$out .= ( !empty($a_href) ) ? "</a>" : "";
			$out .= "</div>";
		} elseif( $type == 'decoration' ) {
			$out = "<div class='dt-sc-title with-right-border-decor {$class}'>";
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= "</div>";
		} elseif( $type == 'triangle' ) {
			$out = '<div class="dt-sc-triangle-title">';
			$out .= "<{$tag}>{$text}</{$tag}>";
			$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= "</div>";
		}
		return $out;
	}

	/**
	 * horizontal invisible
	 * @return string
	 */
	function dt_sc_hr_invisible($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'size'  =>  'medium',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-invisible-{$size} {$class}'> </div>";

		return $out;
	}

	/**
	 * horizontal top
	 * @return string
	 */
	function dt_sc_hr_top($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'value'  =>  '10',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-top-{$value} {$class}'> </div>";

		return $out;
	}

	/**
	 * horizontal custom
	 * @return string
	 */
	function dt_sc_hr_custom($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>  'clear',
			'class' =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-{$type} {$class}'> </div>";

		return $out;
	}

	/**
	 * hr stamp divider
	 * @return string
	 */
	function dt_sc_hr_svg($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'type' => 'stamp-divider-down',
			'fillcolor' => '#ffffff',
			'strokecolor' => '#ffffff'
		), $attrs ) );

		$out = "<svg class='dt-sc-{$type}' xmlns='http://www.w3.org/2000/svg' version='1.1' width='100%' height='150' viewBox='0 0 400 260' preserveAspectRatio='none'>
                <path style='fill:{$fillcolor}; stroke:{$strokecolor}' d='M0 0 Q 2.5 40 5 0 Q 7.5 40 10 0 Q 12.5 40 15 0 Q 17.5 40 20 0 Q 22.5 40 25 0 Q 27.5 40 30 0 Q 32.5 40 35 0
                         Q 37.5 40 40 0 Q 42.5 40 45 0 Q 47.5 40 50 0 Q 52.5 40 55 0 Q 57.5 40 60 0 Q 62.5 40 65 0 Q 67.5 40 70 0 Q 72.5 40 75 0 Q 77.5 40 80 0 Q 82.5 40 85 0
                         Q 87.5 40 90 0 Q 92.5 40 95 0 Q 97.5 40 100 0 Q 102.5 40 105 0 Q 107.5 40 110 0 Q 112.5 40 115 0 Q 117.5 40 120 0 Q 122.5 40 125 0 Q 127.5 40 130 0
                         Q 132.5 40 135 0 Q 137.5 40 140 0 Q 142.5 40 145 0 Q 147.5 40 150 0 Q 152.5 40 155 0 Q 157.5 40 160 0 Q 162.5 40 165 0 Q 167.5 40 170 0 Q 172.5 40 175 0
                         Q 177.5 40 180 0 Q 182.5 40 185 0 Q 187.5 40 190 0 Q 192.5 40 195 0 Q 197.5 40 200 0 Q 202.5 40 205 0 Q 207.5 40 210 0 Q 212.5 40 215 0 Q 217.5 40 220 0
                         Q 222.5 40 225 0 Q 227.5 40 230 0 Q 232.5 40 235 0 Q 237.5 40 240 0 Q 242.5 40 245 0 Q 247.5 40 250 0 Q 252.5 40 255 0 Q 257.5 40 260 0 Q 262.5 40 265 0
                         Q 267.5 40 270 0 Q 272.5 40 275 0 Q 277.5 40 280 0 Q 282.5 40 285 0 Q 287.5 40 290 0 Q 292.5 40 295 0 Q 297.5 40 300 0 Q 302.5 40 305 0 Q 307.5 40 310 0
                         Q 312.5 40 315 0 Q 317.5 40 320 0 Q 322.5 40 325 0 Q 327.5 40 330 0 Q 332.5 40 335 0 Q 337.5 40 340 0 Q 342.5 40 345 0 Q 347.5 40 350 0 Q 352.5 40 355 0
                         Q 357.5 40 360 0 Q 362.5 40 365 0 Q 367.5 40 370 0 Q 372.5 40 375 0 Q 377.5 40 380 0 Q 382.5 40 385 0 Q 387.5 40 390 0 Q 392.5 40 395 0 Q 397.5 40 400 0 Z'>
                </path>
            </svg>";

		return $out;
	}
	
	/**
	 * email address
	 * @return string
	 */
	function dt_sc_email($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'text' => '',
			'class' => 'icon icon-mail'
		), $attrs ) );

		$out = "<div class='text-with-icon'>";
			$out .= "<span class='{$class}'> </span>";
			$out .= "<a href='mailto:{$text}'> {$text} </a>";
		$out .= "</div>";

		return $out;
	}

	/**
	 * phone no
	 * @return string
	 */
	
	function dt_sc_phone_no($attrs, $content = null) {
        extract ( shortcode_atts ( array (
            'text' => '',
            'class' => 'icon icon-phone2'
        ), $attrs ) );
        
        $href = preg_replace('/[^0-9]/', '', $text);

        $out = "<div class='text-with-icon'>";
            $out .= "<span class='{$class}'> </span>";
            $out .= "<a href='tel:{$href}'> {$text} </a>";
        $out .= "</div>";

        return $out;
	}

	function dt_sc_whatsapp_no($attrs, $content = null) {
        extract ( shortcode_atts ( array (
            'text' => '',
            'class' => 'fa fa-whatsapp'
        ), $attrs ) );
        
        $href = preg_replace('/[^0-9]/', '', $text);

        $out = "<div class='text-with-icon'>";
            $out .= "<span class='{$class}'> </span>";
            $out .= "<a href='https://api.whatsapp.com/send?phone={$href}'> {$text} </a>";
        $out .= "</div>";

        return $out;
	}

	/**
	 * url
	 * @return string
	 */
	function dt_sc_url($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'link' => '',
			'class'  =>  'icon icon-linked'
		), $attrs ) );

		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		if( !empty($a_href) ):
			$out  = "<div class='text-with-icon'>";
			$out .= "<span class='{$class}'> </span>";
			$out .= "<a title='".esc_attr($a_title)."' target='".esc_attr($a_target)."' href='".esc_url($a_href)."'>{$a_title}</a>";
			$out .= "</div>";
			return $out;
		endif;		
	}

	/**
	 * search form
	 * @return string
	 */
	function dt_sc_search_form($attrs, $content = null) {

		$out = get_search_form(false);		
		return $out;
	}

	/**
	 * woocommerce cart
	 * @return string
	 */
	
	function dt_sc_woo_cart($attrs, $content = null) {

		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );
	
		if( function_exists("is_woocommerce")) :
			$out = '<a class="cart-info '.$class.'" href="'.esc_url(wc_get_cart_url()).'" title="'.esc_attr__( 'View Shopping Cart', 'designthemes-core' ).'">';
				$count = WC()->cart->cart_contents_count;
				$out .= '<p class="cart-icon"> <span> '.$count.' </span> </p>';
				$out .= '<p class="cart-total"> '.WC()->cart->get_cart_total().' </p>';
			$out .= '</a>';
		else:
			$out .= '<p>'.esc_html__('Kindly install & activate woocommerce plugin and check it.', 'designthemes-core').'</p>';
		endif;
	
		return $out;
	}

	/**
	 * icon
	 * @return string
	 */
	function dt_sc_icon( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'icon' => '',
			'styles' => '',
			'link' => '',
			'class' => ''
		), $attrs ) );

		$styles = !empty($styles) ? "style='{$styles}'" : '';

		$out = "<span class='{$icon}' {$styles}> </span>";

		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		if( !empty($a_href) ):
			$out = "<a title='".esc_attr($a_title)."' target='".esc_attr($a_target)."' href='".esc_url($a_href)."' class='".esc_attr($class)."'>{$out}</a>";
		endif;

		return $out;
	}

	function dt_sc_image( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'url' => '',
			'align' => 'alignnone',
			'class' => '',
			'styles' => '',
			'link' => '',
		), $attrs ) );

		$image = wpb_getImageBySize( array('attach_id' => $url, 'thumb_size' => 'full') );
		$url = $image['thumbnail'];

		if( !empty( $url ) ):
			if( !empty($class) ):
				$url = str_replace(' class="', ' class="'.$class.' ', $url);
			endif;

			if( !empty($styles) ):
				$url = str_replace('<img', '<img style="'.$styles.'" ', $url);
			endif;

			if( !empty($align) ):
				$url = str_replace(' class="', ' class="'.$align.' ', $url);
			endif;

			//parse link by vc
			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = !empty( $link['target'] ) ? trim($link['target']) : '_self';
			if( strlen( $link['url'] ) > 0 ) {
				return '<a href="'.$a_href.'" title="'.$a_title.'" target="'.$a_target.'">'.$url.'</a>';
			} else {
				return $url;				
			}
		endif;
	}

	/**
	 * contact info
	 * @return string
	 */
	function dt_sc_contact_info($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' 	 =>	 '',
			'icon' 	 =>  '',
			'title'  =>  '',
			'link'	=>	 '',
			'class'  =>  ''
		), $attrs ) );

		$out = "<div class='dt-sc-contact-info {$type} {$class}'>";

			if( $type == 'type5') {
				//parse link by vc
				$link = ( '||' === $link ) ? '' : $link;
				$link = vc_build_link( $link );
				$a_href = $link['url'];
				$a_title = $link['title'];
				$a_target = !empty($link['target']) ? $link['target'] : '_self';

				if( !empty($icon) ) {
					$out .= "<a class='dt-sc-contact-icon' title='{$a_title}' href='{$a_href}' target='{$a_target}'><span class='{$icon}'> </span></a>";
				}

				if(!empty($title)) {
					$out .= "<h6><a title='{$title}' href='{$a_href}'>{$title}</a></h6>";
				}
			} else {
				if( !empty($icon) ) {
					$out .= "<span class='{$icon}'> </span>";
				}

				if(!empty($title)) {
					$out .= "<h6>{$title}</h6>";
				}
			}
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/**
	 * number counter
	 * @return string
	 */
	function dt_sc_number_counter($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>	'type1',
			'icon_type' => 'icon_class',
			'icon'  =>  '',
			'iconurl'  =>  '',
			'iconcolor'  =>  '',
			'value'  =>  '',
			'append'  =>  '',
			'title'  =>  '',
			'class'  =>  '',
		), $attrs ) );

		$append = !empty($append) ? "data-append='{$append}'" : '';
		$out = "<div class='dt-sc-counter {$type} {$iconcolor} {$class}'>";
			$out .= "<div class='dt-sc-couter-icon-holder'>";
				if(!empty($icon) || !empty($iconurl)):
					$out .= "<div class='icon-wrapper'>";
						if(!empty($icon) && $icon_type == 'icon_class' ):
							$out .= "<span class='{$icon}'> </span>";
						elseif(!empty($iconurl) && $icon_type == 'icon_url' ):
							$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
							$image = $image['thumbnail'];
							$out .= '<span>'.$image.'</span>';
						endif;
					$out .= "</div>";
				endif;
				$out .= "<div class='dt-sc-counter-number' data-value='{$value}' {$append}>{$value}</div>";
			$out .= "</div>";
			$out .= "<h4>{$title}</h4>";
		$out .= "</div>";
		return $out;		
	}

	/**
	 * image caption
	 * @return string
	 */
	function dt_sc_image_caption($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type'  =>  '',
			'title'  =>  '',
			'subtitle'  =>  '',
			'link' => '',
			'image'  =>  '',
			'overlaycolor' => 'rgba(0, 0, 0, 0.8)',
			'icon'  =>  '',
			'iconurl'  =>  '',
			'imgpos'  =>  '',
			'class'  =>  ''
		), $attrs ) );

			$link = ( '||' === $link ) ? '' : $link;
			$link = vc_build_link( $link );
			$a_href = !empty($link['url']) ?  $link['url']: 'javascript:void(0);';
			$a_title = !empty($link['title']) ? $link['title'] : $title;
			$a_target = !empty($link['target']) ? $link['target'] : '_self';



		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));

		$out = "<div class='dt-sc-image-caption {$type} {$class}'>";

			$html_1 = "<div class='dt-sc-image-wrapper'>";
				if(!empty($image))
				$html_1 .= '<a href="'.$a_href.'" target="'.$a_target.'">' . $image['thumbnail'] . '</a>';

				if(!empty($icon) || !empty($iconurl)):
					$html_1 .= "<div class='icon-wrapper'>";
						if(!empty($icon)):
							$html_1 .= "<span class='{$icon}'> </span>";
						elseif(!empty($iconurl)):
							$image = wpb_getImageBySize( array( 'attach_id' => $iconurl, 'thumb_size' => 'full' ));
							$html_1 .= $image['thumbnail'];
						endif;	
					$html_1 .= "</div>";
				endif;

				if($type == 'type9'):
					$bgcolor = '';
					if( !empty($overlaycolor) ){
						$bgcolor = "style='background: {$overlaycolor}'";
					}

					$html_1 .= '<div class="dt-sc-image-overlay" '.$bgcolor.'>';
						$html_1 .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
					$html_1 .= '</div>';
				endif;
			$html_1 .= "</div>";

			
			$html_2 = "<div class='dt-sc-image-content'>";
				$html_2 .= "<div class='dt-sc-image-title'>";
					$html_2 .= '<h3><a href="'.$a_href.'" target="'.$a_target.'" title="'.$a_title.'">'.$title.'</a></h3>';
					if(!empty($subtitle))
						$html_2 .= "<h6>{$subtitle}</h6>";
				$html_2 .= "</div>";
				if($type != 'type9'):
					$html_2 .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
				endif;	
			$html_2 .= "</div>";

			if($imgpos == "bottom")
				$out .= $html_2 . $html_1;
			else
				$out .= $html_1 . $html_2;
		$out .= "</div>";

		return $out;
	}

	/**
	 * image flip
	 * @return string
	 */
	function dt_sc_image_flip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'image1'  =>  '',
			'image2'  =>  '',
			'link'  =>'',
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$image1 = wpb_getImageBySize( array( 'attach_id' => $image1, 'thumb_size' => 'full' ));
		$image2 = wpb_getImageBySize( array( 'attach_id' => $image2, 'thumb_size' => 'full' ));

		$out = "<div class='dt-sc-image-flip'>";
		$out .= !empty( $a_href ) ? "<a href='{$a_href}' title='{$a_title}' target='{$a_target}'>" : "";
		$out .= !empty( $image1['thumbnail'] ) ? $image1['thumbnail'] : '';
		$out .= !empty( $image2['thumbnail'] ) ? $image2['thumbnail'] : '';
		$out .= !empty( $a_href ) ? "</a>" : "";
		$out .= "</div>";
		return $out;
	}

	/**
	 * event caption
	 * @return string
	 */
	function dt_sc_event_caption($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'image' => '',
			'subtitle1' => '',
			'subtitle2' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));

		$out = '<div class="dt-sc-event-image-caption">';
			$out .= '<div class="dt-sc-image-content">';
				$out .= "<h3>{$title}</h3>";
				$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-image-wrapper">';
				$out .= !empty( $image['thumbnail'] ) ? $image['thumbnail'] : '<img src="http://place-hold.it/320x340"/>';
				$out .= '<div class="overlay-text">';
					$out .= "<h3><span>{$subtitle1}</span>{$subtitle2}</h3>";
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * event contact info
	 * @return string
	 */
	function dt_sc_event_contact_info($attrs, $content = null, $shortcodename = "") {

		extract ( shortcode_atts ( array (
			'title' => '',
			'icon' => '',
			'color' => '',
			'link' => '',
		), $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$out = "<div class='dt-sc-contact-info type5 {$color}'>";
			$out .= "<a class='dt-sc-contact-icon' href='{$a_href}' title='{$a_title}' target='{$a_target}'> <span class='{$icon}'> </span> </a>";
			$out .= "<h6><a href='{$a_href}' title='{$a_title}' target='{$a_target}'>{$title}</a></h6>";
		$out .= '</div>';

		return $out;
	}

	/**
	 * mailchimp newsletter
	 * @return string
	 */
	function dt_sc_mc_newsletter($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'title' => '',
			'subtitle' => '',
			'tooltip' => '',
			'listid' => '',
			'name' => esc_html__('Your Name', 'designthemes-core'),
			'email' => esc_html__('Your Email Address', 'designthemes-core'),
			'button' => esc_html__('Subscribe Now', 'designthemes-core'),
			'show_name' => '',
			'privacy' => '',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-newsletter-section {$type} {$class}'>";
			if(!empty($subtitle))
				$out .= "<i>{$subtitle}</i>";
		
			if(!empty($title))
				$out .= "<h2>{$title}</h2>";

			if(!empty($content) && ($type != 'type1'))
				$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';

			$mcapi = cs_get_option( 'mailchimp-key' );

			$out .= '<form class="dt-sc-subscribe-frm" name="frmsubscribe" action="#" method="post">';

				if($show_name == 'true')
					$out .= "<input type='text' name='dt_mc_fname' placeholder='{$name}'>";

				$out .= "<input type='email' name='dt_mc_emailid' required='required' placeholder='{$email}'>";
				$out .= "<input type='hidden' name='dt_mc_apikey' value='$mcapi' />";
				$out .= "<input type='hidden' name='dt_mc_listid' value='$listid' />";
				
				if( ($type == 'type4') || ($type == 'type5') ):
					$out .= apply_filters('dt_sc_mailchimp_form_elements', $privacy, $attrs );
				endif;
				
				$out .= "<input type='submit' name='mc_submit' value='{$button}'>";
				
				if( ($type == 'type1') || ($type == 'type2') || ($type == 'type3') || ($type == 'type6') || ($type == 'type7') ):
					$out .= apply_filters('dt_sc_mailchimp_form_elements', $privacy, $attrs );
				endif;
				
			$out .= '</form>';

			if(!empty($tooltip))
				$out .= "<div class='newsletter-tooltip'>{$tooltip}</div>";

			$out .= '<div class="dt_ajax_subscribe_msg"></div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * team
	 * @return string
	 */
	function dt_sc_team($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'name'	=> '',
			'role' => '',
			'image' => '',
			'teamstyle' => '',
			'socialstyle' => '',
			'facebook' => '',
			'twitter' => '',
			'google' => '',
			'linkedin' => '',
			'class' => ''
		), $attrs ) );

		$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo');

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$out = "<div class='dt-sc-team {$teamstyle} {$class}'>";

			$out .= "<div class='dt-sc-team-thumb'>";
				$out .= !empty( $image ) ? $image : '';

				if($teamstyle == 'type2'):
					$out .= "<div class='dt-sc-team-thumb-overlay'>";
						$s = "";
						foreach ( $sociables as $key => $value ) {
							if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
								$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
						}
						$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$socialstyle}'>$s</ul>" : "";
						$out .= $s;
					$out .= "</div>";
				endif;

			$out .= "</div>";

			$out .= "<div class='dt-sc-team-details'>";
				$out .= "<h4>{$name}</h4>";
				$out .= "<h5>{$role}</h5>";

				if($teamstyle != 'type2'):
					$s = "";
					foreach ( $sociables as $key => $value ) {
						if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
							$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
					}
					$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$socialstyle}'>$s</ul>" : "";
					$out .= $s;
				endif;

				$content = '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper( $content ).'</p>';
				$out .= $content;
			$out .= "</div>";

		$out .= "</div>";

		return $out;
	}

	/**
	 * speaker
	 * @return string
	 */
	function dt_sc_speaker($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'name' => '',
			'role' => '',
			'image' => '',
			'facebook' => '',
			'twitter' => '',
			'google' => '',
			'linkedin' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		$out = '<div class="dt-sc-keynote-speakers '.$class.'">';
			$out .= '<div class="dt-sc-speakers-thumb">';
				$out .= '<div class="dt-sc-speakers-thumb-holder">';
				$out .= !empty( $image ) ? $image : '';
				
					$out .= '<div class="dt-sc-speakers-thumb-overlay">';
					
						$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo', 'fa-behance' => 'behance');
	
						$s = "";
						foreach ( $sociables as $key => $value ) {
							if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
								$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
						}
						$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social hexagon-border'>$s</ul>" : "";
						$out .= $s;
						
					$out .= '</div>';
				$out .= '</div>';
				$out .= "<h4>{$name}</h4>";
				$out .= "<h5>{$role}</h5>";
			$out .= '</div>';
			$out .= '<div class="dt-sc-speakers-details">';
				$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper( $content ).'</p>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * tetimonials
	 * @return string
	 */
	function dt_sc_testimonial($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'image' => '',
			'name' => '',
			'role' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];
		$image = !empty( $image ) ? $image : '';


		$out = '<div class="dt-sc-testimonial-wrapper">';
			$out .= "<div class='dt-sc-testimonial {$type} {$class}'>";
				$img = ""; $con = "";


				$img = '<div class="dt-sc-testimonial-author">';
					if(!empty($image))
						$img .= "<span>".$image."</span>";
					if((!empty($name) || !empty($role)) && $type != 'type7' ):
						$img .= '<cite>';
							if(!empty($name))
								$img .= $name;
							if(!empty($role))
								$img .= "<small>{$role}</small>";
						$img .= '</cite>';
					endif;
				$img .= '</div>';
	
				$con = '<div class="dt-sc-testimonial-quote">';
					$con .= '<blockquote>';
						$con .= '<q>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</q>';
						if((!empty($name) || !empty($role)) && $type == 'type7' ):
							$con .= '<cite>';
								if(!empty($name))
									$con .= $name;
								if(!empty($role))
									$con .= "<small>{$role}</small>";
							$con .= '</cite>';
						endif;
					$con .= '</blockquote>';
				$con .= '</div>';

				if($type == 'type1' || $type == 'type3' || $type == 'type6' || $type == 'type7' || $type == 'type8')
					$out .= $img.$con;
				else
					$out .= $con.$img;

			$out .= '</div>';
        $out .= '</div>';

		return $out;		
	}

	/**
	 * tetimonials carousel wrapper
	 * @return string
	 */
	function dt_sc_tm_carousel_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type2',
			'animation' => 'scroll',
			'class' => ''
		), $attrs ) );


		$content = str_replace('[dt_sc_tm_carousel_item', '[dt_sc_tm_carousel_item type="'.$type.'"', $content );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$out = "<div class='dt-sc-testimonial-wrapper carousel_items {$type} {$class}' data-animation='{$animation}'>";
			$out .= '<ul class="dt-sc-testimonial-carousel">';
			$out .= $content;
			$out .= '</ul>';
			$out .= '<div class="carousel-arrows">';
			$out .= '	<a href="#" class="testimonial-prev"> </a>';
			$out .= '	<a href="#" class="testimonial-next"> </a>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * fullwidth tetimonials carousel wrapper
	 * @return string
	 */
	function dt_sc_fw_tm_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'title' => '',
			'class' => ''
		), $attrs ) );
		
		preg_match_all( '/\[dt_sc_tm_carousel_item (.*?)\](.*?)\[\/dt_sc_tm_carousel_item\]/', $content, $matches);
		# $matches[1] = testimonial attrs
		# $matches[2] = testimonial content

		# To get attributes
		$authors = array();		
		foreach( $matches[1] as $a ) {
			array_push( $authors , shortcode_parse_atts($a) );
		}
		
		$out = '<div class="dt-sc-special-testimonial-container '.$class.'">';
		
		$out .= '<div class="wpb_column vc_column_container vc_col-sm-6 dt-sc-skin-highlight extend-bg-fullwidth-left extend-bg-color-skin">';
		$out .= '	<div class="vc_column-inner">';
		$out .= '		<div class="wpb_wrapper">';
		$out .= '			<div class="alignright">';
		$out .= 				!empty($title) ? '<h2>'.$title.'</h2>' : '';
		$out .= '				<div class="dt-sc-hr-invisible-xsmall"> </div>';
		$out .= '				<div class="dt-sc-clear"></div>';
		$out .= '				<div class="dt-sc-testimonial-special-wrapper">';
		$out .= '					<ul class="dt-sc-testimonial-special">';
							foreach( $matches[2] as $key => $content ) {
								
								$name = isset( $authors[$key]['name'] ) ? $authors[$key]['name'] : '';
								$role = isset( $authors[$key]['role'] ) ? '<small>'.$authors[$key]['role'].'</small>' : '';
								
								$out .= '<li class="dt-sc-testimonial-wrapper">';
								$out .= '	<div class="dt-sc-testimonial special-testimonial-carousel">';
								$out .= '		<div class="dt-sc-testimonial-quote"><blockquote><q>'.$content.'</q></blockquote></div>';
								$out .= '		<div class="dt-sc-testimonial-author">';
								$out .=	'			<cite>'.$name.$role.'</cite>';
								$out .= '		</div>';
								$out .= '	</div>';
								$out .= '</li>';
							}
		$out .= '			</ul>';
		$out .= '				</div>';		
		$out .= '			</div>';
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';

		$out .= '<div class="wpb_column vc_column_container vc_col-sm-6">';
		$out .= '	<div class="vc_column-inner">';
		$out .= '		<div class="wpb_wrapper">';
		$out .= '			<ul class="dt-sc-testimonial-images">';
								foreach( $matches[1] as $attributes ){
									$a = shortcode_parse_atts($attributes);

									$image = '';
									if( isset($a['image']) ):
										$image = wpb_getImageBySize( array( 'attach_id' => $a['image'], 'thumb_size' => 'full' ));
										$image = $image['thumbnail'];
									endif;

									if( $image != '')
										$out .= '<li><div><a href="">'.$image.'</a></div></li>';
								}
		$out .= '			</ul>';
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		
		$out .= '</div>';
		
		return $out;		
	}

	/**
	 * tetimonial carousel item
	 * @return string
	 */
	function dt_sc_tm_carousel_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => '',
			'name' => '',
			'role' => '',
			'image' => '',
			'class' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];
		$image = !empty( $image ) ? $image : '';

		$out = '<li>';
			$out .= "<div class='dt-sc-testimonial {$type} {$class}'>";
				$img = ""; $con = "";

				$img = '<div class="dt-sc-testimonial-author">';
					if(!empty($image))
						$img .= "<span>".$image."</span>";
					if(!empty($name) || !empty($role))
						$img .= '<cite>';
							if(!empty($name))
								$img .= $name;
							if(!empty($role))
								$img .= "<small>{$role}</small>";
						$img .= '</cite>';
				$img .= '</div>';
	
				$con = '<div class="dt-sc-testimonial-quote">';
					$con .= '<blockquote> <q>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</q> </blockquote>';
				$con .= '</div>';

				if($type == 'type1' || $type == 'type6')
					$out .= $img.$con;
				else
					$out .= $con.$img;

			$out .= '</div>';
        $out .= '</li>';

		return $out;
	}

	/**
	 * partners carousel
	 * @return string
	 */
	function dt_sc_partners_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'images' => '',
			'scroll' => '3',
			'visible' => '3',
		), $attrs ) );

		if( !empty($images) ) :

			$images = explode( ',', $images );

			$out = '<div class="dt-sc-partners-carousel-wrapper" data-scroll="'.esc_attr($scroll).'" data-visible="'.esc_attr($visible).'">';

				$out .= "<ul class='dt-sc-partners-carousel'>";
							foreach ( $images as $attach_id ):
								if ( $attach_id > 0 ) :
									$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' =>'full' ) );
									$out .= '<li>'.$post_thumbnail['thumbnail'].'</li>';
								endif;
							endforeach;
				$out .= '</ul>';

				$out .= '<div class="carousel-arrows">';
					$out .= '<a href="" class="partners-prev"> </a>';
					$out .= '<a href="" class="partners-next"> </a>';
				$out .= '</div>';
			$out .= '</div>';

			return $out;
		endif;
	}

	/**
	 * images carousel
	 * @return string
	 */
	function dt_sc_images_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'images' => '',
		), $attrs ) );

		if( !empty($images) ) :

			$images = explode( ',', $images );

			$out = '<div class="dt-sc-images-wrapper">';

				$out .= "<ul class='dt-sc-images-carousel'>";
							foreach ( $images as $attach_id ):
								if ( $attach_id > 0 ) :
									$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' =>'full' ) );
									$out .= '<li>'.$post_thumbnail['thumbnail'].'</li>';
								endif;
							endforeach;
				$out .= '</ul>';

				$out .= '<div class="carousel-arrows">';
					$out .= '<a href="" class="images-prev"> </a>';
					$out .= '<a href="" class="images-next"> </a>';
				$out .= '</div>';
			$out .= '</div>';

			return $out;
		endif;
	}

	/**
	 * hexagon wrapper
	 * @return string
	 */
	function dt_sc_hexagon_wrapper($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'image' => '',
			'title' => '',
			'subtitle' => '',
			'extratitle' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];


		$out = '<div class="dt-sc-hexagon-shape">';
			$out .= '<div class="dt-sc-hexagon-image">';
				$out .= '<span>';
					if( !empty($image) ):
						$out .= $image;
					endif;
				$out .= '</span>';
				$out .= '<div class="dt-sc-hexagon-image-overlay">';
					$out .= "<h3>{$title}</h3>";
					$out .= "<h2>{$subtitle}</h2>";
					$out .= "<h3>{$extratitle}</h3>";
				$out .= "</div>";
			$out .= "</div>";

			$out .= '<ul class="dt-sc-hexagons">';
				$out .= do_shortcode(DTCoreShortcodesDefination::dtShortcodeHelper ( $content ));
			$out .= '</ul>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * hexagon item
	 * @return string
	 */
	function dt_sc_hexagon_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'icon' => '',
			'title' => ''
		), $attrs ) );

		$out = '<li>';
			$out .= "<span class='{$icon}'> </span>";
			$out .= "<div class='dt-sc-hexagon-overlay'> <p>{$title}</p> </div>";
		$out .= '</li>';

		return $out;
	}

	function dt_sc_single_hexagon( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'icon_type' => 'fontawesome', #VC
			'iconclass' => 'fa fa-home',
			'icon_css_class' => '',
			'title' => '',
			'class' => ''
		), $attrs ) );

		$icon = ( $icon_type == 'fontawesome' ) ? $iconclass : $icon_css_class;

		$out = "<div class='dt-sc-single-hexagon {$class}'>";
			$out .= "<span class='{$icon}'> </span>";
			$out .= "<div class='dt-sc-single-hexagon-overlay'> <p>{$title}</p> </div>";
		$out .= '</div>';
		return $out;
	}

	/**
	 * twitter tweets
	 * @return string
	 */
	function dt_sc_twitter_tweets($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'consumerkey' => '',
			'consumersecret' => '',
			'accesstoken' => '',
			'accesstokensecret' => '',
			'username' => '',
			'useravatar' => 'no'
		), $attrs ) );

		$out = '';

		if($username && $consumerkey && $consumersecret && $accesstoken && $accesstokensecret) {
			$transName = 'list_tweets';
			$cacheTime = 10;

			require_once(MARUTHI_CORE_PLUGIN."/apis/twitteroauth/twitteroauth.php");

			$twitterConnection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret );
			$twitterData = $twitterConnection->get('statuses/user_timeline',array('screen_name' => $username, 'count' => 5,'exclude_replies' => true));

			if($twitterConnection->http_code != 200)
				$twitterData = get_transient($transName);

			set_transient($transName, $twitterData, 60 * 10);
			$twitter = get_transient($transName);

			$out .= '<div class="dt-sc-twitter-feeds">';
				$out .= '<div class="dt-sc-twitter-icon"> <span class="fa fa-twitter"> </span> </div>';

				if($twitter && is_array($twitter)) {
					$out .= '<div class="dt-sc-twitter-carousel-wrapper">';
						$out .= '<ul class="dt-sc-twitter-carousel">';

							foreach( $twitter as $tweet ):
								$latestTweet = $tweet->text;
								$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
								$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $latestTweet);

								$twitterTime = strtotime($tweet->created_at);
								$twitterTime = !empty($tweet->utc_offset) ? $twitterTime+($tweet->utc_offset ) : $twitterTime;
								$timeAgo = date_i18n(  get_option('date_format'), $twitterTime );

								$out .= '<li class="dt-sc-tweet">';
									if( $useravatar == 'yes' )
										$out .= '<span class="tweet-thumb"><a href="http://twitter.com/'.$username.'" title=""><img src="'.$tweet->user->profile_image_url.'" alt="thumb" /></a></span>';
										$out .= '<span class="tweet-text">'.$latestTweet.'</span>';
										$out .= "<span class='tweet-time'>{$timeAgo}</span>";
								$out .= '</li>';
							endforeach;

						$out .= '</ul>';
					$out .= '</div>';
				} else {
					$out .= '<div class="no-tweets">'.esc_html__('No Twitter Tweets found.','designthemes-core').'</div>';
				}
			$out .= '</div>';
		} else {
			$out .= '<div class="no-tweets">'.esc_html__('Invalid Twitter Authentication keys.','designthemes-core').'</div>';
		}

		return $out;
	}

	/**
	 * triangle wrapper
	 * @return string
	 */
	function dt_sc_triangle_wrapper($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'image' => '',
			'link' => '',
			'type' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$out = "<div class='dt-sc-triangle-wrapper {$type}'>";

			$img = '<div class="dt-sc-triangle-img">';
				$img .= '<div class="dt-sc-triangle-img-crop">';
				$img .= "<a href='".$a_href."' title='".$a_title."' target='".$a_target."'>".$image."</a>";
				$img .= '</div>';
			$img .= '</div>';

			$text = '<div class="dt-sc-triangle-content">';
				$text .= "<h4>{$title}</h4>";
				$text .= "<h5>{$subtitle}</h5>";
			$text .= '</div>';

			if($type == 'alter')
				$out .= $text . $img;
			else
				$out .= $img . $text;

		$out .= '</div>';

		return $out;
	}

	/**
	 * popular content box
	 * @return string
	 */
	function dt_sc_popular_content($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'image' => '',
			'title' => '',
			'duration' => '',
			'price' => ''
		), $attrs ) );

		$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
		$image = $image['thumbnail'];		

		$out = '<div class="dt-sc-popular-procedures">';
			if(!empty($image))
				$out .= "<div class='image'>".$image."</div>";
			
			$out .= '<div class="details">';
				$out .= "<h3>{$title}</h3>";
				$out .= "<span class='duration'>{$duration}</span>";
				$out .= "<span class='price'>{$price}</span>";
				$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/**
	 * domain wrapper
	 * @return string
	 */
	function dt_sc_domains_wrapper( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'class' => ''
		) , $attrs ) );

		$out = "<ul class='available-domains {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</ul>";

		return $out;
	}

	/**
	 * domian box
	 * @return string
	 */
	function dt_sc_domain_box( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'domain' => '',
			'icon' => '',
			'title' => '',
			'price' => '',
			'link' =>'', 
			'class' => ''
		) , $attrs ) );

		//parse link by vc
		$link = ( '||' === $link ) ? '' : $link;
		$link = vc_build_link( $link );
		$a_href = $link['url'];
		$a_title = $link['title'];
		$a_target = !empty($link['target']) ? $link['target'] : '_self';

		$out = '<li class="'.$class.'">';
			if(!empty($domain))
				$out .= '<div class="tdl">'.$domain.'</div>';

			if(!empty($icon))
				$out .= '<span class="'.$icon.'"></span>';

			if(!empty($title))
				$out .= '<p>'.$title.'</p>';

			if(!empty($price))
				$out .= '<span class="price">'.$price.'</span>';

			$out .= '<a class="dt-sc-button" title="'.$a_title.'" href="'.$a_href.'" target="'.$a_target.'">'.$a_title.'</a>';
		$out .= '</li>';

		return $out;
	}

	function dt_sc_post( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'id' => 1,
			'style' => 'blog-default-style',
			'allow_excerpt' => "yes",
			'excerpt_length' => 30,
			'show_post_format' => "yes",
			'show_author' => "yes",
			'show_date' => "yes",
			'show_comment' => "yes",
			'show_category' => "yes",
			'show_tag' => "yes"
		) , $attrs ) );

		$out = "";
		$meta = array();

		$args = array( 'p' => $id, 'post_type' => 'post', 'ignore_sticky_posts' => true, 'post_status' => 'publish' );

		$the_query = new WP_Query($args);
		if( $the_query->have_posts() ):

			$obj = new maruthi_post_functions;

			$hide_allow_excerpt = strtolower( $allow_excerpt )  == "yes" ? "" : "hidden";
			$excerpt = !empty( $excerpt_length ) ? $excerpt_length : 30;
			$read_more = !empty( $content ) ? $content : '';
			$hide_post_format = strtolower( $show_post_format )  == "yes" ? "" : "hidden";
			$hide_author_meta = strtolower( $show_author == "yes" ) ? "" : "hidden";
			$hide_date_meta = strtolower( $show_date == "yes" ) ? "" : "hidden";
			$hide_comment_meta = strtolower( $show_comment == "yes" ) ? "" : "hidden";
			$hide_category_meta = strtolower( $show_category == "yes" ) ? "" : "hidden";
			$hide_tag_meta = strtolower( $show_tag == "yes" ) ? "" : "hidden";

			array_push( $meta, true, $read_more, $hide_allow_excerpt, $excerpt, $hide_post_format, $hide_author_meta, $hide_date_meta, $hide_comment_meta, $hide_category_meta, $hide_tag_meta);

			while( $the_query->have_posts() ):

				$the_query->the_post();

				$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
				$post_meta = is_array($post_meta) ? $post_meta : array();

				$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';

				$post_classes = get_post_class( array( 'blog-entry', $style, 'format-'.$format ) , $id );
				$post_classes = implode( ' ', $post_classes );

				$out .= '<article id="post-'.$id.'" class="'.esc_attr($post_classes).'">';
					switch( $style ):

						case 'entry-date-left':
							ob_start();
							$obj->maruthi_post_date_left_style( $id, $meta );
							$out .= ob_get_clean();
						break;

						case 'entry-date-author-left':
							ob_start();
							$obj->maruthi_post_date_author_left_style( $id, $meta );
							$out .= ob_get_clean();
						break;

						case 'blog-medium-style':
						case 'blog-medium-style dt-blog-medium-highlight':
						case 'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight':
							ob_start();
							$obj->maruthi_post_medium_style( $id, $meta );
							$out .= ob_get_clean();
						break;

						case 'blog-default-style':
						default:
							ob_start();
							$obj->maruthi_post_default_style( $id, $meta );
							$out .= ob_get_clean();
						break;

					endswitch;
				$out .= '</article>';

			endwhile;
			wp_reset_postdata();
		else:
			$out .= '<h2>'.esc_html__('Nothing Found.', 'designthemes-core').'</h2>';
			$out .= '<p>'.esc_html__('Apologies, but no results were found for the requested archive.', 'designthemes-core').'</p>';
		endif;

		return $out;
	}

	function dt_sc_recent_post( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'count' => 3,
			'column' => 'one-third-column',
			'category' => '',
			'style' => 'blog-default-style',
			'allow_excerpt' => "yes",
			'excerpt_length' => 30,
			'show_post_format' => "yes",
			'show_author' => "yes",
			'show_date' => "yes",
			'show_comment' => "yes",
			'show_category' => "yes",
			'show_tag' => "yes"
		) , $attrs ) );

		$out = '';

		$post_layout_arr = array();
		$post_class = array( '1' => 'column dt-sc-one-column blog-fullwidth', '2' => 'column dt-sc-one-half', '3' => 'column dt-sc-one-third' );

		switch($column):
			case 'one-column':
				$post_layout_arr[] = 1;
			break;

			case 'one-half-column':
				$post_layout_arr[] = 2;
			break;

			case 'one-third-column':
				$post_layout_arr[] = 3;
			break;

			default:
				$post_layout_arr = explode('-', $column);
		endswitch;

		$args = array( 'posts_per_page' => $count, 'orderby' => 'date', 'ignore_sticky_posts' => true );
		$warning = esc_html__('No Posts Found','designthemes-core');
		
		if( !empty($category) ){
			$args = array( 'posts_per_page' => $count, 'orderby' => 'date', 'cat' => $category, 'ignore_sticky_posts' => true );
			$warning = esc_html__('No Posts Found in Category ','designthemes-core').$category;
		}

		$rposts = new WP_Query( $args );
		if ( $rposts->have_posts() ) :

			$i = 1;
			$gs_class = ( count( $post_layout_arr ) > 1 ) ? $post_layout_arr[1] : $post_layout_arr[0];

			$out .= '<div class="dt-sc-posts-list-wrapper">';
			$out .= '<div class="tpl-blog-holder apply-isotope">';
				$out .= "<div class='grid-sizer ".esc_attr( $post_class[$gs_class] )."'></div>";

				while( $rposts->have_posts() ):
					$rposts->the_post();
					$the_id = get_the_ID();
	
					$temp_class = "";
	
					$column = current($post_layout_arr);
	
					if($i == 1) $temp_class = $post_class[$column]." first"; else $temp_class = $post_class[$column];
					if($i == $column) $i = 1; else $i = $i + 1;
	
					$out .= "<div class='".esc_attr( $temp_class )."'>";
								$sc = '[dt_sc_post id="'.$the_id.'" style="'.$style.'" allow_excerpt="'.$allow_excerpt.'" excerpt_length="'.$excerpt_length.'" show_post_format="'.$show_post_format.'" show_author="'.$show_author.'" show_date="'.$show_date.'" show_comment="'.$show_comment.'" show_category="'.$show_category.'" show_tag="'.$show_tag.'"]';
								$sc .= $content;							
								$sc .= '[/dt_sc_post]';
					$out .= do_shortcode($sc);

					$x = next($post_layout_arr);
					if( empty($x) && (count($post_layout_arr) == 3) ){
						unset($post_layout_arr);
						$post_layout_arr[] = 2;
					} elseif( empty($x) && (count($post_layout_arr) == 4) ){
						unset($post_layout_arr);
						$post_layout_arr[] = 3;
					} elseif( empty($x) && (count($post_layout_arr) == 5) ){
						reset($post_layout_arr);
						next($post_layout_arr);
					} elseif( empty($x) && (count($post_layout_arr) == 6) ){
						reset($post_layout_arr);
					} elseif( empty($x) && (count($post_layout_arr) == 1) ){
						reset($post_layout_arr);
					}

					$out .= '</div>';
				endwhile;

				wp_reset_postdata();
			$out .= '</div>';
			$out .= '</div>';
		else:
			$out = "<div class='dt-sc-warning-box'>{$warning}</div>";
		endif;

		return $out;
	}

	function dt_sc_latest_news( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'limit' => '3'
		), $attrs ) );

		global $post;
		$out = '';

		$args = array('post_type' => 'post', 'posts_per_page' => $limit, 'ignore_sticky_posts' => 1);
		$the_query = new WP_Query($args);
		
		if($the_query->have_posts()): $i = 1;
		 while($the_query->have_posts()): $the_query->the_post();

			$lastcls = ($i == $limit) ? 'last' : '';

			$out .= "<div class='blog-entry blog-thumb-style entry-date-left {$lastcls}'>";
				$out .= '<div class="entry-thumb">';
					$out .= get_the_post_thumbnail( get_the_ID(), 'designthemes-blog-thumb' );
				$out .= '</div>';
				$out .= '<div class="entry-details">';

					$out .= '<div class="entry-author">'.esc_html__('By', 'designthemes-core').' <a href="'.get_author_posts_url(get_the_author_meta('ID')).'" 
							title="'.esc_attr__('View all posts by ', 'designthemes-core').get_the_author().'">'.get_the_author().'</a></div>';

					$out .= '<div class="entry-date">'.get_the_date('M ').get_the_date('d').get_the_date(', Y').'</div>';

					$out .= '<div class="entry-title">';
						$out .= '<h4> <a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a> </h4>';
					$out .= '</div>';

					$out .= '<div class="entry-body">';
						$out .= maruthi_excerpt(10);
					$out .= '</div>';

					$out .= '<a href="'.get_permalink().'" title="'.sprintf( esc_attr__('Permalink to %s','designthemes-core'), the_title_attribute('echo=0')).'" class="read-more">';
						$out .= esc_html__('Read More', 'designthemes-core').'<span class="fa fa-long-arrow-right"></span>';
					$out .= '</a>';
				$out .= '</div>';
			$out .= '</div>';
			$i = $i + 1;
		 endwhile;
		endif;

		wp_reset_postdata();

		return $out;
	}

	/* Related posts shortcode in post single */
	function dt_sc_blog_related_post( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'id' => '',
			'post_class' => '',
			'post_style' => '',
		), $attrs ) );

		$cats = wp_get_post_categories($id);

		$args = array(
			'category__in'			=> $cats,
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'post__not_in'			=> array( $id ),
			'posts_per_page'		=> 3,
			'post_status'			=> 'publish');

		$hide_post_format = cs_get_option( 'post-format-meta' );;
		$hide_post_format = !empty( $hide_post_format ) ? "yes" : "";

		$hide_author_meta = cs_get_option( 'post-author-meta' );
		$hide_author_meta = !empty( $hide_author_meta ) ? "yes" : "";

		$hide_date_meta = cs_get_option( 'post-date-meta' );
		$hide_date_meta = !empty( $hide_date_meta ) ? "yes" : "";

		$hide_comment_meta = cs_get_option( 'post-comment-meta' );
		$hide_comment_meta = !empty( $hide_comment_meta ) ? "yes" : "";

		$hide_category_meta = cs_get_option( 'post-category-meta' );
		$hide_category_meta = !empty( $hide_category_meta ) ? "yes" : "";

		$hide_tag_meta = cs_get_option( 'post-tag-meta' );
		$hide_tag_meta = !empty( $hide_tag_meta ) ? "yes" : "";

		$allow_excerpt = cs_get_option( 'post-archives-enable-excerpt' );
		$allow_excerpt = !empty( $allow_excerpt ) ? "yes" : "no";
		$excerpt_length = cs_get_option( 'post-archives-excerpt' );

		$allow_read_more = cs_get_option( 'post-archives-enable-readmore' );
		$allow_read_more = !empty( $allow_read_more ) ? "yes" : "no";
		$read_more = cs_get_option( 'post-archives-readmore' );

		$out = '';

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;

			$out .= '<div class="dt-sc-hr-invisible-small"></div>';
			$out .= '<div class="dt-sc-clear"></div>';
			$out .= '<section class="related-post">';
			$out .= 	'<h4>'.esc_html__('Related posts','designthemes-core').'</h4>';

			while ( $the_query->have_posts() ){
				$the_query->the_post();

				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == 3 ) $i = 1; else $i = $i + 1;

				$the_id = get_the_id();
				$out .= '<div class="'.esc_attr($temp_class).'">';
							$sc = '[dt_sc_post id="'.$the_id.'" style="'.$post_style.'" allow_excerpt="'.$allow_excerpt.'" excerpt_length="'.$excerpt_length.'" show_post_format="'.$hide_post_format.'" show_author="'.$hide_author_meta.'" show_date="'.$hide_date_meta.'" show_comment="'.$hide_comment_meta.'" show_category="'.$hide_category_meta.'" show_tag="'.$hide_tag_meta.'"]';
							$sc .= $read_more;							
							$sc .= '[/dt_sc_post]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
			$out .= '</section>';

			wp_reset_postdata();
		}

		return $out;
	}	

	function dt_sc_portfolio_item( $attrs, $content = null ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;

		if( $page_layout == "content-full-width" ) {
			$show_sidebar = false;
		} else {
			$show_sidebar = true;
		}

		$post_class = $show_sidebar ? "portfolio with-sidebar " : "portfolio ";

		extract( shortcode_atts( array( 
			'id' => 1,
			'style' => 'type1'
		) , $attrs ) );

		$post_class .= $style;
		
		$out = "";
		if( !empty( $id ) ){
			$p = get_post( $id );
			
			if( $p->post_type === "dt_portfolios" ) {

				$title = get_the_title($id);
				$permalink = get_permalink($id);
				$portfolio_item_meta = get_post_meta($id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
				$items = false;

				// setting up image
				if( !empty($portfolio_item_meta['portfolio-gallery']) ) {
  
				  $items = true;
				  $gallerys = explode(',', $portfolio_item_meta["portfolio-gallery"]);
  
				  $popup = wp_get_attachment_image_src($gallerys[0], 'full', false);
				  $popup = ( isset($popup[0]) && !empty($popup[0]) ) ? $popup[0] : '';
  
				  if( sizeof($gallerys) > 1 ){
					$popup = wp_get_attachment_image_src($gallerys[1], 'full', false);
					$popup = ( isset($popup[0]) && !empty($popup[0]) ) ? $popup[0] : '';
				  }
				  $image = wp_get_attachment_image_src($gallerys[0], 'full', false);
				  $image = ( isset($image[0]) && !empty($image[0]) ) ? $image[0] : '';
				}
  
				if( has_post_thumbnail( $id ) ){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), 'full', false);
					$image = $popup = $image[0];

					if( !$items ){
						$popup = $image;
					}
				}elseif( $items ) {
					$image = $popup = $image;
				}else{
					$image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($id);
				}
				// setting up image end

				$out .= '<div id="dt_portfolios-'.esc_attr($id).'" class="'.esc_attr($post_class).'">';
				$out .= '	<figure>';
				$out .= '		<img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';
				$out .= '		<div class="image-overlay">';
									if($style == "type3" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a>';
										$out .= '</div>';
									elseif( $style == "type4" || $style == "type6" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="icon icon-search"> </span> </a>';
										$out .= '</div>';
									elseif( $style == "type1" || $style == "type2" || $style == "type5" || $style == "type7" || $style == "type8"):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="icon icon-search"> </span> </a>';
										$out .= '</div>';
										$out .= '<div class="image-overlay-details">';
										$out .= '	<h2><a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a></h2>';										
													if( $style != "type2" ):
														if( $style == "type7" ):
															$out .= get_the_term_list( $id, 'portfolio_entries', "<p class='categories'>", ' ', '</p>' );
														else:
															$out .= get_the_term_list( $id, 'portfolio_entries', "<p class='categories'>", ', ', '</p>' );
														endif;
													endif;
													if( $style == "type5" ):
														$out .= '<p>'.maruthi_excerpt(10, $id).'</p>';
													endif;
										$out .= '</div>';
									elseif( $style == "type9" ):
										$out .= '<div class="links">';
										$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
										$out .= 	'	<span class="pe-icon pe-plus"> </span></a>';
										$out .= '</div>';
									endif;
				$out .= '		</div>';
				$out .= '	</figure>';
				$out .= '</div>';
			}
		}
		wp_reset_postdata();
		return $out;
	}

	function dt_sc_portfolio_related_post( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'id' => '',
			'post_class' => '',
			'post_style' => '',
		), $attrs ) );

		$terms = wp_get_object_terms( get_the_ID() ,'portfolio_entries' ,array('fields' => 'ids') );

		$args = array(
			'post_type'				=> 'dt_portfolios',
			'posts_per_page'		=> 3,
			'post__not_in'			=> array( $id ),
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'no_found_rows'			=> true,
			'tax_query'				=> array()
		);
		
		$args['tax_query'][] = array( 'taxonomy' => 'portfolio_entries',
			'field' => 'term_id',
			'terms' => $terms ,
			'operator' => 'IN');

		$out = '';

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ) {
			$i = 1;
			
			while ( $the_query->have_posts() ){
				$the_query->the_post();

				$temp_class = "";
				if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
				if($i == 3 ) $i = 1; else $i = $i + 1;
				
				$class = $temp_class.' '.$post_style;
				
				$the_id = get_the_id();
				$out .= '<div class="'.esc_attr($class).'">';
				$sc   = '[dt_sc_portfolio_item id="'.$the_id.'" style="'.$post_style.'"/]';
				$out .= do_shortcode($sc);
				$out .= '</div>';
			}
			wp_reset_postdata();
		}
		
		return $out;			
	}

	function dt_sc_portfolios( $attrs, $content = null ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;
		$container_class = $post_class = $out = "";

		if( $page_layout == "content-full-width" ) {
			$show_sidebar = false;
		} else {
			$show_sidebar = true;
		}

		extract( shortcode_atts( array(
			'count' => '',
			'column' => '3',
			'style' => 'type1',
			'allow_gridspace' => 'yes',
			'allow_filter' => 'yes',
			'terms' => ''
		), $attrs ) );

		switch( $column ) {

			case '2':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
			break;

			case '3':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
			break;

			case '4':
				$post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
			break;
		}

		$categories = isset($terms) ? array_filter( explode(",",$terms) ) : array();
		$post_per_page = isset($count) ? $count : '-1';

		$paged = 1;
		if ( get_query_var('paged') ) { 
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		}

		#Query arg
		$args = array();
		if( empty($categories) ):
			$args = array( 'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios');
		else:
			$args = array(
				'paged' => $paged,
				'posts_per_page' => $post_per_page,
				'post_type' => 'dt_portfolios',
				'orderby' => 'ID',
				'order' => 'ASC',
				'tax_query' => array( 
					array(
						'taxonomy' => 'portfolio_entries',
						'field' => 'term_id',
						'operator' => 'IN',
						'terms' => $categories
					)
				)
			);
		endif;
		#Query arg
		
		/* Filter Option */
		if(empty($categories)):
			$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
		else:
			$c = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
			$categories = get_categories($c);
		endif;

		$allow_filter = strtolower( $allow_filter );

		if( (sizeof($categories) > 1) && ( $allow_filter == "yes" ) ) :
			$post_class .= " all-sort";
			$out .= '<div class="dt-sc-portfolio-sorting '.esc_attr($style).'">';
			$out .= '	<a href="#" class="active-sort" title="" data-filter=".all-sort">'.esc_html__('All','designthemes-core').'</a>';
						foreach( $categories as $category ) :
							$out .= '<a href="#" data-filter=".'.esc_attr($category->category_nicename).'-sort">'.esc_html($category->cat_name).'</a>';
						endforeach;
			$out .= '</div>';
		endif;
		/* Filter Option */

		$allow_gridspace = ( strtolower($allow_gridspace) == "yes" ) ? "with-space" : "no-space";

		$the_query = new WP_Query($args);
		if($the_query->have_posts()):
			$i = 1;

			$out .= '<div class="dt-sc-portfolio-container '.esc_attr($allow_gridspace).'">';
				$out .= '<div class="grid-sizer '.esc_attr($post_class).'"></div>';
				while( $the_query->have_posts() ):
					$the_query->the_post();
					$the_id = get_the_ID();
					$title = get_the_title($the_id);
					$permalink = get_permalink($the_id);

					$temp_class = $style.' '.$allow_gridspace;
					if($i == 1) $temp_class .= $post_class." first"; else $temp_class .= $post_class;
					if($i == $column) $i = 1; else $i = $i + 1;

					if( $allow_filter == "yes" ):
						$item_categories = get_the_terms( $the_id, 'portfolio_entries' );
						if(is_object($item_categories) || is_array($item_categories)):
							foreach ($item_categories as $category):
								$temp_class .=" ".$category->slug.'-sort ';
							endforeach;
						endif;
					endif;

					#setting up images					
					$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
					$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
					$items = false;
					
					if( !empty($portfolio_item_meta['portfolio-gallery']) ) {
	  
					  $items = true;
					  $gallerys = explode(',', $portfolio_item_meta["portfolio-gallery"]);
	  
					  $popup = wp_get_attachment_image_src($gallerys[0], 'full', false);
					  $popup = $popup[0];
	  
					  if( sizeof($gallerys) > 1 ){
						$popup = wp_get_attachment_image_src($gallerys[1], 'full', false);
						$popup = $popup[0];
					  }
					  $image = wp_get_attachment_image_src($gallerys[0], 'full', false);
					  $image = $image[0];
					}

					if( has_post_thumbnail( $the_id ) ){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);
						$image = $popup = $image[0];
	
						if( !$items ){
							$popup = $image;
						}
					}elseif( $items ) {
						$image = $popup = $image;
					}else{
						$image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
					}
					// setting up image end
					
					$out .= '<div id="dt_portfolios-'.esc_attr($the_id).'" class="'.esc_attr(trim($temp_class)).'">';
					$out .= '	<figure>';
					$out .= '		<img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/>';
					$out .= '		<div class="image-overlay">';
										if($style == "type3" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a>';
											$out .= '</div>';
										elseif( $style == "type4" || $style == "type6" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="icon icon-search"> </span> </a>';
											$out .= '</div>';
										elseif( $style == "type1" || $style == "type2" || $style == "type5" || $style == "type7" || $style == "type8"):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'"><span class="icon icon-linked"> </span></a>';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="icon icon-search"> </span> </a>';
											$out .= '</div>';
											$out .= '<div class="image-overlay-details">';
											$out .= '	<h2><a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">'.esc_html($title).'</a></h2>';
														if( $style != "type2" ):
															if( $style == "type7" ):
																$out .= get_the_term_list( $the_id, 'portfolio_entries', "<p class='categories'>", ' ', '</p>' );
															else:
																$out .= get_the_term_list( $the_id, 'portfolio_entries', "<p class='categories'>", ', ', '</p>' );
															endif;
														endif;
														if( $style == "type5" ):
															$out .= '<p>'.maruthi_excerpt(10, $id).'</p>';
														endif;
											$out .= '</div>';
										elseif( $style == "type9" ):
											$out .= '<div class="links">';
											$out .= 	'<a title="'.esc_attr($title).'" data-gal="prettyPhoto[gallery]" href="'.esc_url($popup).'">';
											$out .= 	'	<span class="pe-icon pe-plus"> </span></a>';
											$out .= '</div>';
										endif;
					$out .= '		</div>';
					$out .= '	</figure>';					
					$out .= '</div>';
				endwhile;	
			$out .= '</div>';
		endif;
		
		wp_reset_postdata();

		return $out;
	}

	function dt_sc_infinite_portfolios( $attrs, $content = null ) {

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$show_sidebar = false;
		$container_class = $post_class = $out = "";

		if( $page_layout == "content-full-width" ) {
			$post_class = 'dt-sc-infinite-portfolio without-sidebar';
		} else {
			$post_class = 'dt-sc-infinite-portfolio with-sidebar';
		}

		extract( shortcode_atts( array(
			'portfolio_entries' => '',
			'posts_per_page' => '-1',
			'display_style' => 'all',
			'warning' => '',
			'paged' => '1',
			'ajax_call' => 'no'
		), $attrs ) );

		#Query arg
		$args = array( 
			'post_type' => 'dt_portfolios',
			'orderby' => 'ID',
			'order' => 'ASC',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged
		);

		if( !empty( $portfolio_entries ) ) {

			$categories = array_filter( explode(",",$portfolio_entries) );
			$args = array( 
				'post_type' => 'dt_portfolios',
				'orderby' => 'ID',
				'order' => 'ASC',
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,				
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_entries',
						'field' => 'term_id',
						'operator' => 'IN',
						'terms' => $categories
					)
				)
			);
		}
		#Query arg
		
		$the_query = new WP_Query($args);
		if($the_query->have_posts()) :
			$out .=  ( $ajax_call == 'no' ) ? '<div class="dt-sc-infinite-portfolio-container" data-paged="'.$paged.'">' : '';
			$out .= ( $ajax_call == 'no' ) ? '<div class="message hidden">'.$warning.'</div>' : '';
			while( $the_query->have_posts() ) :
				$the_query->the_post();
				$the_id = get_the_ID();
				$title = get_the_title($the_id);
				$permalink = get_permalink($the_id);

				#setting up images
				$portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
				$portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
				$items = false;

				if( !empty($portfolio_item_meta['portfolio-gallery']) ) {
  
				  $items = true;
				  $gallerys = explode(',', $portfolio_item_meta["portfolio-gallery"]);
  
				  $popup = wp_get_attachment_image_src($gallerys[0], 'full', false);
				  $popup = $popup[0];
  
				  if( sizeof($gallerys) > 1 ){
					$popup = wp_get_attachment_image_src($gallerys[1], 'full', false);
					$popup = $popup[0];
				  }
				  $image = wp_get_attachment_image_src($gallerys[0], 'full', false);
				  $image = $image[0];
				}
  
				if( has_post_thumbnail( $the_id ) ){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);
					$image = $popup = $image[0];

					if( !$items ){
						$popup = $image;
					}
				}elseif( $items ) {
					$image = $popup = $image;
				}else{
					$image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
				}
			  	#setting up image end

				$masonry = array_key_exists("masonry-size",$portfolio_item_meta) ? $portfolio_item_meta['masonry-size'] : 'grid-sizer-default';
				$tempclass = $post_class.' '.$masonry;
				$out .= '<div id="dt_portfolios-'.esc_attr($the_id).'" class="'.esc_attr(trim($tempclass)).'">';
				$out .= '<a title="'.esc_attr($title).'" href="'.esc_url($permalink).'">';
				$out .= '	<figure><img src="'.esc_url($image).'" alt="'.esc_attr($title).'" title="'.esc_attr($title).'"/></figure>';
				$out .= '</a>';
				$out .= '</div>';
			endwhile;
			wp_reset_postdata();
			$out .=  ( $ajax_call == 'no' ) ? '</div>' : '';

			if( $ajax_call == 'no' ) :

				if( $display_style == 'load-more' || $display_style == 'lazy' ) :
					$label = ( $display_style == 'load-more' ) ? esc_html__('Load More', 'designthemes-core' ) : esc_html__('Scroll To Load More','designthemes-core');
					$out .= '<a href="javascript:void(0)" class="dt-sc-infinite-portfolio-load-more" data-style="'.$display_style.'" data-per-page="'.esc_attr($posts_per_page).'" data-term="'.esc_attr($portfolio_entries).'">'.$label.'</a>';
				endif;
			endif;
		endif;

		return $out;
	}

	function dt_ajax_infinite_portfolios(){

		echo do_shortcode('[dt_sc_infinite_portfolios paged ="'.( $_REQUEST['paged'] + 1 ).'" ajax_call="yes" portfolio_entries="'.$_REQUEST['term'].'" posts_per_page="'.$_REQUEST['per_page'].'" display_style="'.$_REQUEST['style'].'"/]' );
		die(1);
	}
	
	/**
	 * event lists
	 * @return string
	 */
	function dt_sc_events_list( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'title' => '',
			'limit' => 3,
			'categories' => ''
		) , $attrs ) );

		global $post; $out = "";

		// select categories
		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		$out = '<div class="dt-sc-events-list-wrapper">';

			if(!empty($title))	$out .= "<h3>{$title}</h3>";

				$events = tribe_get_events( array( 'eventDisplay' => 'list', 'posts_per_page' => $limit,
													'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'term_id', 'terms' => $cats ) ) ));
													
			if($events):							
				foreach($events as $post):
					setup_postdata($post);
					$out .= '<div class="dt-sc-events-list">';
						$out .= '<div class="dt-sc-event-date">';
							$out .= '<h2> <strong>'.tribe_get_start_date($post->ID, false, 'd').'</strong> '.tribe_get_start_date($post->ID, false, 'M').'</h2>';
							$out .= '<p> <span>'.tribe_get_start_date($post->ID, false, 'l').'</span> - '.tribe_get_start_time($post->ID, false, 'h:i').' - '.tribe_get_end_time($post->ID, false, 'h:i').' </p>';
						$out .= '</div>';
						$out .= '<div class="dt-sc-event-title">';
							$out .= '<h5> <a title="'.get_the_title().'" href="'.get_permalink($post->ID).'"> <small> '.tribe_get_organizer($post->ID).' </small> '.get_the_title().' </a> </h5>';
						$out .= '</div>';
						$out .= '<div class="dt-sc-event-duration">';
							$out .= '<h6>'.round((get_post_meta($post->ID, '_EventDuration', true) / 3600), 2).' hrs</h6>';
						$out .= '</div>';
					$out .= '</div>';
				endforeach;
			else:
				$out .= '<div class="dt-sc-warning-box">'.esc_html__('No Events Found','designthemes-core').'</div>';
			endif;	
			wp_reset_postdata();

		$out .= '</div>';

		return $out;
	}

	/**
	 * special events list
	 * @return string
	 */
	function dt_sc_special_events_list( $attrs, $content = null ){
		extract( shortcode_atts( array( 
			'type' => 'type1',
			'limit' => -1,
			'categories' => ''
		) , $attrs ) );

		global $post; $out = "";

		// select categories
		if(empty($categories)) {
			$cats = get_categories('taxonomy=tribe_events_cat&hide_empty=1');
			$cats = get_terms( array('tribe_events_cat'), array('fields' => 'ids'));
		} else {
			$cats = explode(',', $categories);
		}

		$events = tribe_get_events( array( 'eventDisplay' => 'list', 'posts_per_page' => $limit, 'tax_query'=> array( array( 'taxonomy' => 'tribe_events_cat', 'field' => 'term_id', 'terms' => $cats ) ) ));
		if($events): $i = 1;
		
			switch($type):
			
				case 'type1':
				default:
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;
		
						$temp_class = "";
						
						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type1">';
								 $title = ( strlen(get_the_title()) > 27 ) ? substr(get_the_title(),0,27)."..." : get_the_title();
								 $out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
								 $out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'designthemes-event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
									$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span><br>'.tribe_get_start_date ( $event_id, true, 'M' ).'</p>';
								 $out .= '</div>';
								 $out .= '<div class="dt-sc-event-meta">';
									$out .= '<p class="event-timing"><span class="fa fa-clock-o"></span>'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</p>';
									$venue = ( strlen(tribe_get_venue($event_id)) > 18 ) ? substr(tribe_get_venue($event_id),0,18)."..." : tribe_get_venue($event_id);
									$out .= '<p class="events-venue"><span class="fa fa-map-marker"></span>'.$venue.'</p>';
								 $out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type2':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type2">';
								 $title = ( strlen(get_the_title()) > 27 ) ? substr(get_the_title(),0,27)."..." : get_the_title();
								 $out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
								 $out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'designthemes-event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
								 $out .= '</div>';
								 $out .= '<div class="dt-sc-event-meta">';
								    $out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span>'.tribe_get_start_date ( $event_id, true, 'F' ).'<br>'.tribe_get_start_date ( $event_id, true, 'Y' ).'</p>';
									$venue = ( strlen(tribe_get_venue($event_id)) > 18 ) ? substr(tribe_get_venue($event_id),0,18)."..." : tribe_get_venue($event_id);
									$out .= '<p class="event-timing">'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'<br>'.$venue.'</p>';
								 $out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type3':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type3">';
								$out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'designthemes-event-list2', $attr);
									else:
										$out .= '<img  src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
								    $out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> '.tribe_get_start_date ( $event_id, true, 'F' ).' '.tribe_get_start_date ( $event_id, true, 'Y' ).'</p>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-event-meta">';
								    $out .= '<p class="event-timing"> '.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).' - '.tribe_get_venue($event_id).'</p>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-clear"></div>';
								$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type4':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 3) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-third column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type4">';
								$out .= '<div class="dt-sc-event-thumb">';
									if(has_post_thumbnail()):
										$attr = array('title' => get_the_title(), 'alt' => get_the_title());
										$out .= get_the_post_thumbnail($post->ID, 'designthemes-event-list2', $attr);
									else:
										$out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									endif;
									$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
								$out .= '</div>';
								$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> <i>'.tribe_get_start_date ( $event_id, true, 'F' ).', '.tribe_get_start_date ( $event_id, true, 'l' ).' - '.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</i> <br>'.tribe_get_venue($event_id).'</p>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;

				case 'type5':
					foreach($events as $post):
						setup_postdata($post);
						$event_id = $post->ID;

						$temp_class = "";

						if($i == 1) $temp_class = " first";
						if($i == 2) $i = 1; else $i = $i + 1;
						
						$out .= '<div class="dt-sc-one-half column '.$temp_class.'">';
							$out .= '<div class="dt-sc-event type5">';
								$out .= '<div class="dt-sc-one-half column first">';
								   $out .= '<div class="dt-sc-event-thumb">';
									  if(has_post_thumbnail()):
										  $attr = array('title' => get_the_title(), 'alt' => get_the_title());
										  $out .= get_the_post_thumbnail($post->ID, 'designthemes-event-list2', $attr);
									  else:
										  $out .= '<img src="http://place-hold.it/420x275&text='.get_the_title().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
									  endif;
								   $out .= '</div>';
								$out .= '</div>';
								$out .= '<div class="dt-sc-one-half column">';
								   $out .= '<div class="dt-sc-event-meta">';
										$out .= '<p class="dt-sc-event-date"><span>'.tribe_get_start_date ( $event_id, true, 'd' ).'</span> '.tribe_get_start_date ( $event_id, true, 'M' ).' - <i>'.tribe_get_start_time ( $event_id, 'h:i a' ).' - '.tribe_get_end_time ( $event_id, 'h:i a' ).'</i> </p>';
										$out .= '<p class="dt-sc-event-venue">'.tribe_get_venue($event_id).'</p>';
										$out .= '<div class="dt-sc-hr-invisible-xsmall"></div>';
										$title = ( strlen(get_the_title()) > 18 ) ? substr(get_the_title(),0,18)."..." : get_the_title();
										$out .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.$title.'</a></h2>';
										$ecost = tribe_get_formatted_cost($event_id);
										if(!empty($ecost))
											$out .= '<div class="dt-sc-event-cost">'.$ecost.'</div>';
										$out .= '<a href="'.get_permalink().'" class="dt-sc-events-read-more">'.esc_html__('Find out more', 'designthemes-core').'</a>';
								   $out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						if($i == 1) $out .= '<div class="dt-sc-hr-invisible-small"> </div>';

					endforeach;
				break;
					
			endswitch;
		else:
			$out .= '<div class="dt-sc-warning-box">'.esc_html__('No Events Found','designthemes-core').'</div>';
		endif;	
		wp_reset_postdata();

		return $out;
	}

	/* Map Overlay */
	/**
	 * map overlay
	 * @return string
	 */
	function dt_sc_map_overlay($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-map-overlay {$class}'><div class='container'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div></div>";

		return $out;
	}

	/**
	 * map code
	 * @return string
	 */
	function dt_sc_map($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$out = "<div class='map {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</div>";

		return $out;
	}

	/* Coming Soon */
	/**
	 * down count
	 * @return string
	 */
	function dt_sc_down_count($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class'  =>  ''
		), $attrs ) );

		$out = "";
		$type = cs_get_option( 'comingsoon-style' );

		if( !cs_get_option( 'show-launchdate' ) ) return;

		$out .= '<div class="downcount '.$class.'" data-date="'.maruthi_cs_get_option('comingsoon-launchdate', date('m/d/Y')).'" data-offset="'.maruthi_cs_get_option('comingsoon-timezone', '0').'">';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number days">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Days Left', 'designthemes-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Days', 'designthemes-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number hours">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Hr.', 'designthemes-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Hrs', 'designthemes-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Hours', 'designthemes-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number minutes">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Min.', 'designthemes-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Mins', 'designthemes-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Minutes', 'designthemes-core').'</h3>';
			$out .= '</div>';
			$out .= '<div class="dt-sc-counter-wrapper last">';
				$out .= '<div class="counter-icon-wrapper">';
					$out .= '<div class="dt-sc-counter-number seconds">00</div>';
				$out .= '</div>';
				if($type == 'type2')
					$out .= '<h3 class="title">'.esc_html__('Sec.', 'designthemes-core').'</h3>';
				elseif($type == 'type5')
					$out .= '<h3 class="title">'.esc_html__('Secs', 'designthemes-core').'</h3>';
				else
					$out .= '<h3 class="title">'.esc_html__('Seconds', 'designthemes-core').'</h3>';
			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}

	/* Horizontal Time Line */
	function dt_sc_horizontal_timeline( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'column' => '3',
			'class' => ''
		), $attrs ) );

		$entries = array();
		preg_match_all("'\[dt_sc_hr_timeline_entry (.*?)\[/dt_sc_hr_timeline_entry\]'si", $content, $matches);
		if( isset( $matches[1] ) ) {
			$entries = $matches[1];
		}

		if (!function_exists('dt_sc_arr_map')){
			function dt_sc_arr_map($value){ 
				return '[dt_sc_hr_timeline_entry '.$value.'[/dt_sc_hr_timeline_entry]'; 
			}
	    }
	    $entries = array_map("dt_sc_arr_map", $entries);
		#$entries = array_map(function($value){ return '[dt_sc_hr_timeline_entry '.$value.'[/dt_sc_hr_timeline_entry]'; }, $entries);

		$column_class = "";

		switch( $column ):

			case '2':
				$column_class = "column dt-sc-one-half";
			break;

			case '3':
				$column_class = "column dt-sc-one-third";
			break;

			case '4':
				$column_class = "column dt-sc-one-fourth";
			break;									
		endswitch;
		
		$out = "<div class='dt-sc-hr-timeline-section {$type} {$class}'>";
			$out .= '<div class="dt-sc-hr-timeline-wrapper">';

			$i = 1;

			foreach( $entries as $key => $entry ):
				$temp_class = "";
				if($i == 1) $temp_class = $column_class." first"; else $temp_class = $column_class;
				if($i == $column) $i = 1; else $i = $i + 1;

				$out .= '<div class="'.$temp_class.'">';
				$out .= do_shortcode( $entry );
				$out .= '</div>';
			endforeach;

			$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_sc_hr_timeline_entry( $attrs, $content = null ){
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'url' => '',
			'icon_type' => 'icon', #VC
			'iconclass' => '',
			'icon' => 'fa fa-info-circle', #VC
			'icon_css_class' => '', #VC
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-hr-timeline {$class}'>";
			$out .= '<div class="dt-sc-hr-timeline-content">';

				$iconspan = "";
				if( !empty( $icon_type ) ) {
					$icon = "";
					if( $icon_type == 'fontawesome' )
						$icon = $iconclass;
					if( $icon_type == 'css_class' )
						$icon = $icon_css_class;
					if( !empty( $icon ) )
						$iconspan =  "<span class='{$icon}'> </span>";			
				}

				if($class == 'bottom'):
					$out .= $iconspan;
					$out .= "<h3>{$title}</h3>";
					$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
				endif;
					
				if(!empty($url)):
					$image = wpb_getImageBySize( array( 'attach_id' => $url, 'thumb_size' => 'full' ));
					$image = $image['thumbnail'];					
					$out .= '<div class="dt-sc-hr-timeline-thumb">';
					$out .= $image;							
					$out .= '</div>';
				endif;

				if($class != 'bottom'):
					$out .= "<h3>{$title}</h3>";
					$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';
					$out .= $iconspan;
				endif;

				if(!empty($subtitle)):
					$out .= "<h4>{$subtitle}</h4>";
				endif;
				
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}	

	/* Vertical Time Line */

	/**
	 * vertical timeline
	 * @return string
	 */
	function dt_sc_vertical_timeline($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'type' => 'type1',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-timeline-section {$type} {$class}'>";
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';

		return $out;
	}

	/**
	 * vertical timeline entry
	 * @return string
	 */
	function dt_sc_vc_timeline_entry( $attrs,$content = null ){
		extract ( shortcode_atts ( array (
			'title' => '',
			'subtitle' => '',
			'icon_type' => '',
			'icon_class' => '',
			'font_icon' => '',
			'image' => '',
			'link' => '',
			'hover_text' => '',
			'class' => ''
		), $attrs ) );

		$out = "<div class='dt-sc-timeline {$class}'>";
			$out .= '<div class="column dt-sc-one-half">';
				$out .= '<div class="dt-sc-timeline-content">';

					if( $icon_type == 'fontawesome' && !empty($font_icon) )
						$out .= '<div class="dt-sc-timeline-icon-wrapper"> <span class="'.$font_icon.'"> </span> </div>';

					if( $icon_type == 'icon_class' && !empty($icon_class) )
						$out .= '<div class="dt-sc-timeline-icon-wrapper"> <span class="'.$icon_class.'"> </span> </div>';

					if($icon_type == 'image' && !empty($image)):

						//parse link by vc
						$link = ( '||' === $link ) ? '' : $link;
						$link = vc_build_link( $link );
						$a_href = $link['url'];
						$a_title = $link['title'];
						$a_target = !empty($link['target']) ? $link['target'] : '_self';

						$image = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => 'full' ));
						$image = $image['thumbnail'];

						$out .= '<div class="dt-sc-timeline-image-wrapper">';
						$out .= !empty($a_href) ? "<a href='".$a_href."' title='".$a_title."' target='".$a_target."'>".$image."</a>": $image;
								if(!empty($hover_text)):
									$out .= '<div class="dt-sc-timeline-thumb-overlay">';
										$out .= "<h5>{$hover_text}</h5>";
									$out .= '</div>';
								endif;
						$out .= '</div>';
					endif;

					$out .= '<h2><span>'.$title.'</span>';

					if($subtitle)
						$out .= '<br>'.$subtitle;
					$out .= '</h2>';

					if($content != '')
						$out .= '<p>'.DTCoreShortcodesDefination::dtShortcodeHelper ( $content ).'</p>';

				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
		
		return $out;
	}

	/**
	 * break tag
	 * @return string
	 */
	function dt_sc_br($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'br' => '1'
		), $attrs ) );

		$br = intval( $br );

		$out = "";

		for( $i = 1; $i <= $br; $i++ ) {
			$out .= '<br>';
		}

		return $out;
	}

	/**
	 * menu
	 * @return string
	 */
	static function dt_theme_sc_wp_menu() {
		echo '<ul class="menu-links">';
		$args = array(
			'depth' 		=> 0,
			'title_li' 		=> '',
			'echo' 			=> 0,
			'post_type' 	=> 'page',
			'post_status' 	=> 'publish'
		);
		$pages = wp_list_pages($args);
		if ($pages)
			echo ($pages);
		echo '</ul>';
	}

	function dt_sc_custom_menu($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class'  =>  ''
		), $attrs ) );

		$out = "";

		$args = array(
			'container' 		=> false,
			'menu_id'         	=> false,
			'menu_class'		=> 'menu-links '.$class,
			'fallback_cb'		=> 'DTCoreShortcodesDefination::dt_theme_sc_wp_menu',
			'theme_location'	=> 'shortcode-menu',
			'echo'				=> false,
			'depth' 			=> 0
		);
		$out .= wp_nav_menu( $args ); 

		return $out;
	}

	/**
	 * sociable
	 * @return string
	 */
	function dt_sc_sociable($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'socials' => 'delicious,dribbble,facebook',
			'style'  =>  '',
			'target' => '_blank',
			'class'  =>  ''
		), $attrs ) );

		# Available Socials
		/**
		 * delicious deviantart digg dribbble envelope-open
		 * facebook flickr google-plus comment instagram
		 * lastfm linkedin pinterest
		 * reddit rss skype stumbleupon
		 * tumblr twitter viadeo vimeo yahoo youtube
		 **/

		$out = $list = '';
		
		$social_opts = array();

		$socials = explode(",", $socials );

		$sociable_flds = cs_get_option( 'sociable_fields' );
		if(isset($sociable_flds)){
            foreach( $sociable_flds as $sf):
                $social_opts[$sf['sociable_fields_type']] = $sf['sociable_fields_url'];
            endforeach;
        }
		foreach( $socials as $social ){
		   if( array_key_exists( $social, $social_opts ) ) {
			   $list .= '<li><a class="fa fa-'.esc_attr( $social ).'" target="'.$target.'" href="'.esc_attr( $social_opts[$social] ).'"></a></li>';
		   }
		}

		$out = !empty( $list ) ? "<ul class='dt-sc-sociables {$style} {$class}'>".$list.'</ul>' : '';

		return $out;
	}

	/**
	 * social
	 * @return string
	 */
	function dt_sc_social($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'class' => ''
		), $attrs ) );

		$sociables = array('fa-dribbble' => 'dribble', 'fa-flickr' => 'flickr', 'fa-github' => 'github', 'fa-pinterest' => 'pinterest','fa-twitter' => 'twitter', 'fa-youtube' => 'youtube', 'fa-android' => 'android', 'fa-dropbox' => 'dropbox', 'fa-instagram' => 'instagram', 'fa-windows' => 'windows', 'fa-apple' => 'apple', 'fa-facebook' => 'facebook', 'fa-google-plus' => 'google', 'fa-linkedin' => 'linkedin', 'fa-skype' => 'skype', 'fa-tumblr' => 'tumblr', 'fa-vimeo-square' => 'vimeo', 'fa-behance' => 'behance');

		$s = $out = "";
		foreach ( $sociables as $key => $value ) {
			if(is_array($attrs) && array_key_exists($value, $attrs) && $attrs[$value] != '')
				$s .= '<li><a class="fa '.$key.'" href="'.$attrs[$value].'" title="'.ucfirst($value).'"></a></li>';
		}
		$s = ! empty ( $s ) ? "<ul class='dt-sc-team-social {$class}'>$s</ul>" : "";
		$out .= $s;

		return $out;
	}

	function dt_sc_video_manager($attrs, $content = null ){
		extract( shortcode_atts( array(
		), $attrs ) );
		
		if(empty($content))
			return '';
			
		preg_match_all( '/dt_sc_video_item([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$first = $matches[0][0][0];
		$first = str_replace("dt_sc_video_item","dt_sc_video_first_item",$first);
		
		$out = '<div class="wpb_column vc_col-sm-8 rs_col-sm-12 vc_col-md-12 vc_col-lg-8">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ('['.$first.'/]');
		$out .= '</div>';
		
		$out .= '<div class="wpb_column vc_col-sm-4 rs_col-sm-12 vc_col-md-12 vc_col-lg-4 dt-sc-video-manager-right">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		
		return $out;		
	}
	
	function dt_sc_video_item($attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' => '',
			'subtitle' => '',
			'link' => '',
			'image' => ''
		), $attrs ) );
		
		$full = wp_get_attachment_image_src( $image, 'full' );
		$full = $full[0];	
		
		$image = wp_get_attachment_image_src( $image, 'thumbnail' );
		$image = $image[0];
					
		$image = !empty($image) ? '<img src="'.esc_url($image).'" data-full="'.esc_attr($full).'"/>' : '<img src="http://place-hold.it/136x81"/>';
		
		$out = '<div class="dt-sc-video-item" data-link="'.esc_attr($link).'">';
		$out .= '	<div class="dt-sc-vitem-thumb">'.$image.'</div>';
		$out .= '	<div class="dt-sc-vitem-detail">';
		$out .= '		<h2>'.esc_html($title).'</h2>';
		$out .= '		<p>'.esc_html($subtitle).'</p>';		
		$out .= '	</div>';		
		$out .= '</div>';
		return $out;
	}

	function dt_sc_video_first_item($attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' => '',
			'subtitle' => '',
			'link' => '',
			'image' => ''
		), $attrs ) );
		
		$image = wp_get_attachment_image_src( $image, 'full' );
		$image = $image[0];
		
		$image = !empty($image) ? '<img src="'.esc_url($image).'"/>' : '<img src="http://place-hold.it/1040x500"/>';		
		
		$out = '<div class="dt-sc-video-wrapper">';
		$out .=		$image;
		$out .= '	<div class="video-overlay">';
		$out .= '		<div class="video-overlay-inner">';
		$out .= '			<a href="'.esc_url($link).'"><span class="icon icon-play"></span></a>';
		$out .= '			<h2>'.esc_html($title).'</h2>';
		$out .= '			<p>'.esc_html($subtitle).'</p>';		
		$out .= '		</div>';
		$out .= '	</div>';				
		$out .= '</div>';
		return $out;
	}

	function dt_sc_gitem_post_format( $atts ) {
		return '{{ dt_post_format:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_tag( $atts ) {
		return '{{ dt_post_tag:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_comment( $atts ) {
		return '{{ dt_post_comment:' . http_build_query( (array) $atts ) . ' }}';
	}

	function dt_sc_gitem_post_category( $atts ) {

		return '{{ dt_post_category:' . http_build_query( (array) $atts ) . ' }}';
	}
	
	/**
	 * notfound message
	 * @return string
	 */
	static function dt_sc_notfound_msg( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'title1' => '',
			'title2' => '',
			'subtitle' => '',
			'class' => ''
		), $attrs ) );

		$out = "<div class='error-box square {$class}'>";
			$out .= '<div class="error-box-inner">';
				$out .= '<h3>'.$title1.'</h3>';
				$out .= '<h2>'.$title2.'</h2>';
				$out .= '<h4>'.$subtitle.'</h4>';
			$out .= '</div>';	
		$out .= "</div>";

		return $out;
	}
	
	/**
	 * carousel wrapper
	 * @return string
	 */
	function dt_sc_ad_carousel_wrapper( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'visible' => '3',
			'scroll' => '1',
			'auto' => '',
			'animation' => 'scroll',
			'navigation' => 'true',
			'pager' => 'false',
			'vertical' => 'false',
			'class' => ''
		), $atts));

		$out = $nav = $pagger = "";

		$out .= '<div class="dt-sc-carousel-wrapper dt_carousel" data-visible="'.$visible.'" data-scroll="'.$scroll.'" data-auto="'.$auto.'" data-animation="'.$animation.'" data-vertical="'.$vertical.'">';
			$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';

		if($navigation == 'true') {
			$nav = '<div class="dt-carousel-navigation">'
							.'<div class="carousel-prv-arrow"><a class="prev-arrow" href="#"><span class="fa fa-angle-left"> </span></a></div>'
							.'<div class="carousel-next-arrow"><a class="next-arrow" href="#"><span class="fa fa-angle-right"> </span></a></div>'
						.'</div>';
		}

		if($pager == 'true') {
			$pagger = '<div class="dt-carousel-pagination"></div>';
		}

		return '<div class="carousel_items '.$class.'">'
					.$out
					.$nav
					.$pagger
				.'</div>';
	}

	function dt_sc_testimonial_carousel_special($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'items_to_show' => 5,
			'enable_dots' => '',
			'class' => ''
		), $attrs ) );

		$pattern = get_shortcode_regex();
		preg_match_all( '/'. $pattern .'/s', $content, $matches );

		$authors = array();
		foreach( $matches[3] as $a ) {
			array_push( $authors , shortcode_parse_atts($a) );
		}

		$out = '<div class="dt-sc-special-testimonial '.$class.'">';

	        $out .= '<div class="dt-sc-special-testimonial-details-holder testimonial-details-for">';
	        		foreach( $matches[5] as $content ){
	        			$out .= '<div class="dt-sc-testimonial-description">'.$content.'</div>';
	        		} 
	  		$out .= '</div>';
	  		
	  		$dots_attr = '';
	  		if($enable_dots == 'true') {
	  			$dots_attr = 'data-dots="true"';
	  		}

	  		$items_to_show_attr = 'data-itemstoshow="'.$items_to_show.'"';

			$out .= '<div class="dt-sc-special-testimonial-images-holder testimonial-details-nav" '.$dots_attr.' '.$items_to_show_attr.'>';

					foreach( $matches[3] as $attributes ){

						$a = shortcode_parse_atts($attributes);

						$name = isset( $a['name'] ) ? $a['name'] : '';
						$role = isset( $a['role'] ) ? '<small>'.$a['role'].'</small>' : '';

						$image = '';
						if( isset($a['image']) ):
							$image = wpb_getImageBySize( array( 'attach_id' => $a['image'], 'thumb_size' => 'full' ));
							$image = $image['thumbnail'];
						endif;	

						if( isset($a['image']) && isset($name) ):
							$out .= '<div class="dt-sc-testimonial-image">';
								$out .= $image;
								$out .= '<div class="dt-sc-testimonial-author">';
									$out .=	'<cite>'.$name.$role.'</cite>';
									if(isset($a['ratings']) && !empty($a['ratings'])) {
										$out .= '<span class="ratings '.$a['ratings'].'"></span>';
									}
								$out .= '</div>';
							$out .= '</div>';
						endif;
					}

			$out .= '</div>';
		$out .= '</div>';

		return $out;
	}
	
	/**
	 * responsive google map
	 * @return string
	 */
	function dt_sc_google_map( $attrs, $content = null ) {

		extract ( shortcode_atts ( array (
			'map_type' => '',
			'map_style' => '',
			'custom_map_style' => '',
			'map_width' => '',
			'map_height' => '',
			'map_zoom_level' => '',
			'map_street_view_control' => '',
			'map_type_control' => '',
			'map_zoom_control' => '',
			'map_scale_control' => '',
			'map_scroll_wheel' => '',
			'map_draggable' => '',
			'map_markers' => '',
		), $attrs ) );
		
		if( isset( $_COOKIE['dtPrivacyGoogleMapsDisabled'] ) ) {
			$out = '<div class="responsive-map">';
				$out .= '<div class="dt-sc-warning-box">'.esc_html__('Maps were disabled by the visitor on this site.', 'designthemes-core').'</div>';
			$out .= '</div>';
			
			return $out;
		}

		$api_key = cs_get_option( 'google-map-key' );

		$api_url = 'http://maps.googleapis.com';
		if( is_ssl() ) {
			$api_url = 'https://maps-api-ssl.google.com';
		}

		$api_url .= '/maps/api/js';
		$api_url = add_query_arg( array( 'key' => $api_key ) , $api_url );

		wp_enqueue_script( 'google-map', $api_url, array('jquery'), null, false );
		wp_enqueue_script( 'jquery.gmap',  plugin_dir_url ( __FILE__ ) . 'js/jquery.gmap.js', array('jquery','google-map'), null, false );

		$mapid = rand();
		$lat = 'null'; $long = 'null';

		// If width or height were specified in the shortcode, extract them too
    	$dimensions = '';
    	if(isset($attrs['map_height']))
        	$dimensions .= 'height:' . $attrs['map_height'] . ';';
    	if(isset($attrs['map_width']))
	        $dimensions .= 'width:' . $attrs['map_width'] . ';';

	    $map_street_view_control = ( $map_street_view_control == 'enable' ) ? 'true' : 'false';
	    $map_type_control = ( $map_type_control == 'enable' ) ? 'true' : 'false';
	    $map_zoom_control = ( $map_zoom_control == 'enable' ) ? 'true' : 'false';
	    $map_scale_control = ( $map_scale_control == 'enable' ) ? 'true' : 'false';
	    $map_scroll_wheel = ( $map_scroll_wheel == 'enable' ) ? 'true' : 'false';
	    $map_draggable = ( $map_draggable == 'enable' ) ? 'true' : 'false';

	    // Map Style
	    $style = $map_style;
	    if( $style == 'custom' ) {

	    	if( !empty( $custom_map_style ) ) {
	    		$style = '[{ "stylers": [{"hue": "' . $custom_map_style . '" } ] } ]';
	    	} else {
	    		$style = '';
	    	}
	    } else {
		    switch ($style) {
		        case '1':
		            $style = '[{"stylers":[{"featureType":"all"}]}]';
		            break;
		        case '2':
		            $style = '[{"stylers":[{"featureType":"all"},{"saturation":-100},{"gamma":0.50},{"lightness":30}]}]';
		            break;
		        case '3':
		            $style = '[{"stylers":[{"invert_lightness":true},{"visibility":"on"}]}]';
		            break;
		        case '4':
		            $style = '[{"stylers":[{"invert_lightness":true},{"hue":"#0000b0"},{"saturation":-30}]}]';
		            break;
		        case '5':
		            $style = '[{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]';
		            break;
		        case '6':
		            $style = '[{"stylers":[{"lightness":10},{"gamma":1.2},{"saturation":-20},{"visibility":"on"},{"weight":0.1},{"hue":"#00ccff"}]}]';
		            break;
		        case '7':
		            $style = '[{"stylers":[{"saturation":-20},{"visibility":"on"},{"hue":"#00ccff"},{"invert_lightness":true},{"lightness":5}]}]';
		            break;
		        case '8':
		            $style = '[{"stylers":[{"saturation":-20},{"visibility":"on"},{"lightness":5},{"hue":"#ff004c"},{"gamma":1.45}]}]';
		            break;
		        case '9':
		            $style = '[{"featureType":"water","stylers":[{"color":"#021019"}]},{"featureType":"landscape","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"transit","stylers":[{"color":"#146474"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]}]';
		            break;
		        case '10':
		            $style = '[{"stylers":[{"visibility":"on"},{"saturation":-30},{"hue":"#ccff00"},{"lightness":-20},{"gamma":1},{"weight":0.1},{"invert_lightness":true}]}]';
		            break;
		        case '11':
		            $style = '[{"stylers":[{"hue":"#00ccff"},{"saturation":5},{"lightness":-20}]}]';
		            break;
		        case '12':
		            $style = '[{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"hue":149},{"saturation":-78},{"lightness":0}]},{"featureType":"road.highway","stylers":[{"hue":-31},{"saturation":-40},{"lightness":2.8}]},{"featureType":"poi","elementType":"label","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"hue":163},{"saturation":-26},{"lightness":-1.1}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"hue":3},{"saturation":-24.24},{"lightness":-38.57}]}]';
		            break;
		        case '13':
		            $style = '[{"stylers":[{"gamma":1.58},{"saturation":30},{"weight":0.1}]}]';
		            break;
		        case '14':
		            $style = '[{"stylers":[{"invert_lightness":true},{"weight":0.1},{"hue":"#00ffa2"},{"visibility":"on"},{"saturation":-120},{"lightness":10},{"gamma":1.2}]}]';
		            break;
		        case '15':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#00ccff"},{"weight":0.1},{"saturation":80}]},{"featureType":"road.local","elementType": "geometry","stylers":[{"visibility":"on"},{"lightness":30}]},{"featureType":"transit","stylers":[{"hue":"#0077ff"},{"lightness":100},{"color":"#141480"},{"visibility":"simplified"},{ "saturation":-30},{"gamma":0.96},{"invert_lightness":true}]},{"featureType":"administrative.neighborhood","stylers":[{"invert_lightness":true},{"visibility":"on"}]},{"featureType": "road.highway.controlled_access","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","stylers":[{"weight":0.1}]},{"featureType":"road.local","stylers":[{ "visibility":"off"}]},{"featureType":"administrative","stylers":[{"invert_lightness":true},{"hue":"#00ff66"},{"saturation":30},{"lightness":-20},{"gamma":1.91}]},{"stylers":[{ "weight":0.1}]}]';
		            break;
		        case '16':
		            $style = '[{"featureType":"road","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"visibility":"off"}]},{"featureType":"administrative","stylers":[{ "weight":0.9}]}]';
		            break;
		        case '17':
		            $style = '[{"stylers":[{"hue":"#ffd500"},{"lightness":-30}]}]';
		            break;
		        case '18':
		            $style = '[{"featureType":"road","stylers":[{"hue":"#e6ff00"}]},{"featureType":"road","stylers":[{"visibility":"on" },{"weight":0.1},{"lightness":10},{"gamma":0.96}]},{ "featureType":"administrative","elementType":"labels.icon","stylers":[{"visibility":"simplified"},{"weight":0.1}]},{"stylers":[{"hue":"#0019ff"},{"lightness":10},{"gamma":0.96}]},{ "stylers":[{"gamma":0.96},{"weight":0.1}]},{"featureType":"administrative","stylers":[{"color":"#328080"}]}]';
		            break;
		        case '19':
		            $style = '[{"featureType":"road","stylers":[{"lightness":-10},{"weight":0.1},{"hue":"#008000"}]},{"stylers":[{"saturation":30},{"lightness":-10}]}]';
		            break;
		        case '20':
		            $style = '[{"stylers":[{"visibility":"on"},{"weight":0.9},{"hue":"#005eff"},{"lightness":-10},{"gamma":1.2}]}]';
		            break;
		        case '21':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aee2e0"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#abce83"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#769E72"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#7B8758"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#EBF4A4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#8dab68"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5B5B3F"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ABCE83"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#A4C67D"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#9BBF72"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#EBF4A4"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#87ae79"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#7f2200"},{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":4.1}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#495421"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]}]';
		            break;
		        case '22':
		            $style = '[{"featureType":"administrative","stylers":[{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"on"}]},{"featureType":"road","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"visibility":"on"}]},{"featureType":"transit","stylers":[{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-77}]},{"featureType":"road"}]';
		            break;
		        case '23':
		            $style = '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#87bcba"},{"saturation":-37},{"lightness":-17},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"hue":"#4f6b46"},{"saturation":-23},{"lightness":-61},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":-55},{"lightness":13},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"hue":"#ffa200"},{"saturation":100},{"lightness":-22},{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":-55},{"lightness":-31},{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#f69d94"},{"saturation":84},{"lightness":9},{"visibility":"on"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":45},{"lightness":36},{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":45},{"lightness":36},{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":45},{"lightness":36},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":35},{"lightness":-19},{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"hue":"#d38bc8"},{"saturation":-6},{"lightness":-17},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#b2ba70"},{"saturation":-19},{"lightness":-25},{"visibility":"on"}]}]';
		            break;
		        case '24':
		            $style = '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"on"}]}]';
		            break;
		        case '25':
		            $style = '[{"stylers":[{"saturation":-100},{"gamma":1}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]}]';
		            break;
		        case '26':
		            $style = '[{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]}]';
		            break;
		        case '27':
		            $style = '[{"featureType":"water","elementType":"all","stylers":[{"hue":"#1CB2BD"},{"saturation":53},{"lightness":-44},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"hue":"#1CB2BD"},{"saturation":40}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#BBDC00"},{"saturation":80},{"lightness":-20},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"}]}]';
		            break;
		        case '28':
		            $style = '[{"featureType":"administrative","stylers":[{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-17},{"gamma":0.36}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}]';
		            break;
		        case '29':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]';
		            break;
		        case '30':
		            $style = '[{"featureType":"landscape","stylers":[{"hue":"#00dd00"}]},{"featureType":"road","stylers":[{"hue":"#dd0000"}]},{"featureType":"water","stylers":[{"hue":"#000040"}]},{"featureType":"poi.park","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","stylers":[{"hue":"#ffff00"}]},{"featureType":"road.local","stylers":[{"visibility":"off"}]}]';
		            break;
		        case '31':
		            $style = '[{"featureType":"landscape","stylers":[{"hue":"#FFE100"},{"saturation":34.48275862068968},{"lightness":-1.490196078431353},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FF009A"},{"saturation":-2.970297029703005},{"lightness":-17.815686274509815},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFE100"},{"saturation":8.600000000000009},{"lightness":-4.400000000000006},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00C3FF"},{"saturation":29.31034482758622},{"lightness":-38.980392156862735},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF19"},{"saturation":-30.526315789473685},{"lightness":-22.509803921568633},{"gamma":1}]}]';
		            break;
		        case '32':
		            $style = '[{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}]';
		            break;
		        case '33':
		            $style = '[{"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}]';
		            break;
		        case '34':
		            $style = '[{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}]';
		            break;
		        case '35':
		            $style = '[{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]';
		            break;
		        case '36':
		            $style = '[{"featureType":"water","stylers":[{"color":"#19a0d8"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"weight":6}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#e85113"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-40}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#efe9e4"},{"lightness":-20}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"road.highway","elementType":"labels.icon"},{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","stylers":[{"lightness":20},{"color":"#efe9e4"}]},{"featureType":"landscape.man_made","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"lightness":-100}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"hue":"#11ff00"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"lightness":100}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"hue":"#4cff00"},{"saturation":58}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#f0e4d3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#efe9e4"},{"lightness":-10}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]}]';
		            break;
		        case '37':
		            $style = '[{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]';
		            break;
		        case '38':
		            $style = '[{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#b5cbe4"}]},{"featureType":"landscape","stylers":[{"color":"#efefef"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#83a5b0"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#bdcdd3"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#e3eed3"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]';
		            break;
		        case '39':
		            $style = '[{"stylers":[{"hue":"#dd0d0d"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]}]';
		            break;
		        case '40':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#ffdfa6"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#b52127"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#c5531b"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#74001b"},{"lightness":-10}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#da3c3c"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#74001b"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#da3c3c"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#990c19"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#74001b"},{"lightness":-8}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#6a0d10"},{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#ffdfa6"},{"weight":0.4}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]}]';
		            break;
		        case '41':
		            $style = '[{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},{"gamma":0.72}]},{"featureType":"road","elementType":"labels.icon"},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water","stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park","stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},{"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}]';
		            break;
		        case '42':
		            $style = '[{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#cf3737"},{"saturation":"100"},{"lightness":"71"},{"gamma":"7.79"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"invert_lightness":true}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#413f3e"},{"lightness":17},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#070707"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"invert_lightness":true}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"invert_lightness":true}]},{"featureType":"road.highway.controlled_access","elementType":"labels.text","stylers":[{"invert_lightness":true}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"invert_lightness":true},{"gamma":"2.93"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"weight":"0.01"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#dba714"},{"lightness":"-12"},{"visibility":"on"},{"saturation":"-92"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"invert_lightness":true}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"weight":"1.70"},{"gamma":"1.87"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19},{"visibility":"on"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"on"},{"invert_lightness":true}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"invert_lightness":true},{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"gamma":"0.00"},{"lightness":"67"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#dba714"},{"lightness":17}]}]';
		            break;
		        case '43':
		            $style = '[{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7dcdcd"}]}]';
		            break;
		        case '44':
		            $style = '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}]';
		            break;
		        case '45':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#333739"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2ecc71"}]},{"featureType":"poi","stylers":[{"color":"#2ecc71"},{"lightness":-7}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-28}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"visibility":"on"},{"lightness":-15}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-18}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-34}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#333739"},{"weight":0.8}]},{"featureType":"poi.park","stylers":[{"color":"#2ecc71"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#333739"},{"weight":0.3},{"lightness":10}]}]';
		            break;
		        case '46':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#165c64"},{"saturation":34},{"lightness":-69},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#b7caaa"},{"saturation":-14},{"lightness":-18},{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"hue":"#cbdac1"},{"saturation":-6},{"lightness":-9},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#8d9b83"},{"saturation":-89},{"lightness":-12},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#d4dad0"},{"saturation":-88},{"lightness":54},{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#bdc5b6"},{"saturation":-89},{"lightness":-3},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#bdc5b6"},{"saturation":-89},{"lightness":-26},{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"hue":"#c17118"},{"saturation":61},{"lightness":-45},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#8ba975"},{"saturation":-46},{"lightness":-28},{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"hue":"#a43218"},{"saturation":74},{"lightness":-51},{"visibility":"simplified"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":0},{"lightness":100},{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#3a3935"},{"saturation":5},{"lightness":-57},{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"hue":"#cba923"},{"saturation":50},{"lightness":-46},{"visibility":"on"}]}]';
		            break;
		        case '47':
		            $style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#004358"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#1f8a70"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#1f8a70"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#fd7400"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-20}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-17}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":0.9}]},{"elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"lightness":-10}]},{},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#1f8a70"},{"weight":0.7}]}]';
		            break;
		        case '48':
		            $style = '[{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#abbaa4"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]},{"featureType":"road.highway","stylers":[{"color":"#ad9b8d"}]}]';
		            break;
		        case '49':
		            $style = '[{"stylers":[{"hue":"#ff8800"},{"gamma":0.4}]}]';
		            break;
		        case '50':
		            $style = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#425a68"},{"visibility":"on"}]}]';
		            break;
		        default:
		            $style = '[{"stylers":[{"featureType":"all"}]}]';
		            break;
		    }
		}

		// Markers
		$markers = '[]';
		if( !empty( $map_markers ) ) {

			$map_markers = (array) vc_param_group_parse_atts( $map_markers );
			$count = count( $map_markers );

			$markers  = '[';

			foreach( $map_markers as $key => $value ) {

				$key++;

				if( !empty( $value['marker_latitude'] ) && ( !empty( $value['marker_longitude'] ) ) ) {

					$markers .= '{';

						$markers .= 'flat: true,';
						$markers .= 'key:"'.$key.'",';
						$markers .= 'latitude:"'.$value['marker_latitude'].'",'; 
						$markers .= 'longitude:"'.$value['marker_longitude'].'",';

						if( array_key_exists( 'marker_content', $value )) {
							$content = rawurldecode( base64_decode( strip_tags( $value['marker_content'] ) ) );
							if( !empty( $content ) ) {
								$popup = ( $value['popup'] == 'hidden' ) ? 'false' : 'true';
								$markers .= 'popup:'.$popup.',';
								$markers .= 'html:"'.$content.'",';
							}
						}

						if( $value['marker_icon'] == 'custom' &&  isset( $value['custom_marker_icon'] ) ) {
							$icon = wp_get_attachment_image_src( $value['custom_marker_icon'], 'full' );
							$icon = $icon[0];
							$markers .= 'icon: { image:"'.$icon.'" }';
						} else{
							$icon = plugins_url('designthemes-core-features').'/shortcodes/images/markers/'.$value['marker_icon'];
							$markers .= 'icon: { image:"'.$icon.'" },';
						}

					$markers .= '}';
				}

				$markers .= ( $count > $key ) ? ',' : '';
			}
			$markers .= ']';			
		}

		ob_start();

		echo '<div id="responsive_map-'.$mapid.'" class="responsive-map" style="'.$dimensions.'">';
		echo '</div>';?>
		<script type="text/javascript">
			jQuery(document).ready(function($){

				var mapdiv = jQuery("#responsive_map-<?php echo $mapid; ?>");
				mapdiv.gMap({
					maptype: google.maps.MapTypeId.<?php echo strtoupper( $attrs['map_type'] ); ?>,
					zoom: <?php echo $map_zoom_level; ?>,
					latitude: <?php echo $lat; ?>,
					longitude: <?php echo $long; ?>,
					streetViewControl:<?php echo $map_street_view_control; ?>,
					mapTypeControl:<?php echo $map_type_control; ?>,
					zoomControl:<?php echo $map_zoom_control; ?>,
					scaleControl:<?php echo $map_scale_control; ?>,
					scrollwheel:<?php echo $map_scroll_wheel;?>,
					draggable:<?php echo $map_draggable;?>,
					styles:<?php echo $style;?>,
					markers: <?php echo $markers; ?>,
					panControl: true,
					overviewMapControl:true,
				});
			});
		</script><?php	
		return ob_get_clean();
	}

	/**
	 * view count
	 * @return string
	 */
	function dt_sc_post_view_count($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'post_id' => ''
		), $attrs ) );

		$post_meta = get_post_meta ( $post_id, '_dt_post_settings', TRUE );
		$post_meta = is_array ( $post_meta ) ? $post_meta : array ();

		$v = array_key_exists("view_count", $post_meta) && !empty( $post_meta['view_count'] ) ?  $post_meta['view_count'] : 0;
		$v = $v + 1;
		$post_meta['view_count'] = $v;

		update_post_meta( $post_id, '_dt_post_settings', $post_meta );

		return $v;
	}

	/**
	 * like count
	 * @return string
	 */
	function dt_sc_post_like_count($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'post_id' => ''
		), $attrs ) );

		$post_meta = get_post_meta ( $post_id, '_dt_post_settings', TRUE );
		$post_meta = is_array ( $post_meta ) ? $post_meta : array ();

		$v = array_key_exists("like_count",$post_meta) && !empty( $post_meta['like_count'] ) ?  $post_meta['like_count'] : '0';

		return $v;
	}

	/**
	 * post social share
	 * @return string
	 */
	function dt_sc_post_social_share($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'post_id' => ''
		), $attrs ) );

		$out = '<div class="share">';
			$out .= '<span>'.esc_html__('Share', 'designthemes-core').': </span>';
			$link = get_permalink( $post_id );
			$link = rawurlencode( $link );
  
			$title = get_the_title( $post_id );
			$title = urlencode($title);

			$out .= '<ul class="dt-share-list">';
				$out .= '<li><a href="http://www.facebook.com/sharer.php?u='.$link.'&amp;t='.$title.'" class="fa fa-facebook" target="_blank"></a></li>';
				$out .= '<li><a href="http://twitter.com/share?text='.$title.'&amp;url='.$link.'" class="fa fa-twitter" target="_blank"></a></li>';
				$out .= '<li><a href="http://plus.google.com/share?url='.$link.'" class="fa fa-google-plus" target="_blank"></a></li>';
				$out .= '<li><a href="http://pinterest.com/pin/create/button/?url='.$link.'&media='.get_the_post_thumbnail_url($post_id, 'full').'" class="fa fa-pinterest" target="_blank"></a></li>';
			$out .= '</ul>';
		$out .= '</div>';

		return $out;
	}
	
	/**
	 * privacy policy link
	 * @return link
	 */
	function dt_sc_privacy_policy_link( $attrs = array() , $content = "") {	

		$page_id = get_option('wp_page_for_privacy_policy');
		$url	 = get_permalink($page_id);
		$content = !empty($content) ?  $content : get_the_title($page_id);
		$link	 = "<a href='{$url}'>{$content}</a>";

		return $link;
	}

	function dt_sc_privacy_disable_google_tracking( $attrs = array() , $content = "") {	
		$content = !empty($content) ?  $content : __('Click to enable/disable google analytics tracking.', 'designthemes-core');
		$cookie  = "dtPrivacyGoogleTrackingDisabled";
		
		$checked = ' checked="checked"';
		if( isset( $_COOKIE[$cookie] ) )
			$checked = '';

		$out = '<div class="dt-toggle-switch">';
			$out .= '<label>';
				$out .= '<input type="checkbox" '.$checked.' id="'.$cookie.'" name="'.$cookie.'" class="'.$cookie.'">';
				$out .= '<span>'.$content.'</span>';
			$out .= '</label>';
		$out .= '</div>';

		return $out;
	}

	function dt_sc_privacy_disable_google_webfonts( $attrs = array() , $content = "") {
		$content = !empty($content) ?  $content : __('Click to enable/disable google webfonts.', 'designthemes-core');
		$cookie  = "dtPrivacyGoogleWebfontsDisabled";

		$checked = ' checked="checked"';
		if( isset( $_COOKIE[$cookie] ) )
			$checked = '';

		$out = '<div class="dt-toggle-switch">';
			$out .= '<label>';
				$out .= '<input type="checkbox" '.$checked.' id="'.$cookie.'" name="'.$cookie.'" class="'.$cookie.'">';
				$out .= '<span>'.$content.'</span>';
			$out .= '</label>';
		$out .= '</div>';

		return $out;
	}

	function dt_sc_privacy_disable_google_maps( $attrs = array() , $content = "") {	
		$content = !empty($content) ?  $content : __('Click to enable/disable google maps.', 'designthemes-core');
		$cookie  = "dtPrivacyGoogleMapsDisabled";

		$checked = ' checked="checked"';
		if( isset( $_COOKIE[$cookie] ) )
			$checked = '';

		$out = '<div class="dt-toggle-switch">';
			$out .= '<label>';
				$out .= '<input type="checkbox" '.$checked.' id="'.$cookie.'" name="'.$cookie.'" class="'.$cookie.'">';
				$out .= '<span>'.$content.'</span>';
			$out .= '</label>';
		$out .= '</div>';

		return $out;
	}

	function dt_sc_privacy_disable_video_embeds( $attrs = array() , $content = "") {	
		$content = !empty($content) ?  $content : __('Click to enable/disable video embeds.', 'designthemes-core');
		$cookie  = "dtPrivacyVideoEmbedsDisabled";

		$checked = ' checked="checked"';
		if( isset( $_COOKIE[$cookie] ) )
			$checked = '';

		$out = '<div class="dt-toggle-switch">';
			$out .= '<label>';
				$out .= '<input type="checkbox" '.$checked.' id="'.$cookie.'" name="'.$cookie.'" class="'.$cookie.'">';
				$out .= '<span>'.$content.'</span>';
			$out .= '</label>';
		$out .= '</div>';

		return $out;
	}
}
new DTCoreShortcodesDefination();?>