<?php
session_start();
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM departamentos WHERE CodDept = ?");
$stmt->execute([$id]);
$dept = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dept) {
    // flash_set("Departamento no encontrado");
    header("Location: listar.php");
    exit();
}

$nombre = $dept['Nombre'];
$ciudad = $dept['Ciudad'];
$presupuesto = $dept['Presupuesto'];
$jefe = $dept['Jefe'];

$emps = $bd->query("SELECT CodEmple, Nombre FROM empleados ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);
echo "antes del if";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre'] ?? '');
    $ciudad = trim($_POST['Ciudad'] ?? '');
    $presupuesto = intval($_POST['Presupuesto'] ?? 0);
    $jefe = !empty($_POST['Jefe']) ? intval($_POST['Jefe']) : null;

    if ($nombre && $ciudad && $presupuesto > 0) {
        $stmt = $bd->prepare("UPDATE departamentos SET Nombre=?, Ciudad=?, Presupuesto=?, Jefe=? WHERE CodDept=?");
        $stmt->execute([$nombre, $ciudad, $presupuesto, $jefe, $id]);

        flash_set("Departamento actualizado");
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
        Ciudad<br>
        <input type="text" name="Ciudad" value="<?= e($ciudad) ?>" required>
    </label>

    <label>
        Presupuesto<br>
        <input type="number" name="Presupuesto" value="<?= e($presupuesto) ?>" required>
    </label>

    <label>
        Jefe<br>
        <select name="Jefe">
            <option value="">-- Ninguno --</option>
            <?php foreach($emps as $em): ?>
                <option value="<?= $em['CodEmple'] ?>" <?= ($jefe == $em['CodEmple']) ? 'selected' : '' ?>>
                    <?= e($em['Nombre']) ?>
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