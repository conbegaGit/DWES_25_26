<?php 
session_start(); //si no esta creada la sesión, la crea, sino la mantiene 
define('BASE_PATH', '../');
//require_once "../includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$nombre = $ciudad = " ";
$presupuesto = 0;
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['Nombre']);
    $ciudad = trim($_POST['Ciudad']);
    $presupuesto = intval ( $_POST['Presupuesto']);
    
    // Validar si el nombre ya existe
    $stmt_check = $bd->prepare("SELECT COUNT(*) FROM departamentos WHERE Nombre = ?");
    $stmt_check->execute([$nombre]);
    $existe = $stmt_check->fetchColumn();
    
    if ($existe > 0) {
        $error = "Ya existe un departamento con el nombre '$nombre'. Por favor, elige otro nombre.";
    } else {
        try {
            $stmt = $bd->prepare("INSERT INTO departamentos (Nombre, Ciudad, Presupuesto) VALUES (?,?,?)");
            $stmt->execute([$nombre, $ciudad, $presupuesto]);
            flash_set("Departamento creado.");
            header("Location: listar.php"); 
            exit();
        } catch (PDOException $e) {
            // Manejar otros errores de base de datos
            if ($e->getCode() == 23000) {
                $error = "Error: El nombre del departamento ya existe.";
            } else {
                $error = "Error al crear el departamento: " . $e->getMessage();
            }
        }
    }
}
require_once "../includes/header.php";
?>
<h2>Crear Departamento</h2>
<?php if (!empty($error)): ?>
    <div class="error" style="color: red; background-color: #ffe6e6; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 15px;">
        <?= e($error) ?>
    </div>
<?php endif; ?>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($nombre) ?>" required></label>
    <label>Ciudad<br><input type="text" name="Ciudad"  value="<?= e($ciudad) ?>" required></label>>
    <label>Presupuesto<br><input type="number" name="Presupuesto"  value="<?= e($presupuesto) ?>" required></label>><br>
    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php"; ?>