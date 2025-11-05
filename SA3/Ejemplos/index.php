<?php
    if(isset($_COOKIE["usuario"]) && isset($_COOKIE["color"])){
        //Si ya hay cookie, redirige a la bienvenida
        //Es decir, la segunda vez que entras en index.php
        //Directamente, se dirige a bienvenida.php
        header("Location: bienvenido.php");
        echo "En index.php. La cookie 'usuario' y 'color' ya existe.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UFT-8">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>¡Bienvenido a nuestra web!</h1>
        <p>Introduce tu nombre para continuar:</p>

        <form method="post" action="bienvenido.php">
            <input type="text" name="nombre">
            <!-- Si añadimos el atributo required, nunca  -->
            <input type="submit" value="Entrar">
            <p>Introduce tu color favorito:</p>
            <input type="color" name="color" id="colorPicker">
        </form>

    </body>

</html>
