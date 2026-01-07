<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
//require_once "../includes/funciones.php";

$id = intval($_GET['id'] ?? 0);
if ($id) {
    $bd->prepare("DELETE FROM departamentos WHERE CodDept = ?")->execute([$id]);
    //flash_set("Departamento borrado con éxito.");
}
header("Location: listar.php");
exit;