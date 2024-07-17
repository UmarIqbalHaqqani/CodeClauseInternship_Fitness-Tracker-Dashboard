<?php
/*
Template Name: Side Navigation Template
*/

get_header();

    $settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
    $settings = is_array( $settings ) ?  array_filter( $settings )  : array();

    $global_breadcrumb = cs_get_option( 'show-breadcrumb' );

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

    <!-- ** Slider ** -->
    <?php
        if( !$settings['enable-sub-title'] || !isset( $settings['enable-sub-title'] ) ) {
            if( isset( $settings['show_slider'] ) && $settings['show_slider'] ) {
                if( isset( $settings['slider_type'] ) ) {
                    if( $settings['slider_type'] == 'layerslider' && !empty( $settings['layerslider_id'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-layer-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode('[layerslider id="'.$settings['layerslider_id'].'"/]');
                        echo '  </div>';
                        echo '</div>';
					} elseif( $settings['slider_type'] == 'revolutionslider' && !empty( $settings['revolutionslider_id'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-rev-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode('[rev_slider '.$settings['revolutionslider_id'].'/]');
                        echo '  </div>';
                        echo '</div>';
					} elseif( $settings['slider_type'] == 'customslider' && !empty( $settings['customslider_sc'] ) ) {
                        echo '<div id="slider">';
                        echo '  <div id="dt-sc-custom-slider" class="dt-sc-main-slider">';
                        echo    do_shortcode( $settings['customslider_sc'] );
                        echo '  </div>';
                        echo '</div>';
					}
                }
            }
        }
    ?><!-- ** Slider End ** -->

    <!-- ** Breadcrumb ** -->
    <?php
        # Global Breadcrumb
        if( !empty( $global_breadcrumb ) ) {
            if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
                $breadcrumbs = array();
                $bstyle = maruthi_cs_get_option( 'breadcrumb-style', 'default' );

                if( $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $parents = array();

                    while( $parent_id ) {
                        $page = get_page( $parent_id );
                        $parents[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
                        $parent_id  = $page->post_parent;
                    }

                    $parents = array_reverse( $parents );
                    $breadcrumbs = array_merge_recursive($breadcrumbs, $parents);
                }

                $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
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

        if( array_key_exists('sidenav-align', $settings ) && $settings ['sidenav-align'] == 'true' ) {
            $page_layout .= ' sidenav-alignright';
        }

        if( array_key_exists('sidenav-sticky', $settings ) && $settings ['sidenav-sticky'] == 'true' ) {
            $page_layout .= ' sidenav-sticky';
        }

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>
                
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class ); ?>"><?php
                    maruthi_show_sidebar( 'page', $post->ID, 'left' ); ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>">
            
            <div class="side-navigation">
                <div class="side-nav-container">
                    <ul class="side-nav"><?php
                        
                        if( $post->post_parent ):
                            $args = array('child_of' => $post->post_parent,'title_li' => '','sort_order'=> 'ASC','sort_column' => 'menu_order');
                        else:
                            $args = array('child_of' => $post->ID,'title_li' => '','sort_order'=> 'ASC','sort_column' => 'menu_order');
                        endif;

                        $pages = get_pages( $args );
                        $ids = array();
                        $page_id = $post->ID;

                        foreach($pages as $value) {
                            $ids[] = $value->ID;
                        }

                        foreach( $ids as $id ) {
                            $title = get_the_title($id);
                            $title = esc_attr( $title );

                            $permalink = get_permalink( $id );
                            $permalink = esc_url( $permalink );

                            $current = ( $id ===  $page_id) ? "current_page_item" : "";
                            $current = esc_attr( $current );

                            echo "<li class='{$current}'>";
                            echo "<a href='{$permalink}'>$title</a>";
                            echo "</li>";
                        }?>
                    </ul>
                </div>
                <?php
                    // Side Nav Content
                    if( array_key_exists('enable-sidenav-content', $settings) && $settings['enable-sidenav-content'] == 'true' ) :
                        $hook = $settings['sidenav-content'];
                        $hook = do_shortcode( stripslashes($hook) );
                        if (!empty($hook)) : ?>
                            <div class="side-navigation-bottom-content">
                            <?php echo do_shortcode( stripslashes($hook) ); ?>
                            </div><?php
                        endif;
                    endif;
                ?>
            </div>

            <div class="side-navigation-content"><?php
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        get_template_part( 'framework/loops/content', 'page' );
                    }
                }?>
            </div>
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class ); ?>"><?php
                    maruthi_show_sidebar( 'page', $post->ID, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->
    
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>