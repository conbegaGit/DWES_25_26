<?php
    $varl = 100;
    $var3 = 100+ $var2; //$var2 no existe, se toma como O
    echo "$var3 <br>"; // muestra 100
    $var3 = 100 * $var2; // $var2 no existe, se toma como O
    echo "$var3 <br>"; // muestra O
?>