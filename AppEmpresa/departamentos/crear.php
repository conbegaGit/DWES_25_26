<?php
    session_start();
    //require_once "includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";

    $nombre = $ciudad = '';
    $presupuesto = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto = intval($_POST['Presupuesto']);
    $stm = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
    $stm->execute([$nombre, $ciudad, $presupuesto]);
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