<?php

//Función que recibe una copia del parámetro
function incrementar_copia($numero) {
    $numero = $numero + 1;
    echo "Valor dentro de incrementar_copia: $numero<br>";
}

//Probando paso por valor
$contador = 10;
incrementar_copia($contador);
echo "Valor de \$contador después de la función: $contador<br><br>";


//Función que recibe el parámetro por referencia
function incrementar_referencia(&$numero) {
    $numero = $numero + 1;
    echo "Valor dentro de incrementar_referencia: $numero<br>";
}

//Probando paso por referencia
$puntos = 5;
incrementar_referencia($puntos);
echo "Valor de \$puntos después de la función: $puntos<br>";


