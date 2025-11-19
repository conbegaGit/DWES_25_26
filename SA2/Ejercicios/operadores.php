<?php

$x = 7;
$y = 3;

$suma = $x + $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$resto = $x % $y;
$esPar = ($x % 2) == 0 ? "Si" : "No";

echo "Numeros a operar: " . $x . " y " . $y . "<br> <br>"; 

echo "La suma es $suma <br>";
echo "La multiplicación es $multiplicacion <br>";
echo "La division es $division <br>";
echo "El resto es $resto <br>";
echo "¿Es par? " . $esPar;