<?php
session_start();


if (isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
}
$usuario= $_SESSION['user'];
$nombreRecordado= $_COOKIE['usuario'];
?>


<!DOCTYPE html>
    <html lang = "es">
        <head>
            <meta charset = "UTF-8">
            <title>BIENVENIDA</title>
            
        </head>
        <body>
            <h2>Bienvenido <? htmlspecialchars($usuario)?>!</h2>
            <?php if ($nombreRecordado):?>
            <p>te recordamos la ultima vez que entrates aqui<strong><?= htmlspecialchars($nombreRecordado) ?></strong></p>
            <?php endif;?>
            <p>tu sesión esta activa, puedes navegar sin volver a iniciar sesión</p>
            <a href="logout.php">cerrar sesión</a>



        </body>
    </html>