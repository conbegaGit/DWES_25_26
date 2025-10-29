<?php
$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";

print_r ("longitud cadena " . strlen($frase) . "<br> <br>");

print_r ("texto en minusculas " . strtolower($frase) . " <br> <br>");

$palabra_corta = "PHP";

$concatenacion = strtolower($frase) . strlen($palabra_corta);

print_r($concatenacion);