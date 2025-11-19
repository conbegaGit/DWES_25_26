<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['usuario'];
$nombreRecordad = $_COOKIE['usuario'] ?? '';
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>
    <body>
        <h1>Hola, <?php echo htmlspecialchars($usuario); ?></h1>
        <p> Encantado de verte de nuevo </p>
       <?php if ($nombreRecordad): ?>
        <p>Te recordamos que has iniciado sesión como: <?php echo htmlspecialchars($nombreRecordad); ?></p>
        <?php endif; ?>
        <p> <a href="logout.php">Cerrar sesión</a></p>
    </body>
</html>