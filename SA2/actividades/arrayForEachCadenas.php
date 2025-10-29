<?php
/*
Enunciado:
1. Declara un arrya frutas con los nombres de 5 frutas. 
2.Muestra la primera y la última fruta.
3.Añade una fruta nueva al final del array.
4.Recorre el array con un foreach y muestra todas las frutas separadas por comas.
*/
$frutas = ["manzana", "plátano", "naranja", "pera", "kiwi"];

echo "La primera fruta es: " . $frutas[0] . "<br>";
echo "La última fruta es: " . $frutas[count($frutas) - 1] . "<br>";


echo "Todas las frutas: ";
foreach ($frutas as $fruta) {
    echo "$fruta, ";
}
?>