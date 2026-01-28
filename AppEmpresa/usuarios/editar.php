<?php
session_start();
require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT Codigo, Nombre, Clave, Rol FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$usr = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usr) {
    flash_set("Usuario no encontrado");
    header("Location: listar.php");
    exit();
}

$nombre = $usr['Nombre'];
$clave = $usr['Clave'];
$rol = $usr['Rol'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $hash = password_hash($clave, algo: PASSWORD_DEFAULT);
    $rol = trim($_POST['Rol'] ?? '');

    if ($nombre && $clave && $rol !== '') {
        $stmt = $bd->prepare("UPDATE usuarios SET Nombre=?, Clave=?, Rol=? WHERE Codigo=?");
        $stmt->execute([$nombre, $hash, $rol, $id]);

        flash_set("Usuario actualizado");
        header("Location: listar.php");
        exit;
    } else {
        flash_set("Error: Verifica que los campos sean correctos.");
    }
}
?>

<h2>Editar usuario</h2>
<form method="post">
    <label>
        Nombre<br>
        <input type="text" name="Nombre" value="<?= e($nombre) ?>" required>
    </label>

    <label>
        Clave<br>
        <input type="password" name="Clave" value="<?= e($clave) ?>" required>
    </label>

    <label>
        Rol<br>
        <select name="Rol" required>
            <option value="">-- Selecciona un rol --</option>
            <option value="0" <?= ($rol == '0') ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= ($rol == '1') ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label>

    <div class="actions">
        <button type="submit">Guardar cambios</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>