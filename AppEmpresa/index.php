<?php

?>

<!doctype html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <title> Login - Empresa </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/AppEmpresa/css/style.css">
    <title>App Empresa</title>
</head>
<body class="login-body">
    <div class="login-box">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="post">
            <label> Usuario 
                <input type="text" name="nombre" required autofocus>
            </label>
            <label> clave 
                <input type="password" name="clave" required>
            </label>
            <div class="actions">
                <button type="submit"> Entrar </button>

            </div>   
        </form>
    </div>
</body>
</html>
         