<?php
$wtstyle = cs_get_option( 'wtitle-style' );

if(!empty($wtstyle)):
	echo "<div class='{$wtstyle}'>";
endif;

if( is_archive() || is_search() || is_home() ):

	if( is_active_sidebar('post-archives-sidebar-right') ):
		dynamic_sidebar('post-archives-sidebar-right');
	endif;
	
	$enable = cs_get_option( 'show-standard-right-sidebar-for-post-archives' );
	if( !empty( $enable )):
		if( is_active_sidebar('standard-sidebar-right') ):
			dynamic_sidebar('standard-sidebar-right');
		endif;
	endif;
endif;

if(!empty($wtstyle)):	
	echo "</div>";
endif;