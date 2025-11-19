<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$contrasenya = $_POST['contrasenya'] ?? '';

if($usuario === 'miguel' && $contrasenya === '1234'){
    $_SESSION['usuario'] = $usuario;

    if(isset($_POST['recordar_nombre'])){
        setcookie("usuario", $usuario, time() + 7*24*3600);
    }

        header('Location: bienvenida.php');
        exit;

} 
else {
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}

