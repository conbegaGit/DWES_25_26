<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

requireLogin(); // cualquier usuario logueado
requireAdmin();


$nombre = $ciudad = '';
$presupuesto = 0;
if (is_post()) {
    $nombre = trim($_POST['nombre']);
    $ciudad = trim($_POST['ciudad']);
    $presupuesto = intval($_POST['presupuesto']);
    $stm = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
    $stm->execute([$nombre, $ciudad, $presupuesto]);
    redirect('listar.php', 'Departamento creado correctamente.');
    //<flash_set("Departamento creado con éxito.");
    header("Location: listar.php");
    exit;
}
require_once "../includes/header.php";
?>

<!DOCTYPE html>
<html lang="es">
<h2>Crear Departamento</h2>
<form method="post">
    <label>Nombre: <input type="text" name="nombre" value="<?= e($nombre) ?>" required></label>
    <label>Ciudad: <input type="text" name="ciudad" value="<?= e($ciudad) ?>" required></label>
    <label>Presupuesto: <input type="number" name="presupuesto" value="<?= e($presupuesto) ?>" required></label>
    <div class="actions"><button type="submit">Crear</button><a class="bin" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>