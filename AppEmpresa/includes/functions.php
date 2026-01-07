<?php

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function flash_set($mensaje) {
    $_SESSION['flash'] = $mensaje;
}

function flash_get() {
    if (isset($_SESSION['flash'])) {
        $msg = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $msg;
    }
    return null;
}
