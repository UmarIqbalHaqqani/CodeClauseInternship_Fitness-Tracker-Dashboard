<div class="ccb-grid-box email">
	<div class="container">
		<div class="row">
			<div class="col">
				<span class="ccb-tab-title"><?php esc_html_e( 'Email', 'cost-calculator-builder-pro' ); ?></span>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row ccb-p-t-15">
			<div class="col">
				<div class="list-header">
					<div class="ccb-switch">
						<input type="checkbox" v-model="generalSettings.form_fields.use_in_all"/>
						<label></label>
					</div>
					<h6 class="ccb-heading-5"><?php esc_html_e( 'Apply for all calculators', 'cost-calculator-builder-pro' ); ?></h6>
				</div>
			</div>
		</div>
		<div class="ccb-settings-property" :class="{'ccb-settings-disabled': !generalSettings.form_fields.use_in_all}">
			<div class="row ccb-p-t-15">
				<div class="col col-3">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Order Notification Email', 'cost-calculator-builder-pro' ); ?></span>
						<input type="email" v-model="generalSettings.form_fields.adminEmailAddress" placeholder="<?php esc_attr_e( 'Enter your email', 'cost-calculator-builder-pro' ); ?>" autocomplete="off">
					</div>
				</div>
				<?php do_action( 'ccb_contact_form_general_add_email_fields' ); ?>
				<div class="col col-3">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Subject', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.form_fields.emailSubject" placeholder="<?php esc_attr_e( 'Enter subject', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-3">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.form_fields.submitBtnText" maxlength="70" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-3">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Open Form Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.form_fields.openModalBtnText" maxlength="70" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-12 ccb-p-t-15">
					<div class="list-header">
						<div class="ccb-switch">
							<input type="checkbox" v-model="generalSettings.form_fields.order_id_in_subject"/>
							<label></label>
						</div>
						<h6 class="ccb-heading-5"><?php esc_html_e( 'Add an order ID to subject line', 'cost-calculator-builder-pro' ); ?></h6>
					</div>
				</div>
			</div>

			<div class="ccb-m-t-15 ccb-terms-cond-wrapper">
				<div class="row">
					<div class="col col-12">
						<div class="list-header">
							<div class="ccb-switch">
								<input type="checkbox" v-model="generalSettings.form_fields.summary_display.use_in_all"/>
								<label></label>
							</div>
							<h6 class="ccb-heading-5"><?php esc_html_e( 'Show Summary with calculations after adding contact info', 'cost-calculator-builder-pro' ); ?></h6>
						</div>
					</div>
				</div>
				<div class="row ccb-p-t-15" v-if="generalSettings.form_fields.summary_display.use_in_all" :class="{'ccb-settings-disabled': !generalSettings.form_fields.summary_display.use_in_all}">
					<div class="col col-6">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Contact info form title', 'cost-calculator-builder-pro' ); ?></span>
							<input type="text" v-model="generalSettings.form_fields.summary_display.form_title" placeholder="<?php esc_attr_e( 'Enter title here', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
					<div class="col col-6">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Submit button text', 'cost-calculator-builder-pro' ); ?></span>
							<input type="text" v-model="generalSettings.form_fields.summary_display.submit_btn_text" placeholder="<?php esc_attr_e( 'Enter text here', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
					<div class="col-12 ccb-p-t-15">
						<span class="ccb-field-title"><?php esc_html_e( 'Action options after submitting the form', 'cost-calculator-builder-pro' ); ?></span>
						<div class="ccb-radio-wrapper" style="margin-top: 5px; flex-direction: column; row-gap: 10px">
							<label style="column-gap: 10px;">
								<input type="radio" v-model="generalSettings.form_fields.summary_display.action_after_submit" name="action_after_submit" value="send_to_email" checked>
								<span class="ccb-heading-5"><?php esc_html_e( 'Send a quote and invoice to customer\'s email', 'cost-calculator-builder-pro' ); ?></span>
							</label>
							<label style="column-gap: 10px;">
								<input type="radio" v-model="generalSettings.form_fields.summary_display.action_after_submit" name="action_after_submit" value="show_summary_block">
								<span class="ccb-heading-5"><?php esc_html_e( 'Show calculations on Summary block', 'cost-calculator-builder-pro' ); ?></span>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="ccb-m-t-15 ccb-terms-cond-wrapper">
				<div class="row">
					<div class="col col-6">
						<div class="list-header">
							<div class="ccb-switch">
								<input type="checkbox" v-model="generalSettings.form_fields.terms_use_in_all"/>
								<label></label>
							</div>
							<h6 class="ccb-heading-5 terms-condition-preview"><?php esc_html_e( 'Enable Terms & Conditions Agreement', 'cost-calculator-builder-pro' ); ?>
								<div class="ccb-preview">
									<span class="ccb-preview__title">
										<?php esc_html_e( 'Preview', 'cost-calculator-builder-pro' ); ?>
										<div class="ccb-preview__wrapper">
											<div class="ccb-preview__img" style="background-image: url('<?php echo esc_attr( CALC_URL . '/images/terms-and-conditions.jpg' ); ?>')"></div>
										</div>
									</span>
								</div>
							</h6>
						</div>
					</div>
				</div>
				<div class="row ccb-p-t-15" v-if="generalSettings.form_fields.terms_use_in_all" :class="{'ccb-settings-disabled': !generalSettings.form_fields.terms_use_in_all}">
					<div class="col col-3">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Checkbox Label', 'cost-calculator-builder-pro' ); ?></span>
							<input type="text" maxlength="40" v-model="generalSettings.form_fields.terms_and_conditions.text" placeholder="<?php esc_attr_e( 'Enter label', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
					<div class="col col-3">
						<div class="ccb-select-box">
							<span class="ccb-select-label">
								<?php esc_html_e( 'Choose Page to Link', 'cost-calculator-builder-pro' ); ?>
							</span>
							<div class="ccb-select-wrapper">
								<i class="ccb-icon-Path-3485 ccb-select-arrow"></i>
								<select class="ccb-select" v-model="generalSettings.form_fields.terms_and_conditions.page_id">
									<option value="" selected><?php esc_html_e( 'Select page', 'cost-calculator-builder-pro' ); ?></option>
									<option :value="page.id" :title="page.tooltip" v-for="page in $store.getters.getPagesAll">{{ page.title }}</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col col-3">
						<div class="ccb-input-wrapper">
							<span class="ccb-input-label"><?php esc_html_e( 'Linked Page Title', 'cost-calculator-builder-pro' ); ?></span>
							<input type="text" maxlength="20" v-model="generalSettings.form_fields.terms_and_conditions.link_text" placeholder="<?php esc_attr_e( 'Enter title', 'cost-calculator-builder-pro' ); ?>">
						</div>
					</div>
				</div>
				<div class="row" v-if="generalSettings.form_fields.terms_use_in_all">
					<div class="col-3">
						<span class="ccb-terms-span-desc"><?php esc_html_e( 'Enter no more than 40 symbols in this field' ); ?></span>
					</div>
					<div class="col-3"></div>
					<div class="col-3">
						<span class="ccb-terms-span-desc"><?php esc_html_e( 'Enter no more than 20 symbols in this field' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div v-if="generalSettings.invoice.use_in_all" class="container">
		<div class="row ccb-p-t-15">
			<div class="col">
				<div class="list-header">
					<div class="ccb-switch">
						<input type="checkbox" v-model="generalSettings.invoice.emailButton"/>
						<label></label>
					</div>
					<h6 class="ccb-heading-5 email-quote-preview"><?php esc_html_e( 'Email Quote Button', 'cost-calculator-builder-pro' ); ?>
						<div class="ccb-preview">
							<span class="ccb-preview__title">
								<?php esc_html_e( 'Preview', 'cost-calculator-builder-pro' ); ?>
								<div class="ccb-preview__wrapper">
									<div class="ccb-preview__img" style="background-image: url('<?php echo esc_attr( CALC_URL . '/images/send-email.jpg' ); ?>')"></div>
								</div>
							</span>
						</div>
					</h6>
				</div>
			</div>
		</div>
		<div class="ccb-settings-property" :class="{'ccb-settings-disabled': !generalSettings.invoice.emailButton}">
			<div class="row ccb-p-t-15">
				<div class="col col-6">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Submit Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.invoice.submitBtnText" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-4">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Email Quote Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.invoice.btnText" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-4">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Close Quote Button Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.invoice.closeBtn" placeholder="<?php esc_attr_e( 'Enter button text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
			</div>
			<div class="row ccb-p-t-15">
				<div class="col col-6">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Email Quote Success Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.invoice.successText" placeholder="<?php esc_attr_e( 'Enter success text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
				<div class="col col-6">
					<div class="ccb-input-wrapper">
						<span class="ccb-input-label"><?php esc_html_e( 'Email Quote Error Text', 'cost-calculator-builder-pro' ); ?></span>
						<input type="text" v-model="generalSettings.invoice.errorText" placeholder="<?php esc_attr_e( 'Enter error text', 'cost-calculator-builder-pro' ); ?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row ccb-p-t-15">
			<div class="col col-4">
				<div class="ccb-input-wrapper">
					<span class="ccb-input-label"><?php esc_html_e( 'Sender Email', 'cost-calculator-builder-pro' ); ?></span>
					<input type="email" v-model="generalSettings.invoice.fromEmail" placeholder="<?php esc_attr_e( 'From Email', 'cost-calculator-builder-pro' ); ?>" autocomplete="off">
				</div>
			</div>
			<div class="col col-4">
				<div class="ccb-input-wrapper">
					<span class="ccb-input-label"><?php esc_html_e( 'Sender Name', 'cost-calculator-builder-pro' ); ?></span>
					<input type="text" v-model="generalSettings.invoice.fromName" placeholder="<?php esc_attr_e( 'From Name', 'cost-calculator-builder-pro' ); ?>">
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row ccb-p-t-20">
			<div class="col-3">
				<button class="ccb-button success ccb-settings" @click="saveGeneralSettings"><?php esc_html_e( 'Save', 'cost-calculator-builder-pro' ); ?></button>
			</div>
		</div>
	</div>
</div>
