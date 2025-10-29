<?php
$nombre = "Juan";
$edad = 0;
$saldo; 
$email = null;
$lista = array();
echo "Información de variables:<br><br>";
echo "\$nombre = \"$nombre\"<br>";
echo "Resultados: ";
var_dump([
    'isset' => isset($nombre),
    'is_null' => is_null($nombre),
    'empty' => empty($nombre)
]);
echo "<br><br>";
echo "\$edad = $edad<br>";
echo "Resultados: ";
var_dump([
    'isset' => isset($edad),
    'is_null' => is_null($edad),
    'empty' => empty($edad)
]);
echo "<br><br>";
echo "\$saldo (no definida)<br>";
echo "Resultados: ";
var_dump([
    'isset' => isset($saldo),
    'is_null' => is_null(@$saldo), 
    'empty' => empty($saldo)
]);
echo "<br><br>";
echo "\$email = null<br>";
echo "Resultados: ";
var_dump([
    'isset' => isset($email),
    'is_null' => is_null($email),
    'empty' => empty($email)
]);
echo "<br><br>";
echo "\$lista = array()<br>";
echo "Resultados: ";
var_dump([
    'isset' => isset($lista),
    'is_null' => is_null($lista),
    'empty' => empty($lista)
]);
echo "<br><br>";
