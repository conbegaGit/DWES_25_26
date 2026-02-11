<?php 
session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$emp) {
    flash_set("Empleado no encontrado");
    header("Location: listar.php");
    exit;
}

// Cargar lista de departamentos
$stmt = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$dept = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (is_pot()) {
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = empty($_POST['Departamento']) ? null : intval($_POST['Departamento']);
    $bd->prepare("UPDATE empleados SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Departamento = ? WHERE CodEmple = ?")
     -> execute([$nombre, $apellido1, $apellido2, $departamento, $id]);
    flash_set("Empleado actualizado.");
    header("Location: listar.php");

    //functionredirect("listar.php");
    exit;
}
require_once "../includes/header.php";
?>
<h2>Editar Empleado</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($emp['Nombre']) ?>" required></label>
    <label>Apellido1<br><input type="text" name="Apellido1"  value="<?= e($emp['Apellido1']) ?>" required></label>
    <label>Apellido2<br><input type="text" name="Apellido2"  value="<?= e($emp['Apellido2']) ?>" required></label>

    <!--faltaa-->
 <label>
        Departamento <br>
        <select name="Departamento">
        <option value="">-- Ninguno --</option>
        <?php foreach ($dept as $dep): ?>
            <option value="<?= $dep['CodDept'] ?>"
            <?= ($emp['Departamento'] == $dep['CodDept']) ? 'selected' : '' ?>>
            <?= e($dep['Nombre'])?>
        </option>
                <?php endforeach; ?>
        </select>
    </label>
        <!--..... -->
    <div class="actions"><button type="submit">Guardar</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>