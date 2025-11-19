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

try {
    if (isset($_POST['nick']) && !empty($_POST['nick']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($mysqli->connect_errno) {
            echo json_encode(["ok" => 0, "message" => "Error de conexión"]);
            exit;
        }
        
        $mysqli->set_charset("utf8");

        $nick = trim($_POST['nick']);
        $password = trim($_POST['password']);

        // Sanitizar inputs
        $nick = htmlspecialchars($nick);
        $password = hash('sha256', htmlspecialchars($password));

        // Prepared statement para buscar agente
        $stmt = $mysqli->prepare("SELECT id FROM agents WHERE password = ? AND nick = ?");
        $stmt->bind_param("ss", $password, $nick);
        $stmt->execute();
        $result = $stmt->get_result();

        $id = null;
        if ($row = $result->fetch_assoc()) {
            $id = $row['id'];
        }
        $stmt->close();

        if ($id && $id > 1) {
            setcookie("CookieAgente", $id.'&'.$nick.'&'.$password, time()+3600*12, "/");  /* expira en 12 horas */
            echo json_encode(["ok" => 1]);
        } else {
            echo json_encode(["ok" => 0, "message" => "Usuario o contraseña incorrectos"]);
        }

        $mysqli->close();

    } else {
        echo json_encode(["ok" => 0, "message" => "Rellene los campos del formulario"]);
    }

} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>