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
    if ((isset($_POST['password']) && !empty($_POST['password']) && 
         isset($_POST['idCaso']) && !empty($_POST['idCaso'])) || 
        (isset($_POST['id']) && !empty($_POST['id']))) {

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($mysqli->connect_errno) {
            echo json_encode(["ok" => 0, "message" => "Error de conexión"]);
            exit;
        }
        
        $mysqli->set_charset("utf8");

        $id = null;
        $code = null;
        $pass = null;

        if (isset($_POST['id'])) {

            $datos_caso = explode("-", $_POST['id']);
            
            if (count($datos_caso) >= 2) {
                $id = $datos_caso[0];
                $code = $datos_caso[1];

                $stmt = $mysqli->prepare("SELECT password FROM chats WHERE id = ? AND code = ?");
                $stmt->bind_param("is", $id, $code);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($row = $result->fetch_assoc()) {
                    $pass = $row['password'];
                } else {
                    $id = null; // Reset si no se encuentra
                }
                $stmt->close();
            }
        } else {

            $input_pass = trim($_POST['password']);
            $input_code = trim($_POST['idCaso']);
            
            if (empty($input_pass) || empty($input_code)) {
                echo json_encode(["ok" => 0, "message" => "Código o contraseña erróneas"]);
                $mysqli->close();
                exit;
            }

            $code = htmlspecialchars($input_code);
            $pass = hash('sha256', htmlspecialchars($input_pass));

            $stmt = $mysqli->prepare("SELECT id FROM chats WHERE password = ? AND code = ?");
            $stmt->bind_param("ss", $pass, $code);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $id = $row['id'];
            }
            $stmt->close();
        }

        if ($id && $id > 0 && $code && $pass) {
            // Verificar que el chat existe y está activo
            $stmt = $mysqli->prepare("SELECT state FROM chats WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            if ($row && $row['state'] == 1) {
                setcookie("CookieCaso", $id.'&'.$code.'&'.$pass, time()+3600, "/");
                echo json_encode(["ok" => 1]);
            } else {
                echo json_encode(["ok" => 0, "message" => "El chat no está activo"]);
            }
            $stmt->close();
        } else {
            echo json_encode(["ok" => 0, "message" => "Código o contraseña erróneas"]);
        }

        $mysqli->close();
    } else {
        echo json_encode(["ok" => 0, "message" => "Datos insuficientes"]);
    }

} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>