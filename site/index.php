<?php
header('Access-Control-Allow-Origin: *');

include("funciones.php");
$peeps = get_people();
$articles = get_magazine();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <meta property="og:image" content="http://luminousselfie.com/site/img/girl1.png" />
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="fonts/colgate.css">
        <link rel="stylesheet" type="text/css" href="css/foundation.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet"type="text/css" href="css/slick.css">
        <link rel="stylesheet"type="text/css" href="css/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="css/slide.css" />
        <link rel="stylesheet" type="text/css" href="css/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script type="text/javascript" src="js/lib/vendor/jquery.js"></script>
        <script type="text/javascript" src="js/lib/foundation.min.js"></script>
        <script type="text/javascript" src="js/lib/slick/slick.min.js"></script>
        <script type="text/javascript" src="js/lib/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/lib/skrollr/skrollr.min.js"></script>
        <script src="js/lib/skrollr/skrollr.menu.min.js"></script>
        <script src="js/lib/jquery.masonry.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/jquery.nanoscroller.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <!-- the jScrollPane script -->
        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
        <link href="css/showLoading.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.showLoading.js"></script>
        <script type="text/javascript" src="http://nexus.ensighten.com/colgatepalmolive/Bootstrap.js"></script>        
    </head>
    <body prefix="og: http://ogp.me/ns#">
        <input type="hidden" id="plink" name="plink">
        <input type="hidden" id="ppic" name="ppic">
        <div class="site-preloader">
            <div class="preloader-content">
                <img src="./img/logo-colgate.png" class="imgCarga">
                <p class="cargando">cargando</p>
                <div class="preloader-spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div>
        </div>
        <div class="nav bar">
            <img class="logo-part" src="./img/logo-p1.png">
            <ul>
                <li><a href="#inicio" data-menu-top="0"><img src="./img/luminus-white.png"></a></li>
                <li><a href="#iluminadores" data-menu-top="300p">INSTANT</a></li>
                <li><a href="#productos" data-menu-top="600p">PRODUCTOS</a></li>
                <!--li><a class="concurso-box" href="#concurso1">CONCURSO</a></li>
                <li><a class="concurso-box" href="#selfies">SELFIES</a></li-->
                <li><a href="#gente" onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/gente');" data-menu-top="700p">GENTE</a></li>
                <li><a class="btn-magazine" onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/magazine');" href="#magazine" data-menu-top="800p">MAGAZINE</a></li>
                <li><a href="https://www.facebook.com/ColgateMexico" onclick="javascript:sendLinkEvent('','www.luminousselfie.com/facebook_ColgateMexico');" target="_blank"><img class="fb" src="./img/facebook.png"></a></li>
                <li><a href="https://www.youtube.com/user/colgatemexico" onclick="javascript:sendLinkEvent('','www.luminousselfie.com/youtube_colgatemexico');" target="_blank"><img class="yt" src="./img/youtube.png"></a></li>
            </ul>
        </div>
        <img 
        data-50p="transform:translate(0,-23%)" 
        data-100p="transform:translate(0,0%)"
        data-120p="transform:translate(0,20%)"
        data-200p="transform:translate(0,0%)"
        data-220p="transform:translate(0,20%)"
        data-300p="transform:translate(0,5%)"
        data-_sparkles-200p="transform:translate(0,5%)"
        data-_sparkles-220p="transform:translate(0,20%)"
        data-_sparkles-300p="transform:translate(0,-5%); display: block; opacity: 1"
        data-_sparkles-320p="transform:translate(0,-50%); display: none; opacity: 0"
        src="./img/pasta.png" class="pasta1">
        <!--  ++++++++++++  PAG. INICIO-->
        <div id="inicio" class="container Inicio" data-0="transform:translate(0,0%)" data-100p="transform:translate(0,-100%);">
            <!---->
            <!--div class="background-girl"></div-->
            <div class="contenido-pag">
                <img class="girl" src="./img/girl1.png">
                <div class="text">
                    <!--img src="./img/logo-colgate.png" class="logo-luminous"-->
                    <h1 class="sombra_blanca">Dientes blancos<br> <span class="sombra_blanca"> al instante<span class="asterisco">*</span></span></h1>
                    <!--transform:translate(0,100%)-->
                    <!--img data-50p="transform:translate(0,0%)" data-100p="transform:translate(0,-20%)" src="./img/pasta.png" class="pasta1"-->
                    <p class="selfie sombra_blanca">No es una selfie hasta que es una <span class="LuminousSelfie">#LuminousSelfie</span><br><span class="link">www.<span class="rojo">luminous</span>selfie.com</span></span></p>
                </div>
                <p class="leyenda sombra_blanca">*El efecto blanqueador instantáneo es temporal. CONSULTA REGULARMENTE A TU ODONTÓLOGO. SSA: 143300202D0281</p>
                <a class="boton-down" href="#decidir" data-menu-top="100p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div>
        </div>
        <!--  ++++++++++++  DECIDIR NO ES INSTANTÁNEO, BLANQUEAR TU SONRISA SÍ -->
        <div id="decidir" class="container Lentes" data-0="transform:translate(0,100%)" data-100p="transform:translate(0,0%);" data-200p="transform:translate(0,-100%);">
            <div class="contenido-pag">
                <a class="boton-up" href="#inicio" data-menu-top="0"><img src="./img/boton-flecha-arriba.png"></a>
                <!--data-0="transform:translate(0,100%)" data-100p="transform:translate(0,0%);"-->
                <!--div class="background-girl2"></div-->
                <img data-80p="transform:translate(-100%,0);opacity:0" data-100p="transform:translate(0%,0);opacity:1" class="girl" src="./img/girl2.png">
                <div class="text">
                    <h1 data-80p="opacity:0" data-100p="opacity:1" class="sombra_blanca">Dientes blancos<br> <span class="sombra_blanca"> al instante<span class="asterisco">*</span></span></h1>
                    <p data-80p="opacity:0" data-100p="opacity:1" class="selfie2 sombra_blanca">No es una selfie hasta que es una <span class="LuminousSelfie">#LuminousSelfie</span><br><span class="link">www.<span class="rojo">luminous</span>selfie.com</span></span></p>
                    <!--img data-50p="transform:translate(0,-195%)" data-100p="transform:translate(0,0%)" data-150p="transform:translate(0,50%)" data-200p="transform:translate(0,100%)" src="./img/pasta.png" class="pasta2"-->
                </div>
                <p class="leyenda sombra_blanca">El efecto blanqueador instantáneo es temporal. Consulta regularmente a tu odontólogo. SSA:143300202d0281</p>
                <a class="boton-down" href="#escoger" data-menu-top="200p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div>
        </div>
        <!--  ++++++++++++  ESCOGER NO ES INSTANTÁNEO, BLANQUEAR TU SONRISA SÍ -->
        <div id="escoger" class="container Tacones" data-100p="transform:translate(0,100%)" data-200p="transform:translate(0,0%);" data-300p="transform:translate(0,-100%);">
            <div class="contenido-pag">
                <a class="boton-up" href="#decidir" data-menu-top="100p"><img src="./img/boton-flecha-arriba.png"></a>
                <img data-180p="transform:translate(-100%,0);opacity:0" data-200p="transform:translate(0%,0);opacity:1" class="girl" src="./img/girl3.png">
                <!-- data-100p="transform:translate(0,100%)" data-200p="transform:translate(0,0%);"-->
                <!--div class="background-girl3"></div-->
                <div class="text">
                    <h1 data-180p="opacity:0" data-200p="opacity:1" class="tittle-1 sombra_blanca">Dientes blancos<br> <span class="sombra_blanca"> al instante<span class="asterisco">*</span></span></h1>
                    <p data-180p="opacity:0" data-200p="opacity:1" class="selfie2 sombra_blanca">No es una selfie hasta que es una <span class="LuminousSelfie">#LuminousSelfie</span><br><span class="link">www.<span class="rojo">luminous</span>selfie.com</span></span></p>
                    <!--img data-120p="transform:translate(0,-180%)" data-200p="transform:translate(0,0%)" data-250p="transform:translate(0,50%)" data-300p="transform:translate(0,100%)" src="./img/pasta.png" class="pasta2"-->
                </div>
                <p class="leyenda sombra_blanca">El efecto blanqueador instantáneo es temporal. Consulta regularmente a tu odontólogo. SSA:143300202d0281</p>
                <a class="boton-down" href="#iluminadores" data-menu-top="300p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div>
        </div>
        <!--  ++++++++++++  CON ILUMINADORES ÓPTICOS -->
        <div id="iluminadores" class="container Iluminadores" data-200p="transform:translate(0,100%)" data-300p="transform:translate(0,0%);" data-500p="transform:translate(0,0%);" data-600p="transform:translate(0,-100%);">
            <!-- data-200p="transform:translate(0,100%)" data-300p="transform:translate(0,0%);"-->
            <div class="contenido-pag">
                <a class="boton-up" href="#decidir" data-menu-top="200p"><img src="./img/boton-flecha-arriba.png"></a>
                <div class="background-rojo">
                    <img 
                        data-_sparkles-0="transform:translate(10%,0%);opacity:0;" 
                        data-_sparkles-20p="transform:translate(-34%,12%);opacity:0.9;"
                        data-_sparkles-80p="transform:translate(-116%,48%);opacity:0.9;"
                        data-_sparkles-150p="transform:translate(-130%,60%);opacity:0" 
                        src="./img/sparkles.png" class="sparkles">
                    <img 
                        data-_sparkles-0="transform:translate(10%,0%);opacity:0;" 
                        data-_sparkles-20p="transform:translate(-14%,12%);opacity:0.8;"
                        data-_sparkles-80p="transform:translate(-86%,48%);opacity:0.8;"
                        data-_sparkles-150p="transform:translate(-110%,60%);opacity:0" 
                        src="./img/sparkles.png" class="sparkles">
                    <img 
                        data-_sparkles-0="transform:translate(0%,0%);opacity:0" 
                        data-_sparkles-20p="transform:translate(-24%,12%);opacity:1"
                        data-_sparkles-80p="transform:translate(-96%,48%);opacity:1"
                        data-_sparkles-150p="transform:translate(-120%,60%);opacity:0" 
                        src="./img/sparkles.png" class="sparkles">
                    <div class="diente-container">
                        <img data-280p="transform:translate(0%,-60%);opacity:0" data-300p="transform:translate(0%,0%);opacity:1" src="./img/diente-con-reloj.png" class="diente">
                        <img data-280p="transform:translate(0%,-60%);opacity:0" data-300p="transform:translate(0%,0%);opacity:1" src="./img/diente-sucio.png" class="dienteSucio"
                        data-_sparkles-80p="opacity:0" >
                        <!--
                        <p class="time" 
                           data-_sparkles-0="opacity:0"
                           data-_sparkles-10p="opacity:1"
                           data-_sparkles-40p="opacity:1"
                           data-_sparkles-50p="opacity:0"
                           >1 minuto</p>
                        <p class="time"
                           data-_sparkles-40p="opacity:0"
                           data-_sparkles-50p="opacity:1"
                           data-_sparkles-90p="opacity:1"
                           data-_sparkles-150p="opacity:0"
                           >2 minutos</p>
                        <p class="time" 
                           data-_sparkles-90p="opacity:0"
                           data-_sparkles-150p="opacity:1"
                           >3 minutos</p>
                       -->
                        <p data-280p="transform:translate(0%,60%);opacity:0" data-300p="transform:translate(0%,0%);opacity:1" class="drama">DRAMATIZACIÓN</p>
                    </div>
                </div>
                <div class="text">
                    <h1 data-280p="opacity:0" data-300p="opacity:1" class="tittle">CON ILUMINADORES<br>ÓPTICOS</h1>
                    <h1 data-_sparkles-80p="opacity:0" data-_sparkles-100p="opacity:1" class="tittle sub">DIENTES BLANCOS<br>AL INSTANTE.</h1>
                    <!--img data-220p="transform:translate(0,-180%)" data-300p="transform:translate(0,0%)" data-500p="transform:translate(0,0%)" data-550p="transform:translate(0,100%)" src="./img/pasta.png" class="pasta"-->
                </div>
                <img data-280p="transform:translate(0%,60%);opacity:0" data-300p="transform:translate(0%,0%);opacity:1" src="./img/banner-abajo.png" class="banner">
                <p class="leyenda">El efecto blanqueador instantáneo es temporal. Consulta regularmente a tu odontólogo. SSA:143300202d0281</p>
                <a class="boton-down" href="#articulos" data-menu-top="600p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div> 
        </div>
        <!--  ++++++++++++  LÍNEA COMPLETA, RESULTADOS INCREÍBLES. -->
        <div id="articulos" class="container Articulos" data-_sparkles-200p="transform:translate(0,100%);" data-_sparkles-300p="transform:translate(0,0%);" data-_sparkles-400p="transform:translate(0,-100%);">
            <div class="contenido-pag">
                <a class="boton-up" href="#blanquear" data-menu-top="300p"><img src="./img/boton-flecha-arriba.png"></a>
                <div class="articulos-list">
                    <a onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/prod_cremaDentalInstant');" class="articulos1 products-box" href="#sl0">
                        <img src="./img/pasta_2.png"
                             data-_sparkles-210p="transform:translate(0,-200%);opacity:0" 
                             data-_sparkles-300p="transform:translate(0,0%);opacity:1">
                    </a>
                    <a onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/prod_cepilloColgate360');" class="articulos2 products-box" href="#sl0"> 
                        <img src="./img/cepillos.png"
                             data-_sparkles-210p="transform:translate(0,50%);opacity:0" 
                             data-_sparkles-300p="transform:translate(0,0%);opacity:1">
                    </a>
                    <a onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/prod_enguajeColgate');" class="articulos3 products-box" href="#sl0">
                        <img src="./img/enjuague.png"
                             data-_sparkles-210p="transform:translate(0,200%);opacity:0" 
                             data-_sparkles-300p="transform:translate(0,0%);opacity:1">
                    </a>
                    <!--a onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/prod_cremaDentalWhite');" class="articulos4 products-box" href="#sl0">
                        <img src="./img/pasta_4.png"
                             data-_sparkles-310p="transform:translate(-100%,0);opacity:0" 
                             data-_sparkles-400p="transform:translate(0%,0);opacity:1">
                    </a>
                    <a onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/prod_cremaDentalAdvanced');" class="articulos5 products-box" href="#sl0">
                        <img src="./img/pasta_3.png"
                             data-_sparkles-310p="transform:translate(100%,0);opacity:0" 
                             data-_sparkles-400p="transform:translate(0%,0);opacity:1">
                    </a-->
                </div>
                <div class="text">
                    <h1 data-_sparkles-280p="opacity:0" data-_sparkles-300p="opacity:1" class="tittle">LÍNEA COMPLETA,<br>RESULTADOS INCREÍBLES.</h1>
                    <p data-_sparkles-280p="opacity:0" data-_sparkles-300p="opacity:1" class="contexto">Con cepillo, enjuague y pasta de dientes juntos,<br>tu sonrisa brillará mucho más.</p>
                </div>
                <p class="leyenda">El efecto blanqueador instantáneo es temporal. Consulta regularmente a tu odontólogo. SSA:143300202d0281</p>
                <!--img data-_sparkles-220p="transform:translate(0,-180%)" data-_sparkles-300p="transform:translate(0,0%)" src="./img/pasta.png" class="pasta"-->
                <a class="boton-down" href="#gente" data-menu-top="700p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div>
        </div>
        <!--  ++++++++++++  GENTE LUMINOUS -->
        <div id="gente" class="container Gente" data-_sparkles-300p="transform:translate(0,100%);" data-_sparkles-400p="transform:translate(0,0%);" data-_sparkles-500p="transform:translate(0,-100%);">
            <div class="contenido-pag">
                <a class="boton-up" href="#blanquear" data-menu-top="600p"><img src="./img/boton-flecha-arriba.png"></a>
                <div class="people">
                    <? foreach ($peeps as $pip): ?>
                        <div class="pip">
                            <div class="pip-back"></div>
                            <div class="pip-img">
                                <img src="http://luminousselfie.com/SA350p/images/media/uploads/<? echo $pip['image']; ?>">
                            </div>
                            <div class="pip-p">
                                <p class="pip-name"><? echo $pip['title_people']; ?></p>
                                <p class="pip-content"><? echo utf8_decode($pip['body_people']); ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="text">
                    <h1 class="tittle">GENTE <br>LUMINOUS</h1>
                    <p class="contexto">Personas que han decidido cambiar su sonrisa<br> en un instante.</p>
                    <img src="./img/diente.png" class="diente2">
                </div>
                <a class="boton-down" href="#magazine" data-menu-top="900p"><img class="btn-abajo" src="./img/boton-flecha-abajo.png"></a>
            </div>
        </div>
        <!--  ++++++++++++  MAGAZINE LUMINOUS -->
        <div id="magazine" class="container Magazine" data-_sparkles-400p="transform:translate(0,100%);" data-_sparkles-500p="transform:translate(0,0%);">
            <div class="contenido-pag">
                <div class="row">
                    <div class="small-6 columns">
                        <a class="btn fb-large" href="#magazine"></a>
                        <a class="btn tw-large" href="#magazine"></a>
                    </div>
                    <div class="small-6 columns">
                        <h1 class="tittle lumag">LUMINOUS MAGAZINE</h1>
                        <p class="contexto magazinef">Descubre los lugares Luminous en estos artículos que tenemos para ti.</p>
                    </div>
                </div>
                <div class="row" id="medio">
                    <div id="ca-container" class="ca-container">
                        <div class="ca-wrapper">
                            <div class="ca-item ca-item-1">
                                <div class="ca-item-main">
                                    <div style="position: relative;height: 184px;"><a class="article-box" href="#art" data-id="<? echo $articles[0]['id_news'] ?>"><img src="http://luminousselfie.com/SA350p/images/media/uploads/<? echo $articles[0]['image'] ?>"></a></div>
                                    <div style="position: relative;height: 184px;"><img src="http://luminousselfie.com/SA350p/images/media/uploads/proximo.png"></div>
                                </div>
                            </div>
                            <?php
                            for ($i = 1; $i < sizeof($articles); $i++) {
                                echo '<div art="'.$i.'" class="ca-item ca-item-4">
                                <div class="ca-item-main">
                                    <div style="position: relative;height: 184px;"><a class="article-box" href="#art" data-id="' . $articles[$i]['id_news'] . '"><img src="http://luminousselfie.com/SA350p/images/media/uploads/' . $articles[$i]['image'] . '"></a></div>';
                                if (isset($articles[$i + 1])) {
                                    $i++;
                                    echo '<div style="position: relative;height: 184px;"><a class="article-box" href="#art" data-id="' . $articles[$i]['id_news'] . '"><img src="http://luminousselfie.com/SA350p/images/media/uploads/' . $articles[$i]['image'] . '"></a></div>';
                                }else
                                    echo '<div style="position: relative;height: 184px;"><img src="http://luminousselfie.com/SA350p/images/media/uploads/proximo.png"></div>';
                                echo '</div>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a class="last boton-up" href="#gente" data-menu-top="700p"><img src="./img/boton-flecha-arriba.png"></a>
            </div>
            <div class="footer">
                <ul class="ul">
                    <li><a target="_blank" onclick="javascript:sendLinkEvent('','www.luminousselfie.com/www.colgatepalmolive.com.mx');" href="http://www.colgatepalmolive.com.mx">WWW.COLGATEPALMOLIVE.COM.MX</a></li>
                    <li><a target="_blank" onclick="javascript:sendLinkEvent('','www.luminousselfie.com/www.colgate.com.mx');" href="http://www.colgate.com.mx">WWW.COLGATE.COM.MX</a></li>
                    <li><a class="footer-box" onclick="javascript:sendPageViewEvent('','www.luminousselfie.com/#politicas');" href="#politicas">POLITICAS LEGALES / PRIVACIDAD</a></li>
                    <li><a target="_blank" onclick="javascript:sendLinkEvent('','www.luminousselfie.com/www.colgate.com.mx/app/Colgate/MX/Corp/ContactUs.cvsp');" href="http://www.colgate.com.mx/app/Colgate/MX/Corp/ContactUs.cvsp">CONTACTO</a></li>
                </ul>
                <p class="parrafo">CONSULTA REGULARMENTE A TU ODONTÓLOGO, SSA: 143300202D0281© 2014 Colgate-Palmolive Company. Todos los derechos reservados. © 2014 Colgate-Palmolive Company. Todos los derechos reservados.</p>
            </div>
        </div>
        <!--  ++++++++++++  CREMA DENTAL COLGATE LUMINOUS WHITE -->
        <div id="sl0" class="slider0">
            <div class="pslider">
                <div>
                    <div class="row">
                        <div class="small-6 columns">
                            <img class="thumb" src="./img/pasta_2.png">
                        </div>
                        <div class="small-6 columns">
                            <div class="desc">
                                <h1>CREMA DENTAL<br>LUMINOUS WHITE INSTANT</h1>
                                <p>Nueva Colgate Luminous White Instant<br>con iluminadores ópticos, dientes blancos al instante.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="small-6 columns">
                            <img class="thumb" src="./img/cepillos.png">
                        </div>
                        <div class="small-6 columns">
                            <div class="desc big">
                                <h1>CEPILLO DE DIENTES<br>COLGATE 360º</h1>
                                <p>Limpieza completa de boca. ¿Cómo funciona?<br>Limpia la superficie de los dientes, encías, lengua, mejillas y labios.</p>
                                <ol>
                                    <li>Las copas blanqueadoras ayudan a quitar las manchas superficiales.</li>
                                    <li>Las cerdas pulidoras quitan manchas superficiales y limpian lugares de difícil alcance.</li>
                                    <li>Los limpiadores de lengua y mejillas ayudan a quitar las bacterias que causan mal aliento</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="small-6 columns">
                            <img class="thumb" src="./img/enjuague.png">
                        </div>
                        <div class="small-6 columns">
                            <div class="desc">
                                <h1>ENJUAGUE BUCAL<br>COLGATE<br>LUMINOUS WHITE</h1>
                                <p>Sonrisa brillante, boca fresca.<br>Ayuda a mantener el blanco natrural de los dientes<br>y refresca tu aliento.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div>
                    <div class="row">
                        <div class="small-6 columns">
                            <img class="thumb h-thumb" src="./img/pasta_4.png">
                        </div>
                        <div class="small-6 columns">
                            <div class="desc">
                                <h1>CREMA DENTAL<br>COLGATE LUMINOUS WHITE</h1>
                                <p>Dientes un tono más blanco en una semana.<br>Sus microcristales aceleradores de blanqueamiento<br>contienen ingredientes similares a los <br>usados por dentistas.</p>
                            </div>
                        </div>
                    </div>
                </div-->
                <!--div>
                    <div class="row">
                        <div class="small-6 columns">
                            <img class="thumb h-thumb" src="./img/pasta_3.png">
                        </div>
                        <div class="small-6 columns">
                            <div class="desc">
                                <h1>CREMA DENTAL<br>COLGATE LUMINOUS WHITE<br>ADVANCED</h1>
                                <p>Dientes hasta 3 tonos más blancos.<br>Con los mismos ingredientes activos utilizados<br>por odontólogos, proporciona un blanqueamiento<br>avanzado para una sonrisa brillante.</p>
                            </div>
                        </div>
                    </div>
                </div-->
            </div>
        </div>
        <div id="art" class="Articulo">
            <div class="row">
                <div class="small-6 columns">
                    <div class="gal">
                        <div class="track"></div>
                        <a href="#" class="gal-next"></a>
                        <a href="#" class="gal-prev"></a>
                    </div>
                </div>
                <div class="small-6 columns">
                    <div class="desc">
                        <!--<img src="">-->
                        <h1></h1>
                        <p class="frame" id="scrolling"></p>
                        <div class="row">
                            <div class="small-6 columns">
                                <a class="btn fb-large"></a>
                            </div>
                            <div class="small-6 columns">
                                <a class="btn tw-large"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="concurso1">
            <img src="./img/PASO-1.png" class="asset-paso1">
            <div class="row">
                <div class="small-12 columns">
                    <h2 class="title">CONCURSO #LUMINOUSSELFIE</h2>
                    <p class="simple-txt">Compra Luminous White Instant<br>y registra tu Ticket de compra para participar:</p>
                    <input id="rticket" type="text" name="ticket" placeholder="captura tu No. de ticket" required class="input ticket">
                </div>
            </div>
            <div class="row">
                <div class="small-5 columns">
                    <a id="fbconnect" href="#"><img src="./img/face_connect.png" width="100px" class="connect"></a>
                </div>
                <div class="small-2 columns">
                    O
                </div>
                <div class="small-5 columns">
                    <input id="rnombre" type="text" name="Nombre" placeholder="NOMBRE Y APELLIDO" required class="input nombre"><br />
                    <input id="rtel" type="tel" name="tel" placeholder="TELÉFONO" required class="input tel"><br />
                    <input id="rmail" type="email" name="Correo" checked="true" placeholder="MAIL" required class="input correo">
                     <a id="lsconnect" href="#" class="btn registrate">REGÍSTRATE</a>
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <p class="txt">Las 100 personas con más votos podrán asistir a la Gran Fiesta Luminous White Instant</p>
                </div>
            </div>
            <a href="#bases" class="btn bases">BASES</a>
        </div>
        <div id="concurso2">
            <img src="./img/PASO-2.png" class="asset-paso2">
            <div class="row">
                <div class="small-12 columns">
                    <h1 class="titulos sube">SUBE TU #LUMINOUSSELFIE</h1>
                </div>
            </div>
            <div class="row">
                <div class="small-6 columns">
                    <input id="rimage" accept="image/png" type="file">
                    <a id="rparticipa" href="#" class="participa"><img src="./img/participa.png" class="foto"></a>
                </div>
                <div class="small-6 columns">
                    <img id="photo">
                    <img class="photo" src="./img/FOTOluminous.png">
                </div>
            </div>
            <a href="#bases" class="btn bases">BASES</a>
        </div>
        <div id="concurso3">
            <img src="./img/PASO-3.png" class="asset-paso3">
            <div class="row">
                <div class="small-12 columns">
                    <h1 class="titulos">¡Ya estás participando!</h1>
                    <p>Comparte tu #LUMINOUSSELFIE</p>
                </div>
            </div>
            <div class="row">
                <div class="small-6 columns">
                    <a class="btn fb-xlarge"></a>
                    <a class="btn tw-xlarge"></a>
                </div>
                <div class="small-6 columns">
                    <img class="photo" src="./img/FOTOpaso3.png">
                </div>
            </div>
            <a href="#bases" class="btn bases">BASES</a>
        </div>
        <div id="selfies">
            <h1 class="titulos vota">SUBE TU #LUMINOUSSELFIE</h1>
            <div id="prime">
                <div class="main">
                    <img src="./img/foto-principal.png">
                    <button class="like"></button>
                    <button class="mayor"></button>
                </div>
            </div>
            <ul>
                <li>
                    <img src="./img/marco1.png" class="photo f1">
                    <button class="like"></button>
                </li>
                <li>
                    <img src="./img/marco1.png" class="photo f1">
                    <button class="like"></button>
                </li>
                <li>
                    <img src="./img/marco1.png" class="photo f1">
                    <button class="like"></button>
                </li>
                <li>
                    <img src="./img/marco1.png" class="photo f1">
                    <button class="like"></button>
                </li>
                <li>
                    <img src="./img/marco1.png" class="photo f1">
                    <button class="like"></button>
                </li>
            </ul>
            <a href="" class="btn bases">BASES</a>
            <!--a href="" class="btn premios">PREMIOS</a-->
        </div>
        <div id="bases">
            <h1 class="titulos base">BASES CONCURSO #LUMINOUSSELFIE</h1>
            <p class="concursoText baseContent">Lorem ipsum dolor est. Lorem ipsum 
            dolor est. Lorem ipsum dolor est. Lorem 
            ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est.
            Lorem ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum
            dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est. 
            Lorem ipsum dolor est. Lorem ipsum 
            dolor est. Lorem ipsum dolor est. Lorem 
            ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est.
            Lorem ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum
            dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est. 
            Lorem ipsum dolor est. Lorem ipsum 
            dolor est. Lorem ipsum dolor est. Lorem 
            ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est.
            Lorem ipsum dolor est. Lorem ipsum dolor est. Lorem ipsum
            dolor est. Lorem ipsum dolor est. Lorem ipsum dolor est. </p>
            <!--<a href="" class="btn bases">BASES</a>
            <a href="" class="btn premios">PREMIOS</a>->
        </div>
        <div id="videos">
            <h1 class="titulos base">CÁPSULAS LUMINOUS</h1>
            <img src="./img/" class="video">
            <button class=""></button>
            <button class=""></button>
            <button class="like v1"></button>
            <button class="mayor v2"></button>
            <h2>LUIS Y KARLA Cápsula 1</h2>
            <p>Lorem ipsum dolor est. Lorem ipsum 
            dolor est. Lorem ipsum dolor est. Lorem 
            ipsum dolor est. Lorem ipsum dolor est.</p>
            <img src="" class="vf pr">
            <p class="parrafo a"></p>
            <img src="" class="vf se">
            <p class="parrafo b"></p>
            <img src="" class="vf te">
            <p class="parrafo c"></p>
            <img src="" class="vf cu">
            <p class="parrafo d"></p>
            <img src="" class="vf qu">
            <p class="parrafo e"></p>
        </div>
        <div id="politicas">
            <h1>TÉRMINOS Y CONDICIONES RESPECTO AL USO DE ESTE SITIO</h1>
            <p>Al accesar a este sitio, usted reconoce y acepta todos nuestros términos, condiciones y políticas de privacidad que se mencionan más adelante, o que se encuentran contenidos o a los que se hace referencia en este sitio (el "Acuerdo"). Si usted no acepta este Acuerdo, no estará autorizado a accesar a este sitio. También reconoce y acepta que podemos modificar este Acuerdo en cualquier momento y a nuestro único juicio; que todas las modificaciones a este Acuerdo serán efectivas de inmediato al ser expuestas en este sitio; y que usted revisará este Acuerdo cada vez que accese a este sitio para enterarse y aceptar todas y cada una de las modificaciones que se hagan al Acuerdo. También reconoce y acepta que, a menos que nosotros lo especifiquemos de otra manera, este Acuerdo aplica sólo a este sitio y a nuestras actividades en línea, y no aplica a ninguna de las actividades que realizamos fuera de línea.</p>
            <p>Usted reconoce y acepta que todos los materiales, incluyendo sin limitación al contenido, datos, software, información, productos y servicios contenidos o proporcionados a través de este sitio ("Materiales"), se encuentran protegidos por derechos de autor (copyright), de marca registrada (trademark), de marca de servicio, patente, secreto comercial u otros derechos o leyes de propiedad; que excepto por lo que específicamente se permita en este Acuerdo, se encuentra estrictamente prohibido cualquier uso de los Materiales; que excepto cuando nosotros y/o los tenedores de los derechos le den permiso previo por escrito, no podrá vender, licenciar, rentar, modificar, imprimir, copiar, reproducir, descargar, transmitir, distribuir, desplegar públicamente, realizar públicamente, publicar, editar, adaptar, recopilar o crear trabajos que se deriven de cualesquiera de los Materiales (incluyendo sin limitarse al uso de selección de grupos o recuperación sistemática para crear colecciones, recopilaciones, bases de datos o directorios); y que excepto cuando le proporcionemos autorización previa por escrito, está estrictamente prohibido el uso de cualquier navegador de Web (que no sean los navegadores generalmente disponibles para terceras partes), máquinas, software, spiders, robots, avatars, agentes, herramientas u otros dispositivos o mecanismos para navegar o hacer búsquedas en el sitio. No obstante lo anterior, puede descargar o imprimir copias simples de los Materiales sólo para su uso personal y no comercial, asumiendo que usted protegerá los derechos de autoría y cualquier otro derecho de propiedad.</p>
            <p>Usted reconoce y acepta que nosotros, a nuestro único criterio, en cualquier momento y con o sin notificación, podemos bloquear o finalizar su acceso o el de cualquiera otra parte a todo o a parte del sitio o a cualquiera de los Materiales, o cambiar o descontinuar cualquier aspecto o característica del sitio o de cualquiera de los Materiales (incluyendo sin limitarse a, descontinuar el sitio en su totalidad); y que, sin limitación de cualquier otra provisión de este Acuerdo, nos reservamos el derecho de tomar cualquier acción legal o de equidad que consideremos apropiada en relación con el sitio, los Materiales y este Acuerdo. Usted también reconoce y acepta que, a menos que se especifique de otra manera, cualquiera de los links (enlaces) de este sitio con otros sitios no implica nuestro respaldo a dichos sitios o que tengamos ningún tipo de sociedad con los operadores de dichos sitios; que dichos sitios no están bajo nuestro control; y que no somos responsables de ninguno de los materiales (incluyendo sin limitarse a, cualquier contenido, datos, software, información, productos o servicios) contenidos o proporcionados a través de dichos sitios, o de la propiedad, decencia, legalidad, cumplimiento con derechos de autor, precisión, o cualquier otro aspecto de dichos sitios.</p>
            <p>USTED RECONOCE Y ACEPTA QUE ESTE SITIO Y TODOS LOS "MATERIALES" SÓLO TIENEN PROPÓSITOS DE INFORMACIÓN GENERAL AL CONSUMIDOR; QUE NI ESTE SITIO NI CUALQUIERA DE LOS "MATERIALES" TIENEN POR OBJETO CONSTITUIR, Y DE HECHO NO CONSTITUYEN EL EJERCICIO DE LA PRÁCTICA, NI PROPORCIONAN CONSEJOS MÉDICOS O DE CUIDADO PROFESIONAL DE LA SALUD, DIAGNÓSTICOS, CONSULTAS, TRATAMIENTO, CONTENIDO, DATOS, SOFTWARE, INFORMACIÓN, PRODUCTOS Y/O SERVICIOS; Y QUE USTED SIEMPRE CONSULTARÁ CON SU PROVEEDOR MÉDICO CALIFICADO PARA RECIBIR CONSEJOS MÉDICOS O DE CUIDADO PARA LA SALUD, DIAGNÓSTICOS, CONSULTAS, TRATAMIENTOS, CONTENIDOS, DATOS, SOFTWARE, INFORMACIÓN, PRODUCTOS Y/O SERVICIOS. USTED TAMBIÉN RECONOCE Y ACEPTA QUE CUALQUIER PROVEEDOR DE SERVICIOS MÉDICOS O DE CUIDADO DE LA SALUD, O CUALESQUIERA OTROS DIRECTORIOS O LOCALIZADORES (INCLUYENDO SIN LIMITARSE A, SUS CONTENIDOS Y RESULTADOS) CONTENIDOS O PROPORCIONADOS A TRAVÉS DE ESTE SITIO TIENEN SÓLO EL PROPÓSITO DE DAR INFORMACIÓN GENERAL AL CONSUMIDOR, Y NO IMPLICAN NUESTRO RESPALDO O QUE TENGAMOS NINGÚN TIPO SE SOCIEDAD CON DICHOS PROVEEDORES.</p>
            <p>USTED RECONOCE Y ACEPTA QUE EL USO DE ESTE SITIO Y DE LOS "MATERIALES" ES BAJO SU PROPIO RIESGO, Y QUE SE PROPORCIONAN SOBRE BASES DE "COMO SON" Y "SEGÚN DISPONIBILIDAD"; QUE NO DAMOS NINGÚN TIPO DE GARANTÍAS EXPRESAS O IMPLÍCITAS, REPRESENTACIONES O ACEPTAMOS RESPONSABILIDAD DE NINGÚN TIPO EN RELACIÓN CON ESTE SITIO O CUALQUIERA DE LOS "MATERIALES" (INCLUYENDO SIN LIMITARSE A, GARANTÍAS DE TÍTULO, NO VIOLACIÓN, COMERCIABILIDAD O SUFICIENCIA PARA UN PROPÓSITO EN PARTICULAR); Y QUE NO GARANTIZAMOS O NOS RESPONSABILIZAMOS DE QUE ESTE SITIO O CUALQUIERA DE LOS "MATERIALES" SEAN PRECISOS, CONFIABLES, CORRECTOS, ÚTILES, OPORTUNOS, IN-INTERRUMPIDOS, SEGUROS, LIBRES DE DEFECTOS O LIBRES DE ERROR (INCLUYENDO SIN LIMITARSE A, LIBRE DE VIRUS, GUSANOS, TROYANOS, OTROS CÓDIGOS MALICIOSOS U OTROS COMPONENTES DE RIESGO). EN JURISDICCIONES QUE NO PERMITEN LA EXCLUSIÓN O LIMITACIÓN DE CIERTAS GARANTÍAS, LA RESPONSABILIDAD DE NUESTRAS SUBSIDIARIAS, AFILIADAS, CONCEDENTES DE LICENCIAS Y PROVEEDORES SERÁ LIMITADA HASTA EL PUNTO EN EL QUE LO PERMITA LA LEY.</p>
            <p>USTED RECONOCE Y ACEPTA QUE EN NINGÚN CASO NOSOTROS Y/O NUESTRAS SUBSIDIARIAS, AFILIADAS, CONCEDENTES DE LICENCIAS Y/O PROVEEDORES SOMOS RESPONSABLES DE NINGÚN DAÑO DIRECTO, INDIRECTO, INCIDENTAL, CONSECUENCIAL, ESPECIAL, EJEMPLAR, PUNITIVO O DE CUALQUIER OTRO TIPO QUE SE RELACIONE CON EL USO, MAL USO O INCAPACIDAD PARA UTILIZAR ESTE SITIO O CUALQUIERA DE LOS "MATERIALES" (YA SEA QUE SE BASEN EN CONTRATOS, AGRAVIOS, NEGLIGENCIAS, ESTRICTA RESPONSABILIDAD U OTRAS SIMILARES, Y AÚN CUANDO NOSOTROS Y/O NUESTRAS SUBSIDIARIAS, AFILIADAS, CONCEDENTES DE LICENCIAS, Y/O PROVEEDORES HAYAMOS O HAYAN SIDO AVISADOS SOBRE LA POSIBILIDAD DE DAÑOS); Y QUE SI USTED NO ESTÁ SATISFECHO O DEMANDA POR DAÑOS EN RELACIÓN CON CUALQUIERA DE LAS PORCIONES DE ESTE SITIO, CUALQUIERA DE LOS "MATERIALES" O ESTE ACUERDO, SU ÚNICA Y EXCLUSIVA SOLUCIÓN ES DEJAR DE UTILIZAR EL SITIO Y TODOS LOS "MATERIALES". EN JURISDICCIONES QUE NO PERMITAN LA EXCLUSIÓN O LIMITACIÓN DE DAÑOS INCIDENTALES O CONSECUENCIALES, NOSOTROS Y NUESTRAS SUBSIDIARIAS, AFILIADAS, CONCEDENTES DE LICENCIAS Y PROVEEDORES TENDREMOS RESPONSABILIDAD LIMITADA HASTA EL PUNTO EN EL QUE LO PERMITA LA LEY.</p>
            <p>Usted reconoce y acepta que usted indemnizará y nos mantendrá ilesos, a nosotros y a nuestras subsidiarias, sucesores, cesionarios, afiliados, concedentes de licencias, y proveedores, y a todas sus respectivas oficinas, directivos, empleados y asesores, de todas las demandas, daños, pérdidas, responsabilidades, juicios, costos y gastos (incluyendo honorarios y costos razonables de abogados) con relación a su uso, mal uso o incapacidad para utilizar este sitio o cualquiera de los Materiales, o a la violación que usted hubiera cometido en contra de este Acuerdo, de cualquier ley, regla o reglamento, o de cualquier derecho de autor de terceras partes; que nos reservamos el derecho de defender exclusivamente y controlar cualquiera de estos asuntos de indemnización; y que usted cooperará completamente con nosotros en cualquiera de dichas defensas.</p>
            <p>Usted reconoce y acepta que si usted se localiza en alguna jurisdicción del mundo en la que alguna ley, regla, regulación u otra de tipo común, estatutaria, reglamentaria o codificada considere el acceso a este sitio o a cualquiera de los Materiales un hecho inapropiado o ilegal o sujeto a consentimiento o permisos que usted no haya obtenido, o que anule este Acuerdo en su totalidad o en parte, entonces usted no estará autorizado a accesar a este sitio o a cualquiera de los Materiales. Usted también reconoce y acepta que este Acuerdo se regirá y construirá conforme a las leyes del Estado de Nueva York, excluyendo conflictos de provisiones de ley; que la jurisdicción exclusiva para cualquier demanda o acción con relación a su uso, mal uso o incapacidad para utilizar este sitio o cualquiera de los Materiales, o con este Acuerdo, se realizará en el estado o en las cortes federales del Estado de Nueva York; que usted se someterá irrevocablemente a la jurisdicción personal exclusiva de dichas cortes para propósitos de litigios de cualquier demanda o acción legal; y que usted renunciará irrevocablemente a cualquier objeción jurisdiccional de competencia o de inconveniencia de foro.</p>
            <p>Usted reconoce y acepta que si cualquier provisión de este Acuerdo es considerada por cualquier corte u otro tribunal de jurisdicción competente como no ejecutoria, entonces dicha provisión será eliminada o limitada hasta la extensión mínima necesaria de manera que este Acuerdo permanezca en total vigencia y efecto; que este Acuerdo constituye al acuerdo total entre usted y nosotros en relación con el asunto al que se hace referencia en el mismo, y que reemplaza cualquiera y todos los acuerdos o convenios anteriores entre usted y nosotros, ya sea verbales o escritos, con relación a cualquiera de los temas a los que se hace referencia en este Acuerdo; que este Acuerdo no puede ser modificado, ni total ni parcialmente, excepto por nosotros, y de otra manera, se describirá específicamente el alguna parte de este Acuerdo; y que cualquier cosa contenida o proporcionada a través de este sitio que sea inconsistente o que entre en conflicto con los términos de este Acuerdo, será reemplazada por los términos de este Acuerdo.</p>
            <p>PROCEDIMIENTO PARA ENTABLAR DEMANDAS POR VIOLACIÓN AL DERECHO DE AUTOR (COPYRIGHT)</p>
            <p>Respetamos la propiedad intelectual de los demás, y le pedimos a usted y a todos los usuarios de nuestro sitio, afiliados, concedentes de licencias y proveedores que hagan lo mismo. Si usted considera que su trabajo protegido por derechos de autor ha sido copiado y es accesible en este sitio en alguna forma que constituya una violación a dichos derechos de autor (copyright), puede notificárnoslo proporcionando a nuestro agente de derechos de autor toda la siguiente información: </p>
            <ol>
                <li>La firma electrónica o física del propietario del derecho de autor, o de la persona o entidad autorizada para actuar en favor del propietario del derecho de autor. </li>
                <li>Una descripción específica del trabajo con derechos de autor que se considera que se está violando. </li>
                <li>Una descripción específica de la actividad violatoria que se demanda (incluyendo la dirección de la página Web específica en este sitio). </li>
                <li>Una descripción específica en la que exista el original o una copia certificada del trabajo que cuenta con derechos de autor (incluyendo, por ejemplo, una dirección de página Web específica que no se encuentre en este sitio) </li>
                <li>Su nombre, dirección, número telefónico y dirección de e-mail. </li>
                <li>Un escrito hecho por usted estipulando que usted considera de buena fe que el uso en disputa no está autorizado por el propietario de los derechos de autor, la persona o entidad autorizada para actuar a favor del propietario de los derechos de autor, o por la ley. </li>
                <li>Un escrito hecho por usted, hecho bajo gravedad de juramento, estipulando que toda la información anterior es precisa, y que usted es el propietario de los derechos de autor o la persona o entidad autorizada para actuar en favor del propietario de los derechos de autor.</li>
            </ol>
            <p>Nuestro agente para notificaciones de demandas sobre violaciones a derechos de autor en este sitio es: Colgate-Palmolive, S.A. de C.V., Presa La Angostura 225, Col. Irrigación, C.P. 11500 - México D.F.</p>
            <h1>POLÍTICA DE PRIVACIDAD<h1>
            <p>(CONSULTE TAMBIÉN NUESTRA ESPECIAL "POLÍTICA DE PRIVACIDAD PARA NIÑOS, Y NOTA PARA PADRES Y TUTORES" QUE SE ENCUENTRA MÁS ADELANTE)</p>
            <p>Las políticas de privacidad que se describen a continuación son parte de este Acuerdo. Respetamos la privacidad de nuestros visitantes en línea. Recopilamos información en o a través de este sitio que puede identificarle de manera personal sólo cuando usted lo ofrece voluntariamente. Por ejemplo, recolectamos información personalmente identificable para responder a las preguntas y comentarios del visitante sobre nosotros y nuestros productos y servicios, para enviar nuestras publicaciones electrónicas y para contactar a los ganadores de concursos y promociones.</p>
            <p>Nuestro sitio algunas veces incluye sorteos u otras promociones que estamos ofreciendo o que ofrecemos junto con otra compañía, y podríamos permitirle participar electrónicamente en algunos casos. Si esto ocurre, utilizaremos la información que usted proporciona para llevar a cabo la promoción (por ejemplo, para contactarle en caso de que gane) y con su consentimiento, para ofrecerle productos y servicios tanto nuestros como de nuestros patrocinadores conjuntos en los sorteos. Adicionalmente, también podemos recopilar datos demográficos y de otro tipo para propósitos de investigaciones de mercado, publicidad y promocionales.</p>
            <p>No compartimos ninguna de la información personal que usted nos proporciona con ninguna tercera parte que no sean nuestros proveedores de servicios que nos asisten en supliéndonos con la información y/o servicios que nosotros les proporcionamos a ustedes. Hasta el punto en el que nosotros compartimos su información personal con un proveedor de servicios, sólo lo haremos si dicha parte acepta cumplir con nuestros estándares de privacidad que se describen en esta política de privacidad.</p>
            <p>Cualquier información que no sea personal, comunicados y material que usted nos envíe a este sitio por e-mail, no serán bajo bases de confidencialidad. Tendremos la libertad de utilizar y reproducir cualquiera de esa información y para cualquier propósito. Específicamente, tendremos la libertad de utilizar cualesquiera ideas, conceptos, "saber cómo" (know-how) o técnicas contenidas en dicha información para cualquier propósito, incluyendo el desarrollo, manufactura o comercialización de productos. Cualquier información que usted envíe a este sitio deberá ser confiable, no deberá violar los derechos de otras personas y deberá ser legal.</p>
            <p>Como muchas otras compañías, utilizamos la tecnología "cookie", donde nuestros servidores depositan códigos especiales en las computadoras de los usuarios. Esta información nos ayuda a determinar el número total de visitantes al sitio de manera continua y los tipos de navegadores de Internet (por ejemplo, Navegador Netscape o Internet Explorer) y los sistemas operativos (por ejemplo, Windows o MacIntosh) que utilizan nuestros visitantes. Esta información se utiliza para mejorar sus visitas en línea. Bajo ninguna circunstancia utilizamos esta información para identificar de manera personal a los visitantes o cruzar información con ningún tipo de información personal que haya sido ofrecida voluntariamente en o a través del sitio.</p>
            <p>Podemos modificar esta política en cualquier momento, a nuestro exclusivo juicio, y todas las modificaciones entrarán en vigencia inmediatamente al ser expuestas en este sitio. A menos que lo determinemos específicamente de otra manera, esta política solo aplica a este sitio y a nuestras actividades en línea, y no aplica a ninguna de las actividades que realizamos fuera de línea.</p>
            <p>Para obtener mayor información sobre nuestras prácticas de privacidad en línea, por favor contacte a Colgate-Palmolive, S.A. de C.V., Presa La Angostura 225, Col. Irrigación, C.P. 11500 - México D.F.</p>
            <p>ENUNCIADO DE PRIVACIDAD PARA CARRERAS</p>
            <p>La Compañía Colgate-Palmolive y sus subsidiarias en todo el mundo están comprometidas a respetar la privacidad de nuestros visitantes en línea. Este enunciado de privacidad describe qué información recopilamos cuando usted crea un Perfil de Trabajo en la sección de Carreras de nuestro sitio Web, cómo usamos esa información, y sus elecciones respecto al uso que nosotros debemos dar a esa información.</p>
            <p>La Información Personal que Recolectamos y Cómo la Utilizamos </p>
            <p>Por 'Información Personal' nos referimos a nombres, direcciones, direcciones de e-mail, experiencia e historial laboral y otra información personal que usted proporcione voluntariamente sobre usted y sus capacidades e intereses, y que después se comparará contra nuestras oportunidades y requerimientos actuales de trabajo. Esta información se utilizará para evaluar su calificación para el puesto deseado y posiblemente contactarlo para obtener mayor información. También, posteriormente podría pedírsele cierta información de identificación que será utilizada sólo con propósitos de reporte de diversidad federal y estatal.</p>
            <p>Al crear un Perfil de Trabajo, usted reconoce y acepta que la información que usted está sometiendo está completa y es correcta hasta el punto de su mejor conocimiento. El proporcionar información falsa cuando cree su Perfil de Trabajo o durante el proceso de solicitud, podría ocasionar que fuera rechazado o despedido.</p>
            <p>Autorización </p>
            <p>Al solicitar empleo con nosotros a través de la sección de Carreras de nuestro sitio Web, usted nos autoriza a nosotros y/o a nuestros agentes autorizados para realizar una investigación de los antecedentes incluyendo sin limitarse a, una revisión de antecedentes penales, una revisión de referencias de empleo, y verificación de cualquier información que usted haya proporcionado. También autoriza a todas las corporaciones, compañías, instituciones educacionales, personas, autoridades, cortes penales, civiles y federales y a anteriores empleadores a proporcionar información que puedan tener sobre usted.</p>
            <p>Divulgación de Información Personal </p>
            <p>Podemos compartir su información personal con vendedores o proveedores de servicios como compañías que nos ayudan a administrar nuestras bases de datos. También podemos compartir su información personal con otras compañías de Colgate-Palmolive en otros países en los que las leyes de privacidad pueden no ser equivalentes a las vigentes en los Estados Unidos.</p>
            <p>En todos estos casos, sin embargo, seguiremos los pasos razonables para ayudar a salvaguardar su información personal. Sólo compartiremos su información bajo términos y condiciones que obliguen a los receptores a proteger la privacidad y seguridad de su información personal.
            <p>Excepto como se describe en este Enunciado de Privacidad o como lo requiera la ley, no compartiremos su información personal con terceras partes, a menos que tengamos su consentimiento o cuando usted haya sido notificado sobre esta práctica al recopilar por primera vez su información personal.</p>
            <p>Venta de Nuestras Marcas o Negocios </p>
            <p>En relación con la venta de una o más de nuestras marcas o de parte de nuestro negocio a otra compañía, nos reservamos el derecho de transferir su información personal al nuevo propietario que acepte ofrecer seguridad equivalente en el uso y divulgación de su información personal.</p>
            <p>Usted Puede Accesar y Actualizar su Información Personal </p>
            <p>En cualquier momento usted tendrá el derecho de registrarse en el sistema para modificar, corregir o borrar la información personal que usted proporcionó para ser utilizada en su Perfil de Trabajo o su curriculum. En caso de que usted borre su Perfil de Trabajo o su curriculum, dejaremos inactivo su Perfil de Trabajo o su curriculum. Sin embargo, usted comprende que conservaremos su Perfil de Trabajo indefinidamente con propósitos de conservación de registros.</p>
            <p>Para obtener información más detallada sobre nuestras prácticas de privacidad en línea, por favor consulte nuestro Legal Statement and Privacy Policy (Enunciado Legal y Política de Privacidad). Si tiene preguntas sobre el uso que daremos a su información personal, puede enviarlas al e-mail colgate-palmolive_consumer_affairs@colpal.com.</p>
            <p>POLÍTICA DE PRIVACIDAD PARA NIÑOS, 
                Y NOTA PARA PADRES Y TUTORES</p>
            <p>Nos preocupamos por la privacidad de los niños. Reconocemos que debido al uso que los niños dan al Internet y al e-mail surgen preocupaciones especiales sobre la privacidad y seguridad de la información.</p>
            <p>Es nuestro propósito apegarnos al Acta de Protección de la Privacidad En Línea de los Niños y a sus reglas al recopilar información personal de menores. Recordamos y alentamos a los padres para que revisen y monitoreen las actividades de los niños en línea. Ayúdenos a proteger la privacidad de sus hijos asegurando que nunca envíen e-mails o presenten información personal a este sitio o a ningún otro sitio sin su permiso.</p>
            <p>No condicionamos la participación de los niños en una actividad y solicitamos a los niños solo la información personal que es razonablemente necesaria para participar en dicha actividad. No compartimos la información personal de los niños con terceras partes.</p>
            <p>Los padres tienen el derecho de revisar y borrar cualquier información que sea personalmente identificable y que hayamos recopilado de sus hijos, y pueden rehusarse a permitir la recopilación posterior de dicha información. Para iniciar este proceso, por favor envíen un e-mail a colgate-palmolive_consumer_affairs@colpal.com.</p>
            <p>Sus niños pueden disfrutar la mayor parte del contenido y actividades de nuestras áreas para niños sin proporcionar ninguna información personal. Por ejemplo, el sitio del Mundo para Niños en http://kids-world.colgatepalmolive.com que ofrece interesantes hechos, juegos e historias que tienen el propósito de aumentar el interés del los niños por el cuidado bucal. Adicionalmente,http://www.colgatebsbf.com proporciona materiales educacionales en materia bucal diseñados para maestros, padres y niños, y tiene divertidas actividades para los niños. Solo algunas de las funciones requieren de una dirección de e-mail de sus niños, y sólo con el propósito de atender las solicitudes de sus hijos o responder sus preguntas. Una vez que hemos respondido, borramos la dirección de e-mail de sus hijos de nuestro sistema. Por ejemplo, nuestra Hada de los Dientes pide la dirección de e-mail de su hijo para enviarle un mensaje especial cuando se les caiga un diente. Esta información se utiliza sólo para responder a la solicitud del niño y no se pide mayor información. La información se captura y almacena por veinticuatro horas solamente. Una vez que el Hada de los Dientes responde al niño, la información se desecha y no puede recuperarse.</p>
            <p>Algunas veces solicitamos o aceptamos propuestas o presentaciones de los niños, algunas de las cuales pueden exhibirse en nuestros sitios. Dichas propuestas o presentaciones pueden hacerse sólo fuera de línea. Si un niño o su padre desea que coloquemos una foto o cualquier otra información personalmente identificable, requerimos del permiso y el formato de liberación firmados por el padre. Cuando un niño nos entrega una presentación o propuesta fuera de línea, por ejemplo por correo normal, podemos elegir si retenemos toda la información que nos envió. A menos que recibamos un formato firmado con el permiso de los padres, examinamos todas las propuestas que se reciben fuera de línea antes de exhibirlas, y retiramos toda la información personal que puedan contener.</p>
            <p>Como ya se describió arriba más ampliamente, utilizamos la tecnología "cookie", donde nuestros servidores depositan códigos especiales en las computadoras de nuestros visitantes. Esta información se utiliza para mejorar sus visitas en línea. Bajo ninguna circunstancia utilizamos esta información para identificar personalmente a los visitantes o para cruzar la información con ningún tipo de información personal que haya sido ofrecida voluntariamente en o a través del sitio.</p>
            <p>Para el esparcimiento de sus hijos, también tenemos links con otros sitios. No nos hacemos responsables de estos otros sitios, y les aconsejamos revisar también sus políticas de privacidad.</p>
            <p>Para obtener información adicional sobre las prácticas de privacidad de los niños, por favor contacte a Colgate-Palmolive, S.A. de C.V., Presa La Angostura 225, Col. Irrigación, C.P. 11500 - México D.F.</p>
        </div>
        <!-- Dynamic SiteCatalyst code version: H.x. Copyright 1997-2004 Omniture, Inc. More info available at http://www.omniture.com -->
        <script language="JavaScript">
        <!--
            var s_account='CPMXAll,CPMXColgateLuminous ';
        -->
        </script>
        <script language='JavaScript' src='/Colgate/Common/s_code_remote_h.js'></script>
        <script language="JavaScript">
            <!--
            _omniture.pageName='www.luminousselfie.com/index.php';
            _omniture.server='www.colgate.com';
            _omniture.channel='main';
            _omniture.account='CPMXAll,CPMXColgateLuminous ';
            _omniture.prop1='Latin America';
            _omniture.prop2='Mexico';
            _omniture.prop3='Spanish';
            _omniture.prop4='Oral Care';
            _omniture.prop5='Oral Care Products';
            _omniture.prop6='Toothpaste';
            _omniture.prop7='Colgate Luminous Instant';
            _omniture.prop7='Colgate Luminous Instant';
            _omniture.linkInternalFilter='javascript:,/Luminous';
            _omniture.hier1='Colgate Universal,';
            -->
        </script>
        <script language='JavaScript' src='/Colgate/Common/s_code_remote_h_post.js'></script>
         <script language="JavaScript">
            <!--
            var s_code=_omniture.t();
            if(s_code) {
                alert("s_code="+s_code);
                document.write(s_code); 
            } //-->
        </script>
        <!-- End SiteCatalyst code version: H.x. -->
        <noscript><img src="http://CPARAll.112.2o7.net/b/ss/CPMXAll,CPMXColgateLuminous/1/1/H.7--NS/123456?pageName=www.luminousselfie.com/index.php" width="1" height="1" border="0" /></noscript>
    </body>
</html>