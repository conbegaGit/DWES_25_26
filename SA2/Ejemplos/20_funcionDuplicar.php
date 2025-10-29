<?php
    /*Dos formas de pasar parametros: por copia y por referencia*/
    
    //Por copia
    function duplicarMal($a){
        $a = $a * 2;
    }

    function duplicar($a){
        return $a * 2;
    }

    //Por referencia: a la variable se le pone antes un &
    function duplicar2(&$a){
        $a = $a * 2;
    }

    $var1 = 5;
    duplicarMal($var1);
    echo "$var1 <br>";

    $var1 = duplicar($var1);
    echo "$var1 <br>";

    //Se imprime la funcion que es por referencia
    duplicar2($var1);
    echo "$var1 <br>";