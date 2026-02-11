<?php

//Sanitización de salida para evitar XSS
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//Redirige con mensaje flash en sesión
function flash_set($msg){
    if (!isset($_SESSION)) session_start();
    $_SESSION['flash'] = $msg;

}

function flash_get(){
    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION['flash'])){
        $m = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $m;
    }
}

function redirect($url): void {
    header("Location: $url");
    exit();
}