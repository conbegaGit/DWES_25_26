<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

if ($_SESSION['user']['Rol'] != 1) {
    header("Location: /AppEmpresa/dashboard.php");
    exit;
}

$roles_map = [
    1 => 'admin',
    2 => 'usuario'
];

$stm = $bd->query("SELECT * FROM usuarios ORDER BY Codigo");
$rows = $stm->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/../includes/header.php";
?>

<h2>Usuarios</h2>
<a class="btn" href="crear.php">Nuevo usuario</a>

<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $r): ?>
        <tr>
            <td><?= e($r['Codigo']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Clave']) ?></td>
            <td><?= e($roles_map[$r['Rol']]) ?></td>
            <td>
                <a href="editar.php?id=<?= $r['Codigo'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['Codigo'] ?>" onclick="return confirm('¿Borrar usuario?')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
