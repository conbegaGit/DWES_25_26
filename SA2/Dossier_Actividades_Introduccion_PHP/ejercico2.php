<?php 

    $frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS."; 

    $bytes = strlen($frase); 
    echo "Longitud de la frase: $bytes<br>"; 

    $frase_minus = strtolower($frase); 
    echo "Frase en minusculas: $frase_minus<br>";

    $palabra_corta = "PHP"; 

    $bytes_palabra = strlen($palabra_corta); 
    echo "Longitud de la palabra corta: $bytes_palabra<br>";

    $frase_completa = $frase_minus . $bytes_palabra; 
    echo "Frase completa concatenada: $frase_completa<br>";