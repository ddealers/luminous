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

	//===== Navbar Auto =====
	function updateNavBar(){
		var afterWidth = $('div.nav.bar').width()-$('div.nav.bar img').width()-$('div.nav.bar ul').width();
		$('div.nav.bar .red-fill').width(afterWidth);
	}
	$(window).on('resize', updateNavBar);
	updateNavBar();

	//===== Container Auto Height =====
	function updateContainer(){
		$('div.container').height($(window).height());
	}
	$(window).on('resize', updateContainer);
	updateContainer();

	//===== Init Skrollr =====
	var s = skrollr.init({
		smoothScrolling: true,
		mobileDeceleration: 0.004,
		constants:{
			sparkles: '300p'
		}
	});
	skrollr.menu.init(s);

	//===== Init Fancybox =====
	$('.article-box').on('click', function(e){
		e.preventDefault();
		url = 'http://luminousselfie.com/site/article.php?id=' + $(this).data('id');
		$.get(url, function(data){
			console.log(data);
			$('#art img').attr('src','http://luminousselfie.com/SA350p/images/media/uploads/'+data.image);
			$('#art h1').text(data.title_news);
			$('#art p').text(data.body_news);
		});
	});
	$('.article-box').fancybox();
	$('.footer-box').fancybox();
	$('.products-box').fancybox();
	$('.products-box').on('click', function(e){
		var index = $(this).index();
		pslider.slickGoTo(index);
	});

	//===== Init Slider =====
	var pslider = {};
	pslider = $('.pslider').slick({
		dots: true,
		onInit: function(){
			$('#sl0').css({width: $(window).width()*.95, height: $(window).height()*.78, display: 'none'});
			$('#art').css({width: $(window).width()*.95, height: $(window).height()*.78, display: 'none'});
		}
	});
	
	//===== Social Media Buttons =====
	$('.fb-large').on('click', function(e){
		e.preventDefault();
		window.open('http://www.facebook.com/sharer.php?u='+location.href, 'Compartir en Facebook','width=480, height=320');
	});
	$('.tw-large').on('click', function(e){
		e.preventDefault();
		window.open('https://twitter.com/share?url='+location.href, 'Compartir en Twitter','width=480, height=320');
	});
});

