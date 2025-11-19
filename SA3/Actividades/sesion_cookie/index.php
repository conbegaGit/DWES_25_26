<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Accede a tu portal personal</h1>
    <form method="post" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <br><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave">
        <br><br>

        <label for="recordar">Recordar usuario</label>
        <input type="checkbox" id="recordar" name="recordar" value="recordar">
        <br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>