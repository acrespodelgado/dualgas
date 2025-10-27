<?php 

    session_start();

    if(isset($_POST['cerrar']) && !empty($_POST['cerrar'])) {
        if(isset($_COOKIE['CookieCaso']) && !empty($_COOKIE['CookieCaso'])) {
            //unset($_COOKIE["CookieCaso"]);
            setcookie("CookieCaso", 0, time()+10, "/");  /* expira en 10 segundos */
            echo json_encode(["ok" => "1"]);
        } else {
            echo json_encode(["ok" => "0", "message" => "Se ha producido un error"]);
        }
    }

?>