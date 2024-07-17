<?php get_header();
    $global_breadcrumb = cs_get_option( 'show-breadcrumb' );
	$header_class	   = cs_get_option( 'breadcrumb-position' );
    $wtstyle = cs_get_option( 'wtitle-style' ); ?>
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

            $bstyle = maruthi_cs_get_option( 'breadcrumb-style', 'default' );
            $style = maruthi_breadcrumb_css();

            $title = get_the_archive_title();
            $breadcrumbs[] = __('Portfolios','designthemes-core');
            $breadcrumbs[] = '<a href="'. get_category_link( get_query_var('portfolio_entries') ) .'">' . single_tag_title('', false) . '</a>';

            maruthi_breadcrumb_output ( '<h1>'.$title.'</h1>', $breadcrumbs, 'dt-breadcrumb-for-archive '.$bstyle, $style );
        }
    ?><!-- ** Breadcrumb End ** -->                
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">
    <!-- ** Container ** -->
    <div class="container"><?php
        $page_layout = cs_get_option( 'portfolio-archives-page-layout' );
        $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";

        $layout = maruthi_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {?>
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-portfolio-archives-sidebar-left') ):
                        dynamic_sidebar('custom-post-portfolio-archives-sidebar-left');
                    endif;

                    $enable = cs_get_option( 'show-standard-left-sidebar-for-portfolio-archives' );
                    if( $enable ):
                        if( is_active_sidebar('standard-sidebar-left') ):
                            dynamic_sidebar('standard-sidebar-left');
                        endif;
                    endif;

                    echo !empty( $wtstyle ) ? '</div>' : ''; ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
            $post_layout = cs_get_option( 'portfolio-archives-post-layout' );
            $post_style = cs_get_option( 'portfolio-archives-post-style' );
            $allow_space = cs_get_option( 'portfolio-allow-grid-space' );
            $allow_space = ( $allow_space ) ? 'with-space' : 'no-space';

            switch($post_layout):

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

            if( have_posts() ) :
                $i = 1;?>
                <div class="dt-sc-portfolio-container <?php echo esc_attr($allow_space);?>">
                    <div class="grid-sizer <?php echo esc_attr($post_class); ?>"></div><?php
                    while( have_posts() ):
                        the_post();
                        $the_id = get_the_ID();

                        $temp_class = $post_style.' '.$allow_space;
                        if($i == 1) $temp_class .= $post_class." first"; else $temp_class .= $post_class;
                        if($i == $columns) $i = 1; else $i = $i + 1;

                        # Setting up images
                        $portfolio_item_meta = get_post_meta($the_id,'_portfolio_settings',TRUE);
                        $portfolio_item_meta = is_array($portfolio_item_meta) ? $portfolio_item_meta  : array();

                        $items = false;
                        if( !empty($portfolio_item_meta['portfolio-gallery']) ) {

                            $items = true;
                            $gallerys = explode(',', $portfolio_item_meta["portfolio-gallery"]);

                            $popup = wp_get_attachment_image_src($gallerys[0], 'full', false);
                            $popup = $popup[0];

                            if( sizeof($gallerys) > 1 ){
                                $popup = wp_get_attachment_image_src($gallerys[1], 'full', false);
                                $popup = $popup[0];
                            }

                            $image = wp_get_attachment_image_src($gallerys[0], 'full', false);
                            $image = $image[0];
                        }

                        if( has_post_thumbnail() ){

                            $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id( $the_id ), 'full', false);

                            if( $post_thumb ) {
                                $image = $post_thumb[0];
                                if( !$items ){
                                    $popup = $image;
                                }
                            }elseif( $items ){
                                $image = $image;
                                $popup = $popup;
                            } else {
                                $image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
                            }
                        }elseif( $items ) {
                            $image = $image;
                            $popup = $popup;
                        }else{
                            $image = $popup = 'http://placehold.it/1170X902.jpg&text='.get_the_title($the_id);
                        }
                        # Setting up images end ?>

                        <div id="dt_portfolios-<?php echo esc_attr($the_id);?>" class="<?php echo esc_attr( trim($temp_class));?>">
                            <figure>
                                <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                <div class="image-overlay">
                                    <?php if($post_style == "type3" ):?>
                                        <div class="links">
                                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </div>
                                    <?php elseif( $post_style == "type4" || $post_style == "type6" ):?>
                                        <div class="links">
                                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"> <span class="icon icon-linked"> </span> </a>
                                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                                            <span class="icon icon-search"> </span> </a>
                                        </div>
                                    <?php elseif( $post_style == "type1" || $post_style == "type2" || $post_style == "type5" || $post_style == "type7" || $post_style == "type8"):?>
                                        <div class="links">
                                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"> <span class="icon icon-linked"> </span> </a>
                                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                                            <span class="icon icon-search"> </span> </a>
                                        </div>
                                        <div class="image-overlay-details"><?php
                                            if( $post_style != "type2"):
                                                if( $post_style == "type7" ):
                                                    the_terms( $post->ID, 'portfolio_tags', "<p class='categories'>",' ','</p>');
                                                else:
                                                    the_terms( $post->ID, 'portfolio_tags', "<p class='categories'>",', ','</p>');
                                                endif;
                                            endif;?>
                                            <h2><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s', 'designthemes-core'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h2>
                                        </div>
                                    <?php elseif( $post_style == "type9" ):?>
                                        <div class="links">
                                            <a title="<?php the_title();?>" data-gal="prettyPhoto[gallery]" href="<?php echo esc_url($popup);?>">
                                                <span class="pe-icon pe-plus"> </span> </a>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </figure>
                        </div><?php
                    endwhile;?>
                </div><?php
            endif;?>

            <!-- **Pagination** -->
            <div class="pagination blog-pagination">
                <?php echo maruthi_pagination(); ?>
            </div><!-- **Pagination** -->
    
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {?>
                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-portfolio-archives-sidebar-right') ):
                        dynamic_sidebar('custom-post-portfolio-archives-sidebar-right');
                    endif;

                    $enable = cs_get_option( 'show-standard-right-sidebar-for-portfolio-archives' );
                    if( $enable ):
                        if( is_active_sidebar('standard-sidebar-right') ):
                            dynamic_sidebar('standard-sidebar-right');
                        endif;
                    endif;

                    echo !empty( $wtstyle ) ? '</div>' : ''; ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>    