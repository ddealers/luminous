$(document).ready(function(){

	/* Cambiar aquí al momento de migrar el sitio */
	var baseURL = 'http://luminousselfie.com/site/_next/';
	var uploadsURL = 'http://luminousselfie.com/site/uploads/';

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
			console.log(response);
			UserData.fbid = response.id;
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

	function vsetInfoFB() {
		FB.api('/me', function(response) {
			console.log(response);
			UserData.fbid = response.id;
			$('#vrnombre').val(response.name);
			$('#vrmail').val(response.email);
		});
	}
	$('#vfbconnect').on('click', vfblogin);
	function vfblogin(e) {
		e.preventDefault();
		FB.login(function(response){
			if (response.status === 'connected') {
				vsetInfoFB();
			}
		},{scope: 'public_profile,email'});
	}


	//===== Concurso =====
	$('#lsconnect').on('click', login);
	function login(e) {
		e.preventDefault();
		var terminos = $('#terminos').is(':checked');
		var ticket = $('#rticket').val();
		var name = $('#rnombre').val();
		var tel = $('#rtel').val();
		var mail = $('#rmail').val();

		if(!terminos){
			alert('Debes aceptar los terminos y condiciones');
			return;
		}
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
					UserData.name = name;
					UserData.id = response.id;
					if(UserData.fbid){
						$('.photo-thumb').attr('src', 'http://graph.facebook.com/'+UserData.fbid+'/picture?type=large');
						$('.photo-cont').css({background:'url(http://graph.facebook.com/'+UserData.fbid+'/picture?type=large) rgb(255,255,255) no-repeat center center', 'background-size':'cover'});
					}else{
						$('.photo-thumb').attr('src', '');
						$('.photo-cont').css({
							'background-color':'rgba(255,255,255)',
							'background-repeat':'no-repeat',
							'background-position':'center center',
							'background-size':'cover'});
					}
					$('.photo-info p').text(UserData.name);
					TweenLite.set('#concurso2',{display: 'block'});
					TweenLite.from('#concurso2', 0.5, {opacity: 1, x: '-100%', ease: Back.easeOut});
					TweenLite.to('#concurso1', 0.5, {opacity: 0, x: '100%', ease: Back.easeOut, onComplete: function(){
						TweenLite.set('#concurso1', {display: 'none'});
					}});
				}
			}
		});
	}
	$('#rparticipa').on('click',uploadPhoto);
	function uploadPhoto(e){
		e.preventDefault();
		var ctx = $('#render')[0].getContext('2d'),
			ctxData = null;
		var img = new Image();
		img.crossOrigin = "Anonymous";
		img.onload = function(){
			$('#render').attr('width',img.width);
			$('#render').attr('height',img.height);
			ctx.drawImage(img, 0,0);
			ctxData = $('#render')[0].toDataURL('image/jpeg', 0.8);
			$.ajax({
				type: "post",
				url: "concurso.php",
				data: {
					image: ctxData,
					uid: UserData.id,
					action: 'savePic'
				},
				dataType: "json",
				success: function(response){
					console.log(response);
					if(response.success){
						UserData.pic = uploadsURL+response.nombre;
						TweenLite.set('#concurso3',{display: 'block'});
						TweenLite.from('#concurso3', 0.5, {opacity: 1, x: '-100%', ease: Back.easeOut});
						TweenLite.to('#concurso2', 0.5, {opacity: 0, x: '100%', ease: Back.easeOut, onComplete: function(){
							TweenLite.set('#concurso2', {display: 'none'});
						}});
					}else{
						alert("No se pudo subir la imagen, intenta nuevamente.");
					}
				},
				error: function() {
					alert("Error al subir la imagen");
				}
			});
		}
		bgURL = $('.photo-cont').css('background-image');
		img.src = bgURL.substr(4).substr(0, bgURL.length-5);
	}
	$('#cambiarfoto').on('click', function(e){
		e.preventDefault();
		$('#rimage').trigger('click');
	});
	$('#rimage').on('change',loadImage);
	function loadImage(e){
		var f = e.currentTarget;
		var photo = $('.photo-cont');
		var file = f.files[0];
		var reader = new FileReader();

		TweenLite.to(photo, 1, {opacity: 0, scale: 0, ease: Cubic.easeOut});
		reader.onloadend = function () {
			var img = reader.result;
			$('.photo-thumb').attr('src',img);
			photo.css({'background-image':'url('+img+')'});
			TweenLite.to(photo, 1, {opacity: 1, scale: 1, ease: Elastic.easeOut});
		}
		if (file) {
			reader.readAsDataURL(file);
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
			link: baseURL + '?s=' + btoa(id) + '#selfies',
			picture: UserData.pic,
			actions: [{ name: 'Comparte tu #LUMINOUSSELFIE', link: baseURL + '?s=' + btoa(id) + '#selfies' }]
		});
	});
	$('.tw-xlarge').on('click', function(e){
		e.preventDefault();
		var id = UserData.id;
		url = encodeURIComponent(baseURL + '?s=' + btoa(id) + '#selfies');
		window.open('https://twitter.com/share?url='+url, 'Compartir en Twitter','width=480, height=320');
	});


	$('.selfie').on('click', function(e){
		e.preventDefault();
		var sid = $(this).attr('href').replace('#selfie/','');
		$.post('concurso.php',{action:'loadPics',uid:sid},function(response){
			console.log(response);
			$('#prime .photo-thumb').attr('src',uploadsURL+response.principal.image);
			$('#prime .photo-info p.name').text(response.principal.name);
			$('#prime .photo-info p.votos').text(response.principal.votes+" votos");
			$('#prime .photo-cont').css({'background-image':'url('+uploadsURL+response.principal.image+')'});
			$('#prime .like').val(sid);
			$('#prime .mayor').val(parseInt(sid)+1);
		},'json');
	});
	$('#prime .like').on('click', function(e){
		e.preventDefault();
		sid = $(this).val();
		if(!UserData.id){
			alert('Debes registrarte antes de votar');
			TweenLite.set('#selfies-registro',{display: 'block'});
			TweenLite.from('#selfies-registro', 0.5, {opacity: 1, x: -100, ease: Back.easeOut});
			TweenLite.to('#selfies-container', 0.5, {opacity: 0, x: 100, ease: Back.easeOut, onComplete: function(){
				TweenLite.set('#selfies-container', {display: 'none'});
			}});
			return;
		}
		$.post('concurso.php',{action:'like',uid:UserData.id, fid:sid},function(response){
			if(response.success){
				alert('Le has dado un voto a esta #LuminousSelfie');
			}else{
				alert('Ha habido un error al asignar el voto, inténtalo de nuevo en unos minutos');
			}
		},'json');
	});
	$('#vlsconnect').on('click', vlogin);
	function vlogin(e) {
		e.preventDefault();
		var terminos = $('#vterminos').is(':checked');
		var name = $('#vrnombre').val();
		var tel = $('#vrtel').val();
		var mail = $('#vrmail').val();

		if(!terminos){
			alert('Debes aceptar los terminos y condiciones');
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
			},
			dataType: "json",
			success: function(response) {
				if(response.success){
					UserData.id = response.id;
					TweenLite.set('#selfies-container',{display: 'block', x:0, opacity:1});
					TweenLite.from('#selfies-container', 0.5, {opacity: 1, x: -100, ease: Back.easeOut});
					TweenLite.to('#selfies-registro', 0.5, {opacity: 0, x: 100, ease: Back.easeOut, onComplete: function(){
						TweenLite.set('#selfies-registro', {display: 'none'});
					}});
				}
			}
		});
	}
	$('#prime .mayor').on('click', function(e){
		e.preventDefault();
		sid = $(this).val();
		loadPics(sid);
	});
	function loadPics(sid){
		$.post('concurso.php',{action:'loadPics',uid:sid},function(response){
			console.log(response);
			if(response.principal.name){
				$('#prime .photo-thumb').attr('src',uploadsURL+response.principal.image);
				$('#prime .photo-info p.name').text(response.principal.name);
				$('#prime .photo-info p.votos').text(response.principal.votes+" votos");
				$('#prime .photo-cont').css({'background-image':'url('+uploadsURL+response.principal.image+')'});
				$('#prime .like').val(sid);
				$('#prime .mayor').val(parseInt(sid)+1);
			}else{
				loadPics(1);
			}
		},'json');
	}
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
	if( String(location.hash).indexOf('#selfies') > -1){
		var a = $('<a>').attr('data-menu-top','800p');
		skrollr.menu.click(a[0]);
	}

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
	$('.bases').fancybox();

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
		if($(this).data('id')){
			var id = $(this).data('id');
			pname = $('#art h1').html();
			pcaption = 'Descubre los lugares Luminous en estos artículos que tenemos para ti';
			pdesc = $('#art p').html();
			plink = encodeURIComponent(baseURL+'#art/'+id);
			ppicture = $('#ppic').val();
			FB.ui({
				method: 'feed',
				name: pname,
				caption: pcaption,
				description: pdesc,
				link: plink,
				picture: ppicture,
				actions: [{ name: 'Descubre los lugares Luminous en estos artículos que tenemos para ti', link: 'http://luminousselfie.com/#magazine' }]
			});
		}else{
			FB.ui({
				method: 'feed',
				caption: pcaption,
				link: encodeURIComponent(baseURL+$(this).attr('href')),
				actions: [{ name: 'Descubre los lugares Luminous en estos artículos que tenemos para ti', link: 'http://luminousselfie.com/#magazine' }]
			});
		}
	});
	$('.tw-large').on('click', function(e){
		e.preventDefault();
		if($(this).data('id')){
			var id = $(this).data('id');
			url = encodeURIComponent(baseURL+'#art/'+id);
		}else{
			url = encodeURIComponent(baseURL+$(this).attr('href'));
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

