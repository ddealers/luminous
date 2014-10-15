<?php
include("connoo.php");

function get_people($limit=3, $page=0) {
    $db = new Database();
    $db->connect();
    $page = $page * $limit;
    $query = "SELECT id_people,title_people,fecha_people,body_people,image,estatus,dateReg from tbl_people where 1 order by dateReg desc limit $page, $limit";
	$result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    return $retval;
}

function get_magazine() {
    $db = new Database();
    $db->connect();
    $query = "SELECT id_news,title_news,fecha_news,body_news,image,estatus,dateReg from tbl_news where 1 order by dateReg desc";
    $result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    return $retval;
}

function get_magazine_info($id_news="") {
    $db = new Database();
    $db->connect();
    $query = "SELECT id_news_pic,id_news,image from news_pics where 1 and id_news=" . $id_news . " order by dateReg desc";
    $result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    $pix=$retval;
    unset($retval);
    unset($result);
    
    $query = "SELECT id_news,title_news,fecha_news,body_news,image,estatus,dateReg from tbl_news where 1 and id_news=" . $id_news . " order by dateReg desc";
    $result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    $retval[0]['image_arr']=$pix;
    return $retval;
}
function load_pics($uid){
    $db = new Database();
    $db->connect();
    $p ='';
    $q = "SELECT COUNT(id) AS Users FROM users";
    $v = mysql_query($q);
    while ($row = mysql_fetch_assoc($v)) {
        $num = $row['Users'];
    }
    $nums = $num - 5;
    if(isset($uid) && $uid != NULL){
        $q = "SELECT id, image, name FROM users WHERE id= '$uid'";
    }else{
        $uid = rand(1,$num);
        $q = "SELECT id, image, name FROM users WHERE id= '$uid'";
    }
    $v = mysql_query($q);
    if($v){
        $row = mysql_fetch_assoc($v);
        $q = "SELECT count(*) AS votes FROM user_likes WHERE id_foto = '$uid'";
        $v = mysql_query($q);
        if($v) $count = mysql_fetch_assoc($v)['votes'];
        $res['principal'] = $row;
        $res['principal']['votos'] = $count;
    }else{
        $res['principal'] = 'El id no existe o no tiene información';
    }
    $r = rand(1, $nums);
    if(($r <= 5)){
        $p  = array($r, $r= $r+1, $r= $r+1, $r= $r+1,$r= $r+1);
    }elseif ($r <= 0) {
        $r = 1;
        $p  = array($r, $r= $r+1, $r= $r+1, $r= $r+1,$r= $r+1);
    }
    else{
        $p  = array($r, $r= $r-1, $r= $r-1, $r= $r-1,$r= $r-1);
    }
    $p = implode(',', $p);
    $q = "SELECT id, image, name FROM users WHERE id in ($p)";
    $r = mysql_query($q);
    if($r){
        while ($row = mysql_fetch_assoc($r)) {
            $res['miniaturas'][] = $row;
        }
    }else{
        $res['miniaturas'] = 'No hay suficientes usuarios';
    }
    return $res;
}
?>