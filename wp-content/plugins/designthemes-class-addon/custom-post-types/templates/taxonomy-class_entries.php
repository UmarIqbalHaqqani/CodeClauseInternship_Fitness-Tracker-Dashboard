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
            $breadcrumbs[] = __('Classes','designthemes-class');
            $breadcrumbs[] = '<a href="'. get_category_link( get_query_var('class_entries') ) .'">' . single_cat_title('', false) . '</a>';

            maruthi_breadcrumb_output ( '<h1>'.$title.'</h1>', 'dt-breadcrumb-for-archive '.$breadcrumbs, $bstyle, $style );
        }
    ?><!-- ** Breadcrumb End ** -->
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">
    <!-- ** Container ** -->
    <div class="container"><?php
        $page_layout = cs_get_option( 'class-archives-page-layout' );
		$post_style  = cs_get_option( 'class-archives-post-style' );
        $page_layout = !empty( $page_layout ) ? $page_layout : "content-full-width";

        $layout = maruthi_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {?>
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-class-archives-sidebar-left') ):
                        dynamic_sidebar('custom-post-class-archives-sidebar-left');
                    endif;

                    $enable = cs_get_option( 'show-standard-left-sidebar-for-class_entries' );
                    if( $enable ):
                        if( is_active_sidebar('standard-sidebar-left') ):
                            dynamic_sidebar('standard-sidebar-left');
                        endif;
                    endif;

                    echo !empty( $wtstyle ) ? '</div>' : ''; ?>
                </section><!-- Secondary Left End --><?php
            }
        }?>

        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
          $post_layout = cs_get_option( 'class-archives-post-layout' );
          $post_layout = isset( $post_layout ) ? $post_layout : 'one-fourth-column';
      
          switch($post_layout):
            case 'one-third-column':
              $post_class = $show_sidebar ? " dt-sc-fitness-class column dt-sc-one-third with-sidebar" : " dt-sc-fitness-class column dt-sc-one-third";
              $columns = 3;
            break;
            
            default:
            case 'one-fourth-column':
              $post_class = $show_sidebar ? " dt-sc-fitness-class column dt-sc-one-fourth with-sidebar" : " dt-sc-fitness-class column dt-sc-one-fourth";
              $columns = 4;
            break;
          endswitch;
      
          if( have_posts() ) : ?>
            <div class="dt-sc-fitness-class-container"><?php
              while( have_posts() ):
                the_post();
                $PID = get_the_ID();

				#Meta...
				$class_settings = get_post_meta($PID, '_custom_settings', true);
				$class_settings = is_array ( $class_settings ) ? $class_settings : array (); ?>

                <div class="<?php echo $post_class; ?>"><?php

					$title = '<h3><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>';
					$btn   = '<a class="view" href="'.get_permalink().'" title="'.get_the_title().'">'.esc_html__('Read More', 'designthemes-class').'</a>'; ?>

                    <div class="dt-sc-class-item <?php echo esc_attr($post_style); ?>">
						<div class="image"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php
							if(has_post_thumbnail()):
								$attr = array('title' => get_the_title(), 'alt' => get_the_title());
								the_post_thumbnail('full', $attr);
							else: ?>
								<img src="https://place-hold.it/500x351&text=<?php the_title(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/><?php
							endif;

							if( $post_style != 'style-4' ): ?>
								<div class="dt-sc-class-overlay"><?php echo ($title.$btn); ?></div><?php
							endif; ?></a>
                        </div><?php

                        if( $post_style == 'style-4' ): ?>
							<div class="details"><?php
                            	echo ( $title.maruthi_excerpt(20) );

								if( array_key_exists('class_opt_flds', $class_settings) && $meta_fields == 'yes' ):
									echo '<div class="dt-sc-class-meta">';
										echo '<ul>';
											for($i = 1; $i <= (sizeof($class_settings['class_opt_flds']) / 2); $i++):

												$title = $class_settings['class_opt_flds']['class_opt_flds_title_'.$i];
												$value = $class_settings['class_opt_flds']['class_opt_flds_value_'.$i];

												if( !empty($value) ):
													echo '<li>';
														echo '<h6>'.esc_html($title).'</h6>';
														echo '<p>'.esc_html($value).'</p>';
													echo '</li>';
												endif;
											endfor;
										echo '</ul>';
									echo '</div>';
								endif;

								if( array_key_exists('class-time', $class_settings) ):
									echo '<div class="dt-sc-class-time">';
										echo $class_settings["class-time"];
									echo '</div>';
								endif;

								if( array_key_exists('class-trainers', $class_settings) ):
									echo '<div class="dt-sc-class-trainer">';
										echo get_the_title( $class_settings["class-trainers"][0] );
									echo '</div>';
								endif;

								echo( $btn ); ?>
							</div><?php
						endif; ?>
                    </div>
                </div><?php
              endwhile;?>
            </div><?php
          endif;?>
          <!-- **Pagination** -->
          <div class="pagination blog-pagination">
            <?php maruthi_pagination(); ?>
          </div><!-- **Pagination** -->
        </section><!-- **Primary - End** --><?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {?>
                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    if( is_active_sidebar('custom-post-class-archives-sidebar-right') ):
                        dynamic_sidebar('custom-post-class-archives-sidebar-right');
                    endif;

                    $enable = cs_get_option( 'show-standard-right-sidebar-for-class_entries' );
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