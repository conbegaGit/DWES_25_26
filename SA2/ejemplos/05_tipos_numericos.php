<?php
echo PHP_INT_SIZE . "<br>";
echo PHP_INT_MAX . "<br>";
echo PHP_INT_MIN . "<br>";
$a = 0B1001; // en binario
$b = 0x1A; // en hexadecimal
$c = 0123; // en octal
$a = 3/2; // la división de enteros no da problemas
echo $a . "<br>"; // imprime 1.5
$b = 7.5;
$a = (int) $b; // casting a entero
echo $a . "<br>"; // 7, se trunca
$b = 7e2; // notación científica
$b = 7E2; // también vale E mayúscula
