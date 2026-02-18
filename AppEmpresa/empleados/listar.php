<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
require_once __DIR__ . "/../includes/header.php";



// 1. Obtener departamentos para el desplegable (Filtro)
// Usamos fetchAll(PDO::FETCH_KEY_PAIR) para obtener un array asociativo directo: [id => nombre]
// Esto facilita mucho rellenar el <select> en el HTML más abajo.
$deptParams = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")->fetchAll(PDO::FETCH_KEY_PAIR);

// 2. Inicializar variables de filtro
// Recogemos los parámetros GET si existen, o usamos cadena vacía si no.
// Usamos el operador de fusión null (??) de PHP 7+
$nombre = $_GET['nombre'] ?? '';
$departamento = $_GET['departamento'] ?? '';

// 3. Construcción dinámica de la consulta SQL (Query Building)
// Empezamos con una consulta base que trae todos los empleados y sus departamentos.
// "WHERE 1=1" es un truco: es una condición que siempre es verdadera.
// Nos permite añadir condiciones subsiguientes empezando siempre por "AND"
// sin tener que comprobar si es la primera condición o no.
$sql = "SELECT d.*, e.Nombre AS DepartamentoNombre 
        FROM empleados d 
        LEFT JOIN departamentos e ON d.Departamento = e.CodDept 
        WHERE 1=1";
$params = []; // Array para guardar los parámetros de la consulta preparada

// 4. Aplicar filtros si existen
// Si el usuario escribió un nombre:
if (!empty($nombre)) {
    $sql .= " AND d.Nombre LIKE :nombre"; // Añadimos la condición SQL
    $params[':nombre'] = "%$nombre%";      // Añadimos el parámetro con los comodines % para búsqueda parcial
}

// Si el usuario seleccionó un departamento:
if (!empty($departamento)) {
    $sql .= " AND d.Departamento = :departamento"; // Añadimos la condición SQL
    $params[':departamento'] = $departamento;      // Añadimos el valor exacto del ID
}

// Añadimos el orden final a la consulta
$sql .= " ORDER BY d.CodEmple";

// 5. Ejecución segura de la consulta
// Usamos sentencias preparadas (prepare + execute) para evitar inyección SQL.
// Los valores reales se pasan en $params, nunca se concatenan directamente en el string $sql.
$stm = $bd->prepare($sql);
$stm->execute($params);
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Empleados</h2>


<!-- Formulario de Búsqueda y Filtrado -->
<!-- 
    style="display: flex; ...": Flexbox alinea los elementos en una fila horizontal.
    method="GET": Los datos se envían en la URL (listar.php?nombre=Ana&departamento=3), permitiendo compartir el enlace de la búsqueda.
-->
<form method="GET" action="listar.php" style="display: flex; align-items: flex-end; gap: 10px; margin-bottom: 20px;">
    <!-- Campo de texto para el nombre -->
    <label style="display: flex; flex-direction: column; gap: 5px;">
        <span>Nombre:</span>
        <input type="text" name="nombre" placeholder="Nombre..." value="<?= e($nombre) ?>">
    </label>
    
    <!-- Desplegable de departamentos -->
    <label style="display: flex; flex-direction: column; gap: 5px;">
        <span>Departamento:</span>
        <select name="departamento">
            <option value="">Todos los departamentos</option>
            <?php foreach($deptParams as $id => $deptName): ?>
                <!-- Marcamos como 'selected' la opción que coincida con lo que el usuario buscó previamente -->
                <option value="<?= $id ?>" <?= $id == $departamento ? 'selected' : '' ?>>
                    <?= e($deptName) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    
    <button type="submit">Buscar</button>
    
    <!-- Botón Limpiar -->
    <a href="listar.php" class="btn" style="text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; background-color: #f0f0f0; color: #333;">Limpiar</a>
</form>

<?php if ($_SESSION['user']['Rol'] == 1): ?>
<a class="btn" href="crear.php">Nuevo empleado</a>
<?php endif; ?>
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
                <?php if ($_SESSION['user']['Rol'] == 1): ?>
                <a href="editar.php?id=<?= $r['CodEmple'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['CodEmple'] ?>"onclick="return confirm('Borrar empleado')">Borrar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . "/../includes/footer.php"; ?>