<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=mi_db;charset=utf8",
        "usuario",
        "password"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
