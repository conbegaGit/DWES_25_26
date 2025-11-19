<?php
session_start();

if (isset($_SESSION["usuario"])) {
    header("location: index.php");
    exit();
}
 $usuario = $_SESSION['nombre'];
 $nombreRecordado = $_COOKIE['nombre_usuario'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido, <?= htmlspecialchars($usuario) ?></title>
    </head>
    <body>
        <h1>¡Hola <?php echo htmlspecialchars($usuario); ?>!</h1>
        <p>Encantad@ de verte de nuevo.</p>
        <a href="logout.php">Cerrar sesión</a>
    </body>

</html>