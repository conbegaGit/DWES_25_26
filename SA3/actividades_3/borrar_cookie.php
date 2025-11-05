<?php
// Eliminar cookies haciendo que caduque
// Para borrar una cookie, se pone su tiempo de expiración en el pasado

setcookie("usuario", "", time() - 3600);
setcookie("color_favorito", "", time() - 3600);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UF-8">
        <title>Cookies borradas</title>
    </head>

    <body>
        <h1>Has cerrado sesion correctamente</h1>
        <a href="index_color.php">Volver al inicio</a>
    </body>
</html>