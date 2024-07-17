jQuery("document").ready(function($){

	// Class Sorting
	$(window).on("resize", function() {
		var $container = $(".dt-sc-fitness-class-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutter: 23 } });
			});
		}
	});

	if($('ul.dt-sc-vertical-nav').length) {

		var $top, $tmin;
		if(dttheme_urls.stickynav === "enable"){ $top = 60; $tmin = 132; } else { $top = 20; $tmin = 52; }

		$('ul.dt-sc-vertical-nav').sticky({ topSpacing: $top, wrapperClassName: 'sticky-class-wrapper' });
		$('ul.dt-sc-vertical-nav li:first').addClass('active');

		$(".dt-sc-vertical-nav a").each(function() {
			$(this).on('click', function(e){
				var $tid = $(this).attr('href');

				$('html, body').animate({
					scrollTop: $($tid).offset().top - $tmin
				}, 1000);

				$(this).parents('.dt-sc-vertical-nav').find('li').removeClass('active');
				$(this).parent('li').addClass('active');

				e.preventDefault();
			});
		});
	}

	$(window).on("load", function() {

		var $container = $(".dt-sc-fitness-class-container");

		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutter: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-fitness-class-sorting").length){
			$("div.dt-sc-fitness-class-sorting a").on('click',function(){
				$("div.dt-sc-fitness-class-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-fitness-class-sorting").next(".dt-sc-fitness-class-container");

				$container.isotope({
					filter: selector,
					masonry: { gutter: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
				return false;
			});
		}
	});

	if( $(".dt-sc-bmi-calc").length ) {
		$(".dt-sc-bmi-form").each(function(index, element) {
			$(this).submit(function(event) {

				var $This = $(this);
				var $h = $This.find('input[name="height"]').val(), $w = $This.find('input[name="weight"]').val(), $age = $This.find('input[name="age"]').val(),
				$s = $This.find('select[name="sex"]').val(), $s = $This.find('select[name="sex"]').val(), $a = $This.find('select[name="cactivity"]').val(),
				$uwid = $This.find('input[name="hiduwid"]').val(), $owid = $This.find('input[name="hidowid"]').val();

				$.ajax({
					type: "post",
					url:  dttheme_urls.ajaxurl,
					data: {
						action: 'dt_ajax_bmi_calc_fun',
						height: $h, weight: $w, age: $age, sex: $s, activity: $a, underwid: $uwid, overwid: $owid
					},
					success: function(data, textStatus, XMLHttpRequest){
						$This.parents('.dt-sc-bmi-calc').find('.dt-sc-bmi-notify').html(data);
					},
					error: function(MLHttpRequest, textStatus, errorThrown){
						//alert(textStatus);
					}
				});
				
				//$This[0].reset();
				return false;
			}); 
        });
	}

});