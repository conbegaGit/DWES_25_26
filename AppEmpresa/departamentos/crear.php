<?php
session_start();

require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$nombre = $ciudad = '';
$presupuesto = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre'] ?? '');
    $ciudad = trim($_POST['Ciudad'] ?? '');
    $presupuesto = intval($_POST['Presupuesto'] ?? '');
    $stmt = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $ciudad, $presupuesto]);
    // flash_set("Departamento creado)
    header("Location: listar.php");
    exit;
    }

?>

<h2>Crear Departamento</h2>

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

    <div class="actions">
        <button type="submit">Crear</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
