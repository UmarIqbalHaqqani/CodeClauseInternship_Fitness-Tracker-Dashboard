<?php
if (! class_exists ( 'DTEventVenuesPostType' ) ) {

	class DTEventVenuesPostType {

		function __construct() {

			add_action ( 'init', array( $this, 'dt_register_cpt' ) );
			add_action('admin_menu', array( $this, 'dt_event_venu_menu' ) );
			add_action('admin_head', array( $this, 'dt_set_current_menu' ) );

			add_filter( 'cs_metabox_options', array( $this, 'dt_metabox_options' ) );
		}

		function dt_register_cpt() {

			$labels = array(
				'name' => __('Venues', 'dt-woo' ),
				'singular_name' => __('Venue', 'dt-woo' ),
				'menu_name' => __('Venues', 'dt-woo' ),
				'add_new' => __('Add Venue', 'dt-woo' ),
				'add_new_item' => __('Add New Venue', 'dt-woo' ),
				'edit' => __('Edit Venue', 'dt-woo' ),
				'edit_item' => __('Edit Venue', 'dt-woo' ),
				'new_item' => __('New Venue', 'dt-woo' ),
				'view' => __('View Venue', 'dt-woo' ),
				'view_item' => __('View Venue', 'dt-woo' ),
				'search_items' => __('Search Venues', 'dt-woo' ),
				'not_found' => __('No Venues found', 'dt-woo' ),
				'not_found_in_trash' => __('No Venues found in Trash', 'dt-woo' ),
			);

			$args = array(
				'label'				  => __('Venues', 'dt-woo' ),  
				'labels' 			  => $labels,
				'supports' 			  => array('title', 'editor', 'thumbnail' ),
				'hierarchical' 		  => false,
				'public' 			  => true,
				'show_ui' 			  => true,
				'show_in_menu' 		  => false,				
				'show_in_admin_bar'   => false,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,		
				'exclude_from_search' => false,
				'publicly_queryable'  => false,
				'capability_type'     => 'page'			
			);

			register_post_type('dt_event_venu', $args );
		}

		function dt_event_venu_menu() {

			add_submenu_page( 'edit.php?post_type=dt_event',
				esc_html__( 'Venues', 'dt-woo' ),
				esc_html__( 'Venues', 'dt-woo' ),
				'manage_options',
				'edit.php?post_type=dt_event_venu'
			);
		}

		function dt_set_current_menu() {

			global $submenu_file, $parent_file, $current_screen, $pagenow;

			if( !is_null( $current_screen ) ) {

				$post_type = $current_screen->post_type;

				if( $post_type == 'dt_event_venu' ) {

					$parent_file = 'edit.php?post_type=dt_event';

					if( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {

						$submenu_file = 'edit.php?post_type='.$post_type;
					}
				}
			}
		}

		function dt_metabox_options( $options ) {

			$countries = array(
				'US' => esc_html__( 'United States', 'dt-event-manager' ),
				'AF' => esc_html__( 'Afghanistan', 'dt-event-manager' ),
				'AL' => esc_html__( 'Albania', 'dt-event-manager' ),
				'DZ' => esc_html__( 'Algeria', 'dt-event-manager' ),
				'AS' => esc_html__( 'American Samoa', 'dt-event-manager' ),
				'AD' => esc_html__( 'Andorra', 'dt-event-manager' ),
				'AO' => esc_html__( 'Angola', 'dt-event-manager' ),
				'AI' => esc_html__( 'Anguilla', 'dt-event-manager' ),
				'AQ' => esc_html__( 'Antarctica', 'dt-event-manager' ),
				'AG' => esc_html__( 'Antigua And Barbuda', 'dt-event-manager' ),
				'AR' => esc_html__( 'Argentina', 'dt-event-manager' ),
				'AM' => esc_html__( 'Armenia', 'dt-event-manager' ),
				'AW' => esc_html__( 'Aruba', 'dt-event-manager' ),
				'AU' => esc_html__( 'Australia', 'dt-event-manager' ),
				'AT' => esc_html__( 'Austria', 'dt-event-manager' ),
				'AZ' => esc_html__( 'Azerbaijan', 'dt-event-manager' ),
				'BS' => esc_html__( 'Bahamas', 'dt-event-manager' ),
				'BH' => esc_html__( 'Bahrain', 'dt-event-manager' ),
				'BD' => esc_html__( 'Bangladesh', 'dt-event-manager' ),
				'BB' => esc_html__( 'Barbados', 'dt-event-manager' ),
				'BY' => esc_html__( 'Belarus', 'dt-event-manager' ),
				'BE' => esc_html__( 'Belgium', 'dt-event-manager' ),
				'BZ' => esc_html__( 'Belize', 'dt-event-manager' ),
				'BJ' => esc_html__( 'Benin', 'dt-event-manager' ),
				'BM' => esc_html__( 'Bermuda', 'dt-event-manager' ),
				'BT' => esc_html__( 'Bhutan', 'dt-event-manager' ),
				'BO' => esc_html__( 'Bolivia', 'dt-event-manager' ),
				'BA' => esc_html__( 'Bosnia And Herzegowina', 'dt-event-manager' ),
				'BW' => esc_html__( 'Botswana', 'dt-event-manager' ),
				'BV' => esc_html__( 'Bouvet Island', 'dt-event-manager' ),
				'BR' => esc_html__( 'Brazil', 'dt-event-manager' ),
				'IO' => esc_html__( 'British Indian Ocean Territory', 'dt-event-manager' ),
				'BN' => esc_html__( 'Brunei Darussalam', 'dt-event-manager' ),
				'BG' => esc_html__( 'Bulgaria', 'dt-event-manager' ),
				'BF' => esc_html__( 'Burkina Faso', 'dt-event-manager' ),
				'BI' => esc_html__( 'Burundi', 'dt-event-manager' ),
				'KH' => esc_html__( 'Cambodia', 'dt-event-manager' ),
				'CM' => esc_html__( 'Cameroon', 'dt-event-manager' ),
				'CA' => esc_html__( 'Canada', 'dt-event-manager' ),
				'CV' => esc_html__( 'Cape Verde', 'dt-event-manager' ),
				'KY' => esc_html__( 'Cayman Islands', 'dt-event-manager' ),
				'CF' => esc_html__( 'Central African Republic', 'dt-event-manager' ),
				'TD' => esc_html__( 'Chad', 'dt-event-manager' ),
				'CL' => esc_html__( 'Chile', 'dt-event-manager' ),
				'CN' => esc_html__( 'China', 'dt-event-manager' ),
				'CX' => esc_html__( 'Christmas Island', 'dt-event-manager' ),
				'CC' => esc_html__( 'Cocos (Keeling) Islands', 'dt-event-manager' ),
				'CO' => esc_html__( 'Colombia', 'dt-event-manager' ),
				'KM' => esc_html__( 'Comoros', 'dt-event-manager' ),
				'CG' => esc_html__( 'Congo', 'dt-event-manager' ),
				'CD' => esc_html__( 'Congo, The Democratic Republic Of The', 'dt-event-manager' ),
				'CK' => esc_html__( 'Cook Islands', 'dt-event-manager' ),
				'CR' => esc_html__( 'Costa Rica', 'dt-event-manager' ),
				'CI' => esc_html__( "C&ocirc;te d'Ivoire", 'dt-event-manager' ),
				'HR' => esc_html__( 'Croatia (Local Name: Hrvatska)', 'dt-event-manager' ),
				'CU' => esc_html__( 'Cuba', 'dt-event-manager' ),
				'CY' => esc_html__( 'Cyprus', 'dt-event-manager' ),
				'CZ' => esc_html__( 'Czech Republic', 'dt-event-manager' ),
				'DK' => esc_html__( 'Denmark', 'dt-event-manager' ),
				'DJ' => esc_html__( 'Djibouti', 'dt-event-manager' ),
				'DM' => esc_html__( 'Dominica', 'dt-event-manager' ),
				'DO' => esc_html__( 'Dominican Republic', 'dt-event-manager' ),
				'TP' => esc_html__( 'East Timor', 'dt-event-manager' ),
				'EC' => esc_html__( 'Ecuador', 'dt-event-manager' ),
				'EG' => esc_html__( 'Egypt', 'dt-event-manager' ),
				'SV' => esc_html__( 'El Salvador', 'dt-event-manager' ),
				'GQ' => esc_html__( 'Equatorial Guinea', 'dt-event-manager' ),
				'ER' => esc_html__( 'Eritrea', 'dt-event-manager' ),
				'EE' => esc_html__( 'Estonia', 'dt-event-manager' ),
				'ET' => esc_html__( 'Ethiopia', 'dt-event-manager' ),
				'FK' => esc_html__( 'Falkland Islands (Malvinas)', 'dt-event-manager' ),
				'FO' => esc_html__( 'Faroe Islands', 'dt-event-manager' ),
				'FJ' => esc_html__( 'Fiji', 'dt-event-manager' ),
				'FI' => esc_html__( 'Finland', 'dt-event-manager' ),
				'FR' => esc_html__( 'France', 'dt-event-manager' ),
				'GF' => esc_html__( 'French Guiana', 'dt-event-manager' ),
				'PF' => esc_html__( 'French Polynesia', 'dt-event-manager' ),
				'TF' => esc_html__( 'French Southern Territories', 'dt-event-manager' ),
				'GA' => esc_html__( 'Gabon', 'dt-event-manager' ),
				'GM' => esc_html__( 'Gambia', 'dt-event-manager' ),
				'GE' => esc_html__( 'Georgia', 'dt-event-manager' ),
				'DE' => esc_html__( 'Germany', 'dt-event-manager' ),
				'GH' => esc_html__( 'Ghana', 'dt-event-manager' ),
				'GI' => esc_html__( 'Gibraltar', 'dt-event-manager' ),
				'GR' => esc_html__( 'Greece', 'dt-event-manager' ),
				'GL' => esc_html__( 'Greenland', 'dt-event-manager' ),
				'GD' => esc_html__( 'Grenada', 'dt-event-manager' ),
				'GP' => esc_html__( 'Guadeloupe', 'dt-event-manager' ),
				'GU' => esc_html__( 'Guam', 'dt-event-manager' ),
				'GT' => esc_html__( 'Guatemala', 'dt-event-manager' ),
				'GN' => esc_html__( 'Guinea', 'dt-event-manager' ),
				'GW' => esc_html__( 'Guinea-Bissau', 'dt-event-manager' ),
				'GY' => esc_html__( 'Guyana', 'dt-event-manager' ),
				'HT' => esc_html__( 'Haiti', 'dt-event-manager' ),
				'HM' => esc_html__( 'Heard And Mc Donald Islands', 'dt-event-manager' ),
				'VA' => esc_html__( 'Holy See (Vatican City State)', 'dt-event-manager' ),
				'HN' => esc_html__( 'Honduras', 'dt-event-manager' ),
				'HK' => esc_html__( 'Hong Kong', 'dt-event-manager' ),
				'HU' => esc_html__( 'Hungary', 'dt-event-manager' ),
				'IS' => esc_html__( 'Iceland', 'dt-event-manager' ),
				'IN' => esc_html__( 'India', 'dt-event-manager' ),
				'ID' => esc_html__( 'Indonesia', 'dt-event-manager' ),
				'IR' => esc_html__( 'Iran (Islamic Republic Of)', 'dt-event-manager' ),
				'IQ' => esc_html__( 'Iraq', 'dt-event-manager' ),
				'IE' => esc_html__( 'Ireland', 'dt-event-manager' ),
				'IL' => esc_html__( 'Israel', 'dt-event-manager' ),
				'IT' => esc_html__( 'Italy', 'dt-event-manager' ),
				'JM' => esc_html__( 'Jamaica', 'dt-event-manager' ),
				'JP' => esc_html__( 'Japan', 'dt-event-manager' ),
				'JO' => esc_html__( 'Jordan', 'dt-event-manager' ),
				'KZ' => esc_html__( 'Kazakhstan', 'dt-event-manager' ),
				'KE' => esc_html__( 'Kenya', 'dt-event-manager' ),
				'KI' => esc_html__( 'Kiribati', 'dt-event-manager' ),
				'KP' => esc_html__( "Korea, Democratic People's Republic Of", 'dt-event-manager' ),
				'KR' => esc_html__( 'Korea, Republic Of', 'dt-event-manager' ),
				'KW' => esc_html__( 'Kuwait', 'dt-event-manager' ),
				'KG' => esc_html__( 'Kyrgyzstan', 'dt-event-manager' ),
				'LA' => esc_html__( "Lao People's Democratic Republic", 'dt-event-manager' ),
				'LV' => esc_html__( 'Latvia', 'dt-event-manager' ),
				'LB' => esc_html__( 'Lebanon', 'dt-event-manager' ),
				'LS' => esc_html__( 'Lesotho', 'dt-event-manager' ),
				'LR' => esc_html__( 'Liberia', 'dt-event-manager' ),
				'LY' => esc_html__( 'Libya', 'dt-event-manager' ),
				'LI' => esc_html__( 'Liechtenstein', 'dt-event-manager' ),
				'LT' => esc_html__( 'Lithuania', 'dt-event-manager' ),
				'LU' => esc_html__( 'Luxembourg', 'dt-event-manager' ),
				'MO' => esc_html__( 'Macau', 'dt-event-manager' ),
				'MK' => esc_html__( 'Macedonia', 'dt-event-manager' ),
				'MG' => esc_html__( 'Madagascar', 'dt-event-manager' ),
				'MW' => esc_html__( 'Malawi', 'dt-event-manager' ),
				'MY' => esc_html__( 'Malaysia', 'dt-event-manager' ),
				'MV' => esc_html__( 'Maldives', 'dt-event-manager' ),
				'ML' => esc_html__( 'Mali', 'dt-event-manager' ),
				'MT' => esc_html__( 'Malta', 'dt-event-manager' ),
				'MH' => esc_html__( 'Marshall Islands', 'dt-event-manager' ),
				'MQ' => esc_html__( 'Martinique', 'dt-event-manager' ),
				'MR' => esc_html__( 'Mauritania', 'dt-event-manager' ),
				'MU' => esc_html__( 'Mauritius', 'dt-event-manager' ),
				'YT' => esc_html__( 'Mayotte', 'dt-event-manager' ),
				'MX' => esc_html__( 'Mexico', 'dt-event-manager' ),
				'FM' => esc_html__( 'Micronesia, Federated States Of', 'dt-event-manager' ),
				'MD' => esc_html__( 'Moldova, Republic Of', 'dt-event-manager' ),
				'MC' => esc_html__( 'Monaco', 'dt-event-manager' ),
				'MN' => esc_html__( 'Mongolia', 'dt-event-manager' ),
				'ME' => esc_html__( 'Montenegro', 'dt-event-manager' ),
				'MS' => esc_html__( 'Montserrat', 'dt-event-manager' ),
				'MA' => esc_html__( 'Morocco', 'dt-event-manager' ),
				'MZ' => esc_html__( 'Mozambique', 'dt-event-manager' ),
				'MM' => esc_html__( 'Myanmar', 'dt-event-manager' ),
				'NA' => esc_html__( 'Namibia', 'dt-event-manager' ),
				'NR' => esc_html__( 'Nauru', 'dt-event-manager' ),
				'NP' => esc_html__( 'Nepal', 'dt-event-manager' ),
				'NL' => esc_html__( 'Netherlands', 'dt-event-manager' ),
				'AN' => esc_html__( 'Netherlands Antilles', 'dt-event-manager' ),
				'NC' => esc_html__( 'New Caledonia', 'dt-event-manager' ),
				'NZ' => esc_html__( 'New Zealand', 'dt-event-manager' ),
				'NI' => esc_html__( 'Nicaragua', 'dt-event-manager' ),
				'NE' => esc_html__( 'Niger', 'dt-event-manager' ),
				'NG' => esc_html__( 'Nigeria', 'dt-event-manager' ),
				'NU' => esc_html__( 'Niue', 'dt-event-manager' ),
				'NF' => esc_html__( 'Norfolk Island', 'dt-event-manager' ),
				'MP' => esc_html__( 'Northern Mariana Islands', 'dt-event-manager' ),
				'NO' => esc_html__( 'Norway', 'dt-event-manager' ),
				'OM' => esc_html__( 'Oman', 'dt-event-manager' ),
				'PK' => esc_html__( 'Pakistan', 'dt-event-manager' ),
				'PW' => esc_html__( 'Palau', 'dt-event-manager' ),
				'PA' => esc_html__( 'Panama', 'dt-event-manager' ),
				'PG' => esc_html__( 'Papua New Guinea', 'dt-event-manager' ),
				'PY' => esc_html__( 'Paraguay', 'dt-event-manager' ),
				'PE' => esc_html__( 'Peru', 'dt-event-manager' ),
				'PH' => esc_html__( 'Philippines', 'dt-event-manager' ),
				'PN' => esc_html__( 'Pitcairn', 'dt-event-manager' ),
				'PL' => esc_html__( 'Poland', 'dt-event-manager' ),
				'PT' => esc_html__( 'Portugal', 'dt-event-manager' ),
				'PR' => esc_html__( 'Puerto Rico', 'dt-event-manager' ),
				'QA' => esc_html__( 'Qatar', 'dt-event-manager' ),
				'RE' => esc_html__( 'Reunion', 'dt-event-manager' ),
				'RO' => esc_html__( 'Romania', 'dt-event-manager' ),
				'RU' => esc_html__( 'Russian Federation', 'dt-event-manager' ),
				'RW' => esc_html__( 'Rwanda', 'dt-event-manager' ),
				'KN' => esc_html__( 'Saint Kitts And Nevis', 'dt-event-manager' ),
				'LC' => esc_html__( 'Saint Lucia', 'dt-event-manager' ),
				'VC' => esc_html__( 'Saint Vincent And The Grenadines', 'dt-event-manager' ),
				'WS' => esc_html__( 'Samoa', 'dt-event-manager' ),
				'SM' => esc_html__( 'San Marino', 'dt-event-manager' ),
				'ST' => esc_html__( 'Sao Tome And Principe', 'dt-event-manager' ),
				'SA' => esc_html__( 'Saudi Arabia', 'dt-event-manager' ),
				'SN' => esc_html__( 'Senegal', 'dt-event-manager' ),
				'RS' => esc_html__( 'Serbia', 'dt-event-manager' ),
				'SC' => esc_html__( 'Seychelles', 'dt-event-manager' ),
				'SL' => esc_html__( 'Sierra Leone', 'dt-event-manager' ),
				'SG' => esc_html__( 'Singapore', 'dt-event-manager' ),
				'SK' => esc_html__( 'Slovakia (Slovak Republic)', 'dt-event-manager' ),
				'SI' => esc_html__( 'Slovenia', 'dt-event-manager' ),
				'SB' => esc_html__( 'Solomon Islands', 'dt-event-manager' ),
				'SO' => esc_html__( 'Somalia', 'dt-event-manager' ),
				'ZA' => esc_html__( 'South Africa', 'dt-event-manager' ),
				'GS' => esc_html__( 'South Georgia, South Sandwich Islands', 'dt-event-manager' ),
				'ES' => esc_html__( 'Spain', 'dt-event-manager' ),
				'LK' => esc_html__( 'Sri Lanka', 'dt-event-manager' ),
				'SH' => esc_html__( 'St. Helena', 'dt-event-manager' ),
				'PM' => esc_html__( 'St. Pierre And Miquelon', 'dt-event-manager' ),
				'SD' => esc_html__( 'Sudan', 'dt-event-manager' ),
				'SR' => esc_html__( 'Suriname', 'dt-event-manager' ),
				'SJ' => esc_html__( 'Svalbard And Jan Mayen Islands', 'dt-event-manager' ),
				'SZ' => esc_html__( 'Swaziland', 'dt-event-manager' ),
				'SE' => esc_html__( 'Sweden', 'dt-event-manager' ),
				'CH' => esc_html__( 'Switzerland', 'dt-event-manager' ),
				'SY' => esc_html__( 'Syrian Arab Republic', 'dt-event-manager' ),
				'TW' => esc_html__( 'Taiwan', 'dt-event-manager' ),
				'TJ' => esc_html__( 'Tajikistan', 'dt-event-manager' ),
				'TZ' => esc_html__( 'Tanzania, United Republic Of', 'dt-event-manager' ),
				'TH' => esc_html__( 'Thailand', 'dt-event-manager' ),
				'TG' => esc_html__( 'Togo', 'dt-event-manager' ),
				'TK' => esc_html__( 'Tokelau', 'dt-event-manager' ),
				'TO' => esc_html__( 'Tonga', 'dt-event-manager' ),
				'TT' => esc_html__( 'Trinidad And Tobago', 'dt-event-manager' ),
				'TN' => esc_html__( 'Tunisia', 'dt-event-manager' ),
				'TR' => esc_html__( 'Turkey', 'dt-event-manager' ),
				'TM' => esc_html__( 'Turkmenistan', 'dt-event-manager' ),
				'TC' => esc_html__( 'Turks And Caicos Islands', 'dt-event-manager' ),
				'TV' => esc_html__( 'Tuvalu', 'dt-event-manager' ),
				'UG' => esc_html__( 'Uganda', 'dt-event-manager' ),
				'UA' => esc_html__( 'Ukraine', 'dt-event-manager' ),
				'AE' => esc_html__( 'United Arab Emirates', 'dt-event-manager' ),
				'GB' => esc_html__( 'United Kingdom', 'dt-event-manager' ),
				'UM' => esc_html__( 'United States Minor Outlying Islands', 'dt-event-manager' ),
				'UY' => esc_html__( 'Uruguay', 'dt-event-manager' ),
				'UZ' => esc_html__( 'Uzbekistan', 'dt-event-manager' ),
				'VU' => esc_html__( 'Vanuatu', 'dt-event-manager' ),
				'VE' => esc_html__( 'Venezuela', 'dt-event-manager' ),
				'VN' => esc_html__( 'Viet Nam', 'dt-event-manager' ),
				'VG' => esc_html__( 'Virgin Islands (British)', 'dt-event-manager' ),
				'VI' => esc_html__( 'Virgin Islands (U.S.)', 'dt-event-manager' ),
				'WF' => esc_html__( 'Wallis And Futuna Islands', 'dt-event-manager' ),
				'EH' => esc_html__( 'Western Sahara', 'dt-event-manager' ),
				'YE' => esc_html__( 'Yemen', 'dt-event-manager' ),
				'ZM' => esc_html__( 'Zambia', 'dt-event-manager' ),
				'ZW' => esc_html__( 'Zimbabwe', 'dt-event-manager' ),
			);
			natsort( $countries );

			$options[] = array(
				'id'		=> '_custom_settings',
				'title'     => esc_html__('Venue Information', 'dt-event-manager'),
				'post_type' => 'dt_event_venu',
				'context'   => 'normal',
				'priority'  => 'default',
				'sections'  => array(
					# General
					array(
						'name'  => 'general_section',
						'title' => esc_html__('General', 'dt-event-manager'),
						'icon'  => 'fa fa-angle-double-right',
						'fields' =>  array(

							array(
								'id'		=> 'address-1',
								'type'		=> 'text',
								'title'		=> esc_html__('Address 1', 'dt-event-manager'),
							),

							array(
								'id'		=> 'address-2',
								'type'		=> 'text',
								'title'		=> esc_html__('Address 2', 'dt-event-manager'),
							),

							array(
								'id'		=> 'city',
								'type'		=> 'text',
								'title'		=> esc_html__('City', 'dt-event-manager'),
							),																					

							array(
								'id'		=> 'country',
								'type'		=> 'select',
								'title'		=> esc_html__('Country', 'dt-event-manager'),
								'options'	=> $countries,
								'class' 	=> 'chosen',
								'default_option' => esc_html__('Select a Country', 'dt-event-manager'),
								'attributes' => array(
									'style'       => 'width: 320px;'
								)
							),

							array(
								'id'		=> 'state-or-province',
								'type'		=> 'text',
								'title'		=> esc_html__('State or Province', 'dt-event-manager'),
							),
							
							array(
								'id'		=> 'postal-code',
								'type'		=> 'text',
								'title'		=> esc_html__('Postal Code', 'dt-event-manager'),
							),

							array(
								'id'		=> 'phone-no',
								'type'		=> 'text',
								'title'		=> esc_html__('Phone Number', 'dt-event-manager'),
							),

							array(
								'id'		=> 'website',
								'type'		=> 'text',
								'title'		=> esc_html__('Website URL', 'dt-event-manager'),
							),

							array(
								'id'		=> 'latitude',
								'type'		=> 'text',
								'title'		=> esc_html__('Latitude', 'dt-event-manager'),
							),

							array(
								'id'		=> 'longitude',
								'type'		=> 'text',
								'title'		=> esc_html__('Longitude', 'dt-event-manager'),
							),
						)
					),
				)
			);

			return $options;
		}					
	}
}