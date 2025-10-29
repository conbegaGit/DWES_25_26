<?php

// Función que maneja división con control de errores
function dividir($numerador, $denominador) {
    if ($denominador == 0) {
        throw new Exception("Error: División por cero no permitida.");
    }
    return $numerador / $denominador;
}

// Manejo de excepciones con try...catch
try {
    // Caso válido
    echo "Resultado de dividir(10, 2): " . dividir(10, 2) . "<br>";

    // Caso inválido -> lanzará excepción
    echo "Resultado de dividir(5, 0): " . dividir(5, 0) . "<br>";

} catch (Exception $e) {
    // Captura y muestra el mensaje del error
    echo "Se produjo una excepción: " . $e->getMessage();
}


