<?php
session_start();
require_once 'includes/functions.php';

// Si el usuario ya está logueado, redirigir al dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
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
        <?php if ($msg = flash_get()): ?>
            <div class="flash" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <?= e($msg) ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="usuario">Usuario:
                <input type="text" id="usuario" name="usuario" required autofocus>
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
