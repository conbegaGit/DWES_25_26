<?php
session_start();
//require_once "includes/auth.php;
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stm = $db->query("SELECT Codigo, Nombre, Clave, Rol FROM usuarios ORDER BY Codigo");
$rows = $stm ->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Usuarios</h2>
<a class="btn" href="crear.php">Nuevo usuario</a>
<table class="list">
    <thead><tr><th>Codigo</th><th>Nombre</th><th>Rol</th></tr></thread>
<tbody>
    <?php foreach($rows as $r):?>
    <tr>
        <td><?= e($r['Codigo'])?></td>
        <td><?= e($r['Nombre'])?></td>
        <td><?= e($r['Rol'])?></td>
        <td>
            <a href="editar.php?id=<?= $r['Codigo']?>">Editar</a>
            <a href="borrar.php?id=<?= $r['Codigo']?>"onclick="return confirm('Borrar usuario?')">Borrar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "../includes/footer.php"; ?>