<?php
// phpcs:ignoreFile
$summary_fields = $data['summary_fields'] ?? array();
$unit_type      = $data['unit_type'] ? 'show-unit' : '';
$company_logo   = $data['company_logo'] ?? '';
$company_name   = $data['company_name'] ?? '';
$company_info   = $data['company_info'] ?? '';
$invoice_date   = $data['invoice_date'] ?? '';
$order_id       = $data['order_id'] ?? '';
$total_summary  = is_string( $data['total_summary'] ) ? json_decode( $data['total_summary'], true ) : $data['total_summary'];
$show_payment   = $data['show_payment'] ?? false;
$payment_method = $data['payment_method'] ?? '';
$font_family    = $data['font_family'] ?? 'Arial';

?>

<style>
	.ccb-invoice-company, .ccb-invoice-date, .ccb-invoice-table__header, .ccb-invoice-table__payment span, .ccb-invoice-table__summary ul li .ccb-invoice-row, .ccb-invoice-table__title {
		letter-spacing: normal;
		font-weight: 500;
		font-style: normal;
	}

	.ccb-invoice {
		display: block !important;
		background: #fff;
		font-family: "<?php echo esc_attr( $font_family ); ?>";
		min-width: 700px;
	}

	.calc-subtotal-list-header {
		display: none;
	}


	.show-unit .calc-subtotal-list-header {
		display: flex;
		padding: 2px 10px;
		background-color: #999999;
		width: 94%;
		justify-content: space-between;
		color: #fff;
		margin-left: 10px;
		margin-bottom: 10px;
	}

	.show-unit .ccb-invoice-row__label,
	.show-unit .ccb-invoice-row__value {
		font-style: normal !important;
		font-weight: 700 !important;
		font-size: 14px !important;
		line-height: 14px !important;
	}

	.show-unit .ccb-invoice-row__sub-label,
	.show-unit .ccb-invoice-row__sub-value {
		font-style: normal !important;
		font-weight: 500 !important;
		font-size: 12px !important;
		line-height: 15px !important;
		color: #000 !important;
		opacity: 0.7 !important;
		margin-right: -4px;
	}
	.show-unit .ccb-invoice-row__label {
		width: 49% !important;
	}

	.show-unit .ccb-invoice-row__value {
		width: 49% !important;
	}


	.show-unit .ccb-invoice-row__unit {
		display: inline-block;
		color: #000 !important;
		opacity: 0.7 !important;
		text-align: left;
		width: auto !important;
		margin-bottom: 5px;
	}

	.show-unit .ccb-invoice-table__summary ul li {
		border-bottom: 1px dashed #ccc;
		margin-bottom: 10px;
	}

	.show-unit .ccb-invoice-table__summary ul li:last-child {
		border: none !important;
	}

	.show-unit .ccb-invoice-row {
		margin: 0px !important;
	}

	.show-unit .ccb-invoice-sub-item {
		margin-left: 20px !important;
	}

	.show-unit .ccb-invoice-row__sub-label,
	.show-unit .ccb-invoice-row__sub-value {
		width: auto !important;
		margin-right: 10px !important;
	}

	.show-unit .ccb-invoice-table__total {
		padding-top: 8px;
		border-top: 1px solid #ccc;
	}


	.calc-subtotal-list-header__name,
	.calc-subtotal-list-header__unit,
	.calc-subtotal-list-header__value {
		font-style: normal;
		font-weight: 700;
		font-size: 14px;
		line-height: 14px;
		color: #fff;
	}

	.calc-subtotal-list-header__name {
		width: 49%;
		display: inline-block;
	}

	.calc-subtotal-list-header__unit {
		width: 49%
	}
	.calc-subtotal-list-header__value {
		width: 50%;
		display: inline-block;
		margin: 0;
		padding: 0;
	}

	.calc-subtotal-list-header__value {
		text-align: right;
		width: 50%;
	}

	.ccb-invoice-header {
		margin-bottom: 20px !important;
	}

	.ccb-invoice-company {
		width: 100%;
		color: #000;
		font-size: 14px;
		font-weight: 500;
		line-height: 21px;
		margin-bottom: 30px !important;
	}

	.ccb-invoice-logo {
		width: 50%;
		display: inline-block;
	}

	.ccb-invoice-logo span {
		font-weight: 500;
		font-style: normal;
	}

	.ccb-invoice-logo img {
		max-width: 50%;
		max-height: 150px;
	}

	.ccb-invoice-date {
		font-size: 14px;
		font-weight: 700;
		width: 49%;
		display: inline-block;
		text-align: right;
	}
	.ccb-invoice-date span:first-child {
		margin-right: 10px;
	}

	.ccb-invoice-table__header {
		color: #000;
		font-size: 20px;
		font-weight: 700;
		display: flex;
		padding: 10px 20px !important;
		border: 1px solid #000;
	}
	.ccb-invoice-table__body {
		border: 1px solid transparent;
		border-left-color: #000;
		border-right-color: #000;
		border-bottom-color: #000;
	}


	.ccb-invoice-table__body.hideForm .ccb-invoice-table__summary {
		width: 100%;
		border-right: none;
	}

	.ccb-invoice-table__body.hideForm .ccb-invoice-table__summary {
		width: 100%;
		border-right: none;
	}

	.ccb-invoice-table__total {
		font-size: 16px;
		font-weight: 700;
		font-style: normal;
		width: 95%;
		margin: 10px 20px !important;
		display: flex;
		justify-content: space-between;
		flex-wrap: nowrap;
	}

	.ccb-invoice-table__total .ccb-left {
		display: inline-block;
		width: 49%;
	}

	.ccb-invoice-table__total .ccb-right {
		text-align: right;
		display: inline-block;
		width: 49%;
	}

	.ccb-invoice-table__payment {
		display: block;
		width: 94%;
		margin: 0px 20px !important;
		margin-bottom: 20px !important;
	}

	.ccb-invoice-table__payment div {
		font-size: 14px;
		font-weight: 500;
		width: 50%;
		display: inline-block;
	}

	.ccb-invoice-table__payment div:last-child {
		width: 48%;
		text-align: right;
		font-weight: 700;
	}

	.ccb-invoice-table__table span:last-child {
		width: 49%;
		text-align: right;
	}


	.ccb-invoice-table__title {
		color: #000;
		font-size: 20px;
		font-weight: 700;
		display: block;
		margin: 25px 20px !important;
		width: 90%;
	}

	.ccb-invoice-table__summary {
		width: 100%;
		border: 1px solid transparent;
		display: inline-block;
		padding-right: 30px !important;
		vertical-align: top;
	}

	.ccb-invoice-table__summary ul {
		margin: 0 20px !important;
		width: 95%;
		padding: 0;
		list-style: none;
	}

	.ccb-invoice-table__summary ul li .ccb-invoice-row {
		font-size: 14px;
		font-weight: 500;
		display: block;
		margin-bottom: 10px;
	}
	.ccb-invoice-table__summary ul li .ccb-invoice-row span {
		width: 50%;
		display: inline-block;
	}

	.ccb-invoice-table__summary ul li .ccb-invoice-row span:last-child {
		width: 48%;
		text-align: right;
	}

	.ccb-invoice-table__summary ul li .ccb-invoice-row.ccb-invoice-sub-item {
		font-size: 12px;
		margin-left: 5%;
		width: 95%;
	}


	.ccb-invoice-table__summary ul li:last-child {
		margin-bottom: 22px !important;
	}

	.ccb-invoice-table__summary ul li ul {
		display: flex;
		flex-direction: column;
	}

	.ccb-invoice-table__contact {
		width: 100%;
		display: inline-block;
		border-top: 1px solid #000;
		vertical-align: top;
	}

	.ccb-invoice-table__contact ul {
		padding: 0 !important;
		list-style: none;
		width: 95%;
		margin-left: 20px !important;
	}

	.ccb-invoice-table__contact ul li {
		margin-bottom: 18px !important;
	}

	.ccb-invoice-table__contact ul li span {
		font-size: 12px;
		font-style: normal;
		display: block;
		word-wrap: break-word;
	}

	.ccb-invoice-table__contact ul li .name {
		font-weight: 700;
	}

	.ccb-invoice-table__contact ul li .value {
		font-weight: normal;
	}

	.ccb-invoice-table__contact ul li span:first-child {
		text-transform: capitalize;
	}


	.page {
		page-break-before: always;
		margin: 0;
		padding: 0;
		width: 100%;
		height: 100%;
		position: relative;
		box-sizing: border-box;
	}

	.ccb-discount-wrapper {
		display: flex;
		align-items: center;
		column-gap: 10px;
	}

	.ccb-discount-wrapper .ccb-discount {
		text-decoration: line-through;
	}

	.ccb-discount-off {
		font-size: 10px;
		font-weight: 500;
		color: #ffffff;
		background: #00B163;
		padding: 2px 4px;
		border-radius: 4px;
		vertical-align: middle;
		display: inline;
		line-height: 1.1;
	}
</style>

<div slot="pdf-content" class="sow">
	<div class="ccb-invoice <?php echo esc_attr( $unit_type ); ?>" style="display: none;">
		<div class="ccb-invoice-container">
			<div class="ccb-invoice-header">
				<div class="ccb-invoice-logo">
					<?php if ( empty( $company_logo ) ) : ?>
						<span><?php echo esc_html( $company_name ); ?></span>
					<?php else : ?>
						<img src="<?php echo esc_url( $company_logo ); ?>" alt="Invoice logo">
					<?php endif; ?>
				</div>
				<div class="ccb-invoice-date">
					<span><?php echo esc_html( $invoice_date ); ?></span>
				</div>
			</div>
			<div class="ccb-invoice-company">
				<span>
					<?php echo esc_html( $company_info ); ?>
				</span>
			</div>
			<div class="ccb-invoice-table">
				<div class="ccb-invoice-table__header">
					<span><?php echo __( 'Order', 'cost-calculator-builder-pro' ); ?></span>
					<span><?php echo esc_html( $order_id ); ?></span>
				</div>
				<div class="ccb-invoice-table__body">
					<div class="ccb-invoice-table__summary">
						<span class="ccb-invoice-table__title"><?php echo __( 'Total Summary', 'cost-calculator-builder-pro' ); ?></span>
						<div class="calc-subtotal-list-header">
							<span class="calc-subtotal-list-header__name"><?php echo __( 'Name', 'cost-calculator-builder-pro' ); ?></span>
							<span class="calc-subtotal-list-header__value"><?php echo __( 'Total', 'cost-calculator-builder-pro' ); ?></span>
						</div>

						<ul>
							<?php foreach ( $summary_fields as $item ) : ?>
								<?php
								$field = (array) $item;
								$alias      = $field['alias'] ?? '';
								$field_name = preg_replace( '/_field_id.*/', '', $alias );
								?>
								<?php if ( empty( $field['hidden'] ) && ! empty( $alias ) && ! str_contains( $alias, 'repeater' ) && ! str_contains( $alias, 'group' ) ) : ?>
									<li>
										<span class="ccb-invoice-row">
											<span class="ccb-invoice-row__label" style="text-align: left;"><?php echo esc_html( $field['label'] ); ?></span>
											<?php if ( ! empty( $field['field_type'] ) && in_array( $field['field_type'], array( 'website_url', 'email' ), true ) ) : ?>
												<span class="ccb-invoice-row__value">
													<a target="_blank" href="<?php echo esc_url( $field['converted'] ); ?>"><?php echo esc_html( $field['converted'] ); ?></a>
												</span>
											<?php elseif ( empty( $field['summary_view'] ) || 'show_value' === $field['summary_view'] ) : ?>
												<span class="ccb-invoice-row__value">
													<?php echo esc_html( $field['value'] ); ?>
												</span>
											<?php elseif ( isset( $field['summary_view'] ) && 'show_value' !== $field['summary_view'] && ! empty( $field['extraView'] ) ) : ?>
												<span class="ccb-invoice-row__value"><?php echo esc_html( $field['extraView'] ); ?></span>
											<?php endif; ?>
										</span>

										<?php if ( ! empty( $field['option_unit'] ) && ! str_contains( $alias, 'geolocation' ) ) : ?>
											<span class="ccb-invoice-row ccb-invoice-sub-item">
												<?php if ( ! empty( $unit_type ) ) : ?>
													<span class="ccb-invoice-row__unit"><?php echo esc_html( $field['option_unit'] ); ?></span>
												<?php endif; ?>
											</span>
										<?php endif; ?>

										<?php if ( isset( $field['options'] ) && is_array( $field['options'] ) && count( $field['options'] ) > 0 && in_array( $field_name, array( 'checkbox', 'toggle', 'checkbox_with_img' ), true ) ) : ?>
											<?php foreach ( $field['options'] as $opt ) : ?>
												<?php $option = (array) $opt; ?>
												<span class="ccb-invoice-row ccb-invoice-sub-item">
													<span class="ccb-invoice-row__sub-label"><?php echo esc_html( $option['label'] ); ?></span>
													<span class="ccb-invoice-row__sub-value"><?php echo esc_html( $option['converted'] ); ?></span>
												</span>
											<?php endforeach; ?>
										<?php endif; ?>

										<?php if ( ! empty( $field['userSelectedOptions'] ) ) : ?>
											<span class="ccb-invoice-row ccb-invoice-sub-item">
												<?php if ( empty( $field['userSelectedOptions']->twoPoints ) ) : ?>
													<span style="width: 100%; text-align: left;">
														<span class="ccb-invoice-row__sub-label">
															<a href="<?php echo esc_url( $field['userSelectedOptions']->addressLink ); ?>" target="_blank"><?php echo esc_html( $field['userSelectedOptions']->addressName ); ?></a>
														</span>
													</span>
												<?php endif; ?>

												<?php if ( ! empty( $field['userSelectedOptions']->twoPoints ) ) : ?>
													<span style="width: 100%; text-align: left;">
														<span class="ccb-invoice-row__sub-label" style="width: 100%; text-align: left; display: block;">
															<?php echo __( 'From', 'cost-calculator-builder-pro' ); ?>: <a href="<?php echo esc_url( $field['userSelectedOptions']->twoPoints->from->addressLink ); ?>" target="_blank"><?php echo esc_html( $field['userSelectedOptions']->twoPoints->from->addressName ); ?></a>
														</span>

														<span class="ccb-invoice-row__sub-label" style="width: 100%; text-align: left; display: block;">
															<?php echo __( 'To', 'cost-calculator-builder-pro' ); ?>: <a href="<?php echo esc_url( $field['userSelectedOptions']->twoPoints->to->addressLink ); ?>" target="_blank"><?php echo esc_html( $field['userSelectedOptions']->twoPoints->to->addressName ); ?></a>
														</span>
													</span>
												<?php endif; ?>

												<?php if ( ! empty( $field['userSelectedOptions']->distance ) ) : ?>
													<span style="width: 100%; text-align: left;">
														<span class="ccb-invoice-row__sub-label"><?php echo __( 'Distance', 'cost-calculator-builder-pro' ); ?>:</span>
														<span class="ccb-invoice-row__sub-value" style="margin-left: -5px;"><?php echo esc_html( $field['userSelectedOptions']->distance_view ); ?></span>
													</span>
												<?php endif; ?>

											</span>
										<?php endif; ?>
									</li>
								<?php endif; ?>

								<?php if ( ! empty( $alias ) && str_contains( $alias, 'repeater' ) && count( $field['groupElements'] ) > 0 ) : ?>
									<span class="ccb-invoice-group-title"><?php echo esc_html( $field['label'] ); ?></span>
									<?php foreach ( $field['groupElements'] as $inn_field ) : ?>
										<?php $inner_field = (array) $inn_field; ?>
										<li class="ccb-invoice-group-row" style="padding-left: 10px;">
											<span class="ccb-invoice-row">
												<span class="ccb-invoice-row__label" style="text-align: left;"><?php echo esc_html( $inner_field['label'] ); ?></span>
												<?php if ( ! empty( $inner_field['field_type'] ) && in_array( $inner_field['field_type'], array( 'website_url', 'email' ), true ) ) : ?>
													<span class="ccb-invoice-row__value">
														<a target="_blank" href="<?php echo esc_url( $field['converted'] ); ?>"><?php echo esc_html( $field['converted'] ); ?></a>
													</span>
												<?php elseif ( empty( $inner_field['summary_view'] ) || 'show_value' === $inner_field['summary_view'] ) : ?>
													<span class="ccb-invoice-row__value">
														<?php echo esc_html( $inner_field['converted'] ); ?>
													</span>
												<?php elseif ( ! empty( $inner_field['summary_view'] ) && 'show_value' !== $inner_field['summary_view'] && ! empty( $inner_field['extraView'] ) ) : ?>
													<span class="ccb-invoice-row__value"><?php echo esc_html( $inner_field['extraView'] ); ?></span>
												<?php endif; ?>
											</span>

											<?php if ( ! empty( $inner_field['option_unit'] ) && ! str_contains( $inner_field['alias'], 'geolocation' ) ) : ?>
												<span class="ccb-invoice-row ccb-invoice-sub-item">
													<?php if ( ! empty( $unit_type ) ) : ?>
														<span class="ccb-invoice-row__unit"><?php echo esc_html( $inner_field['option_unit'] ); ?></span>
													<?php endif; ?>
												</span>
											<?php endif; ?>

											<?php
											$inner_field_name = preg_replace( '/_field_id.*/', '', $inner_field['alias'] );
											?>
											<?php if ( isset( $inner_field['options'] ) && is_array( $inner_field['options'] ) && count( $inner_field['options'] ) > 0 && in_array( $inner_field_name, array( 'checkbox', 'toggle', 'checkbox_with_img' ), true ) ) : ?>
												<?php foreach ( $inner_field['options'] as $inner_option ) :
													$inner_option = json_decode( json_encode ($inner_option ), true ); //phpcs:ignore
													?>
													<span class="ccb-invoice-row ccb-invoice-sub-item">
														<span class="ccb-invoice-row__sub-label"><?php echo esc_html( $inner_option['label'] ); ?></span>
														<span class="ccb-invoice-row__sub-value"><?php echo esc_html( $inner_option['converted'] ); ?></span>
													</span>
												<?php endforeach; ?>
											<?php endif; ?>

											<?php if ( ! empty( $field['userSelectedOptions'] ) ) : ?>
												<span class="ccb-invoice-row ccb-invoice-sub-item">
													<?php if ( empty( $inner_field['userSelectedOptions']['twoPoints'] ) ) : ?>
														<span style="width: 100%; text-align: left;">
															<span class="ccb-invoice-row__sub-label">
																<a href="<?php echo esc_url( $inner_field['userSelectedOptions']['addressLink'] ); ?>" target="_blank"><?php echo esc_html( $inner_field['userSelectedOptions']['addressName'] ); ?></a>
															</span>
														</span>
													<?php endif; ?>

													<?php if ( ! empty( $inner_field['userSelectedOptions']['twoPoints'] ) ) : ?>
														<span style="width: 100%; text-align: left;">
															<span class="ccb-invoice-row__sub-label" style="width: 100%; text-align: left; display: block;">
																<?php echo __( 'From', 'cost-calculator-builder-pro' ); ?>: <a href="<?php echo esc_url( $inner_field['userSelectedOptions']['twoPoints']['from']['addressLink'] ); ?>" target="_blank"><?php echo esc_html( $inner_field['userSelectedOptions']['twoPoints']['from']['addressName'] ); ?></a>
															</span>

															<span class="ccb-invoice-row__sub-label" style="width: 100%; text-align: left; display: block;">
																<?php echo __( 'To', 'cost-calculator-builder-pro' ); ?>: <a href="<?php echo esc_url( $inner_field['userSelectedOptions']['twoPoints']['to']['addressLink'] ); ?>" target="_blank"><?php echo esc_html( $inner_field['userSelectedOptions']['twoPoints']['to']['addressName'] ); ?></a>
															</span>
														</span>
													<?php endif; ?>

													<?php if ( ! empty( $inner_field['userSelectedOptions']['distance'] ) ) : ?>
														<span style="width: 100%; text-align: left;">
															<span class="ccb-invoice-row__sub-label"><?php echo __( 'Distance', 'cost-calculator-builder-pro' ); ?>:</span>
															<span class="ccb-invoice-row__sub-value" style="margin-left: -5px;"><?php echo esc_html( $inner_field['userSelectedOptions']['distance_view'] ); ?></span>
														</span>
													<?php endif; ?>

												</span>
											<?php endif; ?>

										</li>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>

						<?php if ( ! empty( $total_summary ) ):  ?>
							<?php foreach ( $total_summary as $sum ) : ?>
								<?php $summary = (array) $sum; ?>
								<span class="ccb-invoice-table__total">
									<span class="ccb-left"><?php echo esc_html( $summary['title'] ?? '' ); ?></span>
									<span class="ccb-right">
										<?php if ( ! empty( $summary['hasDiscount'] ) && $summary['discount'] ) : ?>
											<span style="text-decoration: line-through;">
												<?php echo esc_html( $summary['discount']['original_converted'] ); ?>
											</span>
											<span>
												<?php echo esc_html( $summary['converted'] ); ?>
											</span>
										<?php else : ?>
											<?php echo esc_html( $summary['summary_converted'] ?? '' ); ?>
										<?php endif; ?>
									</span>
								</span>
							<?php endforeach; ?>
						<?php endif; ?>

						<?php if ( $show_payment ) : ?>
							<div class="ccb-invoice-table__payment">
								<div><?php echo __( 'Payment method:', 'cost-calculator-builder-pro' ); ?></div>
								<div><?php echo esc_html( $payment_method ); ?></div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
