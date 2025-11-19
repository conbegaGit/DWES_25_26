<?php

session_start();

$usuario = $_POST["usuario"] ?? '';
$clave = $_POST ["clave"] ?? '';


if ($usuario === "Ashley" && $clave === "1234") {
    $_SESSION['usuario'] = $usuario;
    if (isset($_POST['recordar'])) {
        setcookie('usuariorec', $usuario, time() + (3600));

    }
        header("Location: bienvenida.php");
        exit;

} else {
    echo "Usuario o clave incorrectos." ;
    echo "<a href='index.php'>Volver</a>";
}

