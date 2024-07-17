<?php get_header();

	$global_breadcrumb = cs_get_option( 'show-breadcrumb' );

    $settings = get_post_meta($post->ID,'_custom_settings',TRUE);
    $settings = is_array( $settings ) ?  array_filter( $settings )  : array();

    $header_class = '';
    if( !$settings['enable-sub-title'] || !isset( $settings['enable-sub-title'] ) ) {
        if( isset( $settings['show_slider'] ) && $settings['show_slider'] ) {
            if( isset( $settings['slider_type'] ) ) {
                $header_class =  $settings['slider_position'];
            }
        }
    }

    if( !empty( $global_breadcrumb ) ) {
        if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
            $header_class = $settings['breadcrumb_position'];
		}
	}?>

<!-- ** Header Wrapper ** -->
<div id="header-wrapper">

    <!-- **Header** -->
    <header id="header" class="<?php echo $header_class; ?>">

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
        # Global Breadcrumb
        if( !empty( $global_breadcrumb ) ) {
            if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
                $breadcrumbs = array();
                $bstyle = maruthi_cs_get_option( 'breadcrumb-style', 'default' );

                $breadcrumbs[] = __('Events','designthemes-core');
                $style = maruthi_breadcrumb_css( $settings );

                maruthi_breadcrumb_output ( the_title( '<h1>', '</h1>',false ), $breadcrumbs, $bstyle, $style );
            }
        }
    ?><!-- ** Breadcrumb End ** -->

</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">    

    <!-- ** Container ** -->
    <div class="container"><?php

        $page_layout  = array_key_exists( "layout", $settings ) ? $settings['layout'] : "content-full-width";
        $layout = maruthi_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
        	if ( $show_left_sidebar ) {
        		$sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

        		<!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 maruthi_show_sidebar( 'dt_event_organizer', $post->ID, 'left' ); ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
        	if( have_posts() ) {
        		while( have_posts() ) {
        			the_post();?>
        			<article id="post-<?php the_ID();?>" <?php post_class();?>>
                        <!-- #post-<?php the_ID(); ?> -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content(); 
                                wp_link_pages( array( 
                                    'before'    =>  '<div class="page-link">',
                                    'after'     =>  '</div>',
                                    'link_before'   =>  '<span>',
                                    'link_after'    =>  '</span>',
                                    'next_or_number' => 'number',
                                    'pagelink' =>   '%',
                                    'echo'  =>  1
                                ) );

                                edit_post_link( esc_html__( ' Edit ','nikal' ) );?>
                        </div><!-- #post-<?php the_ID(); ?> -->
        			</article><?php
        		}
        	}?>
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 maruthi_show_sidebar( 'dt_event_organizer', $post->ID, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->

</div><!-- **Main - End ** -->    
<?php get_footer(); ?>