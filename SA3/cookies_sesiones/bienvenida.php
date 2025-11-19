<?php
session_start();
if (!isset($_SESSION['usuario'])) {
header("Location: index.php");
    exit;
}

    $usuario = $_SESSION['usuario'];
    $recordar = $_COOKIE['usuariorec'] ?? '';
?>
   
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <h1>¡Hola, <?php echo htmlspecialchars ($usuario); ?>! </h1>
    <?php if ($recordar): ?>
        <p>¡Gracias por recordarme tu usuario!</p> <?php echo htmlspecialchars ($usuario); ?>
    <?php endif; ?>
    <p>Encantad@ de verte de nuevo </p>
    <p> <a href="logout.php"> Cerrar Sesión </a></p>    
</body>
</html>