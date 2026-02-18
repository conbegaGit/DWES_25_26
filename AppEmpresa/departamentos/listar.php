<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
require_once __DIR__ . "/../includes/header.php";

$stm = $bd->query("SELECT d.*, e.Nombre AS JefeNombre FROM departamentos d LEFT JOIN empleados e ON d.Jefe = e.CodEmple ORDER BY d.CodDept");
$rows = $stm -> fetchALL(PDO::FETCH_ASSOC);
?>
<h2>Departamentos</h2>
<?php if ($_SESSION['user']['Rol'] == 1): ?>
<a class="btn" href="crear.php">Nuevo departamento</a>
<?php endif; ?>
<table class="list">
    <thead><tr><th>ID</th><th>Nombre</th><th>Jefe</th><th>Ciudad</th><th>Presupuesto</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['CodDept']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['JefeNombre']) ?></td>
            <td><?= e($r['Ciudad']) ?></td>
            <td><?= e($r['Presupuesto']) ?></td>
            <td>
                <?php if ($_SESSION['user']['Rol'] == 1): ?>
                <a href="editar.php?id=<?= $r['CodDept'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodDept'] ?>"onclick="return confirm('Borrar departamento')">Borrar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . "/../includes/footer.php"; ?>