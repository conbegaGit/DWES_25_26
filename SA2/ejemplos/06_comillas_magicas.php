<?php
 
 $var = "Paco";
 echo "Hola $var <br>"; // comillas dobles 
 echo 'Hola $var <br>'; // comillas simples imprime $var
 echo "Hola" . $var;
 // Si queremos concatenar cadenas usamos 
 $onmbre= "Pau";
 $apellido = "Marti";
 echo $nombre . " ". $apellido ; // Pau Marti

$a = "Modulo";
$b = $a . "DWES"; // Ahora $b contiene "Modulo DWES" 
$a .= "DWES"; // ahora $a contiene "Modulo DWES" 

?>