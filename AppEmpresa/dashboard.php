<?php

session_start();
require_once __DIR__ . "/includes/auth.php";
require_once __DIR__ . "/includes/db.php";
require_once __DIR__ . "/includes/functions.php";

requiere_login();


require_once "../AppEmpresa/includes/header.php";


$tot_dept = $bd->query("SELECT COUNT(*) FROM departamentos")->fetchColumn();
$tot_emp = $bd->query("SELECT COUNT(*) FROM empleados")->fetchColumn();
$tot_user = $bd->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
?>
<div class="Titulo_Panel_principal">
    <h2>Panel principal</h2>
</div>
<div class="grid">
    <div class="card">Departamentos <span class="big"><?= e($tot_dept) ?></span></div>
    <div class="card">Empleados <span class="big"><?= e($tot_emp) ?></span></div>   
    <div class="card">Usuarios <span class="big"><?= e($tot_user) ?></span></div>
</div>

<?php require_once "../AppEmpresa/includes/footer.php"; ?>