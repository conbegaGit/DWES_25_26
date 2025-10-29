<?php
function incrementar_copia($numero) {
    $numero++;
    echo "Incrementasion $numero<br>";
}

$contador = 10;
echo "Antes contador $contador<br>";
incrementar_copia($contador);
echo "Después  contador $contador<br><br>";

function incrementar_referencia(&$numero) {
    $numero++;
    echo "Incrementasion $numero<br>";
}

$puntos = 5;
echo "Antes puntos $puntos<br>";
incrementar_referencia($puntos);
echo "Después puntos $puntos<br>";