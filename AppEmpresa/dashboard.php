<?php
require_once "includes/auth.php";
require_once "includes/db.php";
require_once "includes/functions.php";

verificarLogueado(); // cualquier usuario logueado

require_once "includes/header.php";

$tot_dept = $bd->query("SELECT COUNT(*) FROM departamentos")->fetchColumn();
$tot_emp = $bd->query("SELECT COUNT(*) FROM empleados")->fetchColumn();
;
$tot_user = $bd->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
;
?>
<h2>Panel principal</h2>
<div class="grid">
    <div class="card">Departamentos<span class="big"><?= e($tot_dept) ?></div>
    <div class="card">Empleados<span class="big"><?= e($tot_emp) ?></div>
    <div class="card">Usuarios<span class="big"><?= e($tot_user) ?></div>
</div>

<?php require_once "includes/footer.php"; ?>