<?php
    if (isset($_POST["nombre"]) && isset($_POST["color"])){
        $nombre = $_POST["nombre"];
        $color = $_POST["color"];
        $texto = ($color === '#000000') ? "#FFFFFF" : "#000000";
        echo "Este es el color del texto $texto";
        //Crear cookie válida durante 1 hora
        setcookie("usuario", $nombre, time() + 3600);
        setcookie("color", $color, time() + 3600);
        echo $color;
        echo "En bienvenida.php. El usuario ha enviado el FORM y se crea la cookie";
    } elseif(isset($_COOKIE["usuario"]) && isset($_COOKIE["color"])){
        //No se ha enviado el formulario, pero ya existe la cookie,
        //Así se "recuerda" el nombre sin tener que volver a escribirlo.
        //Esto ocurrirá cuando se acceda a indes.php por segunda vez, ya que el formulario no aparecerá
        $nombre = $_COOKIE["usuario"];
        $color = $_COOKIE["color"];
        $texto = ($color === '#000000') ? "#FFFFFF" : "#000000";
        echo "En bienvenida.php. El usuario NO ha enviado el Nombre y se lee el nombre de la cookie";
    } else{
        //Si no hay ni formulario ni cookie (es decir, primera visita sin datos),
        //Redicciona al usuario a la página de inicio (index.php).
        //La función header("Location: ...") envía una cabecera HTTP de redirección
        //El exit se usa para detener la ejecución del script después de la redirección
        //(buenas prácticas en PHP)

        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UFT-8">
        <title>Bienvenida</title>
    </head>

    <body style="background-color: <?= $color?>; color: <?= $texto?>">
        <h1>¡Hola, <?php echo htmlspecialchars($nombre); ?> </h1>
        <p>Encantad@ de verte de nuevo</p>
        <p><a href="borrar_cookie.php">Cerrar sesión</a></p>
    </body>

</html>