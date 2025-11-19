<?php

$frase = "eSTe eS Un TeXto DE PrUEBa cON MUlTipleS MaYúSCULAS.";
print_r("La frase original es: " . $frase . "<br>");

echo "----- Tarea 1: Calcula y muestra la longitud de la cadena frase. -----<br>";
$longitud = strlen($frase);
echo "La longitud de la cadena es de: $longitud caracteres" . "<br>";

echo "----- Tarea 2: Convierte la cadena frase a minúsculas y muestra el resultado. -----<br>";
$minusculsa = strtolower($frase);
print_r($minusculsa);

$palabra_corta = "PHP";
echo "<br>----- Tarea 3: Define una segunda cadena llamada palabra_corta con el valor PHP y calcula su longitud. -----<br>";
$longitud_php = strlen($palabra_corta);
echo "La longitud de la cadena es de: $longitud_php caracteres" . "<br>";

echo "<br>----- Tarea 4: Crea una nueva cadena que sea la concatenación de la cadena en minúsculas del punto 2 y la longitud del punto 3. Muestra el resultado. -----<br>";
$nueva_cadena = $minusculsa . " " . $longitud_php;
echo chop($nueva_cadena);









