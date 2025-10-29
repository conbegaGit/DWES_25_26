<?php
$Frase_con_valor = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";
$val = strlen($Frase_con_valor);
echo "<h1>Longitud de la cadena</h1>";
print_r ($val);
echo "<br>";
$val2 = strtolower($Frase_con_valor);
print_r ($val2);
echo "<br>";
$palabra_corta = "PHP";
$val3 = strlen($palabra_corta);
print_r ($val3);
echo "<br>";
$palabra = "$val2 . $val3";
print_r ($palabra);
?>