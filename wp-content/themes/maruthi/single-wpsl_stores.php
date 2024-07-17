<?php get_header();
    $global_breadcrumb = cs_get_option( 'show-breadcrumb' );
	$header_class	   = cs_get_option( 'breadcrumb-position' ); ?>
<!-- ** Header Wrapper ** -->
<div id="header-wrapper">
    <!-- **Header** -->
    <header id="header" class="<?php echo esc_attr($header_class); ?>">

        <div class="container"><?php
            /**
             * maruthi_header hook.
             * 
             * @hooked maruthi_vc_header_template - 10
             *
             */
            do_action( 'maruthi_header' ); ?>
        </div>
    </header><!-- **Header - End ** -->

    <!-- ** Breadcrumb ** -->
    <?php
        if( !empty( $global_breadcrumb ) ) {

            $breadcrumbs = array();
            $bstyle = maruthi_cs_get_option( 'breadcrumb-style', 'default' );

            $cat = get_the_term_list( $post->ID , 'wpsl_store_category', '', '$$$', '');
            $cats = array_filter(explode('$$$', $cat));
            if (!empty($cats))
                $breadcrumbs[] = $cats[0];

            $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
            $style = maruthi_breadcrumb_css();

            maruthi_breadcrumb_output ( the_title( '<h1>', '</h1>',false ), $breadcrumbs, $bstyle, $style );
        }
    ?><!-- ** Breadcrumb End ** -->
</div><!-- ** Header Wrapper - End ** -->
<!-- **Main** -->
<div id="main">

    <!-- ** Container ** -->
    <div class="wpsl-stores-fullwidth-container">

        <!-- Primary -->
        <section id="primary" class="content-full-width">

            <!-- #post-<?php the_ID(); ?> -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php echo do_shortcode( '[wpsl_map]' ); ?>

                <div class="container">

                    <div class="entry-content">

                        <div class="dt-sc-margin60"></div>

                        <div class="column dt-sc-one-half first">
                            <?php if(has_post_thumbnail()) { ?>
                                <div class="entry-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s', 'maruthi'), the_title_attribute('echo=0') ); ?>"><?php
                                        $attachment_id = get_post_thumbnail_id( $post->ID );
                                        $img_attributes = wp_get_attachment_image_src( $attachment_id, 'maruthi-1170x767' );
                                        echo '<img src="'.esc_url($img_attributes[0]).'" alt="'.get_the_title().'" title="'.get_the_title().'" />';?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="column dt-sc-one-half"><?php

                        the_content();

                        // Add the address shortcode
                        echo do_shortcode( '[wpsl_address]' ); ?>
                        </div><?php
                        wp_reset_postdata(); ?>
                    </div>
                </div>                
            </article><!-- #post-<?php the_ID(); ?> -->

        </section><!-- Primary End -->    
    </div>
    <!-- ** Container End ** -->
    
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>