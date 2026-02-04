<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

require_admin();

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?")->execute([$id]);
   flash_set("Usuario borrado.");
}

header("Location: listar.php");
exit;   
?>
