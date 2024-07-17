<?php

namespace cBuilder\Classes\Payments;

use cBuilder\Classes\CCBPayments;

class CCBCashPayment extends CCBPayments {
	public static function render() {
		$paymentData = array(
			'type'     => 'cash_payment',
			'currency' => self::$settings['currency']['currency'],
			'total'    => self::$total,
		);

		CCBPayments::makePaid( self::$params['order_id'], $paymentData );

		return array(
			'success' => true,
			'reload'  => true,
			'status'  => 'success',
			'message' => esc_html__( 'Payment Received! Thank You for Payment', 'cost-calculator-builder-pro' ),
		);
	}
}
