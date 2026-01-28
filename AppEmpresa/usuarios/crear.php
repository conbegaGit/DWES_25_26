<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";
require_once "../includes/header.php";

$nombre = $clave = $rol = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $rol = trim($_POST['Rol']);
    $stm = $db->prepare("INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?, ?, ?)");
    $stm->execute([$nombre, $hash, $rol]);
    flash_set("Usuario Creado");
    header("Location: listar.php");
    exit;
}

$emps = $db->query("SELECT CodEmple, Nombre FROM empleados ORDER BY Nombre")
->fetchAll(PDO::FETCH_ASSOC);

?>

<h2>Crear usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?= e($clave) ?>" required></label>
    <label>Rol<br>
        <select name="Rol" required>
            <option value="0">Usuario</option>
            <option value="1">Admin</option>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>

<?php require_once "../includes/footer.php"; ?>