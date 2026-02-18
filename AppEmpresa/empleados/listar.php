<?php
    session_start();
    require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";
    require_login();
    require_once "../includes/header.php";


    $stm = $bd->query("SELECT e.*, d.Nombre AS DeptNombre FROM empleados e LEFT JOIN departamentos d ON e.departamento = d.CodDept ORDER BY e.CodEmple");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $depto = isset($_GET['departamento']) ? $_GET['departamento'] : '';

    $sql = "SELECT e.*, d.Nombre AS DeptNombre 
            FROM empleados e 
            LEFT JOIN departamentos d ON e.departamento = d.CodDept
            WHERE 1=1";
    
    $params = [];

    if ($nombre !== '') {
        $sql .= " AND e.Nombre LIKE :nombre";
        $params[':nombre'] = "%$nombre%";
    }

    if ($depto !== '') {
        $sql .= " AND e.departamento = :depto";
        $params[':depto'] = $depto;
    }

    $sql .= " ORDER BY e.CodEmple";

    $stm = $bd->prepare($sql);
    $stm->execute($params);
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>Empleados</h2>

<form action="listar.php" method="GET" style="display: flex; align-items: center; gap: 15px; background: #f9f9f9; padding: 10px; border-radius: 5px;">
    
    <div style="display: flex; align-items: center; gap: 5px;">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" 
               value="<?= isset($_GET['nombre']) ? e($_GET['nombre']) : '' ?>" 
               placeholder="Buscar empleado...">
    </div>

    <div style="display: flex; align-items: center; gap: 5px;">
        <label for="departamento">Departamento:</label>
        <select name="departamento" id="departamento">
            <option value="">Todos</option>
            <?php
                $stm = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
                $departamentos = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach($departamentos as $d):
                    $selected = (isset($_GET['departamento']) && $_GET['departamento'] == $d['CodDept']) ? 'selected' : '';
            ?>
                <option value="<?= e($d['CodDept']) ?>" <?= $selected ?>>
                    <?= e($d['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div style="display: flex; gap: 10px; align-items: center;">
        <button type="submit" style="cursor: pointer;">Buscar</button>
        <a href="listar.php" style="text-decoration: none; font-size: 0.9em; color: #666;">Limpiar</a>
    </div>

</form>

<br>

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