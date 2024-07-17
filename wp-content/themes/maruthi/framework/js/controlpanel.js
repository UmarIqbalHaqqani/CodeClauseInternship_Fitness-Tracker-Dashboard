if (typeof dttheme_urls === 'undefined') {
    var dttheme_urls = "";
}
$patterns = "";
var $rtl = dttheme_urls.isRTL;

for(var i=1; i<= 10; i++){
	$img = dttheme_urls.theme_base_url + "/images/style-picker/pattern"+i+".jpg";
	$patterns += '<li>';
	$patterns += '<a id="pattern'+i+'"  href="" title="">';
	$patterns += '<img src="'+ $img +'" alt="pattern'+i+'" title="pattern'+i+'" width="30" height="30" />';
	$patterns += '</a>';
	$patterns += '</li>'; 
}

$str = '<!-- **DT Style Picker Wrapper** -->';
$str += '<div class="dt-style-picker-wrapper">';
$str += '	<a href="" title="" class="style-picker-ico"> <i class="icon-moon icon-moon-hammer"></i> </a>';
$str += '	<div id="dt-style-picker">';
$str += '   	<h2> Select Your Style </h2>';
$str += '       <h3> Choose your layout </h3>';
$str += '		<ul class="layout-picker">';
$str += '       	<li> <a id="fullwidth" href="" title="" class="selected"> <img src="' + dttheme_urls.theme_base_url + '/images/style-picker/fullwidth.jpg" alt="Fullwidth" width="71" height="49" /> </a> </li>';
$str += '       	<li> <a id="boxed" href="" title=""> <img src="' + dttheme_urls.theme_base_url + '/images/style-picker/boxed.jpg" alt="Boxed" width="71" height="49" /> </a> </li>';
$str += '		</ul>';
$str += '		<div id="pattern-holder" style="display:none;">';
$str +='			<h3> Patterns for Boxed Layout </h3>';
$str += '			<ul class="pattern-picker">';
$str += 				$patterns;
$str += '			</ul>';
$str += '			<div class="hr"> </div>';
$str += '		</div>';
$str += '	</div>';
$str += '</div><!-- **DT Style Picker Wrapper - End** -->';

jQuery(document).ready(function($){
	$("body > div.wrapper").before($str);
	$picker_container = $("div.dt-style-picker-wrapper");

	//Applying Cookies
	if($rtl == true) {
		if ( $.cookie('control-open') === '1' ) {
			$picker_container.animate({right: 0});
			$('a.style-picker-ico').removeClass('control-open');
		} else {
			$picker_container.animate( { right: -230 } );
			$('a.style-picker-ico').addClass('control-open');
		}
	} else {
		if ( $.cookie('control-open') === '1' ) {
			$picker_container.animate({left: 0});
			$('a.style-picker-ico').removeClass('control-open');
		} else {
			$picker_container.animate( { left: -230 } );
			$('a.style-picker-ico').addClass('control-open');
		}
	}

	//Apply Layout
	if($.cookie("maruthi_layout") == "boxed"){
		$("ul.layout-picker li a").removeAttr("class");
		$("ul.layout-picker li a[id='"+$.cookie("maruthi_layout")+"']").addClass("selected");
		$("div#pattern-holder").removeAttr("style");

		$i = ($.cookie("maruthi_pattern")) ? $.cookie("maruthi_pattern")  : 'pattern1';
		$img = dttheme_urls.theme_base_url + "/images/patterns/"+$i+".jpg";
		$('body').css('background-image', 'url('+$img+')').addClass('layout-boxed').removeClass('layout-wide');
		$("ul.pattern-picker a[id="+$.cookie("maruthi_pattern")+"]").addClass('selected');
	} else if($.cookie("maruthi_layout") == "fullwidth"){
		$("ul.layout-picker li a").removeAttr("class");
		$("ul.layout-picker li a[id='"+$.cookie("maruthi_layout")+"']").addClass("selected");
		$("div#pattern-holder").removeAttr("style");

		$('body').removeClass('layout-boxed');
		$("div#pattern-holder").slideUp();
		$("ul.pattern-picker a").removeAttr("class");
	}

	//Applying Cookies End

	//Picker On/Off
	$("a.style-picker-ico").on('click', function(e){
		$this = $(this);
		if($rtl == true) {
			if($this.hasClass('control-open')){
				$picker_container.animate({right: 0},function(){$this.removeClass('control-open');});
				$.cookie('control-open', 1, { path: '/' });	
			}else{
				$picker_container.animate({right: -227},function(){$this.addClass('control-open');});
				$.cookie('control-open', 0, { path: '/' });
			}
		} else {
			if($this.hasClass('control-open')){
				$picker_container.animate({left: 0},function(){$this.removeClass('control-open');});
				$.cookie('control-open', 1, { path: '/' });	
			}else{
				$picker_container.animate({left: -227},function(){$this.addClass('control-open');});
				$.cookie('control-open', 0, { path: '/' });
			}
		}
		e.preventDefault();
	});//Picker On/Off end

	//Layout Picker
	$("ul.layout-picker a").on('click', function(e){
		$this = $(this);
		$("ul.layout-picker a").removeAttr("class");
		$this.addClass("selected");
		$.cookie("maruthi_layout", $this.attr("id"), { path: '/' });

		if( $.cookie("maruthi_layout") === "boxed") {
			$("body").removeClass("layout-wide").addClass("layout-boxed");
			$("div#pattern-holder").slideDown();
			
			if( $.cookie("maruthi_pattern") == null ){
				$("ul.pattern-picker a:first").addClass('selected');
				$.cookie("maruthi_pattern","pattern1",{ path: '/' });
			}else{
				$("ul.pattern-picker a[id="+$.cookie("maruthi_pattern")+"]").addClass('selected');
				$img = dttheme_urls.theme_base_url + "/images/patterns/"+$.cookie("maruthi_pattern")+".jpg";
				$('body').css('background-image', 'url('+$img+')');
			}
		} else {
			$("body").removeAttr("style").removeClass("layout-boxed");
			$("div#pattern-holder").slideUp();
			$("ul.pattern-picker a").removeAttr("class");
		}
		window.location.href = location.href;
		e.preventDefault();
	});//Layout Picker End

	//Pattern Picker
	$("ul.pattern-picker a").on('click', function(e){
		if($.cookie("maruthi_layout") == "boxed"){
			$this = $(this);
			$("ul.pattern-picker a").removeAttr("class");
			$this.addClass("selected");
			$.cookie("maruthi_pattern", $this.attr("id"), { path: '/' });
			$img = dttheme_urls.theme_base_url + "/images/patterns/"+$.cookie("maruthi_pattern")+".jpg";
			$('body').css('background-image', 'url('+$img+')');
		}
		e.preventDefault();
	});//Pattern Picker End

});