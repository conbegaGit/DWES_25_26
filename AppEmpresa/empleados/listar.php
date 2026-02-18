<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();

require_once __DIR__ . "/../includes/header.php";

$nombre = $_GET['nombre'] ?? '';
$departamento = $_GET['departamento'] ?? '';


// PAGINACIÓN
$por_pagina = 5; //Numero de paginaciones
$pagina = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($pagina - 1) * $por_pagina;


// TOTAL DE REGISTROS FILTRADOS
$sql_count = "SELECT COUNT(*) 
              FROM empleados d
              WHERE 1=1";

$params_count = [];

if ($nombre !== '') {
    $sql_count .= " AND d.Nombre LIKE ?";
    $params_count[] = "%$nombre%";
}

if ($departamento !== '') {
    $sql_count .= " AND d.Departamento = ?";
    $params_count[] = $departamento;
}

$stm = $bd->prepare($sql_count);
$stm->execute($params_count);
$total_registros = $stm->fetchColumn();

$total_paginas = ceil($total_registros / $por_pagina);

// CONSULTA PRINCIPAL
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

$sql .= " ORDER BY d.CodEmple LIMIT $por_pagina OFFSET $offset";

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
                    $depts = $stm->fetchAll(PDO::FETCH_ASSOC);
                    foreach($depts as $d): ?>
                <option value="<?= e($d['CodDept']) ?>" <?= isset($_GET['departamento']) && $_GET['departamento'] == $d['CodDept'] ? 'selected' : '' ?>>
                    <?= e($d['Nombre']) ?>
                </option>
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
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['CodEmple']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Apellido1']) ?></td>
            <td><?= e($r['Apellido2']) ?></td>
            <td><?= e($r['DepartamentoNombre']) ?></td>
            <td>
                <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodEmple'] ?>" onclick="return confirm('Borrar empleado')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ($total_paginas > 1): ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">

        <!-- Botón Anterior -->
        <li class="page-item <?= $pagina <= 1 ? 'disabled' : '' ?>">
            <a class="page-link"
               href="?pagina=<?= $pagina - 1 ?>&nombre=<?= urlencode($nombre) ?>&departamento=<?= urlencode($departamento) ?>"
               tabindex="-1">
               « Anterior
            </a>
        </li>

        <!-- Números -->
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                <a class="page-link"
                   href="?pagina=<?= $i ?>&nombre=<?= urlencode($nombre) ?>&departamento=<?= urlencode($departamento) ?>">
                   <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <!-- Botón Siguiente -->
        <li class="page-item <?= $pagina >= $total_paginas ? 'disabled' : '' ?>">
            <a class="page-link"
               href="?pagina=<?= $pagina + 1 ?>&nombre=<?= urlencode($nombre) ?>&departamento=<?= urlencode($departamento) ?>">
               Siguiente »
            </a>
        </li>

    </ul>
</nav>
<?php endif; ?>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
