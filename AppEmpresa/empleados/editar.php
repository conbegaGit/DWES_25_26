<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

$id = (int)($_GET['id'] ?? 0);

$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$emp) {
    header("Location: listar.php");
    exit;
}

$nombre = $emp['Nombre'];
$apellido1 = $emp['Apellido1'];
$apellido2 = $emp['Apellido2'];
$departamento = $emp['Departamento'];

$deps = $bd->query(
    "SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre"
)->fetchAll(PDO::FETCH_ASSOC);

if (is_post()) {

    $nombre = trim($_POST['Nombre'] ?? '');
    $apellido1 = trim($_POST['Apellido1'] ?? '');
    $apellido2 = trim($_POST['Apellido2'] ?? '');
    $departamento = $_POST['Departamento'] !== '' ? (int)$_POST['Departamento'] : null;

    if ($nombre && $apellido1) {
        $stmt = $bd->prepare(
            "UPDATE empleados
             SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Departamento = ?
             WHERE CodEmple = ?"
        );
        $stmt->execute([$nombre, $apellido1, $apellido2, $departamento, $id]);

        flash_set("Empleado actualizado");
        header("Location: listar.php");
        exit;
    }
}

require_once __DIR__ . "/../includes/header.php";
?>

<h2>Editar empleado</h2>

<form method="post">
    <label>
        Nombre<br>
        <input type="text" name="Nombre" value="<?= e($nombre) ?>" required>
    </label>

    <label>
        Apellido 1<br>
        <input type="text" name="Apellido1" value="<?= e($apellido1) ?>" required>
    </label>

    <label>
        Apellido 2<br>
        <input type="text" name="Apellido2" value="<?= e($apellido2) ?>">
    </label>

    <label>
        Departamento<br>
        <select name="Departamento">
            <option value="">-- Sin departamento --</option>
            <?php foreach ($deps as $d): ?>
                <option value="<?= $d['CodDept'] ?>"
                    <?= ($departamento == $d['CodDept']) ? 'selected' : '' ?>>
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