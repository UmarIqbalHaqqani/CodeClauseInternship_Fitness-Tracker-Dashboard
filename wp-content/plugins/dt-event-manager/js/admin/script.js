(function ($) {

	$(document.body).on('focus', '.dt-event-date-picker', function(){
		$(this).datepicker({
			dateFormat : 'yy-mm-dd',
			minDate : new Date(),
			changeMonth : true,
			changeYear : true,
		});		
	});

	$(".dt-duration").each(function(){

		var $duration = $(this);

		$( '.slider', $duration ).slider({
			value : $duration.data('value'),
			step: 5,
			min: 5,
			max: 1440,
			slide: function( event, ui ) {

				var $time = ' ',
					$minutes = ui.value;

				if( Math.floor( ui.value / 60 ) === 1 ){
					$time = Math.floor( ui.value / 60 ) + ' ' + $duration.data( 'units-hour' );
				}

				if( Math.floor( ui.value / 60 ) >= 2 &&  Math.floor( ui.value / 60 ) <= 24  ){
					$time = Math.floor( ui.value / 60 ) + ' ' + $duration.data( 'units-hours' );
				}

				$minutes -= Math.floor( ui.value / 60 ) * 60;

				if( $minutes > 0 ){
					$minutes = $minutes + ' ' + $duration.data( 'units-minutes' );
				} else{
					$minutes = '';
				}

				$(this).siblings(".slider-value").children('strong').text( $time );
				$(this).siblings(".slider-value").children('em').text( $minutes );

				$(this).siblings("input[type=hidden]").val(ui.value);
			}
		});
	});

})(jQuery);