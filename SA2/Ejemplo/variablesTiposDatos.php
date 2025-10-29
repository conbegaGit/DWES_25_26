<?php
/*
1.No es necesario declararlas previamente.
2.Comienzan por $, por ejemplo $nombre. Tras el $, el siguiente caracter debe ser una letra en minúscula
(recomendación) o guión bajo _, luego ya se pueden poner números.
3.son case sensitive: $var != $vAR
4.No se declara su tipo, el tipado es dinámico. Se asigna en tiempo de ejecución dependiendo del valor asignado.
5.Conveniente inicializarlas, sino dan error.
*/
$entero = 4; //tipo integer
$numero = 4.5; //tipo coma flotante
$cadena = "cadena"; //tipo cadena de caracteres
$bool = True; //tipo booleano

/*cambio de tipo de una variable */

$a = 5; //entero
echo gettype($a); //imprime el tipo de dato de a
echo "<br>";
$a = "Hola";//cambia a cadena
echo gettype($a); //se comprueva que ha cambiado
?>