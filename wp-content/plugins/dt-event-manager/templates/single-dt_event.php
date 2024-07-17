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

                $cat = get_the_term_list( $post->ID, 'dt_event_category', '', '$$$', '');
                $cats = array_filter(explode('$$$', $cat));
                if (!empty($cats))
                	$breadcrumbs[] = $cats[0];

                $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
                $style = maruthi_breadcrumb_css( $settings );

                maruthi_breadcrumb_output ( the_title( '<h1>', '</h1>',false ), $breadcrumbs, $bstyle, $style );
            }
        }
    ?><!-- ** Breadcrumb End ** -->

</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main"><?php

    $page_layout  = array_key_exists( "layout", $settings ) ? $settings['layout'] : "with-out-sidebar";
    $sidebar_class = '';

    $show_sidebar = $show_left_sidebar = $show_right_sidebar = false;
    $post_layout  = array_key_exists( "layout", $settings ) ? $settings['content-layout'] : 'layout-1';

    $main_container = 'container';

    switch ( $page_layout ) {

        case 'with-left-sidebar':
            $page_layout = "page-with-sidebar with-left-sidebar";
            $show_sidebar = $show_left_sidebar = true;
            $sidebar_class = "secondary-has-left-sidebar";
        break;

        case 'with-right-sidebar':
            $page_layout = "page-with-sidebar with-right-sidebar";
            $show_sidebar = $show_right_sidebar = true;
            $sidebar_class = "secondary-has-right-sidebar";
        break;

        case 'with-out-sidebar':
        default:
            $page_layout = "content-full-width";
            $post_layout  = array_key_exists( "with-out-sidebar-content-layout", $settings ) ? $settings['with-out-sidebar-content-layout'] : 'layout-1';

            if( $post_layout == 'layout-2' ) {
                $main_container = 'event-type2-fullwidth';
            } elseif( $post_layout == 'layout-5' ) {
                $main_container = 'event-type5-fullwidth';
            }
            break;
        }?>

    <!-- ** Container ** -->
    <div class="<?php echo $main_container; ?>">
        <?php

        if ( $show_sidebar ) {
        	if ( $show_left_sidebar ) {
        		$sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

        		<!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 maruthi_show_sidebar( 'dt_event', $post->ID, 'left' ); ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
        	if( have_posts() ) {
        		while( have_posts() ) {
        			the_post();?>
        			<article id="post-<?php the_ID();?>" <?php post_class( $post_layout );?>>
        				<?php dt_event_get_template_part('content/'.$post_layout.'.php', array( 'id' => $post->ID, 'settings' => $settings ) ); ?>
        			</article><?php
        		}
        	}?>
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class );?>"><?php
                	 maruthi_show_sidebar( 'dt_event', $post->ID, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->

</div><!-- **Main - End ** -->    
<?php get_footer(); ?>