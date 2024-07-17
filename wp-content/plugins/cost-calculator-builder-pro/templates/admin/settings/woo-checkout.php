<?php
$desc_url = 'https://docs.stylemixthemes.com/cost-calculator-builder/pro-plugin-features/woo-checkout';
?>
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) : ?>
	<div class="ccb-grid-box">
		<div class="container">
			<div class="row ccb-p-t-15">
				<div class="col">
					<span class="ccb-tab-title"><?php esc_html_e( 'Woo Checkout', 'cost-calculator-builder-pro' ); ?></span>
				</div>
			</div>
			<div class="row ccb-p-t-20">
				<div class="col">
					<div class="list-header">
						<div class="ccb-switch">
							<input type="checkbox" v-model="settingsField.woo_checkout.enable"/>
							<label></label>
						</div>
						<h6 class="ccb-heading-5"><?php esc_html_e( 'WooCommerce Checkout', 'cost-calculator-builder-pro' ); ?></h6>
					</div>
				</div>
			</div>
			<div class="ccb-settings-property" :class="{'ccb-settings-disabled': !settingsField.woo_checkout.enable}">
				<div class="row ccb-p-t-20">
					<div class="col">
						<div class="list-header">
							<div class="ccb-switch">
								<input type="checkbox" v-model="settingsField.woo_checkout.replace_product"/>
								<label></label>
							</div>
							<h6 class="ccb-heading-5"><?php esc_html_e( 'Replace Product', 'cost-calculator-builder-pro' ); ?></h6>
						</div>
					</div>
				</div>
				<div class="row ccb-p-t-15">
					<div class="col-6">
						<div class="ccb-select-box">
							<span class="ccb-select-label"><?php esc_html_e( 'Product', 'cost-calculator-builder-pro' ); ?></span>
							<div class="ccb-select-wrapper">
								<i class="ccb-icon-Path-3485 ccb-select-arrow"></i>
								<select class="ccb-select" v-model="settingsField.woo_checkout.product_id">
									<option value="" selected disabled><?php esc_html_e( 'Select WooCommerce Product', 'cost-calculator-builder-pro' ); ?></option>
									<option value="current_product" v-if="settingsField.woo_products.enable"><?php esc_html_e( '%Current Woo Product%', 'cost-calculator-builder-pro' ); ?></option>
									<option v-for="(product, index) in $store.getters.getProducts" :key="index" :value="product.ID">{{product.post_title}}</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row ccb-p-t-15">
					<div class="col-10">
						<span class="ccb-field-title"><?php esc_html_e( 'Action after Submits', 'cost-calculator-builder-pro' ); ?></span>
						<div class="ccb-radio-wrapper" style="margin-top: 5px; column-gap: 15px;">
							<label style="column-gap: 5px">
								<input type="radio" v-model="settingsField.woo_checkout.redirect_to" name="redirect_to" value="cart" checked>
								<span class="ccb-heading-5"><?php esc_html_e( 'Redirect to Cart Page', 'cost-calculator-builder-pro' ); ?></span>
							</label>
							<label style="column-gap: 5px">
								<input type="radio" v-model="settingsField.woo_checkout.redirect_to" name="redirect_to" value="checkout">
								<span class="ccb-heading-5"><?php esc_html_e( 'Redirect to Checkout Page', 'cost-calculator-builder-pro' ); ?></span>
							</label>
							<label style="column-gap: 5px">
								<input type="radio" v-model="settingsField.woo_checkout.redirect_to" name="redirect_to" value="stay">
								<span class="ccb-heading-5"><?php esc_html_e( 'Stay on Page', 'cost-calculator-builder-pro' ); ?></span>
							</label>
						</div>
					</div>
				</div>
				<div class="row ccb-p-t-15">
					<div class="col-9">
						<span class="ccb-field-title">
							<?php esc_html_e( 'Total Field Element', 'cost-calculator-builder-pro' ); ?>
						</span>
						<span class="ccb-field-totals">
							<label class="ccb-field-totals-item ccb-default-title" v-for="formula in getFormulaFields" :for="'woo_checkout_' + formula.idx">{{ formula.title | to-short-description }}</label>
						</span>
						<span class="ccb-multiselect-overlay"></span>
						<div class="ccb-select-box" style="position: relative">
							<div class="multiselect">
								<span v-if="formulas.length > 0" class="anchor ccb-heading-5 ccb-light-3 ccb-selected" @click.prevent="multiselectShow(event)" style="padding-right: 25px">
									<span class="ccb-multi-select-icon">
										<i class="ccb-icon-Path-3483"></i>
									</span>
									<template v-for="formula in formulas">
										<span class="selected-payment">
											 <i class="ccb-icon-Path-3516"></i>
											{{ formula.title | to-short-input }}
											<i class="ccb-icon-close" @click.self="removeIdx( formula )" :class="{'settings-item-disabled': getTotalsIdx.length === 1 && getTotalsIdx.includes(+formula.idx)}"></i>
										</span>
										<span class="ccb-formula-custom-plus">+</span>
									</template>
								</span>
								<span v-else class="anchor ccb-heading-5 ccb-light-3" @click.prevent="multiselectShow(event)">
									<?php esc_html_e( 'Select totals', 'cost-calculator-builder-pro' ); ?>
								</span>
								<input name="options" type="hidden" />
							</div>

							<ul class="items row-list settings-list totals custom-list" style="max-width: 100% !important; left: 0; right: 0">
								<li class="option-item settings-item" v-for="formula in getFormulaFields" :class="{'settings-item-disabled': getTotalsIdx.length === 1 && getTotalsIdx.includes(+formula.idx)}" @click="(e) => autoSelect(e, formula)">
									<input :id="'woo_checkout_' + formula.idx" :checked="getTotalsIdx.includes(+formula.idx)" name="wooCheckoutTotals" class="index" type="checkbox" @change="multiselectChooseTotals(formula)"/>
									<label :for="'woo_checkout_' + formula.idx" class="ccb-heading-5">{{ formula.title | to-short }}</label>
								</li>
							</ul>

							<div class="ccb-select-description ccb-tab-subtitle" style="margin-top: 20px">
								<?php esc_html_e( "Connect your selling service or product to online payment systems using the connection shortcode. Note that the 'Total Name' field will be renamed to 'Total'.", 'cost-calculator-builder-pro' ); ?>
								<a href="<?php echo esc_attr( $desc_url ); ?>" target="_blank"><?php esc_html_e( 'Learn More', 'cost-calculator-builder-pro' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="ccb-woo-not-installed">
		<div class="ccb-woo-not-installed-container">
			<div class="ccb-woo-not-installed-logo">
				<img src="<?php echo esc_url( CALC_URL . '/frontend/dist/img/woo_logo.png' ); ?>" alt="woo logo">
			</div>
			<div class="ccb-woo-not-installed-title-box">
				<span class="ccb-woo-title"><?php esc_html_e( 'WooCommerce not installed', 'cost-calculator-builder-pro' ); ?></span>
				<span class="ccb-woo-description"><?php esc_html_e( 'To use WooProduct and WooCheckout, please install and activate WooCommerce Plugin', 'cost-calculator-builder-pro' ); ?></span>
			</div>
			<div class="ccb-woo-not-installed-action">
				<a class="ccb-button ccb-href success" href="<?php echo esc_url( admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' ) ); ?>">
					<?php esc_html_e( 'Install WooCommerce', 'cost-calculator-builder-pro' ); ?>
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>
