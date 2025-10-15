<?php

$frutas = array("manzana","pera","platano","melon","sandia");



echo "La primera fruta es " . $frutas[0] . " y la última fruta es " . $frutas[count($frutas)-1] . "<br>";

$frutas[] = "kiwi";


foreach($frutas as $fruta){
    echo "$fruta" . ", ";
}