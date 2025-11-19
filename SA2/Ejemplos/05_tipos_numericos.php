<?php

echo PHP_INT_SIZE . "<br>";
echo PHP_INT_MIN . "<br>";
echo PHP_INT_MAX . "<br>";
$a = 0b100; // En binario
$a = 0100; // Octal
$a = 0x100; // Hexadecimal
$a = 3/2; // La división entre enteros no da problemas
echo $a."<br>"; // 1.5
$b = 7.5;
$a = (int) $b; // Casting a int
echo $a."<br>"; // 7, se trunca
$b = 7e2; // Notación científica
$b = 7E2;
?>