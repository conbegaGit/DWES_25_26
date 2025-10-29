<?php
    /*
    Escribe un script en php que:
    1.Guarde en una variable $x el valor 7.
    2.Guarde en otra variable $y el valor 3.
    3.Calcule:
        La suma, resta, multiplicación y división.
        El resto de la división (%).
        Si $x es mayor que $y.
        Si $x es par.
    */

    $x = 7;
    $y = 3;

    $suma = $x + $y;
    $resta = $x - $y;
    $multi = $x * $y;
    $divide = $x / $y;
    echo "La suma es: $suma <br>";
    echo "La resta es: $resta <br>";
    echo "La multiplicacion es: $multi <br>";
    echo "La division es: $divide <br>";

    $resto = $x % $y;
    echo "El resto de la division es: $resto <br>";

    $compara = ($x > $y)? "La x es mayor a la y" : "La x es menor a la y";
    echo "Cual es mayor? $compara <br>";

    $esPar = ($x % 2 == 0)? "Es par" : "Es impar";
    echo "La x es: $esPar <br>" 
?>