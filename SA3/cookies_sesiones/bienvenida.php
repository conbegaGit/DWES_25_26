<?php
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location: index.php");
        exit;
    }

    $usuario = $_SESSION["usuario"];
    $recordarNombre = $_COOKIE["cookie_usuario"] ?? '';
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UFT-8">
        <title>Página de bienvenida</title>
    </head>

    <body>
        <h2>!Bienvenido, <?=  htmlspecialchars($usuario) ?>¡</h2>

        <?php if ($recordarNombre): ?>
            <p>Te recordamos la ultima vez que iniciaste sesión como <strong><?= htmlspecialchars($usuario) ?></strong></p>
        <?php endif; ?>

        <p>Esta es tu sesión activa, Puedes navegar sin volver a iniciar sesión.</p>

        <a href="logout.php">Cerrar sesión</a>
    </body>

</html>