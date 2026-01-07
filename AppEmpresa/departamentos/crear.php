<?php
    session_start();
    //require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";

    $nombre = $ciudad = '';
    $presupuestos = 0;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['Nombre']);
        $ciudad = trim($_POST['ciudad']);
        $presupuestos = trim($_POST['presupuesto']);
        $stmt = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $ciudad, $presupuestos]);
        //flash_set("Departamento creado");
        header("Location: listar.php");    
        exit();
    }
    require_once "../includes/header.php";
?>
<h2>Crear Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad" value="<?= e($ciudad) ?>" required></label>
    <label>Presupuesto<br><input type="number" name="presupuesto" value="<?= e($presupuestos) ?>" required></label>
    <div class="action"><button type="submit">Crear</button> <a class="bin" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>