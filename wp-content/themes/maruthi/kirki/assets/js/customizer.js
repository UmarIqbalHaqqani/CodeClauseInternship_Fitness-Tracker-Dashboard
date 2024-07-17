jQuery(document).ready(function ($) {

	$( wp.customize.control( 'blogname').selector ).hide();
	$( wp.customize.control( 'blogdescription').selector ).hide();

	wp.customize( 'use-custom-logo', function( setting ) {
		setting.bind( function( value ) {
			var $blogname = wp.customize.control( 'blogname').selector;
			var $blogdescription = wp.customize.control( 'blogdescription').selector;
			if( value ) {
				$( $blogname ).hide();
				$( $blogdescription ).hide();
			} else {
				$( $blogname ).show();
				$( $blogdescription ).show();
			}
		});
	});
	
});