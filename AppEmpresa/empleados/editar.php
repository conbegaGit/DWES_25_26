<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

verificarLogueado(); // cualquier usuario logueado

require_once "../includes/header.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('listar.php', 'ID de empleado no especificado.', 'error');
}

// Obtener datos del empleado
$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = :id");
$stmt->execute([':id' => $id]);
$empleado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$empleado) {
    redirect('listar.php', 'Empleado no encontrado.', 'error');
}

// Obtener departamentos para el select
$stmt_dept = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $stmt_dept->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido1 = trim($_POST['apellido1'] ?? '');
    $apellido2 = trim($_POST['apellido2'] ?? '');
    $departamento = $_POST['departamento'] ?? '';

    if ($nombre && $apellido1 && $apellido2 && $departamento) {
        $sql = "UPDATE empleados SET Nombre = :nombre, Apellido1 = :apellido1, Apellido2 = :apellido2, Departamento = :departamento WHERE CodEmple = :id";
        $stmt_update = $bd->prepare($sql);
        try {
            $stmt_update->execute([
                ':nombre' => $nombre,
                ':apellido1' => $apellido1,
                ':apellido2' => $apellido2,
                ':departamento' => $departamento,
                ':id' => $id
            ]);
            redirect('listar.php', 'Empleado actualizado correctamente.');
        } catch (PDOException $ex) {
            echo "<p class='error'>Error al actualizar empleado: " . e($ex->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='error'>Por favor, completa todos los campos.</p>";
    }
}
?>
<h2>Editar Empleado</h2>
<form method="post" action="editar.php?id=<?= $id ?>">
    <label>Nombre: <input type="text" name="nombre" value="<?= e($empleado['Nombre']) ?>" required></label><br>
    <label>Apellido 1: <input type="text" name="apellido1" value="<?= e($empleado['Apellido1']) ?>"
            required></label><br>
    <label>Apellido 2: <input type="text" name="apellido2" value="<?= e($empleado['Apellido2']) ?>"
            required></label><br>
    <label>Departamento:
        <select name="departamento" required>
            <option value="">-- Selecciona --</option>
            <?php foreach ($departamentos as $dept): ?>
                <option value="<?= $dept['CodDept'] ?>" <?= $dept['CodDept'] == $empleado['Departamento'] ? 'selected' : '' ?>>
                    <?= e($dept['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <input type="submit" value="Guardar Cambios">
</form>
<p><a href="listar.php">Volver al listado</a></p>
<?php require_once "../includes/footer.php"; ?>