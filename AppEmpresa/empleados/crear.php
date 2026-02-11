<?php 
session_start();
define('BASE_PATH', '../');
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre = $apellido1 = $apellido2 = "";
$departamento = 0;
$error = "";

// Fetch departments for the dropdown
$stmt_depts = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $stmt_depts->fetchAll(PDO::FETCH_ASSOC);

if (is_post()) {
    $nombre = trim($_POST['Nombre']);
    $apellido1 = trim($_POST['Apellido1']);
    $apellido2 = trim($_POST['Apellido2']);
    $departamento = intval($_POST['Departamento']);
    
    if (empty($nombre) || empty($apellido1) || empty($departamento)) {
        $error = "Nombre, primer apellido y departamento son obligatorios.";
    } else {
        try {
            $stmt = $bd->prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (?,?,?,?)");
            $stmt->execute([$nombre, $apellido1, $apellido2, $departamento]);
            flash_set("Empleado creado.");
            header("Location: listar.php"); 
            exit();
        } catch (PDOException $e) {
            $error = "Error al crear el empleado: " . $e->getMessage();
        }
    }
}
require_once "../includes/header.php";
?>
<h2>Crear Empleado</h2>
<?php if (!empty($error)): ?>
    <div class="error" style="color: red; background-color: #ffe6e6; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 15px;">
        <?= e($error) ?>
    </div>
<?php endif; ?>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Primer Apellido<br><input type="text" name="Apellido1" value="<?= e($apellido1) ?>" required></label>
    <label>Segundo Apellido<br><input type="text" name="Apellido2" value="<?= e($apellido2) ?>"></label>
    <label>Departamento<br>
        <select name="Departamento" required>
            <option value="">Seleccione un departamento</option>
            <?php foreach ($departamentos as $dept): ?>
                <option value="<?= e($dept['CodDept']) ?>" <?= $departamento == $dept['CodDept'] ? 'selected' : '' ?>>
                    <?= e($dept['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <div class="actions">
        <button type="submit">Crear</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>
