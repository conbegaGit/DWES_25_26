<?php
$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS";  

// 1. Calcula y muestra la longitud de la cadena $frase.
$longitud = strlen($frase);
echo "La longitud de la cadena es: $longitud caracteres.<br>";

// 2. Convierte la cadena $frase a minúsculas y muestra el resultado.
$frase_minusculas = strtolower($frase);
echo "Cadena en minúsculas: $frase_minusculas<br>";

// 3. Define una segunda cadena llamada $palabra_corta con el valor "PHP" y calcula su longitud.
$palabra_corta = "PHP";
$longitud_palabra = strlen($palabra_corta);
echo "La longitud de la cadena '$palabra_corta' es: $longitud_palabra caracteres.<br>";

// 4. Crea una nueva cadena que sea la concatenación de la cadena en minúsculas del punto 2 y la longitud del punto 3. Muestra el resultado.
$nueva_cadena = $frase_minusculas . " " . $longitud_palabra;
echo "Nueva cadena concatenada: $nueva_cadena<br>";

