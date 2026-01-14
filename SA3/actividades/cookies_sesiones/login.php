<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['contraseña'] ?? '';

if ($usuario === 'admin' && $clave === '1234') {
    // Crear sesión
    $_SESSION ['usuario'] = $usuario;

    // Si marco "Recordarme", crear cookie válida 7 días
    if (isset($_POST['recordar'])) {
        setcookie('nombre_usuario', $usuario, time() + (7 * 24 * 60 * 60)); 
    }
    header("Location: bienvenida.php");
    exit();

} else {
    echo "<p> Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}