<?php

$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";
echo "Longitud:" .strlen($frase)."<br>";
$frase_minuscula = strtolower($frase);
echo "Minusculas: " .$frase_minuscula. "<br>";

$palabra_Corta = "PHP";

$longitud_palabra = strlen ($palabra_Corta);
echo "Longitud de PHP = "  .$longitud_palabra. "<br>";