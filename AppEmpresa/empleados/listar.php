<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

/* Consulta con nombre del departamento */
$sql = "
    SELECT e.CodEmple, e.Nombre, e.Apellido1, e.Apellido2, d.Nombre AS DepartamentoNombre
    FROM empleados e
    LEFT JOIN departamentos d ON e.Departamento = d.CodDept
    ORDER BY e.CodEmple
";

$stm = $bd->query($sql);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/../includes/header.php";
?>

<h2>Empleados</h2>
<a class="btn" href="crear.php">Nuevo empleado</a>

<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido 1</th>
            <th>Apellido 2</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $r): ?>
        <tr>
            <td><?= e($r['CodEmple']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Apellido1']) ?></td>
            <td><?= e($r['Apellido2']) ?></td>
            <td><?= e($r['DepartamentoNombre'] ?? 'Sin departamento') ?></td>
            <td>
                <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodEmple'] ?>"
                   onclick="return confirm('¿Borrar empleado?')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>