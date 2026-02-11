<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_admin();
$nombre = $clave = '';
$rol = '';
if (is_post()) {
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $hash = password_hash(password: $clave, algo: PASSWORD_DEFAULT);
    $rol = trim($_POST['Rol']);
    $stmt = $bd->prepare("INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?, ?, ?)");
    $stmt->execute(params: [$nombre, $hash, $rol]);
    flash_set("Usuario creado");
    header("Location: listar.php");
    exit;
}
require_once __DIR__ . "/../includes/header.php";
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Clave<br><input type="password" name="Clave" value="<?= e($clave) ?>" required></label>
    <label>Rol<br>
        <select name="Rol" required>
            <option value="">-- Selecciona un rol --</option>
            <option value="0" <?= ($rol == '0') ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= ($rol == '1') ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label>
    <div class="actions"><button type="submit">Crear</button> <a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once __DIR__ . "/../includes/footer.php"; ?>