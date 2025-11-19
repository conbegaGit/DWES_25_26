<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: index.php');
        exit;
    }
    $usuario = $_SESSION['usuario'];
    $recordar = $_COOKIE['nombreUsuario'] ?? '';
?>
<!DOCTYPE html>
<html lang=""es>
    <header>
        <meta charset="UTF-8">
        <title>Bienvenida</title>
    </header>
    <body>
        <h1>Bienvenido, <?= htmlspecialchars($usuario) ?></h1>
        <?php if($recordar): ?>
            <p>Te recuerdo que la ultima vez iniciaste sesion en <strong><?= htmlspecialchars($recordar) ?></strong></p>
        <?php endif; ?>
        <p>Esta es tu sesion iniciada, puedes navegar sin volver a iniciar la sesion</p>
        <a href="logout.php">Cierra sesion</a>
    </body>
</html>