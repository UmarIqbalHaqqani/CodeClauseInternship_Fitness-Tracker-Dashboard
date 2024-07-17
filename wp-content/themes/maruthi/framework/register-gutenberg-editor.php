<?php
/**
 * Gutenberg Editor CSS
 */

if ( ! class_exists( 'Gutenberg_Editor_CSS' ) ) :

	/**
	 * Admin Helper
	 */
	class Gutenberg_Editor_CSS {

		function __construct() {

			add_action( 'current_screen', array( $this,  'maruthi_current_screen_hook' ) );

			if ( class_exists( 'Classic_Editor' ) ) {
				add_filter( 'tiny_mce_before_init', array( $this, 'maruthi_editor_dynamic_styles' ) );
			}
			
			add_action( 'enqueue_block_editor_assets', array( $this, 'maruthi_backend_editor_styles' ) );

		}

		public function maruthi_current_screen_hook( $current_screen ) {

			if ( 'post' == $current_screen->base ) {

				$urls = MARUTHI_Kirki::enqueue_fonts_url();
				add_editor_style( $urls );

				add_editor_style( 'css/editor-style.css' );
	
			}
	
		}

		public function maruthi_custom_font() {
			$styles = '';

			$fonts = cs_get_option('custom_font_fields');
			if( !empty ( $fonts ) && count( $fonts ) > 0 ){
				foreach( $fonts as $font ):
					$styles .= '@font-face {';
						$styles .= "font-family: '{$font['custom_font_name']}';";
						$styles .= "src: url('{$font['custom_font_woof']}') format('woff'),";
							$styles .= "url('{$font['custom_font_woof2']}') format('woff2');";
						$styles .= 'font-weight: normal;';
						$styles .= 'font-style: normal;';
					$styles .= '}';
				endforeach;
			}

			return $styles;
		}
	
		public function maruthi_editor_dynamic_styles( $mceInit ) {
	
			$styles = '';

			$styles .= $this->maruthi_custom_font();			
			$styles .= $this->maruthi_backend_classic_editor_styles();
	
			if ( isset( $mceInit['content_style'] ) ) {
				$mceInit['content_style'] .= ' ' . $styles . ' ';
			} else {
				$mceInit['content_style'] = $styles . ' ';
			}
	
			return $mceInit;
	
		}
	
		public function maruthi_backend_classic_editor_styles() {
	
			$styles = '';

			$styles .= 'body#tinymce.wp-editor.content pre { font-family:monospace; }';
	
			//Body tag typography from customizer
			$status_of_body_content_typo = get_theme_mod( 'customize-body-content-typo', maruthi_defaults('customize-body-content-typo') );
	
			if( $status_of_body_content_typo == '1' ) {
	
				$font = get_theme_mod('body-content-typo', maruthi_defaults('body-content-typo'));
	
				$font_family    = isset($font['font-family']) ? $font['font-family'] : '';
				$font_size    	= isset($font['font-size']) ? $font['font-size'] : '';
	
				$font_weight  	= isset($font['variant']) ? $font['variant'] : '';
				$font_weight  	= ($font_weight == 'regular') ? '400' : $font_weight;
	
				$line_height    = isset($font['line-height']) ? $font['line-height'] : '';
				$letter_spacing = isset($font['letter-spacing']) ? $font['letter-spacing'] : '';
				$font_color    	= isset($font['color']) ? $font['color'] : '';
				$text_transform = isset($font['text-transform']) ? $font['text-transform'] : '';
	
				$styles .= 'body#tinymce.wp-editor.content > * {';
					if (!empty($font_family)) 	{	$styles .= "font-family:{$font_family}; ";		}
					if (!empty($font_size)) 	{ 	$styles .= "font-size:{$font_size}; "; 			}
					if (!empty($font_weight)) 	{	$styles .= "font-weight:{$font_weight}; ";		}
					if (!empty($line_height)) 	{ 	$styles .= "line-height:{$line_height}; "; 		}
					if (!empty($letter_spacing)){ 	$styles .= "letter-spacing:{$letter_spacing}; "; }	
					if (!empty($font_color)) 	{	$styles .= "color:{$font_color};";				}
					if (!empty($text_transform)){	$styles .= "text-transform:{$text_transform}; ";	}
				$styles .= "}";
	
			}
	
			//Body tag bg from customizer
			$body_bg_color = get_theme_mod('body-bg-color', maruthi_defaults('body-bg-color'));
			$body_content_color = get_theme_mod('body-content-color', maruthi_defaults('body-content-color'));
			$body_a_color = get_theme_mod('body-a-color', maruthi_defaults('body-a-color'));
			$body_a_hover_color = get_theme_mod('body-a-hover-color', maruthi_defaults('body-a-hover-color'));
			
			if (!empty($body_bg_color) || !empty($body_content_color)) {
				$styles .= 'body#tinymce.wp-editor.content {';
					if (!empty($body_bg_color))			{	$styles .= "background-color:{$body_bg_color}; ";	}
					if (!empty($body_content_color)) 	{	$styles .= "color:{$body_content_color}; ";	}
				$styles .= '}';
			}
			
			if (!empty($body_content_color)) {	
				$styles .= 'body#tinymce.wp-editor.content pre {';
					$styles .= "color:{$body_content_color}; ";
				$styles .= '}';
			}
	
			if (!empty($body_a_color)) {
				$styles .= 'body#tinymce.wp-editor.content a {';
					$styles .= "color:{$body_a_color}; ";
				$styles .= '}';
			}
	
			if (!empty($body_a_hover_color)) {
				$styles .= 'body#tinymce.wp-editor.content a:focus, body#tinymce.wp-editor.content a:hover {';
					$styles .= "color:{$body_a_hover_color}; ";
				$styles .= '}';
			}
	
			// h1 to h6 tag typography from customizer
			for ($i = 1; $i <= 6; $i++) :
				$status_of_h_typo = get_theme_mod( 'customize-body-h'.$i.'-typo', maruthi_defaults('customize-body-h'.$i.'-typo') );
				if($status_of_h_typo == 1){				
					$font = get_theme_mod('h'.$i.'',maruthi_defaults('h'.$i.''));
					$font_family    = isset($font['font-family']) ? $font['font-family'] : '';
					$font_size    	= isset($font['font-size']) ? $font['font-size'] : '';
	
					$font_weight  	= isset($font['variant']) ? $font['variant'] : '';
					$font_weight  	= ($font_weight == 'regular') ? '400' : $font_weight;
	
					$line_height    = isset($font['line-height']) ? $font['line-height'] : '';
					$letter_spacing = isset($font['letter-spacing']) ? $font['letter-spacing'] : '';
					$font_color    	= isset($font['color']) ? $font['color'] : '';
					$text_align    	= isset($font['text-align']) ? $font['text-align'] : '';
					$text_transform = isset($font['text-transform']) ? $font['text-transform'] : '';
	
					$styles .= 'body#tinymce.wp-editor.content h'.$i.' {';
						if (!empty($font_family)) 	{	$styles .= "font-family:{$font_family}; ";		}
						if (!empty($font_size)) 	{ 	$styles .= "font-size:{$font_size}; "; 			}
						if (!empty($font_weight)) 	{	$styles .= "font-weight:{$font_weight}; ";		}
						if (!empty($line_height)) 	{ 	$styles .= "line-height:{$line_height}; "; 		}
						else { $styles .= "line-height:normal;"; }
						if (!empty($letter_spacing)){ 	$styles .= "letter-spacing:{$letter_spacing}; "; }	
						if (!empty($font_color)) 	{	$styles .= "color:{$font_color}; ";				}
						if (!empty($text_align)) 	{	$styles .= "text-align:{$text_align}; ";			}
						if (!empty($text_transform)){	$styles .= "text-transform:{$text_transform}; ";	}
					$styles .= "}";
				}
			endfor;
	
			return $styles;
	
		}

		public function maruthi_backend_editor_styles() {

			$styles = '';

			$styles .= $this->maruthi_custom_font();
			
			$styles .= '.editor-styles-wrapper pre { font-family:monospace; }';

            $status_of_body_content_typo = get_theme_mod( 'customize-body-content-typo', maruthi_defaults('customize-body-content-typo') );

            if( $status_of_body_content_typo == '1' ) {

				$font = get_theme_mod('body-content-typo', maruthi_defaults('body-content-typo'));
				$line_height = isset($font['line-height']) ? $font['line-height'] : '';

				$styles .= '.wp-block-pullquote blockquote, .wp-block-pullquote blockquote p {';
					if (!empty($line_height)) { 
						$styles .= "line-height:{$line_height}; "; 
					}
				$styles .= "}";

			}

			wp_enqueue_style( 'maruthi-gutenberg', get_theme_file_uri('/css/admin-gutenberg.css'), false, MARUTHI_THEME_VERSION, 'all' );
			wp_add_inline_style( 'maruthi-gutenberg', $styles  );

		}

	}

	new Gutenberg_Editor_CSS();

endif;