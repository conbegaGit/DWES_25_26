<?php

$paises_capitales = array(
    "España" => "Madrid",
    "Francia" => "París",
    "Alemania" => "Berlín",
    "Mexico" => "Ciudad de México",
    "Argentina" => "Buenos Aires",
);

ksort($paises_capitales);

echo "----- Tarea 1: Ordena el array alfabéticamente por el nombre del país (la clave) e imprime el resultado. -----<br>";
print_r($paises_capitales);

asort($paises_capitales);

echo "<br>----- Tarea 2: Ordena el array alfabéticamente por el nombre de la capital (el valor) e imprime el resultado. -----<br>";
print_r($paises_capitales);

$capitales = array("Madrid","Paris","Berlin","Ciudad de Mexico","Buenos Aires",);

echo "<br>----- Tarea 3: Crea un nuevo array llamado capitales que contenga solo los valores (las capitales) del array original e imprímelo. -----<br>";
print_r($capitales);

$paises_claves = array("España","Francia","Alemania","Mexico","Argentina",);

echo "<br>----- Tarea 4: Crea un nuevo array llamado paises_claves que contenga solo las claves (los países) del array original e imprímelo. -----<br>";
print_r($paises_claves);


echo "<br>----- Tarea 5: Verifica si la clave Francia existe en paises_capitales y muestra un mensaje indicando si existe o no. -----<br>";

if(array_key_exists("Francia", $paises_capitales) == true){
    echo "La clave indicada 'Francia' existe.";
}else{
    echo "La clave indicada 'Francia' no existe.";
}