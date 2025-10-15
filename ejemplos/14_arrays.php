<?php
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333,
    ];

    $arr2 = [
        "1114" => "Juan Vera Ochoa",
        "1124" => "Ana Maria Lopez",
        "1134" => "Luis Perez",
    ];

    print_r($arr2);
    echo("<br>");

    foreach($arr2 as $nombre) {
        echo "$nombre <br>";
    }

    foreach($arr2 as $codigo => $nombre) {
        echo "Código: $codigo Nombre: $nombre <br>";
    }

    print_r($arr1);

    echo "<br>" . "pos 0: " . $arr1[0] . " char"; 
?>
