<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();

require_once __DIR__ . "/../includes/header.php";

$nombre = $_GET['nombre'] ?? '';
$departamento = $_GET['departamento'] ?? '';

$sql = "SELECT d.*, e.Nombre AS DepartamentoNombre
        FROM empleados d
        LEFT JOIN departamentos e ON d.Departamento = e.CodDept
        WHERE 1=1";

$params = [];

if ($nombre !== '') {
    $sql .= " AND d.Nombre LIKE ?";
    $params[] = "%$nombre%";
}

if ($departamento !== '') {
    $sql .= " AND d.Departamento = ?";
    $params[] = $departamento;
}

$sql .= " ORDER BY d.CodEmple";

$stm = $bd->prepare($sql);
$stm->execute($params);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>Empleados</h2>
<div class="filtro">
    <form action="listar.php" method="GET">
        <label for="nombre" class="campo-busqueda">
            Nombre
            <div class="input-icono">
                <span class="icono">🔍</span>
                <input type="text" name="nombre" id="nombre" placeholder="Buscar empleado..." value="<?= e($_GET['nombre'] ?? '') ?>">
            </div>
        </label>
        <label for="departamento">Departamento
            <select name="departamento" id="departamento">
                <option value="">Todos</option>
                <?php 
                    $stm = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
                    $depts = $stm -> fetchALL(PDO::FETCH_ASSOC);
                    foreach($depts as $d): ?>
                <option value="<?= e($d['CodDept']) ?>" <?= isset($_GET['departamento']) && $_GET['departamento'] == $d['CodDept'] ? 'selected' : '' ?>><?= e($d['Nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit">Filtrar</button>
        <a href="listar.php" class="btn">Limpiar</a>
    </form>
</div>
<br>
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