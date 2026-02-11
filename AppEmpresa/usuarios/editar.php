<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";
require_admin();

// Valores por defecto
$nombre = '';
$rol = 2;

// Roles disponibles
$roles = [
    1 => 'admin',
    2 => 'usuario'
];

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['Nombre'] ?? '');
    $clave  = trim($_POST['Clave'] ?? '');
    $rol    = (int) ($_POST['Rol'] ?? 2);

    if ($nombre === '') $errores[] = "El nombre es obligatorio";
    if ($clave === '') $errores[] = "La clave es obligatoria";
    if (!array_key_exists($rol, $roles)) $errores[] = "Rol no válido";

    if (empty($errores)) {

        $hash = password_hash($clave, PASSWORD_DEFAULT);

        $stmt = $bd->prepare(
            "INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?, ?, ?)"
        );
        $stmt->execute([$nombre, $hash, $rol]);

        flash_set("Usuario creado correctamente");
        header("Location: listar.php");
        exit;
    }
}
?>

<h2>Nuevo usuario</h2>

<?php if (!empty($errores)): ?>
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
    <br><br>

    <label>
        Clave<br>
        <input type="password" name="Clave" required>
    </label>
    <br><br>

    <label>
        Rol<br>
        <select name="Rol">
            <?php foreach ($roles as $k => $v): ?>
                <option value="<?= $k ?>" <?= $rol == $k ? 'selected' : '' ?>>
                    <?= e($v) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <br><br>

    <button type="submit">Crear usuario</button>
    <a class="btn" href="listar.php">Cancelar</a>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>