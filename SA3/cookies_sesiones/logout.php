<?php
session_start();
session_unset();
session_destroy();


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Cerrar sesion</title>
    </head>

    <body>
        <h1>Has cerrado sesión correctamente</h1>
        <a href="index.php">Volver al inicio</a>
    </body>
</html>