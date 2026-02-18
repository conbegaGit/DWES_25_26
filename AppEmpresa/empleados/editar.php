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

$errores = [];

if (is_post()) {

    $nombre = trim($_POST['Nombre'] ?? '');
    $apellido1 = trim($_POST['Apellido1'] ?? '');
    $apellido2 = trim($_POST['Apellido2'] ?? '');
    // Si viene vacío, lo dejamos como null para validarlo
    $departamento = $_POST['Departamento'] !== '' ? (int)$_POST['Departamento'] : null;

    // Validaciones
    if (!$nombre) $errores[] = "El nombre es obligatorio";
    if (!$apellido1) $errores[] = "El primer apellido es obligatorio";
    // Si la DB no admite NULL, el departamento es obligatorio
    if ($departamento === null) $errores[] = "Debes seleccionar un departamento válido";

    if (empty($errores)) {
        try {
            $stmt = $bd->prepare(
                "UPDATE empleados
                 SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Departamento = ?
                 WHERE CodEmple = ?"
            );
            $stmt->execute([$nombre, $apellido1, $apellido2, $departamento, $id]);

            flash_set("Empleado actualizado");
            header("Location: listar.php");
            exit;
        } catch (PDOException $e) {
            $errores[] = "Error en la base de datos: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . "/../includes/header.php";
?>

<h2>Editar empleado</h2>

<?php if (!empty($errores)): ?>
    <div style="color: red; background: #ffeeee; padding: 10px; border: 1px solid red; margin-bottom: 20px;">
        <ul>
            <?php foreach ($errores as $e): ?>
                <li><?= e($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

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
        <select name="Departamento" required>
            <option value="">-- Selecciona un departamento --</option>
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