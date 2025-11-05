<?php
if(isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $color = $_POST["color"];

    //si el color de fondo es negro ponemos el color del texto blanco
    $texto = ($color === "#000000") ? "#FFFFFF" : "#000000";

    // crear cookies válidad durante 1h
    setcookie("usuario", $nombre, time() + 3600);
    setcookie("color_favorito", $color, time() + 3600);

    echo "En bienvenida_color.php. El usuario ha enviado el FORM y se crean las cookies";

} elseif (isset($_COOKIE["usuario"]) && isset($_COOKIE["color_favorito"])) {
    // No se ha enviado el formulario, pero ya existe la cookie,
    // Asi se "recuerda" el nombre sin tener que volver a escribirlo
    // Esto ocurrirá cuando se acceda a index.php por segunda vez, ya que el formulario no aparecerá
    $nombre = $_COOKIE["usuario"];
    $color = $_COOKIE["color_favorito"];

    echo "En bienvenida_color.php. El usuario NO ha enviado el FORM y se leen los nombres de las cookies";
} else {
    // Si no hay ni formulario ni cookie (es decir, primera visita sin datos),
    // redirecciona al usuario a la página de inicio (index.php)
    // La funcion header("Location: ...") envia una cabecera HTTP de redirección
    // El exit se usa para detener la ejecución del script después de la redirección (buenas prácticas en PHP)
    header("Location: index_color.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>

    <body style="background-color: <?= $color ?> color: <?= $texto ?>;">
        <h2>Hola, <?= htmlspecialchars($nombre) ?></h2>
        <p>Tu color favorito es: <strong><?= htmlspecialchars($color) ?></strong></p>

        <p><a href="borrar_cookie_color.php">Borrar cookies</a></p>
    </body>

</html>