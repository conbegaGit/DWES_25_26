<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
</head>

<body>
    <h1>Accede a tu portal personal.</h1>

    <form action="login.php" method="POST">

        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br><br>

        <label for="recordar">Recordar inicio de sesión: </label>
        <input type="checkbox" id="recordar" name="recordar"><br><br>
    
        <button type="submit">Entrar</button>

    </form>

</body>
</html>