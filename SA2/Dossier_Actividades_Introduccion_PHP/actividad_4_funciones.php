<?php
    /*
    Tareas: 

        1-Define una función llamada incrementar_copia($numero) que incremente el valor del parámetro en 1 y lo muestre. 

        2-Define una variable $contador = 10. Llama a la función incrementar_copia pasándole $contador. Después de la llamada, muestra el valor de $contador para verificar si ha cambiado. 

        3-Define una función llamada incrementar_referencia(&$numero) que incremente el valor del parámetro en 1 y lo muestre. Nota el &. 

        4-Define una variable $puntos = 5. Llama a la función incrementar_referencia pasándole $puntos. Después de la llamada, muestra el valor de $puntos para verificar si ha cambiado. 
    */

    function incrementar_copia($numero) {
        $numero++;
        echo " Incremento realizado--> $numero <br>";
    }

    $contador = 10; 

    echo "--Tarea 2: <br>";
    incrementar_copia($contador);

    function incrementar_referencia(&$numero){
        $numero++;
        echo " Incremento realizado--> $numero <br>";
    }

    $puntos = 5;

    echo "--Tarea 4: <br>";
    incrementar_referencia($puntos);

    echo "valor actual de puntos $puntos <br>";