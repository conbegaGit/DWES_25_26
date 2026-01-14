<?php
$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS";  

$longitud = strlen($frase);
echo "La longitud de la cadena es: $longitud caracteres.<br>";

$frase_minusculas = strtolower($frase);
echo "Cadena en minúsculas: $frase_minusculas<br>";

$palabra_corta = "PHP";
$longitud_palabra = strlen($palabra_corta);
echo "La longitud de la cadena '$palabra_corta' es: $longitud_palabra caracteres.<br>";

$nueva_cadena = $frase_minusculas . " " . $longitud_palabra;
echo "Nueva cadena concatenada: $nueva_cadena<br>";

