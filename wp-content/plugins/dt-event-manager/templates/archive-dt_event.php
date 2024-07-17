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

            $bstyle = cs_get_option( 'breadcrumb-style', 'default' );
            $style = maruthi_breadcrumb_css();

            $title = get_the_archive_title();
            $breadcrumbs[] = __('Events','designthemes-core');

            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $breadcrumbs[] = $term->name;            

            maruthi_breadcrumb_output ( '<h1>'.$title.'</h1>', $breadcrumbs, 'dt-breadcrumb-for-events-archive '.$bstyle, $style );
        }
    ?><!-- ** Breadcrumb End ** -->                
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">
    <!-- ** Container ** -->
    <div class="container"><?php
        $page_layout = cs_get_option( 'events-archives-page-layout' );
        $page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";

        $layout = maruthi_page_layout( $page_layout );
        extract( $layout );

        if ( $show_sidebar ) {
            if ( $show_left_sidebar ) {?>
                <!-- Secondary Left -->
                <section id="secondary-left" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';

                    $enable = cs_get_option( 'show-standard-left-sidebar-for-events-archives' );
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

            $post_layout = cs_get_option( 'events-archives-post-layout' );

            switch($post_layout):
                case 'one-third-column':
                    $post_class = $show_sidebar ? " dt-event layout-1 column dt-sc-one-third with-sidebar" : " dt-event layout-1 column dt-sc-one-third";
                    $columns = 3;
                break;

                default:
                case 'one-half-column':
                    $post_class = $show_sidebar ? " dt-event layout-1 column dt-sc-one-half with-sidebar" : " dt-event layout-1 column dt-sc-one-half";
                    $columns = 2;
                break;
            endswitch;

            if( have_posts() ) :

                $i = 1;

                    while( have_posts() ):

                        the_post();
                        $the_id = get_the_ID();

                        $settings = get_post_meta($the_id,'_custom_settings',TRUE);
                        $settings = is_array( $settings ) ?  array_filter( $settings )  : array();

                        $tempclass = ( $i == 1 ) ? $post_class.' first' : $post_class;
                        $i = (  $i == $columns ) ? 1 : $i+1;

                        $start = $settings['start-date'];
                        $e_date = date_i18n( '- m/d/Y h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );

                        if( array_key_exists('interval', $settings) && $settings['interval'] > 0 ) {

                            if( array_key_exists('repeat-until', $settings) && !empty( $settings['repeat-until']) ) {

                                $e_date = date_i18n('- m/d/Y', strtotime( $settings['repeat-until'] ) );
                                $e_date .= date_i18n( ' h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) );
                            }
                        }?>

                        <div id="dt_event-<?php echo esc_attr($the_id);?>" class="<?php echo esc_attr( trim($tempclass));?>">

                            <a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title('<h2>', '</h2>' );?></a>
                            <p class="event-schedule">
                                <?php echo date_i18n( 'm/d/Y @ h:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ); ?>
                                <?php echo $e_date; ?>  
                            </p>

                            <?php $class = ( has_post_thumbnail( $the_id ) ) ? 'has-featured-image' : 'no-featured-image'; ?>
                            <div class="event-image-wrapper <?php echo $class;?>">
                                <div class="date-wrapper">
                                    <p class="event-datetime">
                                        <span>  
                                            <?php echo date_i18n( 'd', strtotime( $start['date'] ) ); ?>
                                            <?php echo date_i18n( 'M', strtotime( $start['date'] ) ); ?>
                                        </span>

                                        <i class="fa fa-clock-o"></i>
                                        <?php echo date_i18n( 'h:i a', strtotime( $start['date'] .$start['hour'].' hours'.$start['minutes'].' minutes' ) ); ?>
                                        <?php echo date_i18n( ' - h:i a', strtotime( $start['date'] .$start['hour'].' hours'.( $start['minutes'] + $start['duration'] ).' minutes' ) ); ?>
                                    </p>

                                    <?php if( isset( $settings['venue'] ) && !empty( $settings['venue'] ) ) { ?>
                                        <p class="event-venue">
                                            <i class="fa fa-map-marker"></i>
                                                <a href="<?php echo esc_url( get_permalink( $settings['venue'] ) );?>"> <?php echo get_the_title( $settings['venue'] ); ?> </a>
                                        </p>
                                    <?php } ?>
                                </div><?php

								if( array_key_exists('event_image', $settings) ):
									$attach_url = wp_get_attachment_url( $settings['event_image'] );
									echo '<img src="'.$attach_url.'" alt="'.esc_attr__('event-img', 'dt-event-manager').'" />';
								endif; ?>

                            </div>
                        </div><?php
                    endwhile;
                endif;?>

            <!-- **Pagination** -->
            <div class="pagination blog-pagination">
                <?php echo maruthi_pagination(); ?>
            </div><!-- **Pagination** -->

        </section><!-- Primary End -->

        <?php

        if ( $show_sidebar ) {
            if ( $show_right_sidebar ) {?>
                <!-- Secondary Right -->
                <section id="secondary-right" class="secondary-sidebar <?php echo esc_attr( $sidebar_class );?>"><?php
                    echo !empty( $wtstyle ) ? "<div class='{$wtstyle}'>" : '';


                    $enable = cs_get_option( 'show-standard-right-sidebar-for-events-archives' );
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