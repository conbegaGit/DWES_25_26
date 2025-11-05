<?php 
setcookie("usuario", "", time() - 3600, "/");
setcookie("color", "", time() - 3600, "/");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cookie Borrada</title>
</head>

<body>
    <h1>Sesión Cerrada</h1>
    <p><a href="index.php">Volver a la página de inicio</a></p>
</body>

</html>