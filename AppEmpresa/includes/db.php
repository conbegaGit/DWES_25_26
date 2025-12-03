<?php
// includes/db.php
$host= "127.0.0.1";
$dbname= "empresa";
$user="root";
$pass=""; //en XAMPP por defecto vacio


try{
    $bd= new PDO("msql:host=$host;dbname= $dbname;charset=utf8mb4", $user,$pass);
    $bd-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("error de conexion:" . $e->getMessage());
}