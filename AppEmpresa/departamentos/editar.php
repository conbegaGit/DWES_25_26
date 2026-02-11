<?php
    session_start();
    require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";
    require_login();
    require_admin();


    $id = intval($_GET['id'] ?? '');
    $stmt = $bd->prepare("SELECT * FROM departamentos WHERE CodDept = ?");
    $stmt->execute([$id]);
    $dept = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$dept) {
        flash_set("Departamento no encontrado");
        header("Location: listar.php");
        exit();
    }

    if(is_POST()) {
        $nombre = trim($_POST['Nombre']);
        $ciudad = trim($_POST['Ciudad']);
        $presupuestos = trim($_POST['presupuesto']);
        $jefe = !empty($_POST['Jefe']) ? intval($_POST['Jefe']) : null;
        $stm = $bd->prepare("UPDATE departamentos SET Nombre = ?, Ciudad = ?, Presupuesto = ?, Jefe = ? WHERE CodDept = ?") 
            ->execute([$nombre, $ciudad, $presupuestos, $jefe, $id]);
        flash_set("Departamento actualizado");
        header("Location: listar.php");    
        exit();
    }

    // Obtener lista de empleados para el select del jefe
    //$emps = $bd->query("SELECT CodEmple, Nombre, Apellido FROM empleados ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);

    require_once "../includes/header.php";
?>
<h2>Editar Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($dept['Nombre']) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad" value="<?= e($dept['Ciudad']) ?>" required></label>
    <label>Presupuesto<br><input type="number" name="presupuesto" value="<?= e($dept['Presupuesto']) ?>" required></label>
    <label>Jefe<br>
        <select name="Jefe">
            <option value="">-- Nunguno --</option>
            <?php foreach($emps as $em): ?>
                <option value="<?= $em['CodEmple'] ?>" <?= ($dept['Jefe']==$em['CodEmple']) ? 'selected' : '' ?>><?= e($em['Nombre'].' '.$em['Apellido']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="action"><button type="submit">Guardar</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>