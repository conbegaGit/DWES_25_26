<?php
    $paises_capitales = [
        "Uganda" => "Kampala",
        "Mongolia" => "Ulán_Bator",
        "España" => "Madrid",
        "Vietnam" => "Hanói",
        "Camboya" => "Nom_Pen"
    ];

    //Guardo una copia del array original antes de modificarlo
    $paises_capitales_copia_original = $paises_capitales;

    //Tarea 1 ksort
    echo "--Tarea 1--";
    ksort($paises_capitales);
    print_r($paises_capitales);
    echo "<br>";

    //Tarea 2 sort
    echo "--Tarea 2--";
    sort($paises_capitales);
    print_r($paises_capitales);
    echo "<br>";

    //Tarea 3 array_values
    echo "--Tarea 3--";
    $capitales = array_values($paises_capitales_copia_original);
    print_r($capitales);
    echo "<br>";

    //Tarea 4 array_keys
    echo "--Tarea 4--";
    $paises_claves = array_keys($paises_capitales_copia_original);
    print_r($paises_claves);
    echo "<br>";

    //Tarea 5 array_key_exists
    echo "--Tarea 5--";
    if(array_key_exists("Francia", $paises_capitales)){
    echo "La clave Francia sí existe en el array.";
    }
    else{
    echo "La clave Francia no existe en el array.";
    }
