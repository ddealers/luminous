<?php
include("funciones.php");
$id = @$_REQUEST['id'];
$article = get_magazine_info($id);
$article[0]['body_news'] = utf8_encode($article[0]['body_news']);
header("Content-type: application/json");
echo json_encode($article[0]);
?>