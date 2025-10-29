<?php
/*
Enunciado:
1. Declara un array frutas con los nombres de 5 frutas 
2. Muestra la primera y la ultima fruta 
3. Añade una fruta nueva al final del array
4. Recorre el array con un foreach y muestra todas las frutas separadas por comas
*/

$arr1 = array (
    "Fresa",
    "Manzana",
    "Pera",
    "Cereza",
    "Guanabana"
);
print_r($arr1);
echo "<br>";

//muestro la primera y la ultima fruta
echo "La primera fruta es: ". $arr1[0] . "<br>";
echo "Y la ultima fruta es: " . $arr1[count($arr1) -1] . "<br>";

//añadir otr fruta 
$arr1 [] = "Mango";
print_r($arr1);
 
//recorrer el array 
foreach ($arr1 as $arr) {
    echo $arr . ", ";
}