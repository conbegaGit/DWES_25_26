<?php

    $frutas = array("Piña", "Manzana", "Limon", "Pera", "Sandia");
    print_r($frutas); 

    echo "<br><br>La primera fruta es $frutas[0] <br><br>"; 

    $a = count($frutas) - 1;

    echo "La ultima fruta es $frutas[$a] <br><br>";

    $frutas[] = "Platano";

    foreach($frutas as $fruta) {
        echo "$fruta, ";
    }

?>
