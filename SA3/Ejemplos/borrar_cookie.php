<?php
//Eliminar cooke haciendo que caduque
//Para borrar una cookie, se pone su tiempo de expiración en el

setcookie("usuario", "", time() -3600);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <tittle>Cookie borrada</tittle>
</head>

<body>
    <h1>Has cerrado sesión correctamente</h1>
    <a href="index.php">Volver al inicio</a>
</body>
</html>