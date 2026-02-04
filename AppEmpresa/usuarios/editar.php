<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_admin();

$id = intval($_GET['id'] ?? 0);
$stmt = $db->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$dept = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$dept){
    flash_set("Usuario no encontrado");
    redirect("listar.php");
    exit;
}
$emps = $db->query("SELECT Codigo, Nombre FROM usuarios ORDER BY Nombre")
->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Nombre = trim($_POST['Nombre']);
    $Clave = trim($_POST['Clave']);
    $hash = password_hash($Clave, PASSWORD_DEFAULT);
    $Rol = trim($_POST['Rol']);
    $db->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?")->execute([$Nombre, $hash, $Rol, $id]);
    flash_set("Usuario actualizado");
    header("locate listar.php");
    exit;
}

require_once "../includes/header.php";
?>

<h2>Editar Usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($dept['Nombre']) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave"required></label>
    <label>Rol<br>
        <select name="Rol" required>
        <option value="1">Admin</option>
        <option value="2">Zesar</option>
        
    </select>
</label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>