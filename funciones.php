<?php
include("connoo.php");

function get_people($page=0) {
    $db = new Database();
    $db->connect();
    $query = "SELECT id_people,title_people,fecha_people,body_people,image,estatus,dateReg from tbl_people where 1 order by dateReg desc";
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
    $query = "SELECT id_news,title_news,fecha_news,body_news,image,estatus,dateReg from tbl_news where 1 and id_news=" . $id_news . " order by dateReg desc";
    $result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
    for ($i = 0; $i < mysql_numrows($result); $i++) {
        for ($j = 0; $j < mysql_num_fields($result); $j++) {
            $retval[$i][mysql_field_name($result, $j)] = mysql_result($result, $i, mysql_field_name($result, $j));
        }//end inner loop
    }//end outer loop
    return $retval;
}

?>