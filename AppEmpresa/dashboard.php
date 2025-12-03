<?php

session_start();
require_once "includes/auth.php";
require_once "includes/db.php";
require_once "includes/functions.php";
require_once "includes/header.php";

$tot_dept = $db->query("SELECT COUNT(*) FROM departamentos") ->fetchColum();
$tot_emp = $db->query("SELECT COUNT(*) FROM empleados") ->fetchColum();
$tot_user = $db->query("SELECT COUNT(* FROM usuarios)") ->fetchColum();

?>
<h2> Panel principal </h2>

<div class="grid">
    <div class="card">Departamentos <span class="big"><?= e($tot_dept) ?></span></div>
    <div class="card">Empleados<span class="big"><?= e($tot_emp) ?></span></div>
    <div class="card">Usuarios<span class="big"><?= e($tot_user) ?></span></div>
</div>

<?php require_once "includes/footer.php";?>