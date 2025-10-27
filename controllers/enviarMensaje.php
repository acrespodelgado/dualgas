<?php

session_start();
require_once('./../wp-load.php');
require  './../wp-config.php';

date_default_timezone_set('Europe/Madrid');

if(isset($_POST['mensaje']) && !empty($_POST['mensaje'])
&& isset($_POST['codigo']) && !empty($_POST['codigo'])
&& isset($_POST['id']) && !empty($_POST['id'])) {

    if(isset($_POST['id_agente']) && !empty($_POST['id_agente'])) 
        $id_agent = $_POST['id_agente'];
    else 
        $id_agent = 1;

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");

    $message = $_POST['mensaje'];
    $code = $_POST['codigo'];
    $id = $_POST['id'];
    
    $message = trim(htmlspecialchars($mysqli->real_escape_string($message)));
    $code = trim(htmlspecialchars($mysqli->real_escape_string($code)));
    $id = trim(htmlspecialchars($mysqli->real_escape_string($id)));

    $sql = "SELECT id FROM chats WHERE code = '".$code."'";
    $res = $mysqli->query($sql);

    while ($fila = $res->fetch_object()) {
        $id_check = $fila->id;
    }

    if($id == $id_check) {
        $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));

        $sql_insert_message = "INSERT INTO messages VALUES ('', $id, '".$message."', 0, '".$now->format('Y-m-d H:i:s')."')";
        $res_insert_message = $mysqli->query($sql_insert_message);

        $sql_check_id = "SELECT id FROM messages WHERE chat_id = '".$id."' ORDER BY id DESC LIMIT 1";
        $res_check = $mysqli->query($sql_check_id);

        while ($fila = $res_check->fetch_object()) {
            $id_message = $fila->id;
        }
    
        $sql_insert_messageSendBy = "INSERT INTO messageSendBy VALUES ('', ".$id_message.", ".$id_agent.")";
        $res_insert_messageSendBy = $mysqli->query($sql_insert_messageSendBy);

        if($id_agent == 1) {
            $to = 'compliance@dualgas.es';
            $title = 'Nuevo mensaje en línea de comunicación segura ID: ' . $code;
            $message_email = $message;

            wp_mail($to, $title, $message_email);
        }

        echo json_encode(["ok" => "1", "message" => $message, "date" => $now]);
    } else {
        echo json_encode(["ok" => "0", "message" => "Se ha producido un error en la validación del chat. Intente de nuevo."]);
    }

    $mysqli->close();
} else {
    echo json_encode(["ok" => "0", "message" => "Por favor, escriba su mensaje."]);
}

?>