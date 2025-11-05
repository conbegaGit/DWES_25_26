<?php
    if(isset($_COOKIE["usuario"])) {
        header("Location: bienvenida.php");
        echo"Location: bienvenida.php";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>Bienvenido a nuestra web</h1>
        <p>Introduce tu nombre para continuar</p>

        <form method="post">
            <label>Tu nombre:</label>
            <input type="text" name="nombre" require><br><br>
            <!-- Si añadimos el atributo required, nunca pasará por el else -->

            <button type="submit">Entrar</button>
        </form>
    </body>
</html>
