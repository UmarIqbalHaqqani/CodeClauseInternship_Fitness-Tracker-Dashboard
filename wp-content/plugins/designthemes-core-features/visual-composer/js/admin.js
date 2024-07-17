!function($) {
    // Image Picker Param Type
	$(document).on('click', 'div.dt_vc_img_picker > ul.image-param > li', function(e){    	
        e.preventDefault();
        $(this).parent('ul.image-param').find('li.active').removeAttr('class');
        $(this).addClass('active');

        $(this).parent('ul.image-param').next(":input").attr('value', $(this).attr('data-value') );
        $(this).parent('ul.image-param').next(":input").trigger("change");
    });	
}(window.jQuery);