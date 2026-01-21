<?php
session_start();
define('BASE_PATH', '../');
require_once "../includes/functions.php";
require_once "../includes/db.php";

// Access control: only Rol == 1 (Admin) can manage users
if (!isset($_SESSION['user']) || $_SESSION['user']['Rol'] != 1) {
    flash_set("Acceso denegado. Solo administradores.");
    header("Location: " . BASE_PATH . "dashboard.php");
    exit();
}

require_once "../includes/header.php";

$stmt = $bd->query("SELECT * FROM usuarios ORDER BY Codigo");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Usuarios</h2>
<a class="btn" href="crear.php"> Nuevo usuario </a>
<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= e($r['Codigo']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td><?= $r['Rol'] == 1 ? 'Administrador' : 'Usuario' ?></td>
                <td>
                    <a href="editar.php?id=<?= e($r['Codigo']) ?>">Editar</a>
                    <a href="borrar.php?id=<?= e($r['Codigo']) ?>" onclick="return confirm('¿Borrar usuario?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
<?php require_once "../includes/footer.php"; ?>
