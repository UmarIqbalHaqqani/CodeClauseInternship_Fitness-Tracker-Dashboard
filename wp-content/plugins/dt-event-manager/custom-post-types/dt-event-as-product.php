<?php
if (! class_exists ( 'DTEventAsProduct' ) ) {

	class DTEventAsProduct {

		function __construct() {

			if( ! class_exists( 'WooCommerce' ) ) {
				return;
			}

			add_action( 'init', array( $this, 'dt_event_data_store_class' ), 10 );
			add_filter( 'woocommerce_data_stores', array( $this, 'dt_event_data_store' ) );
			add_filter( 'cs_save_post', array( $this, 'dt_event_save_post' ), 10, 3 );

			add_action( 'woocommerce_add_cart_item_data', array( $this, 'add_dt_event_item_meta' ), 10, 2 );
			add_filter( 'woocommerce_get_item_data', array( $this, 'get_dt_event_item_meta'), 10, 2 );
			add_action( 'woocommerce_add_order_item_meta', array( $this , 'add_dt_event_items_meta_to_order' ), 1, 2 );
			add_filter( 'woocommerce_hidden_order_itemmeta', array( $this, 'hidden_dt_event_items_order_itemmeta' ), 10, 1);

			add_action( 'woocommerce_reduce_order_stock', array( $this, 'dt_wc_reduce_order_stock' ), 10, 1 );

			add_action( 'add_meta_boxes', array( $this, 'dt_event_booking_list') );

			add_filter( 'body_class', array( $this, 'dt_event_body_class' ) );
		}

		function dt_event_data_store_class() {
			require_once 'dt-event-data-store-cpt.php';
		}

		function dt_event_data_store( $stores ) {
			$stores['product'] = 'DT_Event_Data_Store_CPT';
			return $stores;
		}

		function dt_event_save_post( $request, $request_key, $post ) {

			if( $post->post_type == 'dt_event' ) {

				do_action( 'woocommerce_process_product_meta', $post->ID, $post );

				if( empty( $request['cost'] ) ) {
					delete_post_meta( $post->ID, '_price' );
					delete_post_meta( $post->ID, '_regular_price' );
				} else {
					update_post_meta( $post->ID, '_regular_price',  $request['cost'] );
					update_post_meta( $post->ID, '_price',  $request['cost'] );
				}

				if( empty( $request['stock'] ) ) {
					delete_post_meta( $post->ID, '_stock' );
					delete_post_meta( $post->ID, '_manage_stock' );
				} else {
					update_post_meta( $post->ID, '_stock',  $request['stock'] );
					update_post_meta( $post->ID, '_manage_stock', 'yes' );
				}				
			}

			return $request;
		}

		/**
		 *  Add Event Meta to Cart
		 */
		function add_dt_event_item_meta( $cart_item_data, $product_id ) {

			if( get_post_type( $product_id ) !== 'dt_event' ) {

				return $cart_item_meta;
			} else {

				$label_date = __('Date', 'dt-event-manager');
				$label_category = __('Category', 'dt-event-manager');
				$label_organizers = __('Organizer', 'dt-event-manager');
				$label_location = __('Location', 'dt-event-manager');

				$settings = get_post_meta ( $product_id, '_custom_settings', TRUE );
				$settings = is_array ( $settings ) ? $settings : array ();

				$start = isset( $settings['start-date'] ) ? $settings['start-date'] : '';
				$s = $timestamp = '';
				if( !empty( $start ) ) {
					$timestamp = strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' );
					$s = date_i18n( 'l, F j @ H:i', $timestamp );
				}

				$cart_item_meta['_event_id'] = $product_id;

				$cart_item_meta['_event_date_label'] = $label_date;
				$cart_item_meta['_event_date'] = $s;

				$cart_item_meta['_event_timestamp'] = $timestamp;

				$cart_item_meta['_event_category_label'] = $label_category;
				$cart_item_meta['_event_category'] = get_the_term_list( $product_id, 'dt_event_category', '',',', '' );

				$cart_item_meta['_event_organizers_label'] = $label_organizers;
				$organizers = '';
				if( isset( $settings['organizers'] ) && !empty( $settings['organizers'] ) ) {
					$links = array();
					foreach ( $settings['organizers'] as $organizer ) {
						$links[] = '<a href="' . esc_url( get_permalink( $organizer ) ) . '">' . get_the_title( $organizer ) . '</a>';
					}

					$organizers .= join( ",", $links );
				}
				$cart_item_meta['_event_organizers'] = $organizers;


				$cart_item_meta['_event_location_label'] = $label_location;
				$location = '';
				if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) {
	                $location = '<a href="'.esc_url( get_permalink( $settings['venue'] ) ).'">'. get_the_title( $settings['venue'] ) . '</a>';
    	        }
				$cart_item_meta['_event_location'] = $location;

				return $cart_item_meta;
			}
		}

		function get_dt_event_item_meta( $item_data, $cart_item ) {

			/* To Remove ID : _event_id in Cart & Checkout
			
			 if( isset( $cart_item['_event_id'] ) ) {

				$item_data[] = array(
					'name'    =>  __("ID",'dt-event-manager'),
					'value'   => $cart_item['_event_id'],
					'display' => '',					
				);
			}*/

			if( isset( $cart_item['_event_date'] ) ) {

				$item_data[] = array(
					'name'    =>  $cart_item['_event_date_label'],
					'value'   => $cart_item['_event_date'],
					'display' => '',					
				);
			}

			if( isset( $cart_item['_event_category'] ) && $cart_item['_event_category'] ) {

				$item_data[] = array(
					'name'    =>  $cart_item['_event_category_label'],
					'value'   => $cart_item['_event_category'],
					'display' => '',					
				);
			}

			if( isset( $cart_item['_event_organizers'] ) && !empty( $cart_item['_event_organizers'] ) ) {

				$item_data[] = array(
					'name'    =>  $cart_item['_event_organizers_label'],
					'value'   => $cart_item['_event_organizers'],
					'display' => '',					
				);
			}

			if( isset( $cart_item['_event_location'] ) && !empty( $cart_item['_event_location'] ) ) {

				$item_data[] = array(
					'name'    =>  $cart_item['_event_location_label'],
					'value'   => $cart_item['_event_location'],
					'display' => '',					
				);
			}

			/* To Remove TimeStamp : _event_timestamp in Cart & Checkout 
				if( isset( $cart_item['_event_timestamp'] ) && !empty( $cart_item['_event_timestamp'] ) ) {
				$item_data[] = array(
					'name'    =>  __('TimeStamp','dt-event-manager'),
					'value'   => $cart_item['_event_timestamp'],
					'display' => '',
				);			
			}*/

			return $item_data;
		}

		function add_dt_event_items_meta_to_order( $item_id, $values ) {

			global $woocommerce, $wpdb;
			$order_id  = $wpdb->get_var( $wpdb->prepare( "SELECT order_id FROM {$wpdb->prefix}woocommerce_order_items WHERE order_item_id = %d ", $item_id ) );

			if( array_key_exists('_event_id', $values) && !empty( $values['_event_id'] ) ) {
				wc_add_order_item_meta($item_id, '_event_id', $values['_event_id'] );
			}			

			if( array_key_exists('_event_date', $values) && !empty( $values['_event_date'] ) ) {
				wc_add_order_item_meta($item_id, $values['_event_date_label'], $values['_event_date'] );
			}

			if( array_key_exists('_event_category', $values) && $values['_event_category'] ) {
				wc_add_order_item_meta($item_id, $values['_event_category_label'], $values['_event_category'] );
			}

			if( array_key_exists('_event_organizers', $values) && !empty( $values['_event_organizers'] ) ) {
				wc_add_order_item_meta($item_id, $values['_event_organizers_label'], $values['_event_organizers'] );
			}

			if( array_key_exists('_event_location', $values) && !empty( $values['_event_location'] ) ) {
				wc_add_order_item_meta($item_id, $values['_event_location_label'], $values['_event_location'] );
			}

			if( array_key_exists('_event_timestamp', $values) && !empty( $values['_event_timestamp'] ) ) {
				wc_add_order_item_meta($item_id, '_event_timestamp', $values['_event_timestamp'] );
			}			

			if( array_key_exists('_event_id', $values ) ) {

				$history = get_post_meta( $values['_event_id'], '_booking_history' , true );
				$history = maybe_unserialize( $history );

				if( ! empty( $history ) ){
					if( isset( $history[ $values['_event_timestamp'] ] ) ){
						$history[$values['_event_timestamp']][] = $order_id;
					} else {
						$history[$values['_event_timestamp']]= array( $order_id );						
					}
				} else {
					$history = array();
					$history[$values['_event_timestamp']] = array( $order_id );
				}

				update_post_meta( $values['_event_id'], '_booking_history' , $history );
			} 						
		}

		function hidden_dt_event_items_order_itemmeta( $meta ) {

			$meta[] = '_event_id';
			$meta[] = '_event_timestamp';		

			return $meta;
		}

		function dt_wc_reduce_order_stock( $order_id ) {

			if ( is_a( $order_id, 'WC_Order' ) ) {
				$order    = $order_id;
				$order_id = $order->get_id();
			} else {
				$order = wc_get_order( $order_id );
			}

			if( sizeof( $order->get_items() ) > 0 ) {

				foreach ( $order->get_items() as $item ) {

					if( $item->is_type( 'line_item' ) ) {

						$qty = $item->get_quantity();
						$e_id = ( $item->meta_exists('_event_id') && intval( $item->get_meta('_event_id', true ) ) ) ? intval( $item->get_meta('_event_id', true ) ) : '';

						if( !empty( $e_id ) ) {

							$e_name = get_the_title( $e_id );
							$settings = get_post_meta ( $e_id, '_custom_settings', TRUE );
							$settings = is_array ( $settings ) ? $settings : array ();

							$stock = isset( $settings['stock'] ) ? $settings['stock'] : '';
							$new_stock = $stock - $qty;

							$settings['stock'] = $new_stock;
							update_post_meta( $e_id, '_custom_settings', $settings );
							update_post_meta( $e_id, '_stock',  $new_stock );

							if ( ! is_wp_error( $new_stock ) ) {
								$order->add_order_note( sprintf( __( '%1$s (#%2$s) stock reduced from %3$s to %4$s.', 'dt-event-manager' ), $e_name, $e_id, $new_stock + $qty, $new_stock ) );
							}
						}
					}
				}
			}
		}

		function dt_event_booking_list() {

			add_meta_box( 'dt-event-bookings',
				'<span class="dashicons dashicons-calendar-alt"></span> &nbsp;' . __( 'Bookings', 'dt-event-manager' ),
				array( $this, 'dt_event_booking_list_callback'),
				'dt_event',
				'normal',
				'low'
			);
		}

		function dt_event_booking_list_callback( $post ) {

			$settings = get_post_meta ( $post->ID, '_custom_settings', TRUE );
			$settings = is_array ( $settings ) ? $settings : array ();

			$stock = isset( $settings['stock'] ) ? $settings['stock'] : '';

			$history = get_post_meta( $post->ID, '_booking_history', TRUE );
			$history = maybe_unserialize( $history );			

			if( !empty( $history ) ) {
				krsort( $history, SORT_NUMERIC ); ?>
				<table class="wp-list-table widefat fixed striped posts">
					<thead>
						<tr>
							<th><?php _e( 'Event Date & Time', 'dt-event-manager' ); ?></th>
							<th><?php _e( 'Order', 'dt-event-manager'); ?></th>
							<th><?php _e( 'Client', 'dt-event-manager'); ?></th>
							<th><?php _e( 'Tickets', 'dt-event-manager'); ?></th>
							<th><?php _e( 'Order Status', 'dt-event-manager'); ?></th>
						</tr>
					</thead>
					<tbody><?php
						foreach( $history as $timestamp => $orders ) {

							rsort( $orders );

							foreach( $orders as $ord ) {

								$order =  wc_get_order( $ord );

								if( ! is_wp_error( $order ) && method_exists( $order, 'get_items' ) && ! empty( $order ) && ! is_null( $order ) && $order !== false ) {

									$items = $order->get_items();
									$order_date = $order->get_date_created();

									foreach( $items as $item ) {

										if( !in_array( $order->get_status(), array( 'cancelled', 'refunded', 'rejected', 'failed' ) ) ) {

											if( $item->meta_exists('_event_id') && intval( $item->get_meta('_event_id', true ) ) === intval( $post->ID ) ) {

												if( $item->meta_exists('_event_timestamp') && intval( $item->get_meta('_event_timestamp', true ) ) === intval( $timestamp ) ) {

													$qty = intval( $item->get_quantity() );
													?>
													<tr>
														<td>
															<?php echo date_i18n( get_option( 'date_format', 'Y-m-d' ) . ' @ ' . get_option( 'time_format', 'H:i' ), $timestamp ); ?>
														</td>

														<td>
															<a href="<?php echo admin_url( "/post.php?post=$ord&action=edit" ); ?>"> #<?php echo $ord ?> </a>
															<small><?php echo date_i18n( get_option( 'date_format', 'Y-m-d' ) . ' @ ' . get_option( 'time_format', 'H:i' ), strtotime($order_date) ); ?></small>
														</td>
														<td><?php
															$user = $order->get_user();
															if( $user ) { 
																echo "<a href='" . admin_url( "/user-edit.php?user_id={$user->ID}" ) . "'>{$order->get_formatted_billing_full_name()} ({$user->user_login})</a>";
															} else {
																echo $order->get_formatted_billing_full_name();
															}?>
														</td>
														<td><?php echo $qty; ?></td>
														<td><?php echo $order->get_status(); ?></td>	
													</tr><?php
												}
											}
										}
									}
								}
							}							
						}?>
					</tbody>
				</table><?php
			} else {
				_e( 'There are no bookings for this event.', 'dt-event-manager' );
			}			
		}

		function dt_event_body_class( $classes ) {

			if( is_singular( 'dt_event' ) ) {

				$classes[] = 'woocommerce';
			}

			return $classes;
		}		
	}
}			