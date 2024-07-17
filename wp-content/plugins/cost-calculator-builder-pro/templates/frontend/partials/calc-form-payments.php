<?php
$btn_width = '100%';

if ( isset( $general_settings['invoice']['showAfterPayment'] ) && ! $general_settings['invoice']['showAfterPayment'] && $general_settings['invoice']['use_in_all'] ) {
	$btn_width = '';
}
?>

<div :class="['ccb-form-payments', { 'disabled': loader }]">
	<div class="calc-item" v-if="payment.status !== 'success'">
		<div class="calc-item-title" style="margin-bottom: 10px">
			<span class="ccb-pro-feature-header"><?php esc_html_e( 'Payment methods', 'cost-calculator-builder-pro' ); ?></span>
			<span class="is-pro">
				<span class="pro-tooltip">
					pro
					<span class="pro-tooltiptext" style="visibility: hidden;">Feature Available <br> in Pro Version</span>
				</span>
			</span>
		</div>

		<div class="calc-item-title" style="margin-bottom: 25px"  v-if="showStripeCard">
			<h4><?php esc_html_e( 'Credit Card details', 'cost-calculator-builder-pro' ); ?></h4>
			<span class="is-pro">
				<span class="pro-tooltip">
					pro
					<span class="pro-tooltiptext" style="visibility: hidden;">Feature Available <br> in Pro Version</span>
				</span>
			</span>
		</div>

		<div class="calc-item ccb-field calc-payments">
			<div class="calc-radio-wrapper default">
				<template v-for="payment in getStaticPayments">
					<label style="margin-right: 15px" v-if="isPaymentEnabled(payment.slug)">
						<div class="calc-payment-header">
							<div class="calc-payment-header--label">
								<input type="radio" name="paymentMethods" :value="payment.value" v-model="paymentMethod">
								<span class="calc-radio-label">{{ payment.label }}</span>
								<span class="is-pro">
									<span class="pro-tooltip">
										pro
										<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
									</span>
								</span>
							</div>
							<div class="calc-payment_header__img">
								<img :src="payment.image" alt="card-payment-image" :style="{'max-width': payment.width}">
							</div>
						</div>
						<div class="calc-payment-body" v-show="payment.has_body && paymentMethod === payment.slug">
							<div v-show="paymentMethod === 'stripe'" style="background: transparent;" :id="'ccb_stripe_' + getSettings.calc_id" class="calc-stripe-wrapper"></div>
							<span class="ccb-payment-description" v-if="payment.description" v-text="payment.description"></span>
						</div>
					</label>
				</template>
			</div>
		</div>
	</div>

	<div v-if="payment.status != 'success'" class="ccb-btn-wrap" style="margin-top: 20px; position: relative">
		<loader-wrapper v-if="loader" :form="true" :idx="getPreloaderIdx" width="60px" height="60px" scale="0.8" :front="true"></loader-wrapper>
		<div class="ccb-btn-container calc-buttons" v-else>
			<button style="width: <?php echo esc_attr( $btn_width ); ?>" class="calc-btn-action success calc-make-payment" v-if="paymentMethod === 'woocommerce_checkout'" @click="applyWoo(<?php the_ID(); ?>)" v-else >
				<?php esc_html_e( 'Add To Cart', 'cost-calculator-builder-pro' ); ?>
			</button>
			<button style="width: <?php echo esc_attr( $btn_width ); ?>" class="calc-btn-action success calc-make-payment" v-else @click.prevent="applyPayment()" :class="{disabled: (!paymentMethod || loader )}" >
				<span><?php esc_html_e( 'Make payment', 'cost-calculator-builder-pro' ); ?></span>
				<i class="ccb-icon-click-out"></i>
			</button>
		</div>
	</div>
</div>
