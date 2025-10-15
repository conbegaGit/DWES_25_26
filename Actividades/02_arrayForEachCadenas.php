<?php
    /*
    Enunciado:
    1. Declara un array frutas con los nombres de 5 frutas.
    2. Muestra la primera fruta y la última fruta.
    3. Añade una fruta nueva al final del array.
    4. Recorre el array con un foreach y muestra tudas las frutas separadas por comas.
    */
    $frutas = array("Melocotón", "Piña", "Paraguayo", "Pera", "Albaricoque");
    echo "La Primera fruta es: " . $frutas[0] . "<br>";
    echo "La ultima fruta es: " . $frutas [count($frutas) -1] . "<br>";
    $frutas [] = "Platano";

    $coma = count($frutas) -1;
    
        foreach($frutas as $fruta){
            echo "$fruta, ";
        }
?>