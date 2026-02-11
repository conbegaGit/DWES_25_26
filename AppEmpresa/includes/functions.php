<?php
function e($str){
    return htmlspecialchars($str,ENT_QUOTES, 'UTF-8');
}
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
    return null;
}

function redirect(string $url): void {
    // Si no empieza con /, agregar la ruta base
    if (strpos($url, '/') !== 0 && strpos($url, 'http') !== 0) {
        $url = '/AppEmpresa/' . $url;
    }
    header("Location: " . $url);
    exit;
}

function is_post(): bool {
    return $_SERVER ['REQUEST_METHOD'] === 'POST';
}