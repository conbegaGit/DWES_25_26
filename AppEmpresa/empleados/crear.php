<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();
requiere_admin();

$nombre = '';
$Apellido1 = '';
$Apellido2 = '';
$Departamento = '';

$deps = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $Apellido1 = trim($_POST['Apellido1']);
    $Apellido2 = trim($_POST['Apellido2']);
    $Departamento = intval($_POST['Departamento']);
    $stmt = $bd->prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $Apellido1, $Apellido2, $Departamento]);
    flash_set("Empleado creado");
    redirect('listar.php');
}
require_once("../includes/header.php");
?>
<h2>Crear Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?=  e($nombre) ?>" required></label>
    <label>Apellido 1<br><input type="text" name="Apellido1" value="<?=  e($Apellido1) ?>" required></label>
    <label>Apellido 2<br><input type="text" name="Apellido2" value="<?=  e($Apellido2) ?>" required></label>
    <label>Departamento<br>
        <select name="Departamento" required>
            <option value="">-- Selecciona departamento --</option>
            <?php foreach ($deps as $d): ?>
                <option value="<?= $d['CodDept'] ?>">
                    <?= e($d['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once("../includes/footer.php"); ?>