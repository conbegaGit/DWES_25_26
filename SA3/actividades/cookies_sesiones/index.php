<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Inicio de sesión</title>
</head>
<body>
    <h1>Accede a tu portal personal</h1>
   
    <form action="login.php" method="POST">

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" required><br><br>

        <label for="contrasena">Contraseña</label>
        <input type ="password" name="contraseña" id="contraseña" required><br><br>

        <label for="recordar">Recordar mi nombre</label>
        <input type ="checkbox" name="recordar" id="recordar"><br><br>

        <button type="submit"> Entrar </button>
    </form>
</body>
</html> 