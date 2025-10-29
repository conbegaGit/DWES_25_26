<?php
function incrementar_copia($numero) {
    $numero++;
    echo "Valor dentro de la función (copia): $numero<br>";
}

echo "Valor antes de la función: $contador<br>";
incrementar_copia($contador);
echo "Valor después de la función: $contador<br>";

function incrementar_referencia(&$numero) {
    $numero++;
    echo "Valor dentro de la función (referencia): $numero<br>";
}

echo "Valor antes de la función: $puntos<br>";
incrementar_referencia($puntos);
echo "Valor después de la función: $puntos<br>";