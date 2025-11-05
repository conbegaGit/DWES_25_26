<?php
//eliminar cookie haciendo que caduque
//para borrar una cookie, se vuelve a crear con el mismo nombre y con una fecha de caducidad en el pasado
setcookie("usuario", "", time() - 3600); //establece la cookie con tiempo en el pasado para que caduque
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie Borrada</title>
</head>
<body>
    <h1>Has cerrado sesión correctamente</h1>
    <a href="index.php">Volver al inicio</a>
</body>
</html>