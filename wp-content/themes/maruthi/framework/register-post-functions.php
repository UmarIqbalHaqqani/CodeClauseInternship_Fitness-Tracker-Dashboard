<?php
//Class definition: Post Functions
class maruthi_post_functions {

	function __construct() {

		add_action( 'wp_ajax_maruthi_post_rating_like', array( $this, 'maruthi_post_rating_like' ) );
		add_action( 'wp_ajax_nopriv_maruthi_post_rating_like', array( $this, 'maruthi_post_rating_like' ) );
	}

	function maruthi_post_meta_fields( $ajax = false, $page_ID = 0 ) {

		$meta_values = array();
		$allow_excerpt = $allow_read_more = '';

		if( $page_ID > 0 ) :

			// Getting values from page meta...
			$tpl_default_settings = get_post_meta($page_ID, '_tpl_default_settings', TRUE);
			$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

			$allow_read_more = !empty( $tpl_default_settings['enable-blog-readmore'] ) ? $tpl_default_settings['enable-blog-readmore'] : NULL;
			$read_more = !empty( $tpl_default_settings['blog-readmore'] ) ? $tpl_default_settings['blog-readmore'] : NULL;

			$allow_excerpt = !empty( $tpl_default_settings['blog-post-excerpt'] ) ? $tpl_default_settings['blog-post-excerpt'] : NULL;
			$excerpt = !empty( $tpl_default_settings['blog-post-excerpt-length'] ) ? $tpl_default_settings['blog-post-excerpt-length'] : NULL;
			
			$show_post_format = !empty( $tpl_default_settings['show-postformat-info'] ) ? $tpl_default_settings['show-postformat-info'] : NULL;
			$show_author_meta = !empty( $tpl_default_settings['show-author-info'] ) ? $tpl_default_settings['show-author-info'] : NULL;
			
			$show_date_meta = !empty( $tpl_default_settings['show-date-info'] ) ? $tpl_default_settings['show-date-info'] : NULL;
			$show_comment_meta = !empty( $tpl_default_settings['show-comment-info'] ) ? $tpl_default_settings['show-comment-info'] : NULL;

			$show_category_meta = !empty( $tpl_default_settings['show-category-info'] ) ? $tpl_default_settings['show-category-info'] : NULL;
			$show_tag_meta = !empty( $tpl_default_settings['show-tag-info'] ) ? $tpl_default_settings['show-tag-info'] : NULL;

		elseif( is_home() || is_search() || is_archive() || $ajax ) :

			// Getting values from theme options...
			$allow_read_more = cs_get_option( 'post-archives-enable-readmore' );
			$read_more = cs_get_option( 'post-archives-readmore' );

			$allow_excerpt = cs_get_option( 'post-archives-enable-excerpt' );
			$excerpt = cs_get_option( 'post-archives-excerpt' );

			$show_post_format = cs_get_option( 'post-format-meta' );
			$show_author_meta = cs_get_option( 'post-author-meta' );

			$show_date_meta = cs_get_option( 'post-date-meta' );
			$show_comment_meta = cs_get_option( 'post-comment-meta' );

			$show_category_meta = cs_get_option( 'post-category-meta' );
			$show_tag_meta = cs_get_option( 'post-tag-meta' );

		endif;

		$read_more = !empty( $read_more ) ? $read_more : '';
		$excerpt = !empty( $excerpt ) ? $excerpt : 25;

		$show_post_format = !empty( $show_post_format )? "" : "hidden";
		$show_author_meta = !empty( $show_author_meta ) ? "" : "hidden";

		$show_date_meta = !empty( $show_date_meta ) ? "" : "hidden";
		$show_comment_meta = !empty( $show_comment_meta ) ? "" : "hidden";

		$show_category_meta = !empty( $show_category_meta ) ? "" : "hidden";
		$show_tag_meta = !empty( $show_tag_meta ) ? "" : "hidden";

		array_push( $meta_values, $allow_read_more, $read_more, $allow_excerpt, $excerpt, $show_post_format, $show_author_meta, $show_date_meta, $show_comment_meta, $show_category_meta, $show_tag_meta );

		return $meta_values;
	}

	function maruthi_post_rating_like() {

		$out = '';
		$postid = $_REQUEST['post_id'];
		$nonce = $_REQUEST['nonce'];
		$action = $_REQUEST['doaction'];
		$arr_pids = array();

		if ( wp_verify_nonce( $nonce, 'rating-nonce' ) && $postid > 0 ) {
	
			$post_meta = get_post_meta ( $postid, '_dt_post_settings', TRUE );
			$post_meta = is_array ( $post_meta ) ? $post_meta : array ();
			$var_count = ($action == 'like') ? 'like_count' : 'unlike_count';

			if( isset( $_COOKIE['arr_pids'] ) ) {

				// article voted already...
				if( in_array( $postid, explode(',', $_COOKIE['arr_pids']) ) ) {

					$out = esc_html__('Already', 'maruthi');

				} else {
					// article first vote...
					$v = array_key_exists($var_count, $post_meta) ?  $post_meta[$var_count] : 0;
					$v = $v + 1;
					$post_meta[$var_count] = $v;
					update_post_meta( $postid, '_dt_post_settings', $post_meta );

					$out = $v;

					$arr_pids = explode(',', $_COOKIE['arr_pids']);
					array_push( $arr_pids, $postid);
					setcookie( "arr_pids", implode(',', $arr_pids ), time()+1314000, "/" );
				}
			} else {

				// site first vote...
				$v = array_key_exists($var_count, $post_meta) ?  $post_meta[$var_count] : 0;
				$v = $v + 1;
				$post_meta[$var_count] = $v;
				update_post_meta( $postid, '_dt_post_settings', $post_meta );

				$out = $v;

				array_push( $arr_pids, $postid);
				setcookie( "arr_pids", implode(',', $arr_pids ), time()+1314000, "/" );
			}
		} else {
			$out = esc_html__('Security check', 'maruthi');
		}

		echo do_shortcode($out);
	}

	function maruthi_post_thumb( $post_ID ) {

		$post_meta = get_post_meta($post_ID, '_dt_post_settings', TRUE);
		$post_meta = is_array($post_meta) ? $post_meta  : array();

		$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';

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
			if( has_post_thumbnail($post_ID) ) : ?>
				<a href="<?php echo get_permalink($post_ID); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), get_the_title($post_ID)); ?>">
					<?php echo get_the_post_thumbnail( $post_ID, 'full' ); ?>
				</a><?php
			endif;
	
			if( $post_meta['media-url'] != '' ) :
				if( $post_meta['media-type'] == 'oembed' ) :
					echo wp_oembed_get($post_meta['media-url']);
				elseif( $post_meta['media-type'] == 'self' ) :
					echo wp_audio_shortcode( array('src' => $post_meta['media-url']) );
				endif;
			endif;
		elseif( has_post_thumbnail() ) : ?>
			<a href="<?php echo get_permalink($post_ID); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), get_the_title($post_ID)); ?>">
				<?php echo get_the_post_thumbnail( $post_ID, 'full' ); ?>
			</a><?php
		endif;
	}
	
	function maruthi_post_default_style( $post_ID, $meta ) {

		$post_meta = get_post_meta($post_ID, '_dt_post_settings', TRUE);
		$post_meta = is_array($post_meta) ? $post_meta : array();

		$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';
		$link = get_permalink( $post_ID );
		$link = rawurlencode( $link );

		if( defined( 'DOING_AJAX' ) && DOING_AJAX && class_exists('WPBMap') && method_exists('WPBMap', 'addAllMappedShortcodes') ) {
			WPBMap::addAllMappedShortcodes();
		} ?>

        <!-- Featured Image -->
        <div class="entry-thumb">
        	<?php self::maruthi_post_thumb( $post_ID ); ?>

            <div class="entry-format <?php echo esc_attr($meta[4]); ?>">
                <a class="ico-format" href="<?php echo esc_url(get_post_format_link( $format )); ?>"></a>
            </div>
		</div><!-- Featured Image -->

        <!-- Post Details -->
        <div class="entry-details">

            <!-- Category -->
            <div class="entry-meta-category <?php echo esc_attr( $meta[8] ); ?>">
                <p class="<?php echo esc_attr( $meta[8] ); ?> category"><?php the_category(''); ?></p>
            </div><!-- Category -->

            <div class="entry-title">
                <?php if( is_sticky( $post_ID ) ) echo '<span class="sticky-post">'.esc_html__('Featured', 'maruthi').'</span>'; ?>
                <h4><a href="<?php echo get_permalink( $post_ID ); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
            </div>

            <!-- Meta -->
            <?php $tclass = ( ($meta[6] == "hidden" ) && ($meta[7] == "hidden" ) && ($meta[5] == "hidden" ) ) ? "hidden" : ""; ?>
            <div class="entry-meta <?php echo esc_attr($tclass); ?>">
                <div class="author <?php echo esc_attr( $meta[5] ); ?>"><?php
					esc_html_e('By', 'maruthi'); ?>
                	<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" 
                        title="<?php esc_attr_e('View all posts by ', 'maruthi'); echo get_the_author(); ?>"><?php echo get_the_author(); ?></a>
                </div>
            	<div class="date <?php echo esc_attr($meta[6]); ?>"> / <?php echo get_the_date ( get_option('date_format') ); ?></div>
                <div class="comments <?php echo esc_attr($meta[7]); ?>"> / <?php
                    comments_popup_link('0 '.esc_html__('Comments', 'maruthi'), '1 '.esc_html__('Comment', 'maruthi'), '% '.esc_html__('Comments', 'maruthi'), '', esc_html__('Comments off', 'maruthi')); ?>
                </div>
            </div><!-- Meta -->

			<?php if( isset($meta[2]) && isset($meta[3]) ):?>
				<div class="entry-body"><?php echo maruthi_excerpt($meta[3]); ?></div>
            <?php endif;?>

            <!-- Tag -->
            <div class="entry-meta-data <?php echo esc_attr( $meta[9] ); ?>">
                <?php the_tags("<p class='tags {$meta[9]}'>".esc_html__('Tags: ', 'maruthi'),', ',"</p>"); ?>
            </div><!-- Tag -->

            <!-- Read More Button -->
            <?php if( isset($meta[0]) ):
                    $sc = isset( $meta[1] ) ? $meta[1] : "";
					if( !empty( $sc ) && shortcode_exists( 'dt_sc_button' ) && class_exists( 'Vc_Manager' ) ):
						$sc = str_replace("]",' link="url:'.$link.'"]',$sc);
						$sc = do_shortcode($sc);
						echo !empty( $sc ) ? $sc : '';
					else:
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="dt-sc-button small bordered">'.esc_html__('Read More', 'maruthi').'</a>';
					endif;
                  endif;?><!-- Read More Button -->

        </div><!-- Post Details --><?php
	}

	function maruthi_post_date_left_style( $post_ID, $meta ) {

		$post_meta = get_post_meta($post_ID, '_dt_post_settings', TRUE);
		$post_meta = is_array($post_meta) ? $post_meta : array();

		$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';
		$link = get_permalink( $post_ID );
		$link = rawurlencode( $link );

		if( defined( 'DOING_AJAX' ) && DOING_AJAX && class_exists('WPBMap') && method_exists('WPBMap', 'addAllMappedShortcodes') ) {
			WPBMap::addAllMappedShortcodes();
		} ?>

        <!-- Featured Image -->
        <div class="entry-thumb">
        	<?php self::maruthi_post_thumb( $post_ID ); ?>

            <div class="entry-format <?php echo esc_attr($meta[4]); ?>">
                <a class="ico-format" href="<?php echo esc_url(get_post_format_link( $format )); ?>"></a>
            </div>
		</div><!-- Featured Image -->

        <!-- Post Details -->
        <div class="entry-details">

            <!-- Meta -->
            <?php $tclass = ( ($meta[6] == "hidden" ) && ($meta[7] == "hidden" ) ) ? "hidden" : ""; ?>
            <div class="entry-date <?php echo esc_attr($tclass); ?>">
                <!-- Date -->
                <div class="<?php echo esc_attr($meta[6]); ?>">
                    <?php echo get_the_date('d'); ?>
                     <span><?php echo get_the_date('M'); ?></span>
                </div><!-- Date -->

                <!-- Comment -->
                <div class="<?php echo esc_attr($meta[7]); ?>"><?php
                    comments_popup_link('<i class="pe-icon pe-chat"> </i> 0', '<i class="pe-icon pe-chat"> </i> 1', '<i class="pe-icon pe-chat"> </i> %', '', '<i class="pe-icon pe-chat"> </i>'); ?>
                </div><!-- Comment -->                                         
            </div><!-- .entry-date -->

            <div class="entry-title">
                <?php if( is_sticky( $post_ID ) ) echo '<span class="sticky-post">'.esc_html__('Featured', 'maruthi').'</span>'; ?>
                <h4><a href="<?php echo get_permalink( $post_ID ); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
            </div>

			<?php if( isset($meta[2]) && isset($meta[3]) ):?>
            	<div class="entry-body"><?php echo maruthi_excerpt($meta[3]); ?></div>
            <?php endif;?>

            <!-- Author & Category & Tag -->
            <?php $tclass = ( ($meta[5] == "hidden" ) && ($meta[9] == "hidden" ) && ($meta[8] == "hidden" ) ) ? "hidden" : ""; ?>
            <div class="entry-meta-data <?php echo esc_attr($tclass); ?>">
            	<p class="author <?php echo esc_attr( $meta[5] ); ?>">
                	<i class="pe-icon pe-user"> </i>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" 
                    					title="<?php esc_attr_e('View all posts by ', 'maruthi'); echo get_the_author(); ?>"><?php echo get_the_author(); ?></a>
				</p>

                <?php the_tags("<p class='tags {$meta[9]}'> <i class='pe-icon pe-ticket'> </i>",', ',"</p>"); ?>

                <p class="<?php echo esc_attr( $meta[8] ); ?> category"><i class="pe-icon pe-network"> </i> <?php the_category(', '); ?></p>
            </div><!-- Author & Category & Tag -->

            <!-- Read More Button -->
            <?php if( isset($meta[0]) ):
                    $sc = isset( $meta[1] ) ? $meta[1] : "";
					if( !empty( $sc ) && shortcode_exists( 'dt_sc_button' ) && class_exists( 'Vc_Manager' ) ):
						$sc = str_replace("]",' link="url:'.$link.'"]',$sc);
						$sc = do_shortcode($sc);
						echo !empty( $sc ) ? $sc : '';
					else:
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="dt-sc-button small bordered">'.esc_html__('Read More', 'maruthi').'</a>';
					endif;
                  endif;?><!-- Read More Button -->

        </div><!-- Post Details --><?php
	}

	function maruthi_post_date_author_left_style( $post_ID, $meta ) {

		$post_meta = get_post_meta($post_ID, '_dt_post_settings', TRUE);
		$post_meta = is_array($post_meta) ? $post_meta : array();

		$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';
		$link = get_permalink( $post_ID );
		$link = rawurlencode( $link );

		if( defined( 'DOING_AJAX' ) && DOING_AJAX && class_exists('WPBMap') && method_exists('WPBMap', 'addAllMappedShortcodes') ) {
			WPBMap::addAllMappedShortcodes();
		} ?>
        
        <!-- Featured Image -->
        <div class="entry-thumb">
        	<?php self::maruthi_post_thumb( $post_ID ); ?>

            <div class="entry-format <?php echo esc_attr($meta[4]); ?>">
                <a class="ico-format" href="<?php echo esc_url(get_post_format_link( $format )); ?>"></a>
            </div>
		</div><!-- Featured Image -->

        <!-- Entry date author -->
		<?php $tclass = ( ($meta[6] == "hidden" ) && ($meta[7] == "hidden" ) && ($meta[5] == "hidden" ) ) ? "hidden" : ""; ?>
        <div class="entry-date-author <?php echo esc_attr($tclass); ?>">

            <div class="entry-date <?php echo esc_attr($meta[6]); ?>">
                <?php echo get_the_date('d'); ?>
                <span><?php echo get_the_date('M'); ?></span>
            </div>

            <div class="entry-author <?php echo esc_attr( $meta[5] ); ?>">
                <?php echo get_avatar(get_the_author_meta('ID'), 72 ); ?>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" 
                    title="<?php esc_attr_e('View all posts by ', 'maruthi'); echo get_the_author(); ?>"><span><?php echo get_the_author(); ?></span></a>
            </div>

            <div class="comments <?php echo esc_attr($meta[7]); ?>"><?php
                comments_popup_link('<i class="pe-icon pe-chat"> </i> 0', '<i class="pe-icon pe-chat"> </i> 1', '<i class="pe-icon pe-chat"> </i> %', '', '<i class="pe-icon pe-chat"> </i>'); ?>
            </div>
        </div><!-- Entry date author -->

        <!-- Post Details -->
        <div class="entry-details">

            <div class="entry-title">
                <?php if( is_sticky( $post_ID ) ) echo '<span class="sticky-post">'.esc_html__('Featured', 'maruthi').'</span>'; ?>
                <h4><a href="<?php echo get_permalink( $post_ID ); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
            </div>

			<?php if( isset($meta[2]) && isset($meta[3]) ):?>
            	<div class="entry-body"><?php echo maruthi_excerpt($meta[3]); ?></div>
            <?php endif;?>

           <!-- Category & Tag -->
           <?php $tclass = ( ($meta[8] == "hidden" ) && ($meta[9] == "hidden" ) ) ? "hidden" : ""; ?>
           <div class="entry-meta-data <?php echo esc_attr($tclass); ?>">
                <?php the_tags("<p class='tags {$meta[9]}'> <i class='pe-icon pe-ticket'> </i>",', ',"</p>"); ?>
                <p class="<?php echo esc_attr( $meta[8] ); ?> category"><i class="pe-icon pe-network"> </i> <?php the_category(', '); ?></p>
           </div><!-- Category & Tag -->

            <!-- Read More Button -->
            <?php if( isset($meta[0]) ):
                    $sc = isset( $meta[1] ) ? $meta[1] : "";
					if( !empty( $sc ) && shortcode_exists( 'dt_sc_button' ) && class_exists( 'Vc_Manager' ) ):
						$sc = str_replace("]",' link="url:'.$link.'"]',$sc);
						$sc = do_shortcode($sc);
						echo !empty( $sc ) ? $sc : '';
					else:
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="dt-sc-button small bordered">'.esc_html__('Read More', 'maruthi').'</a>';
					endif;
                  endif;?><!-- Read More Button -->

        </div><!-- Post Details --><?php
	}

	function maruthi_post_medium_style( $post_ID, $meta ) {

		$post_meta = get_post_meta($post_ID, '_dt_post_settings', TRUE);
		$post_meta = is_array($post_meta) ? $post_meta : array();

		$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';
		$link = get_permalink( $post_ID );
		$link = rawurlencode( $link );

		if( defined( 'DOING_AJAX' ) && DOING_AJAX && class_exists('WPBMap') && method_exists('WPBMap', 'addAllMappedShortcodes') ) {
			WPBMap::addAllMappedShortcodes();
		} ?>

        <!-- Featured Image -->
        <div class="entry-thumb">
        	<?php self::maruthi_post_thumb( $post_ID ); ?>

            <div class="entry-format <?php echo esc_attr($meta[4]); ?>">
                <a class="ico-format" href="<?php echo esc_url(get_post_format_link( $format )); ?>"></a>
            </div>
		</div><!-- Featured Image -->

        <!-- Post Details -->
        <div class="entry-details">

            <!-- Meta -->
            <?php $tclass = ( ($meta[6] == "hidden" ) && ($meta[7] == "hidden" ) && ($meta[5] == "hidden" ) ) ? "hidden" : ""; ?>
            <div class="entry-meta <?php echo esc_attr($tclass); ?>">
            	<div class="date <?php echo esc_attr($meta[6]); ?>"><?php esc_html_e('Posted on ','maruthi'); echo get_the_date ( get_option('date_format') ); ?></div>
                <div class="comments <?php echo esc_attr($meta[7]); ?>"> / <?php
                    comments_popup_link('<i class="pe-icon pe-chat"> </i> 0', '<i class="pe-icon pe-chat"> </i> 1', '<i class="pe-icon pe-chat"> </i> %', '', '<i class="pe-icon pe-chat"> </i>'); ?>
                </div>
                <div class="author <?php echo esc_attr( $meta[5] ); ?>">
                    / <i class="pe-icon pe-user"> </i>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" 
                        title="<?php esc_attr_e('View all posts by ', 'maruthi'); echo get_the_author(); ?>"><?php echo get_the_author(); ?></a>
                </div>
            </div><!-- Meta -->

            <div class="entry-title">
                <?php if( is_sticky( $post_ID ) ) echo '<span class="sticky-post">'.esc_html__('Featured', 'maruthi').'</span>'; ?>
                <h4><a href="<?php echo get_permalink( $post_ID ); ?>" title="<?php printf(esc_attr__('Permalink to %s','maruthi'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h4>
            </div>

			<?php if( isset($meta[2]) && isset($meta[3]) ):?>
				<div class="entry-body"><?php echo maruthi_excerpt($meta[3]); ?></div>
            <?php endif;?>

            <!-- Category & Tag -->
            <?php $tclass = ( ($meta[8] == "hidden" ) && ($meta[9] == "hidden" ) ) ? "hidden" : ""; ?>
            <div class="entry-meta-data <?php echo esc_attr($tclass); ?>">
                <?php the_tags("<p class='tags {$meta[9]}'> <i class='pe-icon pe-ticket'> </i>",', ',"</p>"); ?>
                <p class="<?php echo esc_attr( $meta[8] ); ?> category"><i class="pe-icon pe-network"> </i> <?php the_category(', '); ?></p>
            </div><!-- Category & Tag -->

            <!-- Read More Button -->
            <?php if( isset($meta[0]) ):
                    $sc = isset( $meta[1] ) ? $meta[1] : "";
					if( !empty( $sc ) && shortcode_exists( 'dt_sc_button' ) && class_exists( 'Vc_Manager' ) ):
						$sc = str_replace("]",' link="url:'.$link.'"]',$sc);
						$sc = do_shortcode($sc);
						echo !empty( $sc ) ? $sc : '';
					else:
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="dt-sc-button small bordered">'.esc_html__('Read More', 'maruthi').'</a>';
					endif;
                  endif;?><!-- Read More Button -->

        </div><!-- Post Details --><?php
	}	
}