<?php
session_start();

// Importamos dependencias
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

// Seguridad: solo administradores acceden a esta lista
require_admin();

// Mapa de roles para transformar los números de la BD en texto legible
$roles_map = [
    '0' => 'Usuario',
    '1' => 'Administrador'
];

// Obtenemos los usuarios ordenados por su código
try {
    $stm = $bd->query("SELECT * FROM usuarios ORDER BY Codigo");
    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}

require_once __DIR__ . "/../includes/header.php";
?>

<div class="container">
    <h2>Listado de Usuarios</h2>
    
    <div style="margin-bottom: 20px;">
        <a class="btn" href="crear.php" style="background-color: #28a745; color: white; padding: 10px; text-decoration: none; border-radius: 4px;">
            + Nuevo usuario
        </a>
    </div>

    <table class="list" border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #f4f4f4;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Clave (Hash)</th>
                <th style="padding: 10px;">Rol</th>
                <th style="padding: 10px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
            <tr>
                <td style="padding: 10px;"><?= e($r['Codigo']) ?></td>
                <td style="padding: 10px;"><strong><?= e($r['Nombre']) ?></strong></td>
                
                <td style="padding: 10px; color: #888; font-family: monospace;">****</td>
                
                <td style="padding: 10px;">
                    <?php 
                        // Forzamos string para que el índice '0' no falle en el array
                        $id_rol = (string)$r['Rol'];
                        echo e($roles_map[$id_rol] ?? 'Sin rol'); 
                    ?>
                </td>
                
                <td style="padding: 10px;">
                    <a href="editar.php?id=<?= $r['Codigo'] ?>" style="margin-right: 10px;">Editar</a>
                    <a href="borrar.php?id=<?= $r['Codigo'] ?>" 
                       style="color: red;" 
                       onclick="return confirm('¿Estás seguro de borrar a <?= e($r['Nombre']) ?>?')">
                       Borrar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>