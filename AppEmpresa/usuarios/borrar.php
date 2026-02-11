<?php 
session_start();
define('BASE_PATH', '../');
require_once "../includes/db.php";
require_once "../includes/functions.php";

// Access control
if (!is_admin()) {
    flash_set("Acceso denegado. Solo administradores.");
    header("Location: " . BASE_PATH . "dashboard.php");
    exit();
}

$id = intval($_GET['id'] ?? 0);

if ($id) {
    // Prevent deleting oneself
    if ($id == $_SESSION['user']['Codigo']) {
        flash_set("No puedes borrar tu propio usuario.");
    } else {
        try {
            $stmt = $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?");
            $stmt->execute([$id]);
            flash_set("Usuario eliminado.");
        } catch (PDOException $e) {
            flash_set("Error al eliminar usuario: " . $e->getMessage());
        }
    }
}
header("Location: listar.php");
exit;
