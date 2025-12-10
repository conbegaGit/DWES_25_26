<?php

//Sanitización de salida para evitar XSS
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}