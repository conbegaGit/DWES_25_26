<?php
try {
    $bd = new PDO("mysql:host=127.0.0.1;dbname=empresa;charset=utf8mb4", "root", "");
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ MySQL ESTÁ CONECTADO";
} catch (PDOException $e) {
    echo "❌ MySQL NO DISPONIBLE: " . $e->getMessage();
}
