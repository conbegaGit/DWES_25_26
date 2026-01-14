<?php
$x = 7;
$y = 3;
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$resto = $x % $y;

echo "La suma es : $suma <br> <br>";
echo "La resta es : $resta <br> <br>";
echo "La multiplicación es : $multiplicacion <br> <br>";
echo "La division es : $division <br> <br>";
echo "El resto de la division es : $resto <br> <br>";

if  ($x > $y){
    echo "$x  es mayor que $y <br> <br>";
}
else echo "$x es menor que $y <br> <br>";

if ($x %2 == 0){
    echo "$x es par <br> <br>";
}
else echo "$x es impar <br> <br>";