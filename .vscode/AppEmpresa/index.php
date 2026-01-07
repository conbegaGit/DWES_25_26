<?php
include "../AppEmpresa/includes/db.php";
session_start();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login - Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../AppEmpresa/css/style.css">
</head>
<body class="login-body">
<div class="login-box">     
    <h2>Iniciar sesión</h2>
    <form method="post" action="login.php">
        <label>Usuario
            <input type="text" name="nombre" required autofocus>
        </label>
        <label>Clave
            <input type="password" name="clave" required>
        </label>
        <div class="actions">
            <button type="submit">Entrar</button>
        </div>
    </form>
</div>
</body>
</html>
