<?php
require_once '/functions.php';
require_once '/db.php';

function requiere_login() {
    if (empty($_SESSION['user'])) {
        flash_set('Debes iniciar sesión para acceder a esta página.');
        redirect('login.php');
    }
}

function requiere_admin() {
    requiere_login();
    if ( $_SESSION['user']['Rol'] != 1) {
        flash_set('No tienes permisos para acceder a esta página.');
        redirect('index.php');
    }
}