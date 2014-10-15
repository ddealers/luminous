$(document).ready(function(){
	//===== Clean preloader =====
	$(window).load(function() { // makes sure the whole site is loaded
		$('.site-preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	})

	//===== User Data =====
	var UserData = {}
	/*
	$.ajax({
		type: "post",
		url: "concurso.php",
		data: {
			action: 'loadPics',
			uid: 2
		},
		dataType: "json",
		success: function(response) {
			console.log(response);
		},
		error: function() {
			alert("Error en login");
		}
	});
	*/
	//===== FB =====
	window.fbAsyncInit = function() {
		FB.init({
        	appId      : '527616370633192',
        	cookie     : true,
        	xfbml      : true,
        	version    : 'v2.0'
        });
	};

	// Load the SDK asynchronously
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	function setInfoFB() {
		FB.api('/me', function(response) {
			//Set information to DOM
			console.log(response);
			$('#rnombre').val(response.name);
			$('#rmail').val(response.email);
		});
	}

	$('#fbconnect').on('click', fblogin);
	function fblogin(e) {
		e.preventDefault();
		FB.login(function(response){
			if (response.status === 'connected') {
				setInfoFB();
			}
		},{scope: 'public_profile,email'});
	}
	/*function fblogin() {
		FB.getLoginStatus(function(response) {
			if (response.status === 'connected') {
				setInfoFB();
			} else if (response.status === 'not_authorized') {
				FB.login(function(response){
					if (response.status === 'connected') {
						setInfoFB();
					} else {
						alert("Permiso denegado");
					}
				},{scope: 'public_profile,email'});
			} else {
				FB.login(function(response){
					if (response.status === 'connected') {
						setInfoFB();
					} else {
						alert("Debes logearte con Facebook");
					}
				},{scope: 'public_profile,email'});
			}
		});
	}*/

	function publishStory() {
		pname = $('#art h1').html();
		pcaption = 'Descubre los lugares Luminous en estos artículos que tenemos para ti';
		pdesc = $('#art p').html();
		plink = $('#plink').val();
		ppicture = $('#ppic').val();
		FB.ui({
			method: 'feed',
			name: pname,
			caption: pcaption,
			description: pdesc,
			link: plink,
			picture: ppicture,
			actions: [{ name: 'Descubre los lugares Luminous en estos artículos que tenemos para ti', link: 'http://luminousselfie.com/#magazine' }]
		},
		function(response) {
			//addShare(response['post_id'],1);
		});
	}

	//===== Concurso =====
	$('#lsconnect').on('click', login);
	function login(e) {
		e.preventDefault();
		var ticket = $('#rticket').val();
		var name = $('#rnombre').val();
		var tel = $('#rtel').val();
		var mail = $('#rmail').val();

		if(ticket === ""){
			alert('Debes escribir un número de ticket');
			return;
		}
		if(name === ""){
			alert('Debes escribir tu nombre');
			return;
		}
		if(tel === ""){
			alert('Debes escribir un teléfono válido');
			return;
		}
		if(mail === ""){
			alert('Debes escribir un correo válido');
			return;
		}

		$.ajax({
			type: "post",
			url: "concurso.php",
			data: {
				action: 'save',
				name: name,
				tel: tel,
				mail: mail,
				ticket: ticket
			},
			dataType: "json",
			success: function(response) {
				
				if(response.success){
					UserData.id = response.id;
					$('<a>').attr('href','#concurso2').fancybox().click();
				}
			},
			error: function() {
				alert("Error en login");
			}
		});
	}
	$('#rparticipa').on('click',uploadPhoto);
	function uploadPhoto(e){
		e.preventDefault();
		console.log('upload photo');
		var data = new FormData();
		data.append('image',$('#rimage')[0].files[0]);
		data.append('uid',UserData.id);
		data.append('action','savePic');
		$.ajax({
			type: "post",
			url: "concurso.php",
			data: data,
			cache: false,
		    contentType: false,
		    processData: false,
			dataType: "json",
			success: function(response){
				console.log(response);
				if(response.success){
					UserData.pic = 'http://luminousselfie.com/site/uploads/'+response.nombre;
					$('<a>').attr('href','#concurso3').fancybox().click();
				}else{
					alert("No se pudo subir la imagen, intenta nuevamente.");
				}
			},
			error: function() {
				alert("Error al subir la imagen");
			}
		});
	}

	$('#rimage').on('change',loadImage);
	$('#photo').hide();
	function loadImage(e){
		var f = e.currentTarget;
		var img = $('#photo')[0];
		var file    = f.files[0];
		var reader  = new FileReader();

		reader.onloadend = function () {
			img.src = reader.result;
			$('#photo').show();
			TweenMax.from($('#photo'), 1, {scaleX:0, scaleY:0, opacity:0, ease: Elastic.easeOut});
		}

		if (file) {
			reader.readAsDataURL(file);
		} else {
			preview.src = "";
		}
	}
	$('.fb-xlarge').on('click', function(e){
		e.preventDefault();
		var id = UserData.id;
		FB.ui({
			method: 'feed',
			name: 'Selfie',
			caption: '',
			description: '',
			link: 'http://luminousselfie.com/site/#selfies/'+id,
			picture: UserData.pic,
			actions: [{ name: 'Comparte tu #LUMINOUSSELFIE', link: 'http://luminousselfie.com/#selfies' }]
		},
		function(response) {
			//addShare(response['post_id'],1);
		});
		/*
		url = encodeURIComponent('http://luminousselfie.com/site/#selfie/'+id);
		window.open('http://www.facebook.com/sharer.php?u='+url, 'Compartir en Facebook','width=480, height=320');
		*/
	});
	$('.tw-xlarge').on('click', function(e){
		e.preventDefault();
		var id = UserData.id;
		url = encodeURIComponent('http://luminousselfie.com/site/#selfies/'+id);
		window.open('https://twitter.com/share?url='+url, 'Compartir en Twitter','width=480, height=320');
	});


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

	//===== Nano Scroller =====
	$(".nano").nanoScroller();
	setTimeout(function () {
        var startY = 0;
        var startX = 0;
        var b = document.body;
        b.addEventListener('touchstart', function (event) {
            parent.window.scrollTo(0, 1);
            startY = event.targetTouches[0].pageY;
            startX = event.targetTouches[0].pageX;
        });
        b.addEventListener('touchmove', function (event) {
            event.preventDefault();
            var posy = event.targetTouches[0].pageY;
            var h = parent.document.getElementById("scrolling");
            var sty = h.scrollTop;

            var posx = event.targetTouches[0].pageX;
            var stx = h.scrollLeft;
            h.scrollTop = sty - (posy - startY);
            h.scrollLeft = stx - (posx - startX);
            startY = posy;
            startX = posx;
        });
    }, 1000);

    //===== Carrousel =====
    $('#ca-container').contentcarousel();

	//===== Google Analytics =====
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-54247712-1', 'auto');
    ga('send', 'pageview');

	//===== Navbar Auto =====
	function updateNavBar(){
		var afterWidth = $('div.nav.bar').width()-$('div.nav.bar img').width()-$('div.nav.bar ul').width();
		$('div.nav.bar .red-fill').width(afterWidth + 200);
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
			url = '../article.php?id=' + $(this).data('id');
		$.get(url, function(data){
			console.log(data);
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
			//$('#plink').val('http://luminousselfie.com/#art/'+button.data('id'));
			//$('#ppic').val('http://luminousselfie.com/SA350p/images/media/uploads/'+data.image_arr[0].image);
			console.log(button);
			$('#art .fb-large').data('id', button.data('id'));
			$('#art .tw-large').data('id', button.data('id'));
			//location.href='http://luminousselfie.com/site/#art/'+button.data('id');
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
	$('.concurso-box').fancybox();
	$('.bases').fancybox();

	$('#concurso1').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
	$('#concurso2').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'})
	$('#concurso3').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
	$('#selfies').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
	$('#bases').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
	$('#videos').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
	$('#politicas').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});

	//===== Init Slider =====
	var pslider = {};
	pslider = $('.pslider').slick({
		dots: true,
		onInit: function(){
			$('#sl0').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
			$('#art').css({width: $(window).width()*.90, height: $(window).height()*.78, display: 'none'});
		}
	});

	//===== Social Media Buttons =====
	$('.fb-large').on('click', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		pname = $('#art h1').html();
		pcaption = 'Descubre los lugares Luminous en estos artículos que tenemos para ti';
		pdesc = $('#art p').html();
		plink = 'http://luminousselfie.com/site/#art/'+id;//$('#plink').val();
		ppicture = $('#art .track img').eq(0).attr('src');
		FB.ui({
			method: 'feed',
			name: pname,
			caption: pcaption,
			description: pdesc,
			link: plink,
			picture: ppicture,
			actions: [{ name: 'Descubre los lugares Luminous en estos artículos que tenemos para ti', link: 'http://luminousselfie.com/#magazine' }]
		},
		function(response) {
			//addShare(response['post_id'],1);
		});
		/*
		e.preventDefault();
		if($(this).data('id')){
			
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
		//window.open('http://www.facebook.com/sharer.php?u='+url, 'Compartir en Facebook','width=480, height=320');
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

