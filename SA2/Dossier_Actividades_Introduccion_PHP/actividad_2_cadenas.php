<?php

//Definimos el Strings
$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS";

//Calculamos la longitud de la frase
$longitud_frase = strlen($frase);
echo "La longitud de la frase es: " . $longitud_frase . "<br>";

//Convertimos la frase a minusculas
$frase_minuscula = strtolower($frase);
echo "Frase en minuscula" . $frase_minuscula . "<br>";

//Definimos una segunda cadena llamada $palabra_corta con el valor "PHP" y calcula su longitud.
$palabra_corta = "PHP";
$palabra_longitud = strlen($palabra_corta);
echo "Longitud de palabra " . $palabra_corta . "<br>";

//Creamos una nueva cadena 
$nueva_cadena = $frase_minuscula . $palabra_longitud;
echo "Nueva cadena concatenada: " . $nueva_cadena;