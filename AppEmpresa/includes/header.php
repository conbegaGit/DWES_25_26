<?php 
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empresa - Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/AppEmpresa/assets/styles.css">
</head>
<body>
<header class="site-header">
    <div class="wrap">
        <h1 class="logo"><a href="/AppEmpresa/dashboard.php">Empresa - Panel de Administración</a></h1>
        <nav class="main-nav">
                <a href="/AppEmpresa/dashboard.php">Inicio</a></li>
                <a href="/AppEmpresa/departamentos/index.php">Departamentos</a></li>
                <a href="/AppEmpresa/empleados/index.php">Empleados</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['Rol'] == '1'): ?>
                  <a href="/AppEmpresa/usuarios/index.php">Usuarios</a></li>
                <?php endif; ?>
        <?php if (isset($_SESSION['user'])): ?>
            <a class="logout" href="/AppEmpresa/logout.php">Cerrar sesión</a>
        <?php endif; ?>
        </nav>
    </div>
</header>
<main class="wrap">
    