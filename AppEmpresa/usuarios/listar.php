<?php

session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../AppEmpresa/includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$stmt = $bd->query("SELECT * FROM usuarios ORDER BY Codigo");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Usuarios</h2>
<a class ="btn" href="crear.php"> Nuevo usuario </a>
<table class="list">
    <thead><tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th><th>Acciones</th></tr></thead>
    <tbody>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= e($r['Codigo']) ?></td>
                <td><?= e($r['Nombre']) ?></td>
                <td>********</td>
                <td><?= e($r['Rol']) ?></td>
                <td>
                    <a href="editar.php?id=<?= e($r['Codigo']) ?>">Editar</a>
                    <a href="borrar.php?id=<?= e($r['Codigo']) ?>" onclick="return confirm('Borrar usuario?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody> 
</table>
<?php require_once "../includes/footer.php"; ?>