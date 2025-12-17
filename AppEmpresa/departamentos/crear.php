<?php
session_start();
require_once "../../includes/auth.php";
require_once "../../includes/db.php";
require_once "../../includes/funciones.php";

$nombre= $Ciudad = '';
$Presupuesto = 0;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nombre = trim($_POST['Nombre']);
    $Ciudad = trim($_POST['Ciudad']);
    $Presupuesto = intval($_POST['Presupuesto']);
    $stmt = $db->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
    $stmt->execute([$Nombre, $Ciudad, $Presupuesto]);
    flash_set("Departamento creado con éxito.");
    header("Location: lista.php");
    exit;
}
require_once "../../includes/redireccion.php";
?>
<h2> Crear Departamento</h2>
<form method="post">
    <label>Nombre <br> <input type="text" name="Nombre" value="<?= e($Nombre) ?>" required></label>
    <label>Ciudad <br> <input type="text" name="Ciudad" value="<?= e($Ciudad) ?>" required></label>
    <label> Presupuesto <br> <input type="number" name="Presupuesto" value="<?= e($Presupuesto) ?>" required></label>
    <divclass="actions"><button type="submit"> Crear</button></div>
</form>
<?php require_once "../../includes/pie.php";?>