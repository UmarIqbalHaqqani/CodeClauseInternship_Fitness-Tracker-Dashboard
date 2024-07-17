<?php
//Class definition: Privacy Class
if( !class_exists( 'DTCorePrivacy' ) ) {

	class DTCorePrivacy {

		function __construct() {

			add_action ( 'init', array ( $this, 'dt_init' ) );

			add_filter ( 'cs_framework_options', array ( $this, 'dt_privacy_cs_framework_options' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'dt_privacy_footer_script' ) , 1000 );

			add_action( 'init', array( $this, 'dt_privacy_disable_google_font' ) , 1000 );

			add_action( 'wp_footer', array( $this, 'dt_privacy_print_tracking_code' ), 100 );
		}

		function dt_init() {
			// hook privacy message into commentform
			if( cs_get_option('privacy-commentform') == "true" ) {
				add_filter( 'preprocess_comment', array( $this, 'dt_privacy_verify_comment_checkbox' )  );
			}

			// hook privacy message into mailchimpform
			if( cs_get_option('privacy-subscribeform') == "true" ) {
				add_filter( 'dt_sc_mailchimp_form_elements', array( $this, 'dt_privacy_mailchimp_checkbox' ) , 10 , 2 );
			}

			// hook privacy message into login/registration forms
			if( cs_get_option('privacy-loginform') == "true" ) {
				add_action( 'login_form', array( $this, 'dt_privacy_login_extra' ) , 10 , 2 );
				add_action( 'woocommerce_login_form', array( $this, 'dt_privacy_login_extra' ) , 10 , 2 );
				add_filter( 'wp_authenticate_user', array( $this,'dt_privacy_authenticate_user_acc' ), 99999, 2);
			}
		}

		function dt_privacy_cs_framework_options( $options ) {

			$options['privacy'] = array(
			  'name'        => 'privacy_options',
			  'title'       => esc_html__('Privacy and Cookies', 'designthemes-core'),
			  'icon'        => 'fa fa-low-vision',

			  'fields'      => array(

				  array(
					'type'    => 'subheading',
					'content' => esc_html__( "Privacy Policy", 'designthemes-core' ),
				  ),
			
				  array(
					'type'    => 'notice',
					'class'   => 'warning',
					'content' => esc_html__('In case you deal with any EU customers/visitors these options allow you to make your site GDPR compliant.', 'designthemes-core')
				  ),
			
				  array(
					'id'      => 'privacy-commentform',
					'type'    => 'checkbox',
					'title'   => esc_html__('Append a privacy policy message to your comment form?', 'designthemes-core'),
					'label'   => esc_html__('Check to append a message to the comment form for unregistered users. Commenting without consent is no longer possible', 'designthemes-core')
				  ),
			
				  array(
					'id'  	  => 'privacy-commentform-msg',
					'type'    => 'textarea',
					'title'   => esc_html__('Message below comment form', 'designthemes-core'),
					'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'designthemes-core'),
					'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'designthemes-core'),
					'dependency' => array( 'privacy-commentform', '==', 'true' )
				  ),
			
				  array(
					'id'      => 'privacy-subscribeform',
					'type'    => 'checkbox',
					'title'   => esc_html__('Append a privacy policy message to mailchimp contact forms?', 'designthemes-core'),
					'label'   => esc_html__('Check to append a message to all of your mailchimp forms.', 'designthemes-core')
				  ),
			
				  array(
					'id'  	  => 'privacy-subscribeform-msg',
					'type'    => 'textarea',
					'title'   => esc_html__('Message below mailchimp subscription forms', 'designthemes-core'),
					'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'designthemes-core'),
					'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'designthemes-core'),
					'dependency' => array( 'privacy-subscribeform', '==', 'true' )
				  ),
			
				  array(
					'id'      => 'privacy-loginform',
					'type'    => 'checkbox',
					'title'   => esc_html__('Append a privacy policy message to your login forms?', 'designthemes-core'),
					'label'   => esc_html__('Check to append a message to the default login and registrations forms.', 'designthemes-core')
				  ),
			
				  array(
					'id'  	  => 'privacy-loginform-msg',
					'type'    => 'textarea',
					'title'   => esc_html__('Message below login forms', 'designthemes-core'),
					'info'	  => esc_html__('A short message that can be displayed below forms, along with a checkbox, that lets the user know that he has to agree to your privacy policy in order to send the form.', 'designthemes-core'),
					'default' => esc_html__('I agree to the terms and conditions laid out in the [dt_sc_privacy_link]Privacy Policy[/dt_sc_privacy_link]', 'designthemes-core'),
					'dependency' => array( 'privacy-loginform', '==', 'true' )
				  ),
			
				  array(
					'type'    => 'subheading',
					'content' => esc_html__( "Cookie Consent Message", 'designthemes-core' ),
				  ),
			
				  array(
					'type'    => 'notice',
					'class'   => 'warning',
					'content' => sprintf( esc_html__('Make your site comply with the %sEU cookie law%s by informing users that your site uses cookies. %sYou can also use the field to display a one time message not related to cookies if you are using a plugin for this purpose or do not need to inform your customers about the use of cookies.','designthemes-core'), '<a target="_blank" href="http://ec.europa.eu/ipg/basics/legal/cookies/index_en.htm">', '</a>', '<br><br>' )
				  ),
			
				  array(
					'id'      => 'enable-cookie-consent',
					'type'    => 'checkbox',
					'title'   => esc_html__('Cookie Message Bar', 'designthemes-core'),
					'label'   => esc_html__('Enable cookie consent message bar', 'designthemes-core'),
				  ),
			
				  array(
					'id'  	  => 'cookie-consent-msg',
					'type'    => 'textarea',
					'title'   => esc_html__('Message', 'designthemes-core'),
					'info'	  => esc_html__('Provide a message which indicates that your site uses cookies.', 'designthemes-core'),
					'default' => esc_html__('This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies.', 'designthemes-core'),
					'dependency' => array( 'enable-cookie-consent', '==', 'true' )
				  ),
			
				  array(
					'id'           => 'cookie-bar-position',
					'type'         => 'select',
					'title'        => esc_html__('Message Bar Position', 'designthemes-core'),
					'options'      => array(
					  'top' 	     => esc_html__('Top', 'designthemes-core'),
					  'bottom'       => esc_html__('Bottom', 'designthemes-core'),
					  'top-left' 	 => esc_html__('Top Left Corner', 'designthemes-core'),
					  'top-right' 	 => esc_html__('Top Right Corner', 'designthemes-core'),
					  'bottom-left'	 => esc_html__('Bottom Left Corner', 'designthemes-core'),
					  'bottom-right' => esc_html__('Bottom Right Corner', 'designthemes-core'),
					),
					'class'        => 'chosen',
					'default' 	   => 'bottom',
					'dependency'   => array( 'enable-cookie-consent', '==', 'true' ),
					'info'         => esc_html__('Where on the page should the message bar appear?', 'designthemes-core')
				  ),
			
				  array(
					'type'         => 'subheading',
					'content'      => esc_html__( "Buttons", 'designthemes-core' ),
					'dependency'   => array( 'enable-cookie-consent', '==', 'true' ),
				  ),
			
				  array(
					'id'              => 'cookie-bar-buttons',
					'type'            => 'group',
					'title'           => esc_html__('Buttons', 'designthemes-core'),
					'desc'            => esc_html__('You can create any number of buttons/links for your message bar here:', 'designthemes-core'),
					'button_title'    => esc_html__('Add New Button', 'designthemes-core'),
					'accordion_title' => esc_html__('Adding New Button', 'designthemes-core'),
					'dependency'      => array( 'enable-cookie-consent', '==', 'true' ),
					'fields'          => array(
					  array(
						'id'          => 'cookie-bar-button-label',
						'type'        => 'text',
						'title'       => esc_html__('Button Label', 'designthemes-core')
					  ),
					  array(
						'id'           => 'cookie-button-action',
						'type'         => 'select',
						'title'        => esc_html__('Button Action', 'designthemes-core'),
						'options'      => array(
						  '' 	       => esc_html__('Dismiss the notification', 'designthemes-core'),
						  'link'       => esc_html__('Link to another page', 'designthemes-core'),
						  'info_modal' => esc_html__('Open info modal on privacy and cookies', 'designthemes-core')
						),
						'class'        => 'chosen',
						'default' 	   => ''
					  ),
					  array(
						'id'         => 'cookie-bar-button-link',
						'type'       => 'text',
						'title'      => esc_html__('Button Link', 'designthemes-core'),
						'dependency' => array( 'cookie-button-action', '==', 'link' )
					  ),
					)
				  ),
			
				  array(
					'type'       => 'subheading',
					'content'    => esc_html__( "Modal Window with privacy and cookie info", 'designthemes-core' ),
					'dependency' => array( 'enable-cookie-consent', '==', 'true' ),
				  ),
			
				  array(
					'id'         => 'enable-custom-model-content',
					'type'       => 'checkbox',
					'title'		 => esc_html__('Model Window Custom Content', 'designthemes-core'),
					'label'      => esc_html__('Instead of displaying the default content set custom content yourself', 'designthemes-core'),
					'dependency' => array( 'enable-cookie-consent', '==', 'true' )
				  ),
			
			
				  array(
					'id'         => 'custom-model-heading',
					'type'       => 'text',
					'title'      => esc_html__('Main Heading', 'designthemes-core'),
					'default'    => esc_html__('Cookie and Privacy Settings', 'designthemes-core'),
					'dependency' => array( 'enable-custom-model-content', '==', 'true' )
				  ),
			
				  array(
					'id'              => 'custom-model-tabs',
					'type'            => 'group',
					'title'           => esc_html__('Model Window Tabs', 'designthemes-core'),
					'desc'            => esc_html__('You can create any number of tabs for your model window here:', 'designthemes-core'),
					'button_title'    => esc_html__('Add New Tab', 'designthemes-core'),
					'accordion_title' => esc_html__('Adding New Tab', 'designthemes-core'),
					'dependency'      => array( 'enable-custom-model-content', '==', 'true' ),
					'fields'          => array(
					  array(
			
						'id'          => 'label',
						'type'        => 'text',
						'title'       => esc_html__('Tab Label', 'designthemes-core')
					  ),
					  array(
						'id'  	 	  => 'content',
						'type'    	  => 'textarea',
						'title'  	  => esc_html__('Tab Content', 'designthemes-core'),
					  ),
					)
				  ),
			
			   ),
			);

			return $options;
		}

		/* ---------------------------------------------------------------------------
		 *	Appends a checkbox to the comment form
		 * --------------------------------------------------------------------------- */
		function dt_privacy_comment_checkbox( $comment_field = array() ) {

			$comment_field['author'] = $comment_field['author'];
			$comment_field['email']  = $comment_field['email'];
			$comment_field['url']    = $comment_field['url'];

			$comment_field['comment-form-dt-privatepolicy'] = $this->dt_privacy_comment_checkbox_content();

			return $comment_field ;
		}

		/* ---------------------------------------------------------------------------
		 *	Creates the checkbox html to the comment form
		 * --------------------------------------------------------------------------- */
		function dt_privacy_comment_checkbox_content( $content = "", $extra_class = "" ) {

			if( empty($content) ) $content = do_shortcode( cs_get_option('privacy-commentform-msg') );

			$output = '<p class="comment-form-dt-privatepolicy '.$extra_class.'">
						<input id="comment-form-dt-privatepolicy" name="comment-form-dt-privatepolicy" type="checkbox" value="yes">
						<label for="comment-form-dt-privatepolicy">'.$content.'</label>
					  </p>';

			return $output;
		}

		/* ---------------------------------------------------------------------------
		 *	Checks if the user accepted the privacy policy in comment form
		 * --------------------------------------------------------------------------- */
		function dt_privacy_verify_comment_checkbox( $commentdata ) {

			$post_type = get_post_type( $_POST['comment_post_ID'] );

			if( $post_type != 'product' ) {

				if ( ! is_user_logged_in() && ! isset( $_POST['comment-form-dt-privatepolicy'] ) ) {
					$error_message = apply_filters( 'dt_privacy_comment_checkbox_error_message', esc_html__( 'Error: You must agree to our privacy policy to comment on this site...' , 'designthemes-core' ) );
					wp_die( $error_message );
				}
			}

		    return $commentdata;
		}

		/* ---------------------------------------------------------------------------
		 *	Checks if the user accepted the privacy policy in mailchimp form
		 * --------------------------------------------------------------------------- */
		function dt_privacy_mailchimp_checkbox( $content = "", $attrs = "") {

			if( empty($content) ) $content = do_shortcode( cs_get_option('privacy-subscribeform-msg') );

			$output = '<div class="dt-privacy-wrapper">';
				$output .= '<input name="dt_mc_privacy" id="dt_mc_privacy" value="true" type="checkbox" required="required"><label for="dt_mc_privacy">'.$content.'</label>';
			$output .= '</div>';

			return $output;
		}

		/* ---------------------------------------------------------------------------
		 *	Checks if the user accepted the privacy policy in login form
		 * --------------------------------------------------------------------------- */
		function dt_privacy_login_extra( $form ) {

			$content = do_shortcode( cs_get_option('privacy-loginform-msg') );
			echo ( ( $this->dt_privacy_comment_checkbox_content( $content , 'forgetmenot') ) );
		}

		/* ---------------------------------------------------------------------------
		 *	Authenticate the extra checkbox in the user login screen
		 * --------------------------------------------------------------------------- */
		function dt_privacy_authenticate_user_acc( $user, $password ) {

			// See if the checkbox #login_accept was checked
		    if ( isset( $_REQUEST['comment-form-dt-privatepolicy'] ) ) {
		        // Checkbox on, allow login
		        return $user;
		    } else {
		        // Did NOT check the box, do not allow login
		        $error = new WP_Error();
		        $error->add('did_not_accept', esc_html__( 'You must acknowledge and agree to the privacy policy' , 'designthemes-core'));
		        return $error;
		    }
		}

		/* ---------------------------------------------------------------------------
		 *	Javascript that gets appended to pages that got a privacy shortcode toggle
		 * --------------------------------------------------------------------------- */
		function dt_privacy_footer_script() {

			wp_add_inline_script( 'maruthi-cookie-js', "function dt_privacy_cookie_setter( cookie_name ) {
				
			var toggle = jQuery('.' + cookie_name);
			toggle.each(function()
			{
				if(document.cookie.match(cookie_name)) this.checked = false;
			});

			jQuery('.' + 'dt-switch-' + cookie_name).each(function()
			{
				this.className += ' active ';
			});

			toggle.on('click', function() {
				if(this.checked) {
					document.cookie = cookie_name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
				}
				else {
					var theDate = new Date();
					var oneYearLater = new Date( theDate.getTime() + 31536000000 );
					document.cookie = cookie_name + '=true; Path=/; Expires='+oneYearLater.toGMTString()+';';
				}
			});
			};
			dt_privacy_cookie_setter('dtPrivacyGoogleTrackingDisabled');
			dt_privacy_cookie_setter('dtPrivacyGoogleWebfontsDisabled');
			dt_privacy_cookie_setter('dtPrivacyGoogleMapsDisabled');
			dt_privacy_cookie_setter('dtPrivacyVideoEmbedsDisabled'); " );
		}

		/* ---------------------------------------------------------------------------
		 *	Disable Google Font 
		 * --------------------------------------------------------------------------- */
		function dt_privacy_disable_google_font() {

			if( isset( $_COOKIE['dtPrivacyGoogleWebfontsDisabled'] ) ) {
				add_filter( 'kirki/enqueue_google_fonts', '__return_empty_array' );
			}
		}
		/* ---------------------------------------------------------------------------
		 *	Print Tracking Code
		 * --------------------------------------------------------------------------- */
		function dt_privacy_print_tracking_code() {

			$temp = cs_get_option( 'analytics-code' );

			$tracking_code = "<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src='https://www.googletagmanager.com/gtag/js?id=".$temp."'></script>
			<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '".$temp."', { 'anonymize_ip': true });
			</script>";
			
			$enable_code = cs_get_option( 'enable-analytics-code' );

			if( !empty( $temp ) && isset( $enable_code ) ) {
				//extract UA ID from code
				$UAID = false;
				$extra_code = "";
				preg_match("!UA-[0-9]+-[0-9]+!", $tracking_code, $match);

				if(!empty($match) && isset($match[0])) $UAID = $match[0];

				//if we got a valid uaid, add the js cookie check 
				if($UAID){
				$extra_code = "
				<script>
				if(document.cookie.match(/dtPrivacyGoogleTrackingDisabled/)){ window['ga-disable-{$UAID}'] = true; }
				</script>";
				}

				echo ( ($extra_code . $tracking_code) );
			}			
		}
	}
}

/* --------------------------------------------------------------------------------
 * Creates a modal window informing the user about the use of cookies on the site
 * Sets a cookie when the confirm button is clicked, and hides the box.
 * -------------------------------------------------------------------------------- */
if( ! function_exists( 'dt_privacy_cookie_consent' ) ) {

    function dt_privacy_cookie_consent() {

        if( cs_get_option('enable-cookie-consent') == "true" ) {

			$message = do_shortcode( cs_get_option('cookie-consent-msg') );
			$position = cs_get_option('cookie-bar-position'); ?>

            <div class="dt-cookie-consent cookiebar-hidden dt-cookiemessage-<?php echo esc_attr($position); ?>">
	            <div class="container">
    		        <p class="dt_cookie_text"><?php echo do_shortcode ( $message ); ?></p><?php

					$cookie_contents = $message;
					$cookie_contents = md5($cookie_contents);

					$buttons = maruthi_cs_get_option('cookie-bar-buttons', array());
					$i = 0;
					$extra_info = "";

					if( empty( $buttons ) ):
						?><a href="#" class="dt-sc-button filled small dt-cookie-consent-button dt-cookie-close-bar" data-contents="<?php echo esc_attr($cookie_contents); ?>"><?php esc_html_e('OK', 'designthemes-core'); ?></a><?php
					endif;

					foreach($buttons as $button) {
						$i++;
						$data  = "";
						$btn_class = "dt-extra-cookie-btn";
						$label = !empty( $button['cookie-bar-button-label'] ) ? $button['cookie-bar-button-label'] : "×";
						$link  = !empty( $button['cookie-bar-button-link'] ) && $button['cookie-button-action'] == 'link' ? $button['cookie-bar-button-link'] : "#";

						if( empty( $button['cookie-button-action'] ) ) {
							$btn_class = " dt-cookie-close-bar ";
							$data = "data-contents='{$cookie_contents}'";
						} elseif( $button['cookie-button-action'] == 'info_modal' ) {
							$link .= 'dt-consent-extra-info';
						}

						if( !empty( $button['cookie-button-action'] ) && $button['cookie-button-action'] == 'info_modal' ) {
							$heading = esc_html__( "Cookie and Privacy Settings", 'designthemes-core' );
							$contents = array(

										array(	'label'		=> esc_html__( 'How we use cookies', 'designthemes-core' ),
												'content'	=> sprintf( esc_html__( 'We may request cookies to be set on your device. We use cookies to let us know when you visit our websites, how you interact with us, to enrich your user experience, and to customize your relationship with our website. %1$s%1$sClick on the different category headings to find out more. You can also change some of your preferences. Note that blocking some types of cookies may impact your experience on our websites and the services we are able to offer.', 'designthemes-core'), '<br>' ) ),

										array(	'label'		=> esc_html__( 'Essential Website Cookies', 'designthemes-core' ),
												'content'	=> sprintf( esc_html__( 'These cookies are strictly necessary to provide you with services available through our website and to use some of its features. %1$s%1$sBecause these cookies are strictly necessary to deliver the website, you cannot refuse them without impacting how our site functions. You can block or delete them by changing your browser settings and force blocking all cookies on this website.', 'designthemes-core'), '<br>' ) ),

							);

							$analtics_check = cs_get_option( 'analytics-code' );
							if(!empty( $analtics_check ) ) {
								$contents[] = array(  'label'		=> esc_html__( 'Google Analytics Cookies', 'designthemes-core' ),
													  'content'	=> sprintf( esc_html__( 'These cookies collect information that is used either in aggregate form to help us understand how our website is being used or how effective our marketing campaigns are, or to help us customize our website and application for you in order to enhance your experience. %1$s%1$sIf you do not want that we track your visist to our site you can disable tracking in your browser here: [dt_sc_privacy_google_tracking]', 'designthemes-core'), '<br>' ) );
							}

							$contents[] = array(  'label'		=> esc_html__( 'Other external services', 'designthemes-core' ), 
												  'content'	=> sprintf( esc_html__( 'We also use different external services like Google Webfonts, Google Maps and external Video providers. Since these providers may collect personal data like your IP address we allow you to block them here. Please be aware that this might heavily reduce the functionality and appearance of our site. Changes will take effect once you reload the page.%1$s%1$s

			Google Webfont Settings:
			[dt_sc_privacy_google_webfonts]

			Google Map Settings:
			[dt_sc_privacy_google_maps]

			Vimeo and Youtube video embeds:
			[dt_sc_privacy_video_embeds]', 'designthemes-core' ), '<br>'
							) );

							$wp_privacy_page = get_option('wp_page_for_privacy_policy');
							if( !empty( $wp_privacy_page ) ) {
								$contents[] = array(	'label'		=> esc_html__( 'Privacy Policy', 'designthemes-core' ), 
														'content'	=> sprintf( esc_html__( 'You can read about our cookies and privacy settings in detail on our Privacy Policy Page. %1$s%1$s [dt_sc_privacy_link]', 'designthemes-core' ), '<br>' ) );
							}

							if( cs_get_option('enable-custom-model-content') == "true" ) {
								$contents = maruthi_cs_get_option('custom-model-tabs', array());
								$heading  = str_replace("'", "&apos;", maruthi_cs_get_option('custom-model-heading', $heading));
							}

							$content  = "";
							foreach($contents as $content_block ) {

								$content .= '[dt_sc_tab title="'.$content_block['label'].'"]';
									$content .= $content_block['content'];
								$content .= '[/dt_sc_tab]';
							}

							$btn_class .= " dt-cookie-info-btn ";
							$extra_info = "<div id='dt-consent-extra-info' class='dt-inline-modal main_color zoom-anim-dialog mfp-hide'>".do_shortcode("

								<h4>{$heading}</h4>

								[dt_sc_tabs type='vertical']
									{$content}
								[/dt_sc_tabs]
							")."</div>";
						}

						echo "<a href='{$link}' class='dt-sc-button filled small dt-cookie-consent-button dt-cookie-consent-button-{$i} {$btn_class}' {$data}>{$label}</a>";
					} ?>
                </div>
            </div><?php

		    echo do_shortcode( $extra_info );
        }
    }
    add_action('wp_footer', 'dt_privacy_cookie_consent', 3);
}