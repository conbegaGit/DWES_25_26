<?php 
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";

if (!is_admin()) {
    flash_set('No tienes permisos para acceder a esta página.');
    header("Location: ../index.php");
    exit;
}

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?")->execute([$id]);
   flash_set("Usuario borrado.");
}

header("Location: listar.php");
exit;   
?>
