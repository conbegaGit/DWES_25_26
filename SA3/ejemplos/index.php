<?php
    if (isset($_COOKIE['usuario'])) {
        header("Location: bienvenida.php");
        echo "En index.php. La cookie 'usuario' ya existe. Redirigie a bienvenida.php...";
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
        <input type="text" name="nombre">
        <label for="colorPicker">Color de fondo:</label>
        <input type="color" id="colorPicker" name="color" value="#ffffff">
        <input type="submit" value="Enviar">
    </form>



</body>
<script>
    (function(){
        var saved = localStorage.getItem('bgColor');
        var picker = document.getElementById('colorPicker');
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
</html>
