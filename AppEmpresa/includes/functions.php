<?php

    function e($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    function flash_set($msg) {
        if (!isset ($_SESSION)) session_start();
        $_SESSION['flash_message'] = $msg;
    }

    function flash_get() {
        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['flash_message'])) {
            $m = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
            return $m;
        }
        return null;
    }
function is_admin() {
    return isset($_SESSION['user']) 
    && intval($_SESSION['user']['Rol']) === 1;
}

 function is_post(): bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
 }

function redirect($url): void {
    header("Location: $url");
    exit();
}