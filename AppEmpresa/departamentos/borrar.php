<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $bd->prepare("DELETE FROM departamentos WHERE CodDept = :id");
    try {
        $stmt->execute([':id' => $id]);
        redirigir('listar.php', 'Departamento borrado correctamente.');
    } catch (PDOException $ex) {
        redirigir('listar.php', 'Error al borrar el departamento: ' . e($ex->getMessage()), 'error');
    }
} else {
    redirigir('listar.php', 'ID de departamento no especificado.', 'error');
}
