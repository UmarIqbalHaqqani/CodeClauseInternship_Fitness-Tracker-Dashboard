<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php
$type = cs_get_option( 'comingsoon-style' );
$darkbg = cs_get_option( 'uc-darkbg' );
$type .= !empty( $darkbg ) ? ' dt-sc-dark-bg' : '';

$bgoptions = cs_get_option('comingsoon_background');

$bg 		= !empty( $bgoptions['image'] ) ? $bgoptions['image'] : '';
$attach 	= !empty( $bgoptions['attachment'] ) ? $bgoptions['attachment'] :'scroll';
$position 	= !empty( $bgoptions['position'] ) ? $bgoptions['position'] :'center center';
$size   	= !empty( $bgoptions['size'] ) ? $bgoptions['size'] :'auto';
$repeat		= !empty( $bgoptions['repeat'] ) ? $bgoptions['repeat'] :'no-repeat';
$color 		= !empty( $bgoptions['color'] ) ? $bgoptions['color'] : '#ffffff';

$estyle = cs_get_option( 'comingsoon-bg-style' );

$style  = !empty($bg) ? "background:url($bg) $position / $size $repeat $attach;" : '';
$style .= " background-color:$color;";
$style .= !empty($estyle) ? $estyle : ''; ?>

<body <?php body_class('under-construction'); ?>>

<div class="wrapper under-construction <?php echo esc_attr($type); ?>" style="<?php echo esc_attr($style); ?>"><?php
	$pageid = cs_get_option( 'comingsoon-pageid' );
	if( !empty($pageid) ):
		$page = get_post( $pageid, ARRAY_A );
		$content = do_shortcode( stripslashes( $page['post_content'] ) );
		echo maruthi_wp_kses( $content );
	else:
		echo '<div class="uc-wrapper-inner">';
			echo '<h2>'.esc_html__('Website is almost ready', 'maruthi').'</h2>';
			echo '<p>'.esc_html__('Our website is under construction.', 'maruthi').'</p>';
			echo '<p>'.esc_html__("We'll be here soon with our new awesome.", 'maruthi').'</p>';
			echo '<div class="dt-sc-hr-invisible-xsmall"></div>';

			if( cs_get_option( 'show-launchdate' ) == 'true' ):
				$date = cs_get_option( 'comingsoon-launchdate' );
				$datetime = new DateTime('tomorrow');
				$date = !empty( $date ) ? $date : $datetime->format('m/d/Y');
				$offset = cs_get_option( 'comingsoon-timezone' );
				$offset = !empty( $offset ) ? $offset : '+5';

				echo '<div class="downcount" data-date="'.$date.'" data-offset="'.$offset.'">';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number days">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Days', 'maruthi').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number hours">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Hours', 'maruthi').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number minutes">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Minutes', 'maruthi').'</h3>';
					echo '</div>';
					echo '<div class="dt-sc-counter-wrapper last">';
						echo '<div class="counter-icon-wrapper">';
							echo '<div class="dt-sc-counter-number seconds">00</div>';
						echo '</div>';
						echo '<h3 class="title">'.esc_html__('Seconds', 'maruthi').'</h3>';
					echo '</div>';
				echo '</div>';
			endif;
		echo '</div>';
	endif; ?>
</div>
<?php wp_footer(); ?>
</body>
</html>