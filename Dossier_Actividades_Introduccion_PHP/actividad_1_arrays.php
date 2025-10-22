<?php
    $paises_capitales= array(
        "Marruecos" => "Rabat",
        "Nigeria" => "Abuya",
        "Japón" => "Tokyo",
        "Alemania" => "Berlín",
        "Samoa" => "Apia",
    );
    echo "Ordenar por Claves". "<br>";
    ksort($paises_capitales);
    print_r($paises_capitales);

    echo "<br>";

    echo "Ordenar por valores". "<br>";

    asort($paises_capitales);
    print_r($paises_capitales);
    echo "<br>";

    $capitales=array("Rabat", "Abuya", "Tokyo", "Berlín", "Apia");
    echo "Valores de las capitales indexadas numéricamente". "<br>";
    array_values($paises_capitales);
    print_r($capitales);   

    

