<?php

session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../AppEmpresa/includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stmt = $bd->query("SELECT d.*, e.Nombre AS JefeNombre FROM departamentos d  LEFT JOIN empleados e ON d.Jefe = e.CodEmple ORDER BY d.CodDept");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Departamentos</h2>
<a class ="btn" href="crear.php"> Nuevo departamento </a>
<table class="list">
    <thead><tr><th>ID</th><th>Nombre</th><th>Jefe</th><th>Ciudad</th><th>Presupuesto</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= e($r['CodDept']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td><?= e($r['JefeNombre'] ?? '-') ?></td>
                <td><?= e($r['Ciudad']) ?></td>
                <td><?= e($r['Presupuesto']) ?></td>
                <td>
                    <a href="editar.php?id=<?= e($r['CodDept']) ?>">Editar</a>
                    <a href="borrar.php?id=<?= e($r['CodDept']) ?>" onclick="return confirm('Borrar departamento?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
<?php require_once "../includes/footer.php"; ?>