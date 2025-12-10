<?php
//includes/db.php

$host = "127.0.0.1";
$bd = "empresa";
$user = "root";
$pass = ""; //en xampp por defecto vacío

try{
    $db = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $user, $pass);
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Error de conexión: " . $e->getMessage());
}