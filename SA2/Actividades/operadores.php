<?php
/*
Escribe un script en PHP que: 
1. Guarde en otra variable $x el valor 7.
2. Guarde en otra variable $y el valor 3.
3. Calcule: 
    La suma, resta, multiplicación y división. 
    El resto de la división (%)
    Si $x es mayor que $y
    Si $x es par
*/

$x = 7;
$y = 3;

$suma = $x+$y;
$resta = $x-$y;
$mult = $x*$y; 
$division = $x/$y; 

echo "La suma es: $suma <br>";
echo "La resta es: $resta <br>";
echo "La multiplicación es $mult <br>";
echo "La division es $division <br>";

$comp = ($x > $y)? "Si" : "No";

echo "$x es mayor que $y?: $comp <br>";

$resto = $x%2; 
$par = ($resto == 0)?"SI": "NO";

echo "$x es par?: $par <br>";