<?php 
function dividir($numerador, $denominador) {
    if ($denominador == 0) {
        throw new Exception("Error: División por cero no permitida.");
    }
    return $numerador / $denominador;
}

try {
    $resultado_valido = dividir(10, 2);
    echo "Resultado de la división válida: $resultado_valido<br>";
    
    $resultado_invalido = dividir(5, 0);
    echo "Resultado de la división inválida: $resultado_invalido<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}
