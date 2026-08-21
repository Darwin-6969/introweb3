<?php
    session_start();

    $nombre = $_POST['email'];
    $clave = $_POST['password'];

    if ($nombre == "jose@gmail.com" && $clave == "1234"){
        $_SESSION['usuario']= "JUAN PEREZ!!!";
        header("Location: dashboard.php");
    }else {
        $error_message = "Usuario o contraseña incorrectos.";
        $_SESSION['mensaje']= $error_message;
        header ("Location: index.php");
    }

?>