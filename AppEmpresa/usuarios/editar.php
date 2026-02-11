<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";

requiere_login();
requiere_admin();

require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    flash_set("Usuario no encontrado");
    redirect('listar.php');
}

$codigo = $user['Codigo'];
$nombre = $user['Nombre'];
$clave = $user['Clave'];
$rol = $user['Rol'];

if (is_Post()) {
    $codigo = trim($_POST['Codigo'] ?? '');
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $hashclave = password_hash($clave, PASSWORD_DEFAULT);
    $rol = intval($_POST['Rol'] );

    if ($nombre && $clave && isset($_POST['Rol'])) {
        $stmt = $bd->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?");
        $stmt->execute([$nombre, $hashclave, $rol, $codigo]);
        flash_set("Usuario actualizado");
        redirect('listar.php');
    }
}
?>

<h2>Editar usuario</h2>
<form method="post">
    <label>
        Codigo<br>
        <input type="text" name="Codigo" value="<?= e($codigo) ?>" required>
    </label>

    <label>
        Nombre<br>
        <input type="text" name="Nombre" value="<?= e($nombre) ?>" required>
    </label>

    <label>
        Clave<br>
        <input type="password" name="Clave" value="<?= e($clave) ?>" required>
    </label>

<label>
    rol<br>
    <select name="Rol" required>
        <option value="">-- Seleccions rol --</option>
        <option value="1" <?= $rol === 1 ? 'selected' : '' ?>>Admin</option>
        <option value="0" <?= $rol === 0 ? 'selected' : '' ?>>User</option>
    </select>
</label>

    <div class="actions">
        <button type="submit">Guardar cambios</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>