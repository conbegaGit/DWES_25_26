<?php

$frutas = array("manzana", "pera", "naranja", "plátano", "kiwi");

echo "La primera fruta es: " . $frutas[0] . "<br>";
echo "La ultima fruta es: " . $frutas[count($frutas) - 1] . "<br>";


$frutas[] = "mango";

foreach ($frutas as $nombre) {
        echo $nombre, "; ";
    }
