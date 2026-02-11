<?php 
session_start();
define('BASE_PATH', '../');
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
$stmt->execute([$id]);
$empleado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$empleado) {
    header("Location: listar.php");
    exit;
}

// Fetch departments for the dropdown
$stmt_depts = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $stmt_depts->fetchAll(PDO::FETCH_ASSOC);

$error = "";

if (is_post()) {
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = intval($_POST['Departamento']);
    
    if (empty($nombre) || empty($apellido1) || empty($departamento)) {
        $error = "Nombre, primer apellido y departamento son obligatorios.";
    } else {
        try {
            $stmt = $bd->prepare("UPDATE empleados SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Departamento = ? WHERE CodEmple = ?");
            $stmt->execute([$nombre, $apellido1, $apellido2, $departamento, $id]);
            flash_set("Empleado actualizado.");
            header("Location: listar.php"); 
            exit();
        } catch (PDOException $e) {
            $error = "Error al actualizar el empleado: " . $e->getMessage();
        }
    }
}
require_once "../includes/header.php";
?>
<h2>Editar Empleado</h2>
<?php if (!empty($error)): ?>
    <div class="error" style="color: red; background-color: #ffe6e6; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 15px;">
        <?= e($error) ?>
    </div>
<?php endif; ?>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($empleado['Nombre']) ?>" required></label>
    <label>Primer Apellido<br><input type="text" name="Apellido1" value="<?= e($empleado['Apellido1']) ?>" required></label>
    <label>Segundo Apellido<br><input type="text" name="Apellido2" value="<?= e($empleado['Apellido2']) ?>"></label>
    <label>Departamento<br>
        <select name="Departamento" required>
            <option value="">Seleccione un departamento</option>
            <?php foreach ($departamentos as $dept): ?>
                <option value="<?= e($dept['CodDept']) ?>" <?= $empleado['Departamento'] == $dept['CodDept'] ? 'selected' : '' ?>>
                    <?= e($dept['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <div class="actions">
        <button type="submit">Guardar</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>
