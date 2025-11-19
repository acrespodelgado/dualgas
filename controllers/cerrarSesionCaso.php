<?php

if (ob_get_level()) {
    ob_end_clean();
}
ob_start();

session_start();

ob_clean();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

try {
    if (isset($_POST['cerrar']) && !empty($_POST['cerrar'])) {
        if (isset($_COOKIE['CookieCaso']) && !empty($_COOKIE['CookieCaso'])) {
            setcookie("CookieCaso", "", time() - 3600, "/");
            echo json_encode(["ok" => 1]);
        } else {
            echo json_encode(["ok" => 0, "message" => "No hay sesión activa"]);
        }
    } else {
        echo json_encode(["ok" => 0, "message" => "Parámetro requerido"]);
    }

} catch (Exception $e) {
    echo json_encode(["ok" => 0, "message" => "Error interno"]);
}

ob_end_flush();
?>