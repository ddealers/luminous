$(document).ready(function(){
	//===== Mobile =====
	function detectmob() { 
		if( navigator.userAgent.match(/Android/i)
		|| navigator.userAgent.match(/webOS/i)
		|| navigator.userAgent.match(/iPhone/i)
		|| navigator.userAgent.match(/iPad/i)
		|| navigator.userAgent.match(/iPod/i)
		|| navigator.userAgent.match(/BlackBerry/i)
		|| navigator.userAgent.match(/Windows Phone/i)
		){
		 	return true;
		}else {
			return false;
		}
	}
	/*
	if(detectmob()){
		$("video").replaceWith("<div class='bgvid'></div>");
	}
	*/

	//===== Init Skrollr =====
	var s = skrollr.init({
		smoothScrolling: true,
		mobileDeceleration: 0.004,
		constants:{
			sparkles: '300p'
		}
	});
	skrollr.menu.init(s);
	//===== Init Slider =====
	$('.slider').slick({dots: true,});
});
$(document).foundation();
