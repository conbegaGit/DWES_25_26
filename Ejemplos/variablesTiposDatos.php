<?php

/*Declaración de variables

1. Ne es necesario declararla previamente
2. Comienzan por $, por ejemplo $nombre. Tras el $ el siguiente caracter debe ser una letra en minúscula (recomendación) o guión bajo _. Luego ya se pueden poner números.
3. Son case sensitive: $var != $vAR
4. No se declara su tipo, el tipado es dinámico. Se asigna en tiempo de ejecución dependiendo del valor asignado.
5. Conveniente inicializarlas, sino dan error.

*/

//Siempre, tanto como para declarar como para llamar a la variable hay que usar el dolar ($)
$entero = 4;
$numero = 4.5;
$cadena = "cadena";
$bool = true;

//Cambio de tipo variable
$num = 1;
echo gettype($num);
echo "<br>";
$num = "dos";
echo gettype($num);
?>