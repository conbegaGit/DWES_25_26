<?php
    //Declaración con corchetes
    $arr1 = [
        0 => 444,
        1=> 222,
        2 => 333,
    ];

    //Con la funcion arrays()
    $arr2 = array(
        0 => 555,
        1 => 666,
        2 => 777,
    )

    $arr3 = array(
        "111A" => "Pirata guarro",
        "112A" => "Francisco comunista",
        "113A" => "Canario africano",
    )
    
    $arr4 = [
        111,
        222,
        333
    ];
    print_r($arr1);
    echo "<br>";
    print_r($arr2);
    echo "<br>";
    print_r($arr3);
    echo "<br>";
    print_r($arr4);
    echo "<br>";

    foreach($arr3 as $nombre){
        echo "$nombre <br>";
    }
    foreach ($arr3 as $codigo => $nombre){
        echo "$codigo => $nombre <br>";
    }
    $arr3["113A"] = "Elio";
    print_r($arr3);
    