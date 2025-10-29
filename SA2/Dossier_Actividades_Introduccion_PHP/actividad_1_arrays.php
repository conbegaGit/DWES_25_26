<?php

    // Declaración del array $paises_capitales
    $paises_capitales = [
        "España"   => "Madrid",
        "Francia"  => "París",
        "Italia"   => "Roma",
        "Alemania" => "Berlín",
        "Portugal" => "Lisboa",
    ];

    // Imprimimos el array 
    print_r($paises_capitales);
    echo "<br><br>";

    //  Ordenar alfabéticamente por el nombre del país (la clave)
    ksort($paises_capitales);
    foreach ($paises_capitales as $pais => $capital) {
        echo "País: $pais → Capital: $capital <br>";
    }

    echo "<br>";

    //  Ordenar alfabéticamente por el nombre de la capital (el valor)
    asort($paises_capitales);
    foreach ($paises_capitales as $pais => $capital) {
        echo "País: $pais → Capital: $capital <br>";
    }

    echo "<br>";

    //  Crear un nuevo array con solo los valores (las capitales)
    $capitales = array_values($paises_capitales);
    print_r($capitales);
    echo "<br><br>";

    // Crear un nuevo array con solo las claves (los países)
    $paises_claves = array_keys($paises_capitales);
    print_r($paises_claves);
    echo "<br><br>";

    // 5️Verificar si la clave "Francia" existe en el array
    if (array_key_exists("Francia", $paises_capitales)) {
        echo "La clave 'Francia' existe en el array.<br>";
    } else {
        echo "La clave 'Francia' no existe en el array.<br>";
    }

?>
