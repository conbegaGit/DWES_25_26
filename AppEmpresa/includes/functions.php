<?php
// includes/functions.php

//Sanitiza salidas para evitar XSS
function e($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//REdirige con mensaje flash en sesión

function flash_set($msg){
    if(!isset($_SESSION)) session_start();
    $_SESSION['flash'] = $msg;
}

function flash_get(){
    if(!isset($_SESSION)) session_start();
    if (isset($_SESSION['flash'])){
        $m = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $m;
    }
    return null;
}

//Comprueba rol admin

function is_admin(){
    return isset($_SESSION['user'])
    && intval($_SESSION['user']['Rol']) === 1;
}

function is_post(): bool{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}