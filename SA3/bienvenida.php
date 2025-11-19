<?php
 
if (isset($_POST["usuario"]) && !empty($_POST["usuario"]) && isset($_POST["color"]) && !empty($_POST["color"])){
    $nombre= $_POST["usuario"];
    $color= $_POST["color"];
    setcookie("usuario", $nombre, time() + 3600);
    setcookie("color", $_POST["color"], time() + 3600);
    echo "En bienvenida.php. El usuario ha enviado el FORM y se crea la cookie";
}elseif (isset($_COOKIE["usuario"])){
    $nombre = $_COOKIE["usuario"];
    echo "En bienvenida.php El usuario NO ha enviado el Nombre y se lee el nombre de la cookie";
    $color = $_COOKIE["color"];
}else{
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>

    <body style= "background-color: <?php echo htmlspecialchars($color); ?>">
        <h1>¡Hola <?php echo htmlspecialchars($nombre); ?></h1>
        <p>Encantad@ de verte de nuevo</p>
        <p><a href="borrar_cookie.php">Cerrar sesion</a></p>
    </body>

</html>
