<?php
$host = "127.0.0.1";
$dbname = "empresa";
$user = "root";
$pass = ""; // en XAMPP por defecto vacio

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}