<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_login();
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    // flash_set("Usuario no encontrado");
    redirect("listar.php");
}

$codigo = $user['Codigo'];
$nombre = $user['Nombre'];
$clave = $user['Clave'];
$rol = $user['Rol'];

if (is_post()) {
    $codigo = trim($_POST['Codigo'] ?? '');
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $rol = intval($_POST['Rol']);

    if ($nombre && $clave) {
        $hashClave = password_hash($clave, PASSWORD_DEFAULT);
        $stmt = $bd->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?");
        $stmt->execute([$nombre, $hashClave, $rol, $codigo]);
        flash_set("Usuario actualizado");
        redirect("listar.php");
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
        <input type="text" name="Clave" value="<?= e($clave) ?>" required>
    </label>

    <label>
        Rol<br>
        <select name="Rol" required>
            <option value="">-- Selecciona rol --</option>
            <option value="1" <?= $rol === 1 ? 'selected' : '' ?>>Administrador</option>
            <option value="0" <?= $rol === 0 ? 'selected' : '' ?>>Usuario</option>
        </select>
    </label>

    <div class="actions">
        <button type="submit">Guardar cambios</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>