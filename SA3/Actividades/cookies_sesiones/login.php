<?php
session_start();

$usuario = $_POST['nombre'] ?? '';
$password = $_POST['contrasena'] ?? '';

if ($usuario === 'mig' && $password === '1234') {
    
    $_SESSION['nombre'] = $usuario;

    if (isset($_POST['recordar'])) {
        setcookie('userrecordado', $usuario, time() + (24*60*60)); 
    }
    header("Location: bienvenida.php");
    exit();
} else {
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="index.php">Volver</a>';
}