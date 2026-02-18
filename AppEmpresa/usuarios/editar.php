<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_once __DIR__ . "/../includes/header.php";
require_admin();

// 1. Obtener el ID del usuario a editar
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: listar.php");
    exit;
}

// Roles disponibles
$roles = [1 => 'admin', 2 => 'usuario'];
$errores = [];

// 2. Cargar datos actuales del usuario
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$usuarioActual = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuarioActual) {
    die("Usuario no encontrado.");
}

$nombre = $usuarioActual['Nombre'];
$rol = $usuarioActual['Rol'];

// 3. Procesar el formulario cuando se envía (POST)
if (is_post()) {
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave  = trim($_POST['Clave'] ?? ''); // Opcional en edición
    $rol    = (int) ($_POST['Rol'] ?? 2);

    if ($nombre === '') $errores[] = "El nombre es obligatorio";
    if (!array_key_exists($rol, $roles)) $errores[] = "Rol no válido";

    if (empty($errores)) {
        try {
            // Si el usuario escribió una nueva clave, la hasheamos. 
            // Si no, mantenemos la que ya tiene.
            if ($clave !== '') {
                $hash = password_hash($clave, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET Nombre = ?, Clave = ?, Rol = ? WHERE Codigo = ?";
                $params = [$nombre, $hash, $rol, $id];
            } else {
                $sql = "UPDATE usuarios SET Nombre = ?, Rol = ? WHERE Codigo = ?";
                $params = [$nombre, $rol, $id];
            }

            $stmt = $bd->prepare($sql);
            $stmt->execute($params);

            flash_set("Usuario actualizado correctamente");
            header("Location: listar.php");
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $errores[] = "Error: El nombre '$nombre' ya está siendo usado por otro usuario.";
            } else {
                $errores[] = "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<h2>Editar usuario: <?= e($usuarioActual['Nombre']) ?></h2>

<?php if (!empty($errores)): ?>
    <div style="color: red; background: #ffeeee; padding: 10px; border: 1px solid red; margin-bottom: 20px;">
        <ul>
            <?php foreach ($errores as $e): ?>
                <li><?= e($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post">
    <label>
        Nombre<br>
        <input type="text" name="Nombre" value="<?= e($nombre) ?>" required>
    </label>
    <br><br>

    <label>
        Clave (deja en blanco para no cambiarla)<br>
        <input type="password" name="Clave">
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

    <button type="submit">Actualizar usuario</button>
    <a href="listar.php">Cancelar</a>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>