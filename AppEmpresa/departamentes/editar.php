<?php
session_start();
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/auth.php";

$id = intval($_GET['id'] ?? 0);
$stm = $db->prepare("SELECT * FROM departamentos WHERE CodDept = ?");
$stm->execute([$id]);
$dept = $stm->fetch(PDO::FETCH_ASSOC);
if (!$dept) {
    //flash_set("Departamento no encontrado");
    header("Location: listar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto = intval($_POST['Presupuesto']);
    $jefe = !empty($_POST['Jefe']) ? intval($_POST['Jefe']) : null;
    $db->prepare("UPDATE departamentos SET Nombre=?, Ciudad=?, Jefe=? WHERE CodDept=?")->execute([$nombre, $ciudad, $presupuesto, $jefe, $id]);
    //flash_set("Departamento actualizado");
    header("Location: listar.php");
    exit;

}

require_once "../includes/header.php";
?>

<h2>Editar Departamento</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?=  e($dept['Nombre']) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad" value="<?=  e($dept['Ciudad']) ?>" required></label>
    <label>Presupuesto<br><input type="number" name="Presupuesto" value="<?=  e($dept['Presupuesto']) ?>" required></label>
    <label>Jefe<br>
        <select name="Jefe">
            <option value="">-- Ninguno --</option>
            <?php foreach($emps as $em):?>
                <option value="<?= $em['CodEmple'] ?>"
                <?=  ($dept['Jefe']== $em['CodEmple']) ? 'selected':'' ?>>
                <? e($em['Nombre'].''.$em['Apellido1']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <div class="actions"><button type="submit">Guardar</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>

