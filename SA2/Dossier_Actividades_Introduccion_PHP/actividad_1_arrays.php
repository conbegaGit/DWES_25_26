<?php 

$paises_capitales = array (
        "España" => "Madrid",
        "Ecuador" => "Quito",
        "Francia" => "Paris",
        "Argentina"=> "Buenos Aires",
        "Colombia"=> "Bogota",
    );

    echo "__Tarea 1: Ordena el array alfabéticamente por el nombre del país (la clave) e imprime el resultado. <br>";
    ksort($paises_capitales );
    print_r($paises_capitales);

    echo "<br> <br> __Tarea 2: Ordena el array alfabéticamente por el nombre de la capital (el valor) e imprime el resultado. .<br>";
    asort($paises_capitales );
    print_r($paises_capitales);

    echo "<br> <br>__Tarea 3: Crea un nuevo array llamado capitales que contenga solo los valores (las capitales) del array original e imprímelo. <br>";
    $capitales = array (
       "Madrid",
       "Quito",
       "Paris",
       "Buenos Aires",
       "Bogota",
    ); 
    array_values($paises_capitales);
    print_r($capitales);

    echo "<br> <br> __Tarea 4: Crea un nuevo array llamalo paises_claves que contenga solo las claves (los países) del array original e imprimelo. <br> ";
    $paises_claves = array (
        "España",
        "Ecuador",
        "Francia" ,
        "Argentina",
        "Colombia",
    );
    array_keys ($paises_claves);
    print_r($paises_claves);

    echo "<br> <br> __Tarea 5: Verifica si la clave (Francia) existe en paises_capitales y muestra un mensaje indicando si existe o no. <br>";
    if (array_key_exists("Francia", $paises_capitales) ) {
        print_r("La clave Francia existe en el array paises_capitales");
    }
    else {
        print_r("La clave Francia no existe en el array paises_capitales");
    }
