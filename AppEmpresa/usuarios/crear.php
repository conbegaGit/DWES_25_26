<?php
require_once "../includes/db.php";
require_once "../includes/functions.php";

verificarAdmin();

$nombre = '';
$clave = '';
$rol = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);
    $rol = intval($_POST['rol']);

    if ($nombre && $clave) {
        $stmt = $bd->prepare("SELECT COUNT(*) FROM usuarios WHERE Nombre = :nombre");
        $stmt->execute([':nombre' => $nombre]);
        if ($stmt->fetchColumn() > 0) {
            flash_set('El usuario ya existe.', 'error');
        } else {
            $sql = "INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (:nombre, :clave, :rol)";
            $stmt = $bd->prepare($sql);
            try {
                $stmt->execute([
                    ':nombre' => $nombre,
                    ':clave' => password_hash($clave, PASSWORD_DEFAULT),
                    ':rol' => $rol
                ]);
                redirigir('listar.php', 'Usuario creado correctamente.');
            } catch (PDOException $ex) {
                flash_set('Error al crear usuario: ' . e($ex->getMessage()), 'error');
            }
        }
    } else {
        flash_set('Por favor, completa todos los campos.', 'error');
    }
}

require_once "../includes/header.php";
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Nombre: <input type="text" name="nombre" value="<?= e($nombre) ?>" required></label>
    <label>Contraseña: <input type="password" name="clave" required></label>
    <label>Rol:
        <select name="rol">
            <option value="0">Usuario</option>
            <option value="1">Administrador</option>
        </select>
    </label>
    <div class="actions">
        <button type="submit">Crear</button>
        <a class="bin" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>