<?php
if (!isset($_COOKIE["usuario"])) {
    header("Location: index.php");
    exit();
}

$nombre = $_COOKIE["usuario"];
$color_fondo = isset($_COOKIE["color"]) ? $_COOKIE["color"] : "#ffffff";
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenida</title>
</head>

<body style="background-color: <?php echo $color_fondo; ?>;">

<h1>Hola, <?php echo htmlspecialchars($nombre); ?></h1>
<p>Encantad@ de verte de nuevo</p>

<p><a href="borrar_cookie.php">Cerrar sesión</a></p>

</body>
</html>