<?php
    echo "Actividad_1 - Arrays. <br> <br>";

    $paises_capitales = array (
        "Colombia" => "Bogotá",
        "España" => "Madrid",
        "Brasil" => "Brasilia",
        "Argentina" => "Buenos Aires",
        "Francia" => "París",
    );

    echo "--Ordenar array asociativo por sus claves ascendentes ksort()-- <br>";
    ksort($paises_capitales);
    print_r($paises_capitales);
    echo '<br>';

    echo "<br> --Ordenar array asociativo por sus valores ascendentes asort()-- <br>";
    asort($paises_capitales);
    print_r($paises_capitales);
    echo '<br>';

    echo "<br> --Devolver todos los valores del array en uno array indexado numericamente array_values()-- <br>";
    $capitales = array_values($paises_capitales);
    print_r($capitales);
    echo '<br>';

    echo "<br> --Devolver todos las claves del array en uno array indexado numericamente-- array_keys()<br>";
    $paises = array_keys($paises_capitales);
    print_r($paises);
    echo '<br>';
?>