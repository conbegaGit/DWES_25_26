<?php
if (isset($_COOKIE["usuario"]) && !empty($_COOKIE["usuario"])) {
    header("Location: bienvenida.php");
    exit();
}

$color_fondo = isset($_COOKIE["color"]) ? $_COOKIE["color"] : "#ffffff";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nombre"])) {
        setcookie("usuario", $_POST["nombre"], time() + 3600);

        if (!empty($_POST["color"])) {
            setcookie("color", $_POST["color"], time() + 3600);
        }

        header("Location: bienvenida.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenido</title>
</head>

<body style="background-color: <?php echo $color_fondo; ?>;">
<h1>Bienvenido a nuestra web</h1>
<p>Introduce tu nombre y color de fondo:</p>

<form method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Color de fondo:</label>
    <input type="color" name="color" value="<?php echo $color_fondo; ?>"><br><br>

    <input type="submit" value="Entrar">
</form>

</body>
</html>
