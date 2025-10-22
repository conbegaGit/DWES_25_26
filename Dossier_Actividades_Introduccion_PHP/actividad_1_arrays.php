<?php

/* 
Tareas: Crea un array asociativo llamado $paises_capitales con 5 países y sus capitales. 
Ordena el array alfabéticamente por el nombre del país (la clave) e imprime el resultado. 
Ordena el array alfabéticamente por el nombre de la capital (el valor) e imprime el resultado. 
Crea un nuevo array llamado $capitales que contenga solo los valores (las capitales) del array original e imprímelo. 
Crea un nuevo array llamado $paises_claves que contenga solo las claves (los países) del array original e imprímelo. 
Verifica si la clave "Francia" existe en $paises_capitales y muestra un mensaje indicando si existe o no. 
*/

$paises_capitales =array(
    "España" => "Madrid",
    "Portugal" => "Lisboa",
    "Francia" => "Paris",
    "Alemania" => "Berlín",
    "Italia" => "Roma"
);

ksort($paises_capitales);
echo "--Tarea 1: Ordenar por clave(ksort)";
print_r($paises_capitales);
echo "<br>";

Asort($paises_capitales);
echo "--Tarea 2: Ordenar por valor(sort)";
print_r($paises_capitales);
echo "<br>";

$capitales=array_values($paises_capitales);
echo "--Tarea 3: Array con solo las capitales";
print_r($capitales);
echo "<br>";

$paises_claves=array_keys($paises_capitales);
echo "--Tarea 4: Array con solo los pàises";
print_r($paises_claves);
echo "<br>";



$francia=(array_key_exists("Francia", $paises_capitales));
echo "--Tarea 5: Existe Francia en el array original: $francia ";
echo "<br>";