<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Empresa - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/AppEmpresa/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="wrap">
        <h1 class="logo"><a href="/AppEmpresa/dashboard.php">Empresa</a></h1>
        <nav class="main-nav">
            <a href="/AppEmpresa/dashboard.php">Inicio</a>
            <a href="/AppEmpresa/departamentos/listar.php">Departamentos</a>
            <a href="/AppEmpresa/empleados/listar.php">Empleados</a>

            <?php if (isset($_SESSION["user"])): ?>
                <a href="/AppEmpresa/usuarios/listar.php">Usuarios</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="/AppEmpresa/logout.php"> Salir (<?= htmlspecialchars($_SESSION['user']['Nombre']) ?>)
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="wrap">
    <?php if ($flash = flash_get()): ?>
        <div class="flash-message">
            <?= $flash ?>
        </div>
    <?php endif; ?>