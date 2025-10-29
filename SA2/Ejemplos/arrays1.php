<?php
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333
    ];

    $arr2 = array (
        "llllA" => "Juan Vera Ochoa",
        "1112A" => "Maria Mesa Cabeza",
        "1113A" => "Ana Puertas Peral"
    );
    print_r($arr2);
    echo "<br>";

    foreach ($arr2 as $nombre){
        echo "$nombre <br>";
    }
    foreach ($arr2 as $codigo => $nombre){
        echo "Codigo: $codigo Nombre: $nombre <br>";
    }
    print_r($arr1);

    echo "<br>" . "pos 0: " . $arr1[0] . "<br>";

    $arr2["1113A"] = "Manolito Gafotas Jorge";
    print_r($arr2);



    //Otras maneras de hacerlo:
    /*$arr3 = array (
        0 => 444,
        1 => 222,
        2 => 333,
    );
    $arr4 = array(
        444,
        222,
        333,
    );*/