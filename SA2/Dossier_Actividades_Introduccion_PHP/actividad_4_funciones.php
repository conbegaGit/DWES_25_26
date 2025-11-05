<?php  

function incrementar_copia($numero) {  
    $numero++;  
    echo " Funcion incrementar_copia: $numero <br>";  
}  
 

$contador = 10;  

echo "Valor del contador: $contador <br>";  
incrementar_copia($contador);  
echo "Después de llamar a la función (copia): $contador<br><br>";  


function incrementar_referencia(&$numero) {  
    $numero++;  
    echo "Dentro de la función (referencia): $numero<br>";  
}  


$puntos = 5;  
echo "Valor original de puntos:  
$puntos<br>";  
incrementar_referencia($puntos);  
echo "Después de llamar a la función (referencia): $puntos<br>"; 