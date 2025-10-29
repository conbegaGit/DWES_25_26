<?php 
    echo "Actividad_3 - variables. <br> <br>";
    
    $nombre = "Juan"; 
    $edad = 0; 
    $saldo; 
    $email = null; 
    $lista = array(); 

    echo "Aplicación para la variable ($ nombre) <br>"; 
    $nombreArray = array (isset($nombre), empty($nombre), is_null($nombre));
    print_r($nombreArray) . '<br>';
    /*echo isset($nombre) . "<br>"; 
    echo empty($nombre) . "<br>"; 
    echo is_null($nombre) . "<br>";*/

    echo "Aplicación para la variable ($ edad) <br>";
    $edadArray = array(isset($edad), empty($edad), is_null($edad));
    print_r($edadArray) . '<br>'; 
    /*echo isset($edad) . "<br>"; 
    echo empty($edad) . "<br>"; 
    echo is_null($edad) . "<br>";*/

    echo "Aplicación para la variable ($ saldo) <br>";
    $saldoArray = array (isset($saldo), empty($saldo), is_null($saldo));
    print_r($saldoArray) . '<br>';
    /*echo isset($saldo) . "<br>"; 
    echo empty($saldo) . "<br>"; 
    echo is_null($saldo) . "<br>";*/

    echo "Aplicación para la variable ($ email) <br>";
    $emailArray = array (isset($email), empty($email), is_null($email));
    print_r($emailArray) . '<br>';
    /*echo isset($email) . "<br>"; 
    echo empty($email) . "<br>"; 
    echo is_null($email) . "<br>";*/