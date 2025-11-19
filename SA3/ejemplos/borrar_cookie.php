<?php
setcookie("nombre", "", time() - 3600);
setcookie("color", "", time() - 3600);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookies borradas</title>
</head>
<body>
    <h1>Has cerrado sesión correctamente</h1>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
