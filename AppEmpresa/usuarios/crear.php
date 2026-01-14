<?php 
session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre = $clave =  $rol ="";
$codigo = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$codigo = intval ( $_POST['Codigo']);
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $rol = trim($_POST['Rol']);
    $stmt = $bd->prepare("INSERT INTO usuarios (Codigo, Nombre, Clave, Rol) VALUES (?,?,?,?)");
    $stmt->execute([$codigo, $nombre, $clave, $rol]);
    flash_set("Usuario creado.");
    header("Location: listar.php"); 
    exit();
}
require_once "../includes/header.php";
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Código<br><input type="number" name="Codigo"  value="<?= e($codigo) ?>" required></label><br>
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave"  value="<?= e($clave) ?>" required></label>
    <label>Rol<br><input type="text" name="Rol"  value="<?= e($rol) ?>" required></label>
    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>