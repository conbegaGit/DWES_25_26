<?php
 if (isset($_POST["nombre"]) && !empty ($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    // crear cookie valida durante 1 hora
    setcookie("usuario", $nombre, time() + 3600); 
    echo "En bienvenida.php. El usuario ha enviado el formulario";
} elseif (isset($_COOKIE["usuario"])) {
    //no se ha enviado el formulario pero ya existe la cookie
    //asi se "recuerda" el nombre sin tener que volver a escribirlo
    //esto ocurrira cuando se acceda a index.php por segunda vez, ya que el formulario no aparecerá
    $nombre = $_COOKIE["usuario"];
    echo "En bienvenida.php. El usuario NO ha enviado el nombre y se lee el nombre de la cookie.";
 } else {
    // Si no hay ni formulario ni cookie ( es decir, primera visita sin datos)
    //redirecciona al usuario a la pagina de inicio (index.php)
    //la funcion header ("location: ...") envia una cabecera http de redireccion
    //el exit se usa para detener la ejecucion del script despues de la redireccion
    //(buenas practicas en PHP)

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
<body style="background-color: <?=$colores?>;">
    <h1>¡Hola, <?php echo htmlspecialchars ($nombre); ?>! </h1>
    <p>Encantad@ de verte de nuevo </p>
    <p> <a href="borrar_cookie.php"> Cerrar Sesión </a></p>
</body>
</html>