<?php

    session_start();
    session_unset();
    session_destroy();

    setcookie('nombreUsuario', '', time() - 604800);

    header('Location: index.php');
    exit;