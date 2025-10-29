<?php

function incrementar_copia($numero) {
    $numero++;
    echo "Dentro de incrementar_copia: $numero <br>";
}

$contador = 10;
incrementar_copia($contador);
echo "Después de llamar a incrementar_copia: $contador <br><br>";

function incrementar_referencia(&$numero) {
    $numero++;
    echo "Dentro de incrementar_referencia: $numero <br>";
}

$puntos = 5;
incrementar_referencia($puntos);
echo "Después de llamar a incrementar_referencia: $puntos <br>";

?>
