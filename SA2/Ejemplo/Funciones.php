<?php

    //Funcion suma
    function suma($a, $b)
    {
        return $a +$b;
    }
    echo suma (4, 8). '<br>';
    $var1 = 35;
    $var2 = 5;
    $var3 = suma ($var1 , $var2);
    echo $var3.'<br>';

    //Funcion saludar

    function saludar ($nombre = 'usuario'){
        echo "Hola $nombre <br>";

    }
    saludar();
    saludar("Ana");


    //Funcion duplicar
    function duplicarMal ($a){
        $a = $a *2;
    }
    function duplicar($a){
        return $a *2;
    }
    function duplicar2(&$a){
        $a = $a * 2;
    }
    $var1 = 5;
    duplicarMal($var1);
    echo "$var1 <br>";

    $var1 = duplicar ($var1);

    echo "$var1 <br>";
    duplicar2 ($var1);

    echo "$var1 <br>";