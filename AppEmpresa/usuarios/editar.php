<?php
session_start(); //si no esta creada la sesión, la crea, sino la mantiene
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$emp) {
    flash_set("Usuario no encontrado");
    header("Location: listar.php");
    exit;
}

// Cargar lista de departamentos
$stmt = $bd->query("SELECT Codigo, Nombre FROM usuarios ORDER BY Nombre");
$dept = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);

    if (!Empty ($_POST['Clave'])) {
        $clave = trim($_POST['Clave']);
    } else {
        $clave = $emp['Clave'];
    }
    $Clavehash = password_hash($clave, PASSWORD_DEFAULT);
    $rol = trim($_POST['Rol']);
    $bd->prepare("UPDATE usuarios SET Nombre = ?, Clave = ?, Rol = ? WHERE Codigo = ?")
     -> execute([$nombre, $Clavehash, $rol, $id]);
    flash_set("Usuario actualizado.");
    header("Location: listar.php");
    exit;
}
require_once "../includes/header.php";
?>
<h2>Editar Usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($emp['Nombre']) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave"  value="<?= e($emp['Clave']) ?>" required></label>
    <label>Rol<br><input type="text" name="Rol"  value="<?= e($emp['Rol']) ?>" required></label>

    <div class="actions"><button type="submit">Guardar</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>