<?php
if (!isset($_SESSION)) {
    session_start();
}

function require_login(): void {
    if (empty($_SESSION['user'])) {
        flash_set("Debes iniciar sesión");
        redirect("/AppEmpresa/index.php");
        exit;
    }
}

function require_admin(): void {
    require_login();

    if ($_SESSION['user']['Rol'] != 1) {
        flash_set("No tienes permisos para acceder");
        redirect("/AppEmpresa/dashboard.php");
        exit;
    }
}