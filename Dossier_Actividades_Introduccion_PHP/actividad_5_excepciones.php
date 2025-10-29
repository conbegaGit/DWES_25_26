<?php
    /* 
    Tareas: 

        1-Define una función llamada dividir($numerador, $denominador) que intente realizar una división. 

        2-Dentro de la función, utiliza un bloque if para comprobar si el $denominador es cero. Si lo es, lanza una nueva excepción con el mensaje: "Error: División por cero no permitida.". Si no es cero, devuelve el resultado de la división. 

        3-Utiliza un bloque try...catch para llamar a la función dividir() en dos escenarios: 

        --Una división válida: dividir(10, 2) 

        --Una división inválida: dividir(5, 0) 

        4-En el bloque catch, muestra el mensaje de la excepción capturada (getMessage()). 
    */

        function dividir($numerador, $denominador){
            if($denominador == 0){return "Error: División por cero no permitida. <br>";}
            return $numerador/$denominador;
        }

        try {
            $resultado1=dividir(10, 2);

            $resultado2=dividir(5, 0);

            echo "Los resultados son respectivamente: $resultado1 y $resultado2";
        }
        catch (Exception $e){
            echo "Excepción: ". $e->getMessage()."<br>";
        }