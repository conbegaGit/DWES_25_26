<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

verificarLogueado(); // cualquier usuario logueado
verificarAdmin();

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $bd->prepare("DELETE FROM empleados WHERE CodEmple = :id");
    try {
        $stmt->execute([':id' => $id]);
        redirect('listar.php', 'Empleado borrado correctamente.');
    } catch (PDOException $ex) {
        redirect('listar.php', 'Error al borrar empleado: ' . $ex->getMessage(), 'error');
    }
} else {
    redirect('listar.php', 'ID de empleado no especificado.', 'error');
}