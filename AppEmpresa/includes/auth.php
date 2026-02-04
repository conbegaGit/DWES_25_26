<?php
// Funcion que requiere al usuario iniciar sesion, sino te dirige al login
function verificarLogueado()
{
    if (!estaLogueado()) {
        redirect('/AppEmpresa/login.php', "Debes iniciar sesión para acceder.");
    }
}

// Funcion que requiere al admin iniciar sesion, sino te dirige al index
function verificarAdmin()
{
    verificarLogueado();
    if (!esAdmin()) {
        redirect('/AppEmpresa/index.php', "Acceso denegado.");
    }
}