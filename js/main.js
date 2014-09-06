$(document).ready(function(){
	//===== FB =====
	window.fbAsyncInit = function() {
		FB.init({
        	appId      : '527616370633192',
        	xfbml      : true,
        	version    : 'v2.0'
        });
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

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
		var button = $(this),
			url = 'http://luminousselfie.com/site/article.php?id=' + $(this).data('id');
		$.get(url, function(data){
			var pos = 0;
			$('#art .gal .track').empty();
			if(data.image_arr != null){
				var total = data.image_arr.length - 1;
				for(var i in data.image_arr){
					img = $('<img>');
					img.attr('src','http://luminousselfie.com/SA350p/images/media/uploads/'+data.image_arr[i].image);
					$('#art .gal .track').append(img);
					TweenMax.set($('#art .gal .track img'),{opacity:0});
				}
				TweenMax.to($('#art .gal .track img').eq(pos), 1, {opacity:1, '-webkit-filter': 'blur(0)'});
				$('#art .gal-next').show().on('click', function(e){
					e.preventDefault();
					pos++;
					if(pos > total) pos = 0;
					TweenMax.to($('#art .gal .track img'), 1, {opacity:0, '-webkit-filter': 'blur(10px)'});
					TweenMax.to($('#art .gal .track img').eq(pos), 1, {opacity:1, '-webkit-filter': 'blur(0)'});
				});
				$('#art .gal-prev').show().on('click', function(e){
					e.preventDefault();
					pos--;
					if(pos < 0) pos = total;
					TweenMax.to($('#art .gal .track img'), 1, {opacity:0, '-webkit-filter': 'blur(10px)'});
					TweenMax.to($('#art .gal .track img').eq(pos), 1, {opacity:1, '-webkit-filter': 'blur(0)'});
				});
			}else{
				var img = $('<img>');
				img.attr('src','http://luminousselfie.com/SA350p/images/media/uploads/'+data.image);
				$('#art .gal .track').append(img);
				$('#art .gal-next').hide();
				$('#art .gal-prev').hide();
			}
			$('#art h1').html(data.title_news);
			$('#art p').html(data.body_news);
			$('#art .fb-large').data('id', button.data('id'));
			$('#art .tw-large').data('id', button.data('id'));
			location.href='http://luminousselfie.com/site/#art/'+button.data('id');
		});
	});
	$('.article-box').fancybox({
		beforeClose : function(){
			var link = document.querySelector('.btn-magazine');
			skrollr.menu.click(link);
		}
	});
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
		if($(this).data('id')){
			var id = $(this).data('id');
			//url = encodeURIComponent('http://luminousselfie.com/site/og.php?id='+id);
			url = encodeURIComponent('http://luminousselfie.com/site/#art/'+id);
			//$('meta[property="og:title"]').attr('content', $('#art h1').text());
			//$('meta[property="og:url"]').attr('content', url);
			//$('meta[property="og:image"]').attr('content', $('#art .gal img'));
		}else{
			url = encodeURIComponent('http://luminousselfie.com/site/'+$(this).attr('href'));
		}
		/*FB.ui({
			method: 'share',
			href: url,
		}, function(response) {
			/*if (response && !response.error_code) {
				alert('Posting completed.');
			} else {
				alert('Error while posting.');
			}
		});*/
		window.open('http://www.facebook.com/sharer.php?u='+url, 'Compartir en Facebook','width=480, height=320');
	});
	$('.tw-large').on('click', function(e){
		e.preventDefault();
		if($(this).data('id')){
			var id = $(this).data('id');
			url = encodeURIComponent('http://luminousselfie.com/site/#art/'+id);
		}else{
			url = encodeURIComponent('http://luminousselfie.com/site/'+$(this).attr('href'));
		}
		window.open('https://twitter.com/share?url='+url, 'Compartir en Twitter','width=480, height=320');
	});

	//===== Detect URL ======
	if( String(location.hash).indexOf('#art/') > -1){
		var rid = String(location.hash).replace('#art/','');
		if(rid){
			$('.article-box[data-id="'+rid+'"]').trigger('click');
		}
	}
});

