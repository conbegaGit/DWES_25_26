<?php

    /*
    Tareas: Define una cadena llamada $frase con el valor "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.". 
    1-Calcula y muestra la longitud de la cadena $frase. 
    2-Convierte la cadena $frase a minúsculas y muestra el resultado. 
    3-Define una segunda cadena llamada $palabra_corta con el valor "PHP" y calcula su longitud. 
    4-Crea una nueva cadena que sea la concatenación de la cadena en minúsculas del punto 2 y la longitud del punto 3. Muestra el resultado. 
    */

    $frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";

    $longitudFrase = strlen($frase);

    echo "--Tarea 1: La longitud de la frase es de $longitudFrase <br>";

    $minusculaFrase = strtolower($frase);

    echo "--Tarea 2: La frase en minusculas completamente: $minusculaFrase <br>";

    $palabra_corta = "PHP";

    $longitudPalabra_corta= strlen($palabra_corta);

    echo "--Tarea 3: La longitud de la palabra corta es de: $longitudPalabra_corta <br>";

    

    $cadena= $minusculaFrase . " y " .$longitudPalabra_corta;

    echo "--Tarea 4: $cadena <br>";