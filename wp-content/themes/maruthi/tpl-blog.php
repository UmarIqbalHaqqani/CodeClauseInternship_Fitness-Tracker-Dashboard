<?php
/*
Template Name: Blog Template
*/

get_header();

	global $post;
	$globalid = $post->ID;


    $settings = get_post_meta($globalid,'_tpl_default_settings',TRUE);
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
                    maruthi_show_sidebar( 'page', $globalid, 'left' ); ?>
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

            <!-- Blog Template -->
        	<div class="dt-sc-posts-list-wrapper"><?php

        		// Getting meta values...
				$post_layout = !empty( $settings['blog-post-layout'] ) ? $settings['blog-post-layout'] : 'one-half';
				$post_style = !empty( $settings['blog-post-style'] ) ? $settings['blog-post-style'] : '';
				$post_per_page = !empty($settings['blog-post-per-page']) ? $settings['blog-post-per-page'] : -1;

				$post_layout_arr = array();
				$post_class = array( '1' => 'column dt-sc-one-column blog-fullwidth', '2' => 'column dt-sc-one-half', '3' => 'column dt-sc-one-third' );

				switch($post_layout):
					case 'one-column':
						$post_layout_arr[] = 1;
					break;

					case 'one-half-column':
						$post_layout_arr[] = 2;
					break;
					case 'one-third-column':
						$post_layout_arr[] = 3;
					break;
					default:
						$post_layout_arr = explode('-', $post_layout);
				endswitch;

				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}

				$categories = !empty($settings['blog-post-cats']) ? array_filter($settings['blog-post-cats']) : array();
				if ( empty( $categories ) ):
					$args = array( 'paged' => $paged, 'posts_per_page' => $post_per_page, 'post_type' => 'post', 'ignore_sticky_posts' => true );
				else:
					$exclude_cats = array_unique( $categories );
					$args = array( 'paged' => $paged, 'posts_per_page' => $post_per_page, 'category__not_in' => $exclude_cats, 'post_type' => 'post', 'ignore_sticky_posts' => true );
				endif;

				$the_query = new WP_Query($args);
				if( $the_query->have_posts() ):

					$i = 1;
					$gs_class = ( count( $post_layout_arr ) > 1 ) ? $post_layout_arr[1] : $post_layout_arr[0];

					echo "<div class='tpl-blog-holder apply-isotope'>";
					echo "<div class='grid-sizer ".esc_attr( $post_class[$gs_class] )."'></div>";

					$obj = new maruthi_post_functions;
					$meta = $obj->maruthi_post_meta_fields(false, $globalid);

					while( $the_query->have_posts() ):
						$the_query->the_post();

						$temp_class = "";
						$post_ID = get_the_ID();

						$post_layout = current($post_layout_arr);

						if($i == 1) $temp_class = $post_class[$post_layout]." first"; else $temp_class = $post_class[$post_layout];
						if($i == $post_layout) $i = 1; else $i = $i + 1;

						$post_meta = get_post_meta($post_ID ,'_dt_post_settings',TRUE);
						$post_meta = is_array($post_meta) ? $post_meta : array();

						$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard'; ?>

						<div class="<?php echo esc_attr($temp_class); ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry '.$post_style.' '.'format-'.$format); ?>><?php

								switch( $post_style ):
									case 'entry-date-left':
										$obj->maruthi_post_date_left_style( $post_ID, $meta );
									break;
									case 'entry-date-author-left':
										$obj->maruthi_post_date_author_left_style( $post_ID, $meta );
									break;
									case 'blog-medium-style':
									case 'blog-medium-style dt-blog-medium-highlight':
									case 'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight':
										$obj->maruthi_post_medium_style( $post_ID, $meta );
									break;
									case 'blog-default-style':
									default:
										$obj->maruthi_post_default_style( $post_ID, $meta );
									break;
								endswitch;

								$x = next($post_layout_arr);
								if( empty($x) && (count($post_layout_arr) == 3) ){
									unset($post_layout_arr);
									$post_layout_arr[] = 2;
								} elseif( empty($x) && (count($post_layout_arr) == 4) ){
									unset($post_layout_arr);
									$post_layout_arr[] = 3;
								} elseif( empty($x) && (count($post_layout_arr) == 5) ){
									reset($post_layout_arr);
									next($post_layout_arr);
								} elseif( empty($x) && (count($post_layout_arr) == 6) ){
									reset($post_layout_arr);
								} elseif( empty($x) && (count($post_layout_arr) == 1) ){
									reset($post_layout_arr);
								}
							echo '</article>';
						echo '</div>';
					endwhile;
					echo '</div>';

					wp_reset_postdata();
				else:?>
					<h2><?php esc_html_e('Nothing Found.', 'maruthi'); ?></h2>
					<p><?php esc_html_e('Apologies, but no results were found for the requested archive.', 'maruthi'); ?></p><?php
				endif;?>
    		</div>

			<!-- **Pagination** -->
	        <div class="pagination blog-pagination"><?php echo maruthi_pagination($the_query); ?></div><!-- **Pagination** -->
            <!-- Blog Template Ends -->
        </section><!-- Primary End --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {
                $sticky_class = ( array_key_exists('enable-sticky-sidebar', $settings) && $settings['enable-sticky-sidebar'] == 'true' ) ? ' sidebar-as-sticky' : '';?>

                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class.$sticky_class ); ?>"><?php
                    maruthi_show_sidebar( 'page', $globalid, 'right' ); ?>
                </section><!-- Secondary Right End --><?php
            }
        }?>
    </div>
    <!-- ** Container End ** -->
    
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>