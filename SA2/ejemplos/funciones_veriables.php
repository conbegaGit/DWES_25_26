<?php
    $var1 = 4;
    $var2 = NULL;
    $var3 = FALSE;
    $var4 = 0;
    
    echo "var 1 <br>";
    echo "<br>";

    var_dump(isset($var1));
    echo "<br>";
    var_dump(is_null($var1));
    echo "<br>";
    var_dump(empty($var1));

    echo "<br><br>";
    echo "var 2 <br>";
    echo "<br>";

    var_dump(isset($var2));
    echo "<br>";
    var_dump(is_null($var2));
    echo "<br>";
    var_dump(empty($var2));

    echo "<br><br>";
    echo "var 3 <br>";
    echo "<br>";

    var_dump(isset($var3));
    echo "<br>";
    var_dump(is_null($var3));
    echo "<br>";
    var_dump(empty($var3));

    echo "<br><br>";
    echo "var 4 <br>";
    echo "<br>";

    var_dump(isset($var4));
    echo "<br>";
    var_dump(is_null($var4));
    echo "<br>";
    var_dump(empty($var4));

?>