<?php
// BORRAR COOKIE
setcookie("usuario", "", time() - 3600, "/");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>cookie borrado</title>
    </head>

    <body>
        <h1>hola</h1>
        <p>has cerrado la sesión correctamente</p>
        <a href="index.php">volver al inicio</a>
    </body>
</html>
