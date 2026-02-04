<?php

function require_login(): void{
    if(empty($_SESSION['user'])) {
        flash_set("Debes iniciar sesión");
        redirect("/login.php");
    }
}

function require_admin(): void{
    require_login();

    if($_SESSION['user']['Rol'] != 1){
        http_response_code(403);
        die("Acceso denegado");
        redirect('/index.php');
    }
}
?>