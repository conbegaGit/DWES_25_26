<?php
if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    $nombre = htmlspecialchars($_POST['nombre']);

    $color = '#ffffff';
    if (isset($_POST['color']) && !empty($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);
    } 


    setcookie("usuario", $nombre, time() + 3600, "/");
    setcookie("color", $color, time() + 3600, "/");

    // No mostrar mensajes debug aquí; dejamos que la página renderice con el fondo
} elseif (isset($_COOKIE['usuario'])) {
    $nombre = htmlspecialchars($_COOKIE['usuario']);
    $color = isset($_COOKIE['color']) ? htmlspecialchars($_COOKIE['color']) : '#ffffff';
} else {
    header("Location: index.php");
    exit;
}

if ($color == '#000000') {
    $textoColor = '#ffffff';
} else {
    $textoColor = '#000000';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenid@</title>
</head>

<body style="background-color: <?= $color ?>; color: <?=$textoColor?>;">
    <h1>Hola, <?php echo htmlspecialchars($nombre); ?>!</h1>
    <p>¡Bienvenid@ a nuestro sitio web!</p>
    <p><a href="borrar_cookie.php">Cerrar sesión</a></p>
</body>

</html>