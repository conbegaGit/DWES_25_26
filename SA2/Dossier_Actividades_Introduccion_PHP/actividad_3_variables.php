<?php 
    echo "Actividad_3 - variables. <br> <br>";
    
    $nombre = "Juan"; 
    $edad = 0; 
    $saldo; 
    $email = null; 
    $lista = array(); 

    echo "Aplicación para la variable ($ nombre) <br>"; 
    var_dump([
        'isset'=> isset($nombre),
        'empty' => empty($nombre),
        'is_null' => is_null($nombre)
    ]);
    echo '<br>';

    echo "Aplicación para la variable ($ edad) <br>";
    var_dump([
        'isset'=> isset($edad),
        'empty' => empty($edad),
        'is_null' => is_null($edad)
    ]);
    echo '<br>';

    echo "Aplicación para la variable ($ saldo) <br>";
    var_dump([
        'isset'=> isset($saldo),
        'empty' => empty($saldo),
        'is_null' => "No está definido"
    ]);
    echo '<br>';

    echo "Aplicación para la variable ($ email) <br>";
    var_dump([
        'isset'=> isset($email),
        'empty' => empty($email),
        'is_null' => is_null($email)
    ]);