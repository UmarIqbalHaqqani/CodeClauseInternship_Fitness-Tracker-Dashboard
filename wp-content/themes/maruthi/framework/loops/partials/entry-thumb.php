<?php
	$post_meta = get_post_meta($post->ID,'_dt_post_settings',TRUE);
	$post_meta = is_array($post_meta) ? $post_meta  : array();

	if(empty($post_meta))
		$post_meta['show-featured-image'] = 'true';

	$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';

	if( array_key_exists('show-featured-image', $post_meta) ):
		// If it's galley post
		if( $format === "gallery" && $post_meta['post-gallery-items'] != '' ) : ?>
			<ul class="entry-gallery-post-slider"><?php
				$items = explode(',', $post_meta["post-gallery-items"]);
				foreach ( $items as $item ) { ?>
					<li><?php echo wp_get_attachment_image( $item, 'full' ); ?></li><?php
				}?>
            </ul><?php
		// If it's video post
		elseif( $format === "video" && $post_meta['media-url'] != '' ) : ?>
			<div class="dt-video-wrap"><?php
				if( $post_meta['media-type'] == 'oembed' && ! isset( $_COOKIE['dtPrivacyVideoEmbedsDisabled'] ) ) :
					echo wp_oembed_get($post_meta['media-url']);
				elseif( $post_meta['media-type'] == 'self' ) :
					echo wp_video_shortcode( array('src' => $post_meta['media-url']) );
				endif;?>
            </div><?php
		// If it's audio post
		elseif( $format === "audio" ) :
			if( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'),the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail('full'); ?></a><?php
			endif;

			if( $post_meta['media-url'] != '' ) :
				if( $post_meta['media-type'] == 'oembed' ) :
					echo wp_oembed_get($post_meta['media-url']);
				elseif( $post_meta['media-type'] == 'self' ) :
					echo wp_audio_shortcode( array('src' => $post_meta['media-url']) );
				endif;
			endif;
		elseif( has_post_thumbnail() ) : ?>
		    <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'),the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail('full'); ?></a><?php
        endif;
	endif; ?>