<?php
if (isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['color']) && !empty($_POST['color'])) {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    setcookie("nombre", $nombre, time() + 3600);
    setcookie("color", $color, time() + 3600);

} elseif (isset($_COOKIE["nombre"]) && isset($_COOKIE["color"])) {
    $nombre = $_COOKIE["nombre"];
    $color = $_COOKIE["color"];

} else {
    header("Location: index.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>

<body style="background-color: <?php echo htmlspecialchars($color); ?>;">
    <h1>Hola, <?php echo htmlspecialchars($nombre); ?></h1>
    <p>Encantad@ de verte de nuevo</p>
    <p><a href="borrar_cookie.php">Cerrar sesión</a></p>
</body>

</html>