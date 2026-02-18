<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_admin();

// Mapa de roles corregido para que el 0 funcione siempre
$roles_map = [
    '0' => 'usuario',
    '1' => 'admin'
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
            <td>********</td>
            <td>
                <?php 
                    // Forzamos que el índice sea tratado como texto para que el '0' no se confunda con 'vacío'
                    $id_rol = (string)$r['Rol'];
                    echo e($roles_map[$id_rol] ?? 'Sin rol'); 
                ?>
            </td>
            <td>
                <a href="editar.php?id=<?= $r['Codigo'] ?>">Editar</a>
                <a href="borrar.php?id=<?= $r['Codigo'] ?>" onclick="return confirm('¿Borrar usuario?')">Borrar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>