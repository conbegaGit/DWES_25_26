<?php
    /*
    Escribe un script en PHP que:
    1. Guarde en una variable $x el valor 7.
    2. Guarde en otra variable $y el valor 3.
    3. Calcule:
        La suma, resta, multiplicación y división.
        El resto de la división (%).
        Si $x es mayor que $y.
        Si $x es par.
    */
    $x = 7;
    $y = 3;
    echo "La suma de $x y $y es: " . ($x + $y) . "<br>";
    echo "La resto de $x y $y es: " . ($x - $y) . "<br>";
    echo "La multiplicación de $x y $y es: " . ($x * $y) . "<br>";
    echo "La división de $x y $y es: " . ($x / $y) . " y el resto de 
    división es: " . ($x % $y) . "<br>";
    echo $x > $y ? $x . " es mayor que " . $y :
    $x . " es menor que " . $y;
    echo "<br>";
    if($x / 2 == 0){
        echo $x . " es un número par";
    } else{
        echo $x . " no es un número par";
    }
?>