<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Bienvenido</title>
    </head>

    <body>
        <h1>Inicia sesión</h1>

        <form method="post" action="login.php">
            <label>Usuario:</label>
            <input type="text" name="nombre" require><br><br>

            <label>Contraseña:</label>
            <input type="password" name="clave" require><br><br>

            <label>Recordar usuario:</label>
            <input type="checkbox" name="recordar" require><br><br>
            <button type="submit">Entrar</button>
        </form>
    </body>
</html>