<?php 
session_start();
define('BASE_PATH', '../');
require_once "../includes/db.php";
require_once "../includes/functions.php";

// Access control
if (!isset($_SESSION['user']) || $_SESSION['user']['Rol'] != 1) {
    flash_set("Acceso denegado. Solo administradores.");
    header("Location: " . BASE_PATH . "dashboard.php");
    exit();
}

$nombre = "";
$clave = "";
$rol = 0;
$error = "";

if (is_post()) {
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $rol = intval($_POST['Rol']);
    
    if (empty($nombre) || empty($clave)) {
        $error = "Nombre y clave son obligatorios.";
    } else {
        try {
            $stmt = $bd->prepare("INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?,?,?)");
            $stmt->execute([$nombre, $clave, $rol]);
            flash_set("Usuario creado.");
            header("Location: listar.php"); 
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "El nombre de usuario ya existe.";
            } else {
                $error = "Error al crear el usuario: " . $e->getMessage();
            }
        }
    }
}
require_once "../includes/header.php";
?>
<h2>Crear Usuario</h2>
<?php if (!empty($error)): ?>
    <div class="error" style="color: red; background-color: #ffe6e6; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 15px;">
        <?= e($error) ?>
    </div>
<?php endif; ?>
<form method="post">
    <label>Nombre de usuario<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Clave<br><input type="password" name="Clave" value="<?= e($clave) ?>" required></label>
    <label>Rol<br>
        <select name="Rol" required>
            <option value="0" <?= $rol == 0 ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= $rol == 1 ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label><br>
    <div class="actions">
        <button type="submit">Crear</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>
