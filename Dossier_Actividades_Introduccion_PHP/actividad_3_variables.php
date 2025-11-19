<?php

$nombre = "Juan";
$edad = 0;
$saldo;
$email = null;
$lista = array();

var_dump(isset($nombre));
var_dump(isset($edad));
var_dump(isset($saldo));
var_dump(isset($email));
var_dump(isset($lista));

var_dump(empty($nombre));
var_dump(empty($edad));
var_dump(empty($saldo));
var_dump(empty($email));
var_dump(empty($lista));

var_dump(is_null($nombre));
var_dump(is_null($edad));
var_dump(is_null($saldo));
var_dump(is_null($email));
var_dump(is_null($lista));