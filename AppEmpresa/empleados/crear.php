<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

verificarLogueado(); // cualquier usuario logueado

require_once "../includes/header.php";

// Obtener departamentos para el select
$stmt_dept = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre");
$departamentos = $stmt_dept->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido1 = trim($_POST['apellido1'] ?? '');
    $apellido2 = trim($_POST['apellido2'] ?? '');
    $departamento = $_POST['departamento'] ?? '';

    if ($nombre && $apellido1 && $apellido2 && $departamento) {
        $sql = "INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (:nombre, :apellido1, :apellido2, :departamento)";
        $stmt = $bd->prepare($sql);
        try {
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellido1' => $apellido1,
                ':apellido2' => $apellido2,
                ':departamento' => $departamento
            ]);
            redirect('listar.php', 'Empleado creado correctamente.');
        } catch (PDOException $ex) {
            echo "<p class='error'>Error al crear empleado: " . e($ex->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='error'>Por favor, completa todos los campos.</p>";
    }
}
?>
<h2>Nuevo Empleado</h2>
<form method="post" action="crear.php">
    <label>Nombre: <input type="text" name="nombre" required></label><br>
    <label>Apellido 1: <input type="text" name="apellido1" required></label><br>
    <label>Apellido 2: <input type="text" name="apellido2" required></label><br>
    <label>Departamento:
        <select name="departamento" required>
            <option value="">-- Selecciona --</option>
            <?php foreach ($departamentos as $dept): ?>
                <option value="<?= $dept['CodDept'] ?>"><?= e($dept['Nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <input type="submit" value="Guardar">
</form>
<p><a href="listar.php">Volver al listado</a></p>
<?php require_once "../includes/footer.php"; ?>