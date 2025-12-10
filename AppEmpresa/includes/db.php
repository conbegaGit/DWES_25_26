<?php

// Para usarlo hacemos "include 'includes/db.php'"
$host = "127.0.0.1";
$dbname = "empresa";
$user = "root";
$pass = ""; // XAMPP por defecto trae la contraseña vacía

try {
    $bd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión") . $e->getMessage();
}