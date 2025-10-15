<?php
    /*
    Escribe un script en PHP que:
    1.Guarda en una variable $x el valor 7.
    2.Guarda en otra variable $y el valor 3.
    3. Calcula:
        La suma, resta, multiplicación y división.
        El resto de la division (%).
        Si $x es mayor que $y.
        Si $x es par.
    */

    $x = 7;
    $y =3;

    $suma=$x+$y;
    $resta=$x-$y;
    $mult=$x*$y;
    $div=$x/$y;

    echo "La suma es: $suma <br>";
    echo "La resta es: $resta<br>";
    echo "La multiplicación es: $mult <br>";
    echo "La división es: $div <br>";

    $comp=($x > $y)? "Si":"No";

    echo "$x es mayor que $y?: $comp <br>";

    $resto = $x%2;
    $par=($resto == 0)?"Si":"No";

    echo "$x es par?: $par <br>";