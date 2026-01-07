<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
    require_once "../includes/db.php";
    require_once "../includes/functions.php";
    

    $stm = $bd->query("SELECT * FROM usuarios ORDER BY CodEmple");
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
            <th>Rol</th>
            <th>Acciones</th>
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
                <a href="editar.php?id=<?= e($r['CodEmple']) ?>">Editar</a>
                <a href="borrar.php?id=<?= e($r['CodEmple']) ?> " onclick="return confirm('¿Seguro que desea borrar este empleado?');">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>