<?php
    echo PHP_INT_SIZE. '<br>';
    echo PHP_INT_MIN. '<br>';
    echo PHP_INT_MAX. '<br>';
    $a = 0b100; //en binario
    $a = 0100; // octal
    $a = 0x100; // hexadecimal 
    $a = 3/2; //La division entre enteros no da problemas
    echo $a. '<br>'; //1.5
    $b = 7.5; 
    $a = (int) $b; //casting a int
    echo $a. '<br>';
    $b = 7e2;
    $b = 7E2; 
