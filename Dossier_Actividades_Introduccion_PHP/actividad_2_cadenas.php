<?php
  $frase = "eSTe eS Un TeXto DE PrUEBa cON MÚlTipleS MaYúSCULAS.";

  echo "__Tarea 1: Calcula y muestra la longitud de la cadena frase. ";
    echo "<br> La longitud de la cadena es: " . strlen($frase) . "<br>";


  echo " <br> <br>__Tarea 2: Convierte la cadena frase a minúsculas y muestra el resultado. ";
   echo "<br> " . $frase2 =  strtolower($frase) .  "<br>";


   echo "<br> <br>__Tarea 3: Define una segunda cadena llamada palabra_corta con el valor (PHP) y calcula su longitud. ";
    $palabra_corta = "PHP";
    echo "<br> La longitud de esta cadena es: " . $palabra_corta2 = strlen($palabra_corta) ."<br>";


   echo "<br> <br> __Tarea 4: Crea una nueva cadena que sea la concatenación de la cadena en minúsculas del punto 2 y la longitud del punto 3. Muestra el resultado. ";
    $nueva_cadena = $frase2 . "y" . $palabra_corta2;
    echo "<br> La concatenación de las dos cadenas es: " . $nueva_cadena . "<br>";
