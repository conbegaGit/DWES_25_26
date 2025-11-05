<?php
    if (isset($_COOKIE["usuario"])){
        header("Location: bienvenida.php");
        echo "En index.php. La cookie 'usuario' ya existe.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>¡Bienvenido a nuestra web!</h1>
        <p>Introduce Tu nombre para continuar:</p>

        <form method="post" action="bienvenida.php">
            <input type="text" name="nombre" required>
            <input type="submit" value="Entrar">

            <label>Tu color favorito:</label>
            <input type="color" name="color" required></br>
            <button type="submit">Entrar</button>
        </from>
    </body>
</html>