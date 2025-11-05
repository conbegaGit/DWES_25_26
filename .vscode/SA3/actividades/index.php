<?php
if (isset($_COOKIE["nombre"]) && isset($_COOKIE["color"])){
    //si ya hay cookie redirige a la bienvenida
    //es decir, la segunda vez que entras en index.php.La cookie ya existe y no muestra el formulario
    //directamente, se redirige a bienvenida.php
    header ("Location: bienvenida.php");
    echo "en index.php la cookie 'nombre' ya existe. Redirige a bienvenida.php";
    exit;
}
?>



<!DOCTYPE html>
    <html lang = "es">
        <head>
            <title>bienvenido</title>
            <meta charset = "UTF-8">
        </head>
        <body>
            <h1>Bienvenido a nuestra web!!!!</h1>
            <p>Introduce tu nombre para continuar: </p>

            <form method = "post" action ="bienvenida.php">
                <input type="text" name ="nombre">
                <input type="submit" value = "entrar">
               
            </form>
            <p> introduce el color que mas te agrada </p>
            <form>
               
               <input type="color" name="colore">
            </form>
        </body>
    </html>