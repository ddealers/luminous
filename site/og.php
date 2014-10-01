<?php
include("funciones.php");
$id = @$_REQUEST['id'];
$article = get_magazine_info($id);
$article[0]['body_news'] = utf8_encode($article[0]['body_news']);
//var_dump($article[0]);
?>
<!DOCTYPE html>
<html>
    <head>
            <meta property="og:title" content="<? echo $article[0]['title_news'] ?>">
            <meta property="og:site_name" content="Luminous Selfie"/>
            <meta property="og:url" content="<? echo 'http://luminousselfie.com/site/#art/'.$article[0]['id_news'] ?>">
            <meta property="og:image" content="<? echo $article[0]['image'] ?>">
            <meta property="og:description" content="<? echo substr($article[0]['body_news'], 0, 144) . '...' ?>">
    </head>
    <body>
        <p>Loading...</p>
        <script type="text/javascript">
            /*
            setTimeout(function(){
                location.href = "http://luminousselfie.com/site/#art/<? echo $article[0]['id_news'] ?>";
            }, 500);
            */
        </script>
    </body>
</html>