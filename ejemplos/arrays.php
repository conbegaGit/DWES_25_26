<?php
    // Crear un array indexado usando la sintaxis corta []
    // con índices explícitos
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333
        ];

    // Crear un array indexado usando la sintaxis larga array()
    // con índices explícitos
    $arr2 = array(
        0 => 555,
        1 => 666,
        2 => 777
    );

    // Crear un array asociativo usando strings como claves
    // Las claves son códigos y los valores son nombres
    $arr3 = array(
        "111A" => "David",
        "112A" => "Guts",
        "113A" => "Toji"
    );

    // Crear un array indexado simple sin índices explícitos
    // PHP asignará automáticamente índices comenzando desde 0
    $arr4 = [
        111,
        222,
        333
    ];

    // Mostrar el contenido de todos los arrays usando print_r()
    print_r($arr1);
    echo "<br>";
    print_r($arr2);
    echo "<br>";
    print_r($arr3);
    echo "<br>";
    print_r($arr4);
    echo "<br>";

    // Recorrer el array asociativo mostrando solo los valores (nombres)
    foreach ($arr3 as $nombre){
        echo "$nombre <br>";
    }

    // Recorrer el array asociativo mostrando tanto las claves como los valores
    foreach ($arr3 as $codigo => $nombre){
        echo "$codigo => $nombre <br>";
    }

    // Modificar un valor existente en el array asociativo
    $f ["113A"] = "Batman";
    print_r($arr3);

    // Añadir un nuevo elemento al final del array
    // usando [] vacío (equivalente a array_push)
    $arr4[]=444;
    print_r($arr4);
    echo "<br>";

    // Asignar valores a índices específicos
    // esto puede crear "huecos" en el array
    $arr4[12]= 121212;
    $arr4[11]= 111111;
    $arr4[]=131313;  // Este se añadirá en el índice 13
    print_r($arr4);
    echo "<br>";
