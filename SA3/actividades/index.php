<?php
if (isset($_COOKIE["usuario"]) && isset($_COOKIE["color"])) {
    header("Location: bienvenida.php");
    exit; 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset = "UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <p>Introduce tu nombre y elige tu color favorito:</p>
    
    <form action="bienvenida.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="color">Color:</label>
        <input type ="color" name="color" id="color"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html> 