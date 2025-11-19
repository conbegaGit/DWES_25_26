<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

if ($usuario === 'admin' && $clave === '1234'){
    $_SESSION['usuario'] = $usuario;

if (isset($_POST['recordar'])){
    setcookie('nombre_usuario', $usuario, time() + (7 * 24 * 60 * 60));
}
header('Location: bienvenida.php');
exit;

} else{
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}
