<?php
session_start();
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$emple = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$emple) {
    flash_set("Empleado no encontrado");
    header("Location: listar.php");
    exit();
}

$nombre = $emple['Nombre'];
$Apellido1 = $emple['Apellido1'];
$Apellido2 = $emple['Apellido2'];
$departamento = $emple['Departamento'];

$emps = $bd->query("SELECT CodEmple, Nombre FROM empleados ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);

$deps = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre'] ?? '');
    $Apellido1 = trim($_POST['Apellido1'] ?? '');
    $Apellido2 = trim($_POST['Apellido2'] ?? '');
    $departamento = intval($_POST['Departamento'] ?? 0);

    if ($nombre && $Apellido1 && $Apellido2 && $departamento > 0) {
        $stmt = $bd->prepare("UPDATE empleados SET Nombre=?, Apellido1=?, Apellido2=?, Departamento=? WHERE CodEmple=?");
        $stmt->execute([$nombre, $Apellido1, $Apellido2, $departamento, $id]);
        flash_set("Empleado actualizado");
        header("Location: listar.php");
        exit;
    }
}
?>

<h2>Editar departamento</h2>
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
            <option value="">-- Selecciona departamento --</option>
            <?php foreach ($deps as $d): ?>
                <option value="<?= $d['CodDept'] ?>"
                    <?= $d['CodDept'] == $departamento ? 'selected' : '' ?>>
                    <?= e($d['Nombre']) ?>
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