<?php

$x = 7;
$y = 3;

$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$restoDiv = $x % $y;
$division = $x / $y;

echo "La suma es : $suma <br> <br>";
echo "La resta es : $resta <br> <br>";
echo "La multiplicacion es : $multiplicacion <br> <br>";
echo "La division es : $division <br> <br>";
echo "El resto de la division es : $restoDiv <br> <br>";


if ($x < $y){
    echo "$x es menor que $y";
}
else if ($x < $y){
    echo "$x es mayor que $y";
}
else if ($x % $y != 0){
    echo "El numero es impar";
}
else if ($x % $y == 0){
    echo "El numero es par";
}