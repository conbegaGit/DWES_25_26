<?php
session_start();
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
if($id){
    $db->prepare("DELETE FROM empleados WHERE CodEmple = ?")->execute([$id]);
    flash_set("Departamento borrado");
}

header("Location: listar.php");
exit;