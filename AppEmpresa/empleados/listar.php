<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

requireLogin(); // cualquier usuario logueado

require_once "../includes/header.php";

// Preparar filtros de búsqueda
$filtroNombre = $_GET['nombre'] ?? '';
$filtroDept = $_GET['departamento'] ?? '';

$sql = "SELECT e.*, d.Nombre AS DeptNombre FROM empleados e LEFT JOIN departamentos d ON e.Departamento = d.CodDept WHERE 1=1";
$params = [];

if (!empty($filtroNombre)) {
    $sql .= " AND e.Nombre LIKE ?";
    $params[] = "%" . $filtroNombre . "%";
}

if (!empty($filtroDept)) {
    $sql .= " AND e.Departamento = ?";
    $params[] = $filtroDept;
}

$sql .= " ORDER BY e.CodEmple";

$stm = $bd->prepare($sql);
$stm->execute($params);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

// Obtener departamentos para el desplegable
$deptStm = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $deptStm->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Empleados</h2>
<a class="btn" href="crear.php">Nuevo empleado</a>

<form method="get" style="margin: 20px 0; padding: 15px; background-color: #f5f5f5; border-radius: 4px;">
    <div style="display: flex; gap: 20px; align-items: flex-end;">
        <div style="flex: 1;">
            <label for="nombre" style="display: block; margin-bottom: 5px;">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($filtroNombre) ?>" placeholder="Buscar por nombre..." style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
        </div>
        <div style="flex: 1;">
            <label for="departamento" style="display: block; margin-bottom: 5px;">Departamento:</label>
            <select id="departamento" name="departamento" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                <option value="">-- Todos --</option>
                <?php foreach ($departamentos as $dept): ?>
                    <option value="<?= $dept['CodDept'] ?>" <?= $filtroDept == $dept['CodDept'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dept['Nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn" style="height: 38px; padding: 8px 20px;">Buscar</button>
        <a href="listar.php" class="btn" style="height: 38px; padding: 8px 20px; text-decoration: none; display: flex; align-items: center;">Limpiar</a>
    </div>
</form>

<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $r):
            ?>
            <tr>
                <td><?= e($r['CodEmple']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td><?= e($r['Apellido1'] . ' ' . $r['Apellido2']) ?></td>
                <td><?= e($r['DeptNombre']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                    <a href="borrar.php?id=<?= $r['CodEmple'] ?>"
                        onclick="return confirm('¿Deseas borrar este empleado?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>