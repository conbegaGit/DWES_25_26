<?php
session_start();

require_once __DIR__ . "/../includes/auth.php";
require_once __DIR__ . "/../includes/db.php";
require_once __DIR__ . "/../includes/functions.php";
require_admin();

$nombre = $clave = '';
$rol = '';
$errores = [];

if (is_post()) {
    $nombre = trim($_POST['Nombre'] ?? '');
    $clave = trim($_POST['Clave'] ?? '');
    $rol = $_POST['Rol'] ?? '';

    // Validaciones básicas
    if ($nombre === '') $errores[] = "El nombre es obligatorio.";
    if ($clave === '') $errores[] = "La clave es obligatoria.";
    if ($rol === '') $errores[] = "Debes seleccionar un rol.";

    if (empty($errores)) {
        try {
            // Generar el hash seguro para la base de datos
            $hash = password_hash($clave, PASSWORD_DEFAULT);

            $stmt = $bd->prepare("INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $hash, $rol]);

            flash_set("Usuario creado correctamente");
            header("Location: listar.php");
            exit;

        } catch (PDOException $e) {
            // Capturar error de nombre duplicado (Código SQLSTATE 23000, Error 1062)
            if ($e->getCode() == 23000) {
                $errores[] = "Error: El nombre de usuario '$nombre' ya está registrado.";
            } else {
                $errores[] = "Error en la base de datos: " . $e->getMessage();
            }
        }
    }
}

require_once __DIR__ . "/../includes/header.php";
?>

<h2>Crear Usuario</h2>

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
        Clave<br>
        <input type="password" name="Clave" required>
    </label>
    <br><br>

    <label>
        Rol<br>
        <select name="Rol" required>
            <option value="">-- Selecciona un rol --</option>
            <option value="0" <?= ($rol === '0') ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= ($rol === '1') ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label>
    <br><br>

    <div class="actions">
        <button type="submit">Crear</button> 
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>