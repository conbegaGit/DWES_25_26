<?php
    //Declaracion
    //1.Con corchetes
    $arr1 = [
        0=> "444",
        1=> "222",
        2=> "333",
    ];

    //2. Con la funcion array()
    $arr2 = array(
        "1111A" => "Juan Vera Ochoa",
        "1112A" => "Maria Mesa Cabeza",
        "1113A" => "Ana Puertas Peral",
    );

    //utilizamos la funcion print_r para imprimir el valor del array
    print_r($arr2);
    echo "<br>";    
    //Como se recorren 
    //declaramos una variable que apunmte al valor 
    foreach ($arr2 as $nombre) {
        echo "$nombre <br>";
    }
     //declaramos una variable que apunmte al valor y otra que apunte a la clave
     foreach ($arr2 as $codigo => $nombre) {
        echo "Codigo :$codigo Nombre: $nombre <br>";
    }
    print_r($arr1);

    //para acceder al valor indicamos su clave
    echo "<br>" . "pos 0: " . $arr1[0] . "<br>";

    //para modificar un valor accedemos al array por su clave
    $arr2['1113A']="Ana Puertas Segundo";
    print_r($arr2);

   