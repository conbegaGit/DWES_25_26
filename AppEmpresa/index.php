<?php
include "..\AppEmpresa\includes\db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -Empresa</title>
    <link rel="stylesheet" href="/AppEmpresa/css/style.css">
</head>
<body class="login-body">
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <label for="username">Usuario
            <input type="text" id="username" name="nombre" required autofocus>
            </label>

            <label for="password">Clave
            <input type="password" id="password" name="clave" required>
            </label>

            <div class="action">
            <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>