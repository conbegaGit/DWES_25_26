<?php
    /*
    Enunciado:
    1. Declara un array frutas con los nombres de 5 frutas.
    2. Muestra la primera y la última frutra.
    3. Añade una fruta nueva al final del array.
    4. Recorre el array con un foreach y muestra todas las frutras 
    separadas por comas.
    */
    $arr1 = array ("Banano", "Fresa", "Pera", "Manzana", "Mora");
    echo "La primera fruta es: <br>" . $arr1[0] ."<br>" . 
    "La ultima fruta es: <br>" . $arr1[count($arr1)-1];
    echo "<br>";
    $arr1[] = "Coco";
    echo "Todas las frutas son : ";
    foreach($arr1 as $fruta){
        echo "$fruta, ";
    }
?>