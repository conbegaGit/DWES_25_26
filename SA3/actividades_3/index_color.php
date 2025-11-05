<?php
    if(isset($_COOKIE["usuario"])) {
        header("Location: bienvenida_color.php");
        echo"Location: bienvenida_color.php";
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>Bienvenido a nuestra web en COLOR</h1>
        <p>Introduce tu nombre para continuar</p>

        <form method="post" action="bienvenida_color.php">
            <label>Tu nombre:</label>
            <input type="text" name="nombre" require><br><br>
            <!-- Si añadimos el atributo required, nunca pasará por el else -->

            <label>Tu color favorito:</label>
            <input type="color" name="color"><br><br>

            <button type="submit">Entrar</button>
        </form>
    </body>
</html>
