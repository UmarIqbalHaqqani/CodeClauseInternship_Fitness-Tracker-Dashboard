<?php

namespace cBuilder\Classes;

require_once CCB_PRO_PATH . '/dompdf/autoload.inc.php';

use cBuilder\Classes\Database\Orders;
use Dompdf\Dompdf;
use Dompdf\Options;

class CCBInvoice {
	public static function send_pdf() {
		check_ajax_referer( 'ccb_send_quote', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( __( 'You are not allowed to run this action', 'cost-calculator-builder' ) );
		}

		if ( isset( $_POST['action'] ) && 'ccb_send_pdf' === $_POST['action'] ) {
			$data = json_decode( stripslashes( $_POST['data'] ) );

			$response = array(
				'success'    => false,
				'message'    => 'Invalid params',
				'statusCode' => 400,
			);

			if ( empty( $data->order_id ) ) {
				wp_send_json( $response );
			}

			$ccb_order = CCBOrderController::get_orders_by_id( $data->order_id );

			if ( empty( $ccb_order ) ) {
				$response['message']    = 'Invalid order';
				$response['statusCode'] = 500;
				wp_send_json( $response );
			}

			$file_name = $ccb_order['calc_title'];

			$user_name  = sanitize_text_field( $data->name );
			$user_email = sanitize_email( $data->email );
			$user_mess  = wp_kses_post( $data->message );

			$email_body = self::email_body( $user_name, $user_mess );
			$subject    = $file_name . ' PDF Quote';

			// Adding wp_mail filter
			add_filter( 'wp_mail', array( 'cBuilder\Classes\CCBInvoice', 'attachFilter' ) );

			remove_all_filters( 'wp_mail_from' );
			remove_all_filters( 'wp_mail_from_name' );

			// Saving PDF and getting its path
			$result     = self::save_pdf( $data->pdfString, 'Pdf Quote' );
			$attachment = ! empty( $result['path'] ) ? $result['path'] : array();

			$general_settings = CCBSettingsData::get_calc_global_settings();
			$from_email       = ! empty( $general_settings['invoice']['fromEmail'] ) ? sanitize_text_field( $general_settings['invoice']['fromEmail'] ) : get_option( 'admin_email' );
			$headers          = array(
				'From: Admin <' . $from_email . '>',
				'Content-Type: text/html; charset=UTF-8',
			);

			// Sending email
			$email_send = wp_mail( $user_email, $subject, $email_body, $headers, $attachment );

			if ( $email_send ) {
				wp_delete_attachment( $result['id'] );
			}
		}
	}

	public static function attachFilter( $atts ) {

		$attachment_arrays = array();
		if ( array_key_exists( 'attachments', $atts ) && isset( $atts['attachments'] ) && $atts['attachments'] ) {
			$attachments = $atts['attachments'];
			if ( is_array( $attachments ) && ! empty( $attachments ) ) {
				$is_multidimensional_array = count( $attachments ) == count( $attachments, COUNT_RECURSIVE ) ? false : true; //phpcs:ignore
				if ( ! $is_multidimensional_array ) {
					$attachments = array( $attachments );
				}
				foreach ( $attachments as $index => $attachment ) {
					if ( is_array( $attachment ) && ( array_key_exists( 'path', $attachment ) || array_key_exists( 'string', $attachment ) ) ) {
						$attachment_arrays[] = $attachment;
						if ( $is_multidimensional_array ) {
							unset( $atts['attachments'][ $index ] );
						} else {
							$atts['attachments'] = array();
						}
					}
				}
			}

			global $wp_mail_attachments;
			$wp_mail_attachments = $attachment_arrays;

			add_action(
				'phpmailer_init',
				function( \PHPMailer\PHPMailer\PHPMailer $phpmailer ) {
					$attachment_arrays = array();
					if ( array_key_exists( 'wp_mail_attachments', $GLOBALS ) ) {
						global $wp_mail_attachments;
						$attachment_arrays   = $wp_mail_attachments;
						$wp_mail_attachments = array();
					}

					foreach ( $attachment_arrays as $attachment ) {
						$is_filesystem_attachment = array_key_exists( 'path', $attachment ) ? true : false;
						try {
							$encoding    = $attachment['encoding'] ?? $phpmailer::ENCODING_BASE64;
							$type        = $attachment['type'] ?? '';
							$disposition = $attachment['disposition'] ?? 'attachment';

							if ( $is_filesystem_attachment ) {
								$phpmailer->addAttachment( ( $attachment['path'] ?? null ), ( $attachment['name'] ?? '' ), $encoding, $type, $disposition );
							} else {
								$phpmailer->addStringAttachment( ( $attachment['string'] ?? null ), ( $attachment['filename'] ?? '' ), $encoding, $type, $disposition );
							}
						} catch ( \PHPMailer\PHPMailer\Exception $e ) { continue; } //phpcs:ignore
					}
				}
			);
		}
		return $atts;
	}

	public static function send_pdf_front() {
		check_ajax_referer( 'ccb_send_invoice', 'nonce' );

		if ( isset( $_POST['action'] ) && 'ccb_send_invoice' === $_POST['action'] ) {

			$result = array(
				'success'    => false,
				'message'    => 'Invalid params',
				'statusCode' => 400,
			);

			$data = json_decode( stripslashes( $_POST['data'] ) );

			$calc_id   = ! empty( $data->calc_id ) ? sanitize_text_field( $data->calc_id ) : '';
			$file_name = sanitize_text_field( $data->html_data->pdf_name );

			$user_name    = sanitize_text_field( $data->name );
			$user_email   = sanitize_email( $data->email );
			$user_message = wp_kses_post( $data->message );
			$email_body   = self::email_body( $user_name, $user_message );

			$general_settings = CCBSettingsData::get_calc_global_settings();
			$from_name        = $general_settings['invoice']['fromName'];
			$from_email       = ! empty( $general_settings['invoice']['fromEmail'] ) ? sanitize_text_field( $general_settings['invoice']['fromEmail'] ) : get_option( 'admin_email' );
			$subject          = $file_name . ' PDF Quote';

			if ( isset( $general_settings['invoice']['fromEmail'] ) && is_email( $general_settings['invoice']['fromEmail'] ) ) {
				$from_email = $general_settings['invoice']['fromEmail'];
			}

			$headers = 'From: ' . $from_name . ' <' . $from_email . '>' . "\r\n";
			$headers = $headers . 'Content-Type: text/html; charset=UTF-8';

			add_filter( 'wp_mail', array( 'cBuilder\Classes\CCBInvoice', 'attachFilter' ) );

			remove_all_filters( 'wp_mail_from' );
			remove_all_filters( 'wp_mail_from_name' );

			$html_data = array(
				'order_id'       => $data->order_id,
				'invoice_date'   => $data->html_data->invoice_date,
				'unit_type'      => $data->html_data->unit_type,
				'company_logo'   => $data->html_data->company_logo,
				'company_name'   => $data->html_data->company_name,
				'company_info'   => $data->html_data->company_info,
				'show_payment'   => $data->html_data->show_payment,
				'payment_method' => $data->html_data->payment_method,
				'summary_fields' => $data->html_data->summary_fields,
				'total_summary'  => $data->html_data->total_summary,
				'font_family'    => $data->html_data->font_family,
			);

			// Generate PDF
			$dompdf        = new Dompdf();
			$html          = \cBuilder\Classes\CCBProTemplate::load( 'frontend/invoice/invoice', array( 'data' => $html_data ) ); // phpcs:ignore;
			$fontDirectory = CCB_PRO_PATH . '/dompdf/vendor/dompdf/dompdf/lib/fonts/';
			$options       = $dompdf->getOptions();
			$options->setFontCache( $fontDirectory );
			$options->setChroot( $fontDirectory );
			$options->set( 'isRemoteEnabled', true );
			$options->set( 'pdfBackend', 'CPDF' );

			$dompdf->loadHtml( $html, 'UTF-8' );
			$dompdf->set_option( 'enable_remote', true );
			$dompdf->set_option( 'isHtml5ParserEnabled', true );

			$dompdf->render();

			$pdf_base64 = base64_encode( $dompdf->output() ); //phpcs:ignore

			$result = self::save_pdf( $pdf_base64, 'Pdf Quote' );

			$attachment = ! empty( $result['path'] ) ? $result['path'] : array();

			// Send email to the user-provided email address
			$email_send = wp_mail( $user_email, $subject, $email_body, $headers, $attachment );

			if ( $email_send ) {
				do_action( 'ccb_after_send_invoice', $email_send, $user_email, $subject, $email_body, $headers, $attachment, $result['path'], $calc_id );
				wp_delete_attachment( $result['id'] );
			}
		}
	}

	public static function email_body( $user_name, $user_message ) {
		$user_name    = wp_strip_all_tags( $user_name );
		$user_message = wp_strip_all_tags( $user_message );
		return \cBuilder\Classes\CCBProTemplate::load( 'frontend/invoice/invoice-content', array( 'name' => $user_name, 'message' => $user_message ) ); // phpcs:ignore;
	}

	public static function get_invoice() {
		check_ajax_referer( 'ccb_get_invoice', 'nonce' );

		$dompdf = new Dompdf();
		$data   = json_decode( stripslashes( $_POST['data'] ) );

		$html          = $data->html;
		$fontDirectory = CCB_PRO_PATH . '/dompdf/vendor/dompdf/dompdf/lib/fonts/';

		$options = $dompdf->getOptions();
		$options->setFontCache( $fontDirectory );
		$options->setChroot( $fontDirectory );
		$options->set( 'isRemoteEnabled', true );
		$options->set( 'pdfBackend', 'CPDF' );

		$dompdf->set_option( 'enable_remote', true );
		$dompdf->set_option( 'isHtml5ParserEnabled', true );
		$dompdf->loadHtml( $html, 'UTF-8' );

		$dompdf->render();

		wp_send_json(
			array(
				'base64PDF' => base64_encode( $dompdf->output() ), //phpcs:ignore
			)
		);
	}

	private static function save_pdf( $base64_img, $title ) {

		$upload_dir  = wp_upload_dir();
		$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

		$decoded         = base64_decode( $base64_img ); //phpcs:ignore
		$filename        = $title . '.pdf';
		$file_type       = 'application/pdf';
		$hashed_filename = md5( $filename . microtime() ) . '_' . $filename;

		$upload_file = file_put_contents( $upload_path . $hashed_filename, $decoded ); //phpcs:ignore

		$attachment = array(
			'post_mime_type' => 'application/pdf',
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $hashed_filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit',
			'guid'           => $upload_dir['url'] . '/' . basename( $hashed_filename ),
		);

		$result = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename );

		if ( $result ) {
			return array(
				'id'   => $result,
				'path' => $upload_dir['path'] . '/' . $hashed_filename,
			);
		}
	}
}
