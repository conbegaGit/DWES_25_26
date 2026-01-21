<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $bd->prepare("DELETE FROM empleados WHERE CodEmple = :id");
    try {
        $stmt->execute([':id' => $id]);
        redirigir('listar.php', 'Empleado borrado correctamente.');
    } catch (PDOException $ex) {
        redirigir('listar.php', 'Error al borrar empleado: ' . $ex->getMessage(), 'error');
    }
} else {
    redirigir('listar.php', 'ID de empleado no especificado.', 'error');
}