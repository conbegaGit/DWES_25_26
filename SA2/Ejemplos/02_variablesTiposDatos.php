<?php
/*Declaración de variables

1. No es necesaio declararlas previamente.
2. Comienzo por $, por ejemplo $nombre. Tras el $, el siguiente caracter debe ser una letra en minúscula (recomendación) 
o guión bajo _. Luego ya se pueden poner números.
3. Son case sensitive: $var != $vAR.
4. No se declara su tipo, el tipado es dinámico, Se asigna en tiempo de ejecución dependiendo del valor asignado.
5. Conveniente inicializarlas, sino dan error.
*/

$entero = 4; //Tipo Enteger
$numero = 4.5; // Tipo coma flotante
$cadena = "cadena"; //Tipo cadena de caracteres
$bool = True; //Tipo booleano

// Cambio de tipo de una variable
$a = 5; //Entero
echo gettype($a); //Imprime el tipo de dato de a
echo "<br>"; //Salto de línea
$a = "Hola"; //Cadena de caracteres
echo gettype($a); //Se comprueba el cambiado
?>