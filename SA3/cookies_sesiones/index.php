<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido a nuestra web!</h1>
    <p>Introduce tu usuario para continuar:</p>
   
    <form method="post" action="login.php">
        <label>Usuario:</label> <br>
        <input type="text"  name="usuario" required> <br>
        <label>Clave:</label> <br>
        <input type="password"  name="clave" required> <br>
        <label> Recordar mi usuario la proxima vez</label> <br>
        <input type="checkbox" name="recordar"> <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>