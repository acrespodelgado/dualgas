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
    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($mysqli->connect_errno) {
            echo json_encode(["ok" => 0, "message" => "Error de conexión"]);
            exit;
        }
        
        $mysqli->set_charset("utf8");

        // Validar y extraer datos del ID
        $datos_caso = explode("-", $_POST['id']);
        
        if (count($datos_caso) < 2) {
            echo json_encode(["ok" => 0, "message" => "Formato de ID inválido"]);
            $mysqli->close();
            exit;
        }

        $id = $datos_caso[0];
        $code = $datos_caso[1];

        // Validar que sean números/strings válidos
        if (!is_numeric($id) || empty($code)) {
            echo json_encode(["ok" => 0, "message" => "Datos inválidos"]);
            $mysqli->close();
            exit;
        }

        $now = new DateTime(null, new DateTimeZone('Europe/Madrid'));
        $fecha_cierre = $now->format('Y-m-d H:i:s');

        // Verificar que el chat existe y está abierto
        $stmt_check = $mysqli->prepare("SELECT state FROM chats WHERE id = ? AND code = ?");
        $stmt_check->bind_param("is", $id, $code);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        
        if (!$result || $result->num_rows === 0) {
            echo json_encode(["ok" => 0, "message" => "Chat no encontrado"]);
            $stmt_check->close();
            $mysqli->close();
            exit;
        }

        $row = $result->fetch_assoc();
        if ($row['state'] == 0) {
            echo json_encode(["ok" => 0, "message" => "El chat ya está cerrado"]);
            $stmt_check->close();
            $mysqli->close();
            exit;
        }
        $stmt_check->close();

        // Cerrar el chat usando prepared statement
        $stmt_close = $mysqli->prepare("UPDATE chats SET state = 0, close_at = ? WHERE id = ? AND code = ?");
        $stmt_close->bind_param("sis", $fecha_cierre, $id, $code);
        
        if ($stmt_close->execute() && $stmt_close->affected_rows > 0) {
            echo json_encode(["ok" => 1]);
        } else {
            echo json_encode(["ok" => 0, "message" => "No se pudo cerrar el chat"]);
        }
        
        $stmt_close->close();
        $mysqli->close();

    } else {
        echo json_encode(["ok" => 0, "message" => "ID de chat requerido"]);
    }

} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>