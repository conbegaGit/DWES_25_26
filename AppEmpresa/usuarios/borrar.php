<?php
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

verificarLogueado(); // cualquier usuario logueado

verificarAdmin();

$id = $_GET['id'] ?? null;

if ($id) {
    // Prevent self-deletion
    $stmt = $bd->prepare("SELECT Nombre FROM usuarios WHERE Codigo = :id");
    $stmt->execute([':id' => $id]);
    $userToDelete = $stmt->fetchColumn();

    if ($userToDelete === $_SESSION['user']['Nombre']) {
        redirect('listar.php', 'No puedes borrar tu propio usuario.', 'error');
    } else {
        $stmt = $bd->prepare("DELETE FROM usuarios WHERE Codigo = :id");
        try {
            $stmt->execute([':id' => $id]);
            redirect('listar.php', 'Usuario borrado correctamente.');
        } catch (PDOException $ex) {
            redirect('listar.php', 'Error al borrar usuario: ' . e($ex->getMessage()), 'error');
        }
    }
} else {
    redirect('listar.php', 'ID de usuario no especificado.', 'error');
}