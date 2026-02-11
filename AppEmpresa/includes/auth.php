<?php
// Funcion que requiere al usuario iniciar sesion, sino te dirige al login
function requireLogin()
{
    if (!isLoggedIn()) {
        redirect('/AppEmpresa/login.php', "Debes iniciar sesión para acceder.");
    }
}

// Funcion que requiere al admin iniciar sesion, sino te dirige al index
function requireAdmin()
{
    requireLogin();
    if (!isAdmin()) {
        redirect('/AppEmpresa/index.php', "Acceso denegado.");
    }
}