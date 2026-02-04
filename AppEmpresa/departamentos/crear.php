<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_login();
require_admin();

$nombre = $ciudad = '';
$presupuesto = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto = intval($_POST['Presupuesto']);
    $stmt = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $ciudad, $presupuesto]);
    flash_set("Departamento creado");
    redirect("listar.php");
}
require_once("../includes/header.php");
?>
<h2>Crear Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?=  e($nombre) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad" value="<?=  e($ciudad) ?>" required></label>
    <label>Presupuesto<br><input type="text" name="Presupuesto" value="<?=  e($presupuesto) ?>" required></label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once("../includes/footer.php"); ?>