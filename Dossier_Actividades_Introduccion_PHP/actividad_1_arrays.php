<?php
    $paises_capitales = array (
        "España" => "Madrid",
        "Francia" => "París",
        "Italia" => "Roma",
        "Alemania" => "Berlín",
        "Portugal" => "Lisboa"
    );

    //Array ordenador por paises (Claves) alfabéticamente
    ksort($paises_capitales);
    foreach ($paises_capitales as $pais => $capital) {
        echo "$pais <br>";
    }

    // Espacio entre países y capitales
    echo "<br><br>";

    // Array ordenado por capitales (valores) alfabéticamente
    // Usamos asort() para ordenar por valores manteniendo la asociación clave=>valor
    asort($paises_capitales);
    foreach ($paises_capitales as $pais => $capital) {
        echo "$capital <br>";
    }

    echo "<br><br>";

    // Crear un nuevo array que contenga sólo las capitales (valores)
    $capitales = array_values($paises_capitales);
    
    // Mostrar el array de capitales
    print_r($capitales);
    echo "<br>";

    echo "<br><br>";

    // Crear un nuevo array que contenga sólo los países (claves)
    $paises_claves = array_keys($paises_capitales);

    // Mostrar el array de países
    print_r($paises_claves);
    echo "<br>";

    echo "<br><br>";

    // Comprobar si existe la clave "Francia" en el array original
    if ($array_key_exists = array_key_exists("Francia", $paises_capitales)) {
        echo "La clave 'Francia' existe en el array de países.<br>";
    } else {
        echo "La clave 'Francia' no existe en el array de países.<br>";
    }
