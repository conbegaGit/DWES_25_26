<?php

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function flash_set($msg) {
    if (!isset($_SESSION)) session_start();
    $_SESSION['flash'] = $msg;
}

function flash_get() {
    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION['flash'])) {
        $m = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $m;
    }
    return null;
}


function is_admin () {
    return isset($_SESSION['user']) && intval($_SESSION['user']['Rol']) === 1;
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect($url) {
    header("Location: $url");
    exit;
}