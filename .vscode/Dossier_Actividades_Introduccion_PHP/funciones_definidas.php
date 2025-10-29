<?php 

function incrementar_copia($numero){ 

    $numero = 1; 

    echo($numero); 

} 

$contador=10; 

echo("incrementar copia: "); 

incrementar_copia($contador); 

echo($contador); 

echo ("<br>"); 

function incrementar_referencia (&$numero){ 

    $numero =1; 

} 

echo("incrementar referencia: "); 

$puntos =  5; 

incrementar_referencia($puntos); 

echo ($puntos); 

 