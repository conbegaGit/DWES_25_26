<?php
/* Escribe un script en PHP que:
1. Guarde en una variable $x el valor 7,
2. Guarde en otr variable $y el valor 3,
3. Calcule:
    La suma, resta, multiplicacion y division.
    El resto de la division (%)
    Si $x es mayor que $y,
    Si $x es par,
*/

$x = 7;
$y = 3;

//Operaciones
$suma = $x + $y;
$resta = $x - $y;
$multiplicacion = $x * $y;
$division = $x / $y;
$resto = $x % $y;

//Echos mostrando el resultado de las operaciones
echo "la suma de $x y $y es $suma <br>";
echo "la resta de $x y $y es $resta <br>";
echo "la multiplicacion de $x por $y es $multiplicacion <br>";
echo "la division de $x por $y es $division <br>";
echo "El resto de la division de $x por $y es $resto <br>";

// Si x es mayor que y o no
if ($x > $y){
    echo "$x es mayor que $y <br>";
}else if ($x < $y){
    echo "$x es menor que $y <br>";
}else{
    echo "$x es igual a $y <br>";
}

//Si es x es par
if($x / 2 == 0){
    echo "$x es par ";
}else{
    echo "$x no es par";
}