<?php
    session_start();
    //require_once "../includes/auth.php";
    require_once "../includes/db.php";
    require_once "../includes/functions.php";

    $id = intval($_GET['id'] ?? '');
    $stmt = $bd->prepare("SELECT * FROM empleados WHERE CodEmple = ?");
    $stmt->execute([$id]);
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$emp) {
        //flash_set("Empleado no encontrado");
        header("Location: listar.php");
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim($_POST['Nombre']);
        $apellido1 = trim($_POST['Apellido1']);
        $apellido2 = trim($_POST['Apellido2']);
        $departamento = !empty($_POST['Departamento']) ? intval($_POST['Departamento']) : null;
        $stm = $bd->prepare("UPDATE empleados SET Nombre = ?, Apellido1 = ?, Apellido2 = ?, Departamento = ? WHERE CodEmple = ?")
            ->execute([$nombre, $apellido1, $apellido2, $departamento, $id]);
        //flash_set("Empleado actualizado");
        header("Location: listar.php");    
        exit();
    }

    // Obtener lista de empleados para el select del jefe
    $depts = $bd->query("SELECT CodDept, Nombre FROM departamentos ORDER BY Nombre")->fetchAll(PDO::FETCH_ASSOC);
    require_once "../includes/header.php";
?>
<h2>Editar Empleados</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($emp['Nombre']) ?>" required></label>
    <label>Apellido 1<br><input type="text" name="Apellido1" value="<?= e($emp['Apellido1']) ?>" required></label>
    <label>Apellido 2<br><input type="text" name="Apellido2" value="<?= e($emp['Apellido2']) ?>" required></label>
    <label>Departamento<br>
        <select name="Departamento">
            <?php foreach($depts as $d): ?>
                <option value="<?= $d['CodDept'] ?>" <?= ($emp['Departamento']==$d['CodDept']) ? 'selected' : '' ?>><?= e($d['Nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="action"><button type="submit">Guardar</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>