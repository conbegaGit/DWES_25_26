<?php
session_start();

if (isset($_SESSION["usuario"])) {
    header("location: index.php");
    exit();
}
 $usuario = $_SESSION['nombre'];
 $recordar = $_COOKIE['nombreUsuario'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido, <?= htmlspecialchars($usuario) ?></title>
    </head>
    <body>
        <h1>¡Hola <?php echo htmlspecialchars($usuario); ?>!</h1>
        <?php if($recordar): ?>
            <p>Te recuerdo que la ultima vez que iniciaste sesion en <strong><?= htmlspecialchars($recordar) ?></strong></p>
            <?php endif; ?>
        <p>Encantad@ de verte de nuevo.</p>
        <a href="logout.php">Cerrar sesión</a>
    </body>

</html>