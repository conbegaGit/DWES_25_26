<?php
    /*
    Enunciado:
    1. Declara un array frutas con los nombres de 5 frutas.
    2. Muestra la primera y la última fruta.
    3. Añade una fruta nueva al final del array.
    4. Recorre el array con un foreach y muestra todas las frutas separadas por comas.
    */

    $arrFrutas = [
        0 => "Manzana",
        1 => "Kiwi",
        2 => "Pera",
        3 => "Mango",
        4 => "Guayaba"
    ];
    echo "La primera fruta es:"."<br>".$arrFrutas[0];
    echo "<br>";
    echo "Y la última fruta es:"."<br>".$arrFrutas[count ($arrFrutas)-1];
    echo "<br>";
    $arrFrutas[] = "Platano";
    echo "Todas las frutas son: ";
    foreach ($arrFrutas as $nombre){
        echo " $nombre, ";
    }
    echo "<br>";
    
