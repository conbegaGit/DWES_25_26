<?php 

    function incrementar_copia($numero){ 
        $numero++; 
        echo "Dentro de la funcion: $numero<br>";
    }

    $contador = 10; 
    incrementar_copia($contador); 
    echo "Fuera de la funcion: $contador<br><br>";

    function incrementar_referencia(&$numero){ 
        $numero++; 
        echo "Dentro de la funcion (referencia): $numero<br>";
    } 

    $puntos = 5; 
    incrementar_referencia($puntos); 
    echo "Fuera de la funcion referencia: $puntos<br>";