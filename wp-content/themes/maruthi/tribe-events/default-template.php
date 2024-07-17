<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
get_header();

$global_breadcrumb = cs_get_option( 'show-breadcrumb' );
$header_class = '';
$container_class = 'container';
$settings = array();

	if( is_singular('tribe_events') ) { 

		$settings = get_post_meta(get_the_ID(),'_custom_settings',TRUE);
		$settings = is_array( $settings ) ?  array_filter( $settings )  : array();

		if( !empty( $global_breadcrumb ) ) {

			if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
				$header_class = $settings['breadcrumb_position'];
			}
		}

		$post_style = array_key_exists( "event-post-style", $settings ) ? $settings['event-post-style'] : "type1";
		switch( $post_style ):
			case 'type2':
                $container_class = "event-type2-fullwidth";
            break;
            case 'type5':
                $container_class = "event-type5-fullwidth";
            break;
            default:
                $container_class = "container";
            break;
        endswitch;
	}?>

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

    		if( is_singular('tribe_events') ) {

    			if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {

    				$breadcrumbs = array();

                	$category = tribe_get_event_taxonomy( get_the_ID(), array( 'before' => '', 'sep' => ',', 'after' => '') );
                	if( $category ) {
                    	$breadcrumbs[] = $category;
                	}

                	$breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
                	$style = maruthi_breadcrumb_css( $settings );

                	echo '<section class="main-title-section-wrapper '.esc_attr($bstyle).'" style="'.esc_attr($style).'">';
                	echo '  <div class="container">';
                	echo '      <div class="main-title-section">'.the_title( '<h1>', '</h1>',false ).'</div>';
                	echo        maruthi_new_breadcrumbs( $breadcrumbs );
                	echo '  </div>';
                	echo '</section>';    				
    			}
    		} else {

    			$separator = '<span class="'.maruthi_cs_get_option( 'breadcrumb-delimiter', 'fa default' ).'"></span>';
    			$breadcrumbs[] = str_replace( ' &#8250; ', $separator . '<span class="current">', tribe_get_events_title().'</span>' );
    			$title = maruthi_events_title();

				echo '<section class="main-title-section-wrapper '.esc_attr($bstyle).'">';
    			echo '  <div class="container">';
    			echo '      <div class="main-title-section"> <h1>'.$title.' </h1> </div>';
    			echo        maruthi_new_breadcrumbs( $breadcrumbs );
    			echo '  </div>';
    			echo '</section>';
    		}
    	}
    ?>
    <!-- ** Breadcrumb End ** -->

</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">

    <!-- ** Container ** -->
    <div class="<?php echo esc_attr($container_class); ?>">
    	<div id="tribe-events-pg-template" class="tribe-events-pg-template">
    		<?php tribe_events_before_html(); ?>
    		<?php tribe_get_view(); ?>
    		<?php tribe_events_after_html(); ?>
    	</div> <!-- #tribe-events-pg-template -->
    </div>
    <!-- ** Container End ** -->

</div><!-- **Main - End ** -->
<?php get_footer(); ?>