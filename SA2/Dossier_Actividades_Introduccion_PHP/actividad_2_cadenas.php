<?php
echo "Actividad_2 - Cadenas. <br> <br>";

$frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";
echo "Los bytes de la frase anterior son: " . strlen($frase) . '<br>';
echo "Esta es la frase convertida a toda minúscula: " . strtolower($frase) . '<br>';
$palabra_corta = "PHP";
echo "Bytes de la palabra PHP: " . strlen($palabra_corta) . '<br>';
echo "La función de las dos frases anteriores: " . strtolower($frase) . $palabra_corta;