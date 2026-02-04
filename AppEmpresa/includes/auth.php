<?php

function require_login():void {
    if (empty($_SESSION['user'])) {
        flash_set('Debes iniciar sesion');
        redirect("/AppEmpresa/login.php");
    }
}

function require_admin():void {
    require_login();
    if ($_SESSION['user']['Rol'] != 1) {
        flash_set('No tienes permisos para acceder');
        redirect("/AppEmpresa/dashboard.php");
    }
}
