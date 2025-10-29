<?php
$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";

echo "Longitud de la cadena \$frase: " . strlen($frase) . "<br><br>";


$frase_minusculas = strtolower($frase);
echo "Cadena en minúsculas: " . $frase_minusculas . "<br><br>";


$palabra_corta = "PHP";

$longitud_palabra = strlen($palabra_corta);
echo "Longitud de la cadena \$palabra_corta: " . $longitud_palabra . "<br><br>";


$nueva_cadena = $frase_minusculas . " y " . $longitud_palabra;
echo $nueva_cadena;