<?php
/**
 * @package GymBuilder
 */

namespace GymBuilder\Inc\Controllers;

use GymBuilder\Inc\Controllers\Admin\Settings\Api\SettingsApi;
use GymBuilder\Inc\Controllers\Models\GymBuilderMail;
use GymBuilder\Inc\Traits\Constants;
use GymBuilder\Inc\Traits\SingleTonTrait;

class AjaxController {
	use Constants, SingleTonTrait;

	public function init() {
		add_action( 'wp_ajax_gym_builder_insert_members', [ $this, 'gym_builder_insert_members' ] );
		add_action( 'wp_ajax_gym_builder_delete_member', [ $this, 'delete_single_member_data' ] );
		add_action( 'wp_ajax_gym_builder_edit_members', [ $this, 'edit_member_data' ] );
		add_action( 'wp_ajax_gym_builder_send_member_email', [ $this, 'send_member_mail' ] );
	}

	public function gym_builder_insert_members() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'gym_builder_nonce' ) ) {
			wp_send_json_error( 'Nonce verification failed.' );
		}
		global $wpdb;
		$membership_package_type_name = null;
		$membership_package_type_id   = intval( $_POST['packageType'] );
		if ( $membership_package_type_id != null ) {
			$membership_package_type_obj  = get_term_by( 'id', intval( $_POST['packageType'] ), self::$membership_package_taxonomy );
			$membership_package_type_name = $membership_package_type_obj->name;
		}
		$data     = [
			'member_name'               => sanitize_text_field( $_POST['memberName'] ),
			'member_address'            => sanitize_textarea_field( $_POST['memberAddress'] ),
			'member_email'              => sanitize_email( $_POST['memberEmail'] ),
			'member_phone'              => sanitize_text_field( $_POST['memberPhone'] ),
			'member_age'                => intval( $_POST['memberAge'] ),
			'membership_status'         => $_POST['membershipStatus'] ? 1 : 0,
			'member_joining_date'       => sanitize_text_field( date( 'Y-m-d', strtotime( $_POST['memberJoiningDate'] ) ) ),
			'membership_duration_start' => sanitize_text_field( date( 'Y-m-d', strtotime( $_POST['membershipDuration'][0] ) ) ),
			'membership_duration_end'   => sanitize_text_field( date( 'Y-m-d', strtotime( $_POST['membershipDuration'][1] ) ) ),
			'member_gender'             => sanitize_text_field( $_POST['memberGender'] ),
			'membership_package_type'   => sanitize_text_field( $membership_package_type_name ),
			'membership_package_name'   => sanitize_text_field( $_POST['packageName'] ),
			'membership_classes'        => sanitize_text_field( $_POST['classesName'] ),
			'file_url'                  => esc_url_raw( $_POST['fileUrl'] )
		];
		$inserted = $wpdb->insert(
			"{$wpdb->prefix}gym_builder_members",
			$data,
			[
				'%s',
				'%s',
				'%s',
				'%s',
				'%d',
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			]
		);

		if ( $inserted ) {
			wp_send_json_success( __( 'Member added successfully.', 'gym-builder' ) );
		} else {
			wp_send_json_error( __( 'Failed to add member.', 'gym-builder' ) );
		}

	}

	public function delete_single_member_data() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'gym_builder_nonce' ) ) {
			wp_send_json_error( 'Nonce verification failed.' );
		}
		$member_id = isset( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;
		if ( $member_id <= 0 ) {
			wp_send_json_error( 'Invalid member ID.' );
		}
		global $wpdb;
		$table_name    = $wpdb->prefix . 'gym_builder_members';
		$delete_sql    = $wpdb->prepare( "DELETE FROM $table_name WHERE id = %d", $member_id );
		$delete_result = $wpdb->query( $delete_sql );
		if ( $delete_result !== false ) {
			wp_send_json_success( __( 'Member deleted successfully.', 'gym-builder' ) );
		} else {
			wp_send_json_error( __( 'Failed to delete member.', 'gym-builder' ) );
		}

	}

	public function edit_member_data() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'gym_builder_nonce' ) ) {
			wp_send_json_error( 'Nonce verification failed.' );
		}
		$member_id = isset( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;
		if ( $member_id <= 0 ) {
			wp_send_json_error( 'Invalid member ID.' );
		}
		global $wpdb;
		$membership_package_type_name = null;
		$membership_package_type_id   = intval( $_POST['packageType'] );
		if ( $membership_package_type_id != null ) {
			$membership_package_type_obj  = get_term_by( 'id', intval( $_POST['packageType'] ), self::$membership_package_taxonomy );
			$membership_package_type_name = $membership_package_type_obj->name;
		}
		$data    = [
			'member_address'            => sanitize_textarea_field( $_POST['memberAddress'] ),
			'member_email'              => sanitize_email( $_POST['memberEmail'] ),
			'member_phone'              => sanitize_text_field( $_POST['memberPhone'] ),
			'member_age'                => intval( $_POST['memberAge'] ),
			'membership_status'         => $_POST['membershipStatus'] ? 1 : 0,
			'membership_duration_start' => sanitize_text_field( date( 'Y-m-d', strtotime( $_POST['membershipDuration'][0] ) ) ),
			'membership_duration_end'   => sanitize_text_field( date( 'Y-m-d', strtotime( $_POST['membershipDuration'][1] ) ) ),
			'membership_package_type'   => sanitize_text_field( $membership_package_type_name ),
			'membership_package_name'   => sanitize_text_field( $_POST['packageName'] ),
			'membership_classes'        => sanitize_text_field( $_POST['classesName'] ),
			'file_url'                  => esc_url_raw( $_POST['fileUrl'] )
		];
		$updated = $wpdb->update(
			"{$wpdb->prefix}gym_builder_members",
			$data,
			[ 'id' => $member_id ],
			[
				'%s',
				'%s',
				'%s',
				'%d',
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			]

		);
		if ( $updated ) {
			wp_send_json_success( __( 'Member Info Updated successfully.', 'gym-builder' ) );
		} else {
			wp_send_json_error( __( 'Failed updated member info.', 'gym-builder' ) );
		}

	}

	public function send_member_mail() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'gym_builder_nonce' ) ) {
			wp_send_json_error( 'Nonce verification failed.' );
		}

		$name    = sanitize_text_field( $_POST['name'] );
		$email_to   = sanitize_email( $_POST['email'] );
		$message = sanitize_textarea_field( $_POST['message'] );
		$mail_subject   = esc_html__( 'Hello '.$name, 'gym-builder' );
		$mail_from_name = SettingsApi::get_option( 'member_id_generate_title', 'gym_builder_global_settings' ) ?: get_bloginfo( 'name' );
		$mail_from = SettingsApi::get_option( 'member_sender_mail', 'gym_builder_global_settings' ) ?: wp_get_current_user()->data->user_email;
		$email_args = [
			'to'        => $email_to,
			'subject'   => $mail_subject,
			'mail_body' => $message,
			'from'      => $mail_from,
			'from_name' => $mail_from_name,
		];

		if (isset($_FILES['mail_file'])){
			$email_args['file'] = $_FILES;
			$mail_sent = GymBuilderMail::send_mail(true,$email_args);
		}else{
			$mail_sent = GymBuilderMail::send_mail(false,$email_args);
		}

		if ($mail_sent){
			wp_send_json_success( __( 'Mail Sent successfully.', 'gym-builder' ) );
		}else{
			wp_send_json_error( __( 'Failed to mail sent.', 'gym-builder' ) );
		}

	}
}