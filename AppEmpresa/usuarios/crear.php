<?php
session_start();
//require_once "includes/auth.php";
require_once "../includes/db.php";
require_once "../includes/functions.php";

$Nombre=$Clave='';
$Rol=0;

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $Nombre = trim($_POST['Nombre']);
    $Clave = trim($_POST['Clave']);
$hash= password_hash($Clave,PASSWORD_DEFAULT );
    $Rol = intval($_POST['Rol']);
    
    $stmt = $db-> prepare("INSERT INTO empleados (Nombre, Clave, Rol) VALUES (?,?,?)");
    $stmt-> execute([$nombre, $hash, $Rol]);
    flash_set("Usuario creado");
    header ("Location:listar.php");
    exit;
}
$deps =$db->query("SELECT Codigo, Nombre FROM empleados ORDER BY Nombre")
        ->fetchAll(PDO::FETCH_ASSOC);
require_once "../includes/header.php";
?>
<h2>Crear Usuario</h2>
<form method="post">
    <label>Nombre<br><input type="text" name="Nombre" value="<?= e($Nombre) ?>"required></label>
    <label>Clave<br><input type="text" name="Clave" value="<?= e($Clave) ?>"required></label>
    <label>Rol
    <select name="Departamento" required>
        <option value="usuario">0</option>
        <option value="administrador">1</option>
        
    </select>
</label>


    <div class="actions"><button type="submit">Crear</button><a class="btn" href="listar.php">Cancelar</a></div>
</form>
<?php require_once "../includes/footer.php";