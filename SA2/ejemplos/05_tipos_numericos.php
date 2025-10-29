<?php
    echo PHP_INT_SIZE . '<br>';
    echo PHP_INT_MIN . '<br>';
    echo PHP_INT_MAX . '<br>';
    $a = 0b100; // BIN
    $a = 0100; // OCT
    $a = 0x100; //HEX
    $a = 3/2; // DIV
    echo $a. '<br>'; // 1.5
    $b = 7.5;
    $a = (int) $b; // CASTING A INT
    echo $a. '<br>'; // 7, SE TRUNCA
    $b = 7e2; // NOT. CIEN.
    $b = 7E2;
?>