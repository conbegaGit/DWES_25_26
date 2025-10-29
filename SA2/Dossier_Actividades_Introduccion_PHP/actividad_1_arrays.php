<?php

$paises_capitales = array(

    //Creamos el array asociativo de los paises
    "España" => "Madrid",
    "Francia" => "Paris",
    "Italia" => "Roma", 
    "Alemania" => "Berlin",
    "Portugal" => "Lisboa"

);

//Primero ordenamos el pais alfabeticamente
ksort($paises_capitales);
echo "Se ordenada por clave (ksort) <br>";
print_r($paises_capitales);
echo"<br>";

//Ordenamos un array por sus valores
sort($paises_capitales);
echo "Se ordenan por valores (sort) <br>";
print_r($paises_capitales);
echo "<br>";

//Ordenamos con un array ascendente
asort($paises_capitales);
echo "Se ordena por array ascendente (asort) <br>";
print_r($paises_capitales);
echo "<br>";

//Devolvemos valores en un nuevo array indexado numericamente
array_values($paises_capitales);
echo "Nuevo array indexado numericamente (array_values) <br>";
print_r($paises_capitales);
echo "<br>";

//Devuelve todas las clases del array
array_keys($paises_capitales);
echo "Devuelve todas las clases del array (array_keys) <br>";
print_r($paises_capitales);
echo "<br>";

//Comprueba si una clave existe en un array
if(array_key_exists("Francia", $paises_capitales)) {
    echo "La clave 'Francia' existe en el array.";
} else {
    echo "La clave 'Francia' NO existe en el array.";
}