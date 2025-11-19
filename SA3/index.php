<?php
if (isset($_COOKIE["usuario"]) && isset($_COOKIE["color"])){
    header("location: bienvenida.php");
    echo "En index.php La cookie de 'usuario' ya existe. Redirige a bienvenida.php";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>¡Bienvenido a nuestra web!</h1>
        <p>Introduce tu nombre para continuar:</p>

        <form method="post" action= "bienvenida.php">
            <input type="text" name="usuario"><br>
            <input type="color" name= "color" id="color"><br><br>
            <input type="submit" value="Entrar">
            
        </from>
    </body>

</html>