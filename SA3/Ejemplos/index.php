<?php
if (isset($_COOKIE["usuario"]) && isset($_COOKIE ["color"])){
    //Si ya hay cookie, redirige a la bienvenida
    //Es decir, la segunda vez que entras en index.php. La cookie ya existe y no muestra el formulario
    //directamente, se redirige a bienvenida.php
    header("Location: bienvenida.php");
    echo "En index.php. La cookie 'usuario' ya existe. Redirige a bienvenida.php";
    exit;
}
?>

<!DOCTYPE html>

<html lang="es">
    <head>
    <title>bienvenido</title>
    <meta charset = "UTF-8">
    </head>

    <body>
        <h1>Bienvenido a nuestra web!!</h1>
        <p>Introduce tu nombre para continuar: </p>

        <form method="post" action="bienvenida.php">
            <input type="text" name="nombre">
            <input type = "submit" value="Entrar">
        </form>
        <p>Introduce tu color favorito</p>
        <form>
            <input type="color" name="color_fav" >
            
        </form>
    </body>
</html>