<?php
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
    $nombre = htmlspecialchars($_POST['nombre']);

    setcookie("usuario", $nombre, time() + (3600), "/");
    echo "En bienvenida.php. El usuario ha enviado el nombre: " . $nombre;
} elseif (isset($_COOKIE['usuario'])) {
    $nombre = htmlspecialchars($_COOKIE['usuario']);
    echo "En bienvenida.php. El usuario ha enviado el FORM y se crea la cookie: " . $nombre;
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenid@</title>
    <style>body{background-color: #ffffff;}</style>
</head>

<body>
    <h1>Hola, <?php echo htmlspecialchars($nombre); ?>!</h1>
    <p>¡Bienvenid@ a nuestro sitio web!</p>
    <p><a href="borrar_cookie.php">Cerrar sesión</a></p>
    <hr>
    <label for="colorPicker">Color de fondo (cambiar):</label>
    <input type="color" id="colorPicker" name="color" value="#ffffff">

    <script>
        (function(){
            var picker = document.getElementById('colorPicker');
            var saved = localStorage.getItem('bgColor');
            if (saved) {
                document.body.style.backgroundColor = saved;
                if (picker) picker.value = saved;
            } else if (picker) {
                document.body.style.backgroundColor = picker.value;
            }
            if (picker) {
                picker.addEventListener('input', function(e){
                    var v = e.target.value;
                    document.body.style.backgroundColor = v;
                    localStorage.setItem('bgColor', v);
                });
            }
        })();
    </script>
</body>

</html>



