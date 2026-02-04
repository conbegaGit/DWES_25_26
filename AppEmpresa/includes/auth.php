<?php

function require_login(): void {
    
    if (empty($_SESSION['user_id'])) {
        flash_set("Debes iniciar sesión");
        redirect("/login.php");
    }
}

function require_admin(): void {
    
    require_login();
    
    if (empty($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
        flash_set("No tienes permisos para acceder a esta página");
        redirect("/index.php");
    }
}

