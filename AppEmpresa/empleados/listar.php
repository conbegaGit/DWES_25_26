<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stm = $db->query("SELECT e.*, d.Nombre AS Departamento FROM empleados e LEFT JOIN departamentos d ON e.Departamento = d.CodDept ORDER BY e.CodEmple");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Empleados</h2>
<a class="btn" href="crear.php">Nuevo empleado</a>
<table class="list">
    <thead><tr><th>ID</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Departamento</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= e($r['CodEmple']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td><?= e($r['Apellido1']) ?></td>
                <td><?= e($r['Apellido2']) ?></td>
                <td><?= e($r['Departamento']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                    <a href="borrar.php?id=<?= $r['CodEmple'] ?>" onclick="return confirm('Borrar empleado')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "../includes/footer.php"; ?>