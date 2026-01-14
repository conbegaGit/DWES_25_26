<?php

session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../AppEmpresa/includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stmt = $bd->query("SELECT e.*, d.Nombre AS DepartamentoNombre FROM empleados e LEFT JOIN departamentos d ON e.Departamento = d.CodDept ORDER BY e.CodEmple");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Empleados</h2>
<a class ="btn" href="crear.php"> Nuevo empleado </a>
<table class="list">
    <thead><tr><th>ID</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Departamento</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= e($r['CodEmple']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td><?= e($r['Apellido1'] ?? '-') ?></td>
                <td><?= e($r['Apellido2']) ?></td>
                <td><?= e($r['DepartamentoNombre']) ?></td>
                <td>
                    <a href="editar.php?id=<?= e($r['CodEmple']) ?>">Editar</a>
                    <a href="borrar.php?id=<?= e($r['CodEmple']) ?>" onclick="return confirm('Borrar empleado?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
<?php require_once "../includes/footer.php"; ?>