<?php 

$nombre = "Juan";  

$edad = 0;  

$saldo;  

$email = null;  

 

$tabla_nombre = [ 

     

        "valor" => $nombre, 

        "isset" => isset($nombre), 

        "empty" => empty($nombre), 

        "is_null" => is_null($nombre) 

]; 

$tabla_edad = [ 

    "valor" => $edad, 

    "isset" => isset($edad), 

    "empty" => empty($edad), 

        "is_null" => is_null($edad) 

]; 

 

$tabla_saldo = [ 

    "valor" => $saldo ? $saldo: "no anda definido", 

    "isset" => isset($saldo), 

    "empty" => empty($saldo), 

        "is_null" => is_null($saldo) 

]; 

    $tabla_email = [ 

    "valor" => $email, 

    "isset" => isset($email), 

    "empty" => empty($email), 

        "is_null" => is_null($email) 

]; 

 

 

echo "<br>"; 

echo ("nombre: "); 

print_r( $tabla_nombre); 

echo "<br>"; 

echo "<br>"; 

echo ("edad: "); 

print_r($tabla_edad); 

echo "<br>"; 

echo ("saldo: "); 

print_r($tabla_saldo); 

echo "<br>"; 

echo ("email: "); 

print_r($tabla_email); 

echo "<br>"; 

 

?> 

 