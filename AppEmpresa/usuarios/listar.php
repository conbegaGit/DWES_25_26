<?php
    session_start();
    require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";

    require_login();
    require_admin();

    $stm = $bd->query("SELECT * FROM usuarios ORDER BY Codigo");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include "../includes/header.php"; ?>
<h2>Usuarios</h2>
<a class="btn" href="crear.php">Nuevo usuario</a>
<table class="list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Clave</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
            <td><?= e($r['Codigo']) ?></td>
            <td><?= e($r['Nombre']) ?></td>
            <td><?= e($r['Clave'] ?? '-') ?></td>
            <td><?= e($r['Rol'] ?? '-') ?></td>
            <td>
                <a href="editar.php?id=<?= e($r['Codigo']) ?>">Editar</a>
                <a href="borrar.php?id=<?= e($r['Codigo']) ?> " onclick="return confirm('¿Seguro que desea borrar este usuario?');">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>