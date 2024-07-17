<?php
/*
Template Name: Portfolio Template
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
        <section id="primary" class="<?php echo esc_attr( $page_layout ); ?>"><?php
            if( have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    get_template_part( 'framework/loops/content', 'page' );
                }
            }?>

            <div class="dt-sc-clear"></div>

            <!-- Portfolio Template -->
            <?php 
                $post_layout = isset( $settings['portfolio-post-layout'] ) ? $settings['portfolio-post-layout'] : "one-half-column";
                $post_style = isset( $settings['portfolio-post-style'] ) ? $settings['portfolio-post-style'] : "type1";
                $allow_space = ( $settings['portfolio-grid-space'] == 'true' ) ? "with-space" : "no-space";
                $post_per_page = $settings['portfolio-post-per-page'];          

                #Post Class
                switch( $post_layout ):
                    case 'one-fourth-column':
                        $post_class = $show_sidebar ? " portfolio column dt-sc-one-fourth with-sidebar" : " portfolio column dt-sc-one-fourth";
                        $columns = 4;
                    break;  

                    case 'one-third-column':
                        $post_class = $show_sidebar ? " portfolio column dt-sc-one-third with-sidebar" : " portfolio column dt-sc-one-third";
                        $columns = 3;
                    break;

                    default:
                    case 'one-half-column':
                        $post_class = $show_sidebar ? " portfolio column dt-sc-one-half with-sidebar" : " portfolio column dt-sc-one-half";
                        $columns = 2;
                    break;
                endswitch;

                # Pagination
                    $paged = 1;
                    if ( get_query_var('paged') ) { 
                        $paged = get_query_var('paged');
                    } elseif ( get_query_var('page') ) {
                        $paged = get_query_var('page');
                    }

                # Query arg
                    $categories = isset( $settings['portfolio-categories']) ? array_filter( $settings['portfolio-categories']) : array();
                    $args = array();

                    if( empty($categories) ):
                        $args = array( 'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_portfolios');
                    else:
                        $args = array(
                            'paged' => $paged,
                            'posts_per_page' => $post_per_page,
                            'post_type' => 'dt_portfolios',
                            'orderby' => 'ID',
                            'order' => 'ASC',
                            'tax_query' => array( 
                                array(
                                    'taxonomy' => 'portfolio_entries',
                                    'field' => 'term_id',
                                    'operator' => 'IN',
                                    'terms' => $categories
                                )
                            )
                        );
                    endif;
            # Query arg
            
            # Filter Option
                if(empty($categories)):
                    $categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
                else:
                    $c = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
                    $categories = get_categories($c);
                endif;

                if( (sizeof($categories) > 1) && ($settings['filter'] == 'true') ) :
                    $post_class .= " all-sort";?>
                    <div class="dt-sc-portfolio-sorting <?php echo esc_attr($post_style); ?>">
                        <a href="#" class="active-sort" title="<?php esc_attr_e('All','maruthi'); ?>" data-filter=".all-sort"><?php esc_html_e('All','maruthi'); ?></a>
                        <?php foreach( $categories as $category ):?>
                            <a href='#' data-filter=".<?php echo esc_attr($category->category_nicename); ?>-sort">
                                <?php echo esc_html($category->cat_name); ?>
                            </a>
                        <?php endforeach;?>
                     </div><?php
                endif;

            $the_query = new WP_Query($args);
            if($the_query->have_posts()) : 
                $i = 1;?>
                <div class="dt-sc-portfolio-container <?php echo esc_attr($allow_space); ?>">
                    <div class="grid-sizer <?php echo esc_attr($post_class); ?>"></div>
                    <?php

                        while( $the_query->have_posts() ):

                            $the_query->the_post();
                            $the_id = get_the_ID();

                            $temp_class = $post_style.' '.$allow_space;
                            if($i == 1) $temp_class .= $post_class." first"; else $temp_class .= $post_class;
                            if($i == $columns) $i = 1; else $i = $i + 1;

                            if( $settings['filter'] == 'true' ):
                                $item_categories = get_the_terms( $the_id, 'portfolio_entries' );
                                if(is_object($item_categories) || is_array($item_categories)):
                                    foreach ($item_categories as $category):
                                        $temp_class .=" ".$category->slug.'-sort ';
                                    endforeach;
                                endif;
                            endif;

                            # Setting up images
                                $portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
                                $portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();
                                $items = false;

                                if( !empty($portfolio_item_meta['portfolio-gallery']) ) {

                                    $items = true;
                                    $gallerys = explode(',', $portfolio_item_meta["portfolio-gallery"]);

                                    $popup = wp_get_attachment_image_src($gallerys[0], 'full', false);
                                    $popup = ( isset($popup[0]) && !empty($popup[0])) ? $popup[0] : array();

                                    if( sizeof($gallerys) > 1 ) {

                                        $popup = wp_get_attachment_image_src($gallerys[1], 'full', false);
                                        $popup = ( isset($popup[0]) && !empty($popup[0])) ? $popup[0] : array();
                                    }

                                    $image = wp_get_attachment_image_src($gallerys[0], 'full', false);
                                    $image = ( isset($image[0]) && !empty($image[0])) ? $image[0] : array();
                                }

                                if( has_post_thumbnail( $the_id ) ){
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);
                                    $image = $popup = ( isset($image[0]) && !empty($image[0])) ? $image[0] : array();

                                    if( !$items ){
                                        $popup = $image;
                                    }
                                }elseif( $items ) {
                                    $image = $popup = $image;
                                }else{
                                    $image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
                                }
                            # Setting up images end ?>

                            <div id="dt_portfolios-<?php echo esc_attr($the_id); ?>" class="<?php echo esc_attr( trim($temp_class)); ?>">
                                <figure>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                    <div class="image-overlay">
                                        <?php if($post_style == "type3" ):?>
                                            <div class="links">
                                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        <?php elseif( $post_style == "type4" || $post_style == "type6" ):?>
                                            <div class="links">
                                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <span class="icon icon-linked"> </span> </a>
                                                <a title="<?php the_title(); ?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup); ?>">
                                                    <span class="icon icon-search"> </span> </a>
                                            </div>
                                        <?php elseif( $post_style == "type1" || $post_style == "type2" || $post_style == "type5" || $post_style == "type7" || $post_style == "type8"):?>
                                            <div class="links">
                                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <span class="icon icon-linked"> </span> </a>
                                                <a title="<?php the_title(); ?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup); ?>">
                                                    <span class="icon icon-search"> </span> </a>
                                            </div>
                                            <div class="image-overlay-details">
                                                <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s','maruthi'), the_title_attribute('echo=0')); ?>"><?php 
                                                    the_title(); ?></a></h2><?php
                                                if( $post_style != "type2"):
                                                    if( $post_style == "type7" ):
                                                        the_terms( $post->ID, 'portfolio_entries', "<p class='categories'>",' ','</p>');
                                                    else:
                                                        the_terms( $post->ID, 'portfolio_entries', "<p class='categories'>",', ','</p>');
                                                    endif;  
                                                endif;
												if( $post_style == "type5" ):
													echo '<p>'.maruthi_excerpt(10, $the_id).'</p>';
												endif; ?>
                                            </div>
                                        <?php elseif( $post_style == "type9" ):?>
                                            <div class="links">
                                                <a title="<?php the_title(); ?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup); ?>">
                                                    <span class="pe-icon pe-plus"> </span> </a>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                </figure> 
                            </div><?php                      
                        endwhile;
                    ?>
                </div><?php
            endif;?>

            <!-- **Pagination** -->
            <div class="pagination blog-pagination">
                <?php echo maruthi_pagination($the_query); ?>
            </div><!-- **Pagination** --> 
                  
            <!-- Portfolio Template -->
        </section><!-- Primary End --><?php

		wp_reset_postdata();

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