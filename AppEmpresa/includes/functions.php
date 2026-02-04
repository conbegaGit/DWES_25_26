<?php

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function flash_set($msg) {
    $_SESSION['flash'] = $msg;
}

function flash_get() {
    if (isset($_SESSION['flash'])) {
        $m = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $m;
    }
    return null;
}

function is_admin() {
    return isset($_SESSION['user']) && (int)$_SESSION['user']['Rol'] === 1;
}

function redirect(string $url): void {
    header("Location: $url");
    exit;
}