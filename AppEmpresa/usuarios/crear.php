<?php
session_start();
require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

require_admin();
require_login();

$nombre = $codigo = $clabe = $rol = "";
$presupuesto = 0;
if (is_POST()){
    $codigo = trim($_POST['Codigo']);
    $nombre = trim($_POST['Nombre']);
    $clabe = trim($_POST['Clave']);
    $rol = trim($_POST['Rol']);

    $clabeHash = password_hash($clabe, PASSWORD_DEFAULT);

    $stmt = $bd->prepare("INSERT INTO usuarios (Codigo, Nombre, Clave, Rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$codigo, $nombre, $clabeHash, $rol]);
    
    flash_set("Usuario creado");
    header("Location: listar.php");
    exit;
}
require_once("../includes/header.php");
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Codigo<br><input type="text" name="Codigo" value="<?=  e($codigo) ?>" required></label>
    <label>Nombre<br><input type="text" name="Nombre" value="<?=  e($nombre) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?=  e($clabe) ?>" required></label>
    <label>Rol<br><select name="Rol" required>
        <option value="">-- Selecciona rol --</option>
        <option value="1">Admin</option>
        <option value="0">Usuario</option>
    </select></label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once("../includes/footer.php"); ?>