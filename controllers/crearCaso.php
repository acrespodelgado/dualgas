<?php

session_start();
require_once('./../wp-load.php');
require  './../wp-config.php';

if(isset($_POST['password']) && !empty($_POST['password'])) {

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");

    $pass = $_POST['password'];
    $pass = hash('sha256', trim(htmlspecialchars($mysqli->real_escape_string($pass))));
    $codeCaso = random_int(100000, 999999);
    
    $sql = "SELECT code FROM chats";
    $res = $mysqli->query($sql);

    while (in_array($codeCaso, $res->fetch_array()))
        $codeCaso = random_int(100000, 999999);

    $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));
    
    $sql_insert = "INSERT INTO chats VALUES ('',".$codeCaso.", '".$pass."', 1, '".$now->format('Y-m-d H:i:s')."', '')";
    $res_insert = $mysqli->query($sql_insert);

    $sql_check = "SELECT id FROM chats WHERE code = '".$codeCaso."' and password = '".$pass."'";
    $res_check = $mysqli->query($sql_check);

    while ($fila = $res_check->fetch_object()) {
        $id = $fila->id;
    }

    if($id > 0) {
        setcookie("CookieCaso", $id.'&'.$codeCaso.'&'.$pass, time()+3600, "/");  /* expira en 1 hora */
        echo json_encode(["ok" => "1"]);
    } else {
        echo json_encode(["ok" => "0", "message" => "Ha ocurrido un error"]);
    }

    $mysqli->close();
} else {
    wp_redirect('https://www.dualgas.es/');
}

?>