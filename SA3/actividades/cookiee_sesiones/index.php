
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
    <h1>Accede a tu portal personal</h1>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="clave" required><br><br>

        <label for="Recordar mi nombre">Recordar mi nombre:</label>
        <input type ="checkbox" name="recordar"><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html> 