<?php

session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stm = $bd->query("SELECT d.*, e.Nombre AS JefeNombre 
                   FROM departamentos d 
                   LEFT JOIN empleados e ON d.Jefe = e.CodEmple 
                   ORDER BY d.CodDept");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Departamentos</h2>
<a class="btn" href="departamentos/crear.php">Nuevo departamento</a>
<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Jefe</th>
            <th>Ciudad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $r): ?>
        <tr>
            <td><?= e($row['CodDept']) ?></td>
            <td><?= e($row['Nombre']) ?></td>
            <td><?= e($row['JefeNombre'] ?? 'Sin jefe') ?></td>
            <td><?= e($row['Ciudad']) ?></td>
            <td><?= e($row['Presupuesto']) ?></td>
            <td>
                <a href="departamentos/editar.php?cod=<?= urlencode($row['CodDept']) ?>">Editar</a>
                <a href="departamentos/eliminar.php?cod=<?= urlencode($row['CodDept']) ?>" onclick="return confirm('¿Está seguro de que desea eliminar este departamento?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "../includes/footer.php"; ?>