<?php 

    echo "Actividad_4 - Funciones. <br> <br>";

    function incrementar_copia($numero){ 
        $numero++;
        echo "Impresión de la función incrementar_copia: " . $numero . '<br>';
    } 

    $contador = 10; 
    incrementar_copia($contador);
    echo "Impresión de la variable (contador): " . $contador . '<br>'; 

    function incrementar_referencia(&$numero){ 
        $numero++;
        echo "Impresión de la función incrementar_referencia: " . $numero . '<br>';
    } 

    $puntos = 5; 
    incrementar_referencia($puntos);
    echo "Impresión de la variable (puntos): " . $puntos . '<br>';