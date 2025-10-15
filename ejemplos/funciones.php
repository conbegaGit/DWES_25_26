<?php
$varl = 4;
$var2 = NULL;
$var3 = FALSE;
$var4 = 0;
echo "var 1";
var_dump(isset($varl)); // TRUE
var_dump(is_null($varl)); // FALSE
var_dump(empty($varl)); // FALSE
echo "var 2";
var_dump(isset($var2)); // FALSE
var_dump(is_null($var2)); // TRUE
var_dump(empty($var2)); // TRUE
echo "var 3";
var_dump(isset($var3)); // TRUE
var_dump(is_null($var3)); // FALSE
var_dump(empty($var3)); // TRUE
echo "var 4"; 