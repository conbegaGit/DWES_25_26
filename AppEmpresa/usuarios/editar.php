<?php
require_once "../includes/db.php";
require_once "../includes/functions.php";

verificarAdmin();

$id = $_GET['id'] ?? null;
if (!$id) {
    redirigir('listar.php', 'ID de usuario no especificado.', 'error');
}

$stmt = $bd->prepare("SELECT * FROM usuarios WHERE Codigo = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    redirigir('listar.php', 'Usuario no encontrado.', 'error');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);
    $rol = intval($_POST['rol']);

    if ($nombre) {
        if ($clave) {
            $sql = "UPDATE usuarios SET Nombre = :nombre, Clave = :clave, Rol = :rol WHERE Codigo = :id";
            $params = [
                ':nombre' => $nombre,
                ':clave' => password_hash($clave, PASSWORD_DEFAULT),
                ':rol' => $rol,
                ':id' => $id
            ];
        } else {
            $sql = "UPDATE usuarios SET Nombre = :nombre, Rol = :rol WHERE Codigo = :id";
            $params = [
                ':nombre' => $nombre,
                ':rol' => $rol,
                ':id' => $id
            ];
        }

        try {
            $stmt = $bd->prepare($sql);
            $stmt->execute($params);
            redirigir('listar.php', 'Usuario actualizado correctamente.');
        } catch (PDOException $ex) {
            flash_set('Error al actualizar usuario: ' . e($ex->getMessage()), 'error');
        }
    } else {
        flash_set('El nombre es obligatorio.', 'error');
    }
}

require_once "../includes/header.php";
?>
<h2>Editar Usuario</h2>
<form method="post">
    <label>Nombre: <input type="text" name="nombre" value="<?= e($usuario['Nombre']) ?>" required></label>
    <label>Contraseña: <input type="password" name="clave" placeholder="(Dejar en blanco para no cambiar)"></label>
    <label>Rol:
        <select name="rol">
            <option value="0" <?= $usuario['Rol'] == 0 ? 'selected' : '' ?>>Usuario</option>
            <option value="1" <?= $usuario['Rol'] == 1 ? 'selected' : '' ?>>Administrador</option>
        </select>
    </label>
    <div class="actions">
        <button type="submit">Guardar Cambios</button>
        <a class="bin" href="listar.php">Cancelar</a>
    </div>
</form>
<?php require_once "../includes/footer.php"; ?>