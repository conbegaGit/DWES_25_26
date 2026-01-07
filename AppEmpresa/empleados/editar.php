<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $db->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$dept = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$dept){
    //flash_set("Departamento no encontrado");
    header("Location: listar.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = trim($_POST['Departamento']);
    $db->prepare("UPDATE empleados SET Nombre=?, Apellido1=?, Apellido2=?, Departamento=? WHERE CodEmple=?")->execute([$nombre, $apellido1, $apellido2, $departamento, $id]);
    //flash_set("Departamento actualizado");
    header("Location: listar.php");
    exit;
}

require_once "../includes/header.php";
?>

<h2>Editar Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($dept['Nombre']) ?>" required></label>
    <label>Apellido1<br><input type="text" name="Apellido1" value="<?= e($dept['Apellido1']) ?>" required></label>
    <label>Apellido2<br><input type="text" name="Apellido2" value="<?= e($dept['Apellido2']) ?>" required></label>
    <label>Departamento<br>
        <select name="Departamento">
            <option value=""><?= e($dept['Departamento']) ?></option>
            <?php foreach($emps as $em): ?>
                <option value="<?= $em['CodDept'] ?>" <?= ($dept['Departamento'] == $em ['CodDept']) ? 'selected': '' ?>><?= e($em['Nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>