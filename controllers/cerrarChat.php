<?php 

session_start();
require  './../wp-config.php';

if(isset($_POST['id']) && !empty($_POST['id'])) {

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");

    if(isset($_POST['id'])) {
        $datos_caso = explode("-", $_POST['id']);
        $id = $datos_caso[0];
        $code = $datos_caso[1];
        $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));

        $sql_close = "UPDATE chats SET state = 0, close_at = '" . $now->format('Y-m-d H:i:s') . "' WHERE id = '" .$id. "' AND code = '" .$code. "'";
        $res_close = $mysqli->query($sql_close);

        if($res_close)
            echo json_encode(["ok" => "1"]);
        else
            echo json_encode(["ok" => "0", "message" => "Se ha producido un error"]);
    }
} else {
    echo json_encode(["ok" => "0", "message" => "Se ha producido un error"]);
}

?>