<?php

    //tarea 1 funcion que incrementa 1 copia
    function incrementar_copia($numero) {
        $numero++;
        echo "El valor es: $numero <br>";
    }
    //tarea 2 copia
    echo "--Tarea 2--";
    $contador = 10;
    incrementar_copia($contador);
    echo "Valor original: $contador <br>";

    //tarea 3 funcion incrementa 1 referencia
    function incrementar_referencia(&$numero) {
        $numero++;
        echo "El valor es: $numero <br>";
    }

    //tarea 4 referencia
    echo "--Tarea 4--";
    $puntos = 5;
    incrementar_referencia($puntos);
    echo "Valor original: $puntos <br>";