<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
require_admin();
require_once __DIR__ . "/../includes/header.php";

$stm = $bd->query("SELECT d.*, e.Nombre AS DepartamentoNombre FROM empleados d LEFT JOIN departamentos e ON d.Departamento = e.CodDept ORDER BY d.CodEmple");
$rows = $stm -> fetchALL(PDO::FETCH_ASSOC);
?>
<h2>Empleados</h2>
<a class="btn" href="crear.php">Nuevo empleado</a>
<table class="list">
    <thead><tr><th>ID</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th><th>Departamento</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['CodEmple']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Apellido1']) ?></td>
            <td><?= e($r['Apellido2']) ?></td>
            <td><?= e($r['DepartamentoNombre']) ?></td>
            <td>
                <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodEmple'] ?>"onclick="return confirm('Borrar empleado')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . "/../includes/footer.php"; ?>