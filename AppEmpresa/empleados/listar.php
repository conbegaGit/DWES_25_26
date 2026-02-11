<?php
    session_start();
    require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";
    require_login();
    require_once "../includes/header.php";


    $stm = $bd->query("SELECT e.*, d.Nombre AS DeptNombre FROM empleados e LEFT JOIN departamentos d ON e.departamento = d.CodDept ORDER BY e.CodEmple");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Empleados</h2>
<a class="btn" href="crear.php">Nuevo empleado</a>
<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Nombre departamento</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['CodEmple']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Apellido1'] ?? '-') ?></td>
            <td><?= e($r['Apellido2'] ?? '-') ?></td>
            <td><?= e($r['DeptNombre'] ?? '-') ?></td>
            <td>
                <a href="editar.php?id=<?= e($r['CodEmple']) ?>">Editar</a>
                <a href="borrar.php?id=<?= e($r['CodEmple']) ?> " onclick="return confirm('¿Seguro que desea borrar este empleado?');">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>