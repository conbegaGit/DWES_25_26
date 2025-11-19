<?php

$var1 = 4;
$var2 = null;
$var3 = false;
$var4 = 0;

echo "var 1 <br>";

var_dump(isset($var1));
var_dump(is_null($var1));
var_dump(empty($var1));

echo "<br> var 2 <br>";

var_dump(isset($var2));
var_dump(is_null($var2));
var_dump(empty($var2));

echo "<br> var 3 <br>";

var_dump(isset($var3));
var_dump(is_null($var3));
var_dump(empty($var3));

echo "<br> var 4 <br>";

var_dump(isset($var4));
var_dump(is_null($var4));
var_dump(empty($var4));

echo "<br> unset <br>";
unset($var1);
var_dump(isset($var1));