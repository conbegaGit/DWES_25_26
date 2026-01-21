<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $db->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$dept = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$dept){
    flash_set("Empleado no encontrado");
    header("Location: listar.php");
    exit;
}
$emps = $db->query("SELECT CodEmple, Nombre FROM empleados ORDER BY Nombre")
->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $rol = trim($_POST['Rol']);
    if(!empty($_POST['Clave'])){
        $clave = trim($_POST['Clave']);
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $db->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?")->execute([$nombre, $clave, $rol, $id]);
    }else{
        $db->prepare("UPDATE usuarios SET Nombre=?, Rol=? WHERE Codigo=?")->execute([$nombre, $rol, $id]);
    }
    flash_set("Empleado actualizado");
    header("Location: listar.php");
    exit;
}

require_once "../includes/header.php";
?>

<h2>Editar usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($dept['Nombre']) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?= e($dept['Clave']) ?>" required></label>
    <label>Rol<br>
        <select name="Rol" required>
            <?php foreach($emps as $em): ?>
                <option value="<?= $em['Codigo'] ?>" <?= ($dept['Rol'] == $em ['Codigo']) ? 'selected': '' ?>><?= e($em['Nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>