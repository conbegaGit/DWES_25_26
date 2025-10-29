<?php
function dividir($numerador, $denominador) {
    if ($denominador == 0) {
        throw new Exception("Error: División por cero no permitida.");
    }

    return $numerador / $denominador;
}

try {
    echo "Resultado " . dividir(10, 2) . "<br>";

    echo "Resultado " . dividir(5, 0) . "<br>";
}
catch (Exception $e) {
    echo "Excepción capturada: " . $e->getMessage();
}
