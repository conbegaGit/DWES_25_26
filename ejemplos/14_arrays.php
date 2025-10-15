<?php

    //Declaración:
    //1. Con Corchetes
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333,

    ];
    //2. Con la función array()
    $arr2 = array(
        "1111A" => "Juan Vera Ochoa",
        "1112A" => "Maria Mesa Cabeza",
        "1113A" => "Ana Puertas Peral",

    );
    // Utilizamos la funcion print_r para imprimir el valor del array
    print_r($arr2);
    echo "<br>";
    // Como se recorren

    // Declaramos una variable que se apunte el valor
    foreach ($arr2 as $nombre){
        echo "$nombre <br>";
    }
    // Declaramos dos variables, una apunta a la clave y la otra al valor
    foreach ($arr2 as $codigo => $nombre) {
        echo "Código : $codigo Nombre: $nombre <br>";
    }
    print_r($arr1);
    // Para acceder al vlor indicamos su clave
    echo "<br>" . "pos 0: " . $arr1[0] . "<br>";

    // Para modificar el valor accedemos al array por su clave
    $arr2 ["1113A"] = "Ana Puertas Segundo";
    print_r($arr2);



