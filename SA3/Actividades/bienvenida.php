<?php
    if(isset($_POST["nombre"]) && !empty($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $color = $_POST["color"];
        setcookie("usuario", $nombre, time() + 3600);
        setcookie("color", $color, time() + 3600); 
        echo "En bienvenida.php. El usuario ha enviado el FORM y se crea la cookie <br>";
    }
    elseif(isset($_COOKIE["usuario"])){
        $nombre = $_COOKIE["usuario"];
        $color = $_COOKIE["color"];
        echo "En bienvenida.php. El usuario NO ha enviado el Nombre y se lee el nombre de la cookie";
    }
    else{
        header("Location: index.php");
        exit;
    }
    $texto = ($color === "#000000") ? "#ffffff" : "#000000";
    echo "El color del usuario: ", $color;
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>
    <body style="background-color: <?= $color?>; color: <?= $texto ?>;">
        <h1>¡Hola, <?php echo htmlspecialchars($nombre);?>!</h1>
        <p>Encantad@ de verte de nuevo</p>
        <p><a href="borrar_cookie.php">Cerrar sesión</p>
    </body>
</html>