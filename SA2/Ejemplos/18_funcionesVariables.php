<?php
    $var1 = 4;
    $var2 = NULL;
    $var3 = FALSE;
    $var4 = 0;
    echo "var 1 <br>";
    var_dump(isset($var1)); //TRUE
    var_dump(is_null($var1)); //FALSE
    var_dump(empty($var1)); //FALSE

    echo "<br> var 2 <br>";
    var_dump(isset($var2)); //FALSE
    var_dump(is_null($var2)); //TRUE
    var_dump(empty($var2)); //TRUE

    echo "<br> var 3 <br>";
    var_dump(isset($var3)); //TRUE
    var_dump(is_null($var3)); //FALSE
    var_dump(empty($var3)); //TRUE

    echo "<br> var 4 <br>";
    var_dump(isset($var4)); //TRUE
    var_dump(is_null($var4)); //FALSE
    var_dump(empty($var4)); //TRUE
?>