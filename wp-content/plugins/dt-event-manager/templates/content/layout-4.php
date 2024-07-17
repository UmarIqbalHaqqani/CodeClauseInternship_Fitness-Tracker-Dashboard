<?php $start = $settings['start-date']; ?>

<h2><?php echo get_the_title( $id ); ?></h2>
<div class="dt-sc-hr-invisible-xsmall"></div>

<div class="dt-sc-one-half column first">

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

	<div class="entry-content">
		<?php the_content();?>
	</div>	
</div>
<div class="dt-sc-one-half column">
	<div class="data-wrapper">
		<span><?php echo date_i18n( 'd', strtotime( $start['date'] ) ); ?></span>
		<?php echo date_i18n( 'F', strtotime( $start['date'] ) ); ?> <br/>
		<?php echo date_i18n( 'l @', strtotime( $start['date'] ) ); ?>
		<i>
			<?php echo date_i18n( 'h i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ); ?>
			<?php echo date_i18n( ' - h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) ); ?>
		</i>
	</div>

	<div class="dt-sc-hr-invisible-xsmall"></div>

	<div class="dt-sc-one-half column first">
		<h3><?php esc_html_e('Details', 'dt-event-manager'); ?></h3>
		<ul class="event-details">
			<li>
				<dt> <i class="fa fa-clock-o"></i> <?php esc_html_e('Start:', 'dt-event-manager'); ?></dt>
				<?php echo date_i18n( 'M d @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ); ?>
			</li>
			<li>
				<dt> <i class="fa fa-clock-o"></i> <?php esc_html_e('End:', 'dt-event-manager'); ?></dt>
				<?php 
					$e_date = date_i18n( 'M d @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );
					if( $settings['interval'] > 0 ) {
						if( array_key_exists('repeat-until', $settings) && !empty( $settings['repeat-until']) ) {
							$e_date = date_i18n('M d', strtotime( $settings['repeat-until'] ) );
							$e_date .= date_i18n( ' @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );
						}
					}
					echo $e_date;
				?>
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
						}?>
				</li>
			<?php } ?>
			<li><?php echo get_the_term_list( $id, 'dt_event_category', '<dt> <i class="fa fa-folder"></i>'.__('Categories:', 'dt-event-manager').'</dt>', ', ' ); ?></li>		
			<li><?php echo get_the_term_list( $id, 'dt_event_tag', '<dt> <i class="fa fa-tag"></i>'.__('Tags:', 'dt-event-manager').'</dt>', ', ' ); ?></li>		
		</ul>
	</div>
	<div class="dt-sc-one-half column">

		<?php if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) { ?>
			<h3><?php esc_html_e('Organizers', 'dt-event-manager'); ?></h3>
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
		<?php } ?>
	</div>

	<div class="dt-sc-clear"></div>
	<?php if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) {

			$venu = get_post_meta($settings['venue'],'_custom_settings',TRUE);
			$venu = is_array( $venu ) ?  array_filter( $venu )  : array();

			$lat = isset( $venu['latitude'] ) && !empty( $venu['latitude'] ) ? $venu['latitude'] : '';
			$long = isset( $venu['longitude'] ) && !empty( $venu['longitude'] ) ? $venu['longitude'] : '';

			if( isset( $settings['show-venue-in-map'] ) && ( !empty( $lat ) && !empty( $long ) )  ) {?>
				<div class="dt-sc-hr-invisible-xsmall"></div>
				<div class="dt-sc-clear"></div>
				<div class="event-google-map">
					<?php echo do_shortcode('[dt_sc_event_venue id="'.$id.'"]'); ?>
				</div><?php
			}
		}?>

	<?php if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) { ?>
		<div class="dt-sc-hr-invisible-small"></div>
        <div class="event-venue">
        	<h4><a href="<?php echo esc_url( get_permalink( $settings['venue'] ) ); ?>"><?php echo get_the_title( $settings['venue'] ); ?></a></h4>
        	<div class="dt-sc-one-half column first">
    			<?php if( isset( $venu['address-1'] ) && !empty( $venu['address-1'] ) ) { ?>
    				<span class="address-1"><?php echo $venu['address-1']; ?></span>
    			<?php } ?>

    			<?php if( isset( $venu['address-2'] ) && !empty( $venu['address-2'] ) ) { ?>
    				<span class="address-2"><?php echo $venu['address-2']; ?></span>
    			<?php } ?>

    			<?php if( isset( $venu['city'] ) && !empty( $venu['city'] ) ) { ?>
    				<span class="city"><?php echo $venu['city']; ?></span>
    			<?php } ?>

    			<?php if( isset( $venu['country'] ) && !empty( $venu['country'] ) ) { ?>
    				<span class="country"><?php echo $venu['country']; ?></span>
    			<?php } ?>

    			<?php if( isset( $venu['state-or-province'] ) && !empty( $venu['state-or-province'] ) ) { ?>
    				<span class="state-or-province"><?php echo $venu['state-or-province']; ?></span>
    			<?php } ?>

    			<?php if( isset( $venu['postal-code'] ) && !empty( $venu['postal-code'] ) ) { ?>
    				<span class="postal-code"><?php echo $venu['postal-code']; ?></span>
    			<?php } ?>
        	</div>
        	<div class="dt-sc-one-half column">
        		<ul>
        			<?php if( isset( $venu['phone-no'] ) && !empty( $venu['phone-no'] ) ) { ?>
        				<li>
							<dt> <i class="fa fa-phone"></i> <?php esc_html_e('Phone:', 'dt-event-manager'); ?></dt>							
        					<span class="phone-no"><?php echo $venu['phone-no']; ?></span>
        				</li>
        			<?php } ?>

        			<?php if( isset( $venu['website'] ) && !empty( $venu['website'] ) ) { ?>
        				<li>
        					<dt> <i class="fa fa-globe"></i> <?php esc_html_e('Website:', 'dt-event-manager'); ?></dt>
        					<span class="website"><a href="<?php echo $venu['website']; ?>"><?php echo $venu['website']; ?></a></span>
        				</li>
        			<?php } ?>
        		</ul>
        	</div>        	
        </div>
	<?php } ?>
</div>