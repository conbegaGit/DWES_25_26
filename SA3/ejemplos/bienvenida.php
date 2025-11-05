<?php
if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["color"]) && !empty($_POST["color"])) {
    $nombre = $_POST["usuario"];
    $color = $_POST["color"];
    setcookie("usuario" , $nombre, time() + 3600);
    setcookie("color" , $_POST["color"], time() + 3600);
    echo "En bienvenida.php. El usuario ha enviado el POST y se crea la cookie";
}else if (isset($_COOKIE["usuario"])){
    $nombre = $_COOKIE["usuario"];
    echo "En bienvenida.php. EL usuario NO ha enviado el Nombre y la cookie existe";
    $color = $_COOKIE["color"];
}else{
    header("location: index.php");
    exit();
}

// Función para determinar si el color es claro u oscuro
function esColorClaro($hexColor) {
    // Eliminar el # si existe
    $hex = str_replace('#', '', $hexColor);

    // Convertir a RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Calcular luminosidad (fórmula estándar)
    $luminosidad = (0.299 * $r + 0.587 * $g + 0.114 * $b);

    // Si la luminosidad es mayor a 128, es claro
    return $luminosidad > 128;
}

// Determinar el color del texto
if (esColorClaro($color)) {
    $colorTexto = "#000000"; // Negro para fondos claros
} else {
    $colorTexto = "#FFFFFF"; // Blanco para fondos oscuros
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>
    <body style="background-color: <?php echo htmlspecialchars($color); ?>; color: <?php echo $colorTexto; ?>">
        <h1>Hola, <?php echo htmlspecialchars($nombre); ?></h1>
        <p> Encantado de verte de nuevo </p>
        <p> <a href = "borrarCookie.php">Cerrar sesión</a></p>
    </body>
</html> 