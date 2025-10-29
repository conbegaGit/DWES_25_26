<?php
/*
Escribe un script en PHP que:
1.Guarde en una variable $x el valor 7,
2.Guarde en una variable $y el valor 3,
3.Calcules:
    La suma, resta, multiplicación y división.
    El resto de la división(%).
    Si $x es mayor que $y.
    Si $x es par.
*/
$x = 7;
$y = 3;

echo "Suma: " . ($x + $y) . "<br>";
echo "Resta: " . ($x - $y) . "<br>";
echo "Multiplicación: " . ($x * $y) . "<br>";
echo "División: " . ($x / $y) . "<br>";
echo "Resto de la división: " . ($x % $y) . "<br>";
echo "$x es mayor que $y: " . ($x > $y ? 'Si' : 'No') . "<br>";
echo "$x es par: " . ($x % 2 == 0 ? 'Si' : 'No') . "<br>";
