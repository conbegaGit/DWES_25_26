
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>¡Bienvenido a nuestra web!</h1>
    <p>Introduce tu nombre para continuar:</p>

    <form method="post" action="login.php">

        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" name="usuario"><br><br>

        <label for="contrasenya">Contraseña:</label><br>
        <input type="password" name="contrasenya"><br><br>

        <label for="recordar">Recordar nombre</label>
        <input type="checkbox" name="recordar_nombre"><br><br>

        <input type="submit" value="Entrar">
        
    </form>
</body>
</html>
