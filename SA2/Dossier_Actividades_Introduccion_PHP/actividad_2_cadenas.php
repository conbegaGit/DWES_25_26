<?php
    $frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";
    //tarea 1 strlen
    echo "--Tarea 1--";
    $longitud_frase = strlen($frase);
    echo "La longitud de la cadena es: $longitud_frase <br>";
    //tarea 2 strtolower
    echo "--Tarea 2--";
    $frase_minusculas = strtolower($frase);
    echo $frase_minusculas . "<br>";
    //tarea 3 strlen
    echo "--Tarea 3--";
    $palabra_corta = "PHP";
    $longitud_palabra = strlen($palabra_corta);
    echo "La longitud de '$palabra_corta' es: $longitud_palabra <br>";
    //tarea 4 concatenar (.)
    echo "--Tarea 4--";
    $nueva_cadena = $frase_minusculas . $longitud_palabra;
    echo $nueva_cadena;