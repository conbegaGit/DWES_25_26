<?php
if (!isset($_SESSION)) session_start();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Empresa - Panel</title>
        <link rel ="stylesheet" href="/AppEmpresa/css/style.css">
    </head>
    <body>
        <header class="site-header">
            <div class="wrap">
                <h1 class="logo"><a href="/AppEmpresa/dashboard.php">Empresa</a></h1>
                <nav class="main-nav">
                    <a href="/AppEmpresa/dashboard.php">Inicio</a>
                    <a href="/AppEmpresa/departamentos/listar.php">Departamentos</a>
                    <a href="/AppEmpresa/empleados/listar.php">Empleados</a>
                    <?php if (isset($_SESSION['user'])&& $_SESSION['user']['Rol']==1):?>
                        <a href="/AppEmpresa/usuarios/listar.php">Usuarios</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])):?>
                        <a class="logout" href="/AppEmpresa/logout.php">Salir (<?= e($_SESSION['user']['Nombre']) ?>)</a>
                    <?php endif; ?>
                </nav>
            </div>
        </header>
        <main class="wrap">
    </body>
