<?php
/*
Enunciado: 
1. Declara un array frutas con los nombres de 5 frutas.
2. Muestra la primera y la última fruta.
3. Añade una fruta nueva al final del array
4. Recorre el array con foreach y muestra todas las frutas que sepas y comas. 
*/

$arrFrutas=[
    "Naranja",
    "Cereza",
    "Piña",
    "Fresa",
    "Tomate",
];

$a = count($arrFrutas)-1;//última posicion del array
echo "La primera fruta es: $arrFrutas[0] <br>";
echo "La última fruta es: $arrFrutas[$a] <br>";

$arrFrutas[] = "Sandia";

foreach($arrFrutas as $arrFruta){
    echo "$arrFruta, " . "<br>";
}