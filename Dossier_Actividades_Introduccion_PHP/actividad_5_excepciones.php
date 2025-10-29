<?php
    //tarea 1 fincion
    function dividir($numerador, $denominador) {
        //tarea 2 bloque if
        if ($denominador == 0) {
            throw new Exception("Error: División entre cero no permitida.");
        }
        return $numerador / $denominador;
    }
    //tarea 3 bloque try catch y dos casos
    try {
        $resultado1 = dividir(10, 2);
        echo "10/2 =  $resultado1 <br>";
        $resultado2 = dividir(5, 0);
        echo "5/0 = $resultado2 <br>";
    }
    catch (Exception $e) {
        //tarea 4 mensaje error
        echo "Excepción capturada: " . $e->getMessage() . "<br>";
    }