!function($) {
	$(document.body).on('focus', '.dt-vc-date-picker', function(){
		$(this).datepicker({
			autoSize: true,
			dateFormat : 'yy-mm-dd',
			changeMonth : true,
			changeYear : true,
		});		
	});
}(window.jQuery);

