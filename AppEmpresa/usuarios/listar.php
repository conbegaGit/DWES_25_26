<?php 
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();
requiere_admin();

require_once __DIR__ . "/../includes/header.php";

$stm = $bd->query("SELECT Codigo, Nombre, Clave, Rol FROM usuarios ORDER BY Codigo");
$rows = $stm -> fetchALL(PDO::FETCH_ASSOC);
?>
<h2>Usuarios</h2>
<a class="btn" href="crear.php">Nuevo Usuario</a>
<table class="list">
    <thead><tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['Codigo']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= str_repeat('*', strlen($r['Clave'])) ?></td>
            <td><?= e($r['Rol']) ?></td>
            <td>
                <a href="editar.php?id=<?= $r['Codigo'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['Codigo'] ?>"onclick="return confirm('Borrar Usuario')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . "/../includes/footer.php"; ?>