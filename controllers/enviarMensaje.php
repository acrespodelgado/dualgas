<?php

if (ob_get_level()) {
    ob_end_clean();
}
ob_start();

session_start();
require_once(__DIR__ . '/../wp-config.php');

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

date_default_timezone_set('Europe/Madrid');

try {
    if (!isset($_POST['mensaje']) || empty(trim($_POST['mensaje'])) ||
        !isset($_POST['codigo']) || empty($_POST['codigo']) ||
        !isset($_POST['id']) || empty($_POST['id'])) {
        echo json_encode(["ok" => 0, "message" => "Por favor, escriba su mensaje."]);
        exit;
    }

    // Determinar ID del agente
    $id_agent = (isset($_POST['id_agente']) && !empty($_POST['id_agente'])) ? $_POST['id_agente'] : 1;

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if ($mysqli->connect_errno) {
        echo json_encode(["ok" => 0, "message" => "Error de conexión"]);
        exit;
    }
    
    $mysqli->set_charset("utf8");

    $message = trim($_POST['mensaje']);
    $code = $_POST['codigo'];
    $id = $_POST['id'];

    // Verificar que el chat existe y coincide
    $stmt = $mysqli->prepare("SELECT id FROM chats WHERE code = ? AND id = ?");
    $stmt->bind_param("si", $code, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $id_check = null;
    if ($row = $result->fetch_assoc()) {
        $id_check = $row['id'];
    }
    $stmt->close();

    if ($id != $id_check) {
        echo json_encode(["ok" => 0, "message" => "Se ha producido un error en la validación del chat. Intente de nuevo."]);
        $mysqli->close();
        exit;
    }

    $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));
    $fecha_envio = $now->format('Y-m-d H:i:s');

    // Insertar mensaje
    $stmt = $mysqli->prepare("INSERT INTO messages (chat_id, content, state, sent_at) VALUES (?, ?, 0, ?)");
    $stmt->bind_param("iss", $id, $message, $fecha_envio);
    
    if (!$stmt->execute()) {
        echo json_encode(["ok" => 0, "message" => "Error al enviar el mensaje"]);
        $stmt->close();
        $mysqli->close();
        exit;
    }
    
    $id_message = $mysqli->insert_id;
    $stmt->close();

    // Verificar que se obtuvo el ID del mensaje
    if (!$id_message) {
        echo json_encode(["ok" => 0, "message" => "Error al obtener el ID del mensaje"]);
        $mysqli->close();
        exit;
    }

    // Insertar relación mensaje-agente
    $stmt = $mysqli->prepare("INSERT INTO messageSendBy (message_id, agent_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $id_message, $id_agent);
    
    if (!$stmt->execute()) {
        echo json_encode(["ok" => 0, "message" => "Error al asociar el mensaje"]);
        $stmt->close();
        $mysqli->close();
        exit;
    }
    $stmt->close();

    // Enviar email si es un usuario (no agente)
    if ($id_agent == 1) {
        $to = 'compliance@dualgas.es';
        $title = 'Nuevo mensaje en línea de comunicación segura ID: ' . $code;
        $message_email = $message;

        if (!function_exists('wp_mail')) {
            require_once(__DIR__ . '/../wp-load.php');
        }
        wp_mail($to, $title, $message_email);
    }

    echo json_encode([
        "ok" => 1, 
        "message" => $message, 
        "date" => $fecha_envio
    ]);

    $mysqli->close();

} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>