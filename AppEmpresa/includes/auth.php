<?php

function require_login(): void{
    if (empty($_SESSION['user'])){
        flash_set("debe iniciar sesión");
        redirect("/login.php");
    }
}
function require_admin(): void{
    require_login();

    if ($_SESSION['user']['Rol']!=1){
        flash_set("mo tienes permisos para acceder");
        redirect("/index.php");
    }
}
function redirect($url){
    header ("Location: {$url}");

}