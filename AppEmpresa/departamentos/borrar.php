<?php 
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
//require_once "../includes/auth.php";

$id = intval($_GET['id'] ?? 0);
if ($id){
    $db->prepare("DELETE FROM departamentos WHERE CodDept = ?")->execute([$id]);

}
header("Location: listar.php");
exit;