<?php 
session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre = $ciudad = " ";
$presupuesto = 0;
$emps = $bd->query("SELECT CodEmple, Nombre, Apellido1 FROM empleados ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto = intval ( $_POST['Presupuesto']);
    $stmt = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?,?,?)");
    $stmt->execute([$nombre, $ciudad, $presupuesto]);
    flash_set("Departamento creado.");
    header("Location: listar.php"); 
    exit();
}
require_once "../includes/header.php";
?>
<h2>Crear Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad"  value="<?= e($ciudad) ?>" required></label>
    <label>Presupuesto<br><input type="number" name="Presupuesto"  value="<?= e($presupuesto) ?>" required></label><br>
     <label>
        Jefe <br>
        <select name="Jefe">
        <option value="">-- Ninguno --</option>
        <?php foreach ($emps as $em): ?>
            <option value="<?= $em['CodEmple'] ?>" 
            <?=  $emps == $em ['CodEmple'] ? 'selected' : '' ?>>
            <?= e($em['Nombre'] .' '. $em['Apellido1'])?>
        </option>
                <?php endforeach; ?>
        </select>
    </label>

    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>