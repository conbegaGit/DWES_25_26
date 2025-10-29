<?php
    function duplicarMal($a){
        $a = $a *2;
    }

    function duplicar($a){
        return $a *2;
    }

    function duplicar2(&$a){
        $a = $a *2;
    }

    $var1=5;
    duplicarMal($var1);
    echo "$var1 <bar>";

    $var1=duplicar($var1);
    echo "$var1 <bar>";

    duplicar2($var1);
    echo "$var1 <bar>";