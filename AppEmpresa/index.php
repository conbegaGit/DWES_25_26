<?php
include "./includes/db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Empresa</title>
    <meta name="viewport" context="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/AppEmpresa/css/style.css">
</head>
<body class="login-body">
    <div class="login-box">
        <h1>Iniciar sesión</h1>
        <form method="post" action="login.php">
            <label for="usuario">Usuario:
                <input type="text" id="usuario" name="nombre" required autofocus>
            </label>

            <label for="clave">Contraseña:
                <input type="password" id="clave" name="clave">
            </label>

            <div class="actions">
                <button type="submit">Entrar</button>
            </div>

        </form>
    </div>
</body>
</html>