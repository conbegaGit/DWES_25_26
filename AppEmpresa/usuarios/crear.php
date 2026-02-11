<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();
requiere_admin();

$nombre = $codigo = $clave = $rol = "";
$presupuesto = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $codigo = trim($_POST['Codigo']);
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $hashclave = password_hash($clave, PASSWORD_DEFAULT);
    $rol = trim($_POST['Rol']);
    $stmt = $bd->prepare("INSERT INTO usuarios (Codigo, Nombre, Clave, Rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$codigo, $nombre, $hashclave, $rol]);
    flash_set("Usuario creado");
    redirect('listar.php');
}
require_once("../includes/header.php");
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Codigo<br><input type="text" name="Codigo" value="<?=  e($codigo) ?>" required></label>
    <label>Nombre<br><input type="text" name="Nombre" value="<?=  e($nombre) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?=  e($clave) ?>" required></label>
    <label>Rol<br><select name="Rol" required>
        <option value="">-- Selecciona rol --</option>
        <option value="1">Admin</option>
        <option value="0">Usuario</option>
    </select></label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once("../includes/footer.php"); ?>