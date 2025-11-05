<?php
    if (isset($_COOKIE['usuario'])) {
        header("Location: bienvenida.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>

<body>
    <h1>Bienvenido a nuestra web!</h1>
    <p>Introduce tu nombre para continuar:</p>
    
    <form method="post" action="bienvenida.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="color">Color de fondo:</label>
        <input type="color" id="color" name="color" value="<?php echo isset($_COOKIE['color']) ? htmlspecialchars($_COOKIE['color']) : '#ffffff'; ?>">
        <input type="submit" value="Enviar">
    </form>



</body>
</html>