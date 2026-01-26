<?php
session_start();

require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";

$id = (int) ($_GET['id'] ?? 0);

$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: listar.php");
    exit;
}

$nombre = $usuario['Nombre'];
$clave = $usuario['Clave'];
$rol = (int)$usuario['Rol'];

$roles = [
    1 => 'admin',
    2 => 'usuario'
];

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $hash = password_hash($clave, PASSWORD_DEFAULT);
    $rol = (int) ($_POST['Rol'] ?? 2);

    if ($nombre === '') $errores[] = "El nombre es obligatorio";
    if ($clave === '') $errores[] = "La clave es obligatoria";
    if (!array_key_exists($rol, $roles)) $errores[] = "Rol no válido";

    if (empty($errores)) {
        $stmt = $bd->prepare(
            "UPDATE usuarios SET Nombre = ?, Clave = ?, Rol = ? WHERE Codigo = ?"
        );
        $stmt->execute([$nombre, $hash, $rol, $id]);

        flash_set("Usuario actualizado");
        header("Location: listar.php");
        exit;
    }
}
?>

<h2>Editar Usuario</h2>

<?php if ($errores): ?>
<ul class="errores">
    <?php foreach ($errores as $e): ?>
        <li><?= e($e) ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form method="post">

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
        <?php foreach ($roles as $k => $v): ?>
            <option value="<?= $k ?>" <?= ($rol === $k) ? 'selected' : '' ?>>
                <?= ucfirst($v) ?>
            </option>
        <?php endforeach; ?>
    </select>
</label>

<div class="actions">
    <button type="submit">Guardar cambios</button>
    <a class="btn" href="listar.php">Cancelar</a>
</div>

</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>
