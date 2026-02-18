<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
/* =========================
   RECUPERAR FILTROS (GET)
========================= */
$nombre = $_GET['nombre'] ?? '';
$departamento = $_GET['departamento'] ?? '';
$where = [];
$params = [];
if (!empty($nombre)) {
    $where[] = "e.Nombre LIKE :nombre";
    $params[':nombre'] = "%$nombre%";
}
if (!empty($departamento)) {
    $where[] = "e.Departamento = :departamento";
    $params[':departamento'] = $departamento;
}
$whereSql = "";
if ($where) {
    $whereSql = "WHERE " . implode(" AND ", $where);
}
/* =========================
   CONSULTA EMPLEADOS
========================= */
$sql = "
    SELECT e.CodEmple, e.Nombre, e.Apellido1, e.Apellido2,
           d.Nombre AS DepartamentoNombre
    FROM empleados e
    LEFT JOIN departamentos d ON e.Departamento = d.CodDept
    $whereSql
    ORDER BY e.CodEmple
";

$stm = $bd->prepare($sql);
$stm->execute($params);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
/* =========================
   CONSULTA DEPARTAMENTOS
========================= */
$deptStm = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $deptStm->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/../includes/header.php";
?>
<h2>Empleados</h2>
<!-- BUSCADOR -->
<form method="GET" style="margin-bottom:15px; display:flex; gap:10px; align-items:center;">
    <input type="text"
        name="nombre"
        placeholder="Buscar por nombre"
        value="<?= e($nombre) ?>"
        style="width:200px; padding:6px;">

    <select name="departamento"
        style="width:200px; padding:6px;">
        <option value="">-- Todos los departamentos --</option>
        <?php foreach ($departamentos as $d): ?>
            <option value="<?= $d['CodDept'] ?>"
                <?= ($departamento == $d['CodDept']) ? 'selected' : '' ?>>
                <?= e($d['Nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" style="padding:6px 12px;">
        Buscar
    </button>
</form>
<a class="btn" href="crear.php">Nuevo empleado</a>
<!-- TABLA -->
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
        <?php if ($rows): ?>
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
        <?php else: ?>
            <tr>
                <td colspan="6">No se encontraron empleados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>