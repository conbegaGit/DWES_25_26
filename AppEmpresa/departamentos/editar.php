<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

require_login();

$id = intval($_GET['id'] ?? 0);
$stmt = $db->prepare("SELECT * FROM DEPARTAMENTOS WHERE CodDept = ?");
$stmt->execute([$id]);
$dept = $stmt->fetch(PDO::FETCH_ASSOC);
IF (!$dept){
    flash_set("departamento no encontrado");
    redirect("listar.php");
    exit;
}

if(is_post()){
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto= intval($_POST['Presupuesto']);
    $jefe =!empty($_POST['Jefe']) ? intval($_POST['Jefe']) : null;
    $db->prepare("UPDATE departamentos SET Nombre=?,Presupuesto=?, Jefe? WHERE CodDept");
      flash_set("Departamento actualizado");
       redirect("listar.php");
       exit; 
}

require_once "../includes/header.php";
?>
<h2>Editar Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($dept ['Nombre']) ?>"required></label>
    <label>Ciudad<br><input type="text" name="Ciudad" value="<?= e($dept ['Ciudad']) ?>"required></label>
    <label>Presupuesto<br><input type="text" name="Presupuesto" value="<?= e($dept ['Presupuesto']) ?>"required></label>
    <label>Jefe<br>
        <select name="Jefe">
            <option value="">-- Ninguno --</option>
            <?php foreach ($emps as $em): ?>
                <option value="<? $em['CodEmple']?>"
                <?= ($dept['Jefe']==$em['CodEmple'])? 'selected':'' ?>>
                <?=  e($em['Nombre'].''.$em['Apellido1']) ?>
                </option>
                <?php endforeach; ?>
        </select>

    </label>
    <div class="actions"><button type="submit">Guardar</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>