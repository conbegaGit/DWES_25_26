<?php
session_start();

require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$stm = $bd->query("SELECT d.*, e.Nombre AS JefeNombre FROM departamentos d LEFT JOIN empleados e ON d.Jefe = e.CodEmple ORDER BY d.CodDept");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Departamentos</h2>
<a class="btn" href="crear.php">Nuevo departamento</a>
<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Jefe</th>
            <th>Ciudades</th>
            <th>Presupuesto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $r): ?>
        <tr>
            <td><?= e($r['CodDept']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['JefeNombre']) ?></td>
            <td><?= e($r['Ciudad']) ?></td>
            <td><?= e($r['Presupuesto']) ?></td>
            <td>
                <a href="editar.php?id=<?= $r['CodDept'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodDept'] ?>" onclick="return confirm('Borrar departamento?')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
