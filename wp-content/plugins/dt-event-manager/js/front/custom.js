jQuery.noConflict();
jQuery(document).ready(function($){
    "use strict";

    $(".dt-sc-events-weekly-schedule-list-nav > .navigation").on('click', function(){

    	var _self = $(this),
    		_nav = _self.parent(".dt-sc-events-weekly-schedule-list-nav"),
    		_parent = _nav.next(".dt-sc-events-weekly-schedule-list-wrap"),
    		_heading = _nav.find(".title"),
    		_args = _nav.data('attrs');

    	$.ajax({
    		url : dttheme_urls.ajaxurl,
    		data : {
    			action : 'dt_sc_event_weekly_schedule',
    			arg : _args,
    			tag : _self.attr('data-nav'),
    			start : _parent.find(".timestamp").attr('data-start'),
    		},
    		beforeSend: function() {
    			_parent.fadeOut();
                _parent.html('<div class="dt-sc-loaing"></div>');
    		},
    		success: function( response ) {
    			_parent.html( response ).fadeIn();
    			_heading.html(
    				_parent.find(".timestamp").attr("data-start-date")
    				+ ' - ' +
    				_parent.find(".timestamp").attr("data-end-date")
    			);
    		}
    	});
    });
});