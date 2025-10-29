<?php 

function dividir($numerador, $denominador) { 

    if ($denominador ==0){ 

        echo("Error: División por cero no permitida."); 

    } 

    return $numerador/ $denominador; 

} 

 



    $first = dividir(10,2); 

    echo ($first); 

    echo("<br>"); 

    $second = dividir(5,0); 

    echo ($second); 

 


 