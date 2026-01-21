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

$id = intval($_GET['id'] ?? 0);
$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: listar.php");
    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre']);
    $clave = trim($_POST['Clave']);
    $rol = intval($_POST['Rol']);
    
    if (empty($nombre) || empty($clave)) {
        $error = "Nombre y clave son obligatorios.";
    } else {
        try {
            $stmt = $bd->prepare("UPDATE usuarios SET Nombre = ?, Clave = ?, Rol = ? WHERE Codigo = ?");
            $stmt->execute([$nombre, $clave, $rol, $id]);
            
            // If the user being edited is the logged-in user, update the session
            if ($_SESSION['user']['Codigo'] == $id) {
                $_SESSION['user']['Nombre'] = $nombre;
                $_SESSION['user']['Rol'] = $rol;
            }

            flash_set("Usuario actualizado.");
            header("Location: listar.php"); 
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "El nombre de usuario ya existe.";
            } else {
                $error = "Error al actualizar el usuario: " . $e->getMessage();
            }
        }
    }
}
require_once "../includes/header.php";
?>
<h2>Editar Usuario</h2>
<?php if (!empty($error)): ?>
    <div class="error" style="color: red; background-color: #ffe6e6; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 15px;">
        <?= e($error) ?>
    </div>
<?php endif; ?>
<form method="post">
    <label>Nombre de usuario<br><input type="text" name="Nombre" value="<?= e($usuario['Nombre']) ?>" required></label>
    <label>Clave<br><input type="password" name="Clave" value="<?= e($usuario['Clave']) ?>" required></label>
    <label>Rol<br>
        <select name="Rol" required>
            <option value="0" <?= $usuario['Rol'] == 0 ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= $usuario['Rol'] == 1 ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label><br>
    <div class="actions">
        <button type="submit">Guardar</button>
        <a class="btn" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>
