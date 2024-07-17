<?php

namespace cBuilder\Classes;

use cBuilder\Classes\Database\Orders;

class CCBContactForm {
	public static function render() {
		check_ajax_referer( 'ccb_contact_form', 'nonce' );
		$result = array(
			'success' => false,
			'message' => apply_filters( 'ccb_contact_form_invalid_error', __( 'Something went wrong', 'cost-calculator-builder-pro' ) ),
		);

		if ( ! isset( $_POST['action'] ) || 'calc_contact_form' !== $_POST['action'] ) {
			return $result;
		}

		$params = '';

		if ( is_string( $_POST['data'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$params = str_replace( '\\n', '^n', $_POST['data'] ); // phpcs:ignore WordPress.Security.NonceVerification.Missing
			$params = str_replace( '\\\"', 'ccb_quote', $params );
			$params = str_replace( '\\', '', $params );
			$params = str_replace( 'ccb_quote', '\"', $params );
			$params = str_replace( '^n', '\\n', $params );

			$params = json_decode( $params, true );
		}

		if ( isset( $params['captchaSend'] ) ) {
			if ( isset( $params['captcha'] ) && ! empty( $params['captcha']['token'] ) ) {
				$token    = $params['captcha']['token'];
				$captcha  = $params['captcha']['v3'];
				$secret   = $captcha['secretKey'];
				$url      = 'https://www.google.com/recaptcha/api/siteverify?secret=' . rawurlencode( $secret ) . '&response=' . rawurlencode( $token );
				$response = file_get_contents( $url ); // phpcs:ignore
				$response = json_decode( $response );

				if ( ! $response->success ) {
					wp_send_json( $result );
				}
			} else {
				wp_send_json( $result );
			}
		}

		$general_settings = CCBSettingsData::get_calc_global_settings();
		$settings         = CCBSettingsData::get_calc_single_settings( $params['calcId'] );

		$subject    = $settings['formFields']['emailSubject'];
		$user_email = $settings['formFields']['adminEmailAddress'];
		if ( ! empty( $general_settings['form_fields']['use_in_all'] ) ) {
			$subject    = $general_settings['form_fields']['emailSubject'];
			$user_email = $general_settings['form_fields']['adminEmailAddress'];
		}

		$client_email  = $params['clientEmail'] ?? '';
		$custom_emails = $params['customEmails'] ?? '';

		if ( ! filter_var( $user_email, FILTER_VALIDATE_EMAIL ) || ! filter_var( $client_email, FILTER_VALIDATE_EMAIL ) ) {
			return array(
				'success' => false,
				'message' => apply_filters( 'ccb_contact_form_email_error', __( 'Something went wrong', 'cost-calculator-builder-pro' ) ),
			);
		}

		$subject     = empty( $subject ) ? $_SERVER['REQUEST_URI'] : $subject;
		$attachments = array();

		$subject = apply_filters( 'cbb_email_subject', $subject, $params['calcId'] );

		/** upload files, get  $file_urls */
		$file_urls = self::add_files( $params );

		if ( count( $file_urls ) > 0 ) {
			foreach ( $file_urls as $file_item ) {
				$attachments = array_merge( $attachments, array_column( $file_item, 'file' ) );
			}
		}

		$attachments = apply_filters( 'ccb_email_attachment', $attachments, $params );
		$fields      = array_map(
			function ( $field ) {
				$allowed_fields = array(
					'checkbox_field',
					'toggle_field',
					'checkbox_with_img_field',
				);
				foreach ( $allowed_fields as $allowed ) {
					if ( ! isset( $value['extra'] ) && str_contains( $field['alias'], $allowed ) ) {
						$field['has_options'] = true;
					}

					if ( isset( $field['groupElements'] ) ) {
						foreach ( $field['groupElements'] as $key => $childElement ) {
							if ( strpos( $childElement['alias'], $allowed ) !== false ) {
								$childElement['has_options']    = true;
								$field['groupElements'][ $key ] = $childElement;
							}
						}
					}
				}
				return $field;
			},
			$params['descriptions']
		);

		$fields = array_filter(
			$fields,
			function ( $field ) {
				return ! str_contains( $field['alias'], 'group' );
			}
		);

		$discount_data = array();
		if ( ! empty( $params['orderId'] ) ) {
			$discount_data = Orders::get_order_discounts( $params['orderId'] );
		}

		$add_order_id_to_subject = isset( $params['addOrderIdToSubject'] ) ? $params['addOrderIdToSubject'] : false;

		$args = array(
			'fields'         => $fields,
			'send_fields'    => $params['sendFields'],
			'totals'         => $discount_data['totals'] ?? $params['calcTotals'],
			'other_totals'   => isset( $params['otherTotals'] ) ? $params['otherTotals'] : array(),
			'email_settings' => $general_settings['email_templates'],
			'files'          => $file_urls,
			'show_unit'      => $params['showUnit'] ?? '',
			'calc_id'        => $params['calcId'],
			'order_id'       => $params['orderId'],
			'promocodes'     => $discount_data['promocodes'] ?? array(),
		);

		$args['totals']       = array_filter( $args['totals'] );
		$args['other_totals'] = array_filter( $args['other_totals'] );

		$result = self::sendEmail(
			array(
				'args'                    => $args,
				'calcId'                  => $params['calcId'],
				'client_email'            => $client_email,
				'subject'                 => $subject,
				'attachments'             => $attachments,
				'user_email'              => $user_email,
				'custom_emails'           => $custom_emails,
				'add_order_id_to_subject' => $add_order_id_to_subject,
			),
			$result
		);

		wp_send_json( $result );
	}

	/** check uploaded files based on settings ( file upload field ) */
	protected static function validateFile( $file, $field_id, $calc_id ) { // phpcs:ignore
		if ( empty( $file ) ) {
			return false;
		}

		$calc_fields = get_post_meta( $calc_id, 'stm-fields', true );
		/** get file field settings */
		$file_field_index = array_search( $field_id, array_column( $calc_fields, 'alias' ), true );

		$extension       = pathinfo( $file['name'], PATHINFO_EXTENSION );
		$allowed_formats = array();

		if ( isset( $calc_fields[ $file_field_index ]['fileFormats'] ) ) {
			foreach ( $calc_fields[ $file_field_index ]['fileFormats'] as $format ) {
				$allowed_formats = array_merge( $allowed_formats, explode( '/', $format ) );
			}
		}

		/** check file extension */
		if ( ! in_array( $extension, $allowed_formats, true ) ) {
			return false;
		}

		/** check file size */
		if ( $calc_fields[ $file_field_index ]['max_file_size'] < round( $file['size'] / 1024 / 1024, 1 ) ) {
			return false;
		}

		return true;
	}

	public static function add_files( $params ) {
		/** upload files if exist */
		if ( ! is_array( $_FILES ) ) {
			return $params;
		}

		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		$file_urls     = array();
		$order_details = $params['descriptions'];

		/** upload all files, create array for fields */
		foreach ( $_FILES as $file_key => $file ) {
			$field_id    = preg_replace( '/_ccb_.*/', '', $file_key );
			$field_index = in_array( $field_id, array_column( $order_details, 'alias' ), true );

			/** if field not found continue */
			if ( false === $field_index ) {
				continue;
			}

			/** validate file by settings */
			$is_valid = self::validateFile( $file, $field_id, $params['calcId'] );
			if ( ! $is_valid ) {
				continue;
			}

			if ( ! array_key_exists( $field_id, $file_urls ) ) {
				$file_urls[ $field_id ] = array();
			}

			$file_info = wp_handle_upload( $file, array( 'test_form' => false ) );

			if ( ! empty( $file_info['file'] ) && str_contains( $file['type'], 'svg' ) ) {
				$svg_sanitizer = new \enshrined\svgSanitize\Sanitizer();
				$dirty_svg     = file_get_contents( $file_info['file'] ); //phpcs:ignore
				$clean_svg     = $svg_sanitizer->sanitize( $dirty_svg );
				file_put_contents( $file_info['file'], $clean_svg ); //phpcs:ignore
			}

			if ( $file_info && empty( $file_info['error'] ) ) {
				$file_info['filename']    = $file['name'];
				$file_urls[ $field_id ][] = $file_info;
			}
		}
		return $file_urls;
	}

	public static function sendEmail( $params = array(), $result = array() ) {
		$general_settings = CCBSettingsData::get_calc_global_settings();
		$email_from_name  = $general_settings['invoice']['fromName'];
		$email_from       = ! empty( $general_settings['invoice']['fromEmail'] ) ? $general_settings['invoice']['fromEmail'] : get_option( 'admin_email' );
		$headers          = 'From: ' . $email_from_name .  ' <' . $email_from . '>' . "\r\n"; //phpcs:ignore
		$headers         .= 'Content-Type: text/html; charset=UTF-8';
		$headers          = apply_filters( 'ccb_email_header', $headers, $params['args'] );

		do_action( 'ccb_contact_form_message_template_before', $params['args'], $params['calcId'] );

		$body_client = apply_filters( 'ccb_email_body_client', CCBProTemplate::load( 'admin/email-templates/customer-email-template', $params['args'] ) );
		$body_user   = apply_filters( 'ccb_email_body_user', CCBProTemplate::load( 'admin/email-templates/owner-email-template', $params['args'] ) );

		do_action( 'ccb_contact_form_message_template_formed', $body_client, $body_user );

		$subject = isset( $params['add_order_id_to_subject'] ) && $params['add_order_id_to_subject'] ? '#' . $params['args']['order_id'] . ' | ' . $params['subject'] : $params['subject'];

		$to_user_email   = null;
		$to_client_email = wp_mail( $params['client_email'], $subject, $body_client, $headers, $params['attachments'] );

		if ( $to_client_email ) {
			$custom_emails       = array();
			$custom_emails[]     = $params['user_email']; // Add the user's email to the $custom_emails array
			$all_email_receivers = implode( ',', $custom_emails ); // Create a comma-separated string of email addresses
			$to_user_email       = wp_mail( $all_email_receivers, $subject, $body_user, $headers, $params['attachments'] );
		}

		if ( $to_user_email && $to_client_email ) {
			$result['success'] = true;
			$result['message'] = __( 'Thank you for your message. It has been sent.', 'cost-calculator-builder-pro' );
		}

		do_action( 'ccb_contact_form_sent', $result );

		return $result;
	}
}
