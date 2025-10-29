<?php

$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";

echo "Longitud de la frase: " . strlen($frase) . "<br>";

$frase_minusculas = strtolower($frase);
echo "Frase en minúsculas: " . $frase_minusculas . "<br>";

$palabra_corta = "PHP";
$longitud_palabra = strlen($palabra_corta);
echo "Longitud de 'PHP': " . $longitud_palabra . "<br>";

$nueva_cadena = $frase_minusculas . $longitud_palabra;
echo "Nueva cadena concatenada: " . $nueva_cadena;

?>
