<?php
    /*
    1.Declara un array frutas con los nombres de 5 frutas
    2. Muestra la primera y la ultima.
    3. Añade una fruta nueva al final del array
    4. Recorre el array con un foreach y mientra todas las frutas separadas por comas 
    */

    $arrFrutas =[
        "Naranja",
        "Papaya",
        "Tomate",
        "Fresa",
        "Frambuesa"
    ];
    
    $a =count($arrFrutas)-1;//Ultima posición del array
    echo "La primera fruta es: $arrFrutas[0] <br>";
    echo "La última fruta es: $arrFrutas[$a] <br>";
    
    $arrFrutas[]= "Piña";

    foreach ($arrFrutas as $fruta) {
        echo "$fruta, ";
    }