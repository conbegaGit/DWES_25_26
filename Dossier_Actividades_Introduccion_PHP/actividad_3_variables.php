<?php
$nombre = "Juan";
$edad = 0;
$email = null;
$lista = array();

echo "Resultados de las funciones de variables:<br><br>";

echo "\$nombre:<br>";
echo "isset(): " . (isset($nombre) ? 'true' : 'false') . "<br>";
echo "empty(): " . (empty($nombre) ? 'true' : 'false') . "<br>";
echo "is_null(): " . (is_null($nombre) ? 'true' : 'false') . "<br><br>";

echo "\$edad:<br>";
echo "isset(): " . (isset($edad) ? 'true' : 'false') . "<br>";
echo "empty(): " . (empty($edad) ? 'true' : 'false') . "<br>";
echo "is_null(): " . (is_null($edad) ? 'true' : 'false') . "<br><br>";

echo "\$saldo:<br>";
echo "isset(): " . (isset($saldo) ? 'true' : 'false') . "<br>";
echo "empty(): " . (empty($saldo) ? 'true' : 'false') . "<br>";
echo "is_null(): " . (isset($saldo) ? (is_null($saldo) ? 'true' : 'false') : 'no definida') . "<br><br>";

echo "\$email:<br>";
echo "isset(): " . (isset($email) ? 'true' : 'false') . "<br>";
echo "empty(): " . (empty($email) ? 'true' : 'false') . "<br>";
echo "is_null(): " . (is_null($email) ? 'true' : 'false') . "<br><br>";

echo "\$lista:<br>";
echo "isset(): " . (isset($lista) ? 'true' : 'false') . "<br>";
echo "empty(): " . (empty($lista) ? 'true' : 'false') . "<br>";
echo "is_null(): " . (is_null($lista) ? 'true' : 'false') . "<br><br>";