<?php 
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
if ($id){
    try {
        $stmt = $bd->prepare("DELETE FROM empleados WHERE CodEmple = ?");
        $stmt->execute([$id]);
        flash_set("Empleado eliminado.");
    } catch (PDOException $e) {
        flash_set("Error al eliminar empleado: " . $e->getMessage());
    }
}
header("Location: listar.php");
exit;
