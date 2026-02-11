<?php
session_start();

require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_admin();
$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?");
    $stmt->execute([$id]);
    flash_set("Usuario borrado");
}

header("Location: listar.php");
exit;