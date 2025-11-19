<?php
session_start(); 
if(!isset($_SESSION["usuario"])){
    header('location: index.php');
    exit;
}

$nombre = $_SESSION["usuario"];
$cookieUsuario = $_SESSION["usuario"] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>¡Hola <?php echo htmlspecialchars($nombre); ?></h1>
        <p>Encantad@ de verte de nuevo</p>
        <?php if($cookieUsuario): ?>
            <p>Te recordamos que la última vez iniciaste sesion como <strong><?= htmlspecialchars($nombre) ?></strong></p>
        <?php endif; ?>
        <p><a href="logout.php">Cerrar sesion</a></p>
    </body>

</html>