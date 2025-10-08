<?php
/*
En PHP tienes dos operadores exclusivos
*/

$var = 'Paco';
echo "hola $var <br>";
echo 'Hola $var <br>';
echo "Hola" .$var;

//Si queremos concatenar cadenas usamos
$nombre = "Pau";
$apellido = "Martí";
echo $nombre . "" . $apellido; //Pau Martí

$a = "Módulo";
$b = $a. "DWES"; //ahora $b contiene "Módulo DWES"
$a .= "DWES"; // ahora $a también contiene "Módulo DWES"