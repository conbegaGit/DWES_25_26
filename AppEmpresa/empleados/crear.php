<?php 
session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre = $apellido1 =  $apellido2 ="";
$departamento = 0;

$dept = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre") ->fetchAll();
if (is_pot()) {    
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = intval ( $_POST['Departamento']);
    $stmt = $bd->prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (?,?,?,?)");
    $stmt->execute([$nombre, $apellido1, $apellido2, $departamento]);
    flash_set("Empleado creado.");
    header("Location: listar.php"); 
    exit();
}
require_once "../includes/header.php";
?>
<h2>Crear Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Apellido1<br><input type="text" name="Apellido1"  value="<?= e($apellido1) ?>" required></label>
    <label>Apellido2<br><input type="text" name="Apellido2"  value="<?= e($apellido2) ?>" required></label>
    <label>Departamento<br><input type="number" name="Departamento"  value="<?= e($departamento) ?>" required></label><br>
   
    <label>
        Departamento <br>
        <select name="Departamento">
        <option value="">-- Ninguno --</option>
        <?php foreach ($dept as $dep): ?>
            <option value="<?= $dep['CodDept'] ?>"
            <?= ($dept == $dep['CodDept']) ? 'selected' : '' ?>>
            <?= e($dep['Nombre'])?>
        </option>
                <?php endforeach; ?>
        </select>
    </label>
        <!--..... -->
    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>