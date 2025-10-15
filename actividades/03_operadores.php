<?php 
/* Escribe un sccript en PHP que:
1. Guarde en una variable $x el valor 7.
2. Guarde en una variable $y el valor 3.
3. Calcule
    La suma, la resta, la multiplicación, la división.
    El resto de la división (%).
    Si $x es mayor que $y.
    Si $x es par.
    */
//varibales
$x = 7;
$y = 3;
//operaciones

//suma
$suma = $x + $y;
echo "La suma es: ". $suma ."<br>";

//resta 
$resta = $x - $y;
echo "La resta es: ". $resta ."<br>";

//multiplicacion
$multiplicacion = $x * $y;
echo "La multiplicacion es: ". $multiplicacion ."<br>";

//division 
$division = $x / $y;
echo "La division es: ". $division ."<br>";

//resto de la division
$resto = $x % $y;
echo $resto;

//si x es mayor que y
if ($x > $y) {
    echo "$x es mayor que $y <br>";
} else {
    echo "$x no es mayor que $y <br>";
}

/* IF con ternario 

echo "$x es mayor que $y: " . ($x > $y ? 'true' : 'false') . "<br>";

*/

//si x es par
if ($x % 2 == 0) {
    echo "$x es par <br>";
} else {
    echo "$x no es par <br>";
}

/*
echo "$x es par: " . ($x % 2 == 0 ? 'true' : 'false') . "<br>";
*/
