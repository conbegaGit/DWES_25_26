<?php


function incrementar_copia($numero) {
    $numero++;
    echo "Dentro de incrementar_copia: $numero\n";
}

function incrementar_referencia(&$numero) {
    $numero++;
    echo "Dentro de incrementar_referencia: $numero\n";
}


$contador = 10;
echo "Valor inicial de contador: $contador\n";
incrementar_copia($contador);
echo "Valor de contador después de incrementar_copia: $contador\n";

echo "\n"; 
$puntos = 5;
echo "Valor inicial de puntos: $puntos\n";
incrementar_referencia($puntos);
echo "Valor de puntos después de incrementar_referencia: $puntos\n";

