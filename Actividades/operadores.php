<?php
    /*
    Escribe un script en PHP que:
    1.Guarde en uno variable $x el valor 7.
    2. Guarde en otra variable $y el valor 3.
    3. Calcule:
        La suma, resta, multiplicación y división.
        El resto de la división(%)
        Si $x es mayor es mayor que $y.
        Si $x es par
    */
        //Declaramos las variables
            $x = 7;
            $y = 3;
            $suma;
            $multiplicación;
            $resta;
            $división;
            $resto;
            $mayor_o_menor;
        //Efectuamos las operaciones correspondientes
            $suma = $x + $y; 
            $multiplicación = $x * $y;
            $resta = $x - $y;
            $división = $x / $y;
            $resto = $x % $y;
        //Sacamos por pantalla el resultao
            echo "El resultado de la suma es: ". $suma . "<br>";
            echo "El resultado de la multiplicación es: ". $multiplicación. "<br>";
            echo "El resultado de la división es: ". $división. "<br>";
            echo "El resultado de la resta es: ". $resta. "<br>";
            echo "El resto de la división es: ". $resto."<br>";
        //Con los if sabemos si x es mayor que y y si x es par    
           if($x > $y){
            echo"x es mayor que y";
           }else{
            echo"y es mayor que x";
           }
            if($x%2 == 0){
                echo"x es par ";
            }else{
                echo"x es impar";
            }