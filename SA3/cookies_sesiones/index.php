<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UFT-8">
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>Accede a tu portal personal</h1>

        <form method="post" action="login.php">
            <p>Usuario: </p>
            <input type="text" name="usuario" required>
            <p>Contraseña: </p>
            <input type="password" name="clave" required>
            <p>Recordar mi nombre: <input type="checkbox" name="recordar"></p>
            <input type="submit" value="Entrar">
        </form>

    </body>

</html>