<?php
setcookie("usuario", "", time() -3600);
?>
<!DOCTYPE html>
    <html lang ="es">
        <head>
            <title>cookie borrada</title>
            <meta charset = "UTF-8">
        </head>
        <body>
            <h1>ha cerrado sesion correctamente</h1>
            <a href="index.php">volver al inicio</a>
        </body>
    </html>