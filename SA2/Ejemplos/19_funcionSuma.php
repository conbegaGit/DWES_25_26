<?php
    /*Declaración de una función en PHP
    Una forma de pasar parametros normales*/
    function suma($a, $b){
        return $a + $b;
    }

    echo suma(4, 5) . '<br>';
    $var1 = 35;
    $var2 = 5;
    $var3 = suma($var1, $var2);
    echo $var3 . '<br>';

    /*Otra forma de crear función sin necesidad de pasar variable
    ya que la funcion le da una asignación*/
    function saludar($nombre = 'Usuario'){
        echo "Hola $nombre <br>";
    }

    saludar();
    saludar("Ana");
?>