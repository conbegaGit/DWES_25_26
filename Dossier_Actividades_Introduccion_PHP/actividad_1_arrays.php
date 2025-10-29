<?php 

$paises_capitales = array (
        "España" => "Madrid",
        "Ecuador" => "Quito",
        "Francia" => "Paris",
        "Argentina"=> "Buenos Aires",
        "Colombia"=> "Bogota",
    );

    echo "__Tarea 1: Ordenar ksort().<br>";

    ksort($paises_capitales );
    print_r($paises_capitales);

    echo "<br> <br> __Tarea 2: Ordenar sort().<br>";

    sort($paises_capitales );
    print_r($paises_capitales);

    echo "<br> <br>__Tarea 3: Ordenar rsort().<br>";
    rsort($paises_capitales);
    print_r($paises_capitales);
