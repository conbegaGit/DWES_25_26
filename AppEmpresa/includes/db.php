<?php
//includes/db.php

$host = "127.0.0.1";
$bd = "empresa";
$user = "root";
$pass = ""; //en xampp por defecto vacío

try{
    $bd = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $user, $pass);
    $bd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error de conexión: " . $e->getMessage());
}