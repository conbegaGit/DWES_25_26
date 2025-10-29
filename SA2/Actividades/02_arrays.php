<?php
    $frutas = array("Platano", "Manzana", "Pera", "Mango", "Uva");

    print_r($frutas);
    echo"<br>";

    print_r($frutas[0]);
    echo"<br>";

    print_r($frutas[count($frutas)-1]);
    echo"<br>";

    $frutas[] = "Melocotón";
    echo "<br>";

    foreach($frutas as $fruta){
        echo "$fruta, ";
    }
