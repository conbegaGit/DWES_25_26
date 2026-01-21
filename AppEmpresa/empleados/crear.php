<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre=$Apellido1=$Apellido2='';
$Departamento=0;

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $nombre = trim($_POST['Nombre']);
    $Apellido1 = trim($_POST['Apellido1']);
    $Apellido2 = trim($_POST['Apellido2']);
    $Departamento = intval($_POST['Departamento']);
    $stmt = $db-> prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2,Departamento) VALUES (?,?,?,?)");
    $stmt-> execute([$nombre, $Apellido1, $Apellido2,$Departamento]);
    flash_set("Empleado creado");
    header ("Location:listar.php");
    exit;
}
$deps =$db->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")
        ->fetchAll(PDO::FETCH_ASSOC);
require_once "../includes/header.php";
?>
<h2>Crear Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>"required></label>
    <label>Apellido1<br><input type="text" name="Apellido1" value="<?= e($Apellido1) ?>"required></label>
    <label>Apellido2<br><input type="text" name="Apellido2" value="<?= e($Apellido2) ?>"required></label>
    <select name="Departamento" required>
        <option value="">-- Selecciona un departamento --</option>
        <?php foreach ($deps as $d): ?>
            <option value="<?= $d['CodDept'] ?>"
                <?= $Departamento == $d['CodDept'] ? 'selected' : '' ?>>
                <?= e($d['Nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</label>


    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php";