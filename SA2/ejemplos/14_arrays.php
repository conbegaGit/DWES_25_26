<?php
    //Declaracion de un array
    //Con corchetes
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333,
    ];

    // 2. Con la funcion array()
    $arr2 = array(
        "1111A" => "Juan Vera Ochoa",
        "1112A" => "Ana Maria Lopez",
        "1113A" => "Luis Perez",
    );

    //Utilizamos la funcion print_r para imprimir el valor de un array
    print_r($arr2);
    echo "<br>";

    //Como se recorren
    //Declaramos una variable que apunte al valor
    foreach ($arr2 as $nombre) {
        echo "$nombre <br>";
    }

    //Declaramos dos variables, una que apunte a la clave y otra al valor
    foreach ($arr2 as $codigo => $nombre) {
        echo "Codigo: $codigo, Nombre: $nombre <br>";
    }
    print_r($arr1);

    //Para acceder al valor indicamos la clave
    echo "<br>" . "pos0: " . $arr1[0] . "<br>";

    //Para modificar el valor accedemos al arrar por su clave
    $arr2["1113A"] = "Ana Maria Lopez";
    print_r($arr2);