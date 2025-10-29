<?php
/*
Antes de ejecutar, vamos a configurar el php.ini para que podamos ver los mensajes de error.
1. Abrir el fichero php.ini
2. Buscar la variable display_errors y ponerla a ON
3. Buscar la variable error_reporting para ver en que modo está
*/

    $varl = 100;
    $var3 = 100 + $var2;//$var2 no existe, se toma como O
    echo "$var3 <br>"; // muestra 100
    $var3 = 100 * $var2; // $var2 no existe, se toma como O 
    echo "$var3 <br>"; // muestra O

?>