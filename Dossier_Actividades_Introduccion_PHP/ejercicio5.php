<?php 

    function dividir($numerador, $denominador){ 
        if($denominador == 0){ 
            throw new Exception("Error: División por cero no permitida"); 
        } 
        return $numerador / $denominador; 
    } 
 
    try{ 
        echo dividir(10, 2) . "<br>"; 
        echo dividir(5, 0) . "<br>"; 
    }catch(Exception $e){ 
        echo $e->getMessage(); 
    } 