<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

requireLogin(); // cualquier usuario logueado

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $bd->prepare("DELETE FROM departamentos WHERE CodDept = :id");
    try {
        $stmt->execute([':id' => $id]);
        redirect('listar.php', 'Departamento borrado correctamente.');
    } catch (PDOException $ex) {
        redirect('listar.php', 'Error al borrar el departamento: ' . e($ex->getMessage()), 'error');
    }
} else {
    redirect('listar.php', 'ID de departamento no especificado.', 'error');
}
