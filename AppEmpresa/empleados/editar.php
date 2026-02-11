<?php
if (!isset($_SESSION)) session_start();
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$emp) {
    redirect("listar.php");
}

$nombre = $emp['Nombre'];
$Apellido1 = $emp['Apellido1'];
$Apellido2 = $emp['Apellido2'];
$departamento = $emp['Departamento'];

$emps = $bd->query("SELECT CodEmple, Nombre FROM empleados ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);
$depts = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre'] ?? '');
    $Apellido1 = trim($_POST['Apellido1'] ?? '');
    $Apellido2 = trim($_POST['Apellido2'] ?? '');
    $departamento = !empty($_POST['Departamento']) ? intval($_POST['Departamento']) : null;

    if ($nombre && $Apellido1 && $Apellido2 && $departamento) {
        $stmt = $bd->prepare("UPDATE empleados SET Nombre=?, Apellido1=?, Apellido2=?, Departamento=? WHERE CodEmple=?");
        $stmt->execute([$nombre, $Apellido1, $Apellido2, $departamento, $id]);
        redirect("listar.php");
    }
}
?>

<h2>Editar empleado</h2>
<form method="post">
    <label>
        Nombre<br>
        <input type="text" name="Nombre" value="<?= e($nombre) ?>" required>
    </label>

    <label>
        Apellido 1<br>
        <input type="text" name="Apellido1" value="<?= e($Apellido1) ?>" required>
    </label>

    <label>
        Apellido 2<br>
        <input type="text" name="Apellido2" value="<?= e($Apellido2) ?>" required>
    </label>

    <label>
        Departamento<br>
        <select name="Departamento" required>
            <option value="">-- Ninguno --</option>
            <?php foreach ($depts as $dept): ?>
                <option value="<?= $dept['CodDept'] ?>"
                    <?= ($departamento == $dept['CodDept']) ? 'selected' : '' ?>>
                    <?= e($dept['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <div class="actions">
        <button type="submit">Guardar cambios</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>