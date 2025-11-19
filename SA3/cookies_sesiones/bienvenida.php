<?php

session_start();

if(!isset($_SESSION["usuario"])){
    header('Location: index.php');
        exit;
}

$nombre=$_SESSION["usuario"];
$recordarNombre=$_COOKIE["usuario"] ?? '';

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
        <?php if($recordarNombre): ?>
            <p>Te recordamos que has iniciado tu sesión como <strong><?= htmlspecialchars($nombre) ?></strong></p>
        <?php endif; ?>
        <p>Estás es tu sesión. Puedes navegar sin volver a inciar sesión.</p>
        <p><a href="logout.php">Cerrar sesion</a></p>
    </body>

</html>