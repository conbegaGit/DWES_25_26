<?php
session_start();

require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$sql = "SELECT e.*, d.Nombre AS DepartamentoNombre FROM empleados e LEFT JOIN departamentos d ON e.Departamento = d.CodDept ORDER BY e.CodEmple";

$stm = $bd->query($sql);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Empleados</h2>
