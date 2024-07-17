<?php
	$post_meta = get_post_meta($post->ID,'_dt_post_settings',TRUE);
	$post_meta = is_array($post_meta) ? $post_meta  : array();

	if(empty($post_meta))
		$post_meta['show-featured-image'] = 'true';

	$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard';

	$post_style = isset( $post_meta['single-post-style'] )? $post_meta['single-post-style'] : 'standard';
	$post_classes = array('blog-entry', 'post-'.$post_style ); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    	<?php get_template_part( 'framework/loops/partials/post', $post_style ); ?>
    </article>

<?php # Post Author Information Box
	$post_author_box = cs_get_option( 'single-post-authorbox' );
	if( !empty($post_author_box) ):?>
		<div class="dt-sc-clear"></div>
		<section class="author-info">
        	<h2><?php esc_html_e('About Author','maruthi'); ?></h2>
			<div class="thumb">
				<?php echo get_avatar(get_the_author_meta('ID'), 450 ); ?>
			</div>
			<div class="desc-wrapper">
				<h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></h3>
				<div class="desc"><?php the_author_meta('description'); ?></div>
			</div>
		</section><?php
	endif;

	# Post Navigation
	$post_navigation = cs_get_option( 'single-post-navigation' );
	if( !empty($post_navigation) ):?>
		<div class="dt-sc-clear"></div>
        <div class="post-nav-container">
            <div class="post-prev-link"><?php previous_post_link('%link','<i class="fa fa-angle-double-left"> </i>'.esc_html__('Prev Entry','maruthi') ); ?> </div>
            <div class="post-next-link"><?php next_post_link('%link',esc_html__('Next Entry','maruthi').'<i class="fa fa-angle-double-right"> </i>'); ?></div>
        </div><?php
	endif;

	# Related Posts
	$related_post = cs_get_option( 'single-post-related' );
	if( !empty($related_post) && $aCategories = wp_get_post_categories( $post->ID ) ):

		$post_class = "column dt-sc-one-third";
		$post_style = cs_get_option( 'post-style' );

		$sc = "[dt_sc_blog_related_post post_class='".$post_class."' post_style='".$post_style."' id='".$post->ID."' /]";
		if( shortcode_exists( 'dt_sc_blog_related_post' ) )
			echo do_shortcode($sc);

	endif;

	#Post Comments
	$post_comment = cs_get_option( 'single-post-comments' );
	if( !empty($post_comment) ):?>
		<div class="dt-sc-clear"></div>
		<!-- ** Comment Entries ** -->
		<section class="commententries">
			<?php  comments_template('', true); ?>
		</section><?php
    endif; ?>