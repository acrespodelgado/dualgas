<?php

session_start();
require_once('./../wp-load.php');
require  './../wp-config.php';

date_default_timezone_set('Europe/Madrid');

if((isset($_POST['password']) && !empty($_POST['password'])
&& isset($_POST['idCaso']) && !empty($_POST['idCaso'])) || 
isset($_POST['id']) && !empty($_POST['id'])) {

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");

    if(isset($_POST['id'])) {
        $datos_caso = explode("-", $_POST['id']);
        $id = $datos_caso[0];
        $code = $datos_caso[1];

        $sql_password = "SELECT password FROM chats WHERE id = '" .$id. "' AND code = '" .$code. "'";
        $res_password = $mysqli->query($sql_password);

        while ($fila = $res_password->fetch_object()) {
            $pass = $fila->password;
        }
    } else {
        $pass = $_POST['password'];
        $code = $_POST['idCaso'];
        
        $code = trim(htmlspecialchars($mysqli->real_escape_string($code)));
        $pass = hash('sha256', trim(htmlspecialchars($mysqli->real_escape_string($pass))));

        $stmt = $mysqli->prepare("SELECT id FROM chats WHERE password = ? and code = ?");
        $stmt->bind_param("si", $pass, $code);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($fila = $res->fetch_object()) {
            $id = $fila->id;
        }
    }

    if($id > 0) {
        setcookie("CookieCaso", $id.'&'.$code.'&'.$pass, time()+3600, "/");  /* expira en 1 hora */
        echo json_encode(["ok" => "1"]);
    } else {
        echo json_encode(["ok" => "0", "message" => "Código o contraseña erróneas"]);
    }

    $mysqli->close();
} else {
    wp_redirect('https://www.dualgas.es/');
}

?>