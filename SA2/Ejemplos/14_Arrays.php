<?php
    //Declaración de arrays
    //1ro: con corchetes
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333,
    ];

    //2do: Con la función array()
    $arr2 = array (
        "1111A" => "Juan Vera Ochoa",
        "1112A" => "Maria Mesa Cabeza",
        "1113A" => "Ana Puertas Peral"
    );
    //Utilizamos la función print_r para impri los arrays
    print_r($arr2);
    echo "<br>";

    //Como se recorren

    //declaramos una variable que apunte al valor 
    foreach ($arr2 as $nombre){
        echo "$nombre <br>";
    }

    //declaramos dos variables, una apunta a la clave y la otra al valor
    foreach ($arr2 as $codigo => $nombre){
        echo "Código: $codigo Nombre: $nombre <br>";
    }
    print_r($arr1);

    //Para acceder al valor indicamos su clave
    echo "<br>" . "pos 0: " . $arr1[0] . "<br>";

    //Para modificar el valor accedemos al array por su clave
    $arr2["1113A"] = "Ana Puertas Segundo";
    print_r($arr2);