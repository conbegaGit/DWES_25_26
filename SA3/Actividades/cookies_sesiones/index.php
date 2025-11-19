<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido a nuestra web!</h1>
    <p>Introduce tu nombre para continuar:</p>
    
    <form method="post" action="login.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contrasena" required>
        <br><br>
        <label for="recordar">Recordar mi nombre</label>
        <input type="checkbox" name="recordar">
        <br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>