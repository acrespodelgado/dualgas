<?php 

    session_start();

    require  './../wp-config.php';

    if(isset($_POST['nick']) && !empty($_POST['nick']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {
        
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysqli->set_charset("utf8");

        $nick = $_POST['nick'];
        $password = $_POST['password'];
        $id = 0;

        $nick = trim(htmlspecialchars($mysqli->real_escape_string($nick)));
        $password = hash('sha256', trim(htmlspecialchars($mysqli->real_escape_string($password))));

        $stmt = $mysqli->prepare("SELECT id FROM agents WHERE password = ? AND nick = ?");
        $stmt->bind_param("ss", $password, $nick);
        $stmt->execute();
        $res = $stmt->get_result();

        while ($fila = $res->fetch_object()) {
            $id = $fila->id;
        }

        if($id > 1) {
            setcookie("CookieAgente", $id.'&'.$nick.'&'.$password, time()+3600*12, "/");  /* expira en 12 horas */
            echo json_encode(["ok" => "1"]);
        } else {
            echo json_encode(["ok" => "0", "message" => "Usuario o contraseña incorrectos"]);
        }
    } else {
        echo json_encode(["ok" => "0", "message" => "Rellene los campos del formulario"]);
    }

?>