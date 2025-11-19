<?php
session_start();

$user = $_POST['usuario'] ?? '';
$pass = $_POST['password'] ?? '';
$recordar = isset($_POST['recordar']);

if ($recordar) {
    setcookie("usuario", $user, time() +3600 );
    setcookie("password", $pass, time() + 3600);
}

if ($user === "admin" && $pass === "1234") {
    $_SESSION['login'] = true;
    header("Location: bienvenida.php");
    exit;
} else {
    echo "Usuario o contraseña incorrectos. <a href='index.php'>Volver</a>";
}
