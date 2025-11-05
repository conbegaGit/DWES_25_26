<?php

use Dom\HTMLElement;
echo $_POST["colore"];
if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["colore"])&& !empty($_POST["colore"])){
    $nombre = $_POST["nombre"];
    $color = $_POST["colore"];
    //crear cookie valida durante 1 hora
    setcookie("nombre", $nombre, time()+ 3600);
    setcookie("colore", $color, time()+ 3600);
    echo "en bienvenido.php El usuario ha enviado el FORM y se crea la cookie";
}elseif (isset($_COOKIE["nombre"]) && isset($_COOKIE["colore"])){
    $nombre = $_COOKIE["nombre"];
    $color = $_COOKIE["colore"];
    echo "en bienvenida.php El usuario NO ha enviado el nombre y se lee el nombre de la cookie";
}
else{
    //Si nohay ni formulario ni cookie (es decir, primera visita sin datos),
    //redirecciona al usuario a la página de inicio(index.php).
    //la función header("location:...") envia una cabecera HTTP de redircción.
    // el exit se udsa para detener la ejecución
    //(buenas practicas php).
    header ("location: index.php");
    exit;
}
?>




<!DOCTYPE html>
    <html lang="es">
        <head>
            <title>bienvenida</title>
            <meta charset = "UTF-8">
        </head>
        <body style="background-color: <?php   $color?>;">
            <h1>holaaa, <?php echo htmlspecialchars($nombre)?></h1>
            <p>Encantando de verte de nuevo😎</p>
            <p><a href="borrar_cookie.php">Cerrar sesión</a></p>
        </body>
    </html>