<?php
include("connoo.php");

$do = @$_REQUEST['action'];
switch ($do) {
    case 'save':
        save();
        break;
    case 'savePic':
        savePic();
        break;
    case 'loadPics':
        loadPics();
        break;
    case 'like':
        like();
        break;
    default:
        echo 'No se declaró una acción a realizar';
        break;
}
function save(){
    $db = new Database();
    $name = @$_REQUEST['name'];
    $phone = @$_REQUEST['tel'];
    $email = @$_REQUEST['mail'];
    $ticket = @$_REQUEST['ticket'];

    $db->connect();

    $query = "SELECT id from users where email='$email' limit 1";
    $result = mysql_query($query);
    if(mysql_numrows($result) > 0){
        $r = mysql_fetch_array($result);
        $result = ['success'=>true, 'id'=>$r['id']];
    }else{
        $query = "INSERT INTO users(name, phone, email, ticket, created_at) VALUES ('$name','$phone','$email','$ticket',NOW())";
        $result = mysql_query($query) or die('<h1>Query failed</h1><br />' . mysql_error() . '<br />' . $query);
        $id = $db->lastId();

        if($id)
            $result = ['success'=>true, 'id'=>$id];
        else
            $result = ['success'=>false];
    }    
    echo json_encode($result);
}


function savePic(){
    $db = new Database();
    $uid = $_REQUEST['uid'];
    
    $img = $_REQUEST['image'];
    //$img = $_FILES['image'];
    //$res = ['success'=>false];
    
    $db->connect();
    
    $dir = '../uploads';
    if (!is_dir($dir)) {
        mkdir($dir, 0777);         
    }

    if((isset($uid) && $uid != NULL ) && (isset($img) && $img != NULL)){
        $name = uniqid('img') . '.jpg';
        $filtered = substr($img, strpos( $img, ',' ) + 1 );
        $decoded = base64_decode( $filtered );
        $fp = fopen( '../uploads/' . $name, 'wb' );
        fwrite( $fp, $decoded );
        fclose( $fp );
        /*
        $uname = str_replace(' ', '', $_FILES['image']['name']);
        $name = uniqid();
        $ext = explode('.', $_FILES['image']['name']);
        $name = $name .'.'.$ext['1'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/'.$name.'');
        */

        $q = "UPDATE users SET image='$name' WHERE id = '$uid'";
        $v = mysql_query($q);
        //var_dump($v);

        if($v){
            $res = ['success'=>true, 'nombre'=>$name];
        }else{
            $res = ['success'=>false];
        }
    }
    echo json_encode($res);
}

function loadPics(){
    $db = new Database();
    $uid = $_REQUEST['uid'];

    //$res['error'] = 'algo salio mal';
    
    $db->connect();

    $p ='';
    //total de usuarios

    $q = "SELECT COUNT(id) AS Users FROM users";
    $v = mysql_query($q);
    while ($row = mysql_fetch_assoc($v)) {
        $num = $row['Users'];
    }
    $nums = $num - 5;

    if(isset($uid) && $uid != NULL){
        $q = "SELECT id, image,name FROM users WHERE id= '$uid'";
    }else{
        $uid = rand(1,$num);
        $q = "SELECT id, image,name FROM users WHERE id= '$uid'";
        
    }

    $v = mysql_query($q);
    if($v){
        $row = mysql_fetch_assoc($v);
        $q = "SELECT count(*) AS votes FROM user_likes WHERE id_foto = '$uid'";
        $v = mysql_query($q);
        if($v) $count = mysql_fetch_assoc($v)['votes'];
        $res['principal'] = $row;
        $res['principal']['votes'] = $count;
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

        $q = "SELECT id, image,name FROM users WHERE id in ($p)";
        $r = mysql_query($q);

        if($r){
            while ($row = mysql_fetch_assoc($r)) {
                $res['miniaturas'][] = $row;
            }
        }else{
            $res['miniaturas'] = 'No hay suficientes usuarios';
        }

    echo json_encode($res);
}

function like(){
    $db = new Database();
    $uid = $_REQUEST['uid'];
    $fid = $_REQUEST['fid'];
    $res = ['success'=>false];
    $db->connect();

    if($uid != NULL && $fid != NULL){
        $q = "SELECT * FROM user_likes WHERE id_usuario = '$uid' AND id_foto = '$fid' ";
        $v = mysql_query($q);

        if($v){
            if(mysql_num_rows($v) >= 1){
                $res = ['success'=>true, 'rzn'=>'Ya le dio like'];
            }else{
                $q = "INSERT INTO user_likes VALUES('$uid', '$fid', NOW())";
                $r = mysql_query($q);
                if($r){
                    $res = ['success' => true];
                }else{
                    $res = ['success' => false, 'rzn' => 'Error al Insertar'];
                }
            }
        }else{
            $res = ['success' => false, 'rzn'=>'Error al consultar'];
        }
    }
    echo json_encode($res);
}
?>