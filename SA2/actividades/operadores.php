<?php

    $x = 7;
    $y = 3;
    $suma = $x+$y;
    $resta = $x-$y;
    $multi = $x*$y;
    $div = $x/$y;
    $resto = $x%$y;

    echo "La suma de $x y $y es $suma. <br><br>";
    echo "La resta de $x y $y es $resta. <br><br>";
    echo "La multiplicación de $x y $y es $multi. <br><br>";
    echo "La división de $x y $y es $div. <br><br>";
    echo "El resto de la divison de $x y $y es $resto. <br><br>";

    if ($x > $y){
        echo "$x es mayor que $y. <br><br>";
    }else{
        echo "$x es menor que $y. <br><br>";
    }

    if ($x%2 == 0){
        echo "$x es par.";
    }else{
        echo "$x no es par.";
    }

?>