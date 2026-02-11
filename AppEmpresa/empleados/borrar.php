<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_login();

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = $bd->prepare("DELETE FROM empleados WHERE CodEmple = ?")->execute([$id]);
    flash_set("Empleado borrado");
}
redirect("listar.php");
