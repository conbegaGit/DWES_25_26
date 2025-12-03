<?php

$nombre = "Juan";
$edad = 0;
$saldo;
$email = null;
$lista = array();


echo "isset: <br> <br>";
echo "isset(): " . (isset($nombre) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (isset($edad) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (isset($saldo) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (isset($email) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (isset($lista) ? 'true'
: 'false') . "<br>" . "<br>";

echo "empty: <br> <br>";
echo "isset(): " . (empty($nombre) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (empty($edad) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (empty($saldo) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (empty($email) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (empty($lista) ? 'true'
: 'false') . "<br>" . "<br>";

echo "is_null: <br> <br>";
echo "isset(): " . (is_null($nombre) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (is_null($edad) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (is_null($saldo) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (is_null($email) ? 'true'
: 'false') . "<br>";
echo "isset(): " . (is_null($lista) ? 'true'
: 'false') . "<br>" . "<br>";
