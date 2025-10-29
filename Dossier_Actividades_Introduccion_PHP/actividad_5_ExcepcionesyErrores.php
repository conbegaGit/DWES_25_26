<?php
function dividir($numerador, $denominador) { 
    if ($denominador == 0) { 
        throw new Exception("Error: División por cero no permitida."); 
    } 
    return $numerador / $denominador; 
} 
 
try { 
    echo "Resultado 1: " . dividir(10, 2) . "<br>"; 
    echo "Resultado 2: " . dividir(5, 0) . "<br>"; 
} catch (Exception $e) { 
    echo $e->getMessage(); 
} 
