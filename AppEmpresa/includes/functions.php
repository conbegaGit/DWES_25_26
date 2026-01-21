<?php
// Asegurar que la sesión esté iniciada si no lo está
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sanitiza salida para evitar XSS (maneja nulos)
function e($str)
{
    return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
}

// Redirige con mensaje flash en sesión
function flash_set($msg, $tipo = 'success')
{
    $_SESSION['flash'] = ['mensaje' => $msg, 'tipo' => $tipo];
}

// Obtiene y borra el mensaje flash
function flash_get()
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

// Redirige a una URL y detiene la ejecución
function redirigir($url, $msg = null, $tipo = 'success')
{
    if ($msg) {
        flash_set($msg, $tipo);
    }
    header("Location: $url");
    exit;
}

// Comprueba si el usuario está logueado
function estaLogueado()
{
    return isset($_SESSION['user']);
}

// Comprueba rol admin
function esAdmin()
{
    return isset($_SESSION['user'])
        && intval($_SESSION['user']['Rol']) === 1;
}

// Middleware: Verifica si está logueado, sino redirige a login
function verificarLogueado()
{
    if (!estaLogueado()) {
        redirigir('/AppEmpresa/login.php', 'Debes iniciar sesión para acceder.', 'error');
    }
}

// Middleware: Verifica si es admin, sino redirige
function verificarAdmin()
{
    verificarLogueado();
    if (!esAdmin()) {
        redirigir('/AppEmpresa/dashboard.php', 'Acceso denegado.', 'error');
    }
}