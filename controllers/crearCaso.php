<?php

if (ob_get_level()) {
    ob_end_clean();
}

ob_start();

session_start();

require_once __DIR__ . '/../wp-config.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

try {
    if (!isset($_POST['password']) || empty(trim($_POST['password']))) {
        echo json_encode(["ok" => 0, "message" => "Falta la contraseña"]);
        exit;
    }

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if ($mysqli->connect_errno) {
        echo json_encode(["ok" => 0, "message" => "Error de conexión"]);
        exit;
    }
    
    $mysqli->set_charset("utf8");

    $pass = trim($_POST['password']);
    $pass_hash = hash('sha256', htmlspecialchars($pass));
    $codeCaso = random_int(100000, 999999);
    
    // Verificar código único
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM chats WHERE code = ?");
    $stmt->bind_param('i', $codeCaso);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    while ($count > 0) {
        $codeCaso = random_int(100000, 999999);
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM chats WHERE code = ?");
        $stmt->bind_param('i', $codeCaso);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
    }

    // Insertar nuevo caso
    $now = date('Y-m-d H:i:s');
    $stmt = $mysqli->prepare("INSERT INTO chats (code, password, state, created_at) VALUES (?, ?, 1, ?)");
    $stmt->bind_param('iss', $codeCaso, $pass_hash, $now);
    
    if ($stmt->execute()) {
        $insert_id = $mysqli->insert_id;
        setcookie("CookieCaso", $insert_id.'&'.$codeCaso.'&'.$pass_hash, time()+3600, "/");
        echo json_encode(["ok" => 1, "id" => (int)$insert_id, "code" => (int)$codeCaso]);
    } else {
        echo json_encode(["ok" => 0, "message" => "Error al crear el caso"]);
    }
    
    $stmt->close();
    $mysqli->close();
    
} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>