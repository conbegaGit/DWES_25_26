<?php
/*
Enunciado: 
1. Declara un array frutas con los nombres de 5 frutas
2. Muestra la primera y la ultima fruta.
3. Añade una fruta nueva al final del array
4. Recorre el array con un foreach y muestra todas las frutas separado por comas.
*/ 

$frutas = [
    "C#reza",
    "guaJava",
    "Phpiña",
    "JSandia",
    "Melocoton++",
];
//Un pequeño juego de palabras ^
$ultimaPosicion = count($frutas) - 1;
print "La primera fruta es $frutas[0] <br>";
print "La ultima fruta es $frutas[$ultimaPosicion] <br>";

$frutas[] =  "MelonRust";

foreach($frutas as $fruta){
    echo "$fruta, " . "<br>";
}