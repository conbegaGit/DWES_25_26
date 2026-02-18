<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_login();
require_once "../includes/header.php";

// Obtener parámetros de filtro desde GET (con valores por defecto vacíos)
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$departamento = isset($_GET['departamento']) ? trim($_GET['departamento']) : '';

// Construir la consulta SQL con filtros dinámicos
$query = "SELECT e.*, d.Nombre AS Departamento FROM empleados e LEFT JOIN departamentos d ON e.Departamento = d.CodDept";
$conditions = [];
$params = [];

if (!empty($search)) {
    // Buscar en Nombre, Apellido1 y Apellido2 (usando LIKE para coincidencias parciales)
    $conditions[] = "(e.Nombre LIKE :search OR e.Apellido1 LIKE :search OR e.Apellido2 LIKE :search)";
    $params[':search'] = '%' . $search . '%';
}

if (!empty($departamento)) {
    // Filtrar por departamento (exacto, basado en CodDept)
    $conditions[] = "e.Departamento = :departamento";
    $params[':departamento'] = $departamento;
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$query .= " ORDER BY e.CodEmple";

// Preparar y ejecutar la consulta
$stm = $db->prepare($query);
$stm->execute($params);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

// Obtener lista de departamentos para el select (para que el usuario pueda elegir)
$deptQuery = $db->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $deptQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Empleados</h2>


<form method="GET" action="" style="margin-bottom: 20px;">
    <div style="display: flex; gap: 20px; align-items: flex-end; flex-wrap: wrap;">
        
        <div>
            <label for="search">Nombre:</label>
            <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>" placeholder="Ej: Juanjo se">
        </div>
        <div>
            <label for="departamento">Filtrar por departamento:</label>
            <select name="departamento" id="departamento">
                <option value="">Todos</option>
                <?php foreach ($departamentos as $dept): ?>
                    <option value="<?= $dept['CodDept'] ?>" <?= $departamento == $dept['CodDept'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($dept['Nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Filtrar</button>
        <a href="?" style="text-decoration: none; color: blue; padding: 8px 12px; border: 1px solid #ccc; background: #f9f9f9;">Limpiar filtros</a>
    </div>
</form>

<a class="btn" href="crear.php">Nuevo empleado</a>
<table class="list">
    <thread><tr><th>ID</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Departamento</th></tr></thread>
<tbody>
    <?php foreach($rows as $r):?>
    <tr>
        <td><?= e($r['CodEmple'])?></td>
        <td><?= e($r['Nombre'])?></td>
        <td><?= e($r['Apellido1'])?></td>
        <td><?= e($r['Apellido2'])?></td>
        <td><?= e($r['Departamento'])?></td>
        <td>
            <a href="editar.php?id=<?= $r['CodEmple']?>">Editar</a>
            <a href="borrar.php?id=<?= $r['CodEmple']?>"onclick="return confirm('Borrar empleado?')">Borrar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>