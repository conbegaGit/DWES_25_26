<?php
    $arrPaises = [
        "España" => "Madrid",
        "Francia" => "Paris",
        "Alemania" => "Berlin",
        "Italia" => "Roma",
        "Hungria" => "Budapest",
    ];

    ksort($arrPaises);
    echo "Ordenado por pais (alfabéticamente):<br>";
    print_r($arrPaises);

    asort($arrPaises);
    echo "<br><br>Ordenado por capital (alfabéticamente):<br>";
    print_r($arrPaises);

    $capitales = array_values($arrPaises);
    echo "<br><br>Array de capitales :<br>";
    print_r($capitales);

    $paises_claves = array_keys($arrPaises);
    echo "<br><br>Array de paises:<br>";
    print_r($paises_claves);

    if (array_key_exists("Francia", $arrPaises)) {
        echo "<br><br>La clave Francia existe en el array.<br>";
    } else {
        echo "<br><br>La clave Francia no existe en el array.<br>";
    }
