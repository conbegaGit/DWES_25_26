<?php
session_start();

$usuario = $_POST["usuario"] ?? '';
$clave = $_POST["clave"] ?? '';

if($usuario === 'CKN' && $clave === '221'){
    $_SESSION['usuario'] = $usuario;
    if (isset($_POST['recordar'])){
        setcookie('usuario' , $usuario, time() +(7 * 24 * 60 * 60));
    }
    header('Location: bienvenida.php');
    exit;
}
else{
    echo "<p> Usuario o Contraseña incorrectos</p>";
    echo '<a href ="index.php"> Volver </a>';
}