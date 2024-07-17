<div class="dt-sc-three-fifth column first">
	<h2><?php echo get_the_title( $id ); ?></h2>
</div>

<div class="dt-sc-two-fifth column">
	<p class="event-date">
		<span><?php echo date_i18n( 'd', strtotime( $start['date'] ) ); ?></span>
		<?php echo date_i18n( 'F Y', strtotime( $start['date'] ) ); ?>
	</p>
</div>

<?php $class = ( has_post_thumbnail( $id ) ) ? 'has-featured-image' : 'no-featured-image'; ?>
<div class="event-image-wrapper <?php echo $class;?>"><?php
	// Meta Image...
	$meta = get_post_meta($id, '_custom_settings', TRUE);
	$meta = is_array( $meta ) ?  array_filter( $meta )  : array();
	
	if( array_key_exists('event_image', $meta) ):
		$attach_url = wp_get_attachment_url( $meta['event_image'] );
		echo '<img src="'.$attach_url.'" alt="'.esc_attr__('event-img', 'dt-event-manager').'" />';
	endif; ?>
</div>

<div class="dt-sc-three-fifth column first">
	<div class="dt-sc-hr-invisible-small"></div>
	<div class="dt-sc-clear"></div>
	<div class="entry-content">
		<?php the_content();?>
	</div>
</div>

<div class="dt-sc-two-fifth column">
	<div class="dt-sc-tabs-horizontal-frame-container event-meta-tab">
		<ul class="dt-sc-tabs-horizontal-frame">
			<li><a href="#" class="current"><?php esc_html_e('Details', 'dt-event-manager'); ?></span></a></li>
			<?php if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) { ?>
				<li><a href="#"><?php esc_html_e('Organizer', 'dt-event-manager'); ?></a></li>
			<?php } ?>
			<?php if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) { ?>
            	<li><a href="#"><?php esc_html_e('Venue', 'dt-event-manager'); ?></a></li>
			<?php } ?>
		</ul>

		<div class="dt-sc-tabs-horizontal-frame-content">
			<ul class="event-details">
				<li>
					<dt> <i class="fa fa-clock-o"></i> <?php esc_html_e('Start:', 'dt-event-manager'); ?></dt>
					<?php echo date_i18n( 'M d @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ); ?>
				</li>
				<li>
					<dt> <i class="fa fa-clock-o"></i> <?php esc_html_e('End:', 'dt-event-manager'); ?></dt><?php 
					$e_date = date_i18n( 'M d @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );
					if( $settings['interval'] > 0 ) {
						if( array_key_exists('repeat-until', $settings) && !empty( $settings['repeat-until']) ) {
							$e_date = date_i18n('M d', strtotime( $settings['repeat-until'] ) );
							$e_date .= date_i18n( ' @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );
						}
					}
					echo $e_date;?>
				</li>
				<?php if( isset($settings['cost']) && $settings['cost'] > 0 ) {
					$cost = ( $settings['currency-symbol-position'] == 'prefix' ) 
						? $settings['currency-symbol'] . $settings['cost']
						: $settings['cost'] . $settings['currency-symbol'];

					$url = '';
					$label = isset( $settings['purchase-button'] ) ? $settings['purchase-button'] : '';?>
					<li>
						<dt> <i class="fa fa-money"></i> <?php esc_html_e('Cost:', 'dt-event-manager'); ?></dt>
						<?php if( class_exists( 'WooCommerce' ) ) {

								echo get_woocommerce_currency_symbol() . $settings['cost'];

								$direction = esc_attr( WC_Admin_Settings::get_option( 'wc_settings_tab_wcs_redirect', 0 ) );
								$direction = intval( $direction ) === 0 ? 'cart' : 'checkout';
								$url = site_url( "/$direction/?add-to-cart=".$id );

								if( $settings['stock'] > 0 ) {

									if( !empty( $label ) && !empty( $url ) ) {
										echo '<a href="'.esc_url( $url ).'" class="add-to-cart"> <span class="fa fa-shopping-basket"></span>'. $label .'</a>';
									}
								} else {

									$label = isset( $settings['sold-out'] ) ? $settings['sold-out'] : '';
									echo '<span class="sould-out">'.$label.'</span>';
								}
							} else {

								$url = isset( $settings['purchase-button-link'] ) ? $settings['purchase-button-link'] : '';
								echo $cost;

								if( !empty( $label ) && !empty( $url ) ) {
									echo '<a href="'.esc_url( $url ).'" class="external-link"> <span class="fa fa-shopping-basket"></span>'. $label .'</a>';
								}								
							} ?>
					</li>
				<?php } ?>
				<li><?php echo get_the_term_list( $id, 'dt_event_category', '<dt> <i class="fa fa-folder"></i>'.__('Categories:', 'dt-event-manager').'</dt>', ', ' ); ?></li>
				<li><?php echo get_the_term_list( $id, 'dt_event_tag', '<dt> <i class="fa fa-tag"></i>'.__('Tags:', 'dt-event-manager').'</dt>', ', ' ); ?></li>		
			</ul>
		</div>

		<?php if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) { ?>
			<div class="dt-sc-tabs-horizontal-frame-content">
			<?php foreach ( $settings['organizers'] as $organizer ) {
				$meta = get_post_meta($organizer,'_custom_settings',TRUE);
				$meta = is_array( $meta ) ?  array_filter( $meta )  : array();?>
				<div class="event-organizer">
					<h4><a href="<?php echo esc_url( get_permalink( $organizer ) ); ?>"><?php echo get_the_title( $organizer ); ?></a></h4>
					<ul class="organizer-meta">
						<?php if( isset( $meta['phone-no'] ) && !empty( $meta['phone-no'] ) ) { ?>
							<li> 
								<dt> <i class="fa fa-phone"></i> <?php esc_html_e('Phone:', 'dt-event-manager'); ?></dt>
								<?php echo $meta['phone-no']; ?>
							</li>
						<?php } ?>

						<?php if( isset( $meta['website'] ) && !empty( $meta['website'] ) ) { ?>
							<li>
								<dt> <i class="fa fa-globe"></i> <?php esc_html_e('Website:', 'dt-event-manager'); ?></dt>								
								<a href="<?php echo $meta['website']; ?>"><?php echo $meta['website']; ?></a>
							</li>
						<?php } ?>

						<?php if( isset( $meta['email-id'] ) && !empty( $meta['email-id'] ) ) { ?>
							<li>
								<dt> <i class="fa fa-envelope"></i> <?php esc_html_e('Email:', 'dt-event-manager'); ?></dt>
								<a href="mailto:<?php echo esc_attr( $meta['email-id'] ); ?>"><?php echo ( $meta['email-id'] ); ?></a>								
							</li>
						<?php } ?>												
					</ul>
				</div>
			<?php } ?>
			</div>
		<?php } ?>

		<?php if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) {
			$meta = get_post_meta($settings['venue'],'_custom_settings',TRUE);
			$meta = is_array( $meta ) ?  array_filter( $meta )  : array();

			$lat = isset( $meta['latitude'] ) && !empty( $meta['latitude'] ) ? $meta['latitude'] : '';
			$long = isset( $meta['longitude'] ) && !empty( $meta['longitude'] ) ? $meta['longitude'] : ''; ?>
			<div class="dt-sc-tabs-horizontal-frame-content">
		        <div class="event-venue">
		        	<h4><a href="<?php echo esc_url( get_permalink( $settings['venue'] ) ); ?>"><?php echo get_the_title( $settings['venue'] ); ?></a></h4>

		        	<?php if( isset( $meta['address-1'] ) && !empty( $meta['address-1'] ) ) { ?>
		        		<span class="address-1"><?php echo $meta['address-1']; ?></span>
		        	<?php } ?>

		        	<?php if( isset( $meta['address-2'] ) && !empty( $meta['address-2'] ) ) { ?>
		        		<span class="address-2"><?php echo $meta['address-2']; ?></span>
		        	<?php } ?>

		        	<?php if( isset( $meta['city'] ) && !empty( $meta['city'] ) ) { ?>
		        		<span class="city"><?php echo $meta['city']; ?></span>
		        	<?php } ?>

		        	<?php if( isset( $meta['country'] ) && !empty( $meta['country'] ) ) { ?>
		        		<span class="country"><?php echo $meta['country']; ?></span>
		        	<?php } ?>

		        	<?php if( isset( $meta['state-or-province'] ) && !empty( $meta['state-or-province'] ) ) { ?>
		        		<span class="state-or-province"><?php echo $meta['state-or-province']; ?></span>
		        	<?php } ?>

		        	<?php if( isset( $meta['postal-code'] ) && !empty( $meta['postal-code'] ) ) { ?>
		        		<span class="postal-code"><?php echo $meta['postal-code']; ?></span>
		        	<?php } ?>

		        	<ul>
		        		<?php if( isset( $meta['phone-no'] ) && !empty( $meta['phone-no'] ) ) { ?>
		        			<li>
								<dt> <i class="fa fa-phone"></i> <?php esc_html_e('Phone:', 'dt-event-manager'); ?></dt>
		        				<span class="phone-no"><?php echo $meta['phone-no']; ?></span>
		        			</li>
		        		<?php } ?>

		        		<?php if( isset( $meta['website'] ) && !empty( $meta['website'] ) ) { ?>
		        			<li>
								<dt> <i class="fa fa-globe"></i> <?php esc_html_e('Website:', 'dt-event-manager'); ?></dt>		        				
		        				<span class="website"><a href="<?php echo $meta['website']; ?>"><?php echo $meta['website']; ?></a></span>
		        			</li>
		        		<?php } ?>
		        	</ul>
		        </div>
			</div>
		<?php } ?>
	</div>
</div>

<?php if( isset( $settings['show-venue-in-map'] ) && ( !empty( $lat ) && !empty( $long ) )  ) {?>
	<div class="dt-sc-hr-invisible-small"></div>
	<div class="dt-sc-clear"></div>
	<div class="event-google-map">
		<?php echo do_shortcode('[dt_sc_event_venue id="'.$id.'"]'); ?>
	</div>
<?php } ?>