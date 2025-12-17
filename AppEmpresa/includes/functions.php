<?php 


function e($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function flash_set($msg) {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][] = $msg;
}