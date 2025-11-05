<?php  

$nombre = "Juan";  

$edad = 0;  

$email = null;  

$lista = array();  

  

 

echo "Aplicación para la variable ($ nombre) <br>"; 
echo "isset(): " . (isset($nombre) ? 'true'  : 'false') . "<br>";  
echo "empty(): " . (empty($nombre) ? 'true'  : 'false') . "<br>";  
echo "is_null(): " . (is_null($nombre) ?  'true' : 'false') . "<br><br>";  

  

 

echo "Aplicación para la variable ($ edad) <br>";  
echo "isset(): " . (isset($edad) ? 'true' :  'false') . "<br>";  
echo "empty(): " . (empty($edad) ? 'true' :  'false') . "<br>";  
echo "is_null(): " . (is_null($edad) ?  'true' : 'false') . "<br><br>";  

  

echo "Aplicación para la variable ($ saldo) <br>";  
echo "isset(): " . (isset($saldo) ? 'true' :  'false') . "<br>";  
echo "empty(): " . (empty($saldo) ? 'true' :  'false') . "<br>";  
echo "is_null(): " . (isset($saldo) ?  (is_null($saldo) ? 'true' : 'false') : 'no  definida') . "<br><br>";  

  

echo "Aplicación para la variable ($ email) <br>";  
echo "isset(): " . (isset($email) ? 'true' :  'false') . "<br>";  
echo "empty(): " . (empty($email) ? 'true' :  'false') . "<br>";  
echo "is_null(): " . (is_null($email) ?  'true' : 'false') . "<br><br>";  

  

echo "Aplicación para la variable ($ lista) <br>";  
echo "isset(): " . (isset($lista) ? 'true' :  'false') . "<br>";  
echo "empty(): " . (empty($lista) ? 'true' :  'false') . "<br>";  
echo "is_null(): " . (is_null($lista) ?  'true' : 'false') . "<br><br>"; 