<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesion</title>
    </head>
    <body>
        <h1>Accede a tu portal personal</h1>
        <form method="post" action="login.php">
            <label>Usuario:</label>
            <input type="text" name="nombre" required>
            <br>
            <br>
            <label>Contraseña:</label>
            <input type="password" name="contraseña" required>
            <br>
            <br>
            <label>Recordar mi nombre</label>
            <input type="checkbox" name="recuerda">
            <br>
            <br>
            <input type="submit" value="Entrar">
        </form>
    </body>
</html>