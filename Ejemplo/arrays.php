<?php
    $arr1 = [
        0 => 444,
        1 => 222,
        2 => 333
        ];

    $arr2 = array(
        0 => 555,
        1 => 666,
        2 => 777
    );

    $arr3 = array(
        "111A" => "Pirata",
        "112A" => "Tommy",
        "113A" => "Fran"
    );

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

    foreach ($arr3 as $nombre){
        echo "$nombre <br>";
    }

    foreach ($arr3 as $codigo => $nombre){
        echo "$codigo => $nombre <br>";
    }

    $arr3 ["113A"] = "Ángel";
    print_r($arr3);

    $arr4[]=444;
    print_r($arr4);
    echo "<br>";

    $arr4[12]= 121212;
    $arr4[11]= 111111;
    $arr4[]=131313;
    print_r($arr4);
    echo "<br>";