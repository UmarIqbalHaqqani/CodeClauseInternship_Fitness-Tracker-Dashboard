<?php

namespace cBuilder\Classes\Payments;

use cBuilder\Classes\CCBPayments;
use cBuilder\Classes\Database\Orders;
use Razorpay\Api\Api;

class CCBRazorPay extends CCBPayments {
	public static function render() {
		$api_key    = self::$paymentSettings['keyId'];
		$api_secret = self::$paymentSettings['secretKey'];
		$api        = new Api( $api_key, $api_secret );
		$message    = 'Something went wrong';

		try {
			if ( $api->customer->all() ) {
				$orderData = array(
					'receipt'  => strval( self::$params['order_id'] ),
					'amount'   => self::$total * 100,
					'currency' => self::$paymentSettings['currency'],
				);

				$name  = self::$customer['name'] ?? '';
				$email = self::$customer['email'] ?? '';
				$phone = self::$customer['phone'] ?? '';

				$ccb_order = Orders::get_order_by_id( array( 'id' => self::$params['order_id'] ) );
				$order     = $ccb_order[0] ?? null;

				if ( ! is_null( $order ) && ( empty( $name ) || empty( $email ) || empty( $phone ) ) ) {
					$formDetails = json_decode( $order['form_details'] );
					if ( isset( $formDetails->fields ) ) {
						foreach ( $formDetails->fields as $detail ) {
							if ( empty( $email ) && in_array( $detail->name, array( 'your-email', 'email' ), true ) ) {
								$email = $detail->value;
							}

							if ( empty( $phone ) && in_array( $detail->name, array( 'your-phone', 'phone' ), true ) ) {
								$phone = $detail->value;
							}

							if ( empty( $name ) && in_array( $detail->name, array( 'your-name', 'name' ), true ) ) {
								$name = $detail->value;
							}
						}
					}
				}

				$razorpayOrder   = $api->order->create( $orderData );
				$razorpayOrderId = $razorpayOrder->id;

				$data = array(
					'amount'   => self::$total * 100,
					'currency' => self::$paymentSettings['currency'],
					'name'     => self::$params['item_name'] ?? '',
					'order_id' => $razorpayOrderId,
					'notes'    => array(
						'ccb_order_id' => self::$params['order_id'],
					),
					'prefill'  => array(
						'name'  => $name,
						'email' => $email,
						'phone' => $phone,
					),
					'theme'    => array(
						'color' => '#1AB163',
					),
				);

				return array(
					'success' => true,
					'status'  => 'success',
					'message' => esc_html__( 'Payment Received! Thank You for Payment', 'cost-calculator-builder-pro' ),
					'data'    => $data,
				);
			}
		} catch( \Exception $e ){ //phpcs:ignore
			$message = $e->getMessage();
			ccb_write_log( 'Razorpay auth error: ' . $message );
		}

		return array(
			'success' => false,
			'status'  => 'error',
			'message' => $message,
		);
	}

	public static function paymentReceived() {
		check_ajax_referer( 'ccb_razorpay_receive', 'nonce' );

		$result = array(
			'success' => false,
			'message' => 'Something went wrong',
		);

		if ( isset( $_POST['data'] ) ) {
			$data = json_decode( stripslashes( $_POST['data'] ) );

			$totals = array();
			$other_totals = array();

			if ( ! empty( $data->totals ) ) {
				$totals = json_decode( json_encode( $data->totals ), true );
			}

			if ( ! empty( $data->otherTotals ) ) {
				$other_totals = json_decode( json_encode( $data->otherTotals ), true );
			}

			if ( empty( $data->orderId ) ) {
				$result['message'] = 'Order id required';
				wp_send_json( $result );
			}

			$orders = Orders::get_order_by_id( array( 'id' => $data->orderId ) );
			$order  = isset( $orders[0] ) ? $orders[0] : null;

			if ( ! is_null( $order ) ) {
				$paymentData = array(
					'type'     => 'razorpay',
					'currency' => $order['paymentCurrency'],
				);

				CCBPayments::makePaid( $data->orderId, $paymentData, $totals, $other_totals );
			}
		}

		wp_send_json( $result );

	}
}
