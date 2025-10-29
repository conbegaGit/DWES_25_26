<?php 

    echo "Actividad_5 - Excepciones. <br> <br>";

    function dividir($numerador, $denominador){ 
        if($denominador == 0){ 
            throw new Exception("Error: División por cero no permitida"); 
        } 
        echo "La división de $numerador entre $denominador es: " . $numerador / $denominador; 
    } 
 
    try{ 
        dividir(10, 2);   
        echo '<br>';
        dividir(5, 0); 
    }catch(Exception $e){ 
        echo $e->getMessage(); 
    } 