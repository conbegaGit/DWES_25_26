<?php
$host = "127.0.0.1";      
$dbname = "empresa";      
$pass = "";               
$user = "root";              

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
