<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_login();
require_admin();

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = $bd->prepare("DELETE FROM usuarios WHERE Codigo = ?")->execute([$id]);
    flash_set("Usuario borrado");
}
redirect("/AppEmpresa/usuarios/listar.php");