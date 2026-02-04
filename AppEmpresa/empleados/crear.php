<?php

session_start();

require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

require_admin();

$nombre = $apellido1 = $apellido2 = "";
$departamento = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = trim($_POST['Departamento']);
    $stm = $db->prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (?, ?, ?, ?)");
    $stm->execute([$nombre, $apellido1, $apellido2, $departamento]);
    flash_set("Empleado Creado");
    redirect("listar.php");
    exit;
}
$emps = $db->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")
->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Crear Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Apellido1<br><input type="text" name="Apellido1" value="<?= e($apellido1) ?>" required></label>
    <label>Apellido1<br><input type="text" name="Apellido2" value="<?= e($apellido2) ?>" required></label>
    <label>Departamento<br>
        <select name="Departamento" required>
            <option value="">-- Selecciona un departamento --</option>
            <?php foreach($emps as $em): ?>
                <option value="<?= $em['CodDept'] ?>" <?= $departamento == $em ['CodDept'] ? 'selected': '' ?>><?= e($em['Nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>

<?php require_once "../includes/footer.php"; ?>